@extends('layouts.app')
@extends('layouts.main')

@section('content')
<div class="auth-container">
    <h1>Регистрация</h1>

    @if ($errors->any())
        <div class="error-container">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Подтверждение пароля:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn">Зарегистрироваться</button>
    </form>
</div>
@endsection