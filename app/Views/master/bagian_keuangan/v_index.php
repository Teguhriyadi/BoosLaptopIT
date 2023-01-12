<?= $this->extend("layouts/main"); ?>

<?= $this->section("title"); ?>

Coa

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
        Coa
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
                <i class="fa fa-table"></i> Data Bagian Keuangan
                <a class="btn btn-primary btn-sm text-white pull-right" data-toggle="modal" data-target="#tambahBagianKeuangan">
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
                                <th class="text-center">ID Bagian Keuangan</th>
                                <th>Nama</th>
                                <th class="text-center">Nomer Telepon</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            <?php foreach ($bagian_keuangan as $c) : ?>
                                <tr>
                                    <td class="text-center"><?= ++$no ?>.</td>
                                    <td class="text-center"><?= $c["id_bagian_keuangan"] ?></td>
                                    <td><?= $c["nama"] ?></td>
                                    <td class="text-center"><?= $c["no_tlp"] ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#editCoa-<?= $c["id_bagian_keuangan"]; ?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#hapusCoa-<?= $c["id_bagian_keuangan"]; ?>">
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
<div class="modal fade" id="tambahBagianKeuangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="<?= base_url(); ?>/bagian_keuangan/store" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_bagian_keuangan"> ID Bagian Keuangan </label>
                        <input type="text" class="form-control" name="id_bagian_keuangan" id="id_bagian_keuangan" placeholder="Masukkan ID Bagian Keuangan" required>
                    </div>
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="no_tlp"> Nomer Telepon </label>
                        <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="Masukkan Nomer Telepon" required>
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
<?php foreach ($bagian_keuangan as $c) : ?>
    <div class="modal fade" id="editCoa-<?= $c["id_bagian_keuangan"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url(); ?>/bagian_keuangan/<?= $c["id_bagian_keuangan"]; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_bagian_keuangan"> ID Bagian Keuangan </label>
                            <input type="text" class="form-control" name="id_bagian_keuangan" id="id_bagian_keuangan" placeholder="Masukkan ID Bagian Keuangan" value="<?= $c["id_bagian_keuangan"] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="nama"> Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $c["nama"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="no_tlp"> Nomer Telepon </label>
                            <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="Masukkan Nomer Telepon" value="<?= $c["no_tlp"] ?>" required>
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
<?php foreach ($bagian_keuangan as $c) : ?>
    <div class="modal fade" id="hapusCoa-<?= $c["id_bagian_keuangan"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url(); ?>/bagian_keuangan/<?= $c["id_bagian_keuangan"]; ?>/hapus" method="POST">
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