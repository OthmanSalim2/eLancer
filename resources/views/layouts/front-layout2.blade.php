<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/front/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <script nonce="8b6fbd07-68e4-497b-a3f0-46f8adbe4bd4">
        (function(w, d) {
            ! function(j, k, l, m) {
                j[l] = j[l] || {};
                j[l].executed = [];
                j.zaraz = {
                    deferred: [],
                    listeners: []
                };
                j.zaraz.q = [];
                j.zaraz._f = function(n) {
                    return function() {
                        var o = Array.prototype.slice.call(arguments);
                        j.zaraz.q.push({
                            m: n,
                            a: o
                        })
                    }
                };
                for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                j.zaraz.init = () => {
                    var q = k.getElementsByTagName(m)[0],
                        r = k.createElement(m),
                        s = k.getElementsByTagName("title")[0];
                    s && (j[l].t = k.getElementsByTagName("title")[0].text);
                    j[l].x = Math.random();
                    j[l].w = j.screen.width;
                    j[l].h = j.screen.height;
                    j[l].j = j.innerHeight;
                    j[l].e = j.innerWidth;
                    j[l].l = j.location.href;
                    j[l].r = k.referrer;
                    j[l].k = j.screen.colorDepth;
                    j[l].n = k.characterSet;
                    j[l].o = (new Date).getTimezoneOffset();
                    if (j.dataLayer)
                        for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                ...x[1],
                                ...y[1]
                            })), {}))) zaraz.set(w[0], w[1], {
                            scope: "page"
                        });
                    j[l].q = [];
                    for (; j.zaraz.q.length;) {
                        const z = j.zaraz.q.shift();
                        j[l].q.push(z)
                    }
                    r.defer = !0;
                    for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith(
                        "_zaraz_"))).forEach((B => {
                        try {
                            j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                        } catch {
                            j[l]["z_" + B.slice(7)] = A.getItem(B)
                        }
                    }));
                    r.referrerPolicy = "origin";
                    r.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
                    q.parentNode.insertBefore(r, q)
                };
                ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <header>
        <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <div class="left-content d-flex align-items-center">
                            <div class="logo mr-45">
                                <a href="index.html"><img src="{{ asset('assets/front/img/logo.png.webp') }}" alt></a>
                            </div>

                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="borwse_job.html">Browse Job</a></li>
                                        <li><a href="#">Page</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="candidate.html">Candidates</a></li>
                                                <li><a href="job_details.html">Job Details</a></li>
                                                <li><a href="blog_details.html">Blog Details</a></li>
                                                <li><a href="elements.html">Element</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="buttons">
                            <ul>
                                <li class="button-header">
                                    <a href="#" class="header-btn mr-10"> <i class="fas fa-phone-alt"></i>Post A
                                        Job</a>
                                    <a href="login.html" class="btn header-btn2">Log In</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>

        <div class="slider-area position-relative ">

            <div class="single-sliders slider-height  gray-bg d-flex align-items-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-7">
                            <div class="hero-caption">
                                <span>Easiest way to find a perfect job</span>
                                <h1>Find Your Next Dream Job</h1>

                                <div class="slider-btns">
                                    <a href="#" class="btn hero-btn">Looking For a Job?</a>
                                    <a href="#" class="hero-btn2">Find Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-tittle">
                <h2>jobs</h2>
            </div>

            <div class="hero-img">
                <img src="{{ asset('assets/front/img/hero-img.png.webp') }}" alt>
            </div>

            <div class="hero-shape bounce-animate">
                <img src="{{ asset('assets/front/img/hero-shape.png.webp') }}" alt>
            </div>

            <div class="hero-shape2">
                <img src="{{ asset('assets/front/img/hero-shape2.png.webp') }}" alt>
            </div>
        </div>


        <section class="top-jobs fix ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-12">

                        <div class="section-tittle section-tittle3 text-center mb-10">
                            <span>1000+</span>
                            <h2>Browse From Our Top Jobs</h2>
                            <p>The automated process starts as soon as your clothes go into the machine. The outcome is
                                gleaming clothes. Placeholder text commonly used.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="top-job-slider ">

                    <div class="single-top-jobs ">
                        <div class="services-ion">
                            <img src="{{ asset('assets/front/img/job-iocn1.svg') }}" alt>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Design & creatives</a></h5>
                            <p>The automated process starts as soon as your clothes go into.</p>
                            <a href="#" class="product_btn">Apply Now</a>
                        </div>
                    </div>

                    <div class="single-top-jobs ">
                        <div class="services-ion">
                            <img src="{{ asset('assets/front/img/job-iocn2.svg') }}" alt>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Design & creatives</a></h5>
                            <p>The automated process starts as soon as your clothes go into.</p>
                            <a href="#" class="product_btn">Apply Now</a>
                        </div>
                        <div class="stickers">
                            <span>Remote</span>
                        </div>
                    </div>

                    <div class="single-top-jobs ">
                        <div class="services-ion">
                            <img src="{{ asset('assets/front/img/job-iocn3.svg') }}" alt>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Design & creatives</a></h5>
                            <p>The automated process starts as soon as your clothes go into.</p>
                            <a href="#" class="product_btn">Apply Now</a>
                        </div>
                        <div class="stickers">
                            <span>Remote</span>
                        </div>
                    </div>

                    <div class="single-top-jobs ">
                        <div class="services-ion">
                            <img src="{{ asset('assets/front/img/job-iocn4.svg') }}" alt>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Design & creatives</a></h5>
                            <p>The automated process starts as soon as your clothes go into.</p>
                            <a href="#" class="product_btn">Apply Now</a>
                        </div>
                    </div>

                    <div class="single-top-jobs ">
                        <div class="services-ion">
                            <img src="{{ asset('assets/front/img/job-iocn5.svg') }}" alt>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Design & creatives</a></h5>
                            <p>The automated process starts as soon as your clothes go into.</p>
                            <a href="#" class="product_btn">Apply Now</a>
                        </div>
                    </div>

                    <div class="single-top-jobs ">
                        <div class="services-ion">
                            <img src="{{ asset('assets/front/img/job-iocn2.svg') }}" alt>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Design & creatives</a></h5>
                            <p>The automated process starts as soon as your clothes go into.</p>
                            <a href="#" class="product_btn">Apply Now</a>
                        </div>
                        <div class="stickers">
                            <span>Remote</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="about-area gray-bg section-padding2">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-6 col-lg-7 col-md-10">
                        <div class="support-location-img">
                            <img src="{{ asset('assets/front/img/about.png.webp') }}" alt>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-10">
                        <div class="right-caption">

                            <div class="section-tittle section-tittle3">
                                <h2>We Build Lasting Relationships Between Candidates & Businesses</h2>
                            </div>
                            <div class="support-caption">
                                <p class="pera-top">The automated process starts as soon as your clothes
                                    go into the machine. The outcome is gleaming clothes.
                                    Placeholder text commonly used.</p>
                                <p class="mb-45">Automated process starts as soon as your clothes
                                    go into the machine. The outcome is gleaming clothes.
                                    Placeholder text commonly used.</p>
                                <a href="#" class="btn about-btn">Find Talent</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-tittle">
                    <h2>Talents</h2>
                </div>
            </div>
        </section>


        <section class="job-category section-padding">
            <div class="container">

                <div class="row justify-content-center mb-55">
                    <div class="col-xl-8">
                        <div class="section-tittle section-tittle3 text-center">
                            <h2>Browse From Top Categories</h2>
                            <p>The automated process starts as soon as your clothes go into the machine. The outcome is
                                gleaming clothes. Placeholder text commonly used.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/front/img/top-cat1.svg') }}" alt>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Design & creatives</a></h5>
                                <p>The automated process starts as soon as your clothes go into.</p>
                                <a href="#" class="view_btn">Browse Job</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/front/img/top-cat2.svg') }}" alt>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Finance</a></h5>
                                <p>The automated process starts as soon as your clothes go into.</p>
                                <a href="#" class="view_btn">Browse Job</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/front/img/top-cat3.svg') }}" alt>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Marketing</a></h5>
                                <p>The automated process starts as soon as your clothes go into.</p>
                                <a href="#" class="view_btn">Browse Job</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/front/img/top-cat4.svg') }}" alt>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Health/Medical</a></h5>
                                <p>The automated process starts as soon as your clothes go into.</p>
                                <a href="#" class="view_btn">Browse Job</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/front/img/top-cat5.svg') }}" alt>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Corporate</a></h5>
                                <p>The automated process starts as soon as your clothes go into.</p>
                                <a href="#" class="view_btn">Browse Job</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/front/img/top-cat6.svg') }}" alt>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Copywriting</a></h5>
                                <p>The automated process starts as soon as your clothes go into.</p>
                                <a href="#" class="view_btn">Browse Job</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="testimonial-area">
            <div class="container">
                <div class="testimonial-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="h1-testimonial-active dot-style">

                                <div class="single-testimonial position-relative">
                                    <div class="testimonial-caption">
                                        <img src="{{ asset('assets/front/img/quotes-sign.png.webp') }}" alt
                                            class="quotes-sign">
                                        <p>"The automated process starts as soon as your clothe go into the machine.
                                            This site outcome is gleaming clothe. Placeholder text commonly used. In
                                            publishing and graphic.</p>
                                    </div>

                                    <div class="testimonial-founder d-flex align-items-center">
                                        <div class="founder-img">
                                            <img src="{{ asset('assets/front/img/testimonial.png.webp') }}" alt>
                                        </div>
                                        <div class="founder-text">
                                            <span>Robart Brown</span>
                                            <p>Creative designer at Colorlib</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-testimonial position-relative">
                                    <div class="testimonial-caption">
                                        <img src="{{ asset('assets/front/img/quotes-sign.png.webp') }}" alt
                                            class="quotes-sign">
                                        <p>"The automated process starts as soon as your clothe go into the machine.
                                            This site outcome is gleaming clothe. Placeholder text commonly used. In
                                            publishing and graphic.</p>
                                    </div>

                                    <div class="testimonial-founder d-flex align-items-center">
                                        <div class="founder-img">
                                            <img src="{{ asset('assets/front/img/testimonial.png.webp') }}" alt>
                                        </div>
                                        <div class="founder-text">
                                            <span>Robart Brown</span>
                                            <p>Creative designer at Colorlib</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-testimonial position-relative">
                                    <div class="testimonial-caption">
                                        <img src="{{ asset('assets/front/img/quotes-sign.png.webp') }}" alt
                                            class="quotes-sign">
                                        <p>"The automated process starts as soon as your clothe go into the machine.
                                            This site outcome is gleaming clothe. Placeholder text commonly used. In
                                            publishing and graphic.</p>
                                    </div>

                                    <div class="testimonial-founder d-flex align-items-center">
                                        <div class="founder-img">
                                            <img src="{{ asset('assets/front/img/testimonial.png.webp') }}" alt>
                                        </div>
                                        <div class="founder-text">
                                            <span>Robart Brown</span>
                                            <p>Creative designer at Colorlib</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="t-shape">
                        <img src="{{ asset('assets/front/img/testimonial-shape.png.webp') }}" alt>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer>
        <div class="footer-area footer-padding gray-bg">
            <div class="footer-wrapper ">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">

                                    <div class="footer-logo mb-25">
                                        <a href="index.html"><img
                                                src="{{ asset('assets/front/img/logo2_footer.png.webp') }}" alt></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>The automated process starts as soon as your clothes go into the
                                                machine.The outcome is gleaming clothes.</p>
                                        </div>
                                    </div>
                                    <div class="footer-social">
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Useful links</h4>
                                    <ul>
                                        <li><a href="#">Design & creatives</a></li>
                                        <li><a href="#">Telecommunication</a></li>
                                        <li><a href="#">Restaurant</a></li>
                                        <li><a href="#">Programing</a></li>
                                        <li><a href="#">Architecture</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Subscribe Newsletter</h4>
                                    <p>Subscribe newsletter to get updates about new jobs.</p>
                                </div>

                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part"
                                            novalidate="true">
                                            <input type="email" name="EMAIL" id="newsletter-form-email"
                                                placeholder="  Enter your email">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm">
                                                    Subscribe
                                                </button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom-area">
                    <div class="container">
                        <div class="footer-border">
                            <div class="row d-flex align-items-center">
                                <div class="col-xl-12 ">
                                    <div class="footer-copy-right text-center">
                                        <p>Copyright &copy;
                                            <script>
                                                document.write(new Date().getFullYear());
                                            </script> All rights reserved | This template is made with
                                            <i class="fa fa-heart color-danger" aria-hidden="true"></i> by <a
                                                href="https://colorlib.com" target="_blank"
                                                rel="nofollow noopener">Colorlib</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>


    <script src="{{ asset('assets/front/js/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/range.js') }}"></script>

    <script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('assets/front/js/contact.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('assets/front/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/front/js/main.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
        integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
        data-cf-beacon='{"rayId":"7ec4283ccc80cd55","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>
