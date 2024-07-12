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

        .search-form {
            position: relative;
        }
        .search-form input[type="text"] {
            border-radius: 20px;
            padding: 5px 10px;
            border: none;
        }
        .search-form button {
            border: none;
            background: none;
            color: #ffffff;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>Logout
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
</body>
</html>
