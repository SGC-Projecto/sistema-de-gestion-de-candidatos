<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet" type="text/css" title="estilos">
    <title>Buscar candidatos</title>
</head>
<body>
    <div class="form" id="file-override-custom">
    <h1>{{ $titulo }}</h1>
    
    <form method="get" action={{ route("candidatos.index") }}>
        @csrf 
        <label>Nombre </label> 
        <input type="text" name="nombre"> 
        <br>

        <label>Apellido </label>
        <input type="text" name="apellido">
        <br>

        <label>Telefono </label> 
        <input type="text" name="telefono"> 
        <br>

        <label>Correo </label> 
        <input type="text" name="correo"> 
        <br>
    
        <div class="btn">
            <button class="btn-form" type="submit">Buscar</button>
        </div>
         
    
    </div>
    <table class="table table-bordered table-hover" id="tabla">
        <thead class="thead-light">
            <!-- TRAER DB -->
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>

        <tbody>
            @foreach ( $candidatos as $candidato )
                <tr>
                    <td>{{ $candidato->Nombre }}</td>
                    <td>{{ $candidato->Apellido }}</td>
                    <td>{{ $candidato->Telefono }}</td>
                    <td>{{ $candidato->Correo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>