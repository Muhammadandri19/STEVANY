<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori Wisata</h1>
                </div>

                <div class="col-sm-6 text-right">
                    <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modalTambah">
                        <i class="fas fa-plus"></i> Tambah Kategori
                    </button>
                </div>
            </div>

        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Data Kategori Wisata</h3>
                </div>

                <div class="card-body">

                    <table id="tabelKategori" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th width="5%" class="align-middle">No</th>
                                <th class="align-middle">Nama Kategori</th>
                                <th class="align-middle">Deskripsi</th>
                                <th width="15%" class="align-middle">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $no = 1; ?>
                            <?php foreach ($kategori as $k) : ?>

                                <tr>
                                    <td class="align-middle"><?= $no++; ?></td>
                                    <td class="align-middle"><?= $k->kategori_nama; ?></td>
                                    <td class="align-middle"><?= $k->kategori_deskripsi; ?></td>

                                    <td class="align-middle">
                                        <button type="button"
                                            class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit<?= $k->kategori_id; ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <a href="<?= base_url('kategori/hapus/' . $k->kategori_id); ?>"
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

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?= base_url('kategori/simpan'); ?>" method="post">

                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kategori</h4>

                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text"
                            name="kategori_nama"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="kategori_deskripsi"
                            class="form-control"
                            rows="4"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php foreach ($kategori as $k) : ?>

    <div class="modal fade" id="edit<?= $k->kategori_id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="<?= base_url('kategori/update'); ?>" method="post">

                    <input type="hidden"
                        name="kategori_id"
                        value="<?= $k->kategori_id; ?>">

                    <div class="modal-header">
                        <h4 class="modal-title">Edit Kategori</h4>

                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text"
                                name="kategori_nama"
                                value="<?= $k->kategori_nama; ?>"
                                class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="kategori_deskripsi"
                                class="form-control"
                                rows="4"><?= $k->kategori_deskripsi; ?></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

<?php endforeach; ?>