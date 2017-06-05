<?php

namespace App\Services;

use App\Models\Pagamento;

class PagamentoServices
{

  private $pagamento;

  public function __construct(Pagamento $pagamento)
  {
    $this->pagamento = $pagamento;
  }


  public function proximoPagamento($proximo_pagamento, $aluno_id,$pagamento)
  {

    $pag = [
      'data_vencimento' => $proximo_pagamento,
      'data_pagamento' => NULL,
      'valor' => NULL,
      'desconto' => NULL,
      'debito' => NULL,
      'status' => 0;
      'aluno_id' => $aluno_id
    ];



    return $pagamento->create($pag);

  }



  public function statusPagamento($data)
  {
      $today = date('Y-m-d');
      $today = explode('-', $today);

      $i = 0;

      foreach ($data->pagamentos as $d)
      {

          $date = $d->data_base_pagamento;
          $date = explode('-', $date);

          // se o ano de pagamento for menor que o ano atual
          if($date[0] < $today[0] )
          {
            $data->pagamentos[$i]->status_pagamento = 0;

          }elseif ($date[0] > $today[0] ) {
            $data->pagamentos[$i]->status_pagamento = 1;

          }elseif ($date[0] == $today[0]) {

              if ($date[1] < $today[1])
              {
                  $data->pagamentos[$i]->status_pagamento = 0;

              }elseif ($date[1] > $today[1] ) {
                $data->pagamentos[$i]->status_pagamento = 1;

              }elseif ($date[1] == $today[1]) {

                if ($date[2] < $today[2])
                {
                    $data->pagamentos[$i]->status_pagamento = 0;

                }elseif ($date[2] > $today[2] ) {
                  $data->pagamentos[$i]->status_pagamento = 1;

                }elseif ($date[1] == $today[1]) {
                  $data->pagamentos[$i]->status_pagamento = 2;
                }
              }
          }

          $i++;

      }//foreach

      return $data;
    }




    public function gerarPagamento()
    {

      $pagamentos = $pagamento->where('aluno_id', 1);

      return $pagamentos;



    }

}
