<?php

use Illuminate\Database\Seeder;
use App\Models\Funcionario;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(\App\User::class)->create([
        'name' => 'Jonh Smith',
        'email' => 'admin@admin.com',
        'password' => bcrypt('secret'),
        'auth' => 1,
        'status' => 1,
        'funcionario_id' => 1,
      ]);
    }
}
