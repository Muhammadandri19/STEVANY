<?php $this->load->helper('text'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Berita</h1>
                </div>

                <div class="col-sm-6 text-right">

                    <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modalTambah">

                        <i class="fas fa-plus"></i>
                        Tambah Berita

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
                        Data Berita
                    </h3>
                </div>

                <div class="card-body">

                    <table id="tabelBerita"
                        class="table table-bordered table-striped">

                        <thead>

                            <tr class="text-center">

                                <th width="5%">No</th>
                                <th width="10%">Gambar</th>
                                <th>Judul</th>
                                <th width="15%">Penulis</th>
                                <th width="15%">Tanggal</th>
                                <th width="15%">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 1; ?>
                            <?php foreach ($berita as $b) : ?>

                                <tr>

                                    <td class="text-center align-middle">
                                        <?= $no++; ?>
                                    </td>

                                    <td class="text-center align-middle">

                                        <?php if ($b->gambar) : ?>

                                            <img src="<?= base_url('uploads/berita/' . $b->gambar); ?>"
                                                width="80"
                                                class="img-thumbnail">

                                        <?php else : ?>

                                            <span class="badge badge-secondary">
                                                Tidak Ada
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td class="align-middle">
                                        <?= $b->judul; ?>
                                    </td>

                                    <td class="text-center align-middle">
                                        <?= $b->pengguna_nama; ?>
                                    </td>

                                    <td class="text-center align-middle">
                                        <?= date('d-m-Y', strtotime($b->created_at)); ?>
                                    </td>

                                    <td class="text-center align-middle"
                                        style="white-space: nowrap;">

                                        <button type="button"
                                            class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit<?= $b->berita_id; ?>">

                                            <i class="fas fa-edit"></i>

                                        </button>

                                        <a href="<?= base_url('berita/hapus/' . $b->berita_id); ?>"
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

            <form action="<?= base_url('berita/simpan'); ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Tambah Berita
                    </h4>

                    <button type="button"
                        class="close"
                        data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Judul Berita</label>

                        <input type="text"
                            name="judul"
                            class="form-control"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Isi Berita</label>

                        <textarea name="isi"
                            rows="8"
                            class="form-control"></textarea>

                    </div>

                    <div class="form-group">

                        <label>Gambar</label>

                        <input type="file"
                            name="gambar"
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

<?php foreach ($berita as $b) : ?>

    <div class="modal fade"
        id="edit<?= $b->berita_id; ?>">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <form action="<?= base_url('berita/update'); ?>"
                    method="post"
                    enctype="multipart/form-data">

                    <input type="hidden"
                        name="berita_id"
                        value="<?= $b->berita_id; ?>">

                    <div class="modal-header">

                        <h4 class="modal-title">
                            Edit Berita
                        </h4>

                        <button type="button"
                            class="close"
                            data-dismiss="modal">

                            <span>&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Judul Berita</label>

                            <input type="text"
                                name="judul"
                                value="<?= $b->judul; ?>"
                                class="form-control"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Isi Berita</label>

                            <textarea name="isi"
                                rows="8"
                                class="form-control"><?= $b->isi; ?></textarea>

                        </div>

                        <div class="form-group">

                            <label>Gambar Saat Ini</label>

                            <br>

                            <?php if ($b->gambar) : ?>

                                <img src="<?= base_url('uploads/berita/' . $b->gambar); ?>"
                                    width="150"
                                    class="img-thumbnail mb-2">

                            <?php endif; ?>

                        </div>

                        <div class="form-group">

                            <label>Ganti Gambar</label>

                            <input type="file"
                                name="gambar"
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