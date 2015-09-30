<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hecho en laravel</title>
    @yield('meta')
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/select.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@if(!isset($currentMenu))
    <?php $currentMenu = 'home' ?>
@endif
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Abrir menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('img/laravel_logo.png')}}" class="logo" />Hecho en Laravel</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li @if($currentMenu === "home") class="active" @endif><a href="{{ url('/') }}"><i class="fa fa-microphone"></i> Podcast</a></li>
                <li @if($currentMenu === "news") class="active" @endif><a href="{{ url('/noticias') }}"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                <li @if($currentMenu === "proyectos") class="active" @endif><a href="{{ url('/proyectos') }}"><i class="fa fa-folder"></i> Proyectos</a></li>
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categorías <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach($categoriesList as $c)
                            <li><a href="{{url('proyectos/categoria/'.$c->slug)}}">{{$c->name}}</a></li>
                        @endforeach
                    </ul>
                </li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li @if($currentMenu === "addproject") class="active" @endif><a href="{{ url('/proyectos/agregar') }}"><i class="fa fa-plus"></i> Registrar Proyecto</a></li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')
<footer class="footer">
    <div class="container">
        <p class="text-muted text-center">Hecho con Laravel 5.1 por <a href="https://josefonseca.me" target="_blank">Jose Luis Fonseca</a>. Hosteado por <a href="http://linode.com/" target="_blank">Linode</a> y <a href="https://forge.laravel.com/" target="_blank">Laravel Forge</a>.</p>
    </div>
</footer>
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.full.min.js"></script>
<script src="{{asset('/js/all.js')}}"></script>
<script>
    $('[type="file"]').addClass('form-control');
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-31272861-11', 'auto');
    ga('send', 'pageview');

</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55c2307acf6fa540" async="async"></script>
</body>
</html>
