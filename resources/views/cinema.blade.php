@extends('layouts.page')

@section('title', 'Cinema')

@section('script')
    <link rel='stylesheet' href='{{ asset('css/cinema.css') }}'>
    <script src='{{ asset('js/cinema.js') }}' defer></script>
    <script> const URL_CINEMA = "{{route('cinema')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>  

@endsection

@section('menu')
    <a href="{{ route('cinema/info') }}">Info</a>  
    <a href="{{ route('cinema/blog') }}">Blog</a>
    <a href="{{ route('cinema/home')}}">Home</a>
    @if (session('username'))
    <a class='user-button' href="{{ route('logout') }}">{{session('username')}}</a>
    @endif
@endsection

@section('menu_t')
    <a href="{{ route('cinema/info') }}">Info</a>  
    <a href="{{ route('cinema/blog') }}">Blog</a>   
    <a href="{{ route('cinema/home')}}">Home</a> 
    @if (session('username'))
    <a href="{{ route('logout') }}">{{session('username')}}</a>
    @endif
@endsection

@section('contenuto')
    <h1 class="title-cinema">Sezione Cinema</h1>

    <iframe width="740" height="460" src="https://www.youtube.com/embed/" title="YouTube video player" 
        frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <span id='pref' class='hidden'></span>
    
    <div id="div-cinema">
        <input type='text' id="input" name='video_search' placeholder="Ricerca contenuto">
    </div>
    <button id="send-request" type='submit'>Cerca</button>

    <div id='sep' class='hidden'> </div>
    <div id='video-container'> 

    </div>

    <div id='sep_div'> </div>
    <div id='div-cons'>
        <h1 id='title-sub'>Consigliati</h1>
        <button id='show-cons'></button>
    </div>
    <div id='video-suggeriti'> 
        
    </div>
        
    <div id='sep_div'> </div>
    <div id='div-cons'>
        <h1 id='title-sub'>Preferiti</h1>
        <button id='show-pref'></button>
    </div>
    <div id='video-preferiti'> 
        
    </div>
@endsection

@section('footer')
    <p>Per informazioni generali contattare lo staff</p>
    <em>Creato da Simone Squillaci</em>
@endsection