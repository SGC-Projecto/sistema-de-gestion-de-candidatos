@extends('layouts.app')
@section('meta')
<link href="{{ asset('css/table.css') }}" rel="stylesheet" type="text/css" title="estilos">
<link href="{{ asset('css/form.css') }}" rel="stylesheet" type="text/css" title="estilos">

@endsection
@section('content')
    
<div class="container-fluid table-responsive col-xl-8">

    <div class="form" id="file-override-custom">
        <h2>{{$titulo}}</h2> 
        <!--aca en h1 pasamos la key $titulo que contiene el array $parametro -->
         
         <form method="get" action={{route('candidatos.index')}}>
            @csrf 
            <label>Nombre </label> 
            <input type="text" name="Nombre"> 
            <br>
    
            <label>Apellido </label>
            <input type="text" name="Apellido">
            <br>
    
            <label>Telefono </label> 
            <input type="text" name="Telefono"> 
            <br>
    
            <label>Correo </label> 
            <input type="text" name="Correo"> 
            <br>
        
            <div class="btn">
                <button class="btn-form" type="submit">Filtrar</button>
            </div>
        </form>
             
        
         
<table class="table table-bordered table-hover" id="tabla">
    <thead class="thead-light">
        <!-- TRAER DB -->
        <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">CV</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ( $candidatos as $candidato )
        <tr>
            <th scope="row">{{ $candidato->id }}</th>

            <td style="width: 100px"><img src="{{ asset('/'.$candidato->Foto) }}" alt="" width="100px" height="100px"></td>

            <td>{{ $candidato->Nombre }}</td>
            <td>{{ $candidato->Apellido }}</td>
            <td>{{ $candidato->Telefono }}</td>
            <td>{{ $candidato->Correo }}</td>

            <td><a style="align-self: center" class="btn btn-primary" href="{{ $candidato->CV }}" target="_blank">VER</a></td>

            <td style="width: 80px">

                <!--EDITAR UN CANDIDATO-->
                <div class="container d-flex flex-column">
                    <a href="{{ url('/candidatos/'.$candidato->id.'/edit')}}" class="btn btn-warning p-2" style="width: 80px; margin-bottom:5px; margin-top:5px"> 
                    Editar  
                    </a>

                    <!--ELIMINAR UN CANDIDATO-->
                    <form action="{{ url('/candidatos/'.$candidato->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger p-2" style="width: 80px" type="submit" onclick="return confirm('¿Seguro que desea borrar este candidato?')" value="Borrar">
                    </form>
                </div>
            </td>
        </tr>
        @endforeach 


        

    </tbody>
</table>
</div>

@endsection