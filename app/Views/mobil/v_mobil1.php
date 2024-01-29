<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>

<head>
    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Required datatable js -->
    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>

<div class="col-sm-12">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-m-b-30">
                    <div class="card-header">
                        <h4 class="mt-0 header-tittle">Data Mobil</h4>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-primary" data-target="#addModal" data-toggle="modal">Tambah Data</button>
                        </div>

                        <br>
                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped" id="datamobil">

                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>ID Mobil</th>
                                                <th>Merk</th>
                                                <th>Model</th>
                                                <th>Tahun</th>
                                                <th>warna</th>
                                                <th>Sewa Per Hari</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($mobil as $val) {
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $val['id_mobil1'] ?></td>
                                                    <td><?= $val['merk'] ?></td>
                                                    <td><?= $val['model'] ?></td>
                                                    <td><?= $val['tahun'] ?></td>
                                                    <td><?= $val['warna'] ?></td>
                                                    <td><?= $val['sewaperhari'] ?></td>
                                                    <td><?= $val['status'] ?></td>

                                                    <td style="display: flex;">

                                                        <button type="button" class="btn btn-info btn-sm btn-edit" data-id_mobil1="<?= $val['id_mobil1']; ?>" data-merk="<?= $val['merk'] ?>" data-model="<?= $val['model'] ?> " data-tahun="<?= $val['tahun'] ?>" data-warna="<?= $val['warna'] ?>" data-sewaperhari="<?= $val['sewaperhari'] ?> " data-status="<?= $val['status'] ?>">
                                                            <i class="fa fa-tags"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id_mobil1="<?= $val['id_mobil1']; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TAMBAH DATA -->
<form action="/mobil/save" method="post">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-denger alert-dismissible fade show" role="alert">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID Mobil</label>
                        <input type="text" class="form-control" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Merk Mobil</label>
                        <input type="text" class="form-control" name="merk">
                    </div>
                    <div class="col-md-12">
                        <label>Model Mobil</label>
                        <input type="text" class="form-control" name="model">
                    </div>
                    <div class="col-md-12">
                        <label>Tahun Mobil</label>
                        <input type="text" class="form-control" name="tahun">
                    </div>
                    <div class="col-md-12">
                        <label>Warna mobil</label>
                        <input type="text" class="form-control" name="warna">
                    </div>
                    <div class="col-md-12">
                        <label>Sewa Per Hari</label>
                        <input type="text" class="form-control" name="sewaperhari">
                    </div>
                    <div class="col-md-12">
                        <label>Status Peminjaman</label>
                        <input type="text" class="form-control" name="status">
                    </div>
                    <div class="col-md-12">
                        <label>Klass</label>
                        <select name="idklass" id="idklass" class="form-control">
                            <option value="">Pilih</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Standar">Standar</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>

    </div>
</form>

<!-- HAPUS DATA -->
<form action="/mobil/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Mobil</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Yakin Menghapus Data Ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- edit modal -->
<form action="/mobil/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Mobil</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID Mobil</label>
                        <input type="text" class="form-control id_mobil1" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Merk Mobil </label>
                        <input type="text" class="form-control merk" name="merk">
                    </div>
                    <div class="col-md-12">
                        <label>Model Mobil</label>
                        <input type="text" class="form-control model" name="model">
                    </div>
                    <div class="col-md-12">
                        <label>Tahun Mobil</label>
                        <input type="text" class="form-control tahun" name="tahun">
                    </div>
                    <div class="col-md-12">
                        <label>Warna Mobil</label>
                        <input type="text" class="form-control warna" name="warna">
                    </div>
                    <div class="col-md-12">
                        <label>Sewa Per Hari</label>
                        <input type="text" class="form-control sewaperhari" name="sewaperhari">
                    </div>
                    <div class="col-md-12">
                        <label>Status Peminjaman</label>
                        <input type="text" class="form-control status" name="status">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('.btn-edit').on('click', function() {
        const id = $(this).data('id_mobil1');
        const merk = $(this).data('merk');
        const model = $(this).data('model');
        const tahun = $(this).data('tahun');
        const warna = $(this).data('warna');
        const sewaperhari = $(this).data('sewaperhari');
        const status = $(this).data('status');


        $('.id_mobil1').val(id);
        $('.merk').val(merk);
        $('.model').val(model);
        $('.tahun').val(tahun);
        $('.warna').val(warna);
        $('.sewaperhari').val(sewaperhari);
        $('.status').val(status).trigger('change');
        $('#editModal').modal('show');

    });
    $('.btn-delete').on('click', function() {
        const id = $(this).data('id_mobil1');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });
    $(document).ready(function() {
        $('#datamobil').DataTable();
    });
</script>
<?= $this->endSection('') ?>