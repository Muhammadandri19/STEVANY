<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Destinasi Wisata</h1>
                </div>

                <div class="col-sm-6 text-right">

                    <button class="btn btn-primary"
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

                                <th width="5%">No</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Nama Destinasi</th>
                                <th>Harga Tiket</th>
                                <th>Jam Operasional</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th width="15%">Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($destinasi as $d): ?>


                                <tr>


                                    <td>
                                        <?= $no++; ?>
                                    </td>


                                    <td>

                                        <?php if (!empty($d->destinasi_gambar)): ?>

                                            <img src="<?= base_url('uploads/destinasi/' . $d->destinasi_gambar); ?>"
                                                width="90"
                                                class="img-thumbnail">

                                        <?php else: ?>

                                            <img src="<?= base_url('assets/no-image.png'); ?>"
                                                width="90"
                                                class="img-thumbnail">

                                        <?php endif; ?>


                                    </td>


                                    <td>
                                        <?= $d->kategori_nama; ?>
                                    </td>


                                    <td>
                                        <strong>
                                            <?= $d->destinasi_nama; ?>
                                        </strong>
                                    </td>


                                    <td>

                                        <?php if (!empty($d->harga_tiket)): ?>

                                            <span class="badge badge-success">
                                                <?= $d->harga_tiket; ?>
                                            </span>

                                        <?php else: ?>

                                            -

                                        <?php endif; ?>

                                    </td>


                                    <td>
                                        <?= !empty($d->jam_operasional)
                                            ? $d->jam_operasional
                                            : '-'; ?>
                                    </td>


                                    <td>

                                        <?php if (!empty($d->latitude) && !empty($d->longitude)): ?>

                                            <a target="_blank"
                                                href="https://www.google.com/maps?q=<?= $d->latitude ?>,<?= $d->longitude ?>"
                                                class="btn btn-info btn-sm">

                                                <i class="fas fa-map-marker-alt"></i>

                                            </a>

                                        <?php else: ?>

                                            -

                                        <?php endif; ?>

                                    </td>


                                    <td>

                                        <?php if ($d->status == 'aktif'): ?>

                                            <span class="badge badge-success">
                                                Aktif
                                            </span>

                                        <?php else: ?>

                                            <span class="badge badge-danger">
                                                Nonaktif
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <td>


                                        <button class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit<?= $d->destinasi_id ?>">

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

<div class="modal fade"
    id="modalTambah">


    <div class="modal-dialog modal-lg">


        <div class="modal-content">


            <form action="<?= base_url('destinasi/simpan'); ?>"
                method="post"
                enctype="multipart/form-data">


                <div class="modal-header bg-primary">

                    <h4 class="modal-title text-white">
                        Tambah Destinasi
                    </h4>


                    <button type="button"
                        class="close text-white"
                        data-dismiss="modal">

                        &times;

                    </button>


                </div>



                <div class="modal-body">


                    <div class="row">


                        <div class="col-md-6">


                            <div class="form-group">

                                <label>Kategori Wisata</label>

                                <select name="kategori_id"
                                    class="form-control"
                                    required>


                                    <option value="">
                                        -- Pilih Kategori --
                                    </option>


                                    <?php foreach ($kategori as $k): ?>


                                        <option value="<?= $k->kategori_id ?>">

                                            <?= $k->kategori_nama ?>

                                        </option>


                                    <?php endforeach; ?>


                                </select>


                            </div>


                        </div>



                        <div class="col-md-6">


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


                    </div>



                    <div class="form-group">

                        <label>Nama Destinasi</label>

                        <input type="text"
                            name="destinasi_nama"
                            class="form-control"
                            required>

                    </div>



                    <div class="form-group">

                        <label>Alamat</label>

                        <textarea name="destinasi_alamat"
                            class="form-control"
                            rows="3"></textarea>

                    </div>



                    <div class="row">


                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Latitude</label>

                                <input type="text"
                                    name="latitude"
                                    class="form-control"
                                    placeholder="-7.49430000">

                            </div>

                        </div>



                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Longitude</label>

                                <input type="text"
                                    name="longitude"
                                    class="form-control"
                                    placeholder="110.38170000">

                            </div>

                        </div>


                    </div>



                    <div class="form-group">

                        <label>Harga Tiket</label>

                        <input type="text"
                            name="harga_tiket"
                            class="form-control"
                            placeholder="Contoh : Rp15.000 / Orang">

                    </div>



                    <div class="form-group">

                        <label>Jam Operasional</label>

                        <input type="text"
                            name="jam_operasional"
                            class="form-control"
                            placeholder="08.00 - 17.00">

                    </div>

                    <div class="form-group">

                        <label>Fasilitas Destinasi</label>

                        <textarea name="fasilitas"
                            class="form-control"
                            rows="4"
                            placeholder="Area Parkir, Toilet, Mushola, Gazebo, Spot Foto"></textarea>

                        <small class="text-muted">
                            Pisahkan fasilitas dengan tanda koma (,)
                        </small>

                    </div>



                    <div class="form-group">

                        <label>Google Maps</label>

                        <textarea name="maps"
                            class="form-control"
                            rows="3"
                            placeholder="Tempel link Google Maps atau iframe"></textarea>

                    </div>



                    <div class="form-group">

                        <label>Deskripsi Destinasi</label>

                        <textarea name="destinasi_deskripsi"
                            class="form-control"
                            rows="6"></textarea>

                    </div>



                    <div class="form-group">

                        <label>Gambar Destinasi</label>

                        <input type="file"
                            name="destinasi_gambar"
                            class="form-control">


                        <small class="text-muted">

                            Format:
                            JPG, JPEG, PNG, WEBP

                        </small>

                    </div>



                </div>



                <div class="modal-footer">


                    <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">

                        Batal

                    </button>



                    <button type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-save"></i>

                        Simpan Destinasi

                    </button>


                </div>


            </form>


        </div>


    </div>


