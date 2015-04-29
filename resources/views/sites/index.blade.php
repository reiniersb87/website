@extends('app')
@section('meta')
<meta name="title" content="Hecho en laravel">
<meta name="keywords" content="Laravel, Laravel en español, Projectos en laravel, PHP">
<meta name="description" content="Directorio de sitios web y aplicaciones web hechas en Laravel en español.">
<meta name="author" content="Jose Fonseca">
<meta property="og:title" content="Hecho en Laravel" />
<meta property="og:url" content="http://hechoenlaravel.com/" />
<meta property="og:image" content="{{asset('img/laravel.jpg')}}" />
<meta property="og:description" content="Directorio de sitios web y aplicaciones web hechas en Laravel en español." />
@endsection
@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Hecho en Laravel</h1>
        <p>Este sitio es una adaptación de <a href="http://builtwithlaravel.com/" target="_blank">Built with Laravel</a> donde se pretende mostrar páginas y Web Apps hechas en Laravel en español.</p>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>
                Proyectos registrados 
                @if(isset($categoryOn)) en categoría: {{$categoryOn->name}} @endif
                @if(isset($tagOn)) con el tag: {{$tagOn->name}} @endif
            </h3>
        </div>
    </div>
    <div class="row">
        @foreach($projects as $project)
        <div class="col-md-4">
            <div class="thumbnail project">
                <img src="{{url('project/image/'.$project->image_id.'/400')}}" class="img-responsive" alt="{{ucfirst($project->name)}}">
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