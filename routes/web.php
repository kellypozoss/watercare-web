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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('sesion', function () {
    return View::make('sesion');
});

Route::post('sesion', function () {
    Session::put('correo', Input::get('correo'));
    Session::flash('nombre', Input::get('nombre'));
    $cookie = Cookie::make('ciudad', Input::get('ciudad'), 30);
    return Redirect::to('sesion-2')->withCookie($cookie);
});
Route::get('sesion-2', function(){
    $return = '<head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>';
    $return .= '<p>Tu correo de la sesion es: '. Session::get('correo') .'.<br>';
    $return .= 'Tu nombre es: '. Session::get('nombre') .'.<br>';
    $return .= 'La ciudad de la cookie es: '. Cookie::get('ciudad') .'.<br></p>';
    echo $return;
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
