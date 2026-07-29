<!-- =======================================================
     HALAMAN JELAJAHI GALERI
======================================================== -->

<style>
    .hero-galeri {
        background: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .45)),
            url('<?= base_url('assets_frontend/img/hero-galeri.jpg'); ?>');
        background-size: cover;
        background-position: center;
        padding: 130px 0;
        color: #fff;
    }

    .hero-galeri h1 {
        font-size: 48px;
        font-weight: 700;
    }

    .hero-galeri p {
        font-size: 18px;
        margin-top: 15px;
    }

    .search-box {
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        margin-top: -60px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .1);
        position: relative;
        z-index: 99;
    }

    .kategori-btn {
        margin: 5px;
        border-radius: 50px;
        padding: 8px 20px;
    }

    .section-title {
        font-size: 34px;
        font-weight: 700;
    }

    .section-subtitle {
        color: #777;
        margin-bottom: 40px;
    }

    .gallery-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        transition: .3s;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
    }

    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, .15);
    }

    .gallery-img {
        height: 240px;
        width: 100%;
        object-fit: cover;
    }

    .badge-kategori {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #0d6efd;
        color: #fff;
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 12px;
    }

    .gallery-info i {
        width: 20px;
        color: #0d6efd;
    }

    .btn-gallery {
        border-radius: 30px;
    }

    .pagination {
        justify-content: center;
    }
</style>

<!-- HERO -->
<section class="hero-galeri">
    <div class="container text-center">
        <h1>Jelajahi Galeri Wisata</h1>
        <p>
            Temukan kumpulan dokumentasi foto terbaik dari berbagai
            destinasi wisata Kabupaten Magelang.
        </p>
    </div>
</section>

<!-- SEARCH -->
<div class="container">
    <div class="search-box">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <form method="GET">
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control form-control-lg"
                            name="keyword"
                            placeholder="Cari foto wisata..."
                            value="<?= $this->input->get('keyword') ?? ''; ?>">

                        <div class="input-group-append">
                            <button class="btn btn-primary btn-lg">
                                <i class="fa fa-search"></i>
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-4 text-right">
                <h5 class="mb-0">
                    <?= count($galeri); ?>
                    Foto Galeri
                </h5>
            </div>
        </div>
    </div>
</div>

<!-- KATEGORI -->
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">
                Jelajahi Berdasarkan Kategori
            </h2>

            <p class="section-subtitle">
                Pilih kategori wisata favorit Anda.
            </p>
        </div>

        <div class="text-center mb-5">

            <a href="<?= base_url('galeri/semua'); ?>"
                class="btn btn-primary kategori-btn">
                Semua
            </a>

            <?php foreach ($kategori as $k): ?>

                <a href="<?= base_url('galeri/semua?kategori=' . $k->kategori_id); ?>"
                    class="btn btn-outline-primary kategori-btn">

                    <?= $k->kategori_nama; ?>

                </a>

            <?php endforeach; ?>

        </div>

        <!-- DAFTAR GALERI -->
        <div class="row">

            <?php if (!empty($galeri)): ?>

                <?php foreach ($galeri as $g): ?>

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card gallery-card h-100">

                            <div class="position-relative">

                                <?php if (!empty($g->kategori_nama)): ?>

                                    <span class="badge-kategori">
                                        <?= $g->kategori_nama; ?>
                                    </span>

                                <?php endif; ?>

                                <a href="<?= base_url('galeri/detail/' . $g->galeri_id); ?>">

                                    <img
                                        src="<?= !empty($g->foto)
                                                    ? base_url('uploads/galeri/' . $g->foto)
                                                    : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                        class="gallery-img"
                                        alt="<?= htmlspecialchars($g->judul_foto ?? ''); ?>">

                                </a>

                            </div>


                            <div class="card-body d-flex flex-column">

                                <h4 class="font-weight-bold mb-3">

                                    <a href="<?= base_url('galeri/detail/' . $g->galeri_id); ?>"
                                        class="text-dark text-decoration-none">

                                        <?= htmlspecialchars($g->judul_foto ?? ''); ?>

                                    </a>

                                </h4>


                                <div class="gallery-info mb-2">

                                    <i class="fa fa-map-marker-alt"></i>

                                    <?= htmlspecialchars($g->destinasi_nama ?? '-'); ?>

                                </div>


                                <div class="gallery-info mb-3">

                                    <i class="fa fa-tag"></i>

                                    <?= htmlspecialchars($g->kategori_nama ?? '-'); ?>

                                </div>


                                <div class="mt-auto">

                                    <a href="<?= base_url('galeri/detail/' . $g->galeri_id); ?>"
                                        class="btn btn-primary btn-block btn-gallery">

                                        <i class="fa fa-images"></i>

                                        Lihat Galeri

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>


            <?php else: ?>

                <div class="col-lg-12">

                    <div class="alert alert-warning text-center p-5">

                        <h4 class="mb-3">

                            <i class="fa fa-image"></i>

                            Galeri Tidak Ditemukan

                        </h4>

                        <p class="mb-0">

                            Belum ada dokumentasi foto wisata yang tersedia
                            atau sesuai dengan pencarian Anda.

                        </p>

                    </div>

                </div>

            <?php endif; ?>

        </div>


        <!-- PAGINATION -->

        <?php if (isset($pagination)): ?>

            <div class="row mt-5">

                <div class="col-lg-12">

                    <nav class="d-flex justify-content-center">

                        <?= $pagination; ?>

                    </nav>

                </div>

            </div>

        <?php endif; ?>


    </div>

</section>


<!-- CTA -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h2 class="font-weight-bold">

                    Temukan Lebih Banyak Destinasi Wisata

                </h2>

                <p class="text-muted mb-0">

                    Jelajahi berbagai dokumentasi wisata Kabupaten Magelang
                    dan temukan inspirasi perjalanan terbaik.

                </p>

            </div>


            <div class="col-lg-4 text-lg-right mt-4 mt-lg-0">

                <a href="<?= base_url(); ?>"
                    class="btn btn-primary btn-lg">

                    <i class="fa fa-home"></i>

                    Kembali ke Beranda

                </a>

            </div>

        </div>

    </div>

</section>


<script>
    $(function() {

        let url = new URL(window.location.href);
        let kategori = url.searchParams.get("kategori");

        $(".kategori-btn")
            .removeClass("btn-primary")
            .addClass("btn-outline-primary");


        if (kategori == null) {

            $(".kategori-btn:first")
                .removeClass("btn-outline-primary")
                .addClass("btn-primary");

        } else {

            $(".kategori-btn").each(function() {

                if ($(this).attr("href")
                    .indexOf("kategori=" + kategori) !== -1) {

                    $(this)
                        .removeClass("btn-outline-primary")
                        .addClass("btn-primary");

                }

            });

        }

    });
</script>