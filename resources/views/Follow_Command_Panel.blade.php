@php
use App\Models\Product;
@endphp

@extends('Home')
@section('content2')
<div id="command_container">
    <div id="img_container">
        <img src="{{asset('Uploads/Images/'.Product::withTrashed()->find($command->product_id)->image)}}">
    </div>
    <div id="desc_container">
        <h1>ID Commande:{{$command->id}}</h1>
        <h1>Marque Produit:{{Product::withTrashed()->find($command->product_id)->brand}}</h1>
        <h1>Nom Produit:{{Product::withTrashed()->find($command->product_id)->product_name}}</h1>
        <h1>Quantity Commande:{{$command->quantity}}</h1>
        <h1>Totale:{{$command->total}}$</h1>
        <div id="status">
           <span id="payment_state">Payer</span>
           <span id="in_deliverence_state">en cour de livraison</span>
           <span id="delivered_state">Livrer</span>
        </div>
    </div>
</div>
<script>
    var status="{{$command->Status}}"
    if (status==2) {
        document.getElementById("in_deliverence_state").style.backgroundColor="lightgreen";
    }
    if (status==3) {
        document.getElementById("in_deliverence_state").style.backgroundColor="lightgreen";
        document.getElementById("delivered_state").style.backgroundColor="lightgreen";
    }
</script>
<style>
    #payment_state{
        background-color: lightgreen;
        color: white;
        padding: 12px 24px;
        border-radius: 0.5em;
    }
    #in_deliverence_state{
        background-color: red;
        color: white;
        padding: 12px 24px;
        border-radius: 0.5em;
    }
    #delivered_state{
        background-color: red;
        color: white;
        padding: 12px 24px;
        border-radius: 0.5em;
    }
    #status{
       display:flex;
       justify-content: space-around;
       background-color: whitesmoke;
       position: relative;
       top: 20%;
       padding-top: 20px;
       padding-bottom: 20px;
    }
    #command_container{
        display: flex;
        height: 100vh;
        width: 100%;
        font-family:Georgia, 'Times New Roman', Times, serif;
        font-weight: 900;
        background-color: white;
        color: green;
    }
    #img_container{
        height: 100%;
        width: 50%;
    }
    #img_container img{
        height: 100%;
        width: 100%;
    }
    #desc_container{
        height: 100%;
        width: 50%;
        text-align: center;
    }
    #desc_container>*{
       margin-top: 30px;
    }
</style>
@stop
