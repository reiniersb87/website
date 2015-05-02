@extends('LaravelAdmin::layouts.main')
@section('pageTitle')
{{trans('LaravelAdmin::laravel-admin.LoginPageTitle')}}
@endsection
@section('content')
<div class="container">
	<div class="col-md-6 col-xs-12 col-md-offset-3 login-box">
		@if (count($errors) > 0)
        <div class="alert alert-danger">
            {!! trans('LaravelAdmin::laravel-admin.LoginErrorHeader') !!}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
		{!! Form::open(['route' => 'LaravelAdminLoginPost']) !!}	
	        <h2 class="form-signin-heading">{{trans('LaravelAdmin::laravel-admin.LoginMessage')}}</h2>
	        <div class="form-group">
	        	<label for="inputEmail" class="sr-only">{{trans('LaravelAdmin::laravel-admin.LoginEmailLabel')}}</label>
	        	<input type="email" name="email" id="inputEmail" class="form-control" placeholder="{{trans('LaravelAdmin::laravel-admin.LoginEmailLabel')}}" required autofocus>
	        </div>
	        <div class="form-group">
	        	<label for="inputPassword" class="sr-only">{{trans('LaravelAdmin::laravel-admin.LoginPasswordLabel')}}</label>
	        	<input type="password" name="password" id="inputPassword" class="form-control" placeholder="{{trans('LaravelAdmin::laravel-admin.LoginPasswordLabel')}}" required>
	        </div>
	        <div class="checkbox">
	          <label>
	            <input type="checkbox" value="remember-me"> {{trans('LaravelAdmin::laravel-admin.LoginRememberMe')}}
	          </label>
	        </div>
	    	<button class="btn btn-lg btn-primary btn-block" type="submit">{{trans('LaravelAdmin::laravel-admin.LoginSignIn')}}</button>
	    {!! Form::close() !!}	
	</div>
</div>
@endsection
