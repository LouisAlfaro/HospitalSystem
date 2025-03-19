@extends('layouts.app')

@section('title', 'Registrar Hospital')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Registrar Hospital</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('hospitals.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="gerente" class="form-label">Gerente:</label>
                        <input type="text" id="gerente" name="gerente" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="condicion" class="form-label">Condición:</label>
                        <input type="text" id="condicion" name="condicion" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="sede" class="form-label">Sede:</label>
                        <input type="text" id="sede" name="sede" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="distrito" class="form-label">Distrito:</label>
                        <input type="text" id="distrito" name="distrito" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-info w-100">Registrar Hospital</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
