@extends('frontend.layouts.index')

@section('konten')
    <main class="main">
        <section>
            <div class="container mt-5">
                <div class="row">
                    <h1 class = "fw-bold text-left" data-aos="fade-up"><span class="hijau"> Kisah di balik nama Bang
                            Uco</span>
                    </h1>
                </div>
                <div class="row">
                    <h4 class = "text-left " data-aos="fade-up" data-aos-delay="100">Bang UCO hadir untuk mengubah
                        minyak
                        jelantah menjadi nilai dan manfaat bagi lingkungan.</h4>
                </div>
            </div>
        </section>
        <div class="container text-center ">
            <img src="{{ asset('frontend/assets/img/about.webp') }}" class="abouth  rouded-3" alt="">
        </div>
        <!-- Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6">
                        <h2 class="hijau fw-bold mb-0">
                            Visi
                        </h2>
                        <p class="text-justify mt-2">
                            Bang UCO hadir untuk mengubah minyak jelantah menjadi nilai dan manfaat bagi lingkungan.
                            Dengan layanan pengumpulan dan pengolahan minyak jelantah yang profesional, kami
                            berkomitmen untuk memberikan solusi yang ramah lingkungan bagi masyarakat Pontianak.
                        </p>
                        <div class="row">

                        </div>
                        <div class="row">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="hijau fw-bold mb-0">
                            Misi
                        </h2>
                        <p class="text-justify mt-2">
                            Bang UCO hadir untuk mengubah minyak jelantah menjadi nilai dan manfaat bagi lingkungan.
                            Dengan layanan pengumpulan dan pengolahan minyak jelantah yang profesional, kami
                            berkomitmen untuk memberikan solusi yang ramah lingkungan bagi masyarakat Pontianak.
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
