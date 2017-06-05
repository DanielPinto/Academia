<?php

namespace App\Services;

use App\Models\Pagamento;
use App\Models\Aluno;
use App\Models\Plano;
use App\Services\GeneralService;


class PagService
{

  private $pagamento;
  private $aluno;
  private $general;
  private $plano;

  public function __construct(Pagamento $pagamento , Aluno $aluno, GeneralService $general, Plano $plano)
  {
    $this->pagamento = $pagamento;
    $this->aluno = $aluno;
    $this->general = $general;
    $this->plano = $plano;

  }



    public function gerarPagamento($aluno_id , $data_vencimento , $valor)
    {

      try {

        $pagamento =[
          'data_vencimento' => $data_vencimento,
          'data_pagamento' => null,
          'valor' => $valor,
          'status' => 0,
          'aluno_id'=>$aluno_id,
        ];

        $data = $this->pagamento->create($pagamento);

        return $data;


        } catch (\Exception $e)
        {
          return $e;

        }

  }


// gera um pagamento adiantado
  public function gerarPagamentoAdiantado($aluno_id , $data_vencimento , $data_pagamento , $valor)
  {

    try {

      $pagamento =[
        'data_vencimento' => $data_vencimento,
        'data_pagamento' => $data_pagamento,
        'valor' => $valor,
        'status' => 1,
        'aluno_id'=>$aluno_id,
      ];

      $data = $this->pagamento->create($pagamento);

      return $data;


      } catch (\Exception $e)
      {
        return $e;

      }

}


// gera o primeiro pagamento do aluno ao ser cadastrado
    public function primeiroPagamento($aluno_id, $valor, $data_cadastro, $dia_pagamento)
    {

      $dtv = explode('-', $data_cadastro);
      $dtv[2] = $dia_pagamento;
      $data_vencimento = implode('-', $dtv);

      $pagamento =[
        'data_vencimento' => $data_vencimento,
        'data_pagamento' => null,
        'valor' => $valor,
        'status' => 0,
        'aluno_id'=>$aluno_id,
      ];

      $data = $this->pagamento->create($pagamento);

      return $data;
    }




    public function statusPagamento($pagamentos)
    {

        $today = date('Y-m-d');
        $today = explode('-', $today);

        $today_2 = date('Y-m-d');

        $i = 0;

        foreach ($pagamentos as $pagamento) {

            if($pagamento->status != 1){

                          $date = explode('-', $pagamento->data_vencimento);

                          // se o ano de pagamento for menor que o ano atual
                          if($date[0] < $today[0] )
                          {
                            $pagamentos[$i]->status_pagamento = 0;

                          }elseif ($date[0] > $today[0] ) {
                            $pagamentos[$i]->status_pagamento = 1;

                          }elseif ($date[0] == $today[0]) {

                              if ($date[1] < $today[1])
                              {
                                  $pagamentos[$i]->status_pagamento = 0;

                              }elseif ($date[1] > $today[1] ) {
                                $pagamentos[$i]->status_pagamento = 1;

                              }elseif ($date[1] == $today[1]) {

                                if ($date[2] < $today[2])
                                {
                                    $pagamentos[$i]->status_pagamento = 0;

                                }elseif ($date[2] > $today[2] ) {
                                  $pagamentos[$i]->status_pagamento = 1;

                                }elseif ($date[1] == $today[1]) {
                                  $pagamentos[$i]->status_pagamento = 2;
                                }
                              }
                          }


            }else{
              // se o pagamento estiver fechado

              //se o ano for maior que o ano atual
              if( ($this->compDate($pagamentos[$i]->data_vencimento, $today_2) == 1 ) || ($this->compDate($pagamentos[$i]->data_vencimento, $today_2) == 2 ))
              {
                $pagamentos[$i]->status_pagamento = 3;
              }


            }

            //inverte a data do pagamento em questão.
            $pagamentos[$i]->data_vencimento = $this->general->dateInverse($pagamentos[$i]->data_vencimento);

            if ($pagamentos[$i]->data_pagamento != null) {
                $pagamentos[$i]->data_pagamento = $this->general->dateInverse($pagamentos[$i]->data_pagamento);
            }



            $i++;

        }//final do foreach

        return $pagamentos;
      }



//analiza se existe um pagamento para o mes atual
    public function pagamento()
    {

        $alunos = $this->aluno->with('plano')->with('pagamentos')->get();
        $today = date('Y-m-d');

        foreach ($alunos as $aluno)
        {
          // pega o plano do aluno
          $plano = $aluno->plano;

          $i = 0;

          foreach ($aluno->pagamentos as $pagamento)
          {

              $dve = explode('-', $pagamento->data_vencimento);
              $dte = explode('-', $today);

              //verifica se existe um pagamento no mes atual
              if(($dve[1] == $dte[1]) && ($dve[0] == $dte[0]))
              {
                  $i++;
              }


          }//segundo foreach pegando os pagamentos

          //se não encontrou pagamento no mesmo mes e ano atual
          // então cria o pagamento
          if($i == 0)
          {

            $dte = explode('-', $today);
            $dte[2] = $aluno->dia_pagamento;
            $data_vencimento = implode('-', $dte);

            $this->gerarPagamento($aluno->id, $data_vencimento,$plano->valor);

          }

        }//primeiro foreach pegando os alunos

        return;
    }//final do metodo




