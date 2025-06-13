<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0" style="background-color: #2b3a55; border-radius: 1.2rem;">
            <div class="card-header text-white text-center" style="background-color: #0d1b2a; border-top-left-radius: 1.2rem; border-top-right-radius: 1.2rem;">
                <h4 class="mb-0">🔐 Login</h4>
            </div>
            <div class="card-body px-4 py-4">

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= base_url('login') ?>">
                    <div class="mb-3">
                        <label for="email" class="form-label text-light">Email address</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="you@example.com" required value="<?= old('email') ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-light">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="••••••••" required />
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Login</button>
                </form>

                <p class="mt-4 mb-0 text-center text-light">
                    Don’t have an account? <a href="<?= base_url('register') ?>" class="text-info">Register here</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
