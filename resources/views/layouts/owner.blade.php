
<x-head />

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">

        <x-side-bar />

        <!-- main content area start -->
        <div class="main-content">

            <x-top-bar />

            @yield('content')

        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2022. All right reserved. Template by <a href="#">Desktops Team</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>

    <x-script />
</body>

</html>
