<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold mb-2 flex items-center">
                                <i class="fas fa-user-graduate mr-3 text-indigo-200"></i>
                                Edit Enrollment
                            </h2>
                            <p class="text-indigo-100 text-lg">
                                Managing courses for <span class="font-semibold text-white">{{ $student->name }}</span>
                            </p>
                        </div>
                        <div class="hidden md:block">
                            <div class="bg-white/20 rounded-full p-4">
                                <i class="fas fa-edit text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-400 rounded-xl p-4 shadow-sm">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-exclamation-triangle text-red-600 mr-2"></i>
                        <h3 class="text-red-800 font-semibold">Please fix the following errors:</h3>
                    </div>
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-center text-red-700">
                                <i class="fas fa-circle text-xs mr-2 text-red-400"></i>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Main Form -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <form action="{{ route('enrollments.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Student Info Card -->
                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 p-6 border-b border-gray-200">
                        <div class="flex items-center space-x-4">
                            <div class="bg-indigo-100 rounded-full p-3">
                                <i class="fas fa-user text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $student->name }}</h3>
                                <p class="text-gray-600">{{ $student->email }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Course Selection -->
                    <div class="p-8">
                        <div class="mb-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-purple-100 rounded-full p-2 mr-3">
                                    <i class="fas fa-book text-purple-600"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900">Select Courses</h3>
                            </div>
                            <p class="text-gray-600 mb-6">Choose the courses you want to enroll this student in. You can select multiple courses.</p>
                        </div>

                        <!-- Course Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($allCourses as $course)
                                <label class="group cursor-pointer">
                                    <input type="checkbox" name="courses[]" value="{{ $course->id }}"
                                           class="sr-only peer"
                                           {{ in_array($course->id, $enrolledCourseIds) ? 'checked' : '' }}>
                                    
                                    <div class="border-2 border-gray-200 rounded-xl p-4 transition-all duration-200 
                                                peer-checked:border-indigo-500 peer-checked:bg-indigo-50 
                                                hover:border-indigo-300 hover:shadow-md
                                                peer-checked:shadow-lg peer-checked:scale-[1.02]">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-semibold text-sm">
                                                    {{ substr($course->course_code, 0, 3) }}
                                                </div>
                                                <div>
                                                    <h4 class="font-semibold text-gray-900 group-hover:text-indigo-700 transition-colors">
                                                        {{ $course->course_name }}
                                                    </h4>
                                                    <p class="text-sm text-gray-500">{{ $course->course_code }}</p>
                                                </div>
                                            </div>
                                            <div class="hidden peer-checked:block">
                                                <i class="fas fa-check-circle text-indigo-600 text-xl"></i>
                                            </div>
                                            <div class="peer-checked:hidden">
                                                <i class="far fa-circle text-gray-300 text-xl group-hover:text-indigo-400 transition-colors"></i>
                                            </div>
                                        </div>
                                        
                                        @if($course->description)
                                            <p class="text-sm text-gray-600 mb-2 line-clamp-2">{{ $course->description }}</p>
                                        @endif
                                        
                                        <div class="flex items-center justify-between text-sm">
                                            <span class="text-gray-500">Units: {{ $course->unit }}</span>
                                            @if(in_array($course->id, $enrolledCourseIds))
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                                    Currently Enrolled
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>

                        @if(count($allCourses) === 0)
                            <div class="text-center py-12">
                                <div class="bg-gray-100 rounded-full p-4 w-16 h-16 mx-auto mb-4">
                                    <i class="fas fa-book text-gray-400 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">No Courses Available</h3>
                                <p class="text-gray-600">There are currently no courses available for enrollment.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <a href="{{ route('enrollments.index') }}"
                               class="inline-flex items-center px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 shadow-sm">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Cancel
                            </a>

                            <button type="submit"
                                    class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                                <i class="fas fa-save mr-2"></i>
                                Update Enrollment
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Currently Enrolled Summary -->
            @if(count($enrolledCourseIds) > 0)
                <div class="mt-8 bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-100 rounded-full p-2 mr-3">
                            <i class="fas fa-check-circle text-green-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Currently Enrolled Courses</h3>
                        <span class="ml-2 bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                            {{ count($enrolledCourseIds) }} course(s)
                        </span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                        @foreach($allCourses->whereIn('id', $enrolledCourseIds) as $course)
                            <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center text-white font-semibold text-xs">
                                        {{ substr($course->course_code, 0, 2) }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-green-900 text-sm">{{ $course->course_name }}</p>
                                        <p class="text-green-700 text-xs">{{ $course->course_code }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>