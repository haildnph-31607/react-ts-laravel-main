@extends('layouts.app')

@section('main')
    <style>
        .confirm-password-container {
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

        .confirm-password-card {
            text-align: center;
        }

        .confirm-password-card .card-header {
            background-color: #007bff;
            color: white;
            font-size: 20px;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .confirm-password-card .card-body {
            padding: 20px;
        }

        .confirm-password-card .card-body p {
            margin-bottom: 20px;
            font-size: 16px;
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
    <div class="confirm-password-container">
        <div class="confirm-password-card">
            <div class="card-header">{{ __('Confirm Password') }}</div>

            <div class="card-body">
                {{ __('Please confirm your password before continuing.') }}

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn">{{ __('Confirm Password') }}</button>

                        @if (Route::has('password.request'))
                            <a class="forgot-password"
                                href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
