@extends('layouts.app')

@section('title', 'Confirmar Eliminación de Hospital')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
        <h4 class="mb-0">Confirmar Eliminación</h4>
    </div>
    <div class="card-body">
        <p>¿Estás seguro de que deseas eliminar el siguiente hospital?</p>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $hospital->id }}</td>
                </tr>
                <tr>
                    <th>Gerente</th>
                    <td>{{ $hospital->gerente }}</td>
                </tr>
                <tr>
                    <th>Condición</th>
                    <td>{{ $hospital->condicion }}</td>
                </tr>
                <tr>
                    <th>Sede</th>
                    <td>{{ $hospital->sede }}</td>
                </tr>
                <tr>
                    <th>Distrito</th>
                    <td>{{ $hospital->distrito }}</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-start mt-3">
            <form action="{{ route('hospitals.delete', $hospital->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger me-2">
                    <i class="bi bi-trash"></i> Eliminar
                </button>
            </form>
            <a href="{{ route('hospitals.list') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Cancelar
            </a>
        </div>
    </div>
</div>
@endsection
