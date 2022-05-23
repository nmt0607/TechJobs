<div>
<nav class="navbar navbar-expand-lg navbar-light nav-recuitment">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNava" aria-controls="navbarNava" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse container" id="navbarNava">
            <ul class="navbar-nav nav-recuitment-li">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Quản lý đăng tuyển</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quản lý ứng viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quản lý đăng tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quản lý hồ sơ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tài khoản</a>
                </li>
            </ul>
            <ul class="rec-nav-right">
                <li class="nav-item">
                    <a class="nav-link" href="#">Tìm hồ sơ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Đăng tuyển</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid search-fluid">
        <div class="container">
            <div class="search-wrapper">
                <ul class="nav nav-tabs search-nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item search-nav-item">
                        <a class="nav-link snav-link active" style="color: black" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Danh sách công việc đang đăng</a>
                    </li>
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
                                                <input type="text" class="form-control sinput" placeholder="Nhập tên công việc">
                                                <span><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3" wire:ignore>
                                            <select id="computer-languages">
                                                <option value="" selected hidden>Tất cả kĩ năng</option>
                                                @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-code sfa" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-3" wire:ignore>
                                            <select id="s-provinces">
                                                <option value="" selected hidden>Tất cả địa điểm</option>
                                                <option>Đà Nẵng</option>
                                                <option>Hà Nội</option>
                                                <option>Hồ Chí Minh</option>
                                                <option>Buôn Ma Thuột</option>
                                                <option>Quy Nhơn</option>
                                                <option>Nha Trang</option>
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
                    <!-- (end) content tab 1 -->
                    <!-- content tab 2 -->
                    <!-- (end) content tab 2 -->
                </div>

            </div>
        </div>
    </div>
    <!-- (end) search section -->



    <div class="container-fluid">
        <div class="container search-wrapper">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-12">
                    <h4 class="search-find">Tìm thấy {{$data->count()}} việc làm đang tuyển dụng</h4>
                    <div class="job-board-wrap">
                        <div class="job-group">
                            @foreach($data as $row)
                            <div class="job pagi">
                                <div class="job-content">
                                    <div class="job-logo">
                                        <a href="#">
                                            <img src="{{asset('img/fpt-logo.png')}}" class="job-logo-ima" alt="job-logo">
                                        </a>
                                    </div>

                                    <div class="job-desc">
                                        <div class="job-title">
                                            <a href="#">{{$row->title}}</a>
                                        </div>
                                        <div class="job-company">
                                            <a href="#">{{$row->user->name}}</a> | <a href="#" class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                {{$row->address_id}}</a>
                                        </div>

                                        <div class="job-inf">
                                            <div class="job-main-skill">
                                                <i class="fa fa-code" aria-hidden="true"></i>
                                                @foreach($row->tags as $tag)
                                                    @if($loop->last)
                                                        <a>{{$tag->name}}</a>
                                                    @else 
                                                        <a>{{$tag->name}}, </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="job-salary">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                <span class="salary-min">15<em class="salary-unit">triệu</em></span>
                                                <span class="salary-max">35 <em class="salary-unit">triệu</em></span>
                                            </div>
                                            <br>
                                            <div class="job-deadline">
                                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> Hạn nộp: <strong>{{$row->end_date}}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-btn-appl">
                                        <button style="border: 1px solid grey; border-radius: 4px; margin-right: 1px" wire:click="detail({{$row->id}})"><i class="fa fa-eye"></i></button>
                                        <button style="border: 1px solid grey; border-radius: 4px; margin-right: 1px" wire:click="applyList({{$row->id}})"><i class="fa fa-users"></i></button>
                                        <button style="border: 1px solid grey; border-radius: 4px; margin-right: 1px" wire:click="edit({{$row->id}})" ><i class="fa fa-pencil"></i></button>      
                                        <button data-toggle="modal" data-target="#modalDelete" style="border: 1px solid grey; border-radius: 4px; margin-right: 1px" wire:click="setJob({{$row->id}})" ><i class="fa fa-trash"></i></button>
                                        <p class="jd-view mt-4">Ứng viên đang chờ: <span>3</span></p>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12">
                    <h4 class="search-find"><br></h4>
                    <div class="recuiter-info">
                        <div class="recuiter-info-avt">
                            <img src="{{asset('img/icon_avatar.jpg')}}">
                        </div>
                        <div class="clearfix list-rec">
                            <h4>NESTLE Inc.</h4>
                            <ul>
                                <li><a href="#">Việc làm đang đăng <strong>(0)</strong></a></li>
                                <li><a href="#">Follower <strong>(450)</strong></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- job support -->
    <div class="container-fluid job-support-wrapper">
        <div class="container-fluid job-support-wrap">
            <div class="container job-support">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <ul class="spp-list">
                            <li>
                                <span><i class="fa fa-question-circle pr-2 icsp"></i>Hỗ trợ nhà tuyển dụng:</span>
                            </li>
                            <li>
                                <span><i class="fa fa-phone pr-2 icsp"></i>0123.456.789</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="newsletter">
                            <span class="txt6">Đăng ký nhận bản tin việc làm</span>
                            <div class="input-group frm1">
                                <input type="text" placeholder="Nhập email của bạn" class="newsletter-email form-control">
                                <a href="#" class="input-group-addon"><i class="fa fa-lg fa-envelope-o colorb"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 20vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h2>
                </div>
                <div class="modal-body">
                    Bạn chắc chắn muốn xóa công việc này
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="delete()">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("document").ready(() => {
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
    })
</script>