<?= $this->extend("layouts/main"); ?>

<?= $this->section("title"); ?>

Servis Laptop

<?= $this->endSection(); ?>

<?= $this->section("css"); ?>

<link href="<?= base_url(); ?>/template/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url(); ?>/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        Servis Laptop
    </li>
</ol>
<div class="row">
    <div class="col-12">
        <?php if (session()->getFlashdata("pesan")) : ?>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <?= session()->getFlashdata("pesan") ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Servis Laptop
                <a class="btn btn-primary btn-sm text-white pull-right" data-toggle="modal" data-target="#tambahServisLaptop">
                    <i class="fa fa-fw fa-plus"></i>
                    Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Tanggal Servis</th>
                                <th>Part Servis</th>
                                <th class="text-center">Sub Total</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            <?php foreach ($servis_laptop as $c) : ?>
                                <tr>
                                    <td class="text-center"><?= ++$no ?>.</td>
                                    <td class="text-center"><?= $c["tgl_servis"] ?></td>
                                    <td><?= $c["part_servis"] ?></td>
                                    <td class="text-center">Rp. <?= number_format($c["subtotal_servis"]); ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#editServisLaptop-<?= $c["id"]; ?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#hapusCoa-<?= $c["id"]; ?>">
                                            <i class="fa fa-fw fa-trash"></i>
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambah COA -->
<div class="modal fade" id="tambahServisLaptop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-fw fa-plus"></i> Tambah Data
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>/servis_laptop/store" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tgl_servis"> Tanggal Servis </label>
                        <input type="date" class="form-control" name="tgl_servis" id="tgl_servis" required>
                    </div>
                    <div class="form-group">
                        <label for="part_servis"> Part Servis </label>
                        <input type="text" class="form-control" name="part_servis" id="part_servis" placeholder="Masukkan Part Servis" required>
                    </div>
                    <div class="form-group">
                        <label for="subtotal_servis"> Subtotal Servis </label>
                        <input type="number" class="form-control" name="subtotal_servis" id="subtotal_servis" placeholder="0" min="1000" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <?= $this->include("layouts/components/button/v_tambah"); ?>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Edit COA -->
<?php foreach ($servis_laptop as $c) : ?>
    <div class="modal fade" id="editServisLaptop-<?= $c["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-fw fa-pencil"></i> Edit Data
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>/servis_laptop/<?= $c["id"]; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tgl_servis"> Tanggal Servis </label>
                            <input type="date" class="form-control" name="tgl_servis" id="tgl_servis" value="<?= $c["tgl_servis"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="part_servis"> Part Servis </label>
                            <input type="text" class="form-control" name="part_servis" id="part_servis" placeholder="Masukkan Part Servis" value="<?= $c["part_servis"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="subtotal_servis"> Subtotal Servis </label>
                            <input type="number" class="form-control" name="subtotal_servis" id="subtotal_servis" placeholder="0" min="1000" value="<?= $c["subtotal_servis"] ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?= $this->include("layouts/components/button/v_edit"); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- END -->

<!-- Hapus COA -->
<?php foreach ($servis_laptop as $c) : ?>
    <div class="modal fade" id="hapusCoa-<?= $c["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-fw fa-trash"></i> Hapus Data
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>/servis_laptop/<?= $c["id"]; ?>/hapus" method="POST">
                    <div class="modal-body">
                        <p>
                            Apakah Anda Yakin Ingin Menghapus Data
                            <strong>
                                <?= $c["part_servis"]; ?>
                            </strong> ?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <?= $this->include("layouts/components/button/v_hapus"); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- END -->

<?= $this->endSection(); ?>

<?= $this->section("js"); ?>

<script src="<?= base_url(); ?>/template/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>/template/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url(); ?>/template/js/sb-admin-datatables.min.js"></script>

<?= $this->endSection(); ?>