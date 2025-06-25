<x-app-layout>
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-user-graduate text-indigo-600 mr-2"></i> Student Enrollments
    </h1>

    @if($students->isEmpty())
        <div class="text-gray-500">No students found.</div>
    @else
        <div class="grid grid-cols-1 gap-6">
            @foreach($students as $student)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ $student->name }}</h2>
                            <p class="text-sm text-gray-500">{{ $student->email }}</p>
                        </div>
                        <a href="{{ route('enrollments.edit', $student->id) }}"
                           class="text-indigo-600 hover:underline text-sm font-medium">
                            <i class="fas fa-edit mr-1"></i> Edit Enrollment
                        </a>
                    </div>

                    <div class="mt-4">
                        @if($student->courses->isEmpty())
                            <p class="text-sm text-red-500">Not enrolled in any courses.</p>
                        @else
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Enrolled Courses:</h3>
                            <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                                @foreach($student->courses as $course)
                                    <li>{{ $course->course_name }} ({{ $course->course_code }})</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
</x-app-layout>