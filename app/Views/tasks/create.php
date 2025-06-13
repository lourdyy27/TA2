<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0" style="background-color: #2b3a55; border-radius: 1.2rem;">
            <div class="card-header text-white" style="background-color: #0d1b2a; border-top-left-radius: 1.2rem; border-top-right-radius: 1.2rem;">
                <h4 class="mb-0">📋 Create New Task</h4>
            </div>
            <div class="card-body px-4 py-4">

                <form method="post" action="<?= base_url('tasks/store') ?>" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label text-light">Title</label>
                        <input type="text" name="title" class="form-control form-control-lg" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Description</label>
                        <textarea name="description" class="form-control form-control-lg" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Status</label>
                        <select name="status" class="form-select form-select-lg">
                            <option>Pending</option>
                            <option>In Progress</option>
                            <option>Completed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Priority</label>
                        <select name="priority" class="form-select form-select-lg">
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Due Date & Time</label>
                        <input type="datetime-local" name="due_date" class="form-control form-control-lg" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Attachment (Image or File, max 2MB)</label>
                        <input type="file" name="attachment" class="form-control form-control-lg" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" />
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 mt-3">Create Task</button>
                </form>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
