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
    <!--  recuiter Nav -->

    <!-- widget recuitment  -->
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
    <!-- (end) widget recuitment  -->

    <!-- published recuitment -->
    <div class="container-fluid published-recuitment-wrapper">
        <div class="container published-recuitment-content">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-12 recuitment-inner">
                    <div class="recuitment-form">

                        <div class="accordion" id="accordionExample">
                            <div class="card recuitment-card">
                                <div class="card-header recuitment-card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <a class="btn btn-link btn-block text-left recuitment-header" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Đăng tin tuyển dụng
                                            <span id="clickc1_advance2" class="clicksd">
                                                <i class="fa fa fa-angle-up"></i>
                                            </span>
                                        </a>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body recuitment-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Tiêu đề<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <input wire:model.defer="title" type="text" class="form-control" placeholder="Nhập tiêu đề">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Số lượng cần tuyển</label>
                                            <div class="col-sm-9">
                                                <input wire:model.defer="number" type="number" class="form-control" placeholder="1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Giới tính<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9" wire:ignore>
                                                <select wire:model.defer="gender" type="text" class="form-control" id="jobGender">
                                                    <option value="">Chọn giới tính</option>
                                                    <option value="0">Không yêu cầu</option>
                                                    <option value="1">Nam</option>
                                                    <option value="2">Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Mô tả công việc<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea wire:model.defer="description" type="text" class="form-control" placeholder="Nhập mô tả công việc" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Yêu cầu công việc<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea wire:model.defer="requirement" type="text" class="form-control" placeholder="Nhập yêu cầu công việc" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Trình độ<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9" wire:ignore>
                                                <select wire:model.defer="level" type="text" class="form-control" id="jobLevel">
                                                    <option selected="selected" value="">Chọn trình độ</option>
                                                    <option value="1">Intern</option>
                                                    <option value="2">Fresher</option>
                                                    <option value="3">Junior</option>
                                                    <option value="4">Senior</option>
                                                    <option value="5">Team Lead</option>
                                                    <option value="6">Manager</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Kinh nghiệm<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <input wire:model.defer="exp" type="text" class="form-control" placeholder="Kinh nghiệm">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Mức lương<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <input wire:model.defer="salary" type="text" class="form-control" placeholder="Mức lương">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Quyền lợi<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea wire:model.defer="benefit" type="text" class="form-control" placeholder="Quyền lợi công việc" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Ngành nghề</label>
                                            <div class="col-sm-9" wire:ignore>
                                                <select wire:model.defer="type" type="text" class="form-control" id="jobType">
                                                    <option selected="selected" value="">Chọn ngành nghề</option>
                                                    <option value="1">Web Developer</option>
                                                    <option value="2">Mobile Developer</option>
                                                    <option value="3">Business Analyst</option>
                                                    <option value="4">Automation Test</option>
                                                    <option value="5">Data Scientist</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Nơi làm việc</label>
                                            <div class="col-sm-9" wire:ignore>
                                                <select wire:model.defer="address_id" type="text" class="form-control" id="jobProvince">
                                                    <option value="1">Hồ Chí Minh</option>
                                                    <option value="2">Hà Nội</option>
                                                    <option value="3">An Giang</option>
                                                    <option value="4">Bạc Liêu</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Hạn nộp hồ sơ<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <input wire:model.defer="end_date" type="date" class="form-control" placeholder="Nhập nơi làm việc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card recuitment-card">
                                <div class="card-header recuitment-card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Kĩ năng công việc
                                            <span id="clickc1_advance3" class="clicksd">
                                                <i class="fa fa fa-angle-up"></i>
                                            </span>
                                        </a>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body recuitment-body">
                                        <div class="checkboxsec" id="checkboxSection">
                                            @foreach($tags as $tag)
                                            <div class="filter-topic" style = 'padding: 8px 50px'>
                                                <label class="label-container">
                                                    <span>{{$tag->name}}</span>
                                                    <input type="checkbox" {{in_array($tag->id, $tagSelect)?'checked':''}} class='tags' name="tags[]" value="{{$tag->id}}">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <center>
                            <div class="rec-submit">
                                <button wire:click="create" class="btn-submit-recuitment">
                                    <i class="fa fa-floppy-o pr-2"></i>Lưu Tin
                                </button>
                            </div>
                        </center>
                        
                    </div>

                </div>
                <!-- Side bar -->
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="recuiter-info">
                        <div class="recuiter-info-avt">
                            <img src="img/icon_avatar.jpg">
                        </div>
                        <div class="clearfix list-rec">
                            <h4>NESTLE Inc.</h4>
                            <ul>
                                <li><a href="#">Việc làm đang đăng <strong>(0)</strong></a></li>
                                <li><a href="#">Follower <strong>(450)</strong></a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="block-sidebar" style="margin-bottom: 20px;">
                        <header>
                            <h3 class="title-sidebar font-roboto bg-primary">
                                Trung tâm quản lý
                            </h3>
                        </header>
                        <div class="content-sidebar menu-trung-tam-ql menu-ql-employer">
                            <h3 class="menu-ql-ntv">
                                Quản lý tài khoản
                            </h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        Tài khoản
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Giấy phép kinh doanh
                                    </a>
                                </li>
                            </ul>
                            <h3 class="menu-ql-ntv">
                                Quản lý dịch vụ
                            </h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        Lịch sử dịch vụ
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        Báo giá
                                    </a>
                                </li>
                            </ul>
                            <h3 class="menu-ql-ntv">
                                Quản lý tin tuyển dụng
                            </h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        Đăng tin tuyển dụng
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Danh sách tin tuyển dụng
                                    </a>
                                </li>
                            </ul>
                            <h3 class="menu-ql-ntv">
                                Quản lý ứng viên
                            </h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        Tìm kiếm hồ sơ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Hồ sơ đã lưu
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Hồ sơ đã ứng tuyển
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Thông báo hồ sơ phù hợp">
                                        Thông báo hồ sơ phù hợp
                                    </a>
                                </li>
                            </ul>
                            <h3 class="menu-ql-ntv">
                                Hỗ trợ và thông báo
                            </h3>
                            <ul>
                                <li>
                                    <a href="#" title="Gửi yêu cầu đến ban quản trị">
                                        Gửi yêu cầu đến ban quản trị
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Ban quản trị thông báo">
                                        Ban quản trị thông báo
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Hướng dẫn thao tác">
                                        Hướng dẫn thao tác
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <span>Thông tin thanh toán</span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="#">
                                        <span>Cổng tra cứu lương</span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="#">
                                        <span> Cẩm nang tuyển dụng</span>
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li class="logout">
                                    <a href="#" title="Đăng xuất">
                                        Đăng xuất
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- (end) published recuitment -->
    <div class="clearfix"></div>
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
</div>
<!-- (end) job support -->
<script>
    $("document").ready(() => {
        $('#jobGender').on('change', function (e) {
            var data = $('#jobGender').select2('val');
        @this.set('gender', data);
        });
        $('#jobLevel').on('change', function (e) {
            var data = $('#jobLevel').select2('val');
        @this.set('level', data);
        });
        $('#jobType').on('change', function (e) {
            var data = $('#jobType').select2('val');
        @this.set('type', data);
        });
        $('#jobProvince').on('change', function (e) {
            var data = $('#jobProvince').select2('val');
        @this.set('address_id', data);
        });
        $('.tags').on('change', function (e) {
            var data = $("input:checked").map(function(){
                return $(this).val();
            }).get();
            @this.set('tagSelect', data);
        });
    })
</script>