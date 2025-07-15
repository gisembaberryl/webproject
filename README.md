# 📘 Course Sharing Platform

A role-based web application that allows **Lecturers** to upload course content, **Students** to download files and interact with courses, and **Admins** to moderate uploads and manage users. Built with **PHP**, **MySQL**, and **HTML/CSS**, designed to run locally on **XAMPP**.

---

## 🚀 Features by Role

| Role      | Capabilities                                                                 |
|-----------|------------------------------------------------------------------------------|
| 👩‍🏫 Lecturer  | Create courses, upload assignments/notes/exams, view student comments          |
| 🎓 Student   | Browse & download approved files, comment on individual courses               |
| 🛂 Admin     | Approve uploaded files and comments, manage users and access all content       |

---

## 🏗️ Setup Instructions

### 1. Clone the Project or Copy Files into `htdocs`
Place the full project folder inside your XAMPP's `htdocs` directory.

### 2. Create the Database
- Launch **phpMyAdmin**.
- Create a new database (e.g. `course_app`).
- Import the SQL schema from `/sql/schema.sql`.

### 3. Configure the Database Connection
Edit `/includes/db.php` with your MySQL settings:

```php
$host = 'localhost';
$db   = 'course_app';
$user = 'root';
$pass = ''; // default for XAMPP
```

### 4. Start Apache and MySQL in XAMPP
Visit: `http://localhost/course-app/index.php`

---

## 🧩 Project Structure

```
course-app/
├── login.php / register.php / logout.php
├── dashboard.php (dynamic based on role)
├── create_course.php / upload.php / courses.php / comment.php
├── view_comments.php / moderate.php / approve.php / manage_users.php / download.php
│
├── includes/
│   ├── db.php        ← database connection
│   └── auth.php      ← session + role-based access checks
│
├── uploads/          ← stores uploaded course files
├── css/
│   └── style.css     ← UI styling
└── sql/
    └── schema.sql    ← table structure
```

---

## 👨‍🏫 Lecturer Workflow

1. Login and access dashboard
2. Click “Create New Course”
3. Fill in course details (title, description, unit)
4. Click “Upload Materials”
5. Select course + file type (assignment/notes/exam) and upload file
6. View student comments via “View Student Comments”

---

## 🎓 Student Workflow

1. Login and open “Browse Courses”
2. View available courses and download approved files
3. Leave comments or questions on individual courses
4. Return to dashboard at any time to repeat

---

## 🛂 Admin Workflow

1. Login and access dashboard
2. Review new uploads via “Moderate Files”
3. Approve course files using “Approve Uploads”
4. Manage user accounts via “Manage Users”
5. Monitor all comments and materials

---

## 📂 File Types and Storage

- Lecturers choose file type during upload:
  - `assignment`
  - `notes`
  - `exam`
- Files are stored in `/uploads/` and tracked in the `files` table with metadata

---

## 🧰 Tech Stack

- **Frontend**: HTML/CSS
- **Backend**: PHP (procedural)
- **Database**: MySQL
- **Local Server**: XAMPP (Apache + MySQL)

---

## ✅ Future Improvements

- Role-based redirects after login
- Comment moderation and replies
- Notifications for lecturers
- Student profiles or dashboards
- Pagination and search for courses

---

## 📎 Notes

- All uploads are approved by admin before students can access them.
- Session and role checks are enforced via `auth.php`.
- Use `create_course.php` before trying to upload files — the dropdown in `upload.php` only shows existing courses created by that lecturer.

---

Made with ❤️ by GISEMBA using PHP, MySQL, and sheer determination.
