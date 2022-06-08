<div>
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
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right label">Số điện thoại</label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="phone" type="number" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right label">Giới tính<span style="color: red" class="pl-2">*</span></label>
                                                <div class="col-sm-9">
                                                    <select wire:model.defer="sex" type="text" class="form-control" id="jobGender">
                                                        <option value="">Chọn giới tính</option>
                                                        <option value="">Nam</option>
                                                        <option value="">Nữ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right label">Ngày sinh<span style="color: red" class="pl-2">*</span></label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="date" type="date" class="form-control" placeholder="Nhập nơi làm việc">
                                                </div>
                                            </div>
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
                                            <label class="col-sm-3 col-form-label text-right label">Trình độ<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <select wire:model.defer="level" type="text" class="form-control" id="jobLevel">
                                                    <option selected="selected" value="">Chọn trình độ</option>
                                                    <option value="6">Đại học</option>
                                                    <option value="5">Cao đẳng</option>
                                                    <option value="4">Trung cấp</option>
                                                    <option value="7">Cao học</option>
                                                    <option value="3">Trung học</option>
                                                    <option value="2">Chứng chỉ</option>
                                                    <option value="1">Lao động phổ thông</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Số năm kinh nghiệm<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <input wire:model.defer="exp" type="text" class="form-control" placeholder="Nhập số năm khinh nghiệm" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label wire:model.defer="type_job" class="col-sm-3 col-form-label text-right label">Công việc mong muốn<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <select type="text" class="form-control" id="empWishJob">
                                                    <option value="10">Bán hàng</option>
                                                    <option value="47">Tài chính/Kế toán/Kiểm toán</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Mong muốn mức lương tối thiểu (VNĐ/ tháng)<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <input wire:model.defer="salary" type="number" class="form-control" placeholder="Nhập số" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Tỉnh/Thành phố<span style="color: red" class="pl-2">*</span></label>
                                            <div class="col-sm-9">
                                                <select wire:model.defer="province_id" type="text" class="form-control" id="empWishPlace">
                                                    <option value="1">Hồ Chí Minh</option>
                                                    <option value="2">Hà Nội</option>
                                                    <option value="3">An Giang</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right label">Nơi ỏ hiện tại<span style="color: red" class="pl-2">*</span></label>
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
                            <ul>
                                <li><a href="#">Nhà tuyển dụng của tôi <strong>(0)</strong></a></li>
                                <li><a href="#">Việc làm đã lưu <strong>(450)</strong></a></li>
                                <li><a href="#">Việc làm đã nộp <strong>(1150)</strong></a></li>
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
    <div wire:ignore.self class="modal fade" id="modalChangePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h2>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right label">Mật khẩu cũ(<span style="color:red">*</span>)</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" wire:model.defer="oldPassword">
                            @error("oldPassword")
                            @include("layouts.partials.text._error")
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right label">Mật khẩu mới(<span style="color:red">*</span>)</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" wire:model.defer="newPassword">
                            @error("newPassword")
                            @include("layouts.partials.text._error")
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right label">Nhập lại mật khẩu mới(<span style="color:red">*</span>)</label>
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
    })
</script>