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

        </div>
    </nav>

    @yield('content')
</body>

<style>
body{
    margin: 0 0;
    padding: 0 0;
    height: 100dvh;
    background-color: beige;
}
nav{
    display: flex;
    justify-content: space-between;
    background-color: white;
    z-index: 99;
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


</style>

</html>
