<?php

use Illuminate\Database\Seeder;
use App\Models\Funcionario;

class FuncionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Funcionario::class)->create([
          'name' => 'Jonh Smith ',
          'email' => 'admin@admin.com ',
          'cpf' => '12345678912',
          'rg' => '0987654321',
          'telefone_1' => '5198676789',
          'telefone_2' => '5123544532',
          'endereco' => 'Porto Alegre',
          'sexo' => 'Masculino',
          'idade' => '37',
          'data_admissao' => '01/04/2017',
          'salario' => '2500.00',
          'funcao' => 'Gerente',
      ]);
    }
}
