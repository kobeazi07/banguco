  <footer id="footer" class="footer position-relative light-background">

      <div class="container footer-top">

      </div>

      <div class="container copyright text-center mt-5">
          <div class="row align-items-center">

              <!-- Logo -->
              <div class="col-lg-3">
                  <a href="index.html" class="d-flex align-items-center">
                      <img src="{{ asset('frontend/assets/img/logobguco.png') }}" class="logof" alt="">
                  </a>
              </div>

              <!-- Copyright -->
              <div class="col-lg-6 text-center">
                  <p class="mb-1">
                      © <span>Copyright</span>
                      <strong class="px-1 sitename">Bang UCO</strong>
                      <span>All Rights Reserved</span>
                  </p>

                  {{-- <div class="credits">
                      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                      Dist <a href="https://themewagon.com">ThemeWagon</a>
                  </div> --}}
              </div>
              @php
                  $setting = App\Models\SettingModel::first();

                  $nowa = preg_replace('/[^0-9]/', '', $setting->nowa);

                  if (str_starts_with($nowa, '0')) {
                      $nowa = '62' . substr($nowa, 1);
                  }
              @endphp
              <!-- Social -->
              <div class="col-lg-3">
                  <div class="social-links d-flex justify-content-lg-end justify-content-center">

                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-tiktok"></i></a>
                      <a href="https://wa.me/{{ $nowa }}" target="_blank" rel="noopener noreferrer">
                          <i class="bi bi-whatsapp"></i>
                      </a>
                  </div>
              </div>

          </div>

      </div>

  </footer>
