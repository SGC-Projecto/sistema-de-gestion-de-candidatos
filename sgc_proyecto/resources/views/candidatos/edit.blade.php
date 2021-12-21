@extends('layouts.app')

@section('content')

<!--formulario de edicion de candidato-->
<br>
<div class="container col-10 col-sm-8 col-md-6 col-xl-4">
<form action="{{ url('/candidatos/'.$candidatos->id) }}" method="post" enctype="multipart/form-data">

   
    <div class="form-group">
    @csrf
    {{ method_field('PATCH') }}

        <label for="Nombre"> Nombre </label>
        <input class="form-control" type="text" name="Nombre" value="{{$candidatos->Nombre}}" id="Nombre" required>
        <br>
        <label for="Apellido"> Apellido </label>
        <input class="form-control" type="text" name="Apellido" value="{{$candidatos->Apellido}}" id="Apellido" required>
        <br>

        <label for="Telefono"> Telefono </label>
        <input class="form-control" type="tel" name="Telefono" value="{{$candidatos->Telefono}}" id="Telefono" required>
        <br>

        <label for="Correo"> Correo </label>
        <input class="form-control" type="email" name="Correo" value="{{$candidatos->Correo}}" id="Correo" required>
        <br>

        <label for="Foto"> Foto </label>
        <input class="form-control" type="file" name="Foto" value="{{$candidatos->Foto}}" id="Foto" required>
        <br>

        <label for="CV"> CV </label>
         <input class="form-control" type="file" name="CV" value="{{$candidatos->CV}}" id="CV" required>
        <br>

        <input class="form-control" type="submit" value="Guardar datos">
        <br>
        <a href='{{ route('candidatos.index') }}' class="btn btn-primary">Volver</a>
    </div>
</form>
</div>


@endsection