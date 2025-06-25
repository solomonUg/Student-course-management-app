<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Course Management System</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col justify-between min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded relative mx-auto my-4 w-fit shadow-md" role="alert">
            <span class="block sm:inline font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    <header class="bg-white shadow-sm border-b border-gray-200">
        <!-- Navigation Header -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-xl font-bold text-gray-900">
                            <i class="fas fa-graduation-cap text-indigo-600 mr-2"></i>
                            Student Management System
                        </h1>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/dashboard" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a href="{{route('students.index')}}" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-users"></i> Students
                    </a>
                    <a href="{{route('courses.index')}}" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-book"></i> Courses
                    </a>
                    <a href="{{route('enrollments.index')}}" class="text-indigo-600 font-medium">
                        <i class="fas fa-user-plus"></i> Enrollments
                    </a>
                </div>
            </div>
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