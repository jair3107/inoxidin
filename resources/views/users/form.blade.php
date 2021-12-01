<div class="container">
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
    <label for="name">{{'Nombre'}}</label>
    <input type="text" class="form-control {{ $errors->has('name')? 'is-invalid':'' }}" name="name" id="name" 
    value="{{ isset($user->name)?$user->name:old('name')  }}">

</div>

<div class="form-group">
    <label for="email">{{'Email'}}</label>
    <input type="email" class="form-control" name="email" id="email" 
    value="{{ isset($user->email)?$user->email:old('email') }}" step="any">
</div>


<div class="form-group">
    <label for="password">{{'Contraseña'}}</label>
    <input type="password" class="form-control" name="password" id="password" >
</div>


<br>


<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">


<a class="btn btn-primary" href="{{ url('usuarios') }}">Regresar</a>
</div>