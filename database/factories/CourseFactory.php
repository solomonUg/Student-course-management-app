<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courses>
 */
class CourseFactory extends Factory
{
    // Predefined list of 20 courses with unique codes
    private static $courses = [
        [
            'course_name' => 'Introduction to Programming',
            'course_code' => 'CS101',
            'unit' => 3,
            'description' => 'Fundamentals of programming using Python.',
        ],
        [
            'course_name' => 'Web Development Fundamentals',
            'course_code' => 'CS102',
            'unit' => 3,
            'description' => 'HTML, CSS, and JavaScript basics for web development.',
        ],
        [
            'course_name' => 'Database Systems',
            'course_code' => 'CS201',
            'unit' => 4,
            'description' => 'Introduction to SQL and relational database design.',
        ],
        [
            'course_name' => 'Data Structures and Algorithms',
            'course_code' => 'CS202',
            'unit' => 4,
            'description' => 'Essential data structures and algorithmic techniques.',
        ],
        [
            'course_name' => 'Computer Networks',
            'course_code' => 'CS203',
            'unit' => 3,
            'description' => 'Fundamentals of networking and internet protocols.',
        ],
        [
            'course_name' => 'Software Engineering',
            'course_code' => 'CS301',
            'unit' => 3,
            'description' => 'Software development lifecycle and best practices.',
        ],
        [
            'course_name' => 'Operating Systems',
            'course_code' => 'CS302',
            'unit' => 4,
            'description' => 'Principles of operating system design and implementation.',
        ],
        [
            'course_name' => 'Artificial Intelligence',
            'course_code' => 'CS401',
            'unit' => 3,
            'description' => 'Introduction to AI concepts and machine learning.',
        ],
        [
            'course_name' => 'Machine Learning',
            'course_code' => 'CS402',
            'unit' => 4,
            'description' => 'Supervised and unsupervised learning techniques.',
        ],
        [
            'course_name' => 'Cybersecurity Basics',
            'course_code' => 'CS403',
            'unit' => 3,
            'description' => 'Fundamentals of information security and ethical hacking.',
        ],
        [
            'course_name' => 'Mobile App Development',
            'course_code' => 'CS404',
            'unit' => 3,
            'description' => 'Building mobile applications for Android and iOS.',
        ],
        [
            'course_name' => 'Cloud Computing',
            'course_code' => 'CS501',
            'unit' => 3,
            'description' => 'Introduction to cloud services and architectures.',
        ],
        [
            'course_name' => 'Big Data Analytics',
            'course_code' => 'CS502',
            'unit' => 4,
            'description' => 'Processing and analyzing large datasets.',
        ],
        [
            'course_name' => 'Human-Computer Interaction',
            'course_code' => 'CS503',
            'unit' => 3,
            'description' => 'Design principles for user-friendly interfaces.',
        ],
        [
            'course_name' => 'Computer Graphics',
            'course_code' => 'CS504',
            'unit' => 3,
            'description' => 'Fundamentals of 2D and 3D graphics programming.',
        ],
        [
            'course_name' => 'Embedded Systems',
            'course_code' => 'EE201',
            'unit' => 4,
            'description' => 'Design and programming of embedded devices.',
        ],
        [
            'course_name' => 'Digital Signal Processing',
            'course_code' => 'EE301',
            'unit' => 4,
            'description' => 'Processing and analysis of digital signals.',
        ],
        [
            'course_name' => 'Discrete Mathematics',
            'course_code' => 'MATH101',
            'unit' => 3,
            'description' => 'Mathematical foundations for computer science.',
        ],
        [
            'course_name' => 'Linear Algebra',
            'course_code' => 'MATH201',
            'unit' => 4,
            'description' => 'Matrix operations and vector spaces.',
        ],
        [
            'course_name' => 'Probability and Statistics',
            'course_code' => 'MATH202',
            'unit' => 3,
            'description' => 'Statistical methods for data analysis.',
        ],
    ];

    private static $currentIndex = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get the next course in the list
        $course = self::$courses[self::$currentIndex % count(self::$courses)];
        self::$currentIndex++;

        return [
            'course_name' => $course['course_name'],
            'course_code' => $course['course_code'],
            'unit' => $course['unit'],
            'description' => $course['description'],
        ];
    }
}