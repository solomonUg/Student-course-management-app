<x-layout>
    <h1>All Courses</h1>
    <p>List of courses go here</p>
    <ul class="flex flex-col gap-3">
        @foreach ($courses as $course)
            <li class="shadow-md p-4 rounded-lg bg-white flex flex-col gap-3 w-full">
                <h3 class="font-semibold">{{ $course->course_name }}</h3>
                <p>Course Code: {{ $course->course_code }}</p>
                <p>Units: {{ $course->unit }}</p>
                {{-- <p>Description: {{ $course->description }}</p> --}}
                <div class="flex items-start">
                    <a href="{{ route('courses.show', $course->id) }}" class="bg-amber-500 p-2 text-white mt-2 rounded-lg ">View Course</a>
                </div>
            </li>
        @endforeach
        @if ($courses->isEmpty())
            <li>No courses available.</li>
        @endif
    </ul>
    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</x-layout>
