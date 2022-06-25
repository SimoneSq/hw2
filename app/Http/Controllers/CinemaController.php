<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Video;


class CinemaController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Youtube($q){
        $key='AIzaSyB2eLWAjld2mnDeAdUpVW37uC4ded63xHE';
        $video = urlencode($q);
        $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$video.'&maxResults=9&type=video&key='.$key;
        $richiesta_video = curl_init();
        curl_setopt($richiesta_video, CURLOPT_URL, $url); 
        curl_setopt($richiesta_video, CURLOPT_RETURNTRANSFER, 1);
        $res=curl_exec($richiesta_video);
        curl_close($richiesta_video);
        return $res;
    }

    public function aggiungiPreferito(){
        $request=request();
        $video_pref=new Video;
        $video_pref -> username = Session::get('username');
        $video_pref -> videoId = $request['videoId'];
        $video_pref -> image = $request['img'];

        if($video_pref->save()){
            $controllo['controllo'] = true; 
        }else{
            $controllo['controllo'] = false; 
        }
        return json_encode($controllo);
    }

    public function controlloPreferito($q){
        $username=Session::get('username');
        if($results=Video::where('username',$username)->where('videoId',$q)->first()){
            $controllo['controllo'] = true; 
        }else{
            $controllo['controllo'] = false; 
        }
        return json_encode($controllo);
    }

    public function rimuoviPreferito($q){
        $username=Session::get('username');
        $result=Video::where('username',$username)->where('videoId',$q)->delete();
        if($result){
            $controllo['controllo'] = true; 
        }else{
            $controllo['controllo'] = false; 
        }
        return json_encode($controllo);
    }

    public function caricaPreferiti(){
        $username=Session::get('username');
        if($results=Video::where('username',$username)->get()){
            return json_encode($results);
        }else{
            $controllo['controllo'] = false;
            return json_encode($controllo);
        }
        
    }

    public function caricaConsigliati($q){
        if($results=Video::where('username',$q)->get()){
            return json_encode($results);
        }else{
            $controllo['controllo'] = false;
            return json_encode($controllo);
        }
        
    }

    public function cinemaView(){
        if(session('user_id') != null) {
            return view('cinema');
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

    public function blogRedirect(){
        return redirect('blog');
    }

}
?>
