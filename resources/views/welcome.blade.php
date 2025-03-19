<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a Medicare</title>

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
        .navbar-brand {
            font-weight: bold;
            display: flex;
            align-items: center; 
            gap: 0.5rem;         
        }
       
        .navbar-brand svg {
            height: 24px;  
            width: 24px;
            fill: currentColor; 
        }

       
        .hero {
            background: #0d6efd;
            color: #fff;
            position: relative;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
            overflow: hidden;
        }
       
        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero-content h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }
        .btn-hero {
            background-color: #fff;
            color: #0d6efd;
            border: none;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
        }
        .btn-hero:hover {
            background-color: #f8f9fa;
            color: #0b5ed7;
        }
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            line-height: 0;
        }
        .content-section {
            padding: 2rem 1rem;
        }
        .icon-box {
            font-size: 2.5rem;
            color: #0d6efd;
            margin-bottom: 1rem;
        }
        .footer {
            background: #f1f1f1;
            padding: 1rem 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid px-4">
        
            <a class="navbar-brand" href="#">
              
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 10h-5V5c0-1.105-.895-2-2-2s-2 .895-2 2v5H5c-1.105
                             0-2 .895-2 2s.895 2 2 2h5v5c0 1.105.895 2 2 2s2-.895
                             2-2v-5h5c1.105 0 2-.895 2-2s-.895-2-2-2z"/>
                </svg>
                Medicare
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if (Route::has('login'))
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            @endif
        </div>
    </nav>

  
    <section class="hero">
        <div class="hero-content">
            <h1>Bienvenido a Medicare</h1>
            <p>Tu plataforma integral para la gestión de hospitales y servicios médicos.</p>
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-hero btn-lg">Ir al Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-hero btn-lg">Iniciar Sesión</a>
            @endauth
        </div>
      
        <svg class="wave" viewBox="0 0 500 150" preserveAspectRatio="none">
            <path d="M-0.00,49.98 C150.00,150.00 271.76,-49.98 500.00,49.98 
                     L500.00,150.00 L0.00,150.00 Z" 
                  style="stroke: none; fill: #f8f9fa;">
            </path>
        </svg>
    </section>

    
    <section class="content-section container">
        <div class="row mb-5">
            <div class="col-md-6">
                <h2><i class="bi bi-hospital icon-box"></i> ¿Qué es Medicare?</h2>
                <p>
                    Medicare es una plataforma diseñada para simplificar la administración de hospitales, 
                    permitiendo registrar, buscar y gestionar información de forma rápida y eficiente. 
                    Nuestra misión es brindar la mejor experiencia a profesionales de la salud y pacientes.
                </p>
                <a href="{{ route('hospitals.search') }}" class="btn btn-outline-primary">Buscar Hospitales</a>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
               
                <svg width="300" height="300" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 11V21H20V11" stroke="#0d6efd" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4 7H9V3H15V7H20V21H4V7Z" fill="#dbeafe" stroke="#0d6efd"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 14V17" stroke="#0d6efd" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.5 15.5H13.5" stroke="#0d6efd" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>

        <hr>

        <div class="row text-center mt-5">
            <div class="col-md-4 mb-4">
                <i class="bi bi-speedometer2 icon-box"></i>
                <h4>Rendimiento</h4>
                <p>Gestiona toda la información de manera rápida y eficiente.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="bi bi-search icon-box"></i>
                <h4>Búsqueda Avanzada</h4>
                <p>Encuentra hospitales por gerente, condición, sede o distrito.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="bi bi-check2-circle icon-box"></i>
                <h4>Facilidad de Uso</h4>
                <p>Interfaz intuitiva para médicos, administradores y pacientes.</p>
            </div>
        </div>
    </section>


    <footer class="footer text-center">
        <div class="container">
            <span class="text-muted">© 2023 Medicare. Todos los derechos reservados.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
