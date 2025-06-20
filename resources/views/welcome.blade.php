<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Course Management System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    </head>
    <body>
        <h1>Hello Welcome to SCMS!</h1>
        <div class="flex flex-col space-y-3">
            <a href="{{ route('students.index') }}">view all students</a>
            <a href="{{ route('students.create') }}">add a new student</a>
            <a href="{{ route('courses.index') }}">view all courses</a>
            <a href="{{ route('courses.create') }}">add a new course</a>

            {{-- <a href="{{ route('enrollments.index') }}">view all enrollments</a>
            <a href="{{ route('enrollments.create') }}">add a new enrollment</a> --}}
        </div>

    </body>
</html>
