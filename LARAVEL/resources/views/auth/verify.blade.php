@extends('layouts.app')

@section('main')
<style>

.verify-email-container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

.verify-email-card {
    text-align: center;
}

.verify-email-card .card-header {
    background-color: #007bff;
    color: white;
    font-size: 20px;
    padding: 10px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.verify-email-card .card-body {
    padding: 20px;
}

.alert {
    margin-bottom: 20px;
}

.resend-verification-form {
    display: inline-block;
}

.btn {
    color: #007bff;
    text-decoration: underline;
    background-color: transparent;
    border: none;
    cursor: pointer;
}

.btn:hover {
    text-decoration: none;
    color: #0056b3;
}
</style>
<div class="verify-email-container">
    <div class="verify-email-card">
        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
            <p>{{ __('If you did not receive the email') }},</p>

            <form class="resend-verification-form" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
</div>
@endsection
