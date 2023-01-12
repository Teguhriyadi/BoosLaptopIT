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
                                <th class="text-center">ID Servis Laptop</th>
                                <th class="text-center">Sub Total</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            <?php foreach ($penerimaan as $c) : ?>
                                <tr>
                                    <td class="text-center"><?= ++$no ?>.</td>
                                    <td class="text-center"><?= $c["id_servis_laptop"] ?></td>
                                    <td class="text-center">Rp. <?= number_format($c["subtotal_penerimaan_kas"]) ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#editPenerimaanKas-<?= $c["id_penerimaan"]; ?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#hapusJurnalPenerimaan-<?= $c["id_penerimaan"]; ?>">
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
            <form action="<?= base_url(); ?>/transaksi/penerimaan_kas/store" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_penerimaan"> ID Penerimaan </label>
                        <input type="text" class="form-control" name="id_penerimaan" id="id_penerimaan" placeholder="Masukkan ID Penerimaan" required>
                    </div>
                    <div class="form-group">
                        <label for="id_servis_laptop"> Data Servis </label>
                        <select name="id_servis_laptop" class="form-control" id="id_servis_laptop">
                            <option value="">- Pilih -</option>
                            <?php foreach ($servis as $s) : ?>
                                <option value="<?= $s["id"] ?>">
                                    <?= $s["part_servis"]; ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subtotal_penerimaan_kas"> Subtotal </label>
                        <input type="number" class="form-control" name="subtotal_penerimaan_kas" id="subtotal_penerimaan_kas" placeholder="0" min="1000" required>
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
    <div class="modal fade" id="editPenerimaanKas-<?= $c["id_penerimaan"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url(); ?>/transaksi/penerimaan_kas/<?= $c["id_penerimaan"]; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_penerimaan"> ID Penerimaan </label>
                            <input type="text" class="form-control" name="id_penerimaan" id="id_penerimaan" placeholder="Masukkan ID Penerimaan" value="<?= $c["id_penerimaan"] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="id_servis_laptop"> Data Servis </label>
                            <select name="id_servis_laptop" class="form-control" id="id_servis_laptop">
                                <option value="">- Pilih -</option>
                                <?php foreach ($servis as $s) : ?>
                                    <?php
                                    if ($c["id_servis_laptop"] == $s["id"]) {
                                    ?>
                                        <option value="<?= $s["id"] ?>" selected>
                                            <?= $s["part_servis"]; ?>
                                        </option>
                                    <?php
                                    } else {
                                    ?>
                                    <option value="<?= $s["id"] ?>" >
                                    <?= $s["part_servis"]; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subtotal_penerimaan_kas"> Subtotal </label>
                            <input type="number" class="form-control" name="subtotal_penerimaan_kas" id="subtotal_penerimaan_kas" placeholder="0" min="1000" value="<?= $c["subtotal_penerimaan_kas"]; ?>" required>
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
    <div class="modal fade" id="hapusJurnalPenerimaan-<?= $c["id_penerimaan"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?= base_url(); ?>/transaksi/penerimaan_kas/<?= $c["id_penerimaan"]; ?>/hapus" method="POST">
                    <div class="modal-body">
                        <p>
                            Apakah Anda Yakin Ingin Menghapus Data
                            <strong>
                                <?= $c["id_penerimaan"]; ?>
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