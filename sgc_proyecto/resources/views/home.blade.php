@extends('layouts.app')

@section('title', 'home')

@section('content')
    <br>
    <br>
    <h1 class="text-center">Bienvenido {{ auth()->user()->name }} </h1>
<br>

    <div class="row justify-content-center">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Crear Nuevo Candidato</h5>
              <p class="card-text">Aquí podrá agregar un nuevo candidato a la base de datos.</p>
              <a href="{{route('candidatos.create') }}" class="btn btn-primary">Crear</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ver Lista de Candidatos</h5>
              <p class="card-text">Aquí podrá ver la lista de candidatos.</p>
              <a href="candidatos" class="btn btn-primary">Ver Lista</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">nada</h5>
                <p class="card-text">nada.</p>
                <a href="#" class="btn btn-primary">nada</a>
              </div>
            </div>
          </div>
      </div>
@endsection
