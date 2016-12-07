@extends('app');

@section('content')
    <div class="container">
        <h3>Editando Cupom: {{$cupom->code}}</h3>

        @include('errors.error')

        {!! Form::model($cupom,['route' => ['admin.cupoms.update',$cupom->id]]) !!}
            @include('admin.cupoms._form')
            <div class="form-group">
                {!! Form::submit('Editar Cupom',['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection