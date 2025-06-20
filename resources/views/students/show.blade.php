<x-layout>
    <h2>Student Details</h2>
    <p>Student ID: {{ $student->id }}</p>
    <p>Name: {{ $student->name }}</p>
    <p>Email: {{ $student->email }}</p>
    <p>Date of Birth: {{ $student->date_of_birth }}</p>
    <p>Gender: {{ $student->gender }}</p>
    <p>Address: {{ $student->address }}</p>

    <a href="{{ route('students.edit', $student->id) }}" class="text-blue-500">Edit Student</a>
    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500">Delete student</button>
    </form>
    <a href="{{ route('students.index') }}" class="text-blue-500">Back to Students List</a>
</x-layout>