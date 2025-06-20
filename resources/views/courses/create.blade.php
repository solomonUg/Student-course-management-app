<x-layout>
    <h2>Add New Course </h2>
        <form action="{{ route('courses.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label for="course_name" class="block text-sm font-medium text-gray-700">Course Name</label>
                <input type="text" name="course_name" id="course_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required value="{{ old('course_name') }}">
            </div>

            <div class="mb-4">
                <label for="course_code" class="block text-sm font-medium text-gray-700">Course Code</label>
                <input type="text" name="course_code" id="course_code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required value="{{ old('course_code') }}">
            </div>

            <div class="mb-4">
                <label for="unit" class="block text-sm font-medium text-gray-700">Units</label>
                <input type="number" name="unit" id="unit" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required value="{{ old('unit') }}">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">{{ old('description') }}</textarea>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add Course</button>
            </div>

            @if ($errors->any())
                <div class="mt-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
</x-layout>