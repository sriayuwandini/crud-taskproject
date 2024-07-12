<!DOCTYPE html>
<html>
<head>
    <title>Pengelola Tugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .navbar-custom {
            background: linear-gradient(135deg, rgba(0,0,0,0.8), rgba(70,130,180,0.8));
        }
        .navbar-brand {
            font-size: 1.5rem;
            color: #ffffff !important;
        }
        .navbar-brand i {
            margin-right: 10px;
        }
        .nav-link {
            font-size: 1.1rem;
            color: #ffffff !important;
            transition: all 0.3s;
        }
        .nav-link.active, .nav-link:hover {
            border-bottom: 2px solid #ffffff;
            color: #ffffff !important;
        }
        .navbar-toggler {
            border: none;
            background-color: transparent;
        }
        .navbar-toggler:focus {
            outline: none;
        }
        .navbar-toggler-icon {
            background-image: url(https://cdn-icons-png.flaticon.com/128/4254/4254068.png);
        }
        .navbar-toggler-icon:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">PENGELOLA TUGAS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('tasks*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('tasks.index') }}" data-target="tasks">
                            <i class="fas fa-tasks"></i> Tasks
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('projects*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('projects.index') }}" data-target="projects">
                            <i class="fas fa-project-diagram"></i> Projects
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
