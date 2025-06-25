# 🎓 Student Course Management System

[🔗 View on GitHub](https://github.com/solomonUg/student-course-management-system.git)

A modern fullstack Laravel CRUD application that allows authenticated users to manage students, courses, and enrollments. Built with Laravel Breeze for authentication, Blade templates for server-side rendering, and Tailwind CSS for a clean, professional interface.


## 🔍 Features

### Core Functionality
- **🔐 User Authentication**: Secure registration and login system using Laravel Breeze
- **👥 Student Management**: Complete CRUD operations for student records
- **📚 Course Management**: Full course catalog management with descriptions and units
- **🎓 Enrollment System**: Many-to-many relationship management between students and courses
- **📊 Dashboard Analytics**: Real-time statistics and insights

### Dashboard Statistics
- Total number of students
- Total number of courses  
- Active enrollments count
- Average course units per student

### User Experience
- **Responsive Design**: Mobile-first approach with Tailwind CSS
- **Intuitive Navigation**: Easy-to-use menu system and breadcrumbs
- **Form Validation**: Comprehensive client and server-side validation
- **Flash Messages**: Success and error notifications

---

## 🛠 Tech Stack

| Category | Technology |
|----------|------------|
| **Backend** | Laravel 12.0 |
| **Authentication** | Laravel Breeze |
| **Frontend** | Blade Templates |
| **Styling** | Tailwind CSS |
| **JavaScript** | Alpine.js |
| **Database** | MySQL / SQLite |
| **Icons** | Font Awesome |

---

## 🚀 Setup Instructions

### Prerequisites

Make sure you have the following installed:
- **PHP 8.1 or higher**
- **Composer**
- **Node.js & npm**
- **MySQL** (or SQLite for development)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/solomonUg/student-course-management-system.git
   cd student-course-management-system
   ```

2. **Install dependencies**
   ```bash
   # Install PHP dependencies
   composer install
   
   # Install JavaScript dependencies
   npm install
   ```

3. **Environment setup**
   ```bash
   # Copy environment file
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Database configuration**
   
   Edit your `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=student_management
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Database setup**
   ```bash
   # Run migrations
   php artisan migrate
   
   # (Optional) Seed with sample data
   php artisan db:seed
   ```

6. **Build assets and start server**
   ```bash
   # Compile frontend assets
   npm run dev
   
   # Start development server
   php artisan serve
   ```

7. **Access the application**
   
---

## 📁 Project Structure

### Key Routes
| Route | Description |
|-------|-------------|
| `/dashboard` | Main dashboard with statistics |
| `/students` | Student management (index, create, edit, delete) |
| `/courses` | Course management (index, create, edit, delete) |
| `/enrollments` | Enrollment management |

### Database Schema
- **users** - Authentication and user management
- **students** - Student records (name, email, gender, date_of_birth, address)
- **courses** - Course catalog (course_code, course_name, description, unit)
- **course_student** - Pivot table for many-to-many relationships

### Key Features
- **Authentication Middleware**: All management features require login
- **Form Validation**: Laravel validation with custom error messages
- **Responsive Design**: Works seamlessly on desktop and mobile
- **Clean Architecture**: Follows Laravel best practices and conventions

---

## 🎯 Usage

### Getting Started
1. **Register** a new account or **login** with existing credentials
2. Access the **dashboard** to view system statistics
3. **Add students** using the student management section
4. **Create courses** in the course catalog
5. **Enroll students** in courses through the enrollment system

### Managing Data
- **Students**: Add personal information including name, email, gender, birth date, and address
- **Courses**: Create courses with unique codes, names, descriptions, and unit values
- **Enrollments**: Link students to multiple courses with an intuitive interface

---

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request. For major changes, please open an issue first to discuss what you would like to change.

### Development Setup
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

---

## 👨‍💻 Author

**Solomon Ug**
- GitHub: [@solomonUg](https://github.com/solomonUg)
- Project Link: [Student Course Management System](https://github.com/solomonUg/student-course-management-system)

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework for Web Artisans
- [Tailwind CSS](https://tailwindcss.com) - A utility-first CSS framework
- [Alpine.js](https://alpinejs.dev) - A rugged, minimal framework for composing JavaScript behavior
- [Font Awesome](https://fontawesome.com) - Icon library

---
