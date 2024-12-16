@php
use App\Models\Product;
@endphp
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
        <h1>Suivre les Commandes de vos clients</h1>
        <table>
            <thead>
                <tr>
                    <td>
                        ID Commande
                    </td>
                    <td>
                        Nom Client
                    </td>
                    <td>
                        Email Client
                    </td>
                    <td>
                        Nom Produit
                    </td>
                    <td>
                        Marque
                    </td>
                    <td>
                        Quantite
                    </td>
                    <td>
                        Total
                    </td>
                    <td>
                        Etat Actuel
                    </td>
                    <td>
                        Valider Etat
                    </td>
                    <td>
                       Voir Statistique
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($Clients as $Client)

                @foreach ($Client->commands as $command)
                <tr>
                    <td>{{$command->id}}</td>
                    <td>{{$Client->name}}</td>
                    <td>{{$Client->email}}</td>
                    <td>{{Product::withTrashed()->find($command->product_id)->product_name}}</td>
                    <td>{{Product::withTrashed()->find($command->product_id)->brand}}</td>
                    <td>{{$command->quantity}}</td>
                    <td>{{$command->total}}$</td>
                    <td>{{$command->Status}}</td>
                    <td>
                        <form action="{{url('/update_stat/'.$command->id)}}" method="POST">
                        @csrf
                        <select name="Status">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                        <button type="submit">Valider</button>
                        </form>
                    </td>
                    <td class="See_Stat">
                        <a href="{{route('chart_managing_panel')}}">Voir</a>
                    </td>
                </tr>
                @endforeach

                @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
    .See_Stat{
     text-align: center;
     background-color: darkblue;
    }
    .See_Stat>a{
     text-decoration: none;
     color: white;
     font-weight: 900;
     font-family: Arial, Helvetica, sans-serif;
    }
    thead{
        background-color:black ;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        font-weight: 900;
    }

    thead td{
     margin: 5px 10px;
     padding: 4px 8px;
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
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: whitesmoke;
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
