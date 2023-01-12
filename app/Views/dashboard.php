<?= $this->extend("layouts/main"); ?>

<?= $this->section("title"); ?>

Dashboard

<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<ol class="breadcrumb">
    <li class="breadcrumb-item active">
        Dashboard
    </li>
</ol>
<div class="row">
    <div class="col-12">
        <div class="alert alert-success">
            <?php
            $session = session();
            ?>
            Selamat Datang
            <strong>
                <?= $session->get("username") ?>
            </strong>
            di Aplikasi
            <strong>
                BoosLaptopIT.
            </strong>
            Silahkan Pilih Menu Untuk Memulai Program.
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-gavel"></i>
                        </div>
                        <div class="mr-5"><?= $count_beban_operasional ?> Beban Operasional</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= base_url(); ?>/beban_operasional">
                        <span class="float-left">Lebih Lengkap</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-bars"></i>
                        </div>
                        <div class="mr-5"><?= $count_coa ?> COA</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= base_url(); ?>/coa">
                        <span class="float-left">Lebih Lengkap</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-money"></i>
                        </div>
                        <div class="mr-5"><?= $count_bagian_keuangan ?> Bagian Keuangan!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= base_url(); ?>/bagian_keuangan">
                        <span class="float-left">Lebih Lengkap</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">26 Users!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= base_url(); ?>/users">
                        <span class="float-left">Lebih Lengkap</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>