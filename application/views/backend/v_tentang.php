<?php $this->load->helper('text'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Tentang Kami</h1>
                </div>

                <div class="col-sm-6 text-right">

                    <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modalTambah">

                        <i class="fas fa-plus"></i>
                        Tambah Data

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
                        Data Tentang Kami
                    </h3>
                </div>

                <div class="card-body">

                    <table id="tabelTentang"
                        class="table table-bordered table-striped">

                        <thead>

                            <tr class="text-center">

                                <th width="5%">No</th>
                                <th width="10%">Gambar</th>
                                <th>Judul</th>
                                <th>Visi</th>
                                <th>Misi</th>
                                <th width="15%">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 1; ?>
                            <?php foreach ($tentang as $t) : ?>

                                <tr>

                                    <td class="text-center align-middle">
                                        <?= $no++; ?>
                                    </td>

                                    <td class="text-center align-middle">

                                        <?php if ($t->gambar) : ?>

                                            <img src="<?= base_url('uploads/tentang/' . $t->gambar); ?>"
                                                width="80"
                                                class="img-thumbnail">

                                        <?php else : ?>

                                            <span class="badge badge-secondary">
                                                Tidak Ada
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td class="align-middle">
                                        <?= $t->judul; ?>
                                    </td>

                                    <td class="align-middle">
                                        <?= character_limiter(strip_tags($t->visi), 40); ?>
                                    </td>

                                    <td class="align-middle">
                                        <?= character_limiter(strip_tags($t->misi), 40); ?>
                                    </td>

                                    <td class="text-center align-middle"
                                        style="white-space: nowrap;">

                                        <button type="button"
                                            class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit<?= $t->tentang_id; ?>">

                                            <i class="fas fa-edit"></i>

                                        </button>

                                        <a href="<?= base_url('tentang/hapus/' . $t->tentang_id); ?>"
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

            <form action="<?= base_url('tentang/simpan'); ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Tambah Tentang Kami
                    </h4>

                    <button type="button"
                        class="close"
                        data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Judul</label>

                        <input type="text"
                            name="judul"
                            class="form-control"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea name="deskripsi"
                            rows="5"
                            class="form-control"></textarea>

                    </div>

                    <div class="form-group">

                        <label>Visi</label>

                        <textarea name="visi"
                            rows="3"
                            class="form-control"></textarea>

                    </div>

                    <div class="form-group">

                        <label>Misi</label>

                        <textarea name="misi"
                            rows="3"
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

<?php foreach ($tentang as $t) : ?>

    <div class="modal fade"
        id="edit<?= $t->tentang_id; ?>">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <form action="<?= base_url('tentang/update'); ?>"
                    method="post"
                    enctype="multipart/form-data">

                    <input type="hidden"
                        name="tentang_id"
                        value="<?= $t->tentang_id; ?>">

                    <div class="modal-header">

                        <h4 class="modal-title">
                            Edit Tentang Kami
                        </h4>

                        <button type="button"
                            class="close"
                            data-dismiss="modal">

                            <span>&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Judul</label>

                            <input type="text"
                                name="judul"
                                class="form-control"
                                value="<?= $t->judul; ?>"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Deskripsi</label>

                            <textarea name="deskripsi"
                                rows="5"
                                class="form-control"><?= $t->deskripsi; ?></textarea>

                        </div>

                        <div class="form-group">

                            <label>Visi</label>

                            <textarea name="visi"
                                rows="3"
                                class="form-control"><?= $t->visi; ?></textarea>

                        </div>

                        <div class="form-group">

                            <label>Misi</label>

                            <textarea name="misi"
                                rows="3"
                                class="form-control"><?= $t->misi; ?></textarea>

                        </div>

                        <div class="form-group">

                            <label>Gambar Saat Ini</label>

                            <br>

                            <?php if ($t->gambar) : ?>

                                <img src="<?= base_url('uploads/tentang/' . $t->gambar); ?>"
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