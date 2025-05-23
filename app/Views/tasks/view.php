<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>View Task</h2>

<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= esc($task['title']) ?></h5>
        <p class="card-text"><strong>Description:</strong> <?= esc($task['description']) ?></p>
        <p class="card-text"><strong>Status:</strong> <?= esc($task['status']) ?></p>
        <p class="card-text"><strong>Priority:</strong> <?= esc($task['priority']) ?></p>
        <p class="card-text">
        <?php
    $dateTime = new DateTime($task['due_date']);
?>
<p class="card-text">
    <strong>Due Date:</strong> <?= esc($dateTime->format('F j, Y \a\t g:i A')) ?>
</p>
        <a href="<?= base_url('tasks') ?>" class="btn btn-secondary mt-3">Back</a>
    </div>
</div>

<?= $this->endSection() ?>
