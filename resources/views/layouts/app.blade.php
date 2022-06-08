<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TechJobs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Roboto Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- select 2 css -->
    <link rel="stylesheet" href="{{asset('/css/select2.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{asset('/css/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/owlcarousel/owl.theme.default.min.css')}}">
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/customer.css')}}">
    
</head>

<body>
    <!-- main nav -->
    <div class="container-fluid fluid-nav another-page">
        <div class="container cnt-tnar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light tjnav-bar">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <a href="#" class="nav-logo">
                    <img src="{{asset('/img/techjobs_bgw.png')}}">
                </a>
                <button class="navbar-toggler tnavbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <i class="fa fa-bars icn-res" aria-hidden="true"></i>

                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto tnav-left tn-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Việc Làm IT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tin Tức</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu tdropdown" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    @if(Auth::check())
                        @livewire('component.notification')
                    @endif
                </div>
            </nav>
        </div>
    </div>
    <!-- (end) main nav -->
    <div class="clearfix"></div>
    @yield('content')
    <!-- Scripts -->
    @livewireScripts
    <div class="container-fluid footer-wrap  clear-left clear-right">
        <div class="container footer">
            <div class="row">
                <div class="col-md-4 col-sm-8 col-12">
                    <h2 class="footer-heading">
                        <span>About</span>
                    </h2>
                    <p class="footer-content">
                        Discover the best way to find houses, condominiums, apartments and HDBs for sale and rent in Singapore with JobsOnline, Singapore's Fastest Growing Jobs Portal.
                    </p>
                    <ul class="footer-contact">
                        <li>
                            <a href="#">
                                <i class="fa fa-phone fticn"></i> +123 456 7890
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope fticn"></i>
                                hello@123.com
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-map-marker fticn"></i>
                                33 Xô Viết Nghệ Tĩnh, Đà Nẵng
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-4 col-12">
                    <h2 class="footer-heading">
                        <span>Ngôn ngữ nổi bật</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">Javascript</a></li>
                        <li><a href="#">Java</a></li>
                        <li><a href="#">Frontend</a></li>
                        <li><a href="#">SQL Server</a></li>
                        <li><a href="#">.NET</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-12">
                    <h2 class="footer-heading">
                        <span>Tất cả ngành nghề</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">Lập trình viên</a></li>
                        <li><a href="#">Kiểm thử phần mềm</a></li>
                        <li><a href="#">Kỹ sư cầu nối</a></li>
                        <li><a href="#">Quản lý dự án</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-12">
                    <h2 class="footer-heading">
                        <span>Tất cả hình thức</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">Nhân viên chính thức</a></li>
                        <li><a href="#">Nhân viên bán thời gian</a></li>
                        <li><a href="#">Freelancer</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-12 col-12">
                    <h2 class="footer-heading">
                        <span>Tất cả tỉnh thành</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">Hồ Chính Minh</a></li>
                        <li><a href="#">Hà Nội</a></li>
                        <li><a href="#">Đà Nẵng</a></li>
                        <li><a href="#">Buôn Ma Thuột</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid copyright-wrap">
        <div class="container copyright">
            <p class="copyright-content">
                Copyright © 2020 <a href="#"> Tech<b>Job</b></a>. All Right Reserved.
            </p>
        </div>
    </footer>
    <!-- (end) footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/readmore.js')}}"></script>
    <script type="text/javascript">
        $('.catelog-list').readmore({
            speed: 75,
            maxHeight: 150,
            moreLink: '<a href="#">Xem thêm<i class="fa fa-angle-down pl-2"></i></a>',
            lessLink: '<a href="#">Rút gọn<i class="fa fa-angle-up pl-2"></i></a>'
        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="{{asset('/js/jquery-3.4.1.slim.min.js')}}"></script> -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="{{asset('/js/popper.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/select2.min.js')}}"></script>
    <script src="{{asset('/js/jobdata.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/main.js')}}"></script>
    <!-- Owl Stylesheets Javascript -->
    <script src="{{asset('/js/owlcarousel/owl.carousel.js')}}"></script>
    <!-- Read More Plugin -->
</body>
</html>