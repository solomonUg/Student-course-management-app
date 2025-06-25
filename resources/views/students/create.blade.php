<x-app-layout>
    <div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <a href="{{ route('students.index') }}" class="text-indigo-600 hover:text-indigo-700 transition-colors mr-4">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </a>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Add New Student</h1>
                        <p class="text-gray-600 mt-1">Fill in the information below to register a new student</p>
                    </div>
                </div>
                
                <!-- Breadcrumb -->
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2 text-sm text-gray-500">
                        <li><a href="/dashboard" class="hover:text-indigo-600 transition-colors">Dashboard</a></li>
                        <li><i class="fas fa-chevron-right text-xs"></i></li>
                        <li><a href="{{ route('students.index') }}" class="hover:text-indigo-600 transition-colors">Students</a></li>
                        <li><i class="fas fa-chevron-right text-xs"></i></li>
                        <li class="text-gray-900 font-medium">Add Student</li>
                    </ol>
                </nav>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4">
                    <div class="flex items-center mb-3">
                        <div class="bg-red-100 rounded-full p-2 mr-3">
                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                        </div>
                        <h3 class="text-red-800 font-semibold">Please fix the following errors:</h3>
                    </div>
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-700 text-sm flex items-start">
                                <i class="fas fa-circle text-xs text-red-500 mt-2 mr-2"></i>
                                <span>{{ $error }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6">
                    <div class="flex items-center text-white">
                        <div class="bg-white/20 rounded-full p-3 mr-4">
                            <i class="fas fa-user-plus text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold">Student Information</h2>
                            <p class="text-indigo-100 text-sm">Enter the student's personal and contact details</p>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <form action="{{ route('students.store') }}" method="POST" class="p-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <div class="lg:col-span-2">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user text-indigo-600 mr-2"></i>
                                Full Name
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('name') border-red-500 @enderror"
                                placeholder="Enter student's full name"
                            >
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-indigo-600 mr-2"></i>
                                Email Address
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('email') border-red-500 @enderror"
                                placeholder="student@example.com"
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Date of Birth Field -->
                        <div>
                            <label for="date_of_birth" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-calendar-alt text-indigo-600 mr-2"></i>
                                Date of Birth
                            </label>
                            <input 
                                type="date" 
                                id="date_of_birth" 
                                name="date_of_birth" 
                                value="{{ old('date_of_birth') }}" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('date_of_birth') border-red-500 @enderror"
                            >
                            @error('date_of_birth')
                                <p class="mt-1 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Gender Field -->
                        <div>
                            <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-venus-mars text-indigo-600 mr-2"></i>
                                Gender
                            </label>
                            <select 
                                id="gender" 
                                name="gender" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('gender') border-red-500 @enderror"
                            >
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                                <p class="mt-1 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Address Field -->
                        <div>
                            <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i>
                                Address
                            </label>
                            <textarea 
                                id="address" 
                                name="address" 
                                required
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors resize-none @error('address') border-red-500 @enderror"
                                placeholder="Enter complete address"
                            >{{ old('address') }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('students.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                            <i class="fas fa-times mr-2"></i>
                            Cancel
                        </a>
                        
                        <div class="flex items-center space-x-3">
                            <button 
                                type="reset" 
                                class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium"
                            >
                                <i class="fas fa-undo mr-2"></i>
                                Reset
                            </button>
                            <button 
                                type="submit" 
                                class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl"
                            >
                                <i class="fas fa-user-plus mr-2"></i>
                                Create Student
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Help Card -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-6">
                <div class="flex items-start">
                    <div class="bg-blue-100 rounded-full p-2 mr-4 mt-0.5">
                        <i class="fas fa-info-circle text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="text-blue-900 font-semibold mb-2">Need Help?</h3>
                        <p class="text-blue-800 text-sm">
                            Make sure all required fields are filled out correctly. The email address must be unique for each student. 
                            You can always edit this information later from the student's profile page.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>