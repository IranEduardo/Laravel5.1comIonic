@extends('app');

@section('content')
    <div class="container">
        <h3>Editando Produto: {{$product->name}}</h3>

        @include('errors.error')

        {!! Form::model($product,['route' => ['admin.products.update',$product->id]]) !!}
            @include('admin.products._form')
            <div class="form-group">
                {!! Form::submit('Editar Produto',['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection