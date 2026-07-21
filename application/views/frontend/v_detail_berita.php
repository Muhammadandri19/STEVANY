<!-- HERO -->

<section class="intro intro-single route bg-image"
    style="background-image:url('<?= !empty($berita->gambar) ? base_url('uploads/berita/' . $berita->gambar) : base_url('assets_frontend/img/no-image.jpg'); ?>')">

    <div class="overlay-mf"></div>

    <div class="intro-content display-table">

        <div class="table-cell">

            <div class="container">

                <h2 class="intro-title mb-4 text-white">

                    <?= $berita->judul; ?>

                </h2>

                <ol class="breadcrumb d-flex justify-content-center">

                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>#blog">
                            Berita
                        </a>
                    </li>

                    <li class="breadcrumb-item active">

                        <?= character_limiter($berita->judul,40); ?>

                    </li>

                </ol>

                <div class="mt-3">

                    <span class="badge badge-primary p-2">

                        <i class="fa fa-calendar"></i>

                        <?= date('d F Y', strtotime($berita->created_at)); ?>

                    </span>

                    <span class="badge badge-success p-2">

                        <i class="fa fa-user"></i>

                        <?= $berita->pengguna_nama; ?>

                    </span>

                </div>

            </div>

        </div>

    </div>

</section>



<section class="sect-pt4">

    <div class="container">

        <div class="row">

            <!-- ARTIKEL -->

            <div class="col-lg-8">

                <div class="box-shadow-full">

                    <img src="<?= !empty($berita->gambar)
                        ? base_url('uploads/berita/'.$berita->gambar)
                        : base_url('assets_frontend/img/no-image.jpg');?>"
                        class="img-fluid rounded mb-4 w-100">

                    <h3 class="title-left mb-4">

                        Isi Berita

                    </h3>

                    <div class="berita-content">

                        <?= $berita->isi; ?>

                    </div>

                </div>

            </div>



            <!-- SIDEBAR -->

            <div class="col-lg-4">

                <div class="widget-sidebar">

                    <h5 class="sidebar-title">

                        Informasi Berita

                    </h5>

                    <div class="sidebar-content">

                        <ul class="list-ico">

                            <li>

                                <span class="fa fa-calendar"></span>

                                <?= date('d F Y', strtotime($berita->created_at)); ?>

                            </li>

                            <li>

                                <span class="fa fa-user"></span>

                                <?= $berita->pengguna_nama; ?>

                            </li>

                        </ul>

                    </div>

                </div>



                <div class="widget-sidebar">

                    <h5 class="sidebar-title">

                        Berita Terbaru

                    </h5>

                    <div class="sidebar-content">

                        <ul class="list-sidebar">

                            <?php foreach($related as $r): ?>

                                <li>

                                    <a href="<?= base_url('berita/detail/'.$r->slug);?>">

                                        <?= $r->judul; ?>

                                    </a>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </div>



                <div class="widget-sidebar text-center">

                    <a href="<?= base_url();?>#blog"
                        class="btn btn-primary btn-lg btn-block">

                        <i class="fa fa-arrow-left"></i>

                        Kembali ke Berita

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>