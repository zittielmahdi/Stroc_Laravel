@extends('Home')
@section('content2')
<div id="Success_Container">
<h1>Payment Reussie</h1>
</div>
<style>
    #Success_Container{
        background-color: lightgreen;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
    #Success_Container>h1{
        background-color: white;
        padding: 12px 24px;
        color: greenyellow;
        border-radius: 2em;
        text-align: center;
        box-shadow: 0 0 12px white;
    }

</style>
@endsection
