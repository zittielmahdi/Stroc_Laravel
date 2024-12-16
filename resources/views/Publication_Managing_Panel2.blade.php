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
        <div>
            @foreach ($pubs as $pub )
            <div class="post_container">
                <h1>{{$pub->title}}</h1>
                <h2>{{$pub->objectif}}</h2>
                <img src="{{asset('Uploads/Images/'.$pub->image)}}">
                <p>{{$pub->description}}</p>
                <a class="delete_link" href="{{url('/delete_pub/'.$pub->id)}}">Supprimer</a>
                <a class="update_link" href="{{url('/get_pub/'.$pub->id)}}">Modifier</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    .post_container {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        word-break: break-word;
    }

    .post_container img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        margin-top: 10px;
    }

    .links {
        margin-top: 20px;
    }

    .delete_link,
    .update_link {
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        text-decoration: none;
        margin-right: 10px;
    }

    .delete_link {
        background-color: #dc3545;
        /* Red color for delete */
    }

    .update_link {
        background-color: #28a745;
        /* Green color for update */
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
        height: 100vh;
        width: 100vw;
        text-align: center;
        overflow-y: scroll;
        display: flex;
        justify-content:center;
    }

    #btn1 {
        position: absolute;
        border-radius: 4em;
        border: none;
        padding: 5px 5px;
        background-color: red;
        box-shadow: 0 0 12px white;
        right: -15%;
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
