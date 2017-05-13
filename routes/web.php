<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::post('users/newUser/{id}', 'UserController@newUser');
Route::put('users/statusUser/{id}', 'UserController@statusUser');
Route::put('users/editSenha', 'UserController@editSenha');

Route::put('funcionarios/foto/{id}', 'FuncionarioController@editFoto');
Route::get('funcionarios/profile', 'FuncionarioController@profile');
Route::get('funcionarios/profileEdit', 'FuncionarioController@profileEdit');
Route::put('funcionarios/profileUpdate', 'FuncionarioController@profileUpdate');
Route::put('funcionarios/profileEditFoto', 'FuncionarioController@profileEditFoto');

Route::resource('funcionarios', 'FuncionarioController');

Route::resource('alunos', 'AlunoController');
Route::put('alunos/foto/{id}', 'AlunoController@editFoto');

Route::put('planos/status/{id}', 'PlanoController@status');
Route::resource('planos', 'PlanoController');


Route::put('treinos/status/{id}', 'TreinoController@status');
Route::resource('treinos', 'TreinoController');

Route::put('exercicios/status/{id}', 'ExercicioController@status');
Route::resource('exercicios', 'ExercicioController');

Route::resource('formarTreinos', 'FormarTreinoController');

Route::resource('alunoTreinos', 'AlunoTreinoController');

Route::resource('categoria', 'CategoriaController');
