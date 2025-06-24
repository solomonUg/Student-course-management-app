<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Enrollment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
    <!-- Navigation Header -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-xl font-bold text-gray-900">
                            <i class="fas fa-graduation-cap text-indigo-600 mr-2"></i>
                            Student Management System
                        </h1>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-users"></i> Students
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-book"></i> Courses
                    </a>
                    <a href="#" class="text-indigo-600 font-medium">
                        <i class="fas fa-user-plus"></i> Enrollments
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="#" class="text-gray-500 hover:text-gray-700 transition-colors">Enrollments</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-700 font-medium">Edit Enrollment</span>
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
                        <i class="fas fa-user-edit text-white text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Edit Course Enrollment</h2>
                        <p class="text-indigo-100 mt-1">Modify student's course enrollments</p>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-8" x-data="editEnrollmentForm()">
                <form method="POST" @submit.prevent="submitForm" class="space-y-8">
                    <!-- Student Info Section (Read-only) -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="bg-indigo-100 rounded-full p-2 mr-3">
                                <i class="fas fa-user text-indigo-600"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Student Information</h3>
                        </div>
                        
                        <div class="bg-white rounded-lg border border-gray-200 p-4">
                            <div class="flex items-center">
                                <div class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                    <span class="text-white font-bold" x-text="student.initials"></span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900" x-text="student.name"></h4>
                                    <p class="text-sm text-gray-500" x-text="student.email"></p>
                                    <p class="text-xs text-indigo-600 mt-1">
                                        Currently enrolled in <span x-text="currentlyEnrolledCount"></span> course(s)
                                    </p>
                                </div>
                                <div class="text-right">
                                    <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">
                                        Active Student
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Currently Enrolled Courses -->
                    <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="bg-blue-100 rounded-full p-2 mr-3">
                                    <i class="fas fa-check-circle text-blue-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">Currently Enrolled Courses</h3>
                            </div>
                            <span class="text-sm text-blue-600 font-medium" x-text="`${enrolledCourses.length} enrolled`"></span>
                        </div>

                        <div x-show="enrolledCourses.length > 0" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <template x-for="course in enrolledCourses" :key="course.id">
                                <div class="bg-white border-2 border-blue-200 rounded-lg p-4">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-2">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-2" x-text="course.course_code"></span>
                                                <span class="text-sm text-gray-500" x-text="course.unit + ' Units'"></span>
                                            </div>
                                            <h4 class="font-semibold text-gray-900 mb-1" x-text="course.course_name"></h4>
                                            <p class="text-sm text-gray-600 line-clamp-2" x-text="course.description"></p>
                                        </div>
                                        <div class="ml-3">
                                            <div class="w-5 h-5 rounded border-2 bg-blue-600 border-blue-600 flex items-center justify-center">
                                                <i class="fas fa-check text-white text-xs"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <div x-show="enrolledCourses.length === 0" class="text-center py-8">
                            <i class="fas fa-graduation-cap text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500">No courses enrolled yet</p>
                        </div>
                    </div>

                    <!-- Course Selection Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="bg-purple-100 rounded-full p-2 mr-3">
                                    <i class="fas fa-book text-purple-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">Modify Course Enrollment</h3>
                            </div>
                            <span class="text-sm text-gray-500" x-text="`${selectedCourses.length} course${selectedCourses.length !== 1 ? 's' : ''} selected`"></span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <template x-for="course in allCourses" :key="course.id">
                                <div class="relative">
                                    <label :for="'course_' + course.id" class="cursor-pointer">
                                        <input 
                                            type="checkbox" 
                                            :id="'course_' + course.id" 
                                            :value="course.id" 
                                            x-model="selectedCourses"
                                            class="sr-only"
                                        >
                                        <div class="bg-white border-2 rounded-lg p-4 transition-all duration-200 hover:shadow-md"
                                             :class="selectedCourses.includes(course.id.toString()) ? 'border-indigo-500 bg-indigo-50 shadow-md' : 'border-gray-200 hover:border-gray-300'">
                                             
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1">
                                                    <div class="flex items-center mb-2">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 mr-2" x-text="course.course_code"></span>
                                                        <span class="text-sm text-gray-500" x-text="course.unit + ' Units'"></span>
                                                    </div>
                                                    <h4 class="font-semibold text-gray-900 mb-1" x-text="course.course_name"></h4>
                                                    <p class="text-sm text-gray-600 line-clamp-2" x-text="course.description"></p>
                                                </div>
                                                <div class="ml-3 flex-shrink-0">
                                                    <div class="w-5 h-5 rounded border-2 flex items-center justify-center transition-all duration-200"
                                                         :class="selectedCourses.includes(course.id.toString()) ? 'bg-indigo-600 border-indigo-600' : 'border-gray-300'">
                                                        <i x-show="selectedCourses.includes(course.id.toString())" class="fas fa-check text-white text-xs"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </template>
                        </div>

                        <!-- Changes Summary -->
                        <div x-show="hasChanges" x-transition class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-exclamation-triangle text-yellow-600 mr-2"></i>
                                <h4 class="font-medium text-yellow-800">Changes Detected</h4>
                            </div>
                            
                            <div x-show="coursesToAdd.length > 0" class="mb-2">
                                <p class="text-sm text-green-700 font-medium">Courses to be added:</p>
                                <div class="flex flex-wrap gap-1 mt-1">
                                    <template x-for="courseId in coursesToAdd" :key="courseId">
                                        <span class="inline-flex items-center px-2 py-1 rounded text-xs bg-green-100 text-green-800" x-text="getCourseCode(courseId)"></span>
                                    </template>
                                </div>
                            </div>
                            
                            <div x-show="coursesToRemove.length > 0">
                                <p class="text-sm text-red-700 font-medium">Courses to be removed:</p>
                                <div class="flex flex-wrap gap-1 mt-1">
                                    <template x-for="courseId in coursesToRemove" :key="courseId">
                                        <span class="inline-flex items-center px-2 py-1 rounded text-xs bg-red-100 text-red-800" x-text="getCourseCode(courseId)"></span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <button 
                            type="button" 
                            onclick="window.history.back()"
                            class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200"
                        >
                            <i class="fas fa-arrow-left mr-2"></i>
                            Cancel
                        </button>
                        <button 
                            type="submit" 
                            :disabled="!hasChanges"
                            class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <i class="fas fa-save mr-2"></i>
                            Update Enrollment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function editEnrollmentForm() {
            return {
                // Sample data - replace with actual data from Laravel
                student: @json($student),
                allCourses: @json($allCourses),
                enrolledCourses: @json($student->courses->toArray()),
                selectedCourses: @json($enrolledCourseIds).map(String), // Currently enrolled course IDs as strings
                originallyEnrolledIds: @json($enrolledCourseIds), // Track original state

                get currentlyEnrolledCount() {
                    return this.enrolledCourses.length;
                },

                get hasChanges() {
                    const selected = [...this.selectedCourses].sort();
                    const original = [...this.originallyEnrolledIds].sort();
                    return JSON.stringify(selected) !== JSON.stringify(original);
                },

                get coursesToAdd() {
                    return this.selectedCourses.filter(id => !this.originallyEnrolledIds.includes(id));
                },

                get coursesToRemove() {
                    return this.originallyEnrolledIds.filter(id => !this.selectedCourses.includes(id));
                },

                getCourseCode(courseId) {
                    const course = this.allCourses.find(c => c.id.toString() === courseId.toString());
                    return course ? course.course_code : '';
                },

                submitForm() {
                    if (!this.hasChanges) {
                        alert('No changes detected.');
                        return;
                    }

                    // Create form data
                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('_method', 'PUT');
                    
                    // Add selected courses
                    this.selectedCourses.forEach(courseId => {
                        formData.append('course_ids[]', courseId);
                    });

                    // Submit form
                    fetch(`/enrollments/${this.student.id}`, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (response.ok) {
                            // Show success message
                            document.body.insertAdjacentHTML('afterbegin', `
                                <div id="flash-success" class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50">
                                    <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Enrollment updated successfully!</span>
                                    </div>
                                </div>
                            `);
                            setTimeout(() => {
                                window.location.href = '/enrollments';
                            }, 1200);
                        } else {
                            alert('Error occurred while updating enrollment.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error occurred while updating enrollment.');
                    });
                }
            }
        }
    </script>
</body>
</html>