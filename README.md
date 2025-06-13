# Terminal Assessment 2 – Task Management System (CodeIgniter 4)

## Project Overview

This is a web-based **Employee Task Management System** developed for **IT Elective 1 – Web Development Using CodeIgniter**.  
It is the continuation of Terminal Assessment 1 (repository: `ta1`) and includes enhanced features such as:

- User registration and login with session handling
- Secure RESTful API endpoints
- File upload functionality with validation
- CSRF protection, input validation, and data sanitization

---

## Features

### ✅ Authentication
- Users can register and log in
- Session-based access control

### ✅ Task Management
- Authenticated users can:
  - Create tasks
  - View task list
  - Update task details
  - Delete tasks

### ✅ RESTful API
- `GET /api/tasks` – List all tasks
- `POST /api/tasks` – Create new task
- `PUT /api/tasks/{id}` – Update a task
- `DELETE /api/tasks/{id}` – Delete a task  
(API endpoints require user authentication)

### ✅ File Upload
- Users can upload a file (image or document) for a task
- File size and type validation (e.g., PNG, JPG, PDF)
- Files stored securely and linked to the related task

---

## Setup Instructions
