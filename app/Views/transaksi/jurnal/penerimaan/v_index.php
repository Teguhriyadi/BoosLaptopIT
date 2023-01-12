<?= $this->extend("layouts/main"); ?>

<?= $this->section("title"); ?>

Jurnal Penerimaan Kas

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
        Jurnal Penerimaan Kas
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
                <i class="fa fa-table"></i> Data Jurnal Penerimaan Kas
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
                                <th class="text-center">Kode COA</th>
                                <th>Nama</th>
                                <th class="text-center">Header</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            <?php foreach ($penerimaan as $c) : ?>
                                <tr>
                                    <td class="text-center"><?= ++$no ?>.</td>
                                    <td class="text-center"><?= $c["kode_coa"] ?></td>
                                    <td><?= $c["nama"] ?></td>
                                    <td class="text-center"><?= $c["header"] ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#editJurnalPenerimaan-<?= $c["kode_coa"]; ?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#hapusJurnalPenerimaan-<?= $c["kode_coa"]; ?>">
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
            <form action="<?= base_url(); ?>/jurnal/penerimaan/store" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_coa"> Kode COA </label>
                        <input type="text" class="form-control" name="kode_coa" id="kode_coa" placeholder="Masukkan Kode COA" required>
                    </div>
                    <div class="form-group">
                        <label for="header"> Header COA </label>
                        <input type="text" class="form-control" name="header" id="header" placeholder="Masukkan Header COA" required>
                    </div>
                    <div class="form-group">
                        <label for="nama"> Nama COA </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama COA" required>
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
<?php foreach ($penerimaan as $c) : ?>
    <div class="modal fade" id="editJurnalPenerimaan-<?= $c["kode_coa"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url(); ?>/jurnal/penerimaan/<?= $c["kode_coa"]; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kode_coa"> Kode COA </label>
                            <input type="text" class="form-control" name="kode_coa" id="kode_coa" placeholder="Masukkan Kode COA" value="<?= $c["kode_coa"] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="header"> Header COA </label>
                            <input type="text" class="form-control" name="header" id="header" placeholder="Masukkan Header COA" value="<?= $c["header"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama"> Nama COA </label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama COA" value="<?= $c["nama"] ?>" required>
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
<?php foreach ($penerimaan as $c) : ?>
    <div class="modal fade" id="hapusJurnalPenerimaan-<?= $c["kode_coa"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url(); ?>/jurnal/penerimaan/<?= $c["kode_coa"]; ?>/hapus" method="POST">
                    <div class="modal-body">
                        <p>
                            Apakah Anda Yakin Ingin Menghapus Data
                            <strong>
                                <?= $c["nama"]; ?>
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