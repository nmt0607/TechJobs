<div>
    <div wire:loading class="loader"></div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-ads">
                        <a href="#">
                            <img src="{{asset('img/hna2.jpg')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid search-fluid">
        <div class="container">
            <div class="search-wrapper">

                <ul class="nav nav-tabs search-nav-tabs" id="myTab" role="tablist">
                    @if(!$type)
                    <li class="nav-item search-nav-item">
                        <a class="nav-link snav-link active" style="color: black" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tìm việc làm</a>
                    </li>
                    @elseif($type==1)
                    <li class="nav-item search-nav-item">
                        <a class="nav-link snav-link active" style="color: black" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Công việc đang ứng tuyển</a>
                    </li>
                    @elseif($type==2)
                    <li class="nav-item search-nav-item">
                        <a class="nav-link snav-link active" style="color: black" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Công việc đang thực hiện</a>
                    </li>
                    @elseif($type==5)
                    <li class="nav-item search-nav-item">
                        <a class="nav-link snav-link active" style="color: black" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Công việc đã hoàn thành</a>
                    </li>
                    @elseif($type==6)
                    <li class="nav-item search-nav-item">
                        <a class="nav-link snav-link active" style="color: black" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Công việc phù hợp</a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content search-tab-content" id="myTabContent">
                    <!-- content tab 1 -->
                    <div class="tab-pane stab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="bn-search-form">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group s-input-group">
                                                <input wire:model.debounce.500ms='searchName' type="text" class="form-control sinput" placeholder="Nhập tên công việc">
                                                <span><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3" wire:ignore>
                                            <select data-placeholder="Tất cả kỹ năng" id="computer-languages" required multiple>
                                                @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-code sfa" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-3" wire:ignore>
                                            <select id="s-provinces">
                                                <option value="" selected hidden>Tất cả địa điểm</option>
                                                <option value="2">Hà Nội</option>
                                                <option value="1">Hồ Chí Minh</option>
                                                <option value="3">Đà Nẵng</option>
                                            </select>
                                            <i class="fa fa-map-marker sfa" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-3" wire:ignore>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- (end) search section -->



    <div class="container-fluid">
        <div class="container search-wrapper">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-12">
                    <a id="click_advance" class="btn btn-c-filter" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                        <i class="pr-2 fa fa-filter" id="icon-s-sw" aria-hidden="true"></i>Lọc &amp; Tìm kiếm
                    </a>
                    <div class="collapse show" id="collapseExample" style="">
                        <div class="card card-body bg-card-body-filter">
                            <div class="filter-bar">
                                <div class="filter-form">
                                    <div class="filter-form-item">
                                        <p>
                                            <a id="clickc_advance" class="btnf btn-filter" data-toggle="collapse" href="#filter-topic" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Ngành nghề
                                                <i class="fa fa-angle-up" aria-hidden="true"></i>
                                            </a>
                                        </p>
                                        <div class="collapse show" id="filter-topic">
                                            <div class="card o-card card-body">
                                                <div class="filter-panel">
                                                    <div class="panel-content">
                                                        <div class="filter-topic cotain-common-filter">
                                                            <a style="cursor:pointer" wire:click="setSearchType(0)" class="filter-action">Tất cả ngành nghề</a>
                                                            <span class="filter-count">{{$countJobAll}}</span>
                                                        </div>
                                                        <div class="filter-topic cotain-common-filter">
                                                            <a style="cursor:pointer" wire:click="setSearchType(1)" class="filter-action">Web Developer</a>
                                                            <span class="filter-count">{{$countJobType1}}</span>
                                                        </div>
                                                        <div class="filter-topic cotain-common-filter">
                                                            <a style="cursor:pointer" wire:click="setSearchType(2)" class="filter-action">Mobile Developer</a>
                                                            <span class="filter-count">{{$countJobType2}}</span>
                                                        </div>
                                                        <div class="filter-topic cotain-common-filter">
                                                            <a style="cursor:pointer" wire:click="setSearchType(3)" class="filter-action">Business Analyst</a>
                                                            <span class="filter-count">{{$countJobType3}}</span>
                                                        </div>
                                                        <div class="filter-topic cotain-common-filter">
                                                            <a style="cursor:pointer" wire:click="setSearchType(4)" class="filter-action">Automation Test</a>
                                                            <span class="filter-count">{{$countJobType4}}</span>
                                                        </div>
                                                        <div class="filter-topic cotain-common-filter">
                                                            <a style="cursor:pointer" wire:click="setSearchType(5)" class="filter-action">Data Scientist</a>
                                                            <span class="filter-count">{{$countJobType5}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <a id="clickc2_advance" class="btnf btn-filter" data-toggle="collapse" href="#filter-price" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Mức giá (triệu đồng)
                                                <i class="fa fa-angle-up" aria-hidden="true"></i>
                                            </a>
                                        </p>
                                        <div class="collapse show" id="filter-price">
                                            <div class="card o-card card-body">
                                                <div class="filter-panel">
                                                    <div class="panel-content">
                                                        <div class="filter-topic filter-input-price">
                                                            <form class="al-price-filter">
                                                                <span class="_fpblock">
                                                                    <input wire:model.defer="searchSalaryFrom" type="number" min="1" class="if-price" id="" placeholder="0">
                                                                </span>
                                                                <span class="_fpblock _line">
                                                                    <p>-</p>
                                                                </span>
                                                                <span class="_fpblock">
                                                                    <input wire:model.defer="searchSalaryTo" type="number" min="1" class="if-price" id="" placeholder="100">
                                                                </span>
                                                                <span class="_fpblock">
                                                                    <button wire:click="render" type="button" class="sb-fprice"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                                                </span>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-form-item">
                                        <p>
                                            <a id="clickc3_advance" class="btnf btn-filter" data-toggle="collapse" href="#filter-video-duration" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Đánh giá
                                                <i class="fa fa-angle-up" aria-hidden="true"></i>
                                            </a>
                                        </p>
                                        <div class="collapse show" id="filter-video-duration">
                                            <div class="card o-card card-body">
                                                <div class="filter-panel">
                                                    <div class="panel-content">
                                                        <div class="filter-rating">
                                                            <a style="cursor:pointer" wire:click="setSearchRate(5)">
                                                                <span class="rating-wrapper">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </span>
                                                                <span>(từ 5 sao)</span>
                                                            </a>
                                                        </div>
                                                        <div class="filter-rating">
                                                            <a style="cursor:pointer" wire:click="setSearchRate(4)">
                                                                <span class="rating-wrapper">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                </span>
                                                                <span>(từ 4 sao)</span>
                                                            </a>
                                                        </div>
                                                        <div class="filter-rating">
                                                            <a style="cursor:pointer" wire:click="setSearchRate(3)">
                                                                <span class="rating-wrapper">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                </span>
                                                                <span>(từ 3 sao)</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- filter bar -->
                            <script type="text/javascript">
                                window.onload = function() {
                                    screenCollapse()
                                };

                                let ele = document.getElementsByClassName("collapse");

                                function screenCollapse() {
                                    if (window.innerWidth < 720) {
                                        $(".collapse").removeClass("show");
                                        $(".collapse").addClass("hide");
                                    }
                                }
                            </script>
                        </div>
                    </div> <!-- ./ collapse -->
                </div>
                <div class="col-md-9 col-sm-12 col-12">

                    @if(!$type)
                    <h4 class="search-find">Tìm thấy {{$count}} việc làm đang tuyển dụng</h4>
                    @elseif($type==1)
                    <h4 class="search-find">Tìm thấy {{$count}} việc làm đang ứng tuyển</h4>
                    @elseif($type==2)
                    <h4 class="search-find">Tìm thấy {{$count}} việc làm đang thực hiện</h4>
                    @elseif($type==5)
                    <h4 class="search-find">Tìm thấy {{$count}} việc làm đã hoàn thành</h4>
                    @elseif($type==6)
                    <h4 class="search-find">Tìm thấy {{$count}} việc làm phù hợp với bạn</h4>
                    @endif

                    
                    <div class="job-board-wrap">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job support -->
    @livewire('component.support')
</div>
<script>
    $("document").ready(() => {
        $('#computer-languages').select2({
            minimumResultsForSearch: -1,
        });
        $('#computer-languages').on('change', function(e) {
            var data = $('#computer-languages').select2('val');
            @this.set('searchTag', data);
        })
        $('#s-provinces').on('change', function(e) {
            var data = $('#s-provinces').select2('val');
            @this.set('searchProvince', data);
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