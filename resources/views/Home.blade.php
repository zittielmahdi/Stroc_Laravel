@extends('Nav')
@section('content')
<div id="Container">
    <div id="vertical_container">
        <button id="btn1"></button>
        <h1 id="h-profile">User Profile</h1>
        <img id="profile-img" src="https://cdn.vectorstock.com/i/preview-1x/17/61/male-avatar-profile-picture-vector-10211761.jpg">
        <h1 id="h-Name">Nom</h1>
        <h3>{{auth()->user()->name}}</h3>
        <h1 id="h-Email">email</h1>
        <h3>{{auth()->user()->email}}</h3>
        <div id="log"><a id="logout" href="{{route('logout')}}">Se déconnecter</a></div>
        <div id="cont_panier"><a id="panier" href="{{route('user_shopping_list')}}">Voir votre panier</a></div>
    </div>
    <div id="small_container">
        @yield('content2')
    </div>
</div>
<style>
    #btn1{
        border-radius: 2em;
        background-color: lawngreen;
        border: none;
        height: 12px;
        width: 12px;
        box-shadow: 0 0 30px lightgreen;
    }
    #Container{
        display: flex;
        height: 100dvh;
    }
    #vertical_container{
        position: absolute;
        height: 100vh;
        background-color: orange;
        width: 20%;
        left:-20%;
        transition: 0.5s;
        z-index:99;
        text-align: center;
    }
    #small_container{

        height: 100%;
        width: 100%;
    }
    #btn1{
      position: absolute;
      right:-15%;
      top: 50%;
      z-index:99;
    }
    #profile-img{
        height: 100px;
        width: 100px;
        border-radius:4em;
    }
    #h-profile,#h-Name,#h-Email{
        color: white;
        font-weight: bold;
    }
    h3{
        color: white;
        font-weight: bold;
    }
    #logout{
      text-decoration: none;
      color:white;
      font-weight: bold;
      background-color: red;
      border-radius: 2em;
      padding: 12px 20px;
    }
    #logout:hover{
      color:red;
      background-color: white;
    }
    #log{
     margin-top: 70px;
    }
    #panier{
      text-decoration: none;
      color:orange;
      font-weight: bold;
      background-color: white;
      border-radius: 2em;
      padding: 12px 20px;
    }
    #cont_panier{
        margin-top: 70px;
    }
</style>
<script>
    var isOpen=false;
function openMe(){

    if (isOpen==true) {
        document.getElementById("vertical_container").style.left=-20+"%";
        isOpen=false
    }
    else{
        document.getElementById("vertical_container").style.left=0+"%";
        isOpen=true
    }
}

document.getElementById("btn1").addEventListener("click",openMe);
</script>

@stop
