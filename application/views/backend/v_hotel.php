<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Hotel / Penginapan</h1>
                </div>

                <div class="col-sm-6 text-right">
                    <button class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modalTambah">

                        <i class="fas fa-plus"></i>
                        Tambah Hotel

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
                        Data Hotel / Penginapan
                    </h3>
                </div>


                <div class="card-body">

                    <table id="tabelHotel"
                        class="table table-bordered table-striped text-center">

                        <thead>

                            <tr>

                                <th width="5%">No</th>
                                <th>Gambar</th>
                                <th>Destinasi</th>
                                <th>Nama Hotel</th>
                                <th>Rating</th>
                                <th>Harga Mulai</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th width="15%">Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($hotel as $h): ?>

                                <tr>

                                    <td><?= $no++; ?></td>


                                    <td>

                                        <?php if (!empty($h->gambar)): ?>

                                            <img src="<?= base_url('uploads/hotel/' . $h->gambar); ?>"
                                                width="90"
                                                class="img-thumbnail">

                                        <?php endif; ?>

                                    </td>


                                    <td>

                                        <?php

                                        $desti = $this->db
                                            ->where('destinasi_id', $h->destinasi_id)
                                            ->get('destinasi')
                                            ->row();

                                        ?>

                                        <?= $desti ? $desti->destinasi_nama : '-'; ?>

                                    </td>


                                    <td>

                                        <strong>
                                            <?= $h->nama_hotel; ?>
                                        </strong>

                                    </td>


                                    <td>

                                        <?php if ($h->rating): ?>

                                            <span class="badge badge-warning">

                                                ⭐ <?= $h->rating; ?>

                                            </span>

                                        <?php else: ?>

                                            -

                                        <?php endif; ?>

                                    </td>


                                    <td>

                                        <?php if ($h->harga_mulai): ?>

                                            <span class="badge badge-success">

                                                <?= $h->harga_mulai; ?>

                                            </span>

                                        <?php else: ?>

                                            -

                                        <?php endif; ?>

                                    </td>


                                    <td>
                                        <?= $h->jam_checkin ?: '-'; ?>
                                    </td>


                                    <td>
                                        <?= $h->jam_checkout ?: '-'; ?>
                                    </td>


                                    <td>


                                        <button class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit<?= $h->hotel_id; ?>">

                                            <i class="fas fa-edit"></i>

                                        </button>


                                        <a href="<?= base_url('hotel/hapus/' . $h->hotel_id); ?>"
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


            <form action="<?= base_url('hotel/simpan'); ?>"
                method="post"
                enctype="multipart/form-data">


                <div class="modal-header bg-primary">

                    <h4 class="modal-title">
                        Tambah Hotel
                    </h4>


                    <button type="button"
                        class="close text-white"
                        data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>


                <div class="modal-body">


                    <div class="form-group">

                        <label>Destinasi</label>

                        <select name="destinasi_id"
                            class="form-control">


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



                    <div class="row">


                        <div class="col-md-8">

                            <div class="form-group">

                                <label>Nama Hotel</label>

                                <input type="text"
                                    name="nama_hotel"
                                    class="form-control"
                                    required>

                            </div>

                        </div>



                        <div class="col-md-4">

                            <div class="form-group">

                                <label>Rating</label>

                                <input type="number"
                                    step="0.1"
                                    max="5"
                                    name="rating"
                                    class="form-control"
                                    placeholder="4.8">

                            </div>

                        </div>


                    </div>



                    <div class="form-group">

                        <label>Alamat</label>

                        <textarea name="alamat"
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
                                    placeholder="-7.607874">

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Longitude</label>

                                <input type="text"
                                    name="longitude"
                                    class="form-control"
                                    placeholder="110.203751">

                            </div>

                        </div>


                    </div>



                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Telepon</label>

                                <input type="text"
                                    name="telepon"
                                    class="form-control">

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Email</label>

                                <input type="email"
                                    name="email"
                                    class="form-control">

                            </div>

                        </div>


                    </div>



                    <div class="form-group">

                        <label>Website</label>

                        <input type="text"
                            name="website"
                            class="form-control"
                            placeholder="https://">

                    </div>



                    <div class="form-group">

                        <label>Harga Mulai</label>

                        <input type="text"
                            name="harga_mulai"
                            class="form-control"
                            placeholder="Rp350.000 / malam">

                    </div>



                    <div class="row">

                        <div class="col-md-6">

                            <label>Check In</label>

                            <input type="text"
                                name="jam_checkin"
                                class="form-control"
                                placeholder="14:00">


                        </div>


                        <div class="col-md-6">

                            <label>Check Out</label>

                            <input type="text"
                                name="jam_checkout"
                                class="form-control"
                                placeholder="12:00">


                        </div>


                    </div>

                    <div class="form-group mt-3">

                        <label>Fasilitas Hotel</label>

                        <textarea name="fasilitas"
                            class="form-control"
                            rows="4"
                            placeholder="Wifi, AC, Restoran, Kolam Renang, Parkir"></textarea>

                        <small class="text-muted">
                            Pisahkan fasilitas dengan tanda koma (,)
                        </small>

                    </div>


                    <div class="form-group">

                        <label>Google Maps</label>

                        <textarea name="maps"
                            class="form-control"
                            rows="3"
                            placeholder="Link Google Maps atau iframe"></textarea>

                    </div>


                    <div class="form-group">

                        <label>Deskripsi Hotel</label>

                        <textarea name="deskripsi"
                            class="form-control"
                            rows="6"></textarea>

                    </div>


                    <div class="form-group">

                        <label>Gambar Hotel</label>

                        <input type="file"
                            name="gambar"
                            class="form-control">

                        <small class="text-muted">
                            Format JPG, JPEG, PNG, WEBP
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

                        Simpan Hotel

                    </button>


                </div>


            </form>


        </div>

    </div>

