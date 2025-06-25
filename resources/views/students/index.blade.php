<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                <i class="fas fa-users text-indigo-600 mr-2"></i> All Students
            </h1>
            <a href="{{ route('students.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition">
                <i class="fas fa-user-plus mr-2"></i> Add New Student
            </a>
        </div>

        @if ($students->isEmpty())
            <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 rounded-md">
                <p>No students found.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($students as $student)
                    <x-studentCard :student="$student">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $student->name }}</h3>
                        <p class="text-sm text-gray-600">Student ID: {{ $student->id }}</p>
                        <p class="text-sm text-gray-600">Email: {{ $student->email }}</p>
                    </x-studentCard>
                @endforeach
            </div>
        @endif

        <div class="mt-6">
            {{ $students->links() }}
        </div>

        <div class="mt-10 flex space-x-4 text-sm font-medium">
            <a href="/" class="text-indigo-600 hover:underline">
                <i class="fas fa-home mr-1"></i> Back to Home
            </a>
        </div>
    </div>
</x-app-layout>
