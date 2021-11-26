@include('common.headers')
<h2 class="text-center">Modificar materia</h2>
<hr>
<div class="pb-5"></div>
@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@foreach ($informacion as $info)
<form action="{{url('/materiasxgrado/'.$info->mxg_id)}}" method="post" class="form-control pt-5">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
    <div class="container">
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
            <label for="grado" class="form-label">Materia. </label>
            <select class="form-select" aria-label="Default select example" name="materia">
                <option selected>Open this select menu</option>
                @foreach($materias as $materia)
                    <option value="{{$materia->mat_id}}">{{$materia->mat_nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto p-4">
            <button type="submit" class="btn btn-warning mb-3">Modificar</button>
        </div>
    </div>
</form>
<div class="d-grid gap-2 pt-5">
    <a class="btn btn-danger" href="{{ url('materiasxgrado') }}">Regresar</a>
</div>
<div class="pt-5">
@endforeach

</div>
@include('common.footer')