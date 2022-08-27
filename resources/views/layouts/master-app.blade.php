<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Annual Results Report | United Nation Indonesia {{ date('Y') }}</title>

    @include('components.frontend.style')

    @stack('style')

</head>
<body>

    @include('components.frontend.header')

    <main>
        <!-- Scroll Up -->
        <a class="shadow-sm" id="scroll-up"><i class="bi bi-chevron-up"></i>Top</a>
        <!-- End Scroll Up -->

        @include('components.frontend.nav-jumbotron')

        @yield('content')

        @include('components.frontend.footer')

    </main>

    @include('components.frontend.script')

    @stack('script')

</body>
</html>
