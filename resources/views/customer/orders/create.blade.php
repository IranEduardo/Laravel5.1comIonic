@extends('app');

@section('content')
   <div class="container">
       <h3>Novo Pedido</h3>

       <a href="#" class="btn btn-default" id="NovoItem">Novo Item</a>

        {!! Form::open(['route' => 'customer.orders.store', 'class' => 'form']) !!}

            <table class="table">
                 <thead>
                        <tr>
                            <th>Produto </th>
                            <th>Quantidade</th>
                        </tr>
                 </thead>
                 <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <select name="items[0][product_id]" class="form-control">
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}" data-price="{{$product->price}}">{{$product->name . ' - R$ ' . $product->price}}</option>
                                            @endforeach
                                    </select>
                                </div>

                            </td>

                            <td>
                                <div class="form-group">
                                    {!! Form::text('items[0][qtde]',1,['class' => 'form-control']) !!}
                                </div>

                            </td>
                        </tr>
                 </tbody>
            </table>

        {!! Form::close() !!}

   </div>
@endsection

@section('post-script')
    <script>
            $("#NovoItem").on("click",function() {
                var trList = $("table tbody tr"),
                    trLen = trList.length,
                    trClone = trList.eq(0).clone();
                trClone.insertAfter(trList.eq(trLen - 1));
                trClone.find('select,input').attr("name", function(i,value){
                    return value.replace('items[0]','items[' + trLen + ']');
                });
            });
    </script>
@endsection