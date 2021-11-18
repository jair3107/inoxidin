@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li> {{ $error }} </li>
    @endforeach
    </ul>
    </div>

@endif

<div class="form-group">
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" class="form-control {{ $errors->has('Nombre')? 'is-invalid':'' }}" name="Nombre" id="Nombre" 
    value="{{ isset($producto->Nombre)?$producto->Nombre:old('Nombre')  }}">

    

</div>

<div class="form-group">
    <label for="Precio">{{'Precio'}}</label>
    <input type="number" class="form-control" name="Precio" id="Precio" 
    value="{{ isset($producto->Precio)?$producto->Precio:old('Precio') }}" step="any">
</div>

<div class="form-group">
    <label for="Cantidad">{{'Cantidad'}}</label>
    <input type="number" class="form-control" name="Cantidad" id="Cantidad" 
    value="{{ isset($producto->Cantidad)?$producto->Cantidad:old('Cantidad') }}">
</div>


<div class="form-group">
    <label for="Descripcion">{{'Descripcion'}}</label>
    <input type="text" class="form-control" name="Descripcion" id="Descripcion"
    value="{{ isset($producto->Descripcion)?$producto->Descripcion:old('Descripcion') }}">
</div>


<div class="form-group">
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