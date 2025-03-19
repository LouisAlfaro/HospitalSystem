@extends('layouts.app')

@section('title', 'Buscar Hospitales')

@section('content')
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Buscar Hospitales</h4>
    </div>
    <div class="card-body">
       
        <form id="searchForm" method="GET" action="{{ route('hospitals.list') }}">
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="id_busqueda" class="form-label">ID (para editar)</label>
                    <input type="number" name="id_busqueda" id="id_busqueda" class="form-control" placeholder="Buscar por ID">
                </div>
                <div class="col-md-3">
                    <label for="gerente" class="form-label">Gerente</label>
                    <input type="text" name="gerente" id="gerente" class="form-control" placeholder="Buscar por gerente">
                </div>
                <div class="col-md-3">
                    <label for="condicion" class="form-label">Condición</label>
                    <input type="text" name="condicion" id="condicion" class="form-control" placeholder="Buscar por condición">
                </div>
                <div class="col-md-3">
                    <label for="sede" class="form-label">Sede</label>
                    <input type="text" name="sede" id="sede" class="form-control" placeholder="Buscar por sede">
                </div>
                <div class="col-md-3">
                    <label for="distrito" class="form-label">Distrito</label>
                    <input type="text" name="distrito" id="distrito" class="form-control" placeholder="Buscar por distrito">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <button type="submit" id="btnBuscar" class="btn btn-primary w-100">Buscar</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div id="results">
    @if(isset($hospitals))
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Resultados de la Búsqueda</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover m-0">
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
                            @forelse($hospitals as $hospital)
                                <tr>
                                    <td>{{ $hospital->id }}</td>
                                    <td>{{ $hospital->gerente }}</td>
                                    <td>{{ $hospital->condicion }}</td>
                                    <td>{{ $hospital->sede }}</td>
                                    <td>{{ $hospital->distrito }}</td>
                                    <td>
                                        <a href="{{ route('hospitals.edit', $hospital->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <form action="{{ route('hospitals.delete', $hospital->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No se encontraron hospitales.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    const fields = ['gerente', 'condicion', 'sede', 'distrito'];

    fields.forEach(field => {
        document.getElementById(field).addEventListener('input', function () {
            if (this.value.trim() !== '') {
                
                fields.filter(f => f !== field).forEach(otherField => {
                    document.getElementById(otherField).disabled = true;
                });
                document.getElementById('id_busqueda').disabled = true;
            } else {
                fields.forEach(f => {
                    document.getElementById(f).disabled = false;
                });
                document.getElementById('id_busqueda').disabled = false;
            }
        });
    });

    document.getElementById('id_busqueda').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            fields.forEach(f => {
                document.getElementById(f).disabled = true;
            });
        } else {
            fields.forEach(f => {
                document.getElementById(f).disabled = false;
            });
        }
    });

   
    document.getElementById('searchForm').addEventListener('submit', function(e) {
        e.preventDefault(); 
        const formData = new FormData(this);
        const params = new URLSearchParams(formData);

        fetch(this.action + '?' + params.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            
            let html = '';
            if(data.length > 0) {
                html += `<div class="card shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Resultados de la Búsqueda</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover m-0">
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
                                        <tbody>`;
                data.forEach(hospital => {
                    html += `<tr>
                                <td>${hospital.id}</td>
                                <td>${hospital.gerente}</td>
                                <td>${hospital.condicion}</td>
                                <td>${hospital.sede}</td>
                                <td>${hospital.distrito}</td>
                                <td>
                                    <a href="/hospitales/${hospital.id}/editar" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                    <form action="/hospitales/${hospital.id}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>`;
                });
                html += `   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>`;
            } else {
                html = `<div class="alert alert-info">No se encontraron hospitales.</div>`;
            }
            document.getElementById('results').innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>
@endsection
