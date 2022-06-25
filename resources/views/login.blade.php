@extends('layouts.sign')

@section('script')    
<link rel='stylesheet' href='{{ asset('css/login.css') }}'>
<script> const URL_LOGIN = "{{route('login')}}"; </script>    

@endsection

@section('title', 'Login')

@section('contenuto')
    <main>
        <form name='form-login' method='post' id="main-item">
            @csrf
            <h1>Login</h1>
            <div id="div-login">
                <input type='text' id="input" name='username' placeholder="Nome utente">
            </div>
            <div id="div-login">
                <input type='password'id="input" name='password' placeholder="Password">

                @if($valid_username === false && $valid_password === true)
                    <p id='errore'> Inserire username</p>
                @endif

                @if($valid_password === false && $valid_username === true)
                    <p id='errore'> Inserire password</p>
                @endif

                @if($global_valid === false && $valid_password === true && $valid_username === true)
                    <p id='errore'> Utente o password errato</p>
                @endif
                        
            </div>
       
            <button type='submit'>Accedi</button>
        </form>  
        <div id="iscrizione">
                        <p>Non hai un account?<a href="{{ route('registrazione') }}"> iscriviti</a><p>
        </div>
     </main>
@endsection