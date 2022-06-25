<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Comment;



class BlogController extends BaseController
{

    public function caricaCommenti(){
        $utente = session('user_id');
        return DB::select("SELECT *, EXISTS(SELECT * from likes where user='$utente' and post_id=comment) as controllo from comments");

    }

    public function inserisciCommento($q){
        $controllo = array();
        $new_comment = new Comment;
        $new_comment->user_id = Session::get('user_id');
        $new_comment->username = Session::get('username');
        $new_comment->commento = $q;
        $new_comment->n_like = 0;
        $flag=$new_comment->save();
        $controllo['username'] = Session::get('username');
        $controllo['post_id'] = Comment::select('post_id')->orderByDesc("post_id")->limit(1)->first();
        $controllo['commento'] = $q;

        if($flag)
            $controllo['controllo'] = true; 
        else
            $controllo['controllo'] = false; 
        return json_encode($controllo);
    }

    public function uploadLike($q){
        $controllo=User::where('user_id',session('user_id'))->first()->like()->toggle($q);

        if($controllo == true){
            $resp['controllo']=true;
            return json_encode($resp);
        }else{
            $resp['controllo']=false;
            return json_encode($resp);
        }
    }


    public function blogView(){
        if(session('user_id') != null) {
            return view('blog');
        }
        else {
            return redirect('login');
        }
    }

    public function homeRedirect(){
        return redirect('home');
    }

    public function infoRedirect(){
        return redirect('info');
    }

    public function cinemaRedirect(){
        return redirect('cinema');
    }
}
?>
