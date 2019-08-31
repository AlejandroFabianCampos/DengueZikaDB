<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Base De Datos Zika</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    <style>

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 400;
            margin: 0;
        }

    </style>
</head>

<body>
    <div class="container">
    
        <h1 class="text-center font-weight-bold">Lista de registros</h1>
        <div class="row">
            <div class="col-12 col-lg-3">
                <form method="GET" >
                    @csrf
                    <h3>Filtrar resultados:</h3>
                    <div class="row">
                        <div class="col-12 col-sm-7 col-lg-12">
                            <fieldset>
                                <span class="text-center font-weight-bold">Seleccionar provincias:</span> <br />
                                <div class="row">
                                    <div class="col-6 col-lg-12">
                                        <input type="checkbox" name="BuenosAires" value="Buenos Aires"> Buenos Aires <br/>
                                        <input type="checkbox" name="Caba" value="CABA"> C.A.B.A. <br/>
                                        <input type="checkbox" name="Chaco" value="Chaco"> Chaco <br/>
                                        <input type="checkbox" name="Cordoba" value="Córdoba"> Córdoba <br/>
                                        <input type="checkbox" name="Corrientes" value="Corrientes"> Corrientes <br/>
                                        <input type="checkbox" name="EntreRios" value="Entre Ríos"> Entre Ríos <br/>
                                    </div>
                                    <div class="col-6 col-lg-12">
                                        <input type="checkbox" name="Formosa" value="Formosa"> Formosa <br/>
                                        <input type="checkbox" name="Misiones" value="Misiones"> Misiones <br/>
                                        <input type="checkbox" name="Salta" value="Salta"> Salta <br/>
                                        <input type="checkbox" name="SantaFe" value="Santa Fe"> Santa Fe <br/>
                                        <input type="checkbox" name="SantiagoDelEstero" value="Santiago del Estero"> Santiago del Estero <br/>
                                        <input type="checkbox" name="Tucuman" value="Tucumán"> Tucumán <br/>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        
                        <div class="col-12 col-sm-4 col-lg-12">
                            <fieldset>
                            <span class="text-center font-weight-bold">Seleccionar enfermedad: </span> <br>
                                <input type="radio" name="enfermedad" value="Dengue"> Dengue <br>
                                <input type="radio" name="enfermedad" value="Enfermedad por Virus del Zika"> Zika <br>
                                <input type="radio" name="enfermedad" value="Ambos" checked="checked"> Ambos <br>
                            </fieldset>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary m-3" value="Filtrar">
            
                </form>
            </div>
            <div class="col-12 col-lg-9">
                <table class="table table-bordered table-hover table-sm table-responsive">
                    <h2>Mostrando {{ $quantityEvents }} eventos.</h2>
                    <thead>
                        <tr>
                            <th scope="col">Departamento</th>
                            <th scope="col">Provincia</th>
                            <th scope="col">Semana epidémica</th>
                            <th scope="col">Enfermedad</th>
                            <th scope="col">Grupo etario</th>
                            <th scope="col">Cantidad de casos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event->department_name }}</td>
                            <td>{{ $event->province_name }}</td>
                            <td>{{ $event->epidemical_week }}</td>
                            <td>{{ $event->disease }}</td>
                            <td>{{ $event->age_group }}</td>
                            <td>{{ $event->case_quantity }}</td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div> 
    </div>
</body>

</html>
