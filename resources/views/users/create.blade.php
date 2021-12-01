@extends('layouts.layout')
@section('content')

<div class="container">
    <h1>Añadir Usuario</h1>
    <br>


    <form action="{{url('/usuarios')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('users.form',['Modo'=>'crear'])

    </form>
</div>
@endsection