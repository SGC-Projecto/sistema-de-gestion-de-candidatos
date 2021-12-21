@extends('layouts.app')
@section('meta')
<link href="{{ asset('css/login-register.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('title', 'login')

@section('content')


<div class= "container col-10 col-sm-8 col-md-6 col-xl-4">

    <form class="" method="POST" action="">
        @csrf
        <h3 class="">Iniciar Sesion</h3>
        <div class="form-group">
        <label for="email">Ingrese su Email:</label>
        <input type="email" class="form-control" placeholder="Email"
               id="email" name="email">

        <label for="password">Ingrese su contraseña:</label>
        <input type="password" class="form-control" placeholder="Contraseña"
                id="password" name="password">

        @error('message')
        <p class="error">* {{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary col-12 formButton">Enviar</button>
        </div>

    </form>


</div>

@endsection
