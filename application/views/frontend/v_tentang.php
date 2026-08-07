<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- =========================================================
     HERO / BANNER TENTANG
========================================================= -->
<section class="tentang-hero"
    style="background-image: url('<?= base_url('assets_frontend/img/hero-wisata.jpg'); ?>');">

    <div class="tentang-hero-overlay"></div>

    <div class="container tentang-hero-content">

        <h1>Tentang Kami</h1>

        <p>
            Mengenal lebih dekat DOLAN MAGELANG sebagai media informasi
            wisata Kabupaten Magelang.
        </p>

        <div class="tentang-breadcrumb">
            <a href="<?= base_url(); ?>">
                <i class="fa fa-home"></i> Home
            </a>

            <span>/</span>

            <span>Tentang Kami</span>
        </div>

    </div>

</section>


<!-- =========================================================
     TENTANG DOLAN MAGELANG
========================================================= -->
<section class="tentang-section">

    <div class="container">

        <?php if (!empty($tentang)): ?>

            <div class="row align-items-center">

                <!-- GAMBAR -->
                <div class="col-lg-6 mb-4 mb-lg-0">

                    <div class="tentang-image">

                        <?php if (!empty($tentang->gambar)): ?>

                            <img src="<?= base_url('uploads/tentang/' . $tentang->gambar); ?>"
                                alt="<?= html_escape($tentang->judul); ?>"
                                class="img-fluid">

                        <?php else: ?>

                            <img src="<?= base_url('assets_frontend/img/hero-wisata.jpg'); ?>"
                                alt="Dolan Magelang"
                                class="img-fluid">

                        <?php endif; ?>

                        <div class="image-badge">

                            <i class="fa fa-map-marker"></i>

                            Kabupaten Magelang

                        </div>

                    </div>

                </div>


                <!-- DESKRIPSI -->
                <div class="col-lg-6">

                    <div class="tentang-content">

                        <span class="section-label">
                            TENTANG KAMI
                        </span>

                        <h2>
                            <?= html_escape($tentang->judul); ?>
                        </h2>

                        <div class="title-line"></div>

                        <div class="tentang-description">

                            <?= $tentang->deskripsi; ?>

                        </div>


                        <!-- KEUNGGULAN SINGKAT -->
                        <div class="row mt-4">

                            <div class="col-sm-6 mb-3">

                                <div class="about-feature">

                                    <div class="about-feature-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>

                                    <div>
                                        <h6>Destinasi Wisata</h6>
                                        <p>Informasi wisata Kabupaten Magelang.</p>
                                    </div>

                                </div>

                            </div>


                            <div class="col-sm-6 mb-3">

                                <div class="about-feature">

                                    <div class="about-feature-icon">
                                        <i class="fa fa-info-circle"></i>
                                    </div>

                                    <div>
                                        <h6>Informasi Lengkap</h6>
                                        <p>Informasi wisata mudah ditemukan.</p>
                                    </div>

                                </div>

                            </div>


                            <div class="col-sm-6 mb-3">

                                <div class="about-feature">

                                    <div class="about-feature-icon">
                                        <i class="fa fa-map"></i>
                                    </div>

                                    <div>
                                        <h6>Lokasi Wisata</h6>
                                        <p>Mempermudah menemukan lokasi destinasi.</p>
                                    </div>

                                </div>

                            </div>


                            <div class="col-sm-6 mb-3">

                                <div class="about-feature">

                                    <div class="about-feature-icon">
                                        <i class="fa fa-picture-o"></i>
                                    </div>

                                    <div>
                                        <h6>Galeri Wisata</h6>
                                        <p>Jelajahi keindahan wisata Magelang.</p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        <?php else: ?>

            <div class="alert alert-info text-center">
                Data Tentang Kami belum tersedia.
            </div>

        <?php endif; ?>

    </div>

</section>


<!-- =========================================================
     VISI MISI
========================================================= -->
<?php if (!empty($tentang)): ?>

    <section class="visi-misi-section">

        <div class="container">

            <div class="text-center section-heading">

                <span class="section-label">
                    TUJUAN KAMI
                </span>

                <h2>Visi & Misi</h2>

                <p>
                    Komitmen kami dalam memberikan informasi pariwisata
                    Kabupaten Magelang.
                </p>

            </div>


            <div class="row">

                <!-- VISI -->
                <div class="col-lg-6 mb-4">

                    <div class="vm-card">

                        <div class="vm-icon">
                            <i class="fa fa-eye"></i>
                        </div>

                        <div class="vm-content">

                            <h3>Visi</h3>

                            <div class="vm-text">
                                <?= !empty($tentang->visi)
                                    ? $tentang->visi
                                    : 'Visi belum tersedia.'; ?>
                            </div>

                        </div>

                    </div>

                </div>


                <!-- MISI -->
                <div class="col-lg-6 mb-4">

                    <div class="vm-card">

                        <div class="vm-icon">
                            <i class="fa fa-bullseye"></i>
                        </div>

                        <div class="vm-content">

                            <h3>Misi</h3>

                            <div class="vm-text">

                                <?= !empty($tentang->misi)
                                    ? nl2br($tentang->misi)
                                    : 'Misi belum tersedia.'; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

