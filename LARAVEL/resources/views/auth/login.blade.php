@extends('layouts.app')

@section('main')
<style>
    .login-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        margin-left: 700px;
        margin-top: 60px;
        margin-bottom: 60px;
    }

    .login-card {
        text-align: center;
    }

    .login-card h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .form-group input:focus {
        border-color: #007bff;
        outline: none;
    }

    .form-group .invalid-feedback {
        color: red;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }

    .remember-me {
        display: flex;
        align-items: center;
    }

    .remember-me label {
        margin-left: 5px;
        color: #333;
    }

    .btn {
        display: inline-block;
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .forgot-password {
        display: block;
        margin-top: 10px;
        font-size: 14px;
        color: #007bff;
        text-decoration: none;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }
</style>
<div class="login-container">
    <div class="login-card">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group remember-me">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    Remember Me
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn">Login</button>
            </div>

            @if (Route::has('password.request'))
                <div class="form-group">
                    <a class="forgot-password" href="{{ route('password.request') }}">Forgot Your Password?</a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
