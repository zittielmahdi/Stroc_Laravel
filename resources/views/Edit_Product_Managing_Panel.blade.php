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
            <img src="https://cdn.learnwoo.com/wp-content/uploads/2016/11/Adding-Products_Cropped.png">
            <div><a href="{{route('product_managing_panel2')}}">Voir nos produits</a></div>
        </div>
        <div id="form_container">
            <form action="{{url('/update_product/'.$prod->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1>Ajouter Produit</h1>
                <div><input type="text" value="{{$prod->product_name}}" name="product_name" placeholder="nom du produit"></div>
                <div><input type="text"  value="{{$prod->brand}}" name="brand" placeholder="marque"></div>
                <div><input type="text"  value="{{$prod->serial_number}}" name="serial_number" placeholder="numero de serie"></div>
                <div><input type="text"  value="{{$prod->price_per_unit}}" name="price_per_unit" placeholder="prix unitaire"></div>
                <div><input type="text"  value="{{$prod->tva}}" name="tva" placeholder="tva"></div>
                <div><input type="text"  value="{{$prod->quantity}}" name="quantity" placeholder="quantite"></div>
                <div><input type="file" name="image" ></div>
                <button type="submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<style>
    #img_container {
        height: 100%;
        width: 50%;
    }
    #img_container>img {
        height: 80%;
        width: 100%;
    }
    #img_container>div>a {
        text-decoration: none;
        background-color: orange;
        color: white;
        font-weight: 900;
        font-family: Arial, Helvetica, sans-serif;
        padding: 12px 24px;
        border-radius: 3em;
    }
    #img_container>div>a:hover {
        padding: 15px 30px;
        background-color:beige;
        color:orange;
    }

    #form_container {
        height: 100%;
        width: 50%;
        overflow-y: scroll;
    }
    #form_container>form>h1 {
        color: darkblue;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 900;
    }
    #form_container>form>div>input {
        height: 20%;
        width: 80%;
        margin-top: 50px;
        border-radius: 3em;
        padding: 12px 24px;
        border: 5px solid darkblue;

    }

    #form_container>form>button {
        margin-top: 40px;
        margin-bottom: 30px;
        border-radius: 3em;
        padding: 12px 24px;
        color: white;
        background-color: darkblue;
        border: none;
        width: 70%;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 800;
    }
    #form_container>form>button:hover {
        padding: 15px 30px;
        color: darkblue;
        background-color: beige;
        box-shadow: 0 0 6px darkblue;
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
