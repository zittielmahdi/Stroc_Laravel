@extends('Empty_Nav')
@section('content')
<div id="container">
    <form action="{{route('change_password')}}" method="post">
        @csrf
        <h1>Modifier votre mot de passe</h1>

        <div>
            <input type="email" name="email" placeholder="email" value="{{$email}}">
        </div>
        <div>
            <input type="password" name="password" placeholder="password">
        </div>
        <div>
            <input type="password" name="password_confirmation" placeholder="confirmer password">
        </div>

            <button type="submit">Modifier mot de passe</button>

    </form>
</div>

<style>
#container{
    display:flex;
    height: 100dvh;
    justify-content: center;
    align-items: center;
}
form{
    height: 80%;
    width: 80%;
    text-align: center;
}
form>div>input{
    height: 10%;
    width: 50%;
    padding: 12px 24px;
    border-radius: 3em;
    border: 4px solid blue;
}
form>div{
    margin-top: 50px;
}
form>button{
   margin-top: 50px;
   border-radius: 3em;
   color: white;
   background-color: darkblue;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: 900;
   width: 50%;
   height: 7%;
   border: none;
}
h1{
    color: darkblue;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
}
</style>

@stop
