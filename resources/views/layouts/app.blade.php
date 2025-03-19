<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Hospitales')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
 
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
          
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M19 10h-5V5c0-1.105-.895-2-2-2s-2 .895-2 2v5H5c-1.105
                         0-2 .895-2 2s.895 2 2 2h5v5c0 1.105.895 2 2 2s2-.895
                         2-2v-5h5c1.105 0 2-.895 2-2s-.895-2-2-2z"/>
            </svg>
            <span>MediCare</span>
        </a>

       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

      
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('hospitals.create') }}">Registrar</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('hospitals.search') }}">Buscar</a></li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link" style="display:inline; padding: 0;">
                            Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>


 
    <div class="container-fluid">
        <div class="row">
         
           <div class="col-md-2 d-none d-md-block sidebar py-4">
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('hospitals.create') }}">
                <i class="bi bi-plus-circle"></i> Registrar Hospital
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('hospitals.search') }}">
                <i class="bi bi-search"></i> Buscar Hospitales
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('hospitals.list') }}">
                <i class="bi bi-list"></i> Listar Hospitales
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('hospitals.list') }}">
                <i class="bi bi-trash"></i> Eliminar Hospital
            </a>
        </li>
    </ul>
</div>
          
            <div class="col-md-10 content py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
