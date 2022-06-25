<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Information;


class InfoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function infoView(){
        if(session('user_id') != null) {
            return view('info');
        }
        else {
            return redirect('login');
        }
    }
    
    public function insertComment($q){
        $new_info = new Information;
        $new_info -> username = Session::get('username');
        $new_info -> comment = $q;

        if($new_info->save()){
            $controllo['controllo'] = true; 
        }else{
            $controllo['controllo'] = false; 
        }
        return json_encode($controllo);
    }

    public function loadInfo(){
        $username=Session::get('username');
        $comment_array = array();
        $results=Information::where('username',$username)->get();
        foreach($results as $result){
            $postArray[] = array('commento' => $result->comment,'create' => $result->created_at);
        }
        return $results;
    }

    public function blogRedirect(){
        return redirect('blog');
    }

    public function cinemaRedirect(){
        return redirect('cinema');
    }

    public function homeRedirect(){
        return redirect('home');
    }
}
?>
