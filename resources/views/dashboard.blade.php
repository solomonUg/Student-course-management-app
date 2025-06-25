<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

     <div class="mb-8 max-w-7xl mx-auto ">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 text-white my-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}!</h2>
                        <p class="text-indigo-100">Here's what's happening in your system today.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-white/20 rounded-full p-4">
                            <i class="fas fa-chart-line text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div>
       


        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Students -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Students</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $students_count }}</p>
                        <p class="text-sm text-green-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span x-text="stats.studentsGrowth"></span>% from last month
                        </p>
                    </div>
                    <div class="bg-blue-100 rounded-full p-3">
                        <i class="fas fa-users text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total Courses -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Courses</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $courses_count }}</p>
                        <p class="text-sm text-green-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span x-text="stats.coursesGrowth"></span>% from last month
                        </p>
                    </div>
                    <div class="bg-purple-100 rounded-full p-3">
                        <i class="fas fa-book text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Active Enrollments -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Enrollments</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $enrollments_count }}</p>
                        <p class="text-sm text-green-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span x-text="stats.enrollmentsGrowth"></span>% from last month
                        </p>
                    </div>
                    <div class="bg-indigo-100 rounded-full p-3">
                        <i class="fas fa-user-plus text-indigo-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Average Units -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Avg Units/Student</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $average_units }}</p>
                        <p class="text-sm text-gray-500 mt-1">Units per student</p>
                    </div>
                    <div class="bg-green-100 rounded-full p-3">
                        <i class="fas fa-chart-bar text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>

        </div>
        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 mb-8 ">
            <div class="flex items-center mb-6">
                <div class="bg-indigo-100 rounded-full p-2 mr-3">
                    <i class="fas fa-bolt text-indigo-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">Quick Actions</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Add Student -->
                <a href="{{ route('students.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-md hover:shadow-lg">
                    <div class="flex items-center justify-between mb-3">
                        <i class="fas fa-user-plus text-2xl"></i>
                        <i class="fas fa-arrow-right opacity-70"></i>
                    </div>
                    <h4 class="font-semibold text-lg mb-1">Add New Student</h4>
                    <p class="text-blue-100 text-sm">Register a new student in the system</p>
                </a>

                <!-- Add Course -->
                <a href="{{ route('courses.create') }}" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-200 shadow-md hover:shadow-lg">
                    <div class="flex items-center justify-between mb-3">
                        <i class="fa-solid fa-book text-2xl"></i>
                        <i class="fas fa-arrow-right opacity-70"></i>
                    </div>
                    <h4 class="font-semibold text-lg mb-1  text-start">Create New Course</h4>
                    <p class="text-purple-100 text-sm text-start">Add a new course to the catalog</p>
                </a>

                <!-- Enroll Student -->
                <a href="{{route('enrollments.create')}}" class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white p-6 rounded-xl hover:from-indigo-600 hover:to-indigo-700 transition-all duration-200 shadow-md hover:shadow-lg">
                    <div class="flex items-center justify-between mb-3">
                        <i class="fas fa-graduation-cap text-2xl"></i>
                        <i class="fas fa-arrow-right opacity-70"></i>
                    </div>
                    <h4 class="font-semibold text-lg mb-1 text-start">Enroll Student</h4>
                    <p class="text-indigo-100 text-sm text-start">Assign courses to students</p>
                </a>
            </div>
        </div>
</x-app-layout>





{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Student Course Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
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
                    <a href="/dashboard" class="text-indigo-600 font-medium">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a href="{{route('students.index')}}" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-users"></i> Students
                    </a>
                    <a href="{{route('courses.index')}}" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-book"></i> Courses
                    </a>
                    <a href="{{route('enrollments.index')}}" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-user-plus"></i> Enrollments
                    </a>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-gray-500 hover:text-gray-700 transition-colors">
                            <i class="fas fa-user-circle mr-2"></i>
                            <span>John Doe</span>
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                            <hr class="mt-1">
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-lg">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8" >
        <!-- Welcome Section -->
        <div class="mb-8">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold mb-2">Welcome back, John!</h2>
                        <p class="text-indigo-100">Here's what's happening in your system today.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-white/20 rounded-full p-4">
                            <i class="fas fa-chart-line text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Students -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Students</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $students_count }}</p>
                        <p class="text-sm text-green-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span x-text="stats.studentsGrowth"></span>% from last month
                        </p>
                    </div>
                    <div class="bg-blue-100 rounded-full p-3">
                        <i class="fas fa-users text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total Courses -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Courses</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $courses_count }}</p>
                        <p class="text-sm text-green-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span x-text="stats.coursesGrowth"></span>% from last month
                        </p>
                    </div>
                    <div class="bg-purple-100 rounded-full p-3">
                        <i class="fas fa-book text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Active Enrollments -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Enrollments</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $enrollments_count }}</p>
                        <p class="text-sm text-green-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span x-text="stats.enrollmentsGrowth"></span>% from last month
                        </p>
                    </div>
                    <div class="bg-indigo-100 rounded-full p-3">
                        <i class="fas fa-user-plus text-indigo-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Average Units -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Avg Units/Student</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $average_units }}</p>
                        <p class="text-sm text-gray-500 mt-1">Units per student</p>
                    </div>
                    <div class="bg-green-100 rounded-full p-3">
                        <i class="fas fa-chart-bar text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 mb-8">
            <div class="flex items-center mb-6">
                <div class="bg-indigo-100 rounded-full p-2 mr-3">
                    <i class="fas fa-bolt text-indigo-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">Quick Actions</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Add Student -->
                <a href="{{ route('students.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-md hover:shadow-lg">
                    <div class="flex items-center justify-between mb-3">
                        <i class="fas fa-user-plus text-2xl"></i>
                        <i class="fas fa-arrow-right opacity-70"></i>
                    </div>
                    <h4 class="font-semibold text-lg mb-1">Add New Student</h4>
                    <p class="text-blue-100 text-sm">Register a new student in the system</p>
                </a>

                <!-- Add Course -->
                <a href="{{ route('courses.create') }}" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-200 shadow-md hover:shadow-lg">
                    <div class="flex items-center justify-between mb-3">
                        <i class="fa-solid fa-book text-2xl"></i>
                        <i class="fas fa-arrow-right opacity-70"></i>
                    </div>
                    <h4 class="font-semibold text-lg mb-1  text-start">Create New Course</h4>
                    <p class="text-purple-100 text-sm text-start">Add a new course to the catalog</p>
                </a>

                <!-- Enroll Student -->
                <a href="{{route('enrollments.create')}}" class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white p-6 rounded-xl hover:from-indigo-600 hover:to-indigo-700 transition-all duration-200 shadow-md hover:shadow-lg">
                    <div class="flex items-center justify-between mb-3">
                        <i class="fas fa-graduation-cap text-2xl"></i>
                        <i class="fas fa-arrow-right opacity-70"></i>
                    </div>
                    <h4 class="font-semibold text-lg mb-1 text-start">Enroll Student</h4>
                    <p class="text-indigo-100 text-sm text-start">Assign courses to students</p>
                </a>
            </div>
        </div>
            
    </div>
</body>
</html> --}}
