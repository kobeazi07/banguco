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
                        <p class = "text-left mt-5 text-light fw-bold" data-aos="fade-up" data-aos-delay="100">Artikel</p>
                    </div>
                    <div class="col-md-7">

                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->
        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container mt-5">

                <div class="row d-flex ">
                    <h2 class="fw-bold hijau-1 ">{{ $blog->judul }}</h2>
                </div>
                <div class="row d-flex mt-5 mb-3 justify-content-center">
                    <img src="{{ asset($blog->foto) }}" class="thumbnail rounded-image img-fluid w-100 h-35" alt="Image"
                        style="object-fit: cover; ">
                </div>
                <div class="row mt-3">
                    {{-- <h5 class="fw-bold abu ">TAG: <span> BIM, Borneo, Kalimantan Barat</span></h5> --}}
                    {!! str_replace('&nbsp;', ' ', $blog->deskripsi) !!}
                </div>

            </div>
        </section><!-- /About Section -->

    </main>
@endsection
