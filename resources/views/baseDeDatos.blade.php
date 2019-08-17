<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Base De Datos Zika</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <!--<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> -->
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <form method="GET" >
            @csrf   
            <h1>Filtrar resultados:</h1>
            <fieldset>
                Seleccionar provincias <br />
                <input type="checkbox" name="BuenosAires" value="Buenos Aires"> Buenos Aires <br/>
                <input type="checkbox" name="Caba" value="CABA"> C.A.B.A. <br/>
                <input type="checkbox" name="Chaco" value="Chaco"> Chaco <br/>
                <input type="checkbox" name="Cordoba" value="Córdoba"> Córdoba <br/>
                <input type="checkbox" name="Corrientes" value="Corrientes"> Corrientes <br/>
                <input type="checkbox" name="EntreRios" value="Entre Ríos"> Entre Ríos <br/>
                <input type="checkbox" name="Formosa" value="Formosa"> Formosa <br/>
                <input type="checkbox" name="Misiones" value="Misiones"> Misiones <br/>
                <input type="checkbox" name="Salta" value="Salta"> Salta <br/>
                <input type="checkbox" name="SantaFe" value="Santa Fe"> Santa Fe <br/>
                <input type="checkbox" name="SantiagoDelEstero" value="Santiago del Estero"> Santiago del Estero <br/>
                <input type="checkbox" name="Tucuman" value="Tucumán"> Tucumán <br/>
            </fieldset>
            <fieldset>
                Seleccionar enfermedad: <br>
                <input type="radio" name="enfermedad" value="Dengue"> Dengue <br>
                <input type="radio" name="enfermedad" value="Enfermedad por Virus del Zika"> Zika <br>
                <input type="radio" name="enfermedad" value="Ambos" checked="checked"> Ambos <br>
            </fieldset>
            <input type="submit" value="Filtrar">
        </form>

          
        <h1>Lista de registros</h1>
        <table>
            <h2>Mostrando {{ $quantityEvents }} eventos.</h2>
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Provincia</th>
                    <th>Semana epidémica</th>
                    <th>Enfermedad</th>
                    <th>Grupo etario</th>
                    <th>Cantidad de casos</th>
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
</body>

</html>
