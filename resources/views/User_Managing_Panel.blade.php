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
        @foreach ($users as $user )
        <div id="personnal_card">
            <img src="https://c1.klipartz.com/pngpicture/823/765/sticker-png-login-icon-system-administrator-user-user-profile-icon-design-avatar-face-head.png">
            <div id="personnal_desc">
                <h1>{{$user->name}}</h1>
                <h1>{{$user->email}}</h1>
                @foreach ($user->roles as $role )
                <h1 style="color: lightgreen;">{{$role->role}}</h1>
                @if ($role->role =="User")

                <a href="{{url('/delete_user/'.$user->id)}}">Delete</a>

                @endif
                @endforeach


            </div>

        </div>

        @endforeach
    </div>
</div>
<style>
    #personnal_card {
        background-color: beige;
        border-radius: 2em;
        height: 30%;
        width: 25%;
        padding: 30px 20px;
        margin-left: 50px;
        margin-top: 30px;
        transition: 0.5s;
        float: left;
    }

    #personnal_card:hover {
        box-shadow: 0 0 12px darkblue;
    }

    #personnal_card>img {
        border-radius: 4em;
        height: 50%;
        width: 30%;
    }

    #personnal_desc {
        height: 50%;
        overflow-wrap: break-word;
        overflow-y: scroll;
    }

    #personnal_desc>h1 {
        color: gray;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 500;
    }

    #personnal_desc>a {
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 500;
        background-color: red;
        text-decoration: none;
        border-radius: 2em;
        padding: 6px 12px;
    }

    #personnal_desc>a:hover {
        color: red;
        background-color: white;
        padding: 8px 16px;
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
        overflow-y: scroll;
        background-color: lightblue;
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
        background-color: red;
        border-radius: 2em;
        padding: 12px 20px;
    }

    #logout:hover {
        color: red;
        background-color: white;
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
