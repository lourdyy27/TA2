<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4 text-white">
    <h2 class="mb-4">🧑‍💼 Admin Dashboard – Users</h2>

    <div class="card bg-dark text-white shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-dark table-hover align-middle">
                    <thead class="table-secondary text-dark">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['email']) ?></td>
                            <td>
                                <a href="<?= base_url('admin/user-tasks/' . $user['id']) ?>" class="btn btn-sm btn-info">
                                    🔍 View Tasks
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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
    .btn-info {
        background-color: #1d72b8;
        border: none;
    }
    .btn-info:hover {
        background-color: #155a96;
    }
</style>

<?= $this->endSection() ?>
