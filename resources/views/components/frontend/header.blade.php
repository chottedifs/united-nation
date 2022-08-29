<header>
    {{-- <nav class="navbar fixed-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('template/united-nation/assets/images/logo-uncro.svg') }}" alt="logo-uncro-indonesia" class="img-logo">
            </a>
        </div>
    </nav> --}}

    <nav class="navbar fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('template/united-nation/assets/images/logo-uncro.svg') }}" alt="logo-uncro-indonesia" class="img-logo">
            </a>
          <button class="navbar-toggler bg-white shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="bi bi-list"></i>
          </button>
          <div class="offcanvas max-w-md offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel"> </h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item mb-3">
                    <a class="nav-link" href="review-year.html"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-1.svg')}}" class="me-2" width="30" alt="">A Year in Review</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="review-year.html"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-5.svg')}}" class="me-2" width="30" alt="">inclusive Human Development</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="review-year.html"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-4.svg')}}" class="me-2" width="30" alt="">Economic Transformation</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="review-year.html"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-6.svg')}}" class="me-2" width="30" alt="">Green Development, Climate Change, and Natural Disasters</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="review-year.html"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-3.svg')}}" class="me-2" width="30" alt="">Innovation to Accelerate Programs Towards the SDGs</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="review-year.html"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-2.svg')}}" class="me-2" width="30" alt="">UN Reforms in Indonesia</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </nav>
</header>


