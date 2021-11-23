
@extends('layouts.layout')
@section('content')
    

        @if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
        @endif
        

<br>       
        <table class="table table-light">

            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Descripcion</th>                    
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
                </tr>
                @endforeach
            </tbody>

        </table>

@endsection
