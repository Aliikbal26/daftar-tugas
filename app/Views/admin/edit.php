<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class=" p-3">
    <div class="card p-3">
        <div class="row p-2">
            <div class="col-md-8">
                <h1>Form Edit Tugas</h1>
                <div class="col-md-6">
                    <?php if (session()->has('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session('success') ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('/edit') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $task['id']; ?>">

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="judul" id="judul" placeholder="Judul Tugas" value="<?= $task['judul']; ?>">
                        </div>
                        <!-- <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                        </div> -->
                        <button class="btn btn-primary" type="submit">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>