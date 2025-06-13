# Terminal Assessment 2 – Task Management System (CodeIgniter 4)

## 📋 Project Overview

This is a web-based **Employee Task Management System** developed for **IT Elective 1 – Web Development Using CodeIgniter**.

It builds upon features from **Terminal Assessment 1 (TA1)** and includes:

- ✅ User authentication with role-based access (Admin & User)
- ✅ Task creation, updating, viewing, and deletion
- ✅ File upload with validation (images/docs)
- ✅ RESTful API endpoints secured by session
- ✅ Input validation, CSRF protection, and secure storage

---

## 🚀 Features

### 🔐 Authentication
- Registration and login
- Session-based role handling (`admin` / `user`)

### 📂 Task Management
- Admins can assign tasks to users
- Users can view tasks assigned to them
- File attachment for tasks (max 2MB; allowed: `.jpg`, `.png`, `.pdf`, `.docx`)

### 🌐 RESTful API
| Method | Endpoint           | Description           |
|--------|--------------------|-----------------------|
| GET    | `/api/tasks`       | Get all tasks         |
| POST   | `/api/tasks`       | Create a new task     |
| PUT    | `/api/tasks/{id}`  | Update an existing task |
| DELETE | `/api/tasks/{id}`  | Delete a task         |

All API requests require an authenticated session.

---

## ⚙️ Setup Instructions

### 1. 📥 Clone the repository
```bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPOSITORY.git
cd YOUR_REPOSITORY
