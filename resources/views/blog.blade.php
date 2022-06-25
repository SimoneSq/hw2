@extends('layouts.page')

@section('title', 'Blog') 

@section('script')    
    <link rel='stylesheet' href='{{ asset('css/blog.css') }}'>
    <script src='{{ asset('js/blog.js') }}' defer></script>
    <script> const URL_BLOG = "{{route('blog')}}"; </script>    
    <script> const URL_BLOG_LOAD = "{{route('comment_load')}}"; </script>    

@endsection

@section('info')
    <h1>
        <strong>Scopri il mondo della lotta</strong></br>
        <em>Notizie, articoli e molto altro...</em></br>
    </h1>
@endsection

@section('menu')
    <a href="{{ route('blog/cinema') }}">Cinema</a>
    <a href="{{ route('blog/info') }}">Info</a>
    <a href="{{ route('blog/home') }}">Home</a>
    @if (session('username'))
    <a class='user-button' href="{{ route('logout') }}">{{session('username')}}</a>
    @endif
@endsection

@section('menu_t')
    <a href="{{ route('blog/cinema') }}">Cinema</a>
    <a href="{{ route('blog/info') }}">Info</a>
    <a href="{{ route('blog/home') }}">Home</a>
    @if (session('username'))
    <a href="{{ route('logout') }}">{{session('username')}}</a>
    @endif
@endsection

@section('contenuto')
    <div class="scroll-box">
            
    </div>
    <textarea type="text" id="input" name='comment' placeholder="  Inserisci commento"></textarea>
    <button id="send-comment" type='submit'>Commenta</button>
@endsection

@section('footer')
    <p>Per informazioni generali contattare lo staff</p>
    <em>Creato da Simone Squillaci</em>
@endsection