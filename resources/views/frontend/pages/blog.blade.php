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

            <div class="container">

                <div class="row gy-4">
                    @foreach ($blog as $blog)
                        <div class="col-lg-3 mb-3 me-3">
                            <div class="card " style="width: 18rem;">
                                <img src="{{ $blog->foto }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="blog-description-2-line">
                                        <h5 class="card-title"> {!! str_replace('&nbsp;', ' ', $blog->judul) !!}</h5>
                                    </div>
                                    <div class="blog-description-2-line">
                                        <p class="card-text"> {!! str_replace('&nbsp;', ' ', $blog->deskripsi) !!}</p>
                                    </div>
                                    <a href="{{ route('HalamanDBlog', ['blog' => $blog->slug]) }}"
                                        class="btn bg-hijau text-white w-100 mt-2">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- /About Section -->

    </main>
@endsection
