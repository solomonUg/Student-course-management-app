<x-layout>
    <h1 class="text-2xl font-bold mb-4">Course Details</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-2">{{ $course->course_name }}</h2>
        <p><strong>Course Code:</strong> {{ $course->course_code }}</p>
        <p><strong>Units:</strong> {{ $course->unit }}</p>
        <p><strong>Description:</strong> {{ $course->description }}</p>

        <div class="mt-4">
            <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-500 hover:underline">Edit Course</a>
            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline ml-4" onsubmit="return confirm('Are you sure you want to delete this course?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:underline">Delete Course</button>
            </form>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('courses.index') }}" class="text-blue-500 hover:underline">Back to Courses</a>
    </div>
</x-layout>
