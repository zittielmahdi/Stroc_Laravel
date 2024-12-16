@extends('Home')
@section('content2')
<div id="prod_details_container">
    <div id="prod_img_cont">
        <img src="{{asset('Uploads/Images/'.$product->image)}}">
    </div>
    <div id="prod_desc_container">
        <h1>Produit: {{$product->product_name}}</h1>
        <h2>Marque: {{$product->brand}}</h2>
        <h2>Prix Unitaire: <span id="multiplier"> {{$product->price_per_unit}}$</span></h2>
        <form action="{{url('/pay_check/'.$product->id)}}" method="POST">
            @csrf
            <h4>
                Quantite:
                <select onclick="calculate()" name="quantity" id="quantity">

                    @for($i = 1; $i <= $product->quantity ; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                </select>
            </h4>
            <h4 id="result">Prix Total:{{$product->price_per_unit}}$</h4>
            <button type="submit" id="sub_btn">Demander et Payer</button>
            <a id="cancel_link" href="{{route('product_review_panel')}}">Annuler transaction</a>
        </form>
    </div>
</div>
<script>
    function calculate() {
        var quantity = document.getElementById('quantity').value;
        var multiplier = parseFloat(document.getElementById('multiplier').innerText);

        var result = quantity * multiplier;

        document.getElementById('result').innerText = 'Prix Total:' + result + '$';
    }
</script>
<style>
    #sub_btn {
        padding: 12px 24px;
        border: none;
        border-radius: 2em;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 900;
    }

    #cancel_link{
        padding: 8px 20px;
        border: none;
        border-radius: 2em;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 900;
        background-color: whitesmoke;
        text-decoration: none;
        color: black;
    }

    #prod_details_container {
        display: flex;
        width: 100%;
        height: 100%;
        background-color: black;
    }

    #prod_img_cont {
        width: 50%;
        height: 100%;
    }

    #prod_img_cont img {
        width: 100%;
        height: 100%;
    }

    #prod_desc_container {
        width: 50%;
        height: 100%;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 900;
        color: white;
    }

    #prod_desc_container>* {
        margin-top: 70px;
    }
</style>
@stop
