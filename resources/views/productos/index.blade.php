
@extends('layouts.layout')
@section('content')
    

        @if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
        @endif
        

<br>
        <a href="{{ url('productos/create') }}">Agregar Productos</a>
        </br>
        <table class="table table-light">

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
                        <img src="{{ asset('storage').'/'.$productos->Foto}}" alt="" width="200">
                    </td>
                    <td>{{$productos->Nombre}}</td>
                    <td>$ {{$productos->Precio}}</td>
                    <td>{{$productos->Cantidad}}</td>
                    <td>{{$productos->Descripcion}}</td>
                    <td>

                        <a href="{{ url('/productos/'.$productos->id.'/edit') }}">
                            Editar
                        </a>



                        <form method="post" action="{{ url('/productos/'.$productos->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('Borrar?')">Borrar</button>

                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

@endsection
