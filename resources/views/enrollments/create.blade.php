<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/dashboard" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{route('enrollments.index')}}" class="text-gray-500 hover:text-gray-700 transition-colors">Enrollments</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-700 font-medium">New Enrollment</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Main Form Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-8">
                <div class="flex items-center">
                    <div class="bg-white/20 rounded-full p-3 mr-4">
                        <i class="fas fa-user-plus text-white text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Course Enrollment</h2>
                        <p class="text-indigo-100 mt-1">Enroll students in available courses</p>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-8" x-data="enrollmentForm()">
                <!-- Add CSRF Token -->
                @csrf
                
                <form action="{{ route('enrollments.store') }}" method="POST" @submit.prevent="submitForm" class="space-y-8">
                    <!-- Student Selection Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="bg-indigo-100 rounded-full p-2 mr-3">
                                <i class="fas fa-user text-indigo-600"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Select Student</h3>
                        </div>
                        
                        <div class="relative">
                            <label for="student_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Student Name <span class="text-red-500">*</span>
                            </label>
                            <select 
                                x-model="selectedStudent" 
                                id="student_id" 
                                name="student_id" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 bg-white"
                                required
                            >
                                <option value="">Choose a student...</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->email }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-8">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>

                        <!-- Student Info Display -->
                        <div x-show="selectedStudent" x-transition class="mt-4 p-4 bg-white rounded-lg border border-gray-200">
                            <div class="flex items-center">
                                <div class="bg-indigo-100 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-indigo-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900" x-text="getSelectedStudentName()"></p>
                                    <p class="text-sm text-gray-500" x-text="getSelectedStudentEmail()"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Course Selection Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="bg-purple-100 rounded-full p-2 mr-3">
                                    <i class="fas fa-book text-purple-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">Select Courses</h3>
                            </div>
                            <span class="text-sm text-gray-500" x-text="`${selectedCourses.length} course${selectedCourses.length !== 1 ? 's' : ''} selected`"></span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Course Options -->
                            @foreach($courses as $course)
                                <div class="relative">
                                    <label for="course_{{ $course->id }}" class="cursor-pointer">
                                        <input 
                                            type="checkbox" 
                                            id="course_{{ $course->id }}" 
                                            value="{{ $course->id }}" 
                                            x-model="selectedCourses"
                                            class="sr-only"
                                        >
                                        <div class="bg-white border-2 rounded-lg p-4 transition-all duration-200 hover:shadow-md"
                                             :class="selectedCourses.includes('{{ $course->id }}') ? 'border-indigo-500 bg-indigo-50 shadow-md' : 'border-gray-200 hover:border-gray-300'">
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1">
                                                    <div class="flex items-center mb-2">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 mr-2">{{ $course->course_code }}</span>
                                                        <span class="text-sm text-gray-500">{{ $course->unit }} Units</span>
                                                    </div>
                                                    <h4 class="font-semibold text-gray-900 mb-1">{{ $course->course_name }}</h4>
                                                    <p class="text-sm text-gray-600 line-clamp-2">{{ $course->description }}</p>
                                                </div>
                                                <div class="ml-3 flex-shrink-0">
                                                    <div class="w-5 h-5 rounded border-2 flex items-center justify-center transition-all duration-200"
                                                         :class="selectedCourses.includes('{{ $course->id }}') ? 'bg-indigo-600 border-indigo-600' : 'border-gray-300'">
                                                        <i x-show="selectedCourses.includes('{{ $course->id }}')" class="fas fa-check text-white text-xs"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Selected Courses Summary -->
                        <div x-show="selectedCourses.length > 0" x-transition class="mt-6 p-4 bg-white rounded-lg border border-gray-200">
                            <h4 class="font-medium text-gray-900 mb-3">Selected Courses Summary</h4>
                            <div class="flex flex-wrap gap-2">
                                <template x-for="courseId in selectedCourses" :key="courseId">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-indigo-100 text-indigo-800">
                                        <span x-text="getCourseCode(courseId)"></span>
                                        <button @click="removeCourse(courseId)" type="button" class="ml-2 text-indigo-600 hover:text-indigo-800">
                                            <i class="fas fa-times text-xs"></i>
                                        </button>
                                    </span>
                                </template>
                            </div>
                            <div class="mt-3 text-sm text-gray-600">
                                <span>Total Units: </span>
                                <span class="font-semibold" x-text="getTotalUnits()"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <button 
                            type="button" 
                            class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200"
                        >
                            <i class="fas fa-arrow-left mr-2"></i>
                            Cancel
                        </button>
                        <button 
                            type="submit" 
                            :disabled="!selectedStudent || selectedCourses.length === 0"
                            class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <i class="fas fa-plus mr-2"></i>
                            Enroll Student
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function enrollmentForm() {
            return {
                selectedStudent: '',
                selectedCourses: [],
                notes: '',
                // Pass Laravel data to JavaScript
                courses: @json($courses),
                students: @json($students),

                getSelectedStudentName() {
                    const student = this.students.find(s => s.id == this.selectedStudent);
                    return student ? student.name : '';
                },

                getSelectedStudentEmail() {
                    const student = this.students.find(s => s.id == this.selectedStudent);
                    return student ? student.email : '';
                },

                getCourseById(id) {
                    return this.courses.find(course => course.id.toString() === id.toString());
                },

                getCourseCode(id) {
                    const course = this.getCourseById(id);
                    return course ? course.course_code : '';
                },

                removeCourse(courseId) {
                    this.selectedCourses = this.selectedCourses.filter(id => id !== courseId.toString());
                },

                getTotalUnits() {
                    return this.selectedCourses.reduce((total, courseId) => {
                        const course = this.getCourseById(courseId);
                        return total + (course ? course.unit : 0);
                    }, 0);
                },

                submitForm() {
                    if (!this.selectedStudent || this.selectedCourses.length === 0) {
                        alert('Please select a student and at least one course.');
                        return;
                    }

                    // Create form data
                    const form = document.querySelector('form');
                    const formData = new FormData(form);
                    
                    // Add selected courses to form data
                    this.selectedCourses.forEach(courseId => {
                        formData.append('course_ids[]', courseId);
                    });

                    // Submit form
                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            // Show a flash success message before redirecting
                            document.body.insertAdjacentHTML('afterbegin', `
                                <div id="flash-success" class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50">
                                    <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2 animate-fade-in">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Student enrolled successfully!</span>
                                    </div>
                                </div>
                            `);
                            setTimeout(() => {
                                window.location.href = '{{ route("enrollments.index") }}';
                            }, 1200);
                        } else {
                            alert('Error occurred while enrolling student.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error occurred while enrolling student.');
                    });
                }
            }
        }
    </script>
</x-app-layout>