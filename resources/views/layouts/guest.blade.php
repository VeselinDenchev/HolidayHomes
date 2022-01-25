<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="theme/css/bootstrap.min.css">
        <!-- Site CSS -->
        <link rel="stylesheet" href="theme/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="theme/css/responsive.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="theme/css/custom.css">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">

            @livewire('navigation-menu')
            {{ $slot }}
        </div>

        <!-- Start Footer  -->
        <footer>
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-widget">
                                <h4>About HolidayHomes</h4>
                                <p>Our goal is not only to find the most suitable and affordable place for your holiday or vacation, but also help owners of such houses promoting them.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-link">
                                <h4>Links</h4>
                                <ul>
                                    <li style="margin-left: 1em"><a href="/index">Home</a></li>
                                    <li><a href="/all_houses">All houses</a></li>

                                    @role('editor')
                                    <li><a href="/my_houses">My houses</a></li>
                                    @endrole

                                    @role('admin')
                                    <li><a href="/populated_place">Populated places</a></li>
                                    <li><a href="/object_types">Object types</a></li>
                                    <li><a href="/users">Users</a></li>
                                    @endrole
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-link-contact">
                                <h4>Contact Us</h4>
                                <ul>
                                    <li>
                                        <p><i class="fas fa-map-marker-alt"></i>Address: 5003 Veliko Turnovo, Bulgaria<br>2 T. Turnovski str</p>
                                    </li>
                                    <li>
                                        <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+359-876559291">+359-876 559 291</a></p>
                                    </li>
                                    <li>
                                        <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">holidayhomes@email.com</a></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer  -->

        <!-- Start copyright  -->
        <div class="footer-copyright">
            <p class="footer-company">All Rights Reserved. &copy; 2022 <a href="/index">HolidayHomes</a>
        </div>
        <!-- End copyright  -->

        <!-- ALL JS FILES -->
        <script src="theme/js/jquery-3.2.1.min.js"></script>
        <script src="theme/js/popper.min.js"></script>
        <script src="theme/js/bootstrap.min.js"></script>
        <!-- ALL PLUGINS -->
        <script src="theme/js/jquery.superslides.min.js"></script>
        <script src="theme/js/bootstrap-select.js"></script>
        <script src="theme/js/inewsticker.js"></script>
        <script src="theme/js/bootsnav.js."></script>
        <script src="theme/js/images-loded.min.js"></script>
        <script src="theme/js/isotope.min.js"></script>
        <script src="theme/js/owl.carousel.min.js"></script>
        <script src="theme/js/baguetteBox.min.js"></script>
        <script src="theme/js/form-validator.min.js"></script>
        <script src="theme/js/contact-form-script.js"></script>
        <script src="theme/js/custom.js"></script>
    </body>
</html>
