<?= $this->extend('layout/main') ?>

<?= $this->section('menu') ?>

<li>
    <a href="<?= site_url('layout/') ?>" class="waves-effect">
        <i class="mdi mdi-airplay"></i>
        <span> Hai kamu
            <?=
            $u = (session()->get('username'));
            ?>
            <br></br>
            <img src="<?php echo base_url() . '/image/' . $u . 'wandra.jpg' ?>" height="160" width="150" class="img-fa">
        </span>
    </a>
</li>

<li>
    <a href="index.html" class="waves-effect">
        <i class="mdi mdi-airplay"></i>
        <span> Beranda
            <span class="badge badge-pill badge-primary float-right">7</span>
        </span>
    </a>
</li>



<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Tranksaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('kasmasjid') ?>">Kas Masuk</a></li>
        <li><a href="<?= site_url('kaskeluar') ?>">Kas Keluar</a></li>
        <li><a href="<?= site_url('kaskeluar1/anakyatim') ?>">Kas Keluar Anak Yatim</a></li>
        <li><a href="<?= site_url('kaskeluar1/tpq') ?>">Kas Keluar TPQ</a></li>
        <li><a href="<?= site_url('kaskeluar1/sosial') ?>">Kas Keluar Sosial</a></li>
        <li><a href="<?= site_url('kaskeluar1/mesjid') ?>">Kas Keluar Masjid</a></li>
    </ul>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Laporan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('kasmasjid/laporankasmasuk') ?>">Laporan Kas Masuk</a></li>
        <li><a href="<?= site_url('kasmasjid/laporanperperiode') ?>">Laporan Periode</a></li>
        <li><a href="<?= site_url('kasmasjid/laporanperperiodeperjeniskas') ?>">Laporan Per Jenis</a></li>

    </ul>
</li>



<li>
    <a href="<?= site_url('login') ?>" class="waves-effect"><i class="fa fa-sign-out"></i> <span> LogOut </span class="">
</li>
<?php if (session()->get('level') == 1) { ?>

    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="<?= site_url('pengurus') ?>">Pengurus</a></li>
            <li><a href="<?= site_url('user') ?>">User</a></li>
            <li><a href="<?= site_url('donatur') ?>">Donatur</a></li>
            <li><a href="<?= site_url('agenda') ?>">Agenda</a></li>
        </ul>
    </li>
<?php } ?>

<?php if (session()->get('level') == 2) { ?>

<?php } ?>

<?= $this->endSection('') ?>