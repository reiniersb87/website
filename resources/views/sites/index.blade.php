@extends('app')
@section('meta')
    <meta name="title" content="Hecho en laravel">
    <meta name="keywords" content="Laravel, Laravel en español, Projectos en laravel, PHP">
    <meta name="description" content="Directorio de sitios web y aplicaciones web hechas en Laravel en español.">
    <meta name="author" content="Jose Fonseca">
    <meta property="og:title" content="Hecho en Laravel" />
    <meta property="og:url" content="http://hechoenlaravel.com/proyectos" />
    <meta property="og:image" content="{{asset('img/laravel.jpg')}}" />
    <meta property="og:description" content="Directorio de sitios web y aplicaciones web hechas en Laravel en español." />
@endsection
@section('content')
    <div class="headerImage">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Proyectos</h1><h2>hechos en Laravel en español.</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
        @include('flash::message')
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4">
                    <div class="thumbnail project">
                        <img src="{{url('image-manager/view/'.$project->image_id.'/350/190/canvas')}}" class="img-responsive" alt="{{ucfirst($project->name)}}">
                        <div class="caption">
                            <h3>{{ucfirst($project->name)}}</h3>
                            <p><a href="{{url('proyecto/'.$project->slug)}}" class="btn btn-primary btn-block" role="button">Más información</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                @if(method_exists($projects, 'render'))
                    {!! $projects->render() !!}
                @endif
            </div>
        </div>
    </div>
@endsection