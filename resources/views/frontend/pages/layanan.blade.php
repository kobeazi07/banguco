@extends('frontend.layouts.index')

@section('konten')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="hero-bgg">
                <img src="{{ asset('frontend/assets/img/layanan.webp') }}" alt="">
            </div>
            <div class="container text-center">
                <div class="row">

                    {{-- <p data-aos="fade-up" data-aos-delay="100">Quickly start your project now and set the stage for
                        success<br></p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="#about" class="btn-get-started">Get Started</a>
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>
                    <img src="{{ asset('frontend/assets/img/hero-services-img.webp') }}" class="img-fluid hero-img"
                        alt="" data-aos="zoom-out" data-aos-delay="300"> --}}
                </div>
                <div class="row p-3 ">
                    <div class="col-md-5 bg-hijau-2 ">
                        <p class = "text-left mt-5 text-light fw-bold" data-aos="fade-up" data-aos-delay="100">Bang UCO
                            Layanan & Proses Koleksi Kami</p>
                    </div>
                    <div class="col-md-7">

                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->
        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6">
                        <h2 class="hijau fw-bold mb-0">
                            Jual minyak jelantah, dapatkan cuan, dan ikut jaga lingkungan.
                        </h2>

                        <div class="row">

                        </div>
                        <div class="row">

                        </div>
                    </div>
                    <div class="col-lg-6">

                        <p class="text-justify mt-2">
                            Dari dapur hingga menjadi komoditas bernilai, Bang UCO menghubungkan minyak jelantah dengan
                            pasar yang lebih luas. Kami membeli minyak jelantah dari rumah tangga, UMKM, restoran, hotel,
                            mal, hingga pabrik, kemudian mengelolanya melalui proses penyimpanan dan pemrosesan sebelum
                            disalurkan ke pasar industri dan ekspor.

                        </p>
                        <div class="row">

                        </div>
                        <div class="row">

                        </div>
                    </div>
                </div>

            </div>
        </section><!-- /About Section -->

    </main>
@endsection
