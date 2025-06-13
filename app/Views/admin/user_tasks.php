<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4 text-white">
    <h2 class="mb-4">📝 Tasks for User #<?= esc($user_id) ?></h2>

    <div class="card bg-dark text-white shadow-sm">
        <div class="card-body">
            <?php if (empty($tasks)): ?>
                <p class="text-muted fst-italic">No tasks found for this user.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-dark table-bordered table-hover align-middle">
                        <thead class="table-secondary text-dark">
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Due</th>
                                <th>Action</th>
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
                                    <a href="<?= base_url('tasks/edit/' . $task['id']) ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
                                    <a href="<?= base_url('tasks/delete/' . $task['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">🗑️ Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary mt-3">← Back to Users</a>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #0d1b2a;
    }
    h2 {
        font-weight: 600;
    }
    .btn-warning {
        background-color: #f39c12;
        border: none;
    }
    .btn-warning:hover {
        background-color: #d87f0e;
    }
    .btn-danger {
        background-color: #e74c3c;
        border: none;
    }
    .btn-danger:hover {
        background-color: #c0392b;
    }
    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

<?= $this->endSection() ?>
