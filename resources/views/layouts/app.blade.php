<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="robots" content="noindex">
    <title>{{ $title ?? '' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&display=swap"
        rel="stylesheet"
        >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    @livewire('widgets.header')
    <main class="app-main">
        @include('templates.ui.breadcrumbs')
        @yield('content')       
        @include('templates.ui.layer')
        @if (request()->routeIs(['home', 'service*', 'portfolio', 'about']))
            @include('templates.ui.callback-btn')
        @endif
    </main>
    <footer class="app-footer">
        <div class="my-container">
            <p>&copy; {{ date('Y') }} Elita Project. Все права защищены.</p>
        </div>
    </footer>
    @livewireScripts
</body>
</html>