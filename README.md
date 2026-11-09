STUDENT MANAGEMENT SYSTEM

1. Project Overview

The Student Management System is a web-based application developed using the Laravel framework as part of the Advanced Web Application Development (BUC3131) coursework at Makerere University Business School.

The system is designed to help a university manage student records, courses, lecturers and course registrations through a centralized platform.

Project Objectives

The main objectives are:

To manage student records.
 To manage university courses.
 To allow students to register for available courses.
 To allow lecturers to view their assigned courses and registered students.
 To provide administrators with access to manage system records and users.
 To ensure secure access through authentication and role-based permissions.

2. Technologies Used

Category	               Technology
Backend	                   PHP and Laravel
Frontend	               HTML, CSS, JavaScript and Blade
Database	               MySQL
Version Control	           Git and GitHub
Development Environment	   Visual Studio Code (VS Code)

3. System User Roles

The system supports three main user roles:

Administrator
 Manages student records.
 Manages courses.
 Manages course registrations.
 Manages user accounts and access.

Lecturer
 Views assigned courses.
 Views students registered for assigned courses.

Student
 Views available courses.
 Registers for available courses.
 Views personal course registrations.

4. Main System Features

1. Student Management: Create, view, update and delete student records.
2. Course Management: Create, view, update and delete course records.
3. Course Registration: Allows students to register for available courses.
4. Authentication: Provides secure user login.
5. Role-Based Access Control: Restricts access according to user roles.
6. Database Relationships: Connects students, courses and registrations.
7. Form Validation: Validates information submitted through forms.
8. Feedback Messages: Displays success and error messages.

5. Database Design

The application uses a relational database to manage students, courses, users and course registrations.

The database uses foreign keys and Eloquent relationships to connect related records.

The application implements relationships such as:

 hasMany()
 belongsTo()
 belongsToMany()

These relationships help retrieve registered courses for students and registered students for courses.

6. Installation and Setup

Prerequisites

Ensure that the following are installed:

 PHP
 Composer
 MySQL
 Node.js and npm
 Git
 Visual Studio Code

Step 1: Clone the Repository

git clone https://github.com/ashley351/studentmanagementsystem.git

Step 2: Navigate to the Project Folder

cd studentmanagementsystem

Step 3: Install PHP Dependencies

composer install

Step 4: Install Frontend Dependencies

npm install

Step 5: Configure the Environment

Copy the example environment file:

cp .env.example .env

Generate the application key:

php artisan key:generate

Step 6: Configure the Database

Create a MySQL database named:

student_management_system

Update the database configuration in the .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_management_system
DB_USERNAME=root
DB_PASSWORD=

Use the username and password configured on your computer.

Step 7: Run Migrations and Seeders

php artisan migrate --seed

This creates the database tables and inserts the sample records configured in the project seeders.

Step 8: Start the Development Server

php artisan serve

Open the application in your browser:

http://127.0.0.1:8000

If frontend assets are required, run:

npm run dev

7. Sample Login Credentials

The following sample accounts are provided for testing the different user roles.

User Role	         Email Address	       Password
Administrator	  admin@mubs.ac.ug	       Admin#2026
Lecturer	      lecturer@mubs.ac.ug	   Mubs#2026
Student	          2400711375@mubs.ac.ug	   Bbc#2026

Note: These accounts are intended for academic demonstration and testing purposes.

8. GitHub Collaboration

GitHub Repository:

https://github.com/ashley351/studentmanagementsystem

The project uses Git and GitHub for collaborative development and version control.

The branching structure includes:

 main: Contains the stable version of the application.
 develop: Used for integrating and testing contributions.
 feature branches: Used by individual members to develop specific application features.

Team members submit pull requests for review before their contributions are merged into the develop branch.

After testing, the integrated application is merged into the main branch.

9. Application Screenshots

Screenshots of the working application will be included in the screenshots folder.

Login Page

Administrator Dashboard

Lecturer Dashboard

Student Dashboard

Student Management

Course Management

Course Registration

10. Academic Information

Institution: Makerere University Business School

Programme: Bachelor of Business Computing

Course Name: Advanced Web Application Development

Course Code: BUC3131

Year of Study: Third Year

Semester: One

Academic Year: 2026/2027

Project Title: Student Management System
