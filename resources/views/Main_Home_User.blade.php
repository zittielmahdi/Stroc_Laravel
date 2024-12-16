@extends('Home')
@section('content2')
<div id="Main_Container">

    <div id="slider">
        <div id="Main_Swiper">
            <div id="Swiper">
                <div id="dummy1" class="dummy"><a href="{{route('main_vue_user')}}">Bienvenue a Stroc</a></div>
                <div id="dummy2" class="dummy"><a href="{{route('user_news_interface')}}">Derniere Publications</a></div>
                <div id="dummy3" class="dummy"><a href="{{route('product_review_panel')}}">Produit de vos reves</a></div>
                <div id="dummy4" class="dummy"><a href="{{route('showcase_employe')}}">Personnels Competent</a></div>
            </div>
        </div>
    </div>

    <div id="desc_container">
        <h4>
            Histoire:
             <br>
            Stroc Industrie est une société dynamique spécialisée dans le domaine de la construction et des travaux publics. Fondée il y a plusieurs décennies, elle s'est imposée comme un acteur majeur dans son secteur grâce à son expertise, sa fiabilité et son engagement envers la qualité.

            Au cœur de l'activité de Stroc Industrie se trouve une vaste gamme de produits et de services destinés à répondre aux besoins variés de ses clients. Que ce soit dans la construction d'infrastructures routières, la réalisation d'ouvrages d'art, la gestion des déchets ou encore l'aménagement urbain, Stroc Industrie offre des solutions innovantes et sur mesure.

            La société se distingue par son approche holistique des projets, mettant l'accent sur la durabilité, l'efficacité et le respect de l'environnement. À travers ses différentes filiales et partenariats, Stroc Industrie s'engage activement dans des initiatives de développement durable, cherchant à minimiser son empreinte écologique tout en contribuant au progrès social et économique des communautés où elle opère.

            L'excellence opérationnelle est au cœur de la culture d'entreprise de Stroc Industrie. Grâce à des processus rigoureux et à une équipe talentueuse de professionnels expérimentés, la société garantit des résultats de haute qualité, livrés dans les délais impartis et conformes aux normes les plus exigeantes.

            En outre, Stroc Industrie se distingue par son engagement envers l'innovation. Toujours à la recherche de nouvelles technologies et de méthodes de travail avant-gardistes, elle investit dans la recherche et le développement pour rester à la pointe de l'industrie et offrir à ses clients les solutions les plus avancées et les plus efficaces.

            Au fil des années, Stroc Industrie a bâti une réputation solide et durable, basée sur l'intégrité, la transparence et le professionnalisme. Fière de son héritage et résolument tournée vers l'avenir, la société continue de repousser les limites et d'innover pour répondre aux défis complexes du monde moderne de la construction et des travaux publics.
        </h4>
    </div>

</div>

<style>


    #Main_Container {
        height: 100vh;
        width: 100vw;
        background-color: beige;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    #desc_container {
      height: 100vh;
      width: 50vw;
      display:flex;
      align-items: flex-end;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: 900;
    }

    #slider{
        height: 100vh;
         width: 50vw;

    }

    #Main_Swiper {

        margin-top: 30px;
        height: 50%;
        width: 90%;
        border-radius: 1em;
        box-shadow: 0 0 12px orange;
        margin-left: 5%;
        overflow: hidden;

    }

    #Swiper {
        height: 100%;
        width: 100%;
        position: relative;
        display: flex;
        left: 0px;
        transition: 0.5s;
    }

    .dummy {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
        border-radius: 1em;
    }

    #dummy1 {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url("https://static.medias24.com/content/uploads/2021/07/stroc12-3.jpg?x43412");
    }

    .dummy>a {
        text-decoration: none;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        padding: 12px 24px;
        border-radius: 0.5em;
        background-color: white;
        color: orange;
        box-shadow: 0 0 20px orange;
        z-index: 12;
    }

    #dummy2 {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url("https://i0.wp.com/leseco.ma/wp-content/uploads/2021/04/Stroc-Industrie.jpg?fit=1200%2C600&ssl=1");
        margin-left: 1500px;
    }

    #dummy3 {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url("https://www.stroc.com/wp-content/uploads/2019/05/centrale1.jpg");

        margin-left: 3000px;
    }

    #dummy4 {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url("https://static.medias24.com/content/uploads/2021/04/26/DLM1.jpg?x43412");

        margin-left: 4500px;
    }
</style>
<script>
    function swipe() {
        el = document.getElementById('Swiper');
        value = parseInt(window.getComputedStyle(el).getPropertyValue('left'));

        if (value >= -4000) {
            el.style.left = value - 1500 + "px";
        } else {
            el.style.left = 0 + "px";
        }
    }
    setInterval(swipe, 5000);
</script>
@stop
