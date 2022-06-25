@extends('layouts.page')

@section('title', 'Home') 


@section('script')    
    <link rel='stylesheet' href='{{ asset('css/home.css') }}'>
    <script src='{{ asset('js/home.js') }}' defer></script>
    <script> const URL_HOME = "{{route('home')}}"; </script>    
    <script> const URL_HOME_LOAD = "{{route('home_load')}}"; </script>     

@endsection

@section('info')
    <h1>
        <strong>Scopri il mondo della lotta</strong></br>
        <em>Notizie, articoli e molto altro...</em></br>
    </h1>
@endsection

@section('menu')
    <a href="{{ route('home/cinema') }}">Cinema</a>
    <a href="{{ route('home/info')}}">Info</a>
    <a href="{{ route('home/blog') }}">Blog</a>
    @if (session('username'))
    <a class='user-button' href="{{ route('logout') }}">{{session('username')}}</a>
    @endif
@endsection

@section('menu_t')
    <a href="{{ route('home/cinema') }}">Cinema</a>
    <a href="{{ route('home/info')}}">Info</a>
    <a href="{{ route('home/blog') }}">Blog</a>
    @if (session('username'))
    <a href="{{ route('logout') }}">{{session('username')}}</a>
    @endif
@endsection

@section('contenuto')

@endsection

@section('footer')
    <div id="media"></div>
    <p>Per informazioni generali contattare lo staff</p>
    <em>Creato da Simone Squillaci</em>
@endsection