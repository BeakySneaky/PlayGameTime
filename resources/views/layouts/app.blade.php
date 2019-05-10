<!DOCTYPE html>
<html lang="fr-CA">
<head>
    <meta charset="utf-8">
    <title>@yield('titre')</title>
    <!--META-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta name="description" content="N'oubliez plus rien... notez tout directement sur notre application Web !"/>
    <meta name="author" content="Christiane Lagacé : http://christianelagace.com">

    <!--FAVICON-->
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#3B8EAF">
    <meta name="theme-color" content="#ffffff">

    <!--FONTS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,400italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">




    <!--CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/OnePageCss/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/OnePageCss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/OnePageCss/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/OnePageCss/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/OnePageCss/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/OnePageCss/messtyles.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139518099-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-139518099-1');
    </script>
</head>

<body>

{{-- ******************************************************************************************** --}}
{{-- entête --}}
{{-- ******************************************************************************************** --}}

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                {{-- logo ********************************************************************************* --}}

                <a href="{{ route('pages.accueil') }}">
                    <div class="logo">
                        <img src="{{ asset('medias/fr/playgametime-logo.png') }}" alt="Logo todo" title="todo"/>
                        <p>Projet étudiant - données fictives</p>
                    </div>
                </a>

                {{-- menu principal ************************************************************************* --}}
                @unless (App::isDownForMaintenance())
                    <nav class="nav-collapse">

                        <ul>
                            <li class="menu-item"><a href="{{ route('pages.accueil') }}" data-scroll>Accueil</a></li>
                            <li class="menu-item"><a href="{{ route('produits.magasin') }}" data-scroll>Magasin</a></li>
                            <li class="menu-item"><a href="{{ route('pages.contact') }}" data-scroll>Contact</a></li>
                            @auth
                                {{-- usager authentifié : afficher le bouton de déconnexion --}}
                                <li class="menu-item"><a href="{{ route('connexion.deconnexion') }}" data-scroll>Déconnexion</a>
                                </li>
                            @else
                                {{-- usager non authentifié : afficher le bouton de connexion --}}
                                <li class="menu-item"><a href="{{ route('pages.connexion') }}" data-scroll>Connexion</a>
                                </li>

                            @endauth
                        </ul>
                    </nav>
                @endunless
            </div>

        </div>
    </div>
</header>

{{-- titre h1 ************************************************************************* --}}

<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">@yield('h1')</h1>
            </div>
        </div>
    </div>
</section>

{{-- tâches ************************************************************************* --}}
<div class="content">
    @if(isset($errors) && $errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @include('flash::message')
    @yield('contenu')
</div>

{{-- réseaux sociaux ************************************************************************* --}}

<aside id="socials">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="#" class="os-animation" data-os-animation="rollIn" data-os-animation-delay="0.3s"><i
                            class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                <a href="#" class="os-animation" data-os-animation="rollIn" data-os-animation-delay="0.5s"><i
                            class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                <a href="#" class="os-animation" data-os-animation="rollIn" data-os-animation-delay="0.7s"><i
                            class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
                <a href="#" class="os-animation" data-os-animation="rollIn" data-os-animation-delay="0.9s"><i
                            class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</aside>

{{-- ******************************************************************************************** --}}
{{-- pied de page --}}
{{-- ******************************************************************************************** --}}

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Ce site est un projet étudiant réalisé dans le cadre du cours Développement Web 2 au cégep de
                    Victoriaville.<br/>Toutes les données présentées sont fictives.</p>
                <p>&nbsp;</p>
                <p>&copy; Site Web par Alexandre Lemarier, {{ date('Y') }}</p>
                <p>&copy; Maquette OneCloud par Jotran, 2014, <a rel="nofollow noopener"
                                                                 href="http://freetemplates.pro/">FreeTemplates.pro</a>
                </p>
            </div>
        </div>
    </div>
</footer>

{{-- ******************************************************************************************** --}}
{{-- scripts --}}
{{-- ******************************************************************************************** --}}

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{ asset('js/OnePageJs/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('js/OnePageJs/jquery.bxslider.js') }}"></script>
<script src="{{ asset('js/OnePageJs/script.js') }}"></script>
<script src="{{ asset('js/OnePageJs/waypoints.min.js') }}"></script>
<script src="{{ asset('js/messcripts.js') }}"></script>
@yield('jscriptValidator')
</body>
</html>
