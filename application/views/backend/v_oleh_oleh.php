<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Oleh-Oleh</h1>
                </div>

                <div class="col-sm-6 text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fas fa-plus"></i> Tambah Oleh-Oleh
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
                        Data Oleh-Oleh Wisata
                    </h3>
                </div>


                <div class="card-body">

                    <table id="tabelOlehOleh" class="table table-bordered table-striped text-center">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Destinasi</th>
                                <th>Produk</th>
                                <th>Toko</th>
                                <th>Harga</th>
                                <th>Alamat</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($oleh_oleh as $o): ?>

                                <tr>

                                    <td><?= $no++; ?></td>


                                    <td>

                                        <?php if (!empty($o->foto)): ?>

                                            <img src="<?= base_url('uploads/oleh_oleh/' . $o->foto); ?>" width="80" class="img-thumbnail">

                                        <?php else: ?>

                                            <span class="badge badge-secondary">
                                                Tidak Ada
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <td>
                                        <?= $o->destinasi_nama; ?>
                                    </td>


                                    <td>
                                        <?= $o->nama_produk; ?>
                                    </td>


                                    <td>
                                        <?= $o->nama_toko; ?>
                                    </td>


                                    <td>
                                        <?= $o->harga; ?>
                                    </td>


                                    <td>
                                        <?= $o->alamat; ?>
                                    </td>


                                    <td>

                                        <?= !empty($o->deskripsi) ? substr($o->deskripsi, 0, 50) . '...' : '-'; ?>

                                    </td>



                                    <td style="white-space:nowrap">


                                        <button class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit<?= $o->id_oleh_oleh; ?>">

                                            <i class="fas fa-edit"></i>

                                        </button>


                                        <a href="<?= base_url('oleh_oleh/hapus/' . $o->id_oleh_oleh); ?>"
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


            <form action="<?= base_url('oleh_oleh/simpan'); ?>"
                method="post"
                enctype="multipart/form-data">


                <div class="modal-header">

                    <h4 class="modal-title">
                        Tambah Oleh-Oleh
                    </h4>


                    <button type="button" class="close" data-dismiss="modal">
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

                            <div class="form-group">

                                <label>Latitude</label>

                                <input type="text"
                                    name="latitude"
                                    class="form-control">

                            </div>

                        </div>



                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Longitude</label>

                                <input type="text"
                                    name="longitude"
                                    class="form-control">

                            </div>

                        </div>


                    </div>



                    <div class="form-group">

                        <label>Link Google Maps</label>

                        <input type="text"
                            name="maps"
                            class="form-control">

                    </div>



                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea name="deskripsi"
                            class="form-control"
                            rows="4"></textarea>

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

<?php foreach ($oleh_oleh as $o): ?>

    <div class="modal fade" id="edit<?= $o->id_oleh_oleh; ?>">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">


                <form action="<?= base_url('oleh_oleh/update'); ?>"
                    method="post"
                    enctype="multipart/form-data">


                    <input type="hidden"
                        name="id_oleh_oleh"
                        value="<?= $o->id_oleh_oleh; ?>">


                    <div class="modal-header">

                        <h4 class="modal-title">
                            Edit Oleh-Oleh
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


                                <?php foreach ($destinasi as $d): ?>

                                    <option value="<?= $d->destinasi_id; ?>"
                                        <?= $o->destinasi_id == $d->destinasi_id ? 'selected' : ''; ?>>

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
                                value="<?= $o->nama_produk; ?>"
                                required>

                        </div>




                        <div class="form-group">

                            <label>Nama Toko</label>

                            <input type="text"
                                name="nama_toko"
                                class="form-control"
                                value="<?= $o->nama_toko; ?>">

                        </div>




                        <div class="form-group">

                            <label>Harga</label>

                            <input type="text"
                                name="harga"
                                class="form-control"
                                value="<?= $o->harga; ?>">

                        </div>




                        <div class="form-group">

                            <label>Alamat</label>

                            <textarea name="alamat"
                                class="form-control"><?= $o->alamat; ?></textarea>

                        </div>




                        <div class="row">


                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Latitude</label>

                                    <input type="text"
                                        name="latitude"
                                        class="form-control"
                                        value="<?= $o->latitude; ?>">

                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Longitude</label>

                                    <input type="text"
                                        name="longitude"
                                        class="form-control"
                                        value="<?= $o->longitude; ?>">

                                </div>

                            </div>


                        </div>





                        <div class="form-group">

                            <label>Link Google Maps</label>

                            <input type="text"
                                name="maps"
                                class="form-control"
                                value="<?= $o->maps; ?>">

                        </div>





                        <div class="form-group">

                            <label>Deskripsi</label>

                            <textarea name="deskripsi"
                                class="form-control"
                                rows="4"><?= $o->deskripsi; ?></textarea>

                        </div>





                        <div class="form-group">

                            <label>Foto Saat Ini</label>

                            <br>


                            <?php if (!empty($o->foto)): ?>

                                <img src="<?= base_url('uploads/oleh_oleh/' . $o->foto); ?>"
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


                            <small class="text-muted">
                                Kosongkan jika tidak mengganti foto
                            </small>


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