@include('common.headers')

<h2 class="text-center">Agregar estudiante</h2>
<hr>
<div class="pb-4"></div>
@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{url('/estudiante')}}" method="post" class="form-control pt-5">
    {{csrf_field()}}
    <div class="container">
        <div class="p-4">
            <label for="codigo" class="form-label">Codigo. </label>
            <input type="text" class="form-control" id="codigo" name="codigo">
        </div>
        <div class="p-4">
            <label for="nombre" class="form-label">Nombre. </label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="p-4">
            <label for="edad" class="form-label">Edad. </label>
            <input type="number" class="form-control" id="edad" name="edad">
        </div>
        <h6 class="p-4">Sexo</h6>
        <div class="p-4">
            <input class="form-check-input" type="radio" name="sexo" id="mujer" value="mujer">
            <label class="form-check-label" for="mujer">Mujer</label>
        </div>
        <div class="p-4">
            <input class="form-check-input" type="radio" name="sexo" id="hombre" value="hombre">
            <label class="form-check-label" for="hombre">Hombre</label>
        </label>
        </div>

        <div class="p-4">
            <label for="grado" class="form-label">Grado. </label>
            <select class="form-select" aria-label="Default select example" name="grado">
                <option selected>Open this select menu</option>
                @foreach($grados as $grado)
                    <option value="{{$grado->grd_id}}">{{$grado->grd_nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="p-4">
            <label for="observacion" class="form-label">Observacion.</label>
            <textarea class="form-control" id="observacion" name="observacion" rows="3"></textarea>
        </div>
        <div class="col-auto p-4">
            <button type="submit" class="btn btn-primary mb-3">Agregar</button>
        </div>
    </div>
</form>
<div class="d-grid gap-2 pt-5">
    <a class="btn btn-danger" href="{{ url('estudiante') }}">Regresar</a>
</div>
<div class="pt-5">
    
</div>

@include('common.footer')