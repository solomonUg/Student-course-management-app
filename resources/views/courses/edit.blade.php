<x-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Course</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="course_name" class="block text-sm font-medium text-gray-700">Course Name</label>
                <input type="text" name="course_name" id="course_name" value="{{ $course->course_name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
            </div>

            <div class="mb-4">
                <label for="course_code" class="block text-sm font-medium text-gray-700">Course Code</label>
                <input type="text" name="course_code" id="course_code" value="{{ $course->course_code }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
            </div>

            <div class="mb-4">
                <label for="unit" class="block text-sm font-medium text-gray-700">Units</label>
                <input type="number" name="unit" id="unit" value="{{ $course->unit }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">{{ $course->description }}</textarea>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Course</button>
            </div>
        </form>
        
        {{-- handle validation errors --}}
        @if($errors->any())
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ route('courses.index') }}" class="text-blue-500 hover:underline">Back to Courses</a>
    </div>
</x-layout>