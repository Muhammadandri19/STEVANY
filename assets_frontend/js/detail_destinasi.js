$(document).ready(function () {

    /*==================================================
    AOS ANIMATION
    ==================================================*/

    if (typeof AOS !== "undefined") {
        AOS.init({
            duration: 800,
            easing: "ease-in-out",
            once: true,
            offset: 80
        });
    }

    /*==================================================
    HERO PARALLAX
    ==================================================*/

    $(window).on("scroll", function () {

        let scroll = $(window).scrollTop();

        $(".hero-detail").css(
            "background-position",
            "center " + (scroll * 0.35) + "px"
        );

    });

    /*==================================================
    GALERI SWIPER
    ==================================================*/

    if ($(".galeriSwiper").length) {

        new Swiper(".galeriSwiper", {

            loop: true,

            speed: 800,

            spaceBetween: 25,

            grabCursor: true,

            autoplay: {

                delay: 3500,

                disableOnInteraction: false

            },

            navigation: {

                nextEl: ".galeri-next",

                prevEl: ".galeri-prev"

            },

            pagination: {

                el: ".galeri-pagination",

                clickable: true

            },

            breakpoints: {

                0: {

                    slidesPerView: 1

                },

                768: {

                    slidesPerView: 2

                },

                1200: {

                    slidesPerView: 3

                }

            }

        });

    }

    /*==================================================
    FASILITAS SWIPER
    ==================================================*/

    if ($(".fasilitasSwiper").length) {

        new Swiper(".fasilitasSwiper", {

            loop: true,

            speed: 700,

            spaceBetween: 25,

            grabCursor: true,

            autoplay: {

                delay: 4000,

                disableOnInteraction: false

            },

            navigation: {

                nextEl: ".fasilitas-next",

                prevEl: ".fasilitas-prev"

            },

            pagination: {

                el: ".fasilitas-pagination",

                clickable: true

            },

            breakpoints: {

                0: {

                    slidesPerView: 1

                },

                768: {

                    slidesPerView: 2

                },

                1200: {

                    slidesPerView: 3

                }

            }

        });

    }

    /*==================================================
    FANCYBOX
    ==================================================*/

    if (typeof Fancybox !== "undefined") {

        Fancybox.bind("[data-fancybox]", {

            animated: true,

            dragToClose: true,

            Toolbar: {

                display: [

                    "zoom",

                    "slideshow",

                    "fullscreen",

                    "download",

                    "close"

                ]

            }

        });

    }

    /*==================================================
    SCROLL TOP
    ==================================================*/

    $(window).scroll(function () {

        if ($(this).scrollTop() > 350) {

            $("#scrollTop").fadeIn(300);

        } else {

            $("#scrollTop").fadeOut(300);

        }

    });

    $("#scrollTop").click(function (e) {

        e.preventDefault();

        $("html, body").animate({

            scrollTop: 0

        }, 700);

    });

    /*==================================================
    SMOOTH SCROLL
    ==================================================*/

    $('a[href^="#"]').click(function (e) {

        let tujuan = $(this.hash);

        if (tujuan.length) {

            e.preventDefault();

            $("html, body").animate({

                scrollTop: tujuan.offset().top - 80

            }, 700);

        }

    });

    /*==================================================
    STICKY SIDEBAR
    ==================================================*/

    if ($(window).width() > 991) {

        $(".sidebar-wrapper").css({

            position: "sticky",

            top: "100px"

        });

    }

    /*==================================================
    HOVER CARD
    ==================================================*/

    $(".card-modern,.hotel-card,.facility-card,.culinary-card,.oleh-card,.souvenir-card").hover(

        function () {

            $(this).addClass("shadow-lg");

        },

        function () {

            $(this).removeClass("shadow-lg");

        }

    );

    /*==================================================
    COUNTER
    ==================================================*/

    $(".counter").each(function () {

        let $this = $(this);

        let countTo = $this.attr("data-count");

        $({

            countNum: 0

        }).animate({

            countNum: countTo

        }, {

            duration: 2000,

            easing: "swing",

            step: function () {

                $this.text(Math.floor(this.countNum));

            },

            complete: function () {

                $this.text(this.countNum);

            }

        });

    });

    /*==================================================
    NAVBAR SHADOW
    ==================================================*/

    $(window).scroll(function () {

        if ($(this).scrollTop() > 80) {

            $(".navbar").addClass("navbar-shadow");

        } else {

            $(".navbar").removeClass("navbar-shadow");

        }

    });

    /*==================================================
    IMAGE ZOOM
    ==================================================*/

    $(".zoom-image").hover(

        function () {

            $(this).css({

                transform: "scale(1.08)",

                transition: ".5s"

            });

        },

        function () {

            $(this).css({

                transform: "scale(1)"

            });

        }

    );

    /*==================================================
    LOADING EFFECT
    ==================================================*/

    $(window).on("load", function () {

        $(".preloader").fadeOut(500);

    });

});