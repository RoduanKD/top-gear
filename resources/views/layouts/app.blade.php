<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>@yield('title', 'TOPGEAR')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    @if (App::isLocale('ar'))
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css">
    @else
        <link rel="stylesheet" href="/css/bootstrap.min.css">
    @endif
    <!-- style css -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    @stack('css')
</head>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="/images/loading.gif" alt="" /></div>
    </div>
    <!-- end loader -->

    <div class="wrapper">
        @include('partials.navbar')
        @include('partials.sidebar')

        @if (session()->has('message'))
            <div class="container">
                <div class="alert alert-{{ session('message-type', 'info') }} alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <div id="content">
            {{-- content --}}
            @yield('content')

            <!-- footer -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="full">
                                <h3>AVALON MOTORS</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="full">
                                <ul class="social_links">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <h4 class="widget_heading">SUBSCRIBE</h4>
                            </div>
                            <div class="full subribe_form">
                                <form>
                                    <fieldset>
                                        <div class="field">
                                            <input type="email" name="mail" placeholder="Enter your email" />
                                        </div>
                                        <div class="field">
                                            <button class="submit_bt">Sumbit</button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <h4 class="widget_heading">Usefull Links</h4>
                            </div>
                            <div class="full f_menu">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Our Cars</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Testimonial</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <h4 class="widget_heading">Contact Details</h4>
                                <div class="full cont_footer">
                                    <p><strong>AVALON Car : Adderess</strong><br><br>Newyork 10012, USA<br>Phone: +987
                                        654 3210<br>demo@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end footer -->

            <!-- copyright -->

            <div class="cpy_right">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="full">
                                <p>© 2019 All Rights Reserved. Design by <a href="https://html.design">Free Html
                                        Templates</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- right copyright -->
        </div>
        <div class="overlay"></div>

    </div>
    <!-- Javascript files-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <!-- Scrollbar Js Files -->
    <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/js/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <script>
        // This example adds a marker to indicate the position of Bondi Beach in Sydney,
        // Australia.
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {
                    lat: 40.645037,
                    lng: -73.880224
                },
            });

            var image = 'images/location_point.png';
            var beachMarker = new google.maps.Marker({
                position: {
                    lat: 40.645037,
                    lng: -73.880224
                },
                map: map,
                icon: image
            });
        }
    </script>
    <!-- google map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
    </script>
    <!-- end google map js -->
    @stack('js')
</body>
