@extends('layouts.page')

@section('title', 'Info')

@section('script')
    <link rel='stylesheet' href='{{ asset('css/info.css') }}'>
    <script src='{{ asset('js/info.js') }}' defer></script>
@endsection

@section('menu')
    <a href="{{ route('info/cinema')}}">Cinema</a>
    <a href="{{ route('info/blog') }}">Blog</a>
    <a href="{{ route('info/home')}}">Home</a>
    @if (session('username'))
    <a class='user-button' href="{{ route('logout') }}">{{session('username')}}</a>
    @endif
@endsection

@section('menu_t')
    <a href="{{ route('info/cinema')}}">Cinema</a>
    <a href="{{ route('info/blog') }}">Blog</a>
    <a href="{{ route('info/home')}}">Home</a>   
    @if (session('username'))
    <a href="{{ route('logout') }}">{{session('username')}}</a>
    @endif
@endsection

@section('contenuto')
    <h1 class="title-info">Informazioni generali account:</h1>
    <div id="general_info">
        <div id='info-cont'>
            <p class='personal-info'>Utente:</p>
            <p>{{session('username')}}</p>
        </div>
        <div id='info-cont'>
            <p class='personal-info'>Nome:</p>
            <p>{{session('nome')}}</p>
        </div>
        <div id='info-cont'>
            <p class='personal-info'>Cognome:</p>
            <p>{{session('cognome')}}</p>
        </div>
        <div id='info-cont'>
            <p class='personal-info'>Email:</p>
            <p>{{session('email')}}</p>
        </div>
    </div>

    <div id="count">
        <p id='contatore_commenti'>Numero Commenti:</p>
        <p id='n_comment'> </p>
    </div>

    <div class="scroll-box">
            
    </div>
@endsection

@section('footer')
    <p>Per informazioni generali contattare lo staff</p>
    <em>Creato da Simone Squillaci</em>
@endsection