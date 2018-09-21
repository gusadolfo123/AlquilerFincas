<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>

    <div class="container">
        <h1 class="page-header text-center mt-3 pt-2 pb-2 bg-success text-white ">Mensaje AlquilamosFincas.com</h1>
                

        <div class="row">
            <div class="col">
                <h4>Informacion Usuario</h4>
                Usuario:{{  $demo->fname }}
                <br />
                Correo:{{  $demo->email }}
                <br />
                Telefono: {{  $demo->phone }}              
                <br /><br />
            </div>
        </div>

        <div class="row">
            <h4>Mensaje</h4>
            <div>
                {{ $demo->message }}
            </div>
        </div>
       
    </div>


</body>

</html>