<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-6">
        <!-- Header -->
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-800">
                <i class="fas fa-book text-indigo-600 mr-2"></i> Course Details
            </h1>
            <a href="{{ route('courses.index') }}"
               class="text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg transition">
                <i class="fas fa-arrow-left mr-1"></i> Back to Courses
            </a>
        </div>

        <!-- Course Details Card -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-md p-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $course->course_name }}</h2>

            <div class="space-y-3 text-gray-700">
                <p><strong>Course Code:</strong> {{ $course->course_code }}</p>
                <p><strong>Units:</strong> {{ $course->unit }}</p>
                <p><strong>Description:</strong></p>
                <p class="text-gray-600">{{ $course->description }}</p>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex items-center gap-4">
                <a href="{{ route('courses.edit', $course->id) }}"
                   class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow transition">
                    <i class="fas fa-edit mr-2"></i> Edit Course
                </a>

                <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this course?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition">
                        <i class="fas fa-trash mr-2"></i> Delete Course
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
