<x-layout>
    <h1>Add Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
        </div>
        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" required>
        </div>
        <button type="submit">Create</button>

        {{-- validations --}}
        @if ($errors->any())
            <div>
                <h3>Errors:</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</x-layout>