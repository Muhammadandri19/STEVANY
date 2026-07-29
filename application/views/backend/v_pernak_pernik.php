<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pernak-Pernik</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fas fa-plus"></i> Tambah Pernak-Pernik
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Data Pernak-Pernik Wisata</h3>
                </div>

                <div class="card-body">

                    <table id="tabelPernak" class="table table-bordered table-striped text-center">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Destinasi</th>
                                <th>Nama Produk</th>
                                <th>Toko</th>
                                <th>Harga</th>
                                <th>Alamat</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($pernak_pernik as $p): ?>

                                <tr>

                                    <td><?= $no++; ?></td>

                                    <td>
                                        <?php if (!empty($p->foto)): ?>
                                            <img src="<?= base_url('uploads/pernak_pernik/' . $p->foto); ?>" width="80" class="img-thumbnail">
                                        <?php else: ?>
                                            <span class="badge badge-secondary">Tidak Ada</span>
                                        <?php endif; ?>
                                    </td>

                                    <td><?= $p->destinasi_nama; ?></td>

                                    <td><?= $p->nama_produk; ?></td>

                                    <td><?= $p->nama_toko ?? '-'; ?></td>

                                    <td><?= $p->harga ?? '-'; ?></td>

                                    <td>
                                        <?= !empty($p->alamat) ? substr($p->alamat, 0, 40) . '...' : '-'; ?>
                                    </td>

                                    <td>

                                        <button class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit<?= $p->id_pernak; ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <a href="<?= base_url('pernak_pernik/hapus/' . $p->id_pernak); ?>"
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


            <form action="<?= base_url('pernak_pernik/simpan'); ?>"
                method="post"
                enctype="multipart/form-data">


                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pernak-Pernik</h4>

                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>


                <div class="modal-body">


                    <div class="form-group">
                        <label>Destinasi</label>

                        <select name="destinasi_id" class="form-control" required>

                            <option value="">-- Pilih Destinasi --</option>

                            <?php foreach ($destinasi as $d): ?>

                                <option value="<?= $d->destinasi_id; ?>">
                                    <?= $d->destinasi_nama; ?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <div class="form-group">
                        <label>Nama Produk</label>

                        <input type="text"
                            name="nama_produk"
                            class="form-control"
                            required>

                    </div>


                    <div class="form-group">
                        <label>Nama Toko</label>

                        <input type="text"
                            name="nama_toko"
                            class="form-control">

                    </div>


                    <div class="form-group">
                        <label>Harga</label>

                        <input type="text"
                            name="harga"
                            class="form-control">

                    </div>


                    <div class="form-group">
                        <label>Alamat</label>

                        <textarea name="alamat"
                            class="form-control"></textarea>

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <label>Latitude</label>

                            <input type="text"
                                name="latitude"
                                class="form-control">

                        </div>


                        <div class="col-md-6">

                            <label>Longitude</label>

                            <input type="text"
                                name="longitude"
                                class="form-control">

                        </div>

                    </div>


                    <div class="form-group mt-3">

                        <label>Link Google Maps</label>

                        <input type="text"
                            name="maps"
                            class="form-control">

                    </div>


                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea name="deskripsi"
                            class="form-control"></textarea>

                    </div>


                    <div class="form-group">

                        <label>Foto</label>

                        <input type="file"
                            name="foto"
                            class="form-control">

                    </div>


                </div>


                <div class="modal-footer">

                    <button class="btn btn-primary">
                        Simpan
                    </button>

                </div>


            </form>

        </div>

    </div>

</div>




<!-- MODAL EDIT -->

<?php foreach ($pernak_pernik as $p): ?>

    <div class="modal fade" id="edit<?= $p->id_pernak; ?>">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">


                <form action="<?= base_url('pernak_pernik/update'); ?>"
                    method="post"
                    enctype="multipart/form-data">


                    <input type="hidden"
                        name="id_pernak"
                        value="<?= $p->id_pernak; ?>">


                    <div class="modal-header">

                        <h4 class="modal-title">
                            Edit Pernak-Pernik
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
                                class="form-control">

                                <?php foreach ($destinasi as $d): ?>

                                    <option value="<?= $d->destinasi_id; ?>"
                                        <?= $p->destinasi_id == $d->destinasi_id ? 'selected' : ''; ?>>

                                        <?= $d->destinasi_nama; ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <div class="form-group">

                            <label>Nama Produk</label>

                            <input type="text"
                                name="nama_produk"
                                class="form-control"
                                value="<?= $p->nama_produk; ?>">

                        </div>


                        <div class="form-group">

                            <label>Nama Toko</label>

                            <input type="text"
                                name="nama_toko"
                                class="form-control"
                                value="<?= $p->nama_toko; ?>">

                        </div>


                        <div class="form-group">

                            <label>Harga</label>

                            <input type="text"
                                name="harga"
                                class="form-control"
                                value="<?= $p->harga; ?>">

                        </div>


                        <div class="form-group">

                            <label>Alamat</label>

                            <textarea name="alamat"
                                class="form-control"><?= $p->alamat; ?></textarea>

                        </div>


                        <div class="row">

                            <div class="col-md-6">

                                <label>Latitude</label>

                                <input type="text"
                                    name="latitude"
                                    class="form-control"
                                    value="<?= $p->latitude; ?>">

                            </div>


                            <div class="col-md-6">

                                <label>Longitude</label>

                                <input type="text"
                                    name="longitude"
                                    class="form-control"
                                    value="<?= $p->longitude; ?>">

                            </div>

                        </div>


                        <div class="form-group mt-3">

                            <label>Maps</label>

                            <input type="text"
                                name="maps"
                                class="form-control"
                                value="<?= $p->maps; ?>">

                        </div>


                        <div class="form-group">

                            <label>Deskripsi</label>

                            <textarea name="deskripsi"
                                class="form-control"><?= $p->deskripsi; ?></textarea>

                        </div>



                        <div class="form-group">

                            <label>Foto Saat Ini</label><br>

                            <?php if (!empty($p->foto)): ?>

                                <img src="<?= base_url('uploads/pernak_pernik/' . $p->foto); ?>"
                                    width="150"
                                    class="img-thumbnail">

                            <?php else: ?>

                                <span class="text-muted">
                                    Belum ada foto
                                </span>

                            <?php endif; ?>

                        </div>


                        <div class="form-group">

                            <label>Ganti Foto</label>

                            <input type="file"
                                name="foto"
                                class="form-control">

                        </div>


                    </div>



                    <div class="modal-footer">

                        <button class="btn btn-success">
                            Update
                        </button>

                    </div>


                </form>

            </div>

        </div>

    </div>

<?php endforeach; ?>