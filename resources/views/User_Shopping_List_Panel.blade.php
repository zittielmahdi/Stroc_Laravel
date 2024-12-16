@php
    use App\Models\Product;
@endphp
@extends('Home')
@section('content2')
<div id="table_container">
    <h1>Suivre Vos Commandes Ici</h1>
<table>
    <thead>
     <tr>
        <td>
            Produit
        </td>
        <td>
            Quantite
        </td>
        <td>
            Total
        </td>
        <td>
            Facture
        </td>
     </tr>
    </thead>
    <tbody>
        @foreach ($user->commands as $command)
        <tr>
            <td>
            {{optional(Product::withTrashed()->find($command->product_id))->product_name}}
            </td>
            <td>
            {{$command->quantity}}
            </td>
            <td>
            {{$command->total}}$
            </td>
            <td class="download_link">
                <a href="{{route('download_facture',$command->id)}}">Telecharger</a>
            </td>
            <td id="follow">
                <a href="{{url('/follow_command/'.$command->id)}}">Suivre</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<style>
    .download_link>a{
      color: whitesmoke;
      text-decoration: none;
    }
    .download_link{
        background-color: purple;
    }
#table_container{
    height: 100%;
    width: 100%;
    background-color: beige;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
table{
    background-color: orange;
    padding: 12px 24px;
    height: 30%;
    width: 60%;
    border-radius: 1em;
    font-weight: 900;
    font-family: Arial, Helvetica, sans-serif;

}
td{
    background-color: white;
    text-align: center;
    margin: 5px 10px;
    border-radius: 1em;
}
#follow{
  background-color: greenyellow;
}
#follow>a{
  color: white;
  text-decoration: none;
}
</style>
@endsection
