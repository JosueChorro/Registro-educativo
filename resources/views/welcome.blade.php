<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro - Educativo</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstat//ic.com" crossorigin>
        <link rel="stylesheet" href="../../css/app.css">
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            :root{
                scroll-behavior: smooth;
            }
            body{
                font-family: 'Lato', sans-serif;
                overflow-x:hidden;
                overflow-y:hidden;
            }
            .container{
                width: 90%;
                max-width: 1200px;
                overflow: hidden;
                margin: auto;
                padding: 60px 0;
            }
            .header{
                height: 100vh;
                background-image: linear-gradient(to right, rgba(248, 54, 0, 0.506) 0%, rgba(249, 213, 35, 0.502) 100%), url(../img/educacion.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
                background-position: center;
            }

            .head{
                padding: 0;
                height: 100%;
                display: flex;
                justify-content: center;
                text-align: center;
                align-items: center;
                flex-direction: column;
                color: #fff;
            }

        </style>
    </head>
    <body>
        <header class="header pb-5" id="started" style="align-self:flex-start; width:100%">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{url('/')}}">Registro Educativo</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a href="{{url('/')}}" class="nav-link">Inicio</a>
                            <a href="{{url('/materia')}}" class="nav-link">Materias</a>
                            <a href="{{url('/grado')}}" class="nav-link">Grados</a>
                            <a href="{{url('/estudiante')}}" class="nav-link">Alumnos</a>
                            <a href="{{url('/materiasxgrado')}}" class="nav-link">Listado de materias</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container head">
                <h1 class="title">Sistema de educacion</h1>
                <p class="copy">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </header>
    </body>
</html>
