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
      <div id="user_manager_container">
           <img id="user_manager_img" src="https://user.oc-static.com/upload/2021/06/24/16245293548418_P1C5_Imple%CC%81mentez-une-gestion-de-compte-pour-lutilisateur.png">
           <h1 id="user_manager_desc"> gerer les utilisateurs avec un seul click <a href="{{route('users_managing_panel')}}">Click!</a></h1>
      </div>
      <div id="emp_manager_container">
           <img id="emp_manager_img" src="https://1.bp.blogspot.com/-ekTHfqFS2hA/Xmn91sniAqI/AAAAAAAAEaE/ufS1zn_78nomXCSwRyzh3HKFTNMZMbaUACLcBGAsYHQ/s1600/5%2BTips%2Bto%2BChoose%2Bthe%2BRight%2BCandidate.jpg">
           <h1 id="emp_manager_desc"> gerer vos employee avec un seul click <a href="{{route('new_employe_managing_panel')}}">Click!</a></h1>
      </div>
      <div id="product_manager_container">
           <img id="product_manager_img" src="https://static.doofinder.com/main-files/uploads/2021/02/producto-catalogo.png">
           <h1 id="product_manager_desc"> gerer vos produits avec un seul click <a href="{{route('product_managing_panel')}}">Click!</a></h1>
      </div>
      <div id="pub_manager_container">
           <img id="pub_manager_img" src="https://png.pngtree.com/png-clipart/20201225/ourmid/pngtree-flat-wind-time-management-concept-vector-decoration-png-image_2595501.jpg">
           <h1 id="pub_manager_desc"> gerer vos publications avec un seul click <a href="{{route('publication_managing_panel')}}">Click!</a></h1>
      </div>
      <div id="com_manager_container">
           <img id="com_manager_img" src="https://www.welcometrack.com/hubfs/Imported_Blog_Media/20946004-2.jpg#keepProtocol">
           <h1 id="com_manager_desc"> Suiver les commandes de vos clients avec un seul click <a href="{{route('follow_clients_commands_panel')}}">Click!</a></h1>
      </div>
    </div>
</div>
<style>
    #user_manager_container{
        border-radius: 2em;
        box-shadow: 0 0 12px lightblue;
        margin-top: 30px;
        background-color: lightblue;
        height: 40%;
    }

    #user_manager_desc{
      color:white;
      font-weight: 900;
      font-family: Arial, Helvetica, sans-serif;

    }
    #user_manager_desc>a{
      color:blue;
      background-color: white;
      border-radius: 0.5em;
      padding: 2px 12px;
      text-decoration: none;
      transition: 0.5s;
    }
    #user_manager_desc>a:hover{
     color:white;
      background-color: blue;
    }
    #product_manager_desc>a:hover{
     color:white;
      background-color: lawngreen;
    }
    #pub_manager_desc>a:hover{
     color:white;
      background-color: black;
    }
    #user_manager_img{
    border-radius: 2em;
     height: 70%;
     width: 100%;
    }
    #product_manager_container{
        border-radius: 2em;
        box-shadow: 0 0 12px lightgreen;
        margin-top: 30px;
        background-color: lightgreen;
        height: 40%;
    }
    #product_manager_desc{
      color:white;
      font-weight: 900;
      font-family: Arial, Helvetica, sans-serif;

    }
    #product_manager_desc>a{
      color:lawngreen;
      background-color: white;
      border-radius: 0.5em;
      padding: 2px 12px;
      text-decoration: none;
      transition: 0.5s;
    }
    #product_manager_img{
    border-radius: 2em;
     height: 70%;
     width: 100%;
    }
    #pub_manager_container{
        border-radius: 2em;
        box-shadow: 0 0 12px darkblue;
        margin-top: 30px;
        background-color: darkblue;
        height: 40%;
        margin-bottom: 30px;
    }
    #pub_manager_desc{
      color:white;
      font-weight: 900;
      font-family: Arial, Helvetica, sans-serif;

    }
    #pub_manager_desc>a{
      color:darkblue;
      background-color: white;
      border-radius: 0.5em;
      padding: 2px 12px;
      text-decoration: none;
      transition: 0.5s;
    }
    #pub_manager_img{
    border-radius: 2em;
     height: 70%;
     width: 100%;
    }
    #emp_manager_img{
    border-radius: 2em;
     height: 70%;
     width: 100%;
    }
    #emp_manager_desc{
      color:white;
      font-weight: 900;
      font-family: Arial, Helvetica, sans-serif;

    }
    #emp_manager_desc>a{
      color:gray;
      background-color:white;
      border-radius: 0.5em;
      padding: 2px 12px;
      text-decoration: none;
      transition: 0.5s;

    }
    #emp_manager_desc>a:hover{
     color:white;
      background-color:lightslategray;
    }
    #emp_manager_container{
        border-radius: 2em;
        box-shadow: 0 0 12px black;
        margin-top: 30px;
        background-color: gray;
        height: 40%;
    }
    #com_manager_container{
        border-radius: 2em;
        box-shadow: 0 0 12px darkblue;
        margin-top: 30px;
        background-color:pink;
        height: 40%;
        margin-bottom: 30px;
    }
    #com_manager_desc{
      color:white;
      font-weight: 900;
      font-family: Arial, Helvetica, sans-serif;

    }
    #com_manager_desc>a{
      color:plum;
      background-color: white;
      text-decoration: none;
      border-radius: 0.5em;
      padding: 2px 12px;
      transition: 0.5s;
    }
    #com_manager_desc>a:hover{
      color:whitesmoke;
      background-color: plum;
    }
    #com_manager_img{
    border-radius: 2em;
     height: 70%;
     width: 100%;
    }
    #Container{
        display: flex;
        height: 100dvh;
    }
    #vertical_container{
        position: absolute;
        height: 100vh;
        background-color: blue;
        width: 20%;
        left:-20%;
        transition: 0.5s;
        z-index: 1;
        text-align: center;
    }
    #small_container{
        position:absolute;
        height: 100%;
        width: 100%;
        text-align: center;
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

