<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Faboce S.R.L.</title>

    <meta charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">

    <!-- ******************************************************************************************* -->
    <!-- Icon -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon.png') }}" />
    <!-- ******************************************************************************************* -->

    <!-- ******************************************************************************************* -->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <!-- ******************************************************************************************* -->

    <!-- ******************************************************************************************* -->
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    @livewireStyles

    <script src="{{ mix('js/app.js') }}"></script>

    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.styles.min.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.styles.templates.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/select.min.js') }}"></script>
    <script src="{{ asset('js/steps.min.js') }}"></script>
    <script src="{{ asset('js/fixed_columns.min.js') }}"></script>

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jgrowl.min.js') }}"></script>
    <script src="{{ asset('js/noty.min.js') }}"></script>
    <script src="{{ asset('js/uniform.min.js') }}"></script>

    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/jquery.makedinput.min.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('js/maxlength.min.js') }}"></script>

    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>

    <script src="{{ asset('js/script.js') }}"></script>

    <!-- ******************************************************************************************* -->

</head>

<body>

    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{ asset('images/faboce2.png') }}" alt="Faboce S.R.L."></div>
            <p>Cargando...</p>
        </div>
    </div>

    <x-navbar />

    <!-- Page content -->
    <div class="page-content">

        <x-sidebar />

        <!-- Main content -->
        <div class="content-wrapper">

            @yield('header')

            <!-- Content area -->
            <div class="content">

                <!-- App -->
                <div id="app">
                    @yield('content')
                </div>
                <!-- App -->

            </div>
            <!-- /content area -->

            <x-modal />

            <x-footer />
        </div>
        <!-- Main content -->

    </div>
    <!-- Page content -->

    <!-- ******************************************************************************************* -->
    <!-- Scripts -->
    <script type="text/javascript">
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}",
            jsPermissions: {!! auth()->check()
                ? auth()->user()->jsPermissions()
                : null !!}
        }
    </script>
    <script>
        setTimeout(function() {
            $(".page-loader-wrapper").fadeOut();
        }, 100);
        const app = new Vue({
            el: '#app',
        });
        Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });
    </script>
    @livewireScripts
    @if (session('success'))
        <script>
            new Noty({
                text: "{{ session('success') }}.",
                type: 'success'
            }).show();
        </script>
    @endif
    @if (session('error'))
        <script>
            new Noty({
                text: "{{ session('error') }}.",
                type: 'error'
            }).show();
        </script>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                new Noty({
                    text: "{{ $error }}.",
                    type: 'error'
                }).show();
            </script>
        @endforeach
    @endif
    <!-- ******************************************************************************************* -->

</body>

</html>
