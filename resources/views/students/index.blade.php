<x-layout>
    <h1>Students page</h1>
    <h2>List of students</h2>
    <ul>
        @foreach ($students as $student)
            <li>
                <h3>{{ $student->name }}</h3>
                <p>Student ID: {{ $student->id }}</p>
                <p>Email: {{ $student->email }}</p>
                <a href="/students/{{ $student->id }}">View Details</a>
            </li>
        @endforeach
        @if ($students->isEmpty())
            <p>No students found.</p>
        @endif
    </ul>
    <div >
        {{ $students->links() }}
    </div>
    <a href="{{ route('students.create') }}">Add a new student</a>
    <a href="/">Back to Home</a>
</x-layout>
