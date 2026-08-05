<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-concierge-bell text-primary"></i>
                        Data Fasilitas
                    </h1>
                </div>

                <div class="col-sm-6 text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fas fa-plus-circle"></i>
                        Tambah Fasilitas
                    </button>
                </div>

            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">

            <div class="card card-outline card-primary">

                <div class="card-header">
                    <h3 class="card-title">
                        Daftar Fasilitas Destinasi
                    </h3>
                </div>


                <div class="card-body table-responsive">

                    <table id="tabelFasilitas" class="table table-bordered table-striped">

                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="12%">Foto</th>
                                <th>Destinasi</th>
                                <th>Nama Fasilitas</th>
                                <th>Deskripsi</th>
                                <th width="10%">Status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($fasilitas as $row) :
                            ?>

                                <tr>

                                    <td class="text-center align-middle">
                                        <?= $no++; ?>
                                    </td>


                                    <td class="text-center align-middle">

                                        <?php
                                        $foto = !empty($row->foto)
                                            ? base_url('uploads/fasilitas/' . $row->foto)
                                            : base_url('assets/img/no-image.png');
                                        ?>

                                        <img src="<?= $foto; ?>"
                                            class="img-thumbnail"
                                            style="width:90px;height:70px;object-fit:cover;">

                                    </td>


                                    <td class="align-middle">
                                        <?= $row->destinasi_nama; ?>
                                    </td>


                                    <td class="align-middle font-weight-bold">
                                        <?= $row->nama_fasilitas; ?>
                                    </td>


                                    <td class="align-middle">
                                        <?= character_limiter(strip_tags($row->deskripsi), 80); ?>
                                    </td>


                                    <td class="text-center align-middle">

                                        <?php if ($row->status == 'aktif') : ?>

                                            <span class="badge badge-success">
                                                Aktif
                                            </span>

                                        <?php else : ?>

                                            <span class="badge badge-danger">
                                                Nonaktif
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <td class="text-center align-middle">

                                        <button class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit<?= $row->fasilitas_id; ?>">

                                            <i class="fas fa-edit"></i>

                                        </button>


                                        <a href="<?= base_url('fasilitas/hapus/' . $row->fasilitas_id); ?>"
                                            class="btn btn-danger btn-sm tombol-hapus">

                                            <i class="fas fa-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </section>

</div>


<!-- MODAL TAMBAH -->

<div class="modal fade" id="modalTambah">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="<?= base_url('fasilitas/simpan'); ?>"
                method="post"
                enctype="multipart/form-data">


                <div class="modal-header bg-primary">

                    <h4 class="modal-title">
                        <i class="fas fa-plus-circle"></i>
                        Tambah Fasilitas
                    </h4>


                    <button type="button"
                        class="close text-white"
                        data-dismiss="modal">

                        &times;

                    </button>

                </div>


                <div class="modal-body">

                    <div class="row">


                        <div class="col-md-8">


                            <div class="form-group">

                                <label>Destinasi Wisata</label>

                                <select name="destinasi_id"
                                    class="form-control"
                                    required>

                                    <option value="">
                                        -- Pilih Destinasi --
                                    </option>

                                    <?php foreach ($destinasi as $d) : ?>

                                        <option value="<?= $d->destinasi_id; ?>">
                                            <?= $d->destinasi_nama; ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>


                            <div class="form-group">

                                <label>Nama Fasilitas</label>

                                <input type="text"
                                    name="nama_fasilitas"
                                    class="form-control"
                                    placeholder="Masukkan nama fasilitas"
                                    required>

                            </div>


                            <div class="form-group">

                                <label>Deskripsi</label>

                                <textarea name="deskripsi"
                                    class="form-control"
                                    rows="6"
                                    placeholder="Masukkan deskripsi fasilitas"></textarea>

                            </div>


                            <div class="form-group">

                                <label>Status</label>

                                <select name="status"
                                    class="form-control">

                                    <option value="aktif">
                                        Aktif
                                    </option>

                                    <option value="nonaktif">
                                        Nonaktif
                                    </option>

                                </select>

                            </div>


                        </div>


                        <div class="col-md-4">


                            <div class="form-group">

                                <label>Foto Fasilitas</label>

                                <input type="file"
                                    id="fotoTambah"
                                    name="foto"
                                    class="form-control"
                                    accept=".jpg,.jpeg,.png,.webp">

                            </div>


                            <div class="text-center mt-3">

                                <img id="previewTambah"
                                    src="<?= base_url('assets/img/no-image.png'); ?>"
                                    class="img-thumbnail"
                                    style="width:220px;height:170px;object-fit:cover;display:none;">

                            </div>


                            <small class="text-muted d-block text-center mt-3">

                                Upload foto fasilitas dengan ukuran yang proporsional agar tampil maksimal pada website.

                            </small>


                        </div>


                    </div>

                </div>


                <div class="modal-footer">


                    <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">

                        <i class="fas fa-times"></i>
                        Batal

                    </button>


                    <button type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Simpan

                    </button>


                </div>


            </form>

        </div>

    </div>

