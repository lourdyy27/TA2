<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="text-center mt-5">
    <h1 class="display-4 fw-bold">Welcome to the Task Management System</h1>
    <p class="lead mt-3 mb-4">Organize your work. Track your progress. Meet your deadlines.</p>

    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="<?= base_url('login') ?>" class="btn btn-primary btn-lg px-4 me-sm-3">Login</a>
        <a href="<?= base_url('register') ?>" class="btn btn-outline-secondary btn-lg px-4">Register</a>
    </div>
</div>

<?= $this->endSection() ?>
