<x-head />

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <x-customer-nav />
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">

            <!-- page title area start -->
            <x-top-bar />
            <!-- Stttaaarrrttt hhheeerrreee -->
            <div class="main-content-inner">
                @yield('content')
            </div>



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
