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
    <a href="{{ url('usuarios/create') }}" class="btn btn-success">Agregar Usuario</a>
    <br>
    </br>

    <br>
    <table class="table table-light table-hover">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>ID</th>
                <th>Tipo de Usuario</th>
                <th>Accion</th>
            </tr>
        </thead>

        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->user_type }}</td>
                <td> <a class="btn btn-warning" href="{{ url('/usuarios/'.$usuario->id.'/edit') }}">
                        Editar
                    </a>

                    <form method="post" action="{{ url('/usuarios/'.$usuario->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Borrar?')">Borrar</button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection