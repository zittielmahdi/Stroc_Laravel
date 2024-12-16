@extends('Empty_Nav')
@section('content')
<div id="Big_Container">
    <div id="Small_Container1">
        <img src="https://cdni.iconscout.com/illustration/premium/thumb/sign-up-page-1886582-1598253.png">
    </div>
    <div id="Small_Container2">

        <form action="{{ route('Register') }}" method="POST">
           @csrf
            <h1>S`inscrire</h1>
            <div>
                <input type="text" name="name" placeholder="Nom complet"><br>
                <p class="danger">
                    @error('name')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <div>
                <input type="email"  name="email" placeholder="email"><br>
                <p class="danger">
                @error('email')
                    {{$message}}
                @enderror
                </p>

            </div>
            <div>
                <input type="password" name="password" placeholder="password"><br>
                <p class="danger">
                @error('password')
                    {{$message}}
                @enderror
                </p>

            </div>
            <div>
                <input type="password" name="password_confirmation" placeholder="confirme password"><br>
                <p class="danger">
                @error('password_confirmation')
                    {{$message}}
                @enderror
                </p>

            </div>
            <div >
               <button type="submit">Soumettre</button>
               <div id="link">Vous avez un Compte?<a href="{{route('login_page')}}">S`identifier</a></div>
            </div>



        </form>

    </div>
</div>
<style>
.danger{
    color: red;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
}
#Big_Container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 100dvh;
        background-color: beige;
    }

    #Small_Container1 {

        height: 100%;
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
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
        margin-top: 70px;
        padding: 12px 20px;
        border: 5px solid orange;
        border-radius: 2em;
    }
    button{
        height: 50%;
        width: 60%;
        margin-top: 70px;
        padding: 12px 20px;
        background-color: orange;
        color: white;
        font-weight: 900;
        border: none;
        border-radius: 2em;
        margin-bottom:30px ;
    }
    button:hover{
        background-color: white;
        color: orange;
        box-shadow: 0 0 12px orange;
    }
    h1{
        margin-top:50px ;
        color:orange;
        text-align: center;
        border-radius: 2em;
        font-weight: bold;
    }
</style>
@stop
