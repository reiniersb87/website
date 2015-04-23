@extends('app')

@section('content')
<div class="container">
	<div class="jumbotron">
		<h1>Hecho en laravel</h1>
		<p>Este sitio es una adaptación en español de <a href="http://builtwithlaravel.com/" target="_blank">Built with laravel</a> donde se pretende mostrar páginas y Web Apps hechas en laravel en español.</p>
	</div>
	<hr>
	<div class="row">
		@foreach($projects as $project)
			<div class="col-md-4">
			    <div class="thumbnail">
			    	<img src="{{url('project/image/'.$project->image_id.'/400')}}" class="img-responsive" alt="{{ucfirst($project->name)}}">
			      	<div class="caption">
			        	<h3>{{ucfirst($project->name)}}</h3>
			        	<p><a href="#" class="btn btn-primary" role="button">Ver sitio</a>
			      </div>
			    </div>
			</div>
		@endforeach
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center">
			{!! $projects->render() !!}
		</div>
	</div>
</div>
@endsection