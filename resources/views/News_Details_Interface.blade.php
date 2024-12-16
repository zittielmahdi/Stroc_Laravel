@extends('Home')
@section('content2')
<div id="all_container">

    <div id="container">

        <div id="new_container">
            <h1>{{$new->title}}</h1>
            <h2>{{$new->objectif}}</h2>
            <img src="{{asset('Uploads/Images/'.$new->image)}}" alt="{{$new->title}}">
        </div>

        <div id="desc_cont">
            <p>{{$new->description}}</p>
        </div>

        <div id="comment_send_container">
            <form action="{{url('/comment_send/'.$new->id)}}" method="POST">
                @csrf
                <label for="desc">Commenter:</label><br>
                <textarea name="description" id="desc" cols="30" rows="10" placeholder="Comment"></textarea><br>
                <button class="prime" type="submit">Envoyer</button>
            </form>
        </div>

        <div id="comment_section_container">
            <h2>Section des Commentaires</h2>
            @foreach ($new->comments as $comment )
            <div class="comment">
                <h4>Commentaire de {{$comment->commentator_name}}</h4>
                <p>{{$comment->description}}</p>
                <h4>Répondre</h4>
                <form action="{{url('/send_replies/'.$comment->id)}}" method="POST">
                    @csrf
                    <textarea name="reply" cols="30" rows="5" placeholder="Répondre"></textarea><br>
                    <button class="prime" type="submit">Envoyer</button>
                </form>
                @foreach ($comment->replies as $reply )
                <div class="reply">
                    <h4>Réponse de {{$reply->replitator_name}}</h4>
                    <p>{{$reply->reply}}</p>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>

    </div>
</div>
<style>
    #all_container{
        height: 100vh;
        width: 100wh;
        display: flex;
        justify-content: center;
        overflow-y: scroll;
    }
    #container {
        font-family: Arial, sans-serif;
        margin: 0 auto;
        padding: 20px;
        max-width: 800px;
        background-color: #f9f9f9;
        word-break: break-all;
    }

    h1,
    h2,
    h3,
    h4 {
        color:black;
    }

    #new_container img {
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #desc_cont p {
        margin-top: 20px;
    }

    label {
        font-weight: bold;
    }

    textarea {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .prime {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    .comment {
        border: 1px solid #ccc;
        padding: 10px;
        margin-top: 20px;
        border-radius: 5px;
    }

    .reply {
        margin-left: 20px;
        border-left: 2px solid #007bff;
        padding-left: 10px;
    }
</style>

@stop
