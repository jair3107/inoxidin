<x-guest-layout>
<form action="{{url('/productos')}}" method="post" enctype="multipart/form-data">

{{ csrf_field() }}

<br>
<div>
<label for="Nombre">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" value="">
</div>
<br>

<div>
<label for="Precio">{{'Precio'}}</label>
<input type="number" name="Precio" id="Precio" value="">
</div>
<br>

<div>
<label for="Cantidad">{{'Cantidad'}}</label>
<input type="number" name="Cantidad" id="Cantidad" value="">
</div>
<br>

<div>
<label for="Descripcion">{{'Descripcion'}}</label>
<input type="text" name="Descripcion" id="Descripcion" value="">
</div>
<br>

<div>
<label for="Foto">{{'Foto'}}</label>
<input type="file" name="Foto" id="Foto" value="">
</div>
<br>

<input type="submit" value="Agregar">

</form>
</x-guest-layout>