@extends('app');

@section('content')
    <div class="container">
         <h3>Cupoms</h3>
        <br>
        <a href="{{ route('admin.cupoms.create') }}" class="btn btn-default">Novo Cupom</a>
        <br><br>
         <table class="table table-bordered">
           <thead>
             <tr>
                 <th>ID</th>
                 <th>Codigo</th>
                 <th>Valor</th>
                 <th>Usado</th>
                 <th>Ações</th>
              </tr>
          </thead>
          <tbody>
               @foreach($cupoms as $cupom)
                   <tr>
                      <td>
                          {{$cupom->id}}
                      </td>
                      <td>
                          {{$cupom->code}}
                      </td>
                      <td>
                          {{$cupom->value}}
                      </td>
                      <td>
                          {{$cupom->used}}
                      </td>
                      <td>
                          <a href="{{ route('admin.cupoms.edit',['id' => $cupom->id]) }}" class="btn btn-default btn-sm">Editar</a>
                          <a href="{{ route('admin.cupoms.destroy',['id' => $cupom->id]) }}" class="btn btn-default btn-sm">Excluir</a>

                      </td>
                   </tr>
                @endforeach
          </tbody>
        </table>
        {!! $cupoms->render()  !!}
    </div>
@endsection