<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?= base_url(); ?>/dashboard">
        BoosLaptopIT
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?= base_url(); ?>/dashboard">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMaster" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-bars"></i>
                    <span class="nav-link-text">Master</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMaster">
                    <li>
                        <a href="<?= base_url(); ?>/beban_operasional">Beban Operasional</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/bagian_keuangan">Bagian Keuangan</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTransaksi" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-money"></i>
                    <span class="nav-link-text">Transaksi</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseTransaksi">
                    <li>
                        <a href="<?= base_url(); ?>/jurnal/penerimaan">Jurnal Penerimaan Kas</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/jurnal/pengeluaran">Jurnal Pengeluaran Kas</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/servis_laptop">Servis Laptop</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/transaksi/penerimaan_kas">Penerimaan Kas</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/transaksi/pengeluaran_kas">Pengeluaran Kas</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseLaporan" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-bar-chart-o"></i>
                    <span class="nav-link-text">Laporan</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseLaporan">
                    <li>
                        <a href="<?= base_url(); ?>/jurnal/penerimaan">Jurnal Penerimaan Kas</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/jurnal/pengeluaran">Jurnal Pengeluaran Kas</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/servis_laptop">Servis Laptop</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/laporan/rekap">Rekap Laporan</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
                <a class="nav-link" href="<?= base_url(); ?>/users">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Users</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>