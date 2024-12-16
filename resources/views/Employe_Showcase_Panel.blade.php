@extends('Home')
@section('content2')
<div id="Card_container">
    @foreach ($employes as $employe )
    <div class="card">
        <div class="card-header">
            <img src="{{asset('Uploads/Images/'.$employe->image)}}" alt="Employee Image">
        </div>
        <div class="card-body">
            <h2>{{$employe->full_name}}</h2>
            <p>{{$employe->email}}</p>
            <p>{{$employe->description}}</p>
        </div>
    </div>
    @endforeach
</div>

<style>
    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
        max-width: 300px;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        padding: 20px;
        background-color: #f2f2f2;
        text-align: center;
    }

    .card-header img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
    }

    .card-body {
        padding: 20px;
        word-break: break-all;
    }

    .card-body h2 {
        font-size: 1.5rem;
        margin-bottom: 5px;
        color: #333;
    }

    .card-body p {
        margin: 5px 0;
        color: #666;
    }

    #Card_container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: flex-start;
        padding: 20px;
        background-color: #f9f9f9;
        font-family: Arial, sans-serif;
        height: 95vh;
        overflow-y: scroll;
    }
</style>
@stop
