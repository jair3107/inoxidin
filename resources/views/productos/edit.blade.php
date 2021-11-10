<form action="{{ url('/productos/' .$producto->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <br>
    <div>
        <label for="Nombre">{{'Nombre'}}</label>
        <input type="text" name="Nombre" id="Nombre" value="{{ $producto->Nombre }}">
    </div>
    <br>

    <div>
        <label for="Precio">{{'Precio'}}</label>
        <input type="number" name="Precio" id="Precio" value="{{ $producto->Precio }}">
    </div>
    <br>

    <div>
        <label for="Cantidad">{{'Cantidad'}}</label>
        <input type="number" name="Cantidad" id="Cantidad" value="{{ $producto->Cantidad }}">
    </div>
    <br>

    <div>
        <label for="Descripcion">{{'Descripcion'}}</label>
        <input type="text" name="Descripcion" id="Descripcion" value="{{ $producto->Descripcion }}">
    </div>
    <br>

    <div>
        <label for="Foto">{{'Foto'}}</label>
        <br>

        <img src="{{ asset('storage').'/'.$producto->Foto}}" alt="" width="200">

        <br>
        <input type="file" name="Foto" id="Foto" value="">
    </div>
    <br>
    <input type="submit" value="Modificar">

    <a href="{{ url('productos') }}">Regresar</a>

</form>