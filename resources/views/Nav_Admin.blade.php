<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Stroc Industrie</title>
</head>

<body>
    <nav>
        <div id="nav_container1">
        <img src="https://th.bing.com/th/id/R.1794af960662bd5f3e8089da6b950d79?rik=%2ftB%2fNInCtdjwNQ&riu=http%3a%2f%2fwww.stroc.com%2fwp-content%2fuploads%2f2019%2f05%2fcropped-image2-768x182.jpeg&ehk=BX7ZFj6xEh7x51oqvZCDSSsYLPt8FeM%2bJvsT%2bcfC%2b5I%3d&risl=&pid=ImgRaw&r=0">
        </div>

        <div id="nav_container2">
            <ul>
                <li><a href="{{route('admin_panel')}}">Acceuil</a</li>
                <li><a href="{{route('users_managing_panel')}}">Utilisateur</a></li>
                <li><a href="{{route('new_employe_managing_panel')}}">Employees</a></li>
                <li><a href="{{route('product_managing_panel')}}">Produit</a></li>
                <li><a href="{{route('publication_managing_panel')}}">Publication</a></li>
                <li><a href="{{url('/follow_clients_commands_panel')}}">Suivie</a></li>
            </ul>
        </div>
    </nav>

    @yield('content')
</body>

<style>
body{
    margin: 0 0;
    padding: 0 0;
}
nav{
    display: flex;
    justify-content: space-between;
    background-color: white;
}
#nav_container1{
 width: 30%;
 justify-content: center;
 align-items: center;
}
#nav_container1>img{
 width: 50%;
 height: 90%;
}
#nav_container2{
    width: 70%;
}
#nav_container2>ul{
    list-style: none;
    display: flex;
    justify-content: space-between;
}
#nav_container2>ul>li>a{
   margin: 6px 12px;
   padding: 6px 30px;
   background-color: lightblue;
   color:white;
   border-radius: 1em;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: 700;
   text-decoration: none;
}
#nav_container2>ul>li>a:hover{

   background-color: white;
   color:blue;
   box-shadow: 0 0 12px lightblue;

}
#nav_container2>ul>li>a:active{

background-color: white;
color:blue;
box-shadow: 0 0 12px lightblue;

}
</style>

</html>
