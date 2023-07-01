<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tasks as $task) : ?>

                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $task['judul']; ?></td>
                                <td> <input type="checkbox" class="status-tugas" data-task-id="<?= $task['id'] ?>" <?= $task['status'] == 1 ? 'checked' : '' ?> id="status">

                                </td>

                                <td class="text-white"><a href="<?= base_url('edit/' . $task['id']) ?>" class="text-white"><span class="badge bg-success">Edit</span></a><a href="<?= base_url('delete/' . $task['id']) ?>" class="text-white"><span class="badge bg-danger">Hapus</span>
                                    </a></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Content Row -->




</div>
<!-- /.container-fluid -->

<script>
    // Ajax untuk memperbarui status tugas
    $(document).on('change', '.status-tugas', function() {
        var status = $(this).is(':checked') ? 1 : 0;
        var taskId = $(this).data('task-id');
        $.ajax({
            url: '/update/' + taskId,
            type: 'post',
            data: {
                status: status
            },
            dataType: 'json',
            success: function(response) {
                // Tindakan yang ingin dilakukan setelah sukses memperbarui status tugas
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Tindakan yang ingin dilakukan jika ada error saat memperbarui status tugas
                console.error(error);
            }
        });
    });
</script>

<?= $this->endSection() ?>