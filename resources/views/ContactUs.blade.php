@extends('Home')
@section('content2')
<div id="all-container">
    <div id="img-container">
     <img src="https://www.shutterstock.com/image-photo/contact-us-customer-support-hotline-600nw-2067737414.jpg" >
    </div>
    <div id="form-container">
        <form action="{{route('contact_us')}}" method="POST">
            @csrf
            <h1>Contacter Nous</h1>
            <div><input type="text" name="name" placeholder="Nom Complet"></div>
            <div><input type="email" name="email" placeholder="email"></div>
            <div><input type="text" name="message" placeholder="message"></div>
            <div><button id="btn2" type="submit">Envoyer</button></div>
        </form>
    </div>
</div>
<style>
    #all-container{
        display:flex;
        height: 100dvh;

    }
    img{
      height: 100dvh;
      width: 100%;
    }
    #img-container{
        height: 100dvh;
        width: 50%;

    }
    #form-container{
        height: 100dvh;
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #form-container>form{
      height: 100%;
      width: 100%;
      text-align: center;
    }
    #form-container>form>div>input{
      border: 5px solid gray;
      border-radius: 2em;
      padding: 12px 24px;
      margin-top: 70px;
      width: 80%;
      height: 30%;
    }
    #btn2{
        height: 50%;
        width: 60%;
        margin-top: 100px;
        padding: 12px 20px;
        background-color: gray;
        color: white;
        font-weight: 900;
        border: none;
        border-radius: 2em;
    }
    #btn2:hover{
        background-color: white;
        color: gray;
        box-shadow: 0 0 12px gray;
    }
    h1{
        color: gray;
    }
</style>
@stop
