<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Dashboard</h2>


<a href="<?= base_url('tasks/create') ?>" class="btn btn-primary mb-3">Add Task</a>

<?php if (empty($tasks)): ?>
    <p>No tasks found.</p>
<?php else: ?>
<table class="table table-bordered">
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
                <a href="<?= base_url('tasks/view/' . $task['id']) ?>" class="btn btn-info btn-sm">View</a>
                <a href="<?= base_url('tasks/edit/' . $task['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('tasks/delete/' . $task['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete task?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>

<?= $this->endSection() ?>