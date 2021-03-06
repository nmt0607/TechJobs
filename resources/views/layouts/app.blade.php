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
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{asset('rateyo/jquery.rateyo.css')}}"/>

</head>

<body>
    <!-- main nav -->
    <div class="container-fluid fluid-nav another-page">
        <div class="container cnt-tnar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light tjnav-bar">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <a href="{{route('index')}}" class="nav-logo">
                    <img src="{{asset('/img/techjobs_bgw.png')}}">
                </a>
                <button class="navbar-toggler tnavbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <i class="fa fa-bars icn-res" aria-hidden="true"></i>

                </button>
                @if(auth()->user())
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto tnav-left tn-nav">
                        @if(auth()->user()->type == 2)
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('job.index')}}">Vi???c L??m IT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('job.index', ['type'=>1])}}">C??ng vi???c ??ang ???ng tuy???n</a>
                        </li>
                        @else
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('job.index')}}">Vi???c L??m IT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('job.pushlished')}}">C??ng vi???c ??ang ????ng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('job.create')}}">????ng tuy???n </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('chat')}}">Tin nh???n</a>
                        </li>
                    </ul>
                    @if(Auth::check())
                    @livewire('component.notification')
                    @endif
                </div>
                @endif
            </nav>
        </div>
    </div>
    <!-- (end) main nav -->
    <div class="clearfix"></div>
    @yield('content')
    <!-- Scripts -->
    @livewireStyles
    @livewireScripts
    <div class="container-fluid footer-wrap  clear-left clear-right">
        <div class="container footer">
            <div class="row">
                <div class="col-md-4 col-sm-8 col-12">
                    <h2 class="footer-heading">
                        <span>Gi???i thi???u</span>
                    </h2>
                    <p class="footer-content">
                        N??i t???t nh???t ????? c??c freelance v?? nh?? tuy???n d???ng k???t n???i v???i nhau 
                    </p>
                    <ul class="footer-contact">
                        <li>
                            <a href="#">
                                <i class="fa fa-phone fticn"></i> +0914 249 080
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope fticn"></i>
                                techjob.sp@gmail.com
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-map-marker fticn"></i>
                                S??? 1 ?????i C??? Vi???t, H?? N???i
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-4 col-12">
                    <h2 class="footer-heading">
                        <span>Ng??n ng??? n???i b???t</span>
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
                        <span>T???t c??? ng??nh ngh???</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">L???p tr??nh vi??n</a></li>
                        <li><a href="#">Ki???m th??? ph???n m???m</a></li>
                        <li><a href="#">K??? s?? c???u n???i</a></li>
                        <li><a href="#">Qu???n l?? d??? ??n</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-12">
                    <h2 class="footer-heading">
                        <span>T???t c??? h??nh th???c</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">Nh??n vi??n ch??nh th???c</a></li>
                        <li><a href="#">Nh??n vi??n b??n th???i gian</a></li>
                        <li><a href="#">Freelancer</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-12 col-12">
                    <h2 class="footer-heading">
                        <span>T???t c??? t???nh th??nh</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">H??? Ch??nh Minh</a></li>
                        <li><a href="#">H?? N???i</a></li>
                        <li><a href="#">???? N???ng</a></li>
                        <li><a href="#">H???i Ph??ng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid copyright-wrap">
        <div class="container copyright">
            <p class="copyright-content">
                Copyright ?? 2022 <a href="#"> Tech<b>Job</b></a>. All Right Reserved.
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
            moreLink: '<a href="#">Xem th??m<i class="fa fa-angle-down pl-2"></i></a>',
            lessLink: '<a href="#">R??t g???n<i class="fa fa-angle-up pl-2"></i></a>'
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
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('rateyo/jquery.rateyo.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "3000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    <script>
        window.addEventListener('show-toast', event => {
            if (event.detail.type == "success") {
                toastr.success(event.detail.message);
            } else if (event.detail.type == "error") {
                toastr.error(event.detail.message);
            }
        });
    </script>
</body>

</html>