<?php endif; ?>


<!-- =========================================================
     MENGAPA DOLAN MAGELANG
========================================================= -->
<section class="keunggulan-section">

    <div class="container">

        <div class="text-center section-heading">

            <span class="section-label">
                DOLAN MAGELANG
            </span>

            <h2>Mengapa Menggunakan Website Ini?</h2>

            <p>
                Temukan berbagai informasi yang dapat membantu
                perjalanan wisata Anda di Kabupaten Magelang.
            </p>

        </div>


        <div class="row">

            <!-- ITEM -->
            <div class="col-lg-3 col-md-6 mb-4">

                <div class="keunggulan-card">

                    <div class="keunggulan-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>

                    <h4>Destinasi Wisata</h4>

                    <p>
                        Temukan berbagai pilihan destinasi wisata
                        menarik di Kabupaten Magelang.
                    </p>

                </div>

            </div>


            <!-- ITEM -->
            <div class="col-lg-3 col-md-6 mb-4">

                <div class="keunggulan-card">

                    <div class="keunggulan-icon">
                        <i class="fa fa-building"></i>
                    </div>

                    <h4>Hotel & Penginapan</h4>

                    <p>
                        Temukan informasi hotel dan penginapan
                        untuk mendukung perjalanan wisata Anda.
                    </p>

                </div>

            </div>


            <!-- ITEM -->
            <div class="col-lg-3 col-md-6 mb-4">

                <div class="keunggulan-card">

                    <div class="keunggulan-icon">
                        <i class="fa fa-camera"></i>
                    </div>

                    <h4>Galeri Wisata</h4>

                    <p>
                        Lihat berbagai dokumentasi dan keindahan
                        destinasi wisata Kabupaten Magelang.
                    </p>

                </div>

            </div>


            <!-- ITEM -->
            <div class="col-lg-3 col-md-6 mb-4">

                <div class="keunggulan-card">

                    <div class="keunggulan-icon">
                        <i class="fa fa-newspaper-o"></i>
                    </div>

                    <h4>Informasi Terbaru</h4>

                    <p>
                        Dapatkan berita dan informasi terbaru
                        mengenai pariwisata Kabupaten Magelang.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     CTA
========================================================= -->
<section class="tentang-cta"
    style="background-image: url('<?= base_url('assets_frontend/img/overlay-bg.jpg'); ?>');">

    <div class="tentang-cta-overlay"></div>

    <div class="container position-relative">

        <div class="row justify-content-center">

            <div class="col-lg-8 text-center">

                <span class="cta-label">
                    JELAJAHI MAGELANG
                </span>

                <h2>
                    Siap Menjelajahi Keindahan Magelang?
                </h2>

                <p>
                    Temukan berbagai destinasi wisata menarik dan
                    rencanakan perjalanan Anda bersama DOLAN MAGELANG.
                </p>

                <a href="<?= base_url('home/destinasi_selengkapnya'); ?>"
                    class="btn-jelajahi">

                    <i class="fa fa-compass"></i>

                    Jelajahi Destinasi

                </a>

                <a href="<?= base_url(); ?>"
                    class="btn-kembali">

                    <i class="fa fa-home"></i>

                    Kembali ke Home

                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     CSS HALAMAN TENTANG
