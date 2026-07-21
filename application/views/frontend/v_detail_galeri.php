<!-- HERO -->

<section class="intro intro-single route bg-image"
    style="background-image:url('<?= base_url('uploads/galeri/' . $galeri->foto); ?>')">

    <div class="overlay-mf"></div>

    <div class="intro-content display-table">

        <div class="table-cell">

            <div class="container text-center">

                <h2 class="intro-title mb-4 text-white">

                    <?= $galeri->judul_foto; ?>

                </h2>

                <ol class="breadcrumb d-flex justify-content-center">

                    <li class="breadcrumb-item">

                        <a href="<?= base_url(); ?>">
                            Home
                        </a>

                    </li>

                    <li class="breadcrumb-item">

                        <a href="<?= base_url('galeri'); ?>">
                            Galeri Wisata
                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Detail

                    </li>

                </ol>

            </div>

        </div>

    </div>

</section>


<section class="sect-pt4">

    <div class="container">

        <div class="row">

            <!-- KONTEN -->

            <div class="col-lg-8">

                <div class="box-shadow-full">

                    <img src="<?= base_url('uploads/galeri/' . $galeri->foto); ?>"
                        class="img-fluid rounded mb-4 w-100">

                    <h3 class="title-left">

                        <?= $galeri->judul_foto; ?>

                    </h3>

                    <div class="mb-4">

                        <span class="badge badge-primary">

                            <i class="fa fa-map-marker"></i>

                            <?= $galeri->destinasi_nama; ?>

                        </span>

                        <span class="badge badge-success">

                            <i class="fa fa-tag"></i>

                            <?= $galeri->kategori_nama; ?>

                        </span>

                        <span class="badge badge-info">

                            <i class="fa fa-calendar"></i>

                            <?= date('d F Y', strtotime($galeri->created_at)); ?>

                        </span>

                    </div>

                    <?php if (!empty($galeri->deskripsi)) : ?>

                        <h4 class="mb-3">

                            Tentang Foto

                        </h4>

                        <p class="text-justify">

                            <?= nl2br($galeri->deskripsi); ?>

                        </p>

                    <?php endif; ?>

                </div>


                <!-- INFORMASI DESTINASI -->

                <div class="box-shadow-full">

                    <h3 class="title-left">

                        Informasi Destinasi

                    </h3>

                    <table class="table table-bordered">

                        <tr>

                            <th width="30%">Destinasi</th>

                            <td><?= $galeri->destinasi_nama; ?></td>

                        </tr>

                        <tr>

                            <th>Kategori</th>

                            <td><?= $galeri->kategori_nama; ?></td>

                        </tr>

                        <tr>

                            <th>Alamat</th>

                            <td><?= $galeri->alamat; ?></td>

                        </tr>

                        <tr>

                            <th>Jam Operasional</th>

                            <td><?= $galeri->jam_operasional; ?></td>

                        </tr>

                        <tr>

                            <th>Harga Tiket</th>

                            <td><?= $galeri->harga_tiket; ?></td>

                        </tr>

                    </table>

                    <a href="<?= base_url('destinasi/detail/' . $galeri->destinasi_id); ?>"
                        class="btn btn-primary">

                        <i class="fa fa-map"></i>

                        Lihat Detail Destinasi

                    </a>

                </div>

            </div>


            <!-- SIDEBAR -->

            <div class="col-lg-4">

                <div class="widget-sidebar">

                    <h5 class="sidebar-title">

                        Galeri Lainnya

                    </h5>

                    <div class="sidebar-content">

                        <ul class="list-sidebar">

                            <?php foreach ($related as $r): ?>

                                <li>

                                    <a href="<?= base_url('galeri/detail/' . $r->galeri_id); ?>">

                                        <?= $r->judul_foto; ?>

                                    </a>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </div>


                <div class="widget-sidebar text-center">

                    <a href="<?= base_url('galeri'); ?>"
                        class="btn btn-outline-primary btn-block">

                        <i class="fa fa-arrow-left"></i>

                        Kembali ke Galeri

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>