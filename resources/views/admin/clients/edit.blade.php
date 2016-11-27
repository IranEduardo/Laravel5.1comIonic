@extends('app');

@section('content')
    <div class="container">
        <h3>Editando Cliente: {{$client->user->name}}</h3>

        @include('errors.error')

        {!! Form::model($client,['route' => ['admin.clients.update',$client->id]]) !!}

            {!! Form::hidden('userID',$client->user->id) !!}

            @include('admin.clients._form')

            <div class="form-group">
                {!! Form::submit('Editar Cliente',['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection