<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Course Management System</title>
</head>
<body>
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <header>
        <nav>Nav bar</nav>
    </header>
    <main>
        {{ $slot }}
        <footer>
            <p>&copy; 2025 Student Course Management System</p>
        </footer>
    </main>
</body>
</html>