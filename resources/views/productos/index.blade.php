@extends('layouts.layout')
@section('content')


    @if(Session::has('Mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('Mensaje')}}
    <button type="button" class="close" data-dismiss='alert' aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    @endif





<br>
<a href="{{ url('productos/create') }}" class="btn btn-success">Agregar Productos</a>
<br>
</br>
<table class="table table-light table-hover">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Descripcion</th>
            <th>Accion</th>
        </tr>
    </thead>

    <tbody>
        @foreach($productos as $productos)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                <img src="{{ asset('storage').'/'.$productos->Foto}}" class="img-thumbnail img-fluid" alt="" width="100">
            </td>
            <td>{{$productos->Nombre}}</td>
            <td>$ {{$productos->Precio}}</td>
            <td>{{$productos->Cantidad}}</td>
            <td>{{$productos->Descripcion}}</td>
            <td>

                <a class="btn btn-warning" href="{{ url('/productos/'.$productos->id.'/edit') }}">
                    Editar
                </a>

                <form method="post" action="{{ url('/productos/'.$productos->id) }}" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Borrar?')">Borrar</button>

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>

@endsection