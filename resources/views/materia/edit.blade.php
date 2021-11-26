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
<form action="{{url('/materia/'.$info->mat_id)}}" method="post" class="form-control pt-5">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
    <div class="container">
        <div class="mb-3 p-4">
            <label for="nombre" class="form-label">Nombre. </label>
            <input type="text" class="form-control" id="nombre" name="nombre"  value="{{ $info->mat_nombre }}">
        </div>
        <div class="col-auto p-4">
            <button type="submit" class="btn btn-warning mb-3">Modificar</button>
        </div>
    </div>
</form>
<div class="d-grid gap-2 pt-5">
    <a class="btn btn-danger" href="{{ url('materia') }}">Regresar</a>
</div>
<div class="pt-5">
@endforeach

</div>
@include('common.footer')