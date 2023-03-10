<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BoosLaptopIT - <?= $this->renderSection("title") ?> </title>
    <!-- Bootstrap core CSS-->

    <?= $this->include("layouts/components/css/style_css"); ?>

    <?= $this->renderSection("css"); ?>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    
    <?= $this->include("layouts/components/navbar/v_navbar") ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <?= $this->renderSection("content"); ?>
            
        </div>

        <?= $this->include("layouts/components/footer/v_footer"); ?>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Yakin Ingin Keluar ?
                        </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Klik <strong>Logout</strong> Untuk Mengakhiri Sesi
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">
                            Kembali
                        </button>
                        <a class="btn btn-primary" href="<?= base_url(); ?>/logout">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->include("layouts/components/js/style_js") ?>

        <?= $this->renderSection("js"); ?>

    </div>
</body>

</html>