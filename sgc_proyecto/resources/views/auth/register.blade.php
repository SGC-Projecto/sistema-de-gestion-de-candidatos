@extends('layouts.app')
@section('meta')
<link href="{{ asset('css/login-register.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('title', 'register')

@section('content')

    <div class= "container col-10 col-sm-8 col-md-6 col-xl-4">

        <form class="" method="POST" action="">
            @csrf
            <h3 class="">Registrarse</h3>
            <div class="form-group">
                <label for="name">Ingrese su nombre:</label>
         <input type="text" class="form-control" placeholder="Nombre"
                id="name" name="name">

         @error('name')
         <p class="error">* {{ $message }}</p>
         @enderror
           <label for="email">Ingrese su Email:</label>
         <input type="email" class="form-control" placeholder="Email"
                id="email" name="email">

         @error('email')
         <p class="error">* {{ $message }}</p>
         @enderror
           <label for="password">Ingrese una contraseña:</label>
         <input type="password" class="form-control" placeholder="Contraseña"
                id="password" name="password">

         @error('password')
         <p class="error">* {{ $message }}</p>
         @enderror
           <label for="password_confirmation">Confirme la contraseña:</label>
         <input type="password" class="form-control" placeholder="Confirme Contraseña"
                id="password_confirmation" name="password_confirmation">

         <button type="submit" class="btn btn-primary col-12 formButton">Enviar</button>
         </div>

        </form>

    </div>


@endsection
