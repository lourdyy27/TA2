<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    h2 {
        font-size: 1.8rem;
        margin-bottom: 1.2rem;
        font-weight: 600;
        color: #ffffff;
    }

    .add-task-btn {
        display: inline-block;
        background-color: #0d6efd;
        color: #fff;
        padding: 0.6rem 1.2rem;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 500;
        margin-bottom: 1.5rem;
        transition: background 0.3s;
    }

    .add-task-btn:hover {
        background-color: #084298;
    }

    .task-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #1c2a3a;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        color: #ffffff;
    }

    .task-table thead {
        background-color: #0d1b2a;
    }

    .task-table th, .task-table td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #2b3a55;
        font-size: 0.95rem;
    }

    .task-table th {
        font-weight: 600;
        color: #f1f1f1;
    }

    .task-table tr:hover {
        background-color: #2b3a55;
    }

    .task-table td:last-child {
        white-space: nowrap;
    }

    .btn {
        text-decoration: none;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        margin-right: 0.4rem;
        display: inline-block;
        transition: background 0.3s;
    }

    .btn-info {
        background-color: #3498db;
        color: #fff;
    }

    .btn-warning {
        background-color: #f39c12;
        color: #fff;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
    }

    .btn:hover {
        opacity: 0.85;
    }

    .no-tasks {
        color: #bbb;
        font-style: italic;
    }

    @media (max-width: 600px) {
        .task-table th, .task-table td {
            padding: 0.6rem;
            font-size: 0.85rem;
        }

        .btn {
            margin-bottom: 0.3rem;
        }
    }
</style>

<h2>📊 Dashboard</h2>

<a href="<?= base_url('tasks/create') ?>" class="add-task-btn">➕ Add Task</a>

<?php if (empty($tasks)): ?>
    <p class="no-tasks">No tasks found.</p>
<?php else: ?>
<table class="task-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= esc($task['title']) ?></td>
            <td><?= esc($task['status']) ?></td>
            <td><?= esc($task['priority']) ?></td>
            <td><?= esc($task['due_date']) ?></td>
            <td>
                <a href="<?= base_url('tasks/view/' . $task['id']) ?>" class="btn btn-info">View</a>
                <a href="<?= base_url('tasks/edit/' . $task['id']) ?>" class="btn btn-warning">Edit</a>
                <a href="<?= base_url('tasks/delete/' . $task['id']) ?>" class="btn btn-danger" onclick="return confirm('Delete task?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>

<?= $this->endSection() ?>
