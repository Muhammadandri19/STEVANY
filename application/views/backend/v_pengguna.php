<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Data Pengguna</h1>
                </div>

                <div class="col-sm-6 text-right">

                    <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modalTambah">

                        <i class="fas fa-plus"></i>
                        Tambah Pengguna

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
                        Data Pengguna Sistem
                    </h3>
                </div>

                <div class="card-body">

                    <table id="tabelPengguna"
                        class="table table-bordered table-striped">

                        <thead>

                            <tr class="text-center">

                                <th width="5%">No</th>
                                <th width="10%">Foto</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th width="10%">Level</th>
                                <th width="10%">Status</th>
                                <th width="12%">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 1; ?>
                            <?php foreach ($pengguna as $p) : ?>

                                <tr>

                                    <td class="text-center align-middle">
                                        <?= $no++; ?>
                                    </td>

                                    <td class="text-center align-middle">

                                        <img src="<?= base_url('uploads/pengguna/' . $p->pengguna_foto); ?>"
                                            width="60"
                                            height="60"
                                            class="img-thumbnail">

                                    </td>

                                    <td class="align-middle">
                                        <?= $p->pengguna_nama; ?>
                                    </td>

                                    <td class="align-middle">
                                        <?= $p->pengguna_username; ?>
                                    </td>

                                    <td class="align-middle">
                                        <?= $p->pengguna_email; ?>
                                    </td>

                                    <td class="text-center align-middle">

                                        <?php if ($p->pengguna_level == 'superadmin') : ?>

                                            <span class="badge badge-danger">
                                                Superadmin
                                            </span>

                                        <?php else : ?>

                                            <span class="badge badge-primary">
                                                Admin
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td class="text-center align-middle">

                                        <?php if ($p->pengguna_status == 'aktif') : ?>

                                            <span class="badge badge-success">
                                                Aktif
                                            </span>

                                        <?php else : ?>

                                            <span class="badge badge-secondary">
                                                Nonaktif
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td class="text-center align-middle">

                                        <button type="button"
                                            class="btn btn-warning btn-sm mr-1"
                                            data-toggle="modal"
                                            data-target="#edit<?= $p->pengguna_id; ?>">

                                            <i class="fas fa-edit"></i>

                                        </button>

                                        <a href="<?= base_url('pengguna/hapus/' . $p->pengguna_id); ?>"
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

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= base_url('pengguna/simpan'); ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Tambah Pengguna
                    </h4>

                    <button type="button"
                        class="close"
                        data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text"
                            name="pengguna_nama"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text"
                            name="pengguna_username"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password"
                            name="pengguna_password"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"
                            name="pengguna_email"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file"
                            name="pengguna_foto"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Level</label>

                        <select name="pengguna_level"
                            class="form-control"
                            required>

                            <option value="admin">Admin</option>
                            <option value="superadmin">Superadmin</option>

                        </select>

                    </div>

                    <div class="form-group">
                        <label>Status</label>

                        <select name="pengguna_status"
                            class="form-control"
                            required>

                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>

                        </select>

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

<?php foreach ($pengguna as $p) : ?>

    <div class="modal fade"
        id="edit<?= $p->pengguna_id; ?>">

        <div class="modal-dialog">

            <div class="modal-content">

                <form action="<?= base_url('pengguna/update'); ?>"
                    method="post"
                    enctype="multipart/form-data">

                    <input type="hidden"
                        name="pengguna_id"
                        value="<?= $p->pengguna_id; ?>">

                    <div class="modal-header">

                        <h4 class="modal-title">
                            Edit Pengguna
                        </h4>

                        <button type="button"
                            class="close"
                            data-dismiss="modal">

                            <span>&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama</label>

                            <input type="text"
                                name="pengguna_nama"
                                value="<?= $p->pengguna_nama; ?>"
                                class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Username</label>

                            <input type="text"
                                name="pengguna_username"
                                value="<?= $p->pengguna_username; ?>"
                                class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Password Baru</label>

                            <input type="password"
                                name="pengguna_password"
                                class="form-control">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti password
                            </small>

                        </div>

                        <div class="form-group">
                            <label>Email</label>

                            <input type="email"
                                name="pengguna_email"
                                value="<?= $p->pengguna_email; ?>"
                                class="form-control">
                        </div>

                        <div class="form-group text-center">

                            <label>Foto Saat Ini</label>

                            <br>

                            <img src="<?= base_url('uploads/pengguna/' . $p->pengguna_foto); ?>"
                                width="100"
                                class="img-thumbnail">

                        </div>

                        <div class="form-group">
                            <label>Ganti Foto</label>

                            <input type="file"
                                name="pengguna_foto"
                                class="form-control">
                        </div>

                        <div class="form-group">

                            <label>Level</label>

                            <select name="pengguna_level"
                                class="form-control">

                                <option value="admin"
                                    <?= ($p->pengguna_level == 'admin') ? 'selected' : ''; ?>>
                                    Admin
                                </option>

                                <option value="superadmin"
                                    <?= ($p->pengguna_level == 'superadmin') ? 'selected' : ''; ?>>
                                    Superadmin
                                </option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>Status</label>

                            <select name="pengguna_status"
                                class="form-control">

                                <option value="aktif"
                                    <?= ($p->pengguna_status == 'aktif') ? 'selected' : ''; ?>>
                                    Aktif
                                </option>

                                <option value="nonaktif"
                                    <?= ($p->pengguna_status == 'nonaktif') ? 'selected' : ''; ?>>
                                    Nonaktif
                                </option>

                            </select>

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