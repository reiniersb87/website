@extends('app')

@section('content')
	<div class="container">
		<div class="col-md-12 text-center">
			<h1>{{$project->name}}</h1>
			<br />
		</div>
		<div class="col-md-6">
			<img src="{{url('project/image/'.$project->image_id.'/')}}" class="img-responsive" alt="{{ucfirst($project->name)}}">
		</div>
		<div class="col-md-6">
			<strong>Categorias: </strong>
			@foreach ($project->categories as $c)
				<a href="{{url('categoria/'.$c->slug)}}"><span class="label label-default">{{$c->name}}</span></a>
			@endforeach
			<br /><br />
			<strong>Tags: </strong>
			@foreach ($project->tags as $t)
				<a href="{{url('tag/'.$t->slug)}}"><span class="label label-default">{{$t->name}}</span></a>
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
@endsection