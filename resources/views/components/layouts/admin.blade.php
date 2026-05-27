<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="admin-layout">
        @include('templates.navigation.admin-sidebar')
        <div class="admin-layout__main">
            @include('templates.navigation.admin-topbar')
            <main class="admin-layout__content">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
</body>
</html>