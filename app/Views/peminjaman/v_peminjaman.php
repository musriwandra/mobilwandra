<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>

<head>
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>

<div class="col-sm-12">
    <div class="page-content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="mt-0 header-tittle ">Data Peminjaman</h4>
                    </div>
                    <div class="card-body">

                        <div class="col-md-12">
                            <button type="button" class="btn btn-info m-b-10 m-l-10 waves-effect waves-light" data-target="#addModal" data-toggle="modal">
                                <i class="fa fa-plus-circle m-r-5"></i>Tambah Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped" id="datapengurus">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>ID Peminjaman</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>ID Pelanggan</th>
                                                <th>ID Mobil</th>
                                                <th>Sewa Perhari</th>
                                                <th>Lama Sewa</th>
                                                <th>Total Biaya</th>
                                                <th>Status Pembayaran</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $sewaperhari = 0;
                                            $lamasewa = 0;
                                            $totalbiaya = 0;
                                            foreach ($peminjaman as $val) {
                                                $no++;
                                                // $lamasewa += $val['Lama_sewa'];
                                                // $sewaperhari += $val['sewaperhari'];
                                                // $totalbiaya = $sewaperhari * $lamasewa;
                                            ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $val['id_Peminjaman'] ?></td>
                                                    <td><?= $val['tgl_pinjam'] ?></td>
                                                    <td><?= $val['id_pelanggan'] ?></td>
                                                    <td><?= $val['id_mobil'] ?></td>
                                                    <td><?= $val['sewaperhari'] ?></td>
                                                    <td><?= $val['Lama_sewa'] ?></td>
                                                    </td>
                                                    <td><?= $val['Lama_sewa'] * $val['sewaperhari'] ?>
                                                    </td>
                                                    <td><?= $val['status_pembayaran'] ?></td>

                                                    <td style="display: flex;">

                                                        <button type="button" class="btn btn-info btn-sm btn-edit" data-id_Peminjaman="<?= $val['id_Peminjaman']; ?>" data-tgl_pinjam="<?= $val['tgl_pinjam'] ?>" data-id_pelanggan="<?= $val['id_pelanggan'] ?> " data-id_mobil="<?= $val['id_mobil'] ?>" data-sewaperhari="<?= $val['sewaperhari'] ?>" data-Lama_sewa="<?= $val['Lama_sewa'] ?>" data-status_pembayaran="<?= $val['status_pembayaran'] ?>">
                                                            <i class="fa fa-tags"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id_Peminjaman="<?= $val['id_Peminjaman']; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>

                                                    </td>

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        <tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div> <!--end row-->
    </div>
</div>
<!-- TAMBAH DATA -->
<form action="/peminjaman/save" method="post">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4> Periksa Entrian Form Anda<h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" id="addModal" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
        </div>
    <?php endif; ?>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaksi</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                    <div class="col-md-12 mb-2">
                        <label>Tanggal Bayar</label>
                        <input type="date" class="form-control " name="tgl_pinjam" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Pelanggan</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_pelanggan" class="btn btn-xs btn-primary">Plg</i></button>
                                </div>
                            </div>&nbsp; &nbsp;
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID Pelanggan</label>
                                    <input type="text" name="id" readonly id="id" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pelanggan</label>
                                    <input type="text" readonly name="nama" id="nama" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Mobil</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_mobil" class="btn btn-xs btn-primary">Mobil</button>
                                </div>
                            </div>&nbsp; &nbsp;
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID Mobil</label>
                                    <input type="text" name="id_mobil" readonly id="id_mobil" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sewa Per Hari</label>
                                    <input type="text" readonly name="sewaperhari" id="sewaperhari" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label>Lama Sewa</label>
                        <input type="number" class="form-control " name="Lama_sewa">
                    </div>
                    <div class="col-md-12">
                        <label>Status Pembayaran</label>
                        <select name="status_pembayaran" id="status_pembayaran" class="form-control">

                            <option value="lunas">Lunas</option>
                            <option value="belumlunas">Belum Lunas</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="modal_pelanggan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Pelanggan</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_pelanggan as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->id ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $d->nohp ?></td>
                                <td><?= $d->alamat ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih_pelanggan('<?= $d->id ?>','<?= $d->nama ?>')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_mobil">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Mobil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Mobil</th>
                            <th>Sewa Per hari</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_mobil as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->id_mobil1 ?></td>
                                <td><?= $d->sewaperhari ?></td>
                                <td><?= $d->status ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih_mobil('<?= $d->id_mobil1 ?>','<?= $d->sewaperhari ?>')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btn-edit').on('click', function() {

        const id = $(this).data('id_Peminjaman');
        const tgl_pinjam = $(this).data('tgl_pinjam');
        const id_pelanggan = $(this).data('id_pelanggan');
        const id_mobil = $(this).data('id_mobil');
        const sewaperhari = $(this).data('sewaperhari');
        const Lama_sewa = $(this).data('Lama_sewa');
        const status_pembayaran = $(this).data('status_pembayaran');


        $('.id_Peminjaman').val(id);
        $('.tgl_pinjam').val(merk);
        $('.id_pelanggan').val(model);
        $('.id_mobil').val(tahun);
        $('.sewaperhari').val(warna);
        $('.Lama_sewa').val(sewaperhari);
        $('.status_pembayaran').val(status_pembayaran).trigger('change');
        $('#editModal').modal('show');

    });
    $('.btn-delete').on('click', function() {
        const id = $(this).data('id_Peminjaman');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });
    $(document).ready(function() {
        $('#datamobil').DataTable();
    });

    function pilih_pelanggan(id, nama) {
        $('#id').val(id);
        $('#nama').val(nama);
        $('.id').val(id);
        $('.nama').val(nama);
        $('#modal_pelanggan').modal().hide();
    }

    function pilih_mobil(id, nama) {
        $('#id_mobil').val(id);
        $('#sewaperhari').val(nama);
        $('.id_mobil').val(id);
        $('.sewaperhari').val(nama);
        $('#modal_mobil').modal().hide();
    }
</script>
<?= $this->endSection('') ?>