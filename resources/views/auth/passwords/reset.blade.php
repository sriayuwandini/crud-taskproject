<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        background: #f7f9fc;
      }
      
      .form-signin {
        width: 100%;
        max-width: 400px;
        padding: 30px;
        margin: auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

      .form-group label {
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
      }

      .alert {
        margin-top: 10px;
        padding: 10px;
        font-size: 14px;
      }
    </style>
</head>
<body>
    <main class="form-signin">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <h1 class="h3 mb-3 fw-normal">Reset Password</h1>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ $email ?? old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="New Password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Confirm New Password" required>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Reset Password</button>
        </form>
    </main>
</body>
</html>
