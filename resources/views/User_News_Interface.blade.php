@extends('Home')
@section('content2')
<div id="News_Container">
<div class="search-bar">
    <form action="{{route('user_news_interface')}}" method="POST">
     @csrf
     <input type="text" name="searched_pub" placeholder="Chercher">
     <button type="submit">Chercher</button>
    </form>
  </div>
@foreach ($news as $new )
<div class="New_Card">
    <h1>{{$new->title}}</h1>
    <h2>{{$new->objectif}}</h2>
    <img src="{{asset('Uploads/Images/'.$new->image)}}"><br>
    <a id="view-btn" href="{{url('/read_more/'.$new->id)}}">Voir</a>
</div>
@endforeach
</div>
<style>
.search-bar{
margin-top: 50px;
margin-bottom: 50px;
 text-align: center;
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
.search-bar input{
 border: none;
 width: 400px;
 height: 30px;
 border-radius: 0.5em;
}
#News_Container{
    height: 100dvh;
    overflow-y: scroll;
    background-color: whitesmoke;
}
.New_Card{
    float:left;
    position: relative;
    text-align: center;
    padding: 6px 12px;
    border-radius: 2em;
    background-color:white;
    height: 80%;
    width: 40%;
    transition: 0.5s;
    margin-left: 6%;
    margin-top: 2%;
    margin-bottom: 4%;
}

.New_Card:hover{
   padding: 6px 12px;
   box-shadow: 0 0 12px darkblue;
}
.New_Card img{
   height: 60%;
   width: 70%;
   border-radius: 2em;
}
#view-btn{
    position:absolute;
    text-decoration: none;
    background-color: black;
    color: white;
    border: none;
    border-radius: 1em;
    padding:12px 36px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bolder;
    font-size: medium;
    bottom: 5%;
    left:42%
}
#view-btn:hover{
  color: black;
  background-color: white;
}
</style>
@stop