</div>





<!-- ========================= -->
<!-- MODAL EDIT -->
<!-- ========================= -->


<?php foreach ($destinasi as $d): ?>


    <div class="modal fade"
        id="edit<?= $d->destinasi_id ?>">


        <div class="modal-dialog modal-lg">


            <div class="modal-content">


                <form action="<?= base_url('destinasi/update'); ?>"
                    method="post"
                    enctype="multipart/form-data">



                    <input type="hidden"
                        name="destinasi_id"
                        value="<?= $d->destinasi_id ?>">



                    <div class="modal-header bg-warning">


                        <h4 class="modal-title">

                            Edit Destinasi

                        </h4>


                        <button type="button"
                            class="close"
                            data-dismiss="modal">

                            &times;

                        </button>


                    </div>





                    <div class="modal-body">



                        <div class="row">


                            <div class="col-md-6">


                                <div class="form-group">

                                    <label>Kategori Wisata</label>


                                    <select name="kategori_id"
                                        class="form-control"
                                        required>



                                        <?php foreach ($kategori as $k): ?>


                                            <option value="<?= $k->kategori_id ?>"
                                                <?= ($d->kategori_id == $k->kategori_id)
                                                    ? 'selected' : '' ?>>

                                                <?= $k->kategori_nama ?>

                                            </option>


                                        <?php endforeach; ?>


                                    </select>


                                </div>


                            </div>




                            <div class="col-md-6">


                                <div class="form-group">

                                    <label>Status</label>


                                    <select name="status"
                                        class="form-control">



                                        <option value="aktif"
                                            <?= $d->status == 'aktif'
                                                ? 'selected' : '' ?>>

                                            Aktif

                                        </option>




                                        <option value="nonaktif"
                                            <?= $d->status == 'nonaktif'
                                                ? 'selected' : '' ?>>

                                            Nonaktif

                                        </option>



                                    </select>


                                </div>


                            </div>


                        </div>





                        <div class="form-group">

                            <label>Nama Destinasi</label>


                            <input type="text"
                                name="destinasi_nama"
                                class="form-control"
                                value="<?= $d->destinasi_nama ?>"
                                required>


                        </div>





                        <div class="form-group">

                            <label>Alamat Destinasi</label>


                            <textarea name="destinasi_alamat"
                                class="form-control"
                                rows="3"><?= $d->destinasi_alamat ?></textarea>


                        </div>





                        <div class="row">


                            <div class="col-md-6">


                                <div class="form-group">


                                    <label>Latitude</label>


                                    <input type="text"
                                        name="latitude"
                                        class="form-control"
                                        value="<?= $d->latitude ?>"
                                        placeholder="-7.49430000">


                                </div>


                            </div>




                            <div class="col-md-6">


                                <div class="form-group">


                                    <label>Longitude</label>


                                    <input type="text"
                                        name="longitude"
                                        class="form-control"
                                        value="<?= $d->longitude ?>"
                                        placeholder="110.38170000">


                                </div>


                            </div>


                        </div>





                        <div class="form-group">


                            <label>Harga Tiket</label>


                            <input type="text"
                                name="harga_tiket"
                                class="form-control"
                                value="<?= $d->harga_tiket ?>">


                        </div>





                        <div class="form-group">


                            <label>Jam Operasional</label>


                            <input type="text"
                                name="jam_operasional"
                                class="form-control"
                                value="<?= $d->jam_operasional ?>">


                        </div>





                        <div class="form-group">


                            <label>Fasilitas Destinasi</label>


                            <textarea name="fasilitas"
                                class="form-control"
                                rows="4"><?= $d->fasilitas ?></textarea>


                            <small class="text-muted">

                                Pisahkan fasilitas dengan tanda koma (,)

                            </small>


                        </div>





                        <div class="form-group">


                            <label>Google Maps</label>


                            <textarea name="maps"
                                class="form-control"
                                rows="3"><?= $d->maps ?></textarea>


                        </div>





                        <div class="form-group">


                            <label>Deskripsi Destinasi</label>


                            <textarea name="destinasi_deskripsi"
                                class="form-control"
                                rows="6"><?= $d->destinasi_deskripsi ?></textarea>


                        </div>





                        <div class="form-group">


                            <label>Gambar Destinasi</label>


                            <?php if (!empty($d->destinasi_gambar)): ?>


                                <div class="mb-2">

                                    <img src="<?= base_url('uploads/destinasi/' . $d->destinasi_gambar); ?>"
                                        width="180"
                                        class="img-thumbnail">

                                </div>


                            <?php endif; ?>



                            <input type="file"
                                name="destinasi_gambar"
                                class="form-control">



                            <small class="text-muted">

                                Kosongkan jika tidak mengganti gambar.

                            </small>


                        </div>



                    </div>





                    <div class="modal-footer">


                        <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                            Batal

                        </button>




                        <button type="submit"
                            class="btn btn-success">

                            <i class="fas fa-save"></i>

                            Update Destinasi

                        </button>


                    </div>



                </form>


            </div>


        </div>


    </div>



<?php endforeach; ?>