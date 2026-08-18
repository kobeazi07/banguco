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

                  $nowa = preg_replace('/[^0-9]/', '', $setting->no_wa);

                  if (str_starts_with($nowa, '0')) {
                      $nowa = '62' . substr($nowa, 1);
                  }

                  $pesanWa = urlencode($setting->text_wa);

              @endphp
              <!-- Social -->
              <div class="col-lg-3">
                  <div class="social-links d-flex justify-content-lg-end justify-content-center">

                      <a href="{{ $setting->link_ig }}" target="_blank" rel="noopener noreferrer"><i
                              class="bi bi-instagram"></i></a>
                      <a href="{{ $setting->link_facebook }}" target="_blank" rel="noopener noreferrer"><i
                              class="bi bi-facebook"></i></a>
                      <a href="{{ $setting->link_tiktok }}" target="_blank" rel="noopener noreferrer"><i
                              class="bi bi-tiktok"></i></a>
                      <a href="https://api.whatsapp.com/send?phone={{ $nowa }}&text={{ $pesanWa }}"
                          target="_blank" rel="noopener noreferrer">
                          <i class="bi bi-whatsapp"></i>
                      </a>
                  </div>
              </div>

          </div>

      </div>

  </footer>
