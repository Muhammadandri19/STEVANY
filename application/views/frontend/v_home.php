<?php $this->load->helper('text'); ?>

<!-- HERO -->
<div id="home"
    class="intro route bg-image"
    style="background-image:url('<?= base_url('assets_frontend/img/hero-wisata.jpg'); ?>')">

    <div class="overlay-itro"></div>

    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">

                <h5 class="text-white mb-3">
                    SELAMAT DATANG DI
                </h5>

                <h1 class="intro-title mb-4">
                    DOLAN MAGELANG
                </h1>

                <p class="lead text-white mb-4">
                    Temukan destinasi wisata terbaik, hotel nyaman,
                    dan pengalaman liburan yang tak terlupakan.
                </p>

                <p class="intro-subtitle">
                    <span class="text-slider-items">
                        Destinasi Wisata Terbaik,
                        Wisata Alam Menakjubkan,
                        Hotel Nyaman dan Terjangkau,
                        Liburan Tak Terlupakan
                    </span>
                    <strong class="text-slider"></strong>
                </p>

            </div>
        </div>
    </div>

</div>


<main id="main">


    <section id="about" class="about-mf sect-pt4 route">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <div class="box-shadow-full">

                        <div class="title-box-2">
                            <h5 class="title-left">
                                Tentang Kami
                            </h5>
                        </div>

                        <?php if (!empty($tentang)): ?>

                            <p class="lead">
                                <?= word_limiter(strip_tags($tentang->deskripsi), 80); ?>
                            </p>

                        <?php endif; ?>

                        <a href="<?= site_url('tentang/frontend'); ?>" class="btn btn-primary">
                            <i class="fa fa-arrow-right mr-1"></i>
                            Baca Selengkapnya
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- DESTINASI -->
    <section id="work"
        class="portfolio-mf sect-pt4 route">


        <div class="container">


            <div class="row">

                <div class="col-sm-12">

                    <div class="title-box text-center">

                        <h3 class="title-a">
                            Destinasi Wisata
                        </h3>

                        <p class="subtitle-a">
                            Pilihan destinasi wisata terbaik di Magelang
                        </p>

                    </div>

                </div>

            </div>



            <div class="row">


                <?php foreach ($destinasi as $d): ?>


                    <div class="col-md-4 mb-4">


                        <div class="work-box h-100">


                            <a href="<?= base_url('home/detail_destinasi/' . $d->destinasi_id); ?>">


                                <div class="work-img">

                                    <img src="<?= !empty($d->destinasi_gambar)
                                                    ? base_url('uploads/destinasi/' . $d->destinasi_gambar)
                                                    : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                        class="img-fluid img-destinasi zoom-effect"
                                        style="height:250px;width:100%;object-fit:cover;">


                                </div>

                            </a>



                            <div class="work-content">


                                <h2 class="w-title">

                                    <?= $d->destinasi_nama; ?>

                                </h2>



                                <div class="w-more">

                                    <span class="w-ctegory">

                                        <i class="fa fa-map-marker text-danger"></i>

                                        <?= character_limiter($d->destinasi_alamat, 40); ?>

                                    </span>

                                </div>



                                <p class="mb-1">

                                    <i class="fa fa-ticket text-success"></i>

                                    Tiket :
                                    <?= !empty($d->harga_tiket) ? $d->harga_tiket : 'Gratis'; ?>

                                </p>



                                <p class="mb-3">

                                    <i class="fa fa-clock-o text-primary"></i>

                                    <?= $d->jam_operasional; ?>

                                </p>



                                <a href="<?= base_url('home/detail_destinasi/' . $d->destinasi_id); ?>"
                                    class="btn btn-primary btn-sm">

                                    <i class="fa fa-eye"></i>
                                    Lihat Detail

                                </a>



                            </div>


                        </div>


                    </div>



                <?php endforeach; ?>


            </div>



            <div class="row mt-4">

                <div class="col-12 text-center">

                    <a href="<?= base_url('home/destinasi_selengkapnya'); ?>"
                        class="btn btn-outline-primary btn-lg">

                        <i class="fa fa-compass"></i>
                        Jelajahi Semua Destinasi

                    </a>

                </div>

            </div>


        </div>


    </section>

    <!-- Hotel -->
    <section id="hotel" class="services-mf route py-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Hotel & Penginapan
                        </h3>
                        <p class="subtitle-a">
                            Pilihan hotel nyaman untuk wisatawan Magelang
                        </p>
                    </div>
                </div>
            </div>


            <div class="row">

                <?php foreach ($hotel as $h): ?>

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="work-box h-100">


                            <a href="<?= base_url('hotel/detail/' . $h->hotel_id); ?>">

                                <div class="work-img">

                                    <img src="<?= !empty($h->gambar)
                                                    ? base_url('uploads/hotel/' . $h->gambar)
                                                    : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                        class="img-fluid w-100"
                                        style="height:230px;object-fit:cover;">

                                </div>

                            </a>


                            <div class="work-content">


                                <h2 class="w-title">
                                    <?= $h->nama_hotel; ?>
                                </h2>


                                <p class="mb-2 text-muted">
                                    <i class="fa fa-map-marker text-danger"></i>
                                    <?= character_limiter($h->alamat, 50); ?>
                                </p>


                                <p class="mb-2 text-primary">

                                    <i class="fa fa-phone"></i>

                                    <?= !empty($h->telepon) ? $h->telepon : '-'; ?>

                                </p>


                                <p class="mb-3 text-success">

                                    <i class="fa fa-envelope"></i>

                                    <?= !empty($h->email) ? $h->email : '-'; ?>

                                </p>



                                <a href="<?= base_url('hotel/detail/' . $h->hotel_id); ?>"
                                    class="btn btn-primary btn-sm">

                                    <i class="fa fa-eye"></i>
                                    Lihat Detail

                                </a>


                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>


        </div>
    </section>




    <!-- Berita -->
    <section id="blog" class="py-5 bg-light">

        <div class="container">


            <div class="row mb-5">

                <div class="col-lg-12 text-center">

                    <div class="title-box">

                        <h3 class="title-a">
                            Berita Terbaru
                        </h3>

                        <p class="subtitle-a">
                            Informasi dan perkembangan wisata terbaru.
                        </p>


                    </div>

                </div>

            </div>




            <div class="row">


                <?php foreach ($berita as $b): ?>


                    <div class="col-lg-4 col-md-6 mb-4">


                        <div class="news-card h-100">


                            <div class="news-image">


                                <img src="<?= !empty($b->gambar)
                                                ? base_url('uploads/berita/' . $b->gambar)
                                                : base_url('assets_frontend/img/no-image.jpg'); ?>"
                                    alt="<?= $b->judul; ?>"
                                    style="height:230px;width:100%;object-fit:cover;">



                                <div class="news-badge">

                                    <i class="fa fa-newspaper-o"></i>

                                    Berita

                                </div>


                            </div>




                            <div class="news-body">


                                <div class="news-date">

                                    <i class="fa fa-calendar"></i>

                                    <?= date('d F Y', strtotime($b->created_at)); ?>

                                </div>



                                <h4 class="news-title">

                                    <?= character_limiter($b->judul, 65); ?>

                                </h4>



                                <p class="news-text">

                                    <?= character_limiter(strip_tags($b->isi), 110); ?>

                                </p>



                                <a href="<?= base_url('berita/detail/' . $b->slug); ?>"
                                    class="news-btn">

                                    Lihat Selengkapnya

                                    <i class="fa fa-arrow-right"></i>

                                </a>


                            </div>


                        </div>


                    </div>


                <?php endforeach; ?>


            </div>


        </div>

    </section>

    <!-- Statistik -->
    <section class="statistik-section">

        <div class="overlay-statistik"></div>

        <div class="container position-relative">


            <div class="row">

                <div class="col-12 text-center mb-5">

                    <h2 class="statistik-title">
                        Statistik Pariwisata
                    </h2>

                    <p class="statistik-subtitle">
                        Informasi lengkap destinasi, hotel dan berita wisata Magelang
                    </p>

                </div>

            </div>



            <div class="row justify-content-center">


                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="stats-card h-100">


                        <div class="stats-icon bg-primary">
                            <i class="fa fa-map-marker"></i>
                        </div>


                        <h2>
                            <?= count($destinasi); ?>
                        </h2>


                        <h4>
                            Destinasi Wisata
                        </h4>


                        <p>
                            Destinasi wisata terbaik Kabupaten Magelang
                        </p>


                    </div>

                </div>



                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="stats-card h-100">


                        <div class="stats-icon bg-success">
                            <i class="fa fa-building"></i>
                        </div>


                        <h2>
                            <?= count($hotel); ?>
                        </h2>


                        <h4>
                            Hotel & Penginapan
                        </h4>


                        <p>
                            Pilihan hotel nyaman untuk wisatawan
                        </p>


                    </div>

                </div>



                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="stats-card h-100">


                        <div class="stats-icon bg-warning">
                            <i class="fa fa-newspaper-o"></i>
                        </div>


                        <h2>
                            <?= count($berita); ?>
                        </h2>


                        <h4>
                            Berita Wisata
                        </h4>


                        <p>
                            Informasi terbaru seputar pariwisata Magelang
                        </p>


                    </div>

                </div>


            </div>


        </div>

    </section>





    <!-- GALERI WISATA -->

    <section id="gallery"
        class="portfolio-mf sect-pt4 route gallery-section">


        <div class="container">


            <div class="row mb-5">

                <div class="col-lg-12 text-center">

                    <div class="title-box">


                        <span class="gallery-label">
                            Explore Magelang
                        </span>


                        <h3 class="title-a">
                            Galeri Wisata
                        </h3>


                        <p class="subtitle-a">
                            Dokumentasi keindahan destinasi wisata Kabupaten Magelang.
                        </p>


                    </div>

                </div>

            </div>




            <div class="row">


                <?php if (!empty($galeri)): ?>


                    <?php foreach ($galeri as $g): ?>


                        <div class="col-lg-3 col-md-6 mb-4">


                            <div class="gallery-card h-100">


                                <a href="<?= base_url('uploads/galeri/' . $g->foto); ?>"
                                    data-lightbox="gallery"
                                    data-title="<?= $g->judul_foto; ?>">


                                    <div class="gallery-image">


                                        <img src="<?= base_url('uploads/galeri/' . $g->foto); ?>"
                                            class="img-fluid w-100"
                                            alt="<?= $g->judul_foto; ?>"
                                            style="height:230px;object-fit:cover;">



                                        <span class="gallery-badge">
                                            <?= $g->kategori_nama; ?>
                                        </span>



                                        <div class="gallery-overlay">


                                            <div class="overlay-content">


                                                <i class="fa fa-search-plus"></i>


                                                <h5>
                                                    <?= character_limiter($g->judul_foto, 35); ?>
                                                </h5>


                                                <p>
                                                    <i class="fa fa-map-marker"></i>
                                                    <?= $g->destinasi_nama; ?>
                                                </p>


                                            </div>


                                        </div>


                                    </div>


                                </a>


                            </div>


                        </div>


                    <?php endforeach; ?>


                <?php else: ?>


                    <div class="col-12">

                        <div class="alert alert-info text-center">

                            Belum ada galeri wisata.

                        </div>

                    </div>


                <?php endif; ?>


            </div>


        </div>


    </section>






    <!-- CTA GALERI -->

    <section class="gallery-cta-section">

        <div class="container">


            <div class="gallery-cta">


                <div class="row align-items-center">



                    <div class="col-lg-2 text-center">


                        <div class="gallery-icon">

                            <i class="fa fa-images"></i>

                        </div>


                    </div>




                    <div class="col-lg-7">


                        <span class="gallery-subtitle">
                            GALERI WISATA
                        </span>


                        <h3>
                            Jelajahi Keindahan Wisata Kabupaten Magelang
                        </h3>


                        <p>
                            Temukan berbagai koleksi foto destinasi wisata,
                            panorama alam, budaya, sejarah dan berbagai
                            momen terbaik wisata Magelang.
                        </p>


                    </div>




                    <div class="col-lg-3 text-center">


                        <a href="<?= base_url('galeri/semua'); ?>"
                            class="btn-gallery">


                            Jelajahi Semua


                            <i class="fa fa-arrow-right ml-2"></i>


                        </a>


                    </div>



                </div>


            </div>


        </div>


    </section>



    <!-- ===========================
    KONTAK
    =========================== -->

    <section id="contact"
        class="paralax-mf footer-paralax bg-image route"
        style="background-image:url('<?= base_url('assets_frontend/img/overlay-bg.jpg'); ?>')">


        <div class="overlay-mf"></div>


        <div class="container">


            <div class="row">


                <div class="col-sm-12">


                    <div class="contact-mf">


                        <div class="box-shadow-full">


                            <div class="title-box-2">

                                <h5 class="title-left">
                                    Hubungi Kami
                                </h5>

                            </div>



                            <form action="<?= base_url('home/kirim_pesan'); ?>"
                                method="post">


                                <div class="row">


                                    <div class="col-md-12 mb-3">

                                        <input type="text"
                                            name="nama"
                                            class="form-control"
                                            placeholder="Nama"
                                            required>

                                    </div>



                                    <div class="col-md-12 mb-3">

                                        <input type="email"
                                            name="email"
                                            class="form-control"
                                            placeholder="Email"
                                            required>

                                    </div>



                                    <div class="col-md-12 mb-3">

                                        <input type="text"
                                            name="subjek"
                                            class="form-control"
                                            placeholder="Subjek">

                                    </div>



                                    <div class="col-md-12 mb-3">

                                        <textarea name="pesan"
                                            rows="5"
                                            class="form-control"
                                            placeholder="Pesan"
                                            required></textarea>

                                    </div>



                                    <div class="col-md-12 text-center">

                                        <button type="submit"
                                            class="button button-a button-big button-rouded btn-kirim">


                                            <i class="fa fa-paper-plane mr-2"></i>

                                            Kirim Pesan


                                        </button>


                                    </div>


                                </div>


                            </form>


                        </div>


                    </div>


                </div>


            </div>


        </div>


    </section>


</main>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        const elements = document.querySelectorAll(
            '.work-box,.service-box,.news-card,.gallery-card'
        );


        const observer = new IntersectionObserver(entries => {


            entries.forEach(entry => {


                if (entry.isIntersecting) {

                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";

                }


            });


        });



        elements.forEach(el => {


            el.style.opacity = "0";
            el.style.transform = "translateY(40px)";
            el.style.transition = "all .8s ease";


            observer.observe(el);


        });


    });
</script>