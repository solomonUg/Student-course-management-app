<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Student Course Management System</title>
     <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
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
                    <a href="/login" class="text-indigo-600 hover:text-indigo-700 font-medium transition-colors px-4 py-2 rounded-lg hover:bg-indigo-50">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="/register" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors font-medium">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-20">
        <div class="text-center">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-3xl p-12 mb-16 text-white relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 left-0 w-full h-full">
                        <i class="fas fa-graduation-cap text-8xl absolute top-8 right-8 opacity-20"></i>
                        <i class="fas fa-book text-6xl absolute bottom-8 left-8 opacity-20"></i>
                        <i class="fas fa-users text-7xl absolute top-1/2 left-1/4 opacity-20"></i>
                    </div>
                </div>
                
                <div class="relative z-10">
                    <div class="bg-white/20 rounded-full p-6 w-24 h-24 mx-auto mb-8 flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-4xl"></i>
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">
                        Welcome to Your
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">
                            Student Management
                        </span>
                        <span class="block">System</span>
                    </h1>
                    <p class="text-xl text-indigo-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                        Streamline your educational administration with our comprehensive platform for managing students, courses, and enrollments. Built for efficiency, designed for excellence.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/register" class="bg-white text-indigo-600 px-8 py-4 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-200 shadow-lg hover:shadow-xl">
                            <i class="fas fa-rocket mr-2"></i>
                            Get Started Today
                        </a>
                        <a href="/login" class="border-2 border-white text-white px-8 py-4 rounded-xl font-semibold hover:bg-white hover:text-indigo-600 transition-all duration-200">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Everything You Need</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Our platform provides all the tools you need to efficiently manage your educational institution
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Student Management -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition-all duration-200 group">
                    <div class="bg-blue-100 rounded-full p-4 w-16 h-16 mx-auto mb-6 group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-users text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 text-center">Student Management</h3>
                    <p class="text-gray-600 text-center mb-6">
                        Easily add, edit, and manage student information including personal details, contact information, and academic records.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Complete student profiles
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Search and filter capabilities
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Bulk operations support
                        </li>
                    </ul>
                </div>

                <!-- Course Management -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition-all duration-200 group">
                    <div class="bg-purple-100 rounded-full p-4 w-16 h-16 mx-auto mb-6 group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-book text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 text-center">Course Catalog</h3>
                    <p class="text-gray-600 text-center mb-6">
                        Create and maintain a comprehensive course catalog with detailed descriptions, units, and course codes.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Detailed course information
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Unit tracking
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Course categorization
                        </li>
                    </ul>
                </div>

                <!-- Enrollment System -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition-all duration-200 group">
                    <div class="bg-indigo-100 rounded-full p-4 w-16 h-16 mx-auto mb-6 group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-user-plus text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 text-center">Smart Enrollment</h3>
                    <p class="text-gray-600 text-center mb-6">
                        Efficiently manage student-course relationships with our intuitive enrollment system and tracking.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Multiple course enrollment
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Enrollment history
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Progress tracking
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Stats Preview -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 mb-16">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Trusted by Educators</h2>
                <p class="text-lg text-gray-600">Join thousands of institutions already using our platform</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-3xl font-bold text-indigo-600 mb-2">500+</div>
                    <div class="text-gray-600">Active Users</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-purple-600 mb-2">1,000+</div>
                    <div class="text-gray-600">Students Managed</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">200+</div>
                    <div class="text-gray-600">Courses Available</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600 mb-2">99.9%</div>
                    <div class="text-gray-600">Uptime</div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <div class="bg-gradient-to-r from-gray-900 to-gray-700 rounded-2xl p-12 text-white">
                <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                    Join our platform today and transform the way you manage your educational institution. It's free to get started!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/register" class="bg-indigo-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                        <i class="fas fa-user-plus mr-2"></i>
                        Create Account
                    </a>
                    <a href="/login" class="border-2 border-gray-400 text-gray-300 px-8 py-4 rounded-xl font-semibold hover:bg-gray-600 hover:border-gray-300 transition-all duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-graduation-cap text-indigo-600 text-2xl mr-2"></i>
                    <span class="text-xl font-bold text-gray-900">Student Course Management System</span>
                </div>
                <p class="text-gray-600 mb-4">
                    Empowering educational institutions with modern management tools
                </p>
                <div class="flex justify-center space-x-4 text-gray-400">
                    <a href="#" class="hover:text-indigo-600 transition-colors">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="hover:text-indigo-600 transition-colors">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="hover:text-indigo-600 transition-colors">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                    <a href="#" class="hover:text-indigo-600 transition-colors">
                        <i class="fab fa-github text-xl"></i>
                    </a>
                </div>
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-500">
                        © 2025 Student Management System. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>