<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Annual Reports</title>

    @include('components.admin.style')

</head>

    <body>
        <div id="app">
            @include('components.admin.sidebar')

            <div id="main">
                @include('components.admin.header')

                @yield('content')

                @include('components.admin.footer')
            </div>
        </div>

        @include('components.admin.script')
    </body>

</html>
