<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-6">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-1">
                    <i class="fas fa-book text-indigo-600 mr-2"></i> All Courses
                </h1>
                <p class="text-gray-600">Browse the list of available courses in the system.</p>
            </div>

            <!-- Create Course Button -->
            <a href="{{ route('courses.create') }}"
               class="bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition-all duration-200 flex items-center">
                <i class="fas fa-plus mr-2"></i> Create Course
            </a>
        </div>

        @if ($courses->isEmpty())
            <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded-lg">
                No courses available at the moment.
            </div>
        @else
            <!-- Courses Grid -->
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                    <li class="bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $course->course_name }}</h3>
                        <p class="text-sm text-gray-600 mb-1"><strong>Course Code:</strong> {{ $course->course_code }}</p>
                        <p class="text-sm text-gray-600 mb-3"><strong>Units:</strong> {{ $course->unit }}</p>

                        <a href="{{ route('courses.show', $course->id) }}"
                            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 mt-3 rounded-lg transition-colors duration-200">
                            <i class="fas fa-eye mr-1"></i> View Details
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $courses->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
