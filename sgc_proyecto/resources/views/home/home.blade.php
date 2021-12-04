 @extends('layouts.app')

@section('title', 'home')

@section('content') 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Tailwind CSS Link 
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css"> -->
    <title>Document</title>
</head>
<body>
    <header>
        <div class="welcome">

            <h1 class="text 5x1 text-center pt-24">Bienvenidos a SGL PROYECT</h1>
        </div>
        <nav>
            <div class="menu">

                <form form="fomulariodecarga" method="post" action={{ route("home.index") }} enctype="multipart/form-data" target="_blank">   
                <!--agregar un nuevo registro a l DB -->
                <p>Cargar nuevo cv</p> 
                <label>Arrastre el archivo aqui (colocamos un icono de flecha)<input type="file" accept="application/pdf, .doc, .docx, .odf" name="documentosubido" form="fomulariodecarga"></label>
                <br>
                <br> 
                </form>
                    
                <form method="get" action={{ route("home.index") }}>
                    
                    <!--Generar un buscador -->
                    <p>Buscar candidatos (FILTRAR)</p> 
                    <label>Nombre: </label> <input type="text" name="name"> <br>
                    <label>Apellido: </label> <input type="text" name="last_name"> <br>
                    <label>Rubro: </label> <input type="text" name="heading"> <br>
                    <label>Edad: </label> <input type="text" name="age"> <br>
                    <button type="submit">Buscar</button> 
                    <br>
                    <br>

                    <!--obtener listado de la DB -->
                    <p>Candidatos disponibles</p>
                    <button>Ver</button>
                    <br>
                    <br>
                    <div class="candidatos-list">
                        <p>La idea es que se muestre solo cuando se preisone el boton ver, esta en proceso todavia</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Last-name</th>
                                    <th>Email</th>
                                    <th>DNI</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Rubro</th>
                                    <th>Edad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($candidatos as $candidato)
                                <tr>
                                    <th>{{$candidato -> name}}</th>
                                    <th>{{$candidato -> last_name}}</th>
                                    <th>{{$candidato -> email}}</th>
                                    <th>{{$candidato -> DNI}}</th>
                                    <th>{{$candidato -> fecha_nac}}</th>
                                    <th>{{$candidato -> heading}}</th>
                                    <th>{{$candidato -> age}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>

                <!--tomar dato de la DB, colocarlo en una vista y enviarlo a cierto mail -->
                <p>Derivar datos del posible candidato al equipo de escalacion</p>
                <label> Coloque aqui los datos más relevantes del perfil: <texarea id="datosCandidato"> </texarea></label> <br>
                <button>Derivar</button>
                <br>
                <br>

                <!--ELIMINR CANDIDATO-->
                
            </div>
        </nav>
    </header>
    
</body>
</html>


@endsection
