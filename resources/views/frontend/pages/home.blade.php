@extends('frontend.layouts.index')

@section('konten')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="hero-bg">
                <img src="{{ asset('frontend/assets/img/hero-bg-light.webp') }}" alt="">
            </div>
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class = "text-left" data-aos="fade-up"><span class="hijau">Minyak </span> Anda Kami <span
                                class="biru">Ubah</span> Menjadi
                            <span class="hijau">Bernilai</span>
                        </h1>
                    </div>
                    <div class="col-md-4">

                    </div>
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
                <div class="row">
                    <div class="col-md-5 ">
                        <p class = "text-left mt-5" data-aos="fade-up" data-aos-delay="100">Bang UCO hadir untuk mengubah
                            minyak
                            jelantah menjadi nilai dan manfaat bagi lingkungan.</p>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <img src="{{ asset('frontend/assets/img/stepheader/1.png') }}" style="width: 85%;"
                                        class="" alt="" data-aos="zoom-out" data-aos-delay="300">
                                </div>
                                <div class="row">
                                    <h4 class = "text-left mt-3 hijau fw-bold" data-aos="fade-up" data-aos-delay="100">
                                        Pendaftaran</h4>
                                </div>
                                <div class="row">
                                    <h6 class = "text-left hitam " data-aos="fade-up" data-aos-delay="30">
                                        Lakukan pendaftaran dengan cepat dan Mudah
                                    </h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <img src="{{ asset('frontend/assets/img/stepheader/2.png') }}" style="width: 85%;"
                                        class="" alt="" data-aos="zoom-out" data-aos-delay="300">
                                </div>
                                <div class="row">
                                    <h4 class = "text-left mt-3 hijau fw-bold" data-aos="fade-up" data-aos-delay="100">
                                        Berikan ke Petugas</h4>
                                </div>
                                <div class="row">
                                    <h6 class = "text-left hitam " data-aos="fade-up" data-aos-delay="30">
                                        Berikan kepada petugas sesuai ketersediaan stok Anda
                                    </h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <img src="{{ asset('frontend/assets/img/stepheader/3.png') }}" style="width: 85%;"
                                        class="" alt="" data-aos="zoom-out" data-aos-delay="300">
                                </div>
                                <div class="row">
                                    <h4 class = "text-left mt-3 hijau fw-bold" data-aos="fade-up" data-aos-delay="100">
                                        Pembayaran</h4>
                                </div>
                                <div class="row">
                                    <h6 class = "text-left hitam " data-aos="fade-up" data-aos-delay="30">
                                        Minyak Goreng Bekas Anda, Kami Bayar!
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->
        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-5 content" data-aos="fade-up" data-aos-delay="100">
                        <div class="row">
                            <div class="d-flex align-items-center gap-2">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                        fill="currentColor" class="bi bi-calculator-fill hijau" viewBox="0 0 16 16">
                                        <path
                                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5m0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0-.5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5z" />
                                    </svg>
                                </div>

                                <div>
                                    <h3 class="hitam fw-bold mb-0">
                                        Kalkulator Harga <span class="biru">Minyak Jelantah</span>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <p class="fw-bold mt-4">
                            Hitung Potensi Pendapat Anda
                        </p>
                        <div class="row mt-4">
                            <div class="form-group">
                                <label class ="hijau" for="exampleFormControlInput1">Jumlah Jelantah (Liter)</label>
                                <input type="number" class="form-control bd-hijau" name="jumlah_jelantah"
                                    id="jumlah_jelantah" placeholder="Masukkan jumlah jelantah" min="0">
                            </div>
                        </div>
                        <div class="row bg-biru border-0 rounded-3 mt-4 p-5">
                            <h4 class="text-white fw-bold">Estimasi Penghasilan</h4>

                            <h1 class="text-white fw-bold" id="hasil">
                                Rp0
                            </h1>
                        </div>

                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <img src="{{ asset('frontend/assets/img/about-company-1.webp') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="row gy-4">
                                    <div class="col-lg-12">
                                        <img src="{{ asset('frontend/assets/img/about-company-2.webp') }}"
                                            class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-12">
                                        <img src="{{ asset('frontend/assets/img/about-company-3.webp') }}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- /About Section -->


        <!-- Features Details Section -->
        <section id="features-details" class="features-details section">

            <div class="container">

                <div class="row gy-4 justify-content-between features-item">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('frontend/assets/img/features-1.webp') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>Dari Jelantah, Untuk Masa Depan.</h3>
                            <p>
                                Bersama Bang UCO, ubah minyak jelantah menjadi manfaat bagi bumi dan masa depan.
                            </p>
                            <a href="{{ Route('HalamanAbout') }}" class="btn more-btn bg-biru">Tentang Kami</a>
                        </div>
                    </div>

                </div><!-- Features Item -->



            </div>

        </section><!-- /Features Details Section -->

        <!-- Services Section -->
        <section id="services" class="services section ">


            <div class="container">

                <div class="row gy-4 g-5 justify-content-between features-item  ">

                    <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1 " data-aos="fade-up"
                        data-aos-delay="100">

                        <div class="content bg-biru-2 p-4 rounded-3">
                            <h3 class="fw-bold  ">Dampak yang Kita Ciptakan</h3>
                            <p class=" abu">
                                Minyak jelantah yang Anda kumpulkan bukan sekadar minyak bekas. Setiap liter yang terkumpul
                                membantu mengurangi potensi pembuangan minyak secara sembarangan dan memberi nilai baru pada
                                sesuatu yang sebelumnya dianggap tidak berguna
                            </p>

                            <a href="{{ Route('HalamanLayanan') }}" class="btn more-btn bg-hijau text-white">Learn
                                More</a>
                        </div>

                    </div>

                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('frontend/assets/img/features-2.webp') }}" class="img-fluid rounded-4 "
                            alt="">
                    </div>

                </div><!-- Features Item -->

            </div>

        </section><!-- /Services Section -->

        <!-- More Features Section -->
        <section id="more-features" class="more-features section">

            <div class="container bg-light p-5">

                <div class="row justify-content-around gy-4 p-5">
                    <div class="content ">
                        <div class="row">
                            <h1 class="text-center fw-bold"> <span class="hijau">Area</span> Layanan <span
                                    class="biru">Kami</span></h1>
                        </div>
                        <div class="row mt-3">
                            <p class="text-center fw-bold hitam">
                                Kami Melayani di Provinsi Kalimantan Barat
                            </p>
                        </div>
                        <div class="row justify-content-center mt-3 ">
                            <div class="col-lg-3 mt-2 mb-1">
                                <div class="card text-center border-0 bg-white-2 p-3 shadow">
                                    <div class="card-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="20%"
                                            fill="currentColor" class="bi bi-geo-alt-fill" color="#0c7c6c"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                        </svg>
                                        <h5 class="card-title fw-bold hijau fw-bold mt-4">Pontianak</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt-2 mb-1">
                                <div class="card text-center border-0 bg-white-2 p-3 shadow">
                                    <div class="card-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="20%"
                                            fill="currentColor" class="bi bi-geo-alt-fill" color="#0c7c6c"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                        </svg>
                                        <h5 class="card-title fw-bold hijau fw-bold mt-4">Kubu Raya</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /More Features Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 class="fw-bold">Masih Bingung?<span class="hijau"> Yuk, Cari Tahu</span></h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                        <div class="faq-container">

                            @foreach ($faqs as $faq)
                                <div class="faq-item {{ $loop->first ? 'faq-active' : '' }}">

                                    <h3>{{ $faq->judul }}</h3>

                                    <div class="faq-content">
                                        <p>{{ $faq->deskripsi }}</p>
                                    </div>

                                    <i class="faq-toggle bi bi-chevron-right"></i>

                                </div>
                                <!-- End Faq item -->
                            @endforeach

                        </div>

                    </div>
                    <!-- End Faq Column -->

                </div>

            </div>

        </section><!-- /Faq Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section mb-5">

            <!-- Section Title -->
            <div class="container section-title light-background p-5" data-aos="fade-up">
                <div class="row justify-content-center">
                    <h1 class="text-center fw-bold "> <span class="hijau">Mari</span><span
                            class="biru">Bergabung!</span></h1>
                </div>
                <div class="row mt-3 pl-5 pr-5 justify-content-center">
                    <p class="text-center fw-bold w-50 hitam ">
                        Semakin cepat bergabung, semakin cepat cuan mengalir, semakin sehat makanan Anda, dan semakin
                        banyak air bersih yang kita selamatkan bersama!
                    </p>
                </div>
                <div class="row mt-4 pl-5 pr-5">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <a href="https://wa.me/{{ preg_replace('/^0/', '62', $setting->nowa) }}"
                            class="btn more-btn bg-hijau text-white d-inline-flex align-items-center gap-2"
                            target="_blank" rel="noopener noreferrer">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                            </svg>

                            <span>WhatsApp Sekarang</span>
                        </a>
                    </div>

                </div>
            </div><!-- End Section Title -->
        </section><!-- /Testimonials Section -->

    </main>
    <script>
        const hargaPerLiter = {{ $setting->price }};

        document.getElementById('jumlah_jelantah').addEventListener('input', function() {
            let jumlah = parseFloat(this.value) || 0;
            let hasil = jumlah * hargaPerLiter;

            document.getElementById('hasil').innerText =
                'Rp' + hasil.toLocaleString('id-ID');
        });
    </script>
@endsection
