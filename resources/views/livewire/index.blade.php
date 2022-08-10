<div>
    <div wire:loading class="loader"></div>
    <div class="container-fluid clear-left clear-right">
        <div class="main-banner">
            <div class="banner-image">
                <img src="img/banner2.jpg" alt="banner-image">
            </div>
        </div>
        <div class="banner-content">
            <h3>1000+ Jobs For Developers</h3>
            <div class="banner-tags">
                <ul>
                    <li><a href="#">Java</a></li>
                    <li><a href="#">Python</a></li>
                    <li><a href="#">Tester</a></li>
                    <li><a href="#">QA QC</a></li>
                    <li><a href="#">.NET</a></li>
                    <li><a href="#">Javascript</a></li>
                    <li><a href="#">Business Analyst</a></li>
                    <li><a href="#">Designer</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- (end) main banner -->

    <!-- search section -->
    <div class="container-fluid search-fluid">
        <div class="container">
            <div class="search-wrapper" style="margin-top: -11rem;">

                <ul class="nav nav-tabs search-nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item search-nav-item">
                        <a class="nav-link snav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tìm việc làm</a>
                    </li>
                </ul>
                <div class="tab-content search-tab-content" id="myTabContent">
                    <!-- content tab 1 -->
                    <div class="tab-pane stab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form class="bn-search-form">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group s-input-group">
                                                <input wire:model='searchName' type="text" class="form-control sinput" placeholder="Nhập tên công việc">
                                                <span><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4" wire:ignore>
                                            <select data-placeholder="Tất cả kỹ năng" id="computer-languages" required multiple>
                                                @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-code sfa" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-4" wire:ignore>
                                            <select id="s-company">
                                                <option value="" selected hidden>Tất cả doanh nghiệp</option>
                                                @foreach($listCompany as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-building sfa" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- (end) content tab 1 -->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid jb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-12">
                    <div class="job-board-wrap">
                        <h2 class="widget-title">
                            <span>Danh sách công việc</span>
                        </h2>
                        <div class="job-group">
                            @forelse($data as $row)
                            <div class="job pagi">
                                <div class="job-content">
                                    <div class="job-logo">
                                        <a href="#">
                                            <img src="{{asset($row->user->image)}}" class="job-logo-ima" alt="job-logo">
                                        </a>
                                    </div>

                                    <div class="job-desc">
                                        <div class="job-title">
                                            <a href="{{route('job.detail', ['id' => $row->id])}}">{{$row->title}}</a>
                                        </div>
                                        <div class="job-company">
                                            <a href="#">{{$row->user->name}}</a> | <a href="#" class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                {{getAddress($row->address_id)}}</a>
                                        </div>

                                        <div class="job-inf">
                                            <div class="job-main-skill">
                                                <i class="fa fa-code" aria-hidden="true"></i>
                                                <a>{{$row->listTag()}}</a>
                                            </div>
                                            <div class="job-salary">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                {{$row->salary_from_to}}
                                            </div>
                                            <div class="job-deadline">
                                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> Hạn nộp: <strong>{{reFormatDate($row->end_date)}}</strong></span>
                                            </div>
                                        </div>
                                        <div style="display: inline-block; top: -2px" class="{{'rateYo'.$row->user->id}}" rate='{{$row->user->rate()}}'></div>
                                        <span>({{$row->user->rateCount()}} đánh giá)</span>
                                    </div>
                                    <div class="wrap-btn-appl">
                                        <a href="{{route('job.detail', ['id' => $row->id])}}" class="btn btn-appl">Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            Không tìm thấy công việc phù hợp
                            @endforelse
                        </div>
                        <br>
                        <center>{{ $data->links() }}</center>
                        <br>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12 clear-left">
                    <div class="job-sidebar">
                        <h2 class="widget-title">
                            <span>Ngành Nghề</span>
                        </h2>
                        <div class="catelog-list">
                            <ul>
                                <li>
                                    <a style="cursor:pointer" wire:click="setSearchType(0)">
                                        <span class="cate-img">
                                            <em>Tất cả ngành nghề</em>
                                        </span>
                                        <span class="cate-count">{{$countJobAll}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a style="cursor:pointer" wire:click="setSearchType(1)">
                                        <span class="cate-img">
                                            <em>Web Developer</em>
                                        </span>
                                        <span class="cate-count">{{$countJobType1}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a style="cursor:pointer" wire:click="setSearchType(2)">
                                        <span class="cate-img">
                                            <em>Mobile Developer</em>
                                        </span>
                                        <span class="cate-count">{{$countJobType2}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a style="cursor:pointer" wire:click="setSearchType(3)">
                                        <span class="cate-img">
                                            <em>Business Analyst</em>
                                        </span>
                                        <span class="cate-count">{{$countJobType3}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a style="cursor:pointer" wire:click="setSearchType(4)">
                                        <span class="cate-img">
                                            <em>Automation Test</em>
                                        </span>
                                        <span class="cate-count">{{$countJobType4}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a style="cursor:pointer" wire:click="setSearchType(5)">
                                        <span class="cate-img">
                                            <em>Data Scientist</em>
                                        </span>
                                        <span class="cate-count">{{$countJobType5}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="job-sidebar">
                        <div class="sb-banner">
                            <img src="img/ads1.jpg" class="advertisement">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container-fluid">
        <div class="container job-board2" wire:ignore>
            <div class="row">
                <div class="col-md-12 job-board2-wrap-header">
                    <h3>Tin tuyển dụng, việc làm mới nhất</h3>
                </div>
                <div class="col-md-12 job-board2-wrap">
                    <div class="owl-carousel owl-theme job-board2-contain">
                        @forelse($newJobs as $job)
                        <div class="item job-latest-item">
                            <a href="{{route('job.detail', ['id' => $job->id])}}" class="job-latest-group">
                                <div class="job-lt-logo">
                                    <img src="{{asset($job->user->image)}}">
                                </div>
                                <div class="job-lt-info">
                                    <h3>{{$job->title}}</h3>
                                    <a class="company">{{$job->user->name}}</a>
                                    <p class="address"><i class="fa fa-map-marker pr-1" aria-hidden="true"></i>{{getAddress($job->address_id)}}</p>
                                    <p class="address"><i class="fa fa-clock-o" aria-hidden="true"></i><strong> {{$job->created_at->diffForHumans()??""}}</strong></p>
                                </div>
                            </a>
                        </div>
                        @empty
                            Không tìm thấy công việc phù hợp
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: true,
                        slideBy: 2,
                        dots: false
                    },
                    600: {
                        items: 4,
                        nav: false,
                        slideBy: 2,
                        dots: false
                    },
                    1000: {
                        items: 6,
                        nav: true,
                        loop: false,
                        slideBy: 2
                    }
                }
            });
        })
    </script>
    <div class="clearfix"></div>
    <div class="container-fluid">
        <div class="container top-employer">
            <div class="row">
                <div class="col-md-12 top-employer-contain">
                    <div class="header">
                        <h3>Nhà tuyển dùng hàng đầu</h3>
                    </div>
                    <div class="row">
                        @foreach($users as $user)
                        <div class="col-md-3 col-sm-6 col-12 top-employer-wrap">
                            <div class="top-employer-item">
                                <a href="#">
                                    <div class="emp-img-thumb">
                                        <img src="{{asset($user->image)}}">
                                    </div>
                                    <h3 class="company">{{$user->name}}</h3>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-ads">
                        <a href="#">
                            <img src="img/hna.jpg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container job-best-salary">
            <div class="row">
                <div class="col-md-12 job-board2-wrap-header job-best-salary-header">
                    <h3><i class="fa fa-briefcase pr-2"></i> Việc làm tuyển gấp</h3>
                </div>
            </div>
            <div class="row job-best-salary-inner">
                @foreach($urgentJobs as $job)
                <div class="col-md-6 job-over-item">
                    <div class="job-inner-over-item">
                        <a href="{{route('job.detail', ['id' => $job->id])}}">
                            <div class="thumbnail">
                                <img src="{{asset($job->user->image)}}" alt="company logo image">
                            </div>
                            <div class="content" style="max-width: 310px;">
                                <div class="job-name">
                                    {{$job->title}}
                                </div>
                                <a class="company">
                                    {{$job->user->name}}
                                </a>
                            </div>
                            <div class="extra-info">
                                <p class="salary mt-2"><i class="fa fa-money pr-2"></i>{{$job->salary_from_to}}</p>
                                <p class="place"><i class="fa fa-clock-o pr-2" aria-hidden="true"></i><strong>{{reFormatDate($job->end_date)}}</strong></p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-ads">
                        <a href="#">
                            <img src="img/hna2.jpg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container-fluid">
        <div class="container news-wrapper">
            <div class="row">
                <div class="col-md-12 news-wrapper-head">
                    Tư vấn nghề nghiệp từ HR Insider
                </div>
                <div class="col-md-4 col-sm-12 col-12 news-item">
                    <div class="news-item-inner" style="cursor: pointer" onclick="window.open('https://www.vietnamworks.com/hrinsider/5-thoi-diem-doanh-nghiep-khong-duoc-buoc-nguoi-lao-dong-thoi-viec.html');">
                        <a>
                            <div class="news-thumb" style="background-image: url(img/news1.jpg);"></div>
                        </a>
                        <div class="news-details">
                            <div class="tags">
                                <a>Quyền lợi nhân viên</a>
                            </div>
                            <div class="title">
                                <a>
                                    5 thời điểm doanh nghiệp không được buộc người lao động thôi việc
                                </a>
                            </div>
                            <div class="meta">
                                Khi nào thì người sử dụng lao động được quyền đơn phương chấm dứt hợp đồng khi nào thì không? Cùng tham khảo bài viết sau đây để hiểu thêm về quyền lợi của người lao động Việt Nam nhé!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12 news-item">
                    <div class="news-item-inner" style="cursor: pointer" onclick="window.open('https://www.vietnamworks.com/hrinsider/nhay-viec-va-nhung-con-so-ban-can-phai-luu-tam.html');">
                        <a>
                            <div class="news-thumb" style="background-image: url(img/news2.jpg);"></div>
                        </a>
                        <div class="news-details">
                            <div class="tags">
                                <a>Trước khi nhảy việc</a>
                            </div>
                            <div class="title">
                                <a>
                                    Nhảy việc và những con số bạn cần phải lưu tâm
                                </a>
                            </div>
                            <div class="meta">
                                Dù bạn nhảy việc vì lý do gì cũng hãy cân nhắc đến những “con số” sau đây nhé!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12 news-item">
                    <div class="news-item-inner" style="cursor: pointer" onclick="window.open('https://www.vietnamworks.com/hrinsider/danh-gia-buoc-dem-can-thiet-trong-viec-dao-tao-huan-luyen-nhan-vien.html');">
                        <a>
                            <div class="news-thumb" style="background-image: url(img/news3.png);"></div>
                        </a>
                        <div class="news-details">
                            <div class="tags">
                                <a>Huấn luyện nhân sự</a>
                            </div>
                            <div class="title">
                                <a>
                                    Đánh giá: bước đệm cần thiết trong việc đào tạo huấn luyện nhân viên
                                </a>
                            </div>
                            <div class="meta">
                                Cú sốc về kinh tế do Covid-19 gây ra đã khiến cho nhiều doanh nghiệp lớn và nhỏ phải nhanh chóng tìm ra các phương án ứng phó tốc độ và hiệu quả để giải quyết bài toán về tìn...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('component.support')
</div>

<script>
    $("document").ready(() => {
        $('#computer-languages').select2({
            minimumResultsForSearch: -1,
        })

        $('#computer-languages').on('change', function(e) {
            var data = $('#computer-languages').select2('val');
            @this.set('searchTag', data);
        })
        $('#s-company').on('change', function(e) {
            var data = $('#s-company').select2('val');
            @this.set('searchCompany', data);
        })
        $(function() {
            var listJobId = {{$listJobId}}
            $.each(listJobId, function(key, value) {
                $('.rateYo' + value).rateYo({
                    starWidth: "15px",
                    halfStar: true,
                    rating: $('.rateYo' + value).attr('rate'),
                    readOnly: true
                });
            });
        });
        window.livewire.on('load_page', () => {
            $(function() {
                var listJobId = {{$listJobId}}
                $.each(listJobId, function(key, value) {
                    var $rateYo = $(".rateYo" + value).rateYo();
                    $rateYo.rateYo("destroy");
                });
                $.each(listJobId, function(key, value) {
                    $('.rateYo' + value).rateYo({
                        starWidth: "15px",
                        halfStar: true,
                        rating: $('.rateYo' + value).attr('rate'),
                        readOnly: true
                    });
                });
            });
        });
    })
</script>