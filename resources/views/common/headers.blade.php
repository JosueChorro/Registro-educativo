<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Educativo</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="display:flex; flex-wrap:wrap; min-height:100vh;">
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
    </header>
    <div class="container pb-5">