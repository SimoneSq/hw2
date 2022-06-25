<?php

use Illuminate\Support\Facades\Route;

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

//Gestione login
Route::get("/login", "App\Http\Controllers\LoginController@loginSession")->name('login');
Route::get("/logout", "App\Http\Controllers\LoginController@logout")->name('logout');
Route::post("/login", "App\Http\Controllers\LoginController@checkLogin");

//Registrazione
Route::post('/registrazione', "App\Http\Controllers\RegisterController@create");

//Controllo registrazione
Route::get('/registrazione/username/{q}', "App\Http\Controllers\RegisterController@checkUsername");
Route::get('/registrazione/email/{q}', "App\Http\Controllers\RegisterController@checkEmail");

//Caricamento contenuti
Route::get('/home/load', "App\Http\Controllers\HomeController@caricaContenuti")->name('home_load');
Route::get('/blog/load', "App\Http\Controllers\BlogController@caricaCommenti")->name('comment_load');
Route::get('/blog/commento/{q}', "App\Http\Controllers\BlogController@inserisciCommento")->name('comment_insert');
Route::get('/blog/commento_mongoDB/{q}', "App\Http\Controllers\InfoController@insertComment")->name('comment_insert_MDB');
Route::get('/info/load', "App\Http\Controllers\InfoController@loadInfo")->name('loadInfo_MDB');


//Parte like
Route::get('/blog/like_controll/{q}', "App\Http\Controllers\BlogController@inserisciCommento")->name('like_control');
Route::get('/blog/upload_like/{q}', "App\Http\Controllers\BlogController@uploadLike");

//Spotify
Route::get('/home/spotify/{q}', "App\Http\Controllers\HomeController@Spotify")->name('home_spotify');

//Youtube
Route::get('/cinema/youtube/{q}', "App\Http\Controllers\CinemaController@Youtube");
Route::post('/cinema/Aggiungi', "App\Http\Controllers\CinemaController@aggiungiPreferito");
Route::get('/cinema/Controllo/{q}', "App\Http\Controllers\CinemaController@controlloPreferito");
Route::get('/cinema/Rimuovi/{q}', "App\Http\Controllers\CinemaController@rimuoviPreferito");
Route::get('/cinema/Carica', "App\Http\Controllers\CinemaController@caricaPreferiti");
Route::get('/cinema/CaricaConsigliati/{q}', "App\Http\Controllers\CinemaController@caricaConsigliati");




//Route reinderizzamento
Route::get('/registrazione', "App\Http\Controllers\RegisterController@viewPage")->name('registrazione');
Route::get('/home', "App\Http\Controllers\HomeController@homeView")->name('home');
Route::get('/blog', "App\Http\Controllers\BlogController@blogView")->name('blog');
Route::get('/info', "App\Http\Controllers\infoController@infoView")->name('info');
Route::get('/cinema', "App\Http\Controllers\CinemaController@cinemaView")->name('cinema');

Route::get('/home/redirect', "App\Http\Controllers\HomeController@blogRedirect")->name('home/blog');
Route::get('/home/redirect/info', "App\Http\Controllers\HomeController@infoRedirect")->name('home/info');
Route::get('/home/redirect/cinema', "App\Http\Controllers\HomeController@cinemaRedirect")->name('home/cinema');

Route::get('/blog/redirect', "App\Http\Controllers\BlogController@homeRedirect")->name('blog/home');
Route::get('blog/redirect/info', "App\Http\Controllers\BlogController@infoRedirect")->name('blog/info');
Route::get('blog/redirect/cinema', "App\Http\Controllers\BlogController@cinemaRedirect")->name('blog/cinema');

Route::get('/info/redirect/cinema',"App\Http\Controllers\infoController@cinemaRedirect")->name('info/cinema');
Route::get('/info/redirect/blog',"App\Http\Controllers\infoController@blogRedirect")->name('info/blog');
Route::get('/info/redirect',"App\Http\Controllers\infoController@homeRedirect")->name('info/home');

Route::get('/cinema/redirect/info',"App\Http\Controllers\cinemaController@infoRedirect")->name('cinema/info');
Route::get('/cinema/redirect/blog',"App\Http\Controllers\cinemaController@blogRedirect")->name('cinema/blog');
Route::get('/cinema/redirect',"App\Http\Controllers\cinemaController@homeRedirect")->name('cinema/home');