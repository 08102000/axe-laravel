@extends('adminlte::page')

@section('title', 'AXE')
@section('content_header')
    <center>
        <h1>Detalles Secciones</h1>
    </center>
    <blockquote class="blockquote text-center">
        <p class="mb-0">Secciones registradas en el sistema AXE.</p>
        <footer class="blockquote-footer">Existencia <cite title="Source Title">Completados</cite></footer>
    </blockquote>
@stop

@section('content')
<style>
    .same-width {
        width: 100%; /* El combobox ocupará el mismo ancho que el textbox */
    }
</style>

<style>
    .btn-custom {
        margin-top: 10px; /* Ajusta el valor según tus necesidades */
    }
</style>
<style>
    .spacer {
        height: 20px; /* Ajusta la altura según tus necesidades */
    }
</style>
<div class="spacer"></div>
<button type="button" class="btn btn-success btn-custom" data-toggle="modal" data-target="#secciones">+ Nuevo</button>
<div class="spacer"></div>
<div class="modal fade bd-example-modal-sm" id="secciones" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ingresa una Nueva Sección</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ingrese los Datos:</p>
                    <form action="{{ url('secciones/insertar') }}" method="post">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="DESCRIPCION_SECCIONES" class="form-label">Nombre de la Sección</label>
                            <input type="text" class="form-control" id="DESCRIPCION_SECCIONES" name="DESCRIPCION_SECCIONES" placeholder="Ingrese la sección">
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table id="miTabla" class="table table-hover table-dark table-striped mt-1" style="border:2px solid lime;">
        
            <thead>
                <tr>
                    <th>Código Sección</th> 
                    <th>Sección</th> 
                    <th>Opciones de la Tabla</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seccionesArreglo as $secciones)
                    <tr>
                        <td>{{ $secciones['COD_SECCIONES'] }}</td>
                        <td>{{ $secciones['DESCRIPCION_SECCIONES'] }}</td>
                        <td>
                            <button value="Editar" title="Editar" class="btn btn-outline-info" type="button" data-toggle="modal" data-target="#secciones-edit-{{ $secciones['COD_SECCIONES'] }}">
                                <i class='fas fa-edit' style='font-size:13px;color:cyan'></i> Editar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach($seccionesArreglo as $secciones)
        <div class="modal fade bd-example-modal-sm" id="secciones-edit-{{ $secciones['COD_SECCIONES'] }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Actualiza la sección seleccionada</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Ingrese los Nuevos Datos</p>
                        <form action="{{ url('secciones/actualizar') }}" method="post">
                            @csrf
                            <input type="hidden" class="form-control" name="COD_SECCIONES" value="{{ $secciones['COD_SECCIONES']}}">
                            <div class="mb-3 mt-3">
                                <label for="DESCRIPCION_SECCIONES" class="form-label">Nombres de la Sección</label>
                                <input type="text" class="form-control" id="DESCRIPCION_SECCIONES" name="DESCRIPCION_SECCIONES" placeholder="Ingrese la seccion" value="{{ $secciones['DESCRIPCION_SECCIONES'] }}">
                            </div>
                            <!-- ... otros campos del formulario ... -->
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
    <!-- Agregar estilos para DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    
    <script> console.log('Hi!'); </script>
    <!-- Agregar scripts para DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- Script personalizado para inicializar DataTables -->
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable({

              "language":{
             "search":       "Buscar: ",
             "lengthMenu":   "Mostrar _MENU_ registros por página",
             "info":   "Mostrando página _PAGE_ de _PAGES_",
             "paginate": {"previous": "Anterior",
                          "next":  "Siguiente",
                          "first": "Primero",
                          "last":  ""


             }
            }
          });
        });

    </script>
@stop
