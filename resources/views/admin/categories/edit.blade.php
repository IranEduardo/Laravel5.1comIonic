@extends('app');

@section('content')
    <div class="container">
        <h3>Editando Categoria: {{$category->name}}</h3>

        @include('errors.error');

        {!! Form::model($category,['route' => ['admin.categories.update',$category->id]]) !!}
            @include('admin.categories._form');
            <div class="form-group">
                {!! Form::submit('Editar Categoria',['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection