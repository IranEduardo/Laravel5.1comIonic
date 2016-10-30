@extends('app');

@section('content')
    <div class="container">
         <h3>Orders</h3>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <p class="bg-primary">Orders List</p>
                <div class="row">
                    <div class="col-sm-1">
                        Product
                    </div>
                    <div class="col-sm-3">
                        Qtde
                    </div>
                    <div class="col-sm-3">
                        Prince
                    </div>
                    <div class="col-sm-2" align="right">
                        Total
                    </div>
                    <div>
                        Actions
                    </div>
                </div>
                @foreach($orders as $order)
                    <div class="row">
                        <div class="col-sm-1">
                            {{$order->id}}
                        </div>
                        <div class="col-sm-3">
                            {{$order->client->user->name}}
                        </div>
                        <div class="col-sm-3">
                            {{!($order->deliveryman) ? $order->deliveryman->name : 'Nao tem' }}
                        </div>
                        <div class="col-sm-2" align="right">
                            {{$order->total}}
                        </div>
                        <div class="col-sm-2">
                            {{$order->status}}
                        </div>
                        <div>
                            View Order
                        </div>
                    </div>
               @endforeach
               {!! $orders->render() !!}
            </div>
        </div>
    </div>
@endsection