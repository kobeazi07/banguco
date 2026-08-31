    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
            @php
                $setting = App\Models\SettingModel::first();
            @endphp
            <title>{{ $setting->tittle }}</title>
            <meta name="description" content="{{ $setting->description }}">
            <meta name="keywords" content="{{ $setting->meta }}">
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
