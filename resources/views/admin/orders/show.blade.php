@extends('app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                Pedido: <span style="font-size:20">{{ $order->id }}</span>
            </div>
            <div class="col-sm-2">
                Data: <span style="font-size:20">{{ $order->created_at->format('d/m/y') }}</span>
            </div>
            <div class="col-sm-5">
                Cliente: <span style="font-size:20">{{ $order->client->user->name }}</span>
            </div>
            <div class="col-sm-2">
                Total: <span style="font-size:20">{{ number_format($order->total,2) }}</span>
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
               <div class="col-sm-13">
                 {!!  Form::submit('Salvar',['class' => 'btn btn-primary']) !!}
               </div>
            {!! Form::close() !!}
        </div>
        <br>
        <div class="row">
            <br>
            <span style="font-size:20">Itens</span>
            <br>
            <br>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Produto
                        </th>
                        <th>
                            Qtde
                        </th>
                        <th>
                            Preço
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>
                                {{$item->id }}
                            </td>
                            <td>
                                {{$item->product->description }}
                            </td>
                            <td>
                                {{$item->qtde}}
                            </td>
                            <td>
                                {{number_format($item->price,2) }}
                            </td>
                            <td>
                                {{number_format($item->price * $item->qtde,2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{route('admin.orders.index')}}" class="btn btn-info">Voltar a Lista de Pedidos</a>
        </div>
    </div>
@endsection