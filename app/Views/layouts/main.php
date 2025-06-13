<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #1b263b;
            color: #f0f4f8;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #0d1b2a;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #ffffff !important;
        }

        .navbar-nav .nav-link {
            color: #d9e4f5 !important;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #ffffff !important;
        }

        .card-style {
            background: #243447;
            border-radius: 1.25rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            padding: 2.5rem;
            margin-top: 4rem;
        }

        .btn-primary {
            background-color: #0077b6;
            border-color: #0077b6;
        }

        .btn-primary:hover {
            background-color: #005f99;
            border-color: #005f99;
        }

        .form-control, .form-select {
            border-radius: 0.5rem;
            background-color: #f8f9fa;
            color: #212529;
        }

        footer {
            margin-top: 4rem;
            text-align: center;
            color: #adb5bd;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('tasks') ?>">🗂 Task Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (session()->get('user_id')): ?>
                        <?php if (session()->get('role') === 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">Admin Panel</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('register') ?>">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card-style">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <footer class="py-3">
        <div class="container">
            <small>&copy; <?= date('Y') ?> Task Management System</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
