<?= $this->extend("layouts/main"); ?>

<?= $this->section("title"); ?>

Beban Operasional

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
        Beban Operasional
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
                <i class="fa fa-table"></i> Data Beban Operasional
                <a class="btn btn-primary btn-sm text-white pull-right" data-toggle="modal" data-target="#tambahBebanOperasional">
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
                                <th class="text-center">ID Beban</th>
                                <th>Keterangan</th>
                                <th class="text-center">Nominal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            <?php foreach ($beban_operasional as $c) : ?>
                                <tr>
                                    <td class="text-center"><?= ++$no ?>.</td>
                                    <td class="text-center"><?= $c["id_beban"] ?></td>
                                    <td><?= $c["keterangan"] ?></td>
                                    <td class="text-center">Rp. <?= number_format($c["nominal"]) ?> </td>
                                    <td class="text-center">
                                        <a class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#editCoa-<?= $c["id_beban"]; ?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#hapusCoa-<?= $c["id_beban"]; ?>">
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
<div class="modal fade" id="tambahBebanOperasional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="<?= base_url(); ?>/beban_operasional/store" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_beban"> ID Beban </label>
                        <input type="text" class="form-control" name="id_beban" id="id_beban" placeholder="Masukkan ID Beban" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan"> Keterangan </label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="5" placeholder="Masukkan Keterangan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nominal"> Nominal </label>
                        <input type="number" class="form-control" name="nominal" id="nominal" placeholder="0" min="1000" required>
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
<?php foreach ($beban_operasional as $c) : ?>
    <div class="modal fade" id="editCoa-<?= $c["id_beban"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url(); ?>/beban_operasional/<?= $c["id_beban"]; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_beban"> ID Beban </label>
                            <input type="text" class="form-control" name="id_beban" id="id_beban" placeholder="Masukkan ID Beban" value="<?= $c["id_beban"] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan"> Keterangan </label>
                            <textarea name="keterangan" class="form-control" id="keterangan" rows="5" placeholder="Masukkan Keterangan" required><?= $c["keterangan"] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nominal"> Nominal </label>
                            <input type="number" class="form-control" name="nominal" id="nominal" placeholder="0" min="1000" value="<?= $c["nominal"] ?>" required>
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
<?php foreach ($beban_operasional as $c) : ?>
    <div class="modal fade" id="hapusCoa-<?= $c["id_beban"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url(); ?>/beban_operasional/<?= $c["id_beban"]; ?>/hapus" method="POST">
                    <div class="modal-body">
                        <p>
                            Apakah Anda Yakin Ingin Menghapus Data
                            <strong>
                                <?= $c["id_beban"]; ?>
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