<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Content;
use App\Models\User;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function caricaContenuti(){
        return Content::all();
    }

    public function Spotify($q){
        //Non funzionavano le variabili env per colpa della cache su bootstrap
        // $id_client = "b3d6fddbe2684067b1b64ce228ad43dc";
        // $secret = "b18142a76f924cd689f6bedecce41099";

        $richiesta = curl_init();
        curl_setopt($richiesta, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
        curl_setopt($richiesta, CURLOPT_POST, 1);
        curl_setopt($richiesta, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($richiesta, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($richiesta, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode('b3d6fddbe2684067b1b64ce228ad43dc:b18142a76f924cd689f6bedecce41099')));
        curl_setopt($richiesta, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode(env('CLIENT_ID').':'.env('CLIENT_SECRET'))));
        $res_con = curl_exec($richiesta);
        $token = json_decode($res_con, true);
        curl_close($richiesta);

        $traccia = urlencode($q);
        $url = 'https://api.spotify.com/v1/search?type=track&q='.$traccia;
        $richiesta_traccia = curl_init();
        curl_setopt($richiesta_traccia, CURLOPT_URL, $url); 
        curl_setopt($richiesta_traccia, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($richiesta_traccia, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token']));
        $res=curl_exec($richiesta_traccia);
        curl_close($richiesta_traccia);

        return $res;
    }

    public function homeView(){
        if(session('user_id') != null) {
            return view('home');
        }
        else {
            return redirect('login');
        }
    }
    
    public function blogRedirect(){
        return redirect('blog');
    }

    public function infoRedirect(){
        return redirect('info');
    }

    public function cinemaRedirect(){
        return redirect('cinema');
    }

}
?>
