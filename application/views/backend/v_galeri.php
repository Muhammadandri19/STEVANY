<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Galeri Destinasi</h1>
                </div>

                <div class="col-sm-6 text-right">

                    <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modalTambah">

                        <i class="fas fa-plus"></i>
                        Tambah Foto

                    </button>

                </div>

            </div>

        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">
                        Data Galeri Destinasi
                    </h3>
                </div>

                <div class="card-body">

                    <table id="tabelGaleri"
                        class="table table-bordered table-striped">

                        <thead>

                            <tr class="text-center">

                                <th width="5%">No</th>
                                <th width="15%">Foto</th>
                                <th width="25%">Destinasi</th>
                                <th>Judul Foto</th>
                                <th width="15%">Tanggal</th>
                                <th width="12%">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 1; ?>
                            <?php foreach ($galeri as $g) : ?>

                                <tr>

                                    <td class="text-center align-middle">
                                        <?= $no++; ?>
                                    </td>

                                    <td class="text-center align-middle">

                                        <img src="<?= base_url('uploads/galeri/' . $g->foto); ?>"
                                            width="100"
                                            class="img-thumbnail">

                                    </td>

                                    <td class="align-middle">
                                        <?= $g->destinasi_nama; ?>
                                    </td>

                                    <td class="align-middle">
                                        <?= $g->judul_foto; ?>
                                    </td>

                                    <td class="text-center align-middle">
                                        <?= date('d-m-Y', strtotime($g->created_at)); ?>
                                    </td>

                                    <td class="text-center align-middle">

                                        <div class="d-flex justify-content-center">

                                            <button type="button"
                                                class="btn btn-warning btn-sm mr-1"
                                                data-toggle="modal"
                                                data-target="#edit<?= $g->galeri_id; ?>">

                                                <i class="fas fa-edit"></i>

                                            </button>

                                            <a href="<?= base_url('galeri/hapus/' . $g->galeri_id); ?>"
                                                class="btn btn-danger btn-sm tombol-hapus">

                                                <i class="fas fa-trash"></i>

                                            </a>

                                        </div>

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

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= base_url('galeri/simpan'); ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Tambah Foto Galeri
                    </h4>

                    <button type="button"
                        class="close"
                        data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Destinasi</label>

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

                        <label>Judul Foto</label>

                        <input type="text"
                            name="judul_foto"
                            class="form-control"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Upload Foto</label>

                        <input type="file"
                            name="foto"
                            class="form-control"
                            required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit"
                        class="btn btn-primary">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- MODAL EDIT -->

<?php foreach ($galeri as $g) : ?>

    <div class="modal fade"
        id="edit<?= $g->galeri_id; ?>">

        <div class="modal-dialog">

            <div class="modal-content">

                <form action="<?= base_url('galeri/update'); ?>"
                    method="post"
                    enctype="multipart/form-data">

                    <input type="hidden"
                        name="galeri_id"
                        value="<?= $g->galeri_id; ?>">

                    <div class="modal-header">

                        <h4 class="modal-title">
                            Edit Galeri
                        </h4>

                        <button type="button"
                            class="close"
                            data-dismiss="modal">

                            <span>&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Destinasi</label>

                            <select name="destinasi_id"
                                class="form-control"
                                required>

                                <?php foreach ($destinasi as $d) : ?>

                                    <option value="<?= $d->destinasi_id; ?>"
                                        <?= ($d->destinasi_id == $g->destinasi_id) ? 'selected' : ''; ?>>

                                        <?= $d->destinasi_nama; ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>Judul Foto</label>

                            <input type="text"
                                name="judul_foto"
                                value="<?= $g->judul_foto; ?>"
                                class="form-control"
                                required>

                        </div>

                        <div class="form-group text-center">

                            <label>Foto Saat Ini</label>

                            <br>

                            <img src="<?= base_url('uploads/galeri/' . $g->foto); ?>"
                                width="150"
                                class="img-thumbnail">

                        </div>

                        <div class="form-group">

                            <label>Ganti Foto</label>

                            <input type="file"
                                name="foto"
                                class="form-control">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto
                            </small>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit"
                            class="btn btn-success">

                            Update

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

<?php endforeach; ?>