<?= $this->extend("layouts/main"); ?>

<?= $this->section("title"); ?>

Rekap Laporan

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
        Rekap Laporan
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
            <div class="card-body">
                <form action="<?= base_url(); ?>/laporan/rekap/cari" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_mulai"> Tanggal Mulai </label>
                                <?php if (empty($tanggal_mulai)) 
                                {
                                ?>
                                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" required>
                                <?php 
                                } else {
                                ?>
                                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="<?= $tanggal_mulai ?>" required>
                                <?php
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_akhir"> Tanggal Akhir </label>
                                <?php if (empty($tanggal_akhir)) 
                                {
                                ?>
                                <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required>
                                <?php 
                                } else {
                                ?>
                                <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" value="<?= $tanggal_akhir ?>" required>
                                <?php
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 30px;">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i> Cari Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Rekap Laporan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Tanggal Servis</th>
                                <th>Part Servis</th>
                                <th class="text-center">Subtotal Servis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0 ?>
                            <?php if (empty($data_laporan)) : ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <strong>
                                            Silahkan Filter Tanggal Terlebih Dahulu
                                        </strong>
                                    </td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($data_laporan->getResultArray() as $d) : ?>
                                    <tr>
                                        <td class="text-center"><?= ++$no ?>.</td>
                                        <td class="text-center"><?= $d["tgl_servis"] ?></td>
                                        <td><?= $d["part_servis"] ?></td>
                                        <td class="text-center">Rp. <?= number_format($d["subtotal_servis"]) ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>