<div class="login-main" style="height: 530px">
    <div class="w-login m-auto">
        <div class="row">
            <!-- login main descriptions -->
            <div class="col-md-1 col-sm-12 col-12 login-main-left">
            </div>
            <div class="col-md-6 col-sm-12 col-12 login-main-left">
                <img src="img/banner-login.png" style="height: 520px">
            </div>
            <!-- login main form -->
            <div class="col-md-5 col-sm-12 col-12 login-main-right">
                @if($mode=='login')
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-main-header">
                        <h3>Đăng Nhập</h3>
                    </div>
                    <ul hidden class="nav align-items-start align-items-md-center justify-content-md-center flex-md-row flex-column">
                        <li class="nav-item mb-2">
                            <span class="radio-style">
                                <input type="radio" name="type" value="2">
                                <label class="form-control-label" for="type_2">Tôi muốn tuyển dụng</label>
                            </span>
                        </li>
                        <li class="nav-item mb-2 d-none d-md-block">
                            <span class="nav-item-divider style-3 ml-3 mr-3"></span>
                        </li>
                        <li class="nav-item mb-2">
                            <span class="radio-style">
                                <input type="radio" name="type" value="1">
                                <label class="form-control-label" for="type_1">Tôi muốn tìm việc</label>
                            </span>
                        </li>
                    </ul>
                    <div class="input-div one mt-4">
                        <div class="div lg-lable">
                            <h5>Username</h5>
                            <input wire:model.defer="email" name="email" type="text" class="input form-control-lgin">
                        </div>
                        @error("email")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="input-div one mt-4" hidden>
                        <div class="div lg-lable">
                            <h5></h5>
                            <input type="text" class="input form-control-lgin">
                        </div>
                    </div>
                    <div class="input-div one mt-4" hidden>
                        <div class="div lg-lable">
                            <h5></h5>
                            <input type="text" class="input form-control-lgin">
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="div lg-lable">
                            <h5>Password</h5>
                            <input wire:model.defer="password" name="password" type="password" class="input form-control-lgin">
                        </div>
                        @error("password")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group d-block frm-text">
                        <a href="#" class="fg-login d-inline-block">Quên mật khẩu</a>
                        <a href="#" wire:click="changeMode('register')" class="fg-login float-right d-inline-block">Bạn chưa có tài khoản? Đăng ký</a>
                    </div>
                    <button type="submit" class="btn btn-primary float-right btn-login d-block w-100">Đăng Nhập</button>
                    <button id="login" type="submit" style="display:none!important">Đăng Nhập</button>
                    <div class="form-group d-block w-100 mt-5">
                        <div class="text-or text-center">
                            <span>Hoặc</span>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-12 pr-7">
                                <button class="btn btn-secondary btn-login-facebook btnw w-100 float-left">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                    <span>Đăng nhập bằng Facebook</span>
                                </button>
                            </div>
                            <div class="col-sm-6 col-12 pl-7">
                                <button class="btn btn-secondary btn-login-google btnw w-100 float-left">
                                    <i class="fa fa-google" aria-hidden="true"></i>
                                    <span>Đăng nhập bằng Google</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
                @else
                <form class="login-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="login-main-header">
                        <h3>Đăng ký</h3>
                    </div>
                    <ul class="mt-4 nav align-items-start align-items-md-center justify-content-md-center flex-md-row flex-column">
                        <li class="nav-item mb-2">
                            <span class="radio-style">
                                <input type="radio" name='type' value="1" checked>
                                <label class="form-control-label">Tôi muốn tuyển dụng</label>
                            </span>
                        </li>
                        <li class="nav-item mb-2 d-none d-md-block">
                            <span class="nav-item-divider style-3 ml-3 mr-3"></span>
                        </li>
                        <li class="nav-item mb-2">
                            <span class="radio-style">
                                <input type="radio" name='type' value="2">
                                <label class="form-control-label">Tôi muốn tìm việc</label>
                            </span>
                        </li>
                    </ul>
                    <div class="input-div one mt-2">
                        <div class="div lg-lable">
                            <h5>Họ và tên</h5>
                            <input wire:model.defer='name' name="name" type="text" class="input form-control-lgin">
                        </div>
                        @error("name")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="input-div one mt-4">
                        <div class="div lg-lable">
                            <h5>Email</h5>
                            <input wire:model.defer='email' name="email" type="text" class="input form-control-lgin">
                        </div>
                        @error("email")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="input-div pass mt-4">
                        <div class="div lg-lable">
                            <h5>Mật khẩu</h5>
                            <input wire:model.defer='password' name="password" type="password" class="input form-control-lgin">
                        </div>
                        @error("password")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="input-div pass mt-4">
                        <div class="div lg-lable">
                            <h5>Nhập lại mật khẩu</h5>
                            <input wire:model.defer='password_confirmation' name="password_confirmation" type="password" class="input form-control-lgin">
                        </div>
                        @error("password_confirmation")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group d-block frm-text">
                        <a class="fg-login d-inline-block"></a>
                        <a href="#" wire:click="changeMode('login')" class="fg-login float-right d-inline-block">Bạn đã có tài khoản? Đăng Nhập</a>
                    </div>
                    <button type="submit" type="button" class="btn btn-primary float-right btn-login d-block w-100">Đăng Ký</button>
                    <button id='register' type="submit" class="btn btn-primary float-right btn-login d-block w-100" style="display:none!important"></button>
                </form>
                @endif

            </div>
        </div>
    </div>
</div>
<script>
    window.livewire.on('register', () => {
        $("#register").click();
    });
</script>