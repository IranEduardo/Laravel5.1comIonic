@extends('app');

@section('content')
    <div class="container">
         <h3>Categorias</h3>
        <br>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-default">Nova Categoria</a>
        <br><br>
         <table class="table table-bordered">
           <thead>
             <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
              </tr>
          </thead>
          <tbody>
               @foreach($categories as $category)
                   <tr>
                      <td>
                        {{$category->id}}
                      </td>
                      <td>
                         {{$category->name}}
                      </td>
                      <td>
                      </td>
                   </tr>
                @endforeach
          </tbody>
        </table>
        {!! $categories->render()  !!}
    </div>
@endsection