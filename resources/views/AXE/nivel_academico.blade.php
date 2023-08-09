@extends('adminlte::page')

@section('title', 'AXE')
@section('content_header')
    <center>
        <h1>Detalles Nivel Academico</h1>
    </center>
    <blockquote class="blockquote text-center">
        <p class="mb-0">Niveles Academicos registrados en el sistema AXE.</p>
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
<button type="button" class="btn btn-success btn-custom" data-toggle="modal" data-target="#nivel_academico">+ Nuevo</button>
<div class="spacer"></div>
<div class="modal fade bd-example-modal-sm" id="nivel_academico" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ingresa un Nuevo Nivel Academico</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ingrese los Datos:</p>
                    <form action="{{ url('nivel_academico/insertar') }}" method="post">
                        @csrf
                        <div class="mb-3">
                        <label for="nivel_academico" class="form-label">Niveles Academicos</label>
                        <select class="form-select" id="descripcion" name="descripcion">
                        <option value="Ciclo Comun" selected>Ciclo Comun</option>
                        <option value="Bachillerato Informatica"selected>Bachillerato Informatica</option>
                        <option value="Bachillerato Finanzas"selected>Bachillerato Finanzas</option>
                        <option value="Bachillerato Humanidades"selected>Bachillerato Humanidades</option>
                        </select>
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
                    <th>#</th> 
                    <th>Nivel Academico</th> 
                    <th>Opciones de la Tabla</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nivel_academico_Arreglo as $nivel_academico)
                    <tr>
                        <td>{{ $nivel_academico['COD_NIVEL_ACADEMICO'] }}</td>
                        <td>{{ $nivel_academico['descripcion'] }}</td>
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

    @foreach($nivel_academico_Arreglo as $nivel_academico)
        <div class="modal fade bd-example-modal-sm" id="jornadas-edit-{{ $nivel_academico['COD_NIVEL_ACADEMICO'] }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Actualiza la jornada seleccionada</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Ingrese los Nuevos Datos</p>
                        <form action="{{ url('nivel_academico/actualizar') }}" method="post">
                            @csrf
                            <input type="hidden" class="form-control" name="COD_NIVEL_ACADEMICO" value="{{$nivel_academico['NIVEL_ACADEMICO']}}">
                        <div class="mb-3">
                        <label for="nivel_academico" class="form-label">Niveles Académicos</label>
                        <select class="form-select" id="descripcion" name="descripcion">
                        <option value="Ciclo Común" {{ $nivel_academico['descripcion'] === 'Ciclo Común' ? 'selected' : '' }}>Ciclo Común</option>
                        <option value="Bachillerato Informática" {{ $nivel_academico['descripcion'] === 'Bachillerato Informática' ? 'selected' : '' }}>Bachillerato Informática</option>
                        <option value="Bachillerato Finanzas" {{ $nivel_academico['descripcion'] === 'Bachillerato Finanzas' ? 'selected' : '' }}>Bachillerato Finanzas</option>
                        </select>
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
