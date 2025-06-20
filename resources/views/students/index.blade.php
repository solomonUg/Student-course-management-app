<x-layout>
    <h1>All Students</h1>
    <ul class="flex flex-col space-y-4 mt-4 ">
        @foreach ($students as $student)
            <x-studentCard :student="$student">
                <h3 class="font-semibold">{{ $student->name }}</h3>
                <p>Student ID: {{ $student->id }}</p>
                <p>Email: {{ $student->email }}</p>
            </x-studentCard>
            
        @endforeach
        @if ($students->isEmpty())
            <p>No students found.</p>
        @endif
    </ul>
    <div >
        {{ $students->links() }}
    </div>

    <div class="flex gap-4 font-medium">
        <a href="{{ route('students.create') }}">Add a new student</a>
        <a href="/">Back to Home</a>
    </div>

</x-layout>