</div>

<!-- MODAL EDIT -->

<?php foreach ($fasilitas as $row) : ?>

    <div class="modal fade" id="edit<?= $row->fasilitas_id; ?>">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">


                <form action="<?= base_url('fasilitas/update'); ?>"
                    method="post"
                    enctype="multipart/form-data">


                    <input type="hidden"
                        name="fasilitas_id"
                        value="<?= $row->fasilitas_id; ?>">



                    <div class="modal-header bg-warning">

                        <h4 class="modal-title">

                            <i class="fas fa-edit"></i>
                            Edit Fasilitas

                        </h4>


                        <button type="button"
                            class="close text-white"
                            data-dismiss="modal">

                            &times;

                        </button>

                    </div>



                    <div class="modal-body">

                        <div class="row">



                            <div class="col-md-8">


                                <div class="form-group">

                                    <label>Destinasi Wisata</label>


                                    <select name="destinasi_id"
                                        class="form-control"
                                        required>


                                        <?php foreach ($destinasi as $d) : ?>


                                            <option value="<?= $d->destinasi_id; ?>"
                                                <?= ($row->destinasi_id == $d->destinasi_id) ? 'selected' : ''; ?>>

                                                <?= $d->destinasi_nama; ?>

                                            </option>


                                        <?php endforeach; ?>


                                    </select>


                                </div>



                                <div class="form-group">

                                    <label>Nama Fasilitas</label>


                                    <input type="text"
                                        name="nama_fasilitas"
                                        class="form-control"
                                        value="<?= $row->nama_fasilitas; ?>"
                                        required>


                                </div>



                                <div class="form-group">

                                    <label>Deskripsi</label>


                                    <textarea name="deskripsi"
                                        rows="6"
                                        class="form-control"><?= $row->deskripsi; ?></textarea>


                                </div>



                                <div class="form-group">

                                    <label>Status</label>


                                    <select name="status"
                                        class="form-control">


                                        <option value="aktif"
                                            <?= ($row->status == 'aktif') ? 'selected' : ''; ?>>

                                            Aktif

                                        </option>


                                        <option value="nonaktif"
                                            <?= ($row->status == 'nonaktif') ? 'selected' : ''; ?>>

                                            Nonaktif

                                        </option>


                                    </select>


                                </div>


                            </div>




                            <div class="col-md-4">


                                <div class="form-group">

                                    <label>Foto Fasilitas</label>


                                    <input type="file"
                                        name="foto"
                                        class="form-control fotoEdit"
                                        data-id="<?= $row->fasilitas_id; ?>"
                                        accept=".jpg,.jpeg,.png,.webp">


                                </div>



                                <div class="text-center mt-3">


                                    <?php

                                    $foto = !empty($row->foto)
                                        ? base_url('uploads/fasilitas/' . $row->foto)
                                        : base_url('assets/img/no-image.png');

                                    ?>


                                    <img id="previewEdit<?= $row->fasilitas_id; ?>"
                                        src="<?= $foto; ?>"
                                        class="img-thumbnail"
                                        style="width:220px;height:170px;object-fit:cover;">


                                </div>



                                <small class="text-muted d-block text-center mt-3">

                                    Kosongkan jika foto tidak ingin diganti.

                                </small>


                            </div>


                        </div>

                    </div>




                    <div class="modal-footer">


                        <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                            <i class="fas fa-times"></i>

                            Batal

                        </button>



                        <button type="submit"
                            class="btn btn-warning">

                            <i class="fas fa-save"></i>

                            Update

                        </button>


                    </div>


                </form>


            </div>

        </div>

    </div>


<?php endforeach; ?>



<!-- SCRIPT -->

<script>
    $(function() {

        $('#tabelFasilitas').DataTable({

            responsive: true,
            autoWidth: false,
            order: []

        });



        $('#fotoTambah').change(function() {

            let file = this.files[0];

            if (file) {

                let reader = new FileReader();

                reader.onload = function(e) {

                    $('#previewTambah')
                        .attr('src', e.target.result)
                        .show();

                }

                reader.readAsDataURL(file);

            }

        });



        $('.fotoEdit').change(function() {

            let id = $(this).data('id');

            let file = this.files[0];


            if (file) {

                let reader = new FileReader();


                reader.onload = function(e) {

                    $('#previewEdit' + id)
                        .attr('src', e.target.result);

                }


                reader.readAsDataURL(file);

            }


        });

    });
</script>


