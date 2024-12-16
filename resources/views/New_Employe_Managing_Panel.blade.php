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
         <div id="img-container">
           <img src="https://hr.sparkhire.com/wp-content/uploads/2014/04/When-You-Cant-Find-That-Perfect-Candidate.jpg">
           <a id="emp_link" href="{{route('new_employe_managing_panel2')}}">Voir Nos Employees</a>
        </div>
         <div id="form-container">

          <form action="{{route('add_new_employee_route')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Ajouter Un Employee</h1>
            <input type="text" name="full_name" placeholder="nom complet"><br>
            <input type="text" name="email" placeholder="email"><br>
            <textarea name="description" placeholder="description" cols="30" rows="10"></textarea><br>
            <input type="file" name="image"><br>
            <button type="submit">Ajouter</button>
          </form>
         </div>
    </div>
</div>
<style>
    #emp_link{
        padding: 6px 12px;
        border-radius: 1em;
        color: white;
        background-color: blue;
        font-weight: 900;
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: none;
        position: absolute;
        margin-top: 42%;
        margin-left: 18.5%;
    }
    #img-container{
        height: 100%;
        width: 50%;
        display: flex;
        text-align: center;
    }
    #img-container img{
        height: 100%;
        width: 100%;
    }
    #form-container{
      text-align: center;
      width: 50%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    #form-container button{
     background-color: darkslateblue;
     border: none;
     color: white;
     transition: 0.5s;
    }
    #form-container button:hover{
     background-color: white;
     color: darkslateblue;
     padding: 6px 12px;
     box-shadow: 0 0 12px darkslateblue;
    }
    form>*{
        margin-top: 50px;
        height: 30px;
        width: 500px;
        border-radius: 1em;
        font-weight: 900;
        font-family: Arial, Helvetica, sans-serif;


    }
    h1{
        color: darkslateblue;
    }

    form>input,textarea{
        border: 3px solid darkslateblue;
        padding: 6px 12px;
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
        display: flex;

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
