@extends('layouts.app')

@section('main')
<style>
.reset-password-container {
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

.reset-password-card {
    text-align: center;
}

.reset-password-card .card-header {
    background-color: #007bff;
    color: white;
    font-size: 20px;
    padding: 10px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.reset-password-card .card-body {
    padding: 20px;
}

.reset-password-card .card-body .alert {
    margin-bottom: 20px;
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
</style>
<div class="reset-password-container">
    <div class="reset-password-card">
        <div class="card-header">{{ __('Reset Password') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn">{{ __('Send Password Reset Link') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
