@extends('layouts.app')
@section('content')
<section 
        x-data
        x-init="$store.uiLayer.handleResPsw();"
        class="flex items-center justify-center min-h-[60vh] px-4 relative z-20">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-6">
        <h1 class="text-2xl font-semibold text-center mb-2">
            Сброс пароля
        </h1>
        <p class="text-sm text-gray-500 text-center mb-6">
            Введите новый пароль для вашего аккаунта
        </p>
        @livewire('forms.auth.user-res-psw', ['token' => $token])
    </div>
</section>
@endsection
