
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4">Bienvenido, {{ auth()->user()->name }}!</h1>
            <p class="lead">Este es el panel de control donde puedes gestionar hospitales y otras funcionalidades.</p>
        </div>
    </div>

    <div class="row">
 
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Registrar Hospital</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Agrega nuevos hospitales al sistema de forma rápida y sencilla.</p>
                    <a href="{{ route('hospitals.create') }}" class="btn btn-info">Registrar</a>
                </div>
            </div>
        </div>

       
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Buscar Hospitales</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Realiza búsquedas avanzadas por gerente, condición, sede o distrito.</p>
                    <a href="{{ route('hospitals.search') }}" class="btn btn-primary">Buscar</a>
                </div>
            </div>
        </div>

      
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title mb-0">Listado de Hospitales</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Visualiza y administra el listado completo de hospitales registrados.</p>
                    <a href="{{ route('hospitals.list') }}" class="btn btn-success">Ver Lista</a>
                </div>
            </div>
        </div>
    </div>

   
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h5 class="card-title mb-0">Estadísticas</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Accede a informes y gráficos del rendimiento del sistema.</p>
                    <a href="#" class="btn btn-warning">Ver Estadísticas</a>
                </div>
            </div>
        </div>
    

    <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title mb-0">Eliminar Hospital</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Confirma la eliminación de un hospital.</p>
                  
                    <a href="{{ route('hospitals.list') }}" class="btn btn-danger w-100">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
    </div>

</div>
@endsection
