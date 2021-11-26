@include('common.headers')

<h2 class="text-center">Agregar materia</h2>
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

<form action="{{url('/materia')}}" method="post" class="form-control pt-5">
    {{csrf_field()}}
    <div class="container">
        <div class="mb-3 p-4">
            <label for="nombre" class="form-label">Nombre. </label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="col-auto p-4">
            <button type="submit" class="btn btn-primary mb-3">Agregar</button>
        </div>
    </div>
</form>
<div class="d-grid gap-2 pt-5">
    <a class="btn btn-danger" href="{{ url('materia') }}">Regresar</a>
</div>
<div class="pt-5">
    
</div>

@include('common.footer')