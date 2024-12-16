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
       <div id="img_container">
        <img src="https://smashballoon.com/wp-content/uploads/2020/04/types-of-instagram-posts-624x297.jpg" >
        <a href="{{route('publication_managing_panel2')}}">Voir Nos Publications</a>
       </div>
       <div id="form_container">
        <form action="{{url('/update_pub/'.$pub->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Publier</h1>
        <div><input type="text" name="title" placeholder="Titre" value="{{$pub->title}}"></div>
          <div><input type="text" name="objectif"  placeholder="Objectif" value="{{$pub->objectif}}"></div>
          <div><textarea placeholder="Description"   name="description" cols="30" rows="20">{{$pub->description}}</textarea></div>
          <div><input type="file" name="image"></div>
          <button type="submit">Modifier</button>
        </form>
       </div>
    </div>
</div>
<style>
    #img_container{
     height: 100%;
     width: 50%;
     display: flex;
     justify-content: center;
     align-items: center;
    }
    #img_container>a{
    position: absolute;
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
    font-weight:bold;
    color: pink;
    background-color: white;
    padding: 12px 24px;
    border-radius: 2em;
    }
    #img_container>a:hover{
    color: white;
    background-color: pink;
    padding: 15px 30px;
    }
    #img_container>img{
     height: 100%;
     width: 100%;
    }
    #form_container{
     height: 100%;
     width: 50%;
     overflow-y: scroll;
    }
    #form_container>form>h1{
     color: pink;
     font-weight: 900;
     font-family: Arial, Helvetica, sans-serif;
    }
    #form_container>form>div{
    margin-top: 60px;
    }
    #form_container>form>div>input,textarea{
    height: 20%;
    width: 70%;
    border-radius: 3em;
    border: 12px solid pink;
    padding: 8px 16px;
    }
    #form_container>form>button{
     background-color: pink;
     color: white;
     border-radius: 3em;
     border: none;
     padding: 12px 24px ;
     width: 60%;
     font-weight: 900;
     margin-bottom: 20px;
     margin-top: 100px;
    }
    #form_container>form>button:hover{
     background-color: beige;
     color:violet;
     padding: 15px 30px ;
    }
    #Container {
        display: flex;
        height: 100dvh;
    }

    #vertical_container {
        position: absolute;
        height: 100%;
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
        display: flex;
        justify-content: center;
        align-items: center;
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
