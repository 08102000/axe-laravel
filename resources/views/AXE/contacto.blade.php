@extends('adminlte::page')

@section('title', 'AXE')

@section('content_header')
<center>
    <h1>Detalles Contactos emergencia</h1>
</center>
<blockquote class="blockquote text-center">
    <p class="mb-0">Contactos emergencia registrados en el sistema AXE.</p>
    <footer class="blockquote-footer">Contactos emergencia <cite title="Source Title">Completados</cite></footer>
</blockquote>
@stop

@section('content')
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#contacto">+ Nuevo</button>

<div class="modal fade bd-example-modal-sm" id="contacto" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ingresa un nuevo Contacto emergencia</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>   
            <div class="modal-body">
                <p>Ingrese los Datos:</p>
            </div>
            <div class="modal-footer">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <form action="{{ url('contacto/insertar') }}" method="post">
                        @csrf
                        <!-- INICIO --->
                        <div class="mb-3 mt-3">
                            <label for="COD_PERSONA" class="form-label">Persona: </label>
                            <select class="form-select" id="COD_PERSONA" name="COD_PERSONA" required>
                                <option value="" disabled selected>Seleccione una persona</option>
                                @foreach ($personasArreglo as $persona)
                                    <option value="{{ $persona['COD_PERSONA'] }}">{{ $persona['NOMBRE'] }} {{ $persona['APELLIDO'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- FIN --->
                        <div class="mb-3 mt-3">
                            <label for="contacto" class="form-label">Nombre contacto</label>
                            <input type="text" class="form-control" id="NOMBRE_CONTACTO" name="NOMBRE_CONTACTO" placeholder="Ingrese el nombre del contacto">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="contacto" class="form-label">Apellidos Contacto</label>
                            <input type="text" class="form-control" id="APELLIDO_CONTACTO" name="APELLIDO_CONTACTO" placeholder="Ingrese los apellidos del contacto">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="contacto" class="form-label">Número de telefon contacto emergencia</label>
                            <input type="text" class="form-control" id="TELEFONO" name="TELEFONO" placeholder="Ingrese el Número de télefono contacto emergencia">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="contacto" class="form-label">Relación</label>
                            <input type="text" class="form-control" id="RELACION" name="RELACION" placeholder="Ingrese la relación">
                        </div>
                
                        <button type="submit" class="btn btn-primary">Añadir</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table cellspacing="10" cellpadding="10" class="table table-hover table-dark table-striped mt-1" style="border: 2px solid lime;">
        <thead>
            <tr>
                <th>Código contacto de emergencia</th>
                <th>Código persona</th>
                <th>Nombre contacto</th>
                <th>Apellido contacto</th>
                <th>Número de telefono contacto</th>
                <th>Relación</th>
                <th>Fecha de registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactoArreglo as $contacto)
            <tr>
                <td>{{ $contacto['COD_CONTACTO_EMERGENCIA'] }}</td>
                <td>{{ $contacto['COD_PERSONA'] }}</td>
                <td>{{ $contacto['NOMBRE_CONTACTO'] }}</td>
                <td>{{ $contacto['APELLIDO_CONTACTO'] }}</td>
                <td>{{ $contacto['TELEFONO'] }}</td>
                <td>{{ $contacto['RELACION'] }}</td>
                <td>{{ date('d, M Y', strtotime($contacto['FECHA'])) }}</td>
                <td>
                    <button value="Editar" title="Editar" class="btn btn-outline-info" type="button" data-toggle="modal"
                        data-target="#contacto-edit-{{ $contacto['COD_CONTACTO_EMERGENCIA'] }}">
                        <i class="fas fa-edit" style="font-size: 13px; color: cyan;"></i> Editar
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach($contactoArreglo as $contacto)
<div class="modal fade bd-example-modal-sm" id="contacto-edit-{{ $contacto['COD_CONTACTO_EMERGENCIA'] }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualiza el contacto seleccionado</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingresa los Nuevos Datos</p>
            </div>
            <div class="modal-footer">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <form action="{{ url('contacto/actualizar') }}" method="post">
                        @csrf
                        <input type="hidden" class="form-control" name="COD_CONTACTO_EMERGENCIA" value="{{ $contacto['COD_CONTACTO_EMERGENCIA'] }}">
                       
                        <div class="mb-3 mt-3">
                            <label for="contacto" class="form-label">Nombre contacto</label>
                            <input type="text" class="form-control" id="NOMBRE_CONTACTO" name="NOMBRE_CONTACTO" placeholder="Ingrese el nombre del contacto" value="{{ $contacto['NOMBRE_CONTACTO'] }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="contacto" class="form-label">Apellidos Contacto</label>
                            <input type="text" class="form-control" id="APELLIDO_CONTACTO" name="APELLIDO_CONTACTO" placeholder="Ingrese los apellidos del contacto" value="{{ $contacto['APELLIDO_CONTACTO'] }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="contacto" class="form-label">Número de telefon contacto emergencia</label>
                            <input type="text" class="form-control" id="TELEFONO" name="TELEFONO" placeholder="Ingrese el Número de télefono contacto emergencia" value="{{ $contacto['TELEFONO'] }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="contacto" class="form-label">Relación</label>
                            <input type="text" class="form-control" id="RELACION" name="RELACION" placeholder="Ingrese la relación" value="{{ $contacto['RELACION'] }}">
                        </div>
        

                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
