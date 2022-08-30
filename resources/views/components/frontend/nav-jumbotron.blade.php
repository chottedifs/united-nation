<section class="hero">
    <div class="container-fluid p-0">
        <div class="jumbotron p-4">
            <div class="py-5">
              <p class="text-jumbotron">
                United Nations In Indonesia <br>
                <span>Country Results Report 2021</span>
              </p>
            </div>
        </div>
        <div class="navbar-jumbotron">
            <div class="container-fluid p-0">
                <nav class="navbar navbar-expand-lg navbar-white bg-white p-0 m-0">
                    <div id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link menus bg-color-bluelight" href="{{ route('home') }}">A Year in Review</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link menus bg-color-red" href="{{ route('inclusiveHuman') }}" id="navbarDropdown">
                            Inclusive Human Development
                            </a>
                            <ul class="dropdown-menu m-0 border-red" aria-labelledby="navbarDropdown">
                                @foreach ($reportHuman as $reportHumans)
                                    <li><a class="dropdown-item" href="{{ route('report',$reportHumans->Report->slug) }}#title">{{ $reportHumans->Report->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link menus bg-color-yellow" href="{{ route('economicTransformation') }}" id="navbarDropdown">
                            Economic Transformation
                            </a>
                            <ul class="dropdown-menu m-0 border-yellow" aria-labelledby="navbarDropdown">
                                @foreach ($reportEconomic as $reportEconomics)
                                    <li><a class="dropdown-item" href="{{ route('report',$reportEconomics->Report->slug) }}#title">{{ $reportHumans->Report->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link menus bg-color-orange" href="{{ route('greenDevelopment') }}" id="navbarDropdown">
                            Green Development, Climate Change, and Natural Disasters
                            </a>
                            <ul class="dropdown-menu m-0 border-orange" aria-labelledby="navbarDropdown">
                                @foreach ($reportGreen as $reportGreens)
                                    <li><a class="dropdown-item" href="{{ route('report',$reportGreens->Report->slug) }}#title">{{ $reportHumans->Report->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link menus bg-color-greenlight" href="{{ route('innovationAccelerate') }}" id="navbarDropdown">
                            Innovation to Accelerate Progress Towards the SDGs
                            </a>
                            <ul class="dropdown-menu m-0 border-greenlight" aria-labelledby="navbarDropdown">
                                @foreach ($reportInnovation as $reportInnovations)
                                    <li><a class="dropdown-item" href="{{ route('report',$reportInnovations->Report->slug) }}#title">{{ $reportHumans->Report->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menus bg-color-greendark" href="{{ route('unReforms') }}">UN Reforms in Indonesia</a>
                        </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
