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
        <h1>Gestion des produits</h1>
        <table>
            <tr id="tr1">
                <td>Nom du Produit</td>
                <td>Marque</td>
                <td>Numero de Serie</td>
                <td>Prix Unitaire</td>
                <td>Tva</td>
                <td>Quantite</td>
                <td>Action</td>
            </tr>
            @foreach ( $products as $product )
            <tr>
                <td>{{$product->product_name}}</td>
                <td>{{$product->brand}}</td>
                <td>{{$product->serial_number}}</td>
                <td>{{$product->price_per_unit}}</td>
                <td>{{$product->tva}}</td>
                <td>{{$product->quantity}}</td>
                <td id="action_links">
                    <a id="delete_link" href="{{url('/delete_product/'.$product->id)}}">Supprimer</a>
                    <a id="edit_link" href="{{url('/edit_product/'.$product->id)}}">Editer</a>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
<style>
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
        overflow-y: scroll;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    table {
        background-color: darkblue;
        height: 10%;
        width: 80%;
        border-radius: 2em;
        padding: 12px 24px;
    }

    td {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 800;
        color: darkblue;
        border-radius: 1em;
        background-color: white;
    }

    #action_links {
     background-color: darkblue;
     display: flex;
     border-radius: 3em;

    }
    #delete_link {
        border-radius: 3em;
        text-decoration: none;
        color: white;
        height: 100%;
        width: 50%;
        background-color: red;
        padding: 12px 24px;
    }
    #edit_link {
        border-radius: 3em;
        text-decoration: none;
        color: white;
        height: 100%;
        width: 50%;
        background-color:lightgreen;
        padding: 12px 24px;
    }
    #tr1 {
        color: darkblue;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 800;
        background-color: white;
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
