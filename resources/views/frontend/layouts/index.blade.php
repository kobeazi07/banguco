    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Minyak Jelantah Pontianak | Bang Uco</title>
        <meta name="description"
            content="Jual Minyak Jelantah Pontianak | Bang Uco - Kami menyediakan layanan pengumpulan dan pengolahan minyak jelantah bekas di Pontianak. Dapatkan layanan profesional dan ramah lingkungan untuk mengelola minyak jelantah Anda.">
        <meta name="keywords" content="minyak jelantah, pontianak, pengumpulan minyak, pengolahan minyak">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        @include('frontend.includes.style')
    </head>

    <body class="index-page">


        @include('frontend.includes.navbar')

        @yield('konten')
        @include('frontend.includes.footer')
        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        @include('frontend.includes.script')

    </body>

    </html>
