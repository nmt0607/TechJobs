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
    <!-- (end) widget recuitment  -->

    <!-- published recuitment -->
    <div class="container-fluid published-recuitment-wrapper">
        <div class="container published-recuitment-content">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-12 recuitment-inner">
                    <div class="employee-form">
                        <div class="accordion" id="accordionExample">
                            <div class="card recuitment-card">
                                <div class="card-header recuitment-card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <a class="btn btn-link btn-block text-left recuitment-header" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Thông tin tài khoản
                                            <span id="clickc1_advance2" class="clicksd">
                                                <i class="fa fa fa-angle-up"></i>
                                            </span>
                                        </a>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body recuitment-body row">
                                        <div class="col-md-3">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' wire:model="imageUpload" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url({{asset($imagePath)}});">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right label">Họ tên<span style="color: red" class="pl-2">*</span></label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="name" type="text" class="form-control" placeholder="Nhập họ và tên">
                                                    @error("name")
                                                    @include("layouts.partials.text._error")
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right label">Số điện thoại<span style="color: red" class="pl-2">*</span></label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="phone" type="number" class="form-control">
                                                    @error("phone")
                                                    @include("layouts.partials.text._error")
                                                    @enderror
                                                </div>
                                            </div>
                                            @if($type == 2)
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right label">Giới tính</label>
                                                <div class="col-sm-9" wire:ignore>
                                                    <select id='jobGender' wire:model.defer="sex" type="text" class="form-control" id="jobGender">
                                                        <option>Chọn giới tính</option>
                                                        <option value="1">Nam</option>
                                                        <option value="2">Nữ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right label">Ngày sinh</label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="date" type="date" class="form-control" placeholder="Nhập nơi làm việc">
                                                </div>
                                            </div>
                                            @else
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right label">Trụ sở<span style="color: red" class="pl-2">*</span></label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="address" type="text" class="form-control" placeholder="Trụ sở công ty">
                                                    @error("address")
                                                    @include("layouts.partials.text._error")
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right label">Quy mô<span style="color: red" class="pl-2">*</span></label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="size" type="text" class="form-control" placeholder="Quy mô công ty (người)">
                                                    @error("size")
                                                    @include("layouts.partials.text._error")
                                                    @enderror
                                                </div>
                                            </div>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right label">Email<span style="color: red" class="pl-2">*</span></label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="email" type="text" class="form-control" placeholder="Địa chỉ email" readonly>
                                                </div>
                                            </div>

                                            <div class="wrap-comp-info mb-2 mt-3">
                                                <a data-toggle="modal" data-target="#modalChangePassword" class="btn btn-primary btn-company" style="color: white">Đổi mật khẩu</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @if($type == 2)
                            <div class="card recuitment-card">
                                <div class="card-header recuitment-card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Thông tin chung
                                            <span id="clickc1_advance1" class="clicksd">
                                                <i class="fa fa fa-angle-up"></i>
                                            </span>
                                        </a>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body recuitment-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Trình độ</label>
                                            <div class="col-sm-9" wire:ignore>
                                                <select id='jobLevel' wire:model.defer="level" type="text" class="form-control" id="jobLevel">
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
                                            <label class="col-sm-3 col-form-label text-right label">Số năm kinh nghiệm</label>
                                            <div class="col-sm-9">
                                                <input wire:model.defer="exp" type="text" class="form-control" placeholder="Nhập số năm khinh nghiệm" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label wire:model.defer="type_job" class="col-sm-3 col-form-label text-right label">Công việc mong muốn</label>
                                            <div class="col-sm-9" wire:ignore>
                                                <select id='jobType' type="text" class="form-control" id="empWishJob" wire:model='type_job'>
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
                                            <label class="col-sm-3 col-form-label text-right label">Mong muốn mức lương tối thiểu (VNĐ/ tháng)</label>
                                            <div class="col-sm-9">
                                                <input wire:model.defer="salary" type="number" class="form-control" placeholder="Nhập số" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Tỉnh/Thành phố</label>
                                            <div class="col-sm-9" wire:ignore>
                                                <select id='jobProvince' wire:model.defer="province_id" type="text" class="form-control" id="empWishPlace">
                                                    <option value="1">Hồ Chí Minh</option>
                                                    <option value="2">Hà Nội</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Nơi ỏ hiện tại</label>
                                            <div class="col-sm-9">
                                                <input wire:model.defer="address" type="text" class="form-control" placeholder="Nhập địa chỉ" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card recuitment-card">
                                <div class="card-header recuitment-card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Kĩ năng công việc
                                            <span id="clickc1_advance3" class="clicksd">
                                                <i class="fa fa fa-angle-up"></i>
                                            </span>
                                        </a>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body recuitment-body">
                                        <div class="checkboxsec" id="checkboxSection">
                                            @foreach($tags as $tag)
                                            <div class="filter-topic" style='padding: 8px 50px'>
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
                            @else
                            <div class="card recuitment-card">
                                <div class="card-header recuitment-card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Giới thiệu công ty
                                            <span id="clickc1_advance1" class="clicksd">
                                                <i class="fa fa fa-angle-up"></i>
                                            </span>
                                        </a>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body recuitment-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label text-right label">Giới thiệu<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-10">
                                                <textarea wire:model.defer="description" rows="14" type="text" class="form-control" placeholder="Giới thiệu công ty (<5000 ký tự)" rows="5"></textarea>
                                                @error("description")
                                                @include("layouts.partials.text._error")
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <hr>
                        <center>
                            <div class="rec-submit">
                                <button wire:click='update' class="btn-submit-recuitment mb-3 ml-3" name="">
                                    <i class="fa fa-floppy-o pr-2"></i>Lưu Hồ Sơ
                                </button>
                            </div>
                        </center>

                    </div>

                </div>
                <!-- Side bar -->
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="recuiter-info">
                        <div class="recuiter-info-avt">
                            <img src="{{asset($imagePath)}}">
                        </div>
                        <div class="clearfix list-rec">
                            <h4>{{$name}}</h4>
                            <center>
                                <div wire:ignore style="display: inline-block; top: -2px" class="rateYo" rate='{{$user->rate()}}'></div>
                                <span>({{$user->rateCount()}} đánh giá)</span>
                            </center><br>
                            <ul>
                                @if($type == 2)
                                <li><a href="#">Công việc đang ứng tuyển <strong>({{$user->jobApplying->count()}})</strong></a></li>
                                <li><a href="#">Công việc đã hoàn thành <strong>({{$user->jobFinish->count()}})</strong></a></li>
                                @else
                                <li><a href="#">Công việc đang đăng <strong>({{$user->jobsCreate->count()}})</strong></a></li>
                                <li><a href="#">Ứng viên đang ứng tuyển <strong>({{$user->countApplyingUser()}})</strong></a></li>
                                @endif
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
                                Hồ sơ của bạn
                            </h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        Quản lý Tài khoản
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Quản lý hồ sơ
                                    </a>
                                </li>
                            </ul>
                            <h3 class="menu-ql-ntv">
                                Việc làm của bạn
                            </h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        Việc làm đã lưu
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        Việc làm dã ứng tuyển
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
    @livewire('component.support')
    <div wire:ignore.self class="modal fade" id="modalChangePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 20vh; max-width: 600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h2>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right label">Mật khẩu cũ<span style="color: red" class="pl-2">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" wire:model.defer="oldPassword">
                            @error("oldPassword")
                            @include("layouts.partials.text._error")
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right label">Mật khẩu mới<span style="color: red" class="pl-2">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" wire:model.defer="newPassword">
                            @error("newPassword")
                            @include("layouts.partials.text._error")
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right label">Nhập lại mật khẩu mới<span style="color: red" class="pl-2">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" wire:model.defer="confirmPassword">
                            @error("confirmPassword")
                            @include("layouts.partials.text._error")
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" wire:click="changePassword()"><i class="fa fa-floppy-o pr-2"></i>Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <!-- (end) job support -->
</div>
<script>
    $("document").ready(() => {
        $('.tags').on('change', function(e) {
            var data = $("input:checked").map(function() {
                return $(this).val();
            }).get();
            @this.set('tagSelect', data);
        });
        $('#modalChangePassword').on('hidden.bs.modal', function() {
            @this.emit('resetData');
        })
        window.livewire.on('close-modal', () => {
            $("#close-modal").click();
        });
        $('#jobGender').on('change', function(e) {
            var data = $('#jobGender').select2('val');
            @this.set('sex', data);
        });
        $('#jobLevel').on('change', function(e) {
            var data = $('#jobLevel').select2('val');
            @this.set('level', data);
        });
        $('#jobType').on('change', function(e) {
            var data = $('#jobType').select2('val');
            @this.set('type_job', data);
        });
        $('#jobProvince').on('change', function(e) {
            var data = $('#jobProvince').select2('val');
            @this.set('province_id', data);
        });
    })
    $(function() {
        $(".rateYo").rateYo({
            starWidth: "15px",
            halfStar: true,
            rating: $(".rateYo").attr('rate'),
            readOnly: true
        });
    });
</script>