
<div class="form-grup">
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" class="form-control {{ $errors->has('Nombre')? 'is-invalid':'' }}" name="Nombre" id="Nombre" 
    value="{{ isset($producto->Nombre)?$producto->Nombre:''  }}">

    

</div>
<br>

<div class="form-grup">
    <label for="Precio">{{'Precio'}}</label>
    <input type="number" class="form-control" name="Precio" id="Precio" 
    value="{{ isset($producto->Precio)?$producto->Precio:'' }}" step="any">
</div>
<br>

<div class="form-grup">
    <label for="Cantidad">{{'Cantidad'}}</label>
    <input type="number" class="form-control" name="Cantidad" id="Cantidad" 
    value="{{ isset($producto->Cantidad)?$producto->Cantidad:''  }}">
</div>
<br>

<div class="form-grup">
    <label for="Descripcion">{{'Descripcion'}}</label>
    <input type="text" class="form-control" name="Descripcion" id="Descripcion"
    value="{{ isset($producto->Descripcion)?$producto->Descripcion:''  }}">
</div>
<br>

<div class="form-grup">
    <label for="Foto">{{'Foto'}}</label>
    @if(isset($producto->Foto))
    <br>
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->Foto}}" alt="" width="100">
    <br>
    @endif
    <input class="form-control" type="file" name="Foto" id="Foto" value="">
</div>
<br>


<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">


<a class="btn btn-primary" href="{{ url('productos') }}">Regresar</a>