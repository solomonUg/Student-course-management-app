<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Course Management System</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col justify-between min-h-screen">
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded relative mx-auto my-4 w-fit shadow-md" role="alert">
            <span class="block sm:inline font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    <header class="bg-amber-500 text-white p-4 w-full flex justify-center items-center">
        <nav class="flex w-[80%] justify-between items-center">
            <div>
                <a href="/" class="text-xl font-bold">Student Course Management System</a>
            </div>
            <div class="flex space-x-4 text-xl">
                <a href="{{ route('students.index') }}" class="hover:underline">View All Students</a>
                <a href="{{ route('students.create') }}" class="hover:underline">Add New Student</a>
            </div>
        </nav>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <p>&copy; 2025 Student Course Management System</p>
    </footer>
</body>
</html>