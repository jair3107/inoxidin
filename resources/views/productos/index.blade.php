@extends('layouts.layout')
@section('content')

<div class="container">

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
                <th>ID</th>
                <th>Accion</th>
            </tr>
        </thead>

        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$producto->Foto}}" class="img-thumbnail img-fluid" alt="" width="100">
                </td>
                <td>{{$producto->Nombre}}</td>
                <td>$ {{$producto->Precio}}</td>
                <td>{{$producto->Cantidad}}</td>
                <td>{{$producto->Descripcion}}</td>
                <td>{{$producto->id}}</td>
                <td>

                    <a class="btn btn-warning" href="{{ url('/productos/'.$producto->id.'/edit') }}">
                        Editar
                    </a>

                    <form method="post" action="{{ url('/productos/'.$producto->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Borrar?')">Borrar</button>

                    </form>

                    <br><br>
                    <form method="post" action="{{ url('/productos/'.$producto->id .'/venta') }}" style="display:inline">
                        {{ csrf_field() }}
                        
                        
                        <button class="btn btn btn-primary" type="submit" onclick="return confirm('Vender?')">Vender</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection