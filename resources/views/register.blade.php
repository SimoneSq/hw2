@extends('layouts.sign')

@section('script')    
    <link rel='stylesheet' href='{{ asset('css/registrazione.css') }}'>
    <script src='{{ asset('js/registrazione.js') }}' defer></script>
    <script> const URL_REGISTRAZIONE = "{{route('registrazione')}}"; </script>    
    <script> const URL_LOGIN = "{{route('login')}}"; </script>    
@endsection

@section('title', 'Registrazione')

@section('contenuto')
        <main>
            <form name='form-register' method='post'>
                @csrf
                <h1>Registrazione</h1>
                <div class='div_register_utenti'>
                    <div class='label'>
                        <label>Nome</label>
                        <input type='text' id="input" name='nome' placeholder="Mario">
                        <span id="riga">.</span>
                        <span id="errore" class='hidden'>Nome mancante o non valido</span>
                    </div>
                    <div class='label_dex'>
                        <label>Cognome</label>
                        <input type='text' id="input" name='cognome' placeholder="Rossi">
                        <span id="riga_dex">.</span>
                        <span class='hidden' id="span_dex">Cognome mancante o non valido</span>

                    </div>
                </div>
                <div class='div_register'>
                    <label>Nome Utente <input type='text' id="input" name='username' placeholder="Inserire nome utente unico"></label>
                    <span id='username-span' class='hidden'>Nome utente già utilizzato</span>
                </div>
                <div class='div_register'>
                    <label>E-mail <input type='text' id="input" name='email'placeholder="Example@gmail.com"></label>
                    <span id='email-span' class='hidden'>Email non valida</span>
                </div>
                <div class='div_register'>
                    <label>Password <input type='password' id="input" name='password' placeholder="Numero di caratteri minimi 8"></label>
                    <span id="password_span" class='hidden'>La password non rispetta le specifiche</span>
                </div>
                <div class='div_register'>               
                    <label>Conferma Password</label> 
                    <input type='password' id="input" name='conf-password' placeholder="Password inserita nel campo precedente">
                    <span id="conf_pass" class='hidden'>Password non coincidono</span>
                </div>       
                <button type='submit' class="cancella" id='log' >Cancella</button>
                <button type='submit' class="avanti" id='registra'>Avanti</button>
            </form>  
        </main>
@endsection