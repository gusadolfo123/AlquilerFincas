<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>

    <div class="container">
        <h1 class="page-header text-center mt-3 pt-2 pb-2 bg-success text-white ">Pre-Reserva</h1>
        <div class="row">
            <div class="col">
                Hola <i>{{ $demo->nomCompleto }}</i>,
                <p>Te informamos que haz realizado la pre-Reserva de la Finca: {{ $demo->nomFinca }} con las siguientes
                    condiciones: fecha desde {{ $demo->fecDesde }} al {{ $demo->fecHasta }}</p>
            </div>
        </div>
        <div class="row">
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tipo Temporada</th>
                        <th scope="col">Precio por Noche</th>
                        <th scope="col">Nro de Noches</th> 
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Normal</th>
                        <td>{{ $demo->valNocheTempNormal }}</td>
                        <td>{{ $demo->nroNochesN }}</td>
                        <td>{{ $demo->totalNochesTempNormal }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Media</th>
                        <td>{{ $demo->valNocheTempMedia }}</td>
                        <td>{{ $demo->nroNochesM }}</td>
                        <td>{{ $demo->totalNochesTempMedia }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alta</th>
                        <td>{{ $demo->valNocheTempAlta }}</td>
                        <td>{{ $demo->nroNochesA }}</td>
                        <td>{{ $demo->totalNochesTempAlta }}</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Total</td>
                        <td>{{ $demo->nroNochesN + $demo->nroNochesM + $demo->nroNochesA }}</td>
                        <td>{{ $demo->totalCotizacion }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col">
                Nos Estaremos Comunicando en breve para informar el proceso a seguir o comuniquese al 3043970363.
                <br /><br />
                Codigo de Reserva: {{ $demo->nroReserva }}
            </div>
        </div>
        <br />
        <footer class="footer mt-3">
            Gracias,
            <br />
            <i>{{ $demo->sender }}</i>
        </footer>
    </div>


</body>

</html>