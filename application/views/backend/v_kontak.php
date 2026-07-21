<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Pesan Kontak</h1>
                </div>

            </div>

        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">
                        Data Pesan Pengunjung
                    </h3>
                </div>

                <div class="card-body">

                    <table id="tabelKontak"
                        class="table table-bordered table-striped">

                        <thead>

                            <tr class="text-center">

                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subjek</th>
                                <th width="12%">Status</th>
                                <th width="15%">Tanggal</th>
                                <th width="15%">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 1; ?>
                            <?php foreach ($kontak as $k) : ?>

                                <tr>

                                    <td class="text-center align-middle">
                                        <?= $no++; ?>
                                    </td>

                                    <td class="align-middle">
                                        <?= $k->nama; ?>
                                    </td>

                                    <td class="align-middle">
                                        <?= $k->email; ?>
                                    </td>

                                    <td class="align-middle">
                                        <?= $k->subjek; ?>
                                    </td>

                                    <td class="text-center align-middle">

                                        <?php if ($k->status == 'dibaca') : ?>

                                            <span class="badge badge-success">
                                                Dibaca
                                            </span>

                                        <?php else : ?>

                                            <span class="badge badge-warning">
                                                Belum Dibaca
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td class="text-center align-middle">
                                        <?= date('d-m-Y', strtotime($k->created_at)); ?>
                                    </td>

                                    <td class="text-center align-middle">

                                        <button type="button"
                                            class="btn btn-info btn-sm"
                                            style="margin-right:5px;"
                                            data-toggle="modal"
                                            data-target="#detail<?= $k->kontak_id; ?>">

                                            <i class="fas fa-eye"></i>

                                        </button>

                                        <?php if ($k->status == 'belum_dibaca') : ?>

                                            <a href="<?= base_url('kontak/dibaca/' . $k->kontak_id); ?>"
                                                class="btn btn-success btn-sm"
                                                style="margin-right:5px;">

                                                <i class="fas fa-check"></i>

                                            </a>

                                        <?php endif; ?>

                                        <a href="<?= base_url('kontak/hapus/' . $k->kontak_id); ?>"
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


<!-- MODAL DETAIL -->

<?php foreach ($kontak as $k) : ?>

    <div class="modal fade"
        id="detail<?= $k->kontak_id; ?>">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Detail Pesan
                    </h4>

                    <button type="button"
                        class="close"
                        data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="20%">Nama</th>
                            <td><?= $k->nama; ?></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><?= $k->email; ?></td>
                        </tr>

                        <tr>
                            <th>Subjek</th>
                            <td><?= $k->subjek; ?></td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>

                                <?php if ($k->status == 'dibaca') : ?>

                                    <span class="badge badge-success">
                                        Dibaca
                                    </span>

                                <?php else : ?>

                                    <span class="badge badge-warning">
                                        Belum Dibaca
                                    </span>

                                <?php endif; ?>

                            </td>
                        </tr>

                        <tr>
                            <th>Tanggal</th>
                            <td>
                                <?= date('d-m-Y H:i', strtotime($k->created_at)); ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Pesan</th>
                            <td>
                                <?= nl2br($k->pesan); ?>
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

<?php endforeach; ?>