<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class=" p-3">
    <div class="card p-3">
        <div class="row p-2">
            <div class="col-md-8">
                <h1>Form Tambah Tugas</h1>
                <div class="col-md-6">
                    <?php if (session()->has('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session('success') ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('create') ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="judul" id="judul" placeholder="Judul Tugas">
                        </div>
                        <!-- <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                        </div> -->
                        <button class="btn btn-primary" type="submit">Add Tugas</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>