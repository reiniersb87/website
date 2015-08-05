@extends('app')
@section('meta')
    <meta name="title" content="Hecho en laravel">
    <meta name="keywords" content="Laravel, Laravel en español, Projectos en laravel, PHP, Podcast Laravel en Español">
    <meta name="description" content="Podcast cada 2 semanas para discutir temas de laravel y PHP en español">
    <meta name="author" content="Jose Fonseca">
    <meta property="og:title" content="Hecho en Laravel" />
    <meta property="og:url" content="http://hechoenlaravel.com" />
    <meta property="og:image" content="{{asset('img/laravel.jpg')}}" />
    <meta property="og:description" content="Podcast cada 2 semanas para discutir temas de laravel y PHP en español" />
@endsection
@section('content')
    <div class="headerImage">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Podcast cada 2 semanas para discutir temas de laravel y PHP</h1>
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
        <h2 class="text-center">Episodios</h2>
        <hr />
        @foreach($articles as $article)
            <div class="col-md-6">
                <div class="thumbnail project">
                    <img src="{{url('image-manager/view/'.$article->image.'/600/300/canvas')}}" class="img-responsive" alt="{{ucfirst($article->title)}}">
                    <div class="caption">
                        <h3>{{ucfirst($article->title)}}</h3>
                        <p>{{$article->intro}}</p>
                        <p><a href="{{url('episodio/'.$article->slug)}}" class="btn btn-primary btn-block" role="button">Ver Episodio</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
