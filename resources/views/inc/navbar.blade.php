  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
          <a href="{{ route('app.home.index') }}" class="logo d-flex align-items-center">
              <img src="{{ asset('niceadmin/img/logo.png') }}" alt="">
              <span class="d-none d-lg-block">{{ config('app.name', 'Laravel') }}</span>
          </a>
      </div><!-- End Logo -->

      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">

              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif

              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif

          </ul>
      </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
