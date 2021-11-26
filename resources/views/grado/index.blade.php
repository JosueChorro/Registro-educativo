@include('common.headers')

<div class="container">
<h1 class="text-center">Lista de grados</h1>
<hr>
<div class="pb-5"></div>

@if(Session::has('Mensaje'))
    <div class="alert alert-primary" role="alert">
        {{Session::get('Mensaje')}}
    </div>
@endif

<a href="{{ url('grado/create') }}" class="btn btn-success space">Agregar</a><br><br>
<table class="table table-light table-hover text-center table-responsive">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($grados as $grado)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$grado->grd_nombre}}</td>
            <td>
                <a href="{{ url('/grado/'.$grado->grd_id.'/edit')}}" class="btn btn-warning">Editar</a>
                | 
                <form action="{{url('/grado/'.$grado->grd_id)}}" method="post" style="display: inline;">
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