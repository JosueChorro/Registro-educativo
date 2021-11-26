@include('common.headers')

<div class="container">
<h1 class="text-center">Informacion de estudiante</h1>
<hr>
<div class="pb-5"></div>
<form action="" method="post" class="form-control pt-5">
    {{csrf_field()}}
    <div class="container">
        <div class="p-4">
            <label for="alumno" class="form-label">Seleccione un alumnos. </label>
            <select class="form-select" aria-label="Default select example" name="alumno" id="alumno">
                <option selected>Open this select menu</option>
                @foreach($datos as $dato)
                    <option value="{{$dato->alm_id}}">{{$dato->alm_nombre}}</option>
                @endforeach
            </select>
        </div>
        <div id="resultado">

        </div>
    </div>
</form>
<div class="d-grid gap-2 pt-5">
    <a class="btn btn-danger" href="{{ url('estudiante') }}">Regresar</a>
</div>
<div class="pt-5"></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function(){
        $('#alumno').on('change', onShowInformation);
    });

    function onShowInformation(){
        var alm_id = $(this).val();
        $.get('/buscar/'+ alm_id +'/estudiantes', function (data){
            let htmlSelect = '';
            for (let index = 0; index < data.length; index++) {
                htmlSelect += '<label class="form-check-label">Codigo</label><input class="form-control" disabled type="text" value="' + data[index].alm_codigo + '">'
                htmlSelect += '<label class="form-check-label">Nombre</label><input class="form-control" disabled type="text" value="' + data[index].alm_nombre + '">'
                htmlSelect += '<label class="form-check-label">Edad</label><input class="form-control" disabled type="text" value="' + data[index].alm_edad + '">'
                htmlSelect += '<label class="form-check-label">Sexo</label><input class="form-control" disabled type="text" value="' + data[index].alm_sexo + '">'
                htmlSelect += '<label class="form-check-label">Codigo de grado</label><input class="form-control" disabled type="text" value="' + data[index].alm_id_grd + '">'
                htmlSelect += '<label class="form-check-label">Observaciones</label><input class="form-control" disabled type="text" value="' + data[index].alm_observacion + '">'
            }
            $('#resultado').html(htmlSelect);
        });
    }
</script>
@include('common.footer')