<br>
<div>
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" id="Nombre" value="{{ isset($producto->Nombre)?$producto->Nombre:''  }}">
</div>
<br>

<div>
    <label for="Precio">{{'Precio'}}</label>
    <input type="number" name="Precio" id="Precio" value="{{ isset($producto->Precio)?$producto->Precio:'' }}" step="any">
</div>
<br>

<div>
    <label for="Cantidad">{{'Cantidad'}}</label>
    <input type="number" name="Cantidad" id="Cantidad" value="{{ isset($producto->Cantidad)?$producto->Cantidad:''  }}">
</div>
<br>

<div>
    <label for="Descripcion">{{'Descripcion'}}</label>
    <input type="text" name="Descripcion" id="Descripcion" value="{{ isset($producto->Descripcion)?$producto->Descripcion:''  }}">
</div>
<br>

<div>
    <label for="Foto">{{'Foto'}}</label>
    @if(isset($producto->Foto))
    <br>
    <img src="{{ asset('storage').'/'.$producto->Foto}}" alt="" width="200">
    <br>
    @endif
    <input type="file" name="Foto" id="Foto" value="">
</div>
<br>


<input type="submit" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">


<a href="{{ url('productos') }}">Regresar</a>