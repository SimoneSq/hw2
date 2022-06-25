<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class RegisterController extends BaseController
{

    public function create(){
        $request = request();

        if($this->controlloRegistrazione($request) === 0){
                $new_utente = new User;
                $new_utente->username = $request['username'];
                $new_utente->nome = $request['nome'];
                $new_utente->cognome = $request['cognome'];
                $new_utente->email = $request['email'];
                $new_utente->password = password_hash($request['password'],PASSWORD_BCRYPT);
                if ($new_utente->save()) { 
                        Session::put('user_id', $new_utente->user_id);
                        Session::put('username', $new_utente->username);
                        return redirect('home');
                } 
                else {
                        return redirect('registrazione');
                }
                
        }else{
                return redirect('registrazione');
        }

    }

    public function controlloRegistrazione($dati_form){
        $error = array();

        //Controllo Nome
        if(!preg_match('/^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/', $dati_form['nome'])){ 
                $error[]="Nome non valido";
        }

        //Controllo Cognome
        if(!preg_match('/^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/', $dati_form['cognome'])){ 
                $error[]="Cognome non valido";
        }

        //Controllo Username
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/',$dati_form['username'])){
                $error[] = "L'username contiene caratteri non consentiti"; 
        }else{
                $username = User::where('username',$dati_form['username'])->first();
                if($username !== null){
                        $error[]="Username già utilizzato";
                }
        }

        //Controllo password
        if(strlen($dati_form["password"])<8){
                $error[]="Caratteri insufficienti";
        }
        //Controllo conferma password
        if($dati_form["password"] != $dati_form["conf-password"]){
                $error[]="Errore conferma password";
        }
        
        //Controllo email
        if(!filter_var($dati_form['email'],FILTER_VALIDATE_EMAIL)){
                $error[]="E-mail non valida";
        }else{
                $email = User::where('email',$dati_form['email'])->first();
                if($email !== null){
                        $error[]="Email già utilizzata";
                }
        } 

        return count($error);
    }

    public function checkUsername($q) {
        $controllo = User::where('username', $q)->exists();
        return ['exist' => $controllo];
    }

    public function checkEmail($q) {
        $controllo = User::where('email', $q)->exists();
        return ['exist' => $controllo];
    }

    public function viewPage(){
        if(session('user_id') == null) {
                return view('register');
        }else {
                return redirect('home');
        }
    }

    public function login(){
        return redirect('login');
    }

}
?>