========================================================= -->
<style>
    /* =====================================================
   HERO
===================================================== */

    .tentang-hero {
        min-height: 430px;
        position: relative;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        text-align: center;
        color: #fff;
    }

    .tentang-hero-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, .58);
    }

    .tentang-hero-content {
        position: relative;
        z-index: 2;
    }

    .tentang-hero h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .tentang-hero p {
        max-width: 700px;
        margin: 0 auto 20px;
        font-size: 18px;
        line-height: 1.8;
    }

    .tentang-breadcrumb {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .tentang-breadcrumb a {
        color: #fff;
    }

    .tentang-breadcrumb a:hover {
        text-decoration: none;
        opacity: .8;
    }


    /* =====================================================
   TENTANG
===================================================== */

    .tentang-section {
        padding: 90px 0;
        background: #fff;
    }

    .tentang-image {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, .12);
    }

    .tentang-image img {
        width: 100%;
        height: 480px;
        object-fit: cover;
        transition: .5s;
    }

    .tentang-image:hover img {
        transform: scale(1.05);
    }

    .image-badge {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: #0078ff;
        color: #fff;
        padding: 10px 18px;
        border-radius: 30px;
        font-size: 14px;
    }

    .section-label {
        display: inline-block;
        color: #0078ff;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .tentang-content h2 {
        font-size: 36px;
        font-weight: 700;
        color: #1e1e1e;
    }

    .title-line {
        width: 70px;
        height: 4px;
        background: #0078ff;
        margin: 20px 0 25px;
    }

    .tentang-description {
        color: #666;
        font-size: 16px;
        line-height: 1.9;
    }

    .about-feature {
        display: flex;
        gap: 13px;
    }

    .about-feature-icon {
        width: 45px;
        height: 45px;
        min-width: 45px;
        border-radius: 50%;
        background: #e8f3ff;
        color: #0078ff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
    }

    .about-feature h6 {
        margin-bottom: 4px;
        font-weight: 600;
    }

    .about-feature p {
        margin: 0;
        color: #777;
        font-size: 13px;
    }


    /* =====================================================
   VISI MISI
===================================================== */

    .visi-misi-section {
        padding: 90px 0;
        background: #f7f9fc;
    }

    .section-heading {
        max-width: 700px;
        margin: 0 auto 50px;
    }

    .section-heading h2 {
        font-weight: 700;
        font-size: 36px;
        margin-bottom: 15px;
    }

    .section-heading p {
        color: #777;
    }

    .vm-card {
        height: 100%;
        background: #fff;
        padding: 35px;
        border-radius: 15px;
        display: flex;
        gap: 25px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, .07);
        transition: .3s;
    }

    .vm-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, .12);
    }

    .vm-icon {
        width: 70px;
        height: 70px;
        min-width: 70px;
        border-radius: 50%;
        background: #0078ff;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
    }

    .vm-content h3 {
        font-weight: 700;
        margin-bottom: 15px;
    }

    .vm-text {
        color: #666;
        line-height: 1.8;
    }


    /* =====================================================
   KEUNGGULAN
===================================================== */

    .keunggulan-section {
        padding: 90px 0;
        background: #fff;
    }

    .keunggulan-card {
        height: 100%;
        text-align: center;
        padding: 35px 25px;
        border-radius: 15px;
        background: #fff;
        border: 1px solid #eee;
        transition: .3s;
    }

    .keunggulan-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, .10);
        border-color: transparent;
    }

    .keunggulan-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 25px;
        border-radius: 50%;
        background: #e8f3ff;
        color: #0078ff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
        transition: .3s;
    }

    .keunggulan-card:hover .keunggulan-icon {
        background: #0078ff;
        color: #fff;
    }

    .keunggulan-card h4 {
        font-size: 19px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .keunggulan-card p {
        color: #777;
        line-height: 1.7;
        font-size: 14px;
    }


    /* =====================================================
   CTA
===================================================== */

    .tentang-cta {
        position: relative;
        padding: 100px 0;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: #fff;
    }

    .tentang-cta-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 120, 255, .82);
    }

    .cta-label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        margin-bottom: 15px;
    }

    .tentang-cta h2 {
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .tentang-cta p {
        font-size: 17px;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .btn-jelajahi,
    .btn-kembali {
        display: inline-block;
        padding: 13px 25px;
        border-radius: 30px;
        margin: 5px;
        transition: .3s;
    }

    .btn-jelajahi {
        background: #fff;
        color: #0078ff;
    }

    .btn-kembali {
        border: 2px solid #fff;
        color: #fff;
    }

    .btn-jelajahi:hover {
        background: #1e1e1e;
        color: #fff;
        text-decoration: none;
    }

    .btn-kembali:hover {
        background: #fff;
        color: #0078ff;
        text-decoration: none;
    }


    /* =====================================================
   RESPONSIVE
===================================================== */

    @media (max-width: 768px) {

        .tentang-hero {
            min-height: 350px;
        }

        .tentang-hero h1 {
            font-size: 36px;
        }

        .tentang-image img {
            height: 350px;
        }

        .tentang-content h2,
        .section-heading h2 {
            font-size: 29px;
        }

        .vm-card {
            display: block;
        }

        .vm-icon {
            margin-bottom: 20px;
        }

        .tentang-cta h2 {
            font-size: 30px;
        }
    }
</style>


<!-- =========================================================
     ANIMASI
========================================================= -->
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const elements = document.querySelectorAll(
            '.tentang-image, .tentang-content, .vm-card, .keunggulan-card'
        );

        const observer = new IntersectionObserver(function(entries) {

            entries.forEach(function(entry) {

                if (entry.isIntersecting) {

                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";

                    observer.unobserve(entry.target);
                }

            });

        }, {
            threshold: 0.1
        });


        elements.forEach(function(el) {

            el.style.opacity = "0";
            el.style.transform = "translateY(35px)";
            el.style.transition = "opacity .7s ease, transform .7s ease";

            observer.observe(el);

        });

    });
</script>