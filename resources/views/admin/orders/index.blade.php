@extends('app');

@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lista de Pedidos</h3>
                    </div>
                    <div class="painel-body">
                        <table class="table table-condensed">
                            <thead>
                              <tr>
                                  <th>
                                    ID
                                 </th>
                                 <th>
                                    Cliente
                                </th>
                                <th>
                                    Entregador
                                </th>
                                <th>
                                    Total
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Ações
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            {{$order->id}}
                                        </td>
                                        <td>
                                            {{$order->client->user->name}}
                                        </td>
                                        <td>
                                            {{$order->deliveryman ? $order->deliveryman->name : '' }}
                                        </td>
                                        <td>
                                            {{number_format($order->total,2) }}
                                        </td>
                                        <td>
                                            {{$order->getStatusList()[$order->status]}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.orders.show',['id' => $order->id])}}" class="btn btn-default">Detalhes Pedido</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        <div class="row text-center">
              {!! $orders->render() !!}
        </div>
    </div>
@endsection