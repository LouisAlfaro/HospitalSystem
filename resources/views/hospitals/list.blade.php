@extends('layouts.app')

@section('title', 'Listado de Hospitales')

@section('content')
<div class="mb-4">
    <h1 class="mb-3">Listado de Hospitales</h1>
    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('hospitals.list') }}" class="row g-2">
        <div class="col-md-3">
            <input type="text" name="gerente" id="gerente" class="form-control" placeholder="Gerente">
        </div>
        <div class="col-md-3">
            <input type="text" name="condicion" id="condicion" class="form-control" placeholder="Condición">
        </div>
        <div class="col-md-3">
            <input type="text" name="sede" id="sede" class="form-control" placeholder="Sede">
        </div>
        <div class="col-md-3">
            <input type="text" name="distrito" id="distrito" class="form-control" placeholder="Distrito">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary mt-2">Buscar</button>
        </div>
    </form>
</div>

<!-- Tabla de resultados -->
@if(isset($hospitals) && count($hospitals) > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Gerente</th>
                    <th>Condición</th>
                    <th>Sede</th>
                    <th>Distrito</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hospitals as $hospital)
                    <tr>
                        <td>{{ $hospital->id }}</td>
                        <td>{{ $hospital->gerente }}</td>
                        <td>{{ $hospital->condicion }}</td>
                        <td>{{ $hospital->sede }}</td>
                        <td>{{ $hospital->distrito }}</td>
                        <td>
                            <a href="{{ route('hospitals.edit', $hospital->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                            <form action="{{ route('hospitals.delete', $hospital->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-info">No se encontraron hospitales.</div>
@endif
@endsection
