<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', CurriculumController::class);
Route::get('/seeModelMail', function(){
    $x = [
        'Nome' => 'Askdja asd ',
        'Email' => 'bigcouve2@gmail.com',
        'Telefone' => '18923193182',
        'Observações' => 'alguma observacao aqui',
        'Escolaridade' => 'pos graduacao',
        'Cargo Desejado' => 'Desenvolvedor Full Stack'
    ];
    $y = 'Algum nome de arquivo';

    return new App\Mail\CurriculumMail($x, $y, 'arquivo aqui');
});