<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
      body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        background: #f7f9fc;
        padding: 20px 20px;
      }
      
      .form-signin {
        width: 100%;
        max-width: 500px;
        padding: 30px;
        margin: auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }
      
      .form-signin img {
        margin-bottom: 10px;
        width: 80px;
        height: 80px;
      }

      .form-signin h1 {
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: bold;
        color: #333;
      }

      .form-signin input[type="email"], 
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-radius: 10px;
        padding: 15px;
        font-size: 14px;
      }

      .form-signin button {
        background-color: #6e8efb;
        border: none;
        padding: 12px;
        font-size: 16px;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
        color: #fff;
      }
      
      .form-signin button:hover {
        background-color: #5b76e7;
      }

      .input-group-text {
        cursor: pointer;
        padding: 0 10px;
        border-radius: 0 10px 10px 0;
        display: flex;
        align-items: center;
        border-left: 0;
        background-color: transparent;
        color: #6e8efb;
        border: 1px solid #ced4da;
        border-left: 0;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
      }

      .input-group .form-control {
        border-radius: 10px 0 0 10px;
        border-right: 0;
      }

      .form-group label {
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
      }

      .form-signin a {
        color: #6e8efb;
        text-decoration: none;
      }

      .form-signin a:hover {
        text-decoration: underline;
      }

      .alert {
        margin-top: 10px;
        padding: 10px;
        font-size: 14px;
      }

      .input-group {
        position: relative;
      }

      .input-group .form-control,
      .input-group .input-group-text {
        height: 45px;
      }
    </style>
</head>
<body>
    <main class="form-signin">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img class="mb-4" src="{{ asset('images/logo.png') }}" alt="Logo">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    <span class="input-group-text" id="toggle-password"><i class="fas fa-eye"></i></span>
                </div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
            <p class="mt-1 mb-0"><a href="{{ route('password.request') }}">Forgot Password?</a></p>
            <p class="text-center mt-3 mb-0">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </form>
    </main>

    <script>
        document.getElementById('toggle-password').addEventListener('click', function () {
            var passwordInput = document.getElementById('password');
            var icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>
