<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loginSession(){
        if(session('user_id') != null) {
            return redirect('home');
        }
        else {
            $valid_username = true;
            $valid_password = true;
            $global_valid= true;
            return view('login')->with("valid_username",$valid_username)->with("valid_password",$valid_password)->with("global_valid",$global_valid);
        }
    }

    public function checkLogin(){
        $valid_username = true;
        $valid_password = true;
        $global_valid=true;
        $user = User::where('username', request('username'))->first();
        if($user != null && password_verify(request('password'), $user->password)){
            Session::put('user_id', $user->user_id);
            Session::put('username', $user->username);
            //Aggiunto per MDB
            Session::put('email',$user->email);
            Session::put('nome',$user->nome);
            Session::put('cognome',$user->cognome);
            return redirect('home');
        }else{
            if(empty(request('username')))
                $valid_username=false;
            if(empty(request('password')))
                $valid_password=false;
            if($user==null || !password_verify(request('password'), $user->password))
                $global_valid=false;
            return view('login')->with("valid_username",$valid_username)->with("valid_password",$valid_password)->with("global_valid",$global_valid);
        }
    }



    public function logout() {
        Session::flush();  
        return redirect('login');
    }

    public function viewPage(){
        return view('login');
    }

}
?>
