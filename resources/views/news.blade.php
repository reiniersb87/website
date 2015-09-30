@extends('app')
@section('meta')
    <meta name="title" content="Hecho en laravel">
    <meta name="keywords" content="Laravel, Laravel en español, Projectos en laravel, PHP, Podcast Laravel en Español">
    <meta name="description" content="Noticias de Laravel y  PHP">
    <meta name="author" content="Jose Fonseca">
    <meta property="og:title" content="Hecho en Laravel" />
    <meta property="og:url" content="http://hechoenlaravel.com" />
    <meta property="og:image" content="{{asset('img/laravel.jpg')}}" />
    <meta property="og:description" content="Noticias de Laravel y  PHP" />
@endsection
@section('content')
    <div class="headerImage">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Noticias</h1><h2>de Laravel y PHP</h2>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="container">
        @if($articles->count() === 0)
            <div class="alert alert-info">
                <p>No hay publicaciones aún, regresa pronto!</p>
            </div>
        @endif
        <h2 class="text-center">Noticias</h2>
        <hr />
        @foreach($articles as $article)
            <div class="col-md-4">
                <div class="thumbnail article">
                    <img src="{{url('image-manager/view/'.$article->image.'/400/300/canvas')}}" class="img-responsive" alt="{{ucfirst($article->title)}}">
                    <div class="caption">
                        <h3>{{ucfirst($article->title)}}</h3>
                        <p>{{$article->intro}}</p>
                        <p class="text-muted">Publicado: {{$article->created_at->diffForHumans()}}</p>
                        <p><a href="{{url('noticias/'.$article->slug)}}" class="btn btn-primary btn-block" role="button">Ver Noticia</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
