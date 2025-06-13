<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Edit Task</h2>
    <form action="<?= base_url('tasks/update/' . $task['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?= esc($task['title']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required><?= esc($task['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="Pending" <?= $task['status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="In Progress" <?= $task['status'] === 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                <option value="Completed" <?= $task['status'] === 'Completed' ? 'selected' : '' ?>>Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Priority</label>
            <select name="priority" class="form-select" required>
                <option value="Low" <?= $task['priority'] === 'Low' ? 'selected' : '' ?>>Low</option>
                <option value="Medium" <?= $task['priority'] === 'Medium' ? 'selected' : '' ?>>Medium</option>
                <option value="High" <?= $task['priority'] === 'High' ? 'selected' : '' ?>>High</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="datetime-local" name="due_date" class="form-control"
                value="<?= date('Y-m-d\TH:i', strtotime($task['due_date'])) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Replace Attachment (optional)</label>
            <input type="file" name="attachment" class="form-control">
            <?php if ($task['attachment']): ?>
                <p class="mt-2">
                    Current: 
                    <a href="<?= base_url('uploads/' . $task['attachment']) ?>" target="_blank"><?= esc($task['attachment']) ?></a>
                </p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>

<?= $this->endSection() ?>
