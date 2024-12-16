@extends('Home')
@section('content2')

<div id="prod_container">

  <div class="search-bar">
    <form action="{{route('product_review_panel')}}" method="POST">
     @csrf
     <input type="text" name="searched_prod" placeholder="Chercher">
     <button type="submit">Chercher</button>
    </form>
  </div>



  <div class="product-list">
    @foreach ($products as $product)
      <div id="product_card">
        <img src="{{ asset('/Uploads/Images/'.$product->image) }}">
        <div class="desc">
          <h5>Produit: {{ $product->product_name }}</h5>
          <h5>Marque: {{ $product->brand }}</h5>
          <h5>Numero de serie: {{ $product->serial_number }}</h5>
          <h5>Prix Unitaire: {{ $product->price_per_unit }}$</h5>
          <h5>Tva: {{ $product->tva }}%</h5>
          <h5>Quantitee: {{ $product->quantity }}</h5>
        </div>
        <a href="{{url('/chosen_product_details/'.$product->id)}}">{{ $product->price_per_unit }}$</a>
      </div>
    @endforeach
    </div>

</div>

<style>
#prod_container{
    height:100dvh;
    overflow-y: scroll;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    color:gray;
    background-color: lightgray;
}
.search-bar{
    margin-top:30px;
    height: 10%;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}
.search-bar input{
  height: 30px;
  width: 400px;
  border-radius: 0.5em;
  border: none;
}
.search-bar button{
  height: 30px;
  width: 100px;
  background-color: orange;
  border-radius: 0.5em;
  color: white;
  font-weight: bold;
  font-family: Arial, Helvetica, sans-serif;
  border: none;
}
.product-list{
   height: 90%;
}
#product_card{
    height:auto;
    width: 40%;
    background-color:white;
    float: left;
    margin-left: 7%;
    text-align: center;
    margin-top: 3%;
    margin-bottom:2%;
    border-radius: 2em;
    padding-bottom: 20px;
    transition: 0.5s;
}
#product_card:hover{
  box-shadow: 0 0 12px darkblue;
}
#product_card img{
   margin-top:40px ;
   height: 300px;
   width: 80%;
   border-radius: 2em;
}
#product_card .desc{
 height:auto;
}
#product_card a{
background-color:black;
border-radius: 1em ;
color: white;
padding: 6px 12px;
text-decoration: none;
margin-bottom: 20px;
}
</style>

@stop
