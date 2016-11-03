@extends('app');

@section('content')
    <div class="container">
         <h3>Orders</h3>
        <br>
        <div class="row">
            <div class="col-sm-2">
                Pedido: {{$order->id}}
            </div>
            <div class="col-sm-2">
                Data: {{ $order->created_at->format('d/m/y') }}
            </div>
            <div class="col-sm-5">
                Cliente: {{ $order->client->user->name }}
            </div>
            <div class="col-sm-2">
                Total: {{ number_format($order->total,2) }}
            </div>
        </div>
        <br>
        <div class="row">
            {!! Form::model($order, ['route' => ['admin.orders.update', $order->id], 'class' => 'form-inline']) !!}
               <div class="col-sm-4">
                   {!! Form::label('user_deliveryman_id', 'Entregador:') !!}
                   {!! Form::select('user_deliveryman_id', $deliverymen , null, ['class' => 'form-control']) !!}
               </div>
               <div class="col-sm-4">
                    {!! Form::label('status', 'Status:') !!}
                    {!! Form::select('status', $order->getStatuslist() , null, ['class' => 'form-control']) !!}
               </div>
               <div class="col-sm-5">
                 {!!  Form::submit('Salvar',['class' => 'btn btn-primary']) !!}
               </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection