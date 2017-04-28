<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('funcionarios')->insert([
        'name' => 'Jonh Smith',
        'email' => 'admin@admin.com',
        'cpf' => '12345678912',
        'rg' => '0987654321',
        'telefone_1' => '5198676789',
        'telefone_2' => '5123544532',
        'cep'=>'90020-21',
        'endereco' => 'Avenida Borges de Medeiros',
        'numero'=>'0409',
        'complemento'=>'apt-401',
        'bairro'=>'Centro Histórico',
        'cidade'=>'Porto Alegre',
        'uf'=>'RS',
        'sexo' => 'Masculino',
        'idade' => '37',
        'data_admissao' => '2017/04/01 00:00:00',
        'salario' => '2500.00',
        'funcao' => 'Gerente',
        'foto' => 'user.png',
        'status'=>1,
        ]);

      DB::table('users')->insert([
        'name' => 'Jonh Smith',
        'email' => 'admin@admin.com',
        'password' => bcrypt('secret'),
        'auth' => 1,
        'status' => 1,
        'funcionario_id' => 1,
        ]);

        for ($i=2; $i <= 11 ; $i++) {

          $s = 'Feminino';
          $n = 'Mary';

          if($i%2 == 0){
            $s = 'Masculino';
            $n = 'Jonh';
          }


          DB::table('funcionarios')->insert([
            'name' => $n.' '.$i,
            'email' => $n.$i.'@func.com',
            'cpf' => '123456789'.$i,
            'rg' => '09876543'.$i,
            'telefone_1' => '5198676789',
            'telefone_2' => '5123544532',
            'cep'=>'90020-21',
            'endereco' => 'Avenida Borges de Medeiros',
            'numero'=>'0409',
            'complemento'=>'apt-401',
            'bairro'=>'Centro Histórico',
            'cidade'=>'Porto Alegre',
            'uf'=>'RS',
            'sexo' => $s,
            'idade' => '37',
            'data_admissao' => '2017/04/01 00:00:00',
            'salario' => '2500.00',
            'funcao' => 'Instrutor',
            'foto' => 'user.png',
            'status' => 1,
            ]);
        }

      //$this->call(UsersTableSeeder::class);
    }
}
