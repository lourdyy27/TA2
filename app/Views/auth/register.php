<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0" style="background-color: #2b3a55; border-radius: 1.2rem;">
            <div class="card-header text-white text-center" style="background-color: #0d1b2a; border-top-left-radius: 1.2rem; border-top-right-radius: 1.2rem;">
                <h4 class="mb-0">📝 Register</h4>
            </div>
            <div class="card-body px-4 py-4">

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= base_url('register') ?>">
                    <div class="mb-3">
                        <label class="form-label text-light">Username</label>
                        <input type="text" name="username" class="form-control form-control-lg" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light">Email</label>
                        <input type="email" name="email" class="form-control form-control-lg" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" required />
                    </div>

                    <!-- Optional: Role selection -->
                    <div class="mb-3">
                        <label class="form-label text-light">Role</label>
                        <select name="role" class="form-select form-select-lg">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Register</button>
                </form>

                <p class="mt-4 mb-0 text-center text-light">
                    Already have an account? <a href="<?= base_url('login') ?>" class="text-info">Login here</a>.
                </p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
