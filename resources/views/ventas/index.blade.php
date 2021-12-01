@extends('layouts.layout')
@section('content')

<div class="container">

    <h1>Ventas</h1>

    <br>
    <table class="table table-light table-hover">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Ticket</th>
                <th>Producto id</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Descripcion</th>

            </tr>
        </thead>

        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->ProductoId }}</td>
                <td>{{ $venta->Producto }}</td>
                <td>${{ $venta->Precio }}</td>
                <td>{{ $venta->Descripcion }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection