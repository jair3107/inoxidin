@extends('layouts.layout')
@section('content')

<div class="container">

    @if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
    @endif

    <h2>Productos</h2>

    <br>
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
            </tr>
        </thead>

        <tbody>
            @foreach($productos as $productos)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$productos->Foto}}" alt="" class="img-thumbnail img-fluid" width="100">
                </td>
                <td>{{$productos->Nombre}}</td>
                <td>$ {{$productos->Precio}}</td>
                <td>{{$productos->Cantidad}}</td>
                <td>{{$productos->Descripcion}}</td>
                <td>{{$productos->id}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

<?php
$pito = array();
array_push($pito, )
?>

@endsection