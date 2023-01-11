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
        <h1></h1>
        <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
    </div>
</div>

<?= $this->endSection(); ?>