</div>





<!-- ========================= -->
<!-- MODAL EDIT -->
<!-- ========================= -->


<?php foreach ($hotel as $h): ?>


    <div class="modal fade"
        id="edit<?= $h->hotel_id; ?>">


        <div class="modal-dialog modal-lg">


            <div class="modal-content">


                <form action="<?= base_url('hotel/update'); ?>"
                    method="post"
                    enctype="multipart/form-data">


                    <input type="hidden"
                        name="hotel_id"
                        value="<?= $h->hotel_id; ?>">



                    <div class="modal-header bg-warning">


                        <h4 class="modal-title">

                            Edit Hotel

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


                                <option value="">

                                    -- Pilih Destinasi --

                                </option>


                                <?php foreach ($destinasi as $d): ?>


                                    <option value="<?= $d->destinasi_id; ?>"
                                        <?= ($h->destinasi_id == $d->destinasi_id) ? 'selected' : ''; ?>>

                                        <?= $d->destinasi_nama; ?>

                                    </option>


                                <?php endforeach; ?>


                            </select>


                        </div>




                        <div class="row">


                            <div class="col-md-8">


                                <div class="form-group">

                                    <label>Nama Hotel</label>


                                    <input type="text"
                                        name="nama_hotel"
                                        class="form-control"
                                        value="<?= $h->nama_hotel; ?>"
                                        required>


                                </div>


                            </div>



                            <div class="col-md-4">


                                <div class="form-group">


                                    <label>Rating</label>


                                    <input type="number"
                                        step="0.1"
                                        max="5"
                                        name="rating"
                                        class="form-control"
                                        value="<?= $h->rating; ?>">


                                </div>


                            </div>


                        </div>




                        <div class="form-group">


                            <label>Alamat</label>


                            <textarea name="alamat"
                                class="form-control"
                                rows="3"><?= $h->alamat; ?></textarea>


                        </div>





                        <div class="row">


                            <div class="col-md-6">


                                <div class="form-group">


                                    <label>Latitude</label>


                                    <input type="text"
                                        name="latitude"
                                        class="form-control"
                                        value="<?= $h->latitude; ?>">


                                </div>


                            </div>



                            <div class="col-md-6">


                                <div class="form-group">


                                    <label>Longitude</label>


                                    <input type="text"
                                        name="longitude"
                                        class="form-control"
                                        value="<?= $h->longitude; ?>">


                                </div>


                            </div>


                        </div>





                        <div class="row">


                            <div class="col-md-6">


                                <div class="form-group">


                                    <label>Telepon</label>


                                    <input type="text"
                                        name="telepon"
                                        class="form-control"
                                        value="<?= $h->telepon; ?>">


                                </div>


                            </div>



                            <div class="col-md-6">


                                <div class="form-group">


                                    <label>Email</label>


                                    <input type="email"
                                        name="email"
                                        class="form-control"
                                        value="<?= $h->email; ?>">


                                </div>


                            </div>


                        </div>





                        <div class="form-group">


                            <label>Website</label>


                            <input type="text"
                                name="website"
                                class="form-control"
                                value="<?= $h->website; ?>">


                        </div>





                        <div class="form-group">


                            <label>Harga Mulai</label>


                            <input type="text"
                                name="harga_mulai"
                                class="form-control"
                                value="<?= $h->harga_mulai; ?>">


                        </div>





                        <div class="row">


                            <div class="col-md-6">


                                <div class="form-group">


                                    <label>Jam Check In</label>


                                    <input type="text"
                                        name="jam_checkin"
                                        class="form-control"
                                        value="<?= $h->jam_checkin; ?>">


                                </div>


                            </div>




                            <div class="col-md-6">


                                <div class="form-group">


                                    <label>Jam Check Out</label>


                                    <input type="text"
                                        name="jam_checkout"
                                        class="form-control"
                                        value="<?= $h->jam_checkout; ?>">


                                </div>


                            </div>


                        </div>

                        <div class="form-group">

                            <label>Fasilitas Hotel</label>

                            <textarea name="fasilitas"
                                class="form-control"
                                rows="4"
                                placeholder="Wifi, AC, Restoran, Kolam Renang, Parkir"><?= $h->fasilitas; ?></textarea>


                            <small class="text-muted">
                                Pisahkan fasilitas dengan tanda koma (,)
                            </small>


                        </div>



                        <div class="form-group">

                            <label>Google Maps</label>


                            <textarea name="maps"
                                class="form-control"
                                rows="3"><?= $h->maps; ?></textarea>


                        </div>




                        <div class="form-group">


                            <label>Deskripsi Hotel</label>


                            <textarea name="deskripsi"
                                class="form-control"
                                rows="6"><?= $h->deskripsi; ?></textarea>


                        </div>





                        <div class="form-group">


                            <label>Gambar Hotel</label>



                            <?php if (!empty($h->gambar)): ?>


                                <div class="mb-3">


                                    <img src="<?= base_url('uploads/hotel/' . $h->gambar); ?>"
                                        width="180"
                                        class="img-thumbnail">


                                </div>


                            <?php endif; ?>



                            <input type="file"
                                name="gambar"
                                class="form-control">



                            <small class="text-muted">

                                Kosongkan jika tidak ingin mengganti gambar.

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


                            Update Hotel


                        </button>



                    </div>




                </form>



            </div>



        </div>



    </div>



<?php endforeach; ?>





<style>
    #tabelHotel th,
    #tabelHotel td {

        text-align: center;
        vertical-align: middle;

    }
</style>