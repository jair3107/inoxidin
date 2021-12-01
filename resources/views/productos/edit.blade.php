@extends('layouts.layout')
@section('content')

<div class="container">
    <h1>Editar Producto</h1>
    <br>

    <form action="{{ url('/productos/' .$producto->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        @include('productos.form',['Modo'=>'editar'])

    </form>
</div>


@endsection