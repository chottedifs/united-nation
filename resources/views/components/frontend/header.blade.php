<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('home')}}">
            <img src="{{ asset('template/united-nation/assets/images/logo-uncro.svg') }}" alt="logo-uncro-indonesia" class="img-logo">
          </a>
          <a class="btn bg-white shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-list"></i></a>
            <div class="offcanvas offcanvas-end w-auto" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel"></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item mb-3">
                        <a class="nav-link" href="{{ route('home')}}"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float.svg') }}" class="me-2" width="30" alt="">About This Report</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link" href="{{ route('inReview')}}"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-1.svg') }}" class="me-2" width="30" alt="">A Year in Review</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link" href="{{ route('inclusiveHuman')}}"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-5.svg') }}" class="me-2" width="30" alt="">Inclusive Human Development</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link" href="{{ route('economicTransformation')}}"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-4.svg') }}" class="me-2" width="30" alt="">Economic Tranformation</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link" href="{{ route('greenDevelopment')}}"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-6.svg') }}" class="me-2" width="30" alt="">Green Development, Climate Change, and Natural Disasters</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link" href="{{ route('innovationAccelerate')}}"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-3.svg') }}" class="me-2" width="30" alt="">Innovation to Accelerate Progress Towards the SDGs</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link" href="{{ route('unReforms')}}"><img src="{{ asset('template/united-nation/assets/images/motif-menu-float-2.svg') }}" class="me-2" width="30" alt="">UN Reform in Indonesia</a>
                    </li>
                    <li class="nav-item mt-4">
                        <a class="nav-link" href="#"><i class="bi bi-download me-2"></i>Download Report in PDF</a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </nav>
</header>
