<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-6 sm:px-8">
        <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">
                <i class="fas fa-user text-indigo-600 mr-2"></i> Student Details
            </h2>

            <div class="space-y-3 text-gray-700 text-sm">
                <p><span class="font-semibold text-gray-800">Student ID:</span> {{ $student->id }}</p>
                <p><span class="font-semibold text-gray-800">Name:</span> {{ $student->name }}</p>
                <p><span class="font-semibold text-gray-800">Email:</span> {{ $student->email }}</p>
                <p><span class="font-semibold text-gray-800">Date of Birth:</span> {{ $student->date_of_birth }}</p>
                <p><span class="font-semibold text-gray-800">Gender:</span> {{ $student->gender }}</p>
                <p><span class="font-semibold text-gray-800">Address:</span> {{ $student->address }}</p>
            </div>


            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">
                    <i class="fas fa-book mr-2 text-purple-600"></i> Enrolled Courses
                </h3>

                @if($student->courses->isEmpty())
                    <p class="text-gray-500 text-sm">This student is not enrolled in any courses.</p>
                @else
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($student->courses as $course)
                            <li class="bg-purple-50 border border-purple-100 p-4 rounded-lg shadow-sm">
                                <h4 class="text-md font-bold text-purple-800">{{ $course->course_name }}</h4>
                                <p class="text-sm text-gray-600">Code: {{ $course->course_code }}</p>
                                <p class="text-sm text-gray-600">Units: {{ $course->unit }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>


            <div class="mt-8 flex flex-wrap items-center gap-4">
                <a href="{{ route('students.edit', $student->id) }}"
                   class="inline-flex items-center px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 transition">
                    <i class="fas fa-edit mr-2"></i> Edit Student
                </a>

                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Are you sure you want to delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center px-5 py-2 bg-red-600 text-white text-sm font-medium rounded-lg shadow hover:bg-red-700 transition">
                        <i class="fas fa-trash mr-2"></i> Delete Student
                    </button>
                </form>

                <a href="{{ route('students.index') }}"
                   class="inline-flex items-center px-5 py-2 text-sm font-medium text-indigo-600 hover:underline">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Students List
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
