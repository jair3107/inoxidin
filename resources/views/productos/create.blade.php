@extends('layouts.layout')
@section('content')
<div class="container">
<h1 >Añadir Producto</h1>
<br>


<form action="{{url('/productos')}}"  method="post" enctype="multipart/form-data">

{{ csrf_field() }}
@include('productos.form',['Modo'=>'crear'])



</form>
</div>
@endsection