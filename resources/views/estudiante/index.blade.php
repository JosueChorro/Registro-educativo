@include('common.headers')

<div class="container">
<h1 class="text-center">Lista de estudiantes</h1>
<hr>
<div class="pb-5"></div>

@if(Session::has('Mensaje'))
    <div class="alert alert-primary" role="alert">
        {{Session::get('Mensaje')}}
    </div>
@endif

<a href="{{ url('estudiante/create') }}" class="btn btn-success">Agregar</a><br><br>
<a href="{{ url('buscar') }}" class="btn btn-primary">Buscar informacion</a><br><br>
<table class="table table-light table-hover text-center table-responsive">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Grado</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estudiantes as $estudiante)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$estudiante->alm_codigo}}</td>
            <td>{{$estudiante->alm_nombre}}</td>
            <td>{{$estudiante->alm_edad}}</td>
            <td>{{$estudiante->alm_sexo}}</td>
            <td>
                @foreach($grados as $grado)
                    @if($estudiante->alm_id_grd == $grado->grd_id)
                        {{$grado->grd_nombre}}
                    @endif
                @endforeach
            </td>
            <td>{{$estudiante->alm_observacion}}</td>
            <td>
                <a href="{{ url('/estudiante/'.$estudiante->alm_id.'/edit')}}" class="btn btn-warning">Editar</a>
                | 
                <form action="{{url('/estudiante/'.$estudiante->alm_id)}}" method="post" style="display: inline;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Desea borrarlo?');" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@include('common.footer')