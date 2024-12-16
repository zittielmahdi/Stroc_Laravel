@extends('Nav_Admin')
@section('content')
<div id="Container">
    <div id="vertical_container">
        <button id="btn1"></button>
        <h1 id="h-profile">Admin Profile</h1>
        <img id="profile-img" src="https://us.123rf.com/450wm/anatolir/anatolir2011/anatolir201105528/159470802-jurist-avatar-icon-flat-style.jpg?ver\\u003d6">
        <h1 id="h-Name">Nom</h1>
        <h3>{{auth()->user()->name}}</h3>
        <h1 id="h-Email">email</h1>
        <h3>{{auth()->user()->email}}</h3>
        <div id="log"><a id="logout" href="{{route('logout')}}">Se déconnecter</a></div>
    </div>
    <div id="small_container">
        @foreach ($employes as $employe )
        <div class="card">
            <img src="{{asset('Uploads/Images/'.$employe->image)}}">
            <h1>{{$employe->full_name}}</h1>
            <h1>{{$employe->email}}</h1>
            <div id="description" > <h1>{{$employe->description}}</h1></div>
            <div id="btn_cont">
            <a class="btn" id="edit_btn" href="{{url('/edit_employe/'.$employe->id)}}">Editer</a>
            <a class="btn" id="supp_btn" href="{{url('/remove_emp/'.$employe->id)}}" >Supprimer</a>
            </div>

        </div>
        @endforeach

    </div>
</div>
<style>
    #btn_cont{
        margin-top: 30px;
    }
    .btn{
      border-radius: 1em;
      border: none;
      font-weight: 900;
      font-family: Arial, Helvetica, sans-serif;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      transition: background-color 0.3s;
    }
    #edit_btn{
        background-color: #4CAF50; /* Green */
    }
    #edit_btn:hover {
        background-color: #45a049; /* Darker Green */
    }
    #supp_btn{
        background-color: #f44336; /* Red */
    }
    #supp_btn:hover {
        background-color: #d32f2f; /* Darker Red */
    }
    .card{
        height:60%;
        background-color: #f5f5f5; /* Light Gray */
        width: 30%;
        word-break: break-all;
        float: left;
        border-radius: 2em;
        margin-top: 50px;
        margin-left: 11%;
        padding: 12px 24px;
        transition: box-shadow 0.3s;
        overflow-y: scroll;
        margin-bottom:20px;
    }
    .card:hover{
        box-shadow: 0 0 12px #ccc; /* Light Gray Shadow */
    }
    #description{
        overflow-y: scroll;
        height: 30%;
    }
    .card>img{
     width: 200px;
     height: 200px;
     border-radius: 8em;
    }
    #Container {
        display: flex;
        height: 100dvh;
    }

    #vertical_container {
        position: absolute;
        height: 100vh;
        background-color: blue;
        width: 20%;
        left: -20%;
        transition: 0.5s;
        z-index: 1;
        text-align: center;
    }

    #small_container {
        position: absolute;
        height: 100%;
        width: 100%;
        text-align: center;
        background-color:lightskyblue;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        overflow-y: scroll;
    }

    #btn1{
      position: absolute;
      border-radius: 4em;
      border: none;
      padding: 5px 5px;
      background-color:red;
      box-shadow: 0 0 12px white;
      right:-15%;
      top: 50%;
    }

    #profile-img {
        height: 100px;
        width: 100px;
        border-radius: 4em;
    }

    #h-profile,
    #h-Name,
    #h-Email {
        color: white;
        font-weight: bold;
    }

    h3 {
        color: white;
        font-weight: bold;
    }

    #logout {
        text-decoration: none;
        color: white;
        font-weight: bold;
        background-color: #f44336; /* Red */
        border-radius: 2em;
        padding: 12px 20px;
        transition: background-color 0.3s;
    }

    #logout:hover {
        background-color: #d32f2f; /* Darker Red */
    }

    #log {
        margin-top: 70px;
    }
</style>
<script>
    var isOpen = false;

    function openMe() {

        if (isOpen == true) {
            document.getElementById("vertical_container").style.left = -20 + "%";
            isOpen = false
        } else {
            document.getElementById("vertical_container").style.left = 0 + "%";
            isOpen = true
        }
    }

    document.getElementById("btn1").addEventListener("click", openMe);
</script>

@stop
