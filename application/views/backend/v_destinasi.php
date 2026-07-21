<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Destinasi Wisata</h1>
                </div>

                <div class="col-sm-6 text-right">

                    <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modalTambah">

                        <i class="fas fa-plus"></i>
                        Tambah Destinasi

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
                        Data Destinasi Wisata
                    </h3>
                </div>

                <div class="card-body">

                    <table id="tabelDestinasi"
                        class="table table-bordered table-striped text-center">

                        <thead>

                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Nama Destinasi</th>
                                <th>Alamat</th>
                                <th>Harga Tiket</th>
                                <th>Jam Operasional</th>
                                <th>Maps</th>
                                <th>Status</th>
                                <th width="120" class="text-center">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 1; ?>
                            <?php foreach ($destinasi as $d) : ?>

                                <tr>

                                    <td><?= $no++; ?></td>

                                    <td>

                                        <?php if ($d->destinasi_gambar) : ?>

                                            <img src="<?= base_url('uploads/destinasi/' . $d->destinasi_gambar); ?>"
                                                width="80"
                                                class="img-thumbnail">

                                        <?php else : ?>

                                            <span class="badge badge-secondary">
                                                Tidak Ada
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td><?= $d->kategori_nama; ?></td>

                                    <td><?= $d->destinasi_nama; ?></td>

                                    <td><?= $d->destinasi_alamat; ?></td>

                                    <td><?= $d->harga_tiket; ?></td>

                                    <td><?= $d->jam_operasional; ?></td>

                                    <td>

                                        <?php if ($d->maps) : ?>

                                            <a href="<?= $d->maps; ?>"
                                                target="_blank"
                                                class="btn btn-info btn-sm">

                                                <i class="fas fa-map-marker-alt"></i>

                                            </a>

                                        <?php endif; ?>

                                    </td>

                                    <td>

                                        <?php if ($d->status == 'aktif') : ?>

                                            <span class="badge badge-success">
                                                Aktif
                                            </span>

                                        <?php else : ?>

                                            <span class="badge badge-danger">
                                                Nonaktif
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td class="text-center align-middle" style="white-space: nowrap;">

                                        <button type="button"
                                            class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit<?= $d->destinasi_id; ?>">

                                            <i class="fas fa-edit"></i>

                                        </button>

                                        <a href="<?= base_url('destinasi/hapus/' . $d->destinasi_id); ?>"
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

            <form action="<?= base_url('destinasi/simpan'); ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Tambah Destinasi
                    </h4>

                    <button type="button"
                        class="close"
                        data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Kategori</label>

                        <select name="kategori_id"
                            class="form-control"
                            required>

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            <?php foreach ($kategori as $k) : ?>

                                <option value="<?= $k->kategori_id; ?>">
                                    <?= $k->kategori_nama; ?>
                                </option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Destinasi</label>
                        <input type="text"
                            name="destinasi_nama"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="destinasi_deskripsi"
                            class="form-control"
                            rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="destinasi_alamat"
                            class="form-control"
                            rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Harga Tiket</label>
                        <input type="text"
                            name="harga_tiket"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Jam Operasional</label>
                        <input type="text"
                            name="jam_operasional"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Google Maps</label>
                        <textarea name="maps"
                            class="form-control"
                            rows="3"></textarea>
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

                    <div class="form-group">

                        <label>Gambar</label>

                        <input type="file"
                            name="destinasi_gambar"
                            class="form-control">

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

<?php foreach ($destinasi as $d) : ?>

    <div class="modal fade" id="edit<?= $d->destinasi_id; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form action="<?= base_url('destinasi/update'); ?>"
                    method="post"
                    enctype="multipart/form-data">

                    <input type="hidden"
                        name="destinasi_id"
                        value="<?= $d->destinasi_id; ?>">

                    <div class="modal-header">
                        <h4 class="modal-title">
                            Edit Destinasi
                        </h4>

                        <button type="button"
                            class="close"
                            data-dismiss="modal">

                            <span>&times;</span>

                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Kategori</label>

                            <select name="kategori_id"
                                class="form-control"
                                required>

                                <?php foreach ($kategori as $k) : ?>

                                    <option value="<?= $k->kategori_id; ?>"
                                        <?= ($d->kategori_id == $k->kategori_id) ? 'selected' : ''; ?>>

                                        <?= $k->kategori_nama; ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Nama Destinasi</label>

                            <input type="text"
                                name="destinasi_nama"
                                class="form-control"
                                value="<?= $d->destinasi_nama; ?>"
                                required>

                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>

                            <textarea name="destinasi_deskripsi"
                                class="form-control"
                                rows="4"><?= $d->destinasi_deskripsi; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Alamat</label>

                            <textarea name="destinasi_alamat"
                                class="form-control"
                                rows="3"><?= $d->destinasi_alamat; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Harga Tiket</label>

                            <input type="text"
                                name="harga_tiket"
                                class="form-control"
                                value="<?= $d->harga_tiket; ?>">

                        </div>

                        <div class="form-group">
                            <label>Jam Operasional</label>

                            <input type="text"
                                name="jam_operasional"
                                class="form-control"
                                value="<?= $d->jam_operasional; ?>">

                        </div>

                        <div class="form-group">
                            <label>Google Maps</label>

                            <textarea name="maps"
                                class="form-control"
                                rows="3"><?= $d->maps; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Status</label>

                            <select name="status"
                                class="form-control">

                                <option value="aktif"
                                    <?= ($d->status == 'aktif') ? 'selected' : ''; ?>>
                                    Aktif
                                </option>

                                <option value="nonaktif"
                                    <?= ($d->status == 'nonaktif') ? 'selected' : ''; ?>>
                                    Nonaktif
                                </option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>Gambar Saat Ini</label>

                            <br>

                            <?php if (!empty($d->destinasi_gambar)) : ?>

                                <img src="<?= base_url('uploads/destinasi/' . $d->destinasi_gambar); ?>"
                                    width="150"
                                    class="img-thumbnail mb-2">

                            <?php else : ?>

                                <p class="text-muted">
                                    Belum ada gambar
                                </p>

                            <?php endif; ?>

                        </div>

                        <div class="form-group">

                            <label>Ganti Gambar</label>

                            <input type="file"
                                name="destinasi_gambar"
                                class="form-control">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti gambar
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