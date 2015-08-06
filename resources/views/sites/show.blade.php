@extends('app')
@section('meta')
<meta name="title" content="Hecho en laravel | {{$project->name}}">
<meta name="keywords" content="Laravel, Laravel en español, Projectos en laravel, PHP">
<meta name="description" content="{{$project->description}}">
<meta name="author" content="Jose Fonseca">
<meta property="og:title" content="{{$project->name}}" />
<meta property="og:url" content="{{$project->url}}" />
<meta property="og:image" content="{{url('project/image/'.$project->image_id.'/')}}" />
<meta property="og:description" content="{{$project->description}}" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>{{$project->name}}</h1>
            <br />
        </div>
        <div class="col-md-6">
            <img src="{{url('image-manager/view/'.$project->image_id.'/')}}" class="img-responsive" alt="{{ucfirst($project->name)}}">
        </div>
        <div class="col-md-6">
            <strong>Categorias: </strong>
            @foreach ($project->categories as $c)
            <span class="label label-default">{{$c->name}}</span>
            @endforeach
            <br /><br />
            <strong>Tags: </strong>
            @foreach ($project->tags as $t)
            <span class="label label-default">{{$t->name}}</span>
            @endforeach
            <br /><br />
            <strong>URL: </strong> <a href="{{$project->url}}" target="_blank">{{$project->url}}</a>
            <br /><br />
            @if(!empty($project->user_twitter))
            <strong>Twitter del autor: </strong> <a href="https://twitter.com/{{$project->user_twitter}}" target="_blank">{{ '@'.$project->user_twitter}}</a>
            <br /><br />
            @endif
            <strong>Descripción: </strong> {{$project->description}}
            <br /><br />
            <a href="{{$project->url}}" target="_blank" class="btn btn-block btn-default">Ir al proyecto</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Proyectos Relacionados</h3>
        </div>    
    </div>
    <div class="row">
        @foreach($related as $p)
        <div class="col-md-4">
            <div class="thumbnail project">
                <img src="{{url('image-manager/view/'.$p->image_id.'/350/190/canvas')}}" class="img-responsive" alt="{{ucfirst($project->name)}}">
                <div class="caption">
                    <h3>{{ucfirst($p->name)}}</h3>
                    <p><a href="{{url('proyecto/'.$p->slug)}}" class="btn btn-primary btn-block" role="button">Más información</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection