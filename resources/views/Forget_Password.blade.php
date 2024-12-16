@extends('Empty_Nav')
@section('content')
<div id="container">
    <form action="{{route('send_token_back')}}" method="POST">
        @csrf
        <h1>Vous recevrez un message dans votre boite Mail</h1>
        <input type="email" name="email" placeholder="email">
        <button type="submit">Envoyer</button>
        <div id="link">Revenez a <a href="{{route('login_page')}}">L`Identification</a></div>
    </form>
</div>

<style>
   h1{
    color: darkblue;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
   }
    #container{
        display:flex;
        justify-content: center;
        align-items: center;
        height: 100dvh;
        background-color: beige;
    }

    input{
        width: 40%;
        height: 5%;
        margin-top: 50px;
        border-radius: 3em;
        border: 3px solid blue;
        padding: 5px 10px;
    }
    button{
        background-color: darkblue;
        color: white;
        border-radius: 4em;
        height: 7%;
        width: 20%;
        border:none;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }
    button:hover{
        background-color: white;
        color: darkblue;
        box-shadow: 0 0 12px darkblue;
    }
    #link{
        margin-top: 40px;
    }
    form {
     text-align: center;
     height: 80%;
     width: 80%;
    }
</style>
@stop