    public function adiantamento($aluno_id , $parcelas)
    {


            $aluno = $this->aluno->with('plano')->with('pagamentos')->find($aluno_id);
            $today = date('Y-m-d');

            $cont_pag = 0;

            $old_date;

            # 1 encontrar todos pagamentos abertos e abater
            # guardar a quantidade de pagamentos abertos que foram abatidos

            $pagamentos = $aluno->pagamentos;

            foreach ( $pagamentos as $pag ) {

              if(($pag->status == 0) && ($cont_pag < $parcelas)){

                $p = $this->pagamento->find($pag->id);
                $p->status = 1;
                $p->data_pagamento = $today;
                $p->save();

                $cont_pag++;
              }

              $old_date = $pag->data_vencimento;// guardar a data do ultimo pagamento
            }

            $parcelas = $parcelas - $cont_pag; // parcelas passa a ter o resto de parcelas pagas



            # 3 apartir da data do ultimo pagamento, efetuar pagamentos para
            # proximas datas


            if($parcelas > 0 ){

              $old_date = explode('-', $old_date);
              $old_date[2] = $aluno->dia_pagamento;
              $old_date = implode('-', $old_date);

              for ($i=0; $i < $parcelas ; $i++) {


                $data_novo_vencimento = $this->CalcularData($old_date, '+ 1 months');
                $old_date = $data_novo_vencimento;

                $OK = $this->gerarPagamentoAdiantado($aluno->id , $data_novo_vencimento , $today , $aluno->plano->valor);

              }


            }



            return 1;




    }




    public function CalcularData($data, $tempo)
    {

      $timestamp = strtotime($data .' '. $tempo);
      $data_modificada = date('Y-m-d', $timestamp);
      return $data_modificada;




      /*
      return $this->CalcularData(date('Y-m-d'),'+ 1 months'); // + 1 mês
      //$this->CalcularData(date(‘Y-m-d’),’+ 1 week’); // + 1 semana
      //$this->CalcularData(date(‘Y-m-d’),’+ 2 months’); // + 2 meses
      //$this->CalcularData(date(‘Y-m-d’),’+ 1 year’); // + 1 ano



      */
    }



    public function maiorData($pagamentos)
    {
      $maior_data;
      $i = 0;

      foreach ($pagamentos as $pagamento) {

        if ($pagamento->data_pagamento != null) {

          if($i == 0){
            $maior_data = $pagamento->data_pagamento;
          }

        }

        $i++;
      }

    }


    public function oldDate($data1 , $data2)
    {
      //comparando as Datas
      if(strtotime($data1) >= strtotime($data2)) {
         return $date1;
       }else {
          return $date2;
        }

    }


    public function compDate($data1 , $data2)
    {
      //comparando as Datas
      if(strtotime($data1) > strtotime($data2)) {
         return 1;
       }
       elseif(strtotime($data1) == strtotime($data2)) {
         return 2;
       } else {
          return 0;
        }


    }

}
