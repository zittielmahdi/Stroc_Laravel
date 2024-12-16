@extends('Empty_Nav')
@section('content')
<div id="Big_Container">
    <div id="Small_Container1">
        <img src="https://account.asus.com/img/login_img02.png">
    </div>
    <div id="Small_Container2">

        <form action="{{route('Identificaton')}}" method="POST">
        @csrf
            <h1>S`identifier</h1>
            <div>
                <input type="email" name="email" placeholder="email">
                <p class="danger">
                @error('email')
                    {{$message}}
                @enderror
                </p>
            </div>
            <div>
                <input type="password" name="password" placeholder="password">
                <p class="danger">
                @error('password')
                    {{$message}}
                @enderror
                </p>
            </div>
            <div>
               <button type="submit">Soumettre</button>
               <div>Vous avez pas un Compte?<a href="{{route('signup_page')}}">S`inscrire</a><a href="{{route('forget_password')}}">mot de passe oublier?</a></div>
            </div>



        </form>

    </div>
</div>
<style>
    .danger{
        color: red;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }
    #Big_Container {
        background-color: beige;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 100dvh;
        width: 200dvh;
    }
    a{
        margin-left:10px ;
    }
    #Small_Container1 {
        margin-top:5% ;
        height: 110%;
        width: 50%;
    }

    #Small_Container1>img {
        height: 100%;
        width: 100%;
    }

    #Small_Container2 {
        height: 100%;
        width: 50%;
    }

    #Small_Container2>form {
        height: 100%;
        width: 100%;
        text-align: center;
    }

    #Small_Container2>form>div>input {
        height: 50%;
        width: 80%;
        margin-top: 100px;
        padding: 12px 20px;
        border: 5px solid lightblue ;
        border-radius:2em;

    }
    button{
        height: 50%;
        width: 60%;
        margin-top: 100px;
        padding: 12px 20px;
        background-color: blue;
        color: white;
        font-weight: 900;
        border: none;
        border-radius: 2em;
        margin-bottom: 20px;
    }
    button:hover{
        background-color: white;
        color: blue;
        box-shadow: 0 0 12px lightblue;
    }
    h1{
        margin-top:50px ;
        color:blue;
        text-align: center;
        border-radius: 2em;
        font-weight: bold;
    }
</style>
@stop
