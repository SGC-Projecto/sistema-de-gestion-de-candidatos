@extends('layouts.app')
@section('meta')
<link href="{{ asset('css/table.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('content')
<div class="container" id="searchBar">
    <form action="/search" method="get">
        <div class="input-group">
            <input type="search" name="search" id="" class="form-control">
            <span class="input-group-prepend">
                <button type="submit" class="btn btn-primey">Search</button>
            </span>
        </div>
    </form>
</div>
<div class="container-fluid table-responsive col-xl-8">
<table class="table table-bordered table-hover" id="tabla">
    <thead class="thead-light">
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
            <td class="Nombre">{{ $candidato->Nombre }}</td>
            <td class="Apellido"">{{ $candidato->Apellido }}</td>
            <td>{{ $candidato->Telefono }}</td>
            <td>{{ $candidato->Correo }}</td>
            <td><a style="align-self: center" class="btn btn-primary" href="{{ $candidato->CV }}" target="_blank">VER</a></td>
            <td style="width: 80px">
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
    <div class="row justify-content-center">
        <div class="col-4">
            {{ $candidatos->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
<script src="{{ asset('js/tabla.js') }}" type="text/javascript"></script>


@endsection
