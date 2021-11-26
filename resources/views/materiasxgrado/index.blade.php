@include('common.headers')

<div class="container">
<h1 class="text-center">Lista de materias por grado</h1>
<hr>
<div class="pb-5"></div>

@if(Session::has('Mensaje'))
    <div class="alert alert-primary" role="alert">
        {{Session::get('Mensaje')}}
    </div>
@endif

<a href="{{ url('materiasxgrado/create') }}" class="btn btn-success space">Agregar</a><br><br>
<table class="table table-light table-hover text-center table-responsive">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Grado</th>
            <th>Materia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($materiasxgrados as $materiasxgrado)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                @foreach($grados as $grado)
                    @if($materiasxgrado->mxg_id_grd == $grado->grd_id)
                        {{$grado->grd_nombre}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($materias as $materia)
                    @if($materiasxgrado->mxg_id_mat == $materia->mat_id)
                        {{$materia->mat_nombre}}
                    @endif
                @endforeach
            </td>
            <td>
                <a href="{{ url('/materiasxgrado/'.$materiasxgrado->mxg_id.'/edit')}}" class="btn btn-warning">Editar</a>
                | 
                <form action="{{url('/materiasxgrado/'.$materiasxgrado->mxg_id)}}" method="post" style="display: inline;">
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