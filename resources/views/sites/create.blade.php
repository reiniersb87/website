@extends('app')

@section('content')
<div class="container">
    @include('flash::message')
    <div class="row">
        <div class="col-md-6">
            <h1>Agregar Proyecto</h1>
            <p>Llene los datos en el siguiente formulario para publicar un proyecto, tenga en cuenta que el mismo pasará por un proceso de aprobación antes que sea publicado en el sitio.</p>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Hay un problema con los datos ingresados.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="well">
                {!! Form::open(['class' => 'form-horizontal', 'files' => true]) !!}
                <fieldset>
                    <div class="form-group">
                        <label for="inputName" class="col-lg-3 control-label">Nombre *</label>
                        <div class="col-lg-9">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'id' => 'inputName', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription" class="col-lg-3 control-label">Descripción *</label>
                        <div class="col-lg-9">
                            {!! Form::textArea('description', null, ['class' => 'form-control', 'placeholder' => 'Descripción', 'id' => 'inputDescription', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCategories" class="col-lg-3 control-label">Categorías *</label>
                        <div class="col-lg-9">
                            {!! Form::select('categories[]', $categories, null, ['class' => 'form-control selectpicker', 'placeholder' => 'Seleccione las Categorias', 'id' => 'inputCategories', 'required' => 'required', 'multiple' => 'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCategories" class="col-lg-3 control-label">Tags *</label>
                        <div class="col-lg-9">
                            {!! Form::select('tags[]', $tags, null, ['class' => 'form-control selectpicker', 'placeholder' => 'Seleccione los Tags', 'id' => 'inputCategories', 'required' => 'required', 'multiple' => 'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUrl" class="col-lg-3 control-label">Url *</label>
                        <div class="col-lg-9">
                            {!! Form::url('url', null, ['class' => 'form-control', 'placeholder' => 'Url', 'id' => 'inputUrl', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserEmail" class="col-lg-3 control-label">Email del creador (opcional)</label>
                        <div class="col-lg-9">
                            {!! Form::email('user_email', null, ['class' => 'form-control', 'placeholder' => 'Email del creador', 'id' => 'inputUserEmail']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUsertwitter" class="col-lg-3 control-label">Twitter del creador (sin @) (opcional)</label>
                        <div class="col-lg-9">
                            {!! Form::text('user_twitter', null, ['class' => 'form-control', 'placeholder' => 'Twitter del creador', 'id' => 'inputUsertwitter']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputFile" class="col-lg-3 control-label">Imagen * <br />(600 x 300)</label>
                        <div class="col-lg-9">
                            {!! Form::file('file', null, ['class' => 'form-control', 'placeholder' => 'Seleccione la imagen', 'id' => 'inputFile']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </fieldset>
                {!! Form::close() !!}
            </div>		
        </div>
    </div>
</div>
@endsection