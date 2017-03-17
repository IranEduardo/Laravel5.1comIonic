@extends('app');

@section('content')
   <div class="container">
       <h3>Novo Pedido</h3>

       <a href="#" class="btn btn-default" id="btnNewItem">Novo Item</a>

       <br>
       <br>
       <br>
       <span style="font-size:20">Total R$: <span id="totalOrder" ></span></span>

       <br>
       <br>
       <br>

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

            <div class="form-group">
                {!! Form::submit('Criar Pedido',['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

   </div>
@endsection

@section('post-script')
    <script>
            $("#btnNewItem").on("click",function() {
                var trList = $("table tbody tr"),
                    trLen = trList.length,
                    lastLine = trList.eq(trLen - 1),
                    trClone = lastLine.clone();
                trClone.insertAfter(lastLine);
                trLen = trList.length;
                trClone.find('select,input').attr("name", function(i,value){
                    return value.replace(trLen - 1,trLen);
                });
                trClone.find('input').val(1);
                $("#totalOrder").text(CalculateTotal());
            });

            function CalculateTotal(){
                var trList = $("table tbody tr"),
                    Total = 0;
                trList.each(function(){
                    var price =  $(this).find(":selected").data("price"),
                        qtde  =  $(this).find("input").val();

                    Total += price * qtde;
                });

                return Total;
            }

            $("table tbody").on("change","select",function(){
                $("#totalOrder").text(CalculateTotal());
            });
            $("table tbody").on("blur","input",function(){
                $("#totalOrder").text(CalculateTotal());
            });
     </script>
@endsection