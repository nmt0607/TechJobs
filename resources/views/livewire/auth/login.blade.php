<div class="login-main">
    <div class="w-login m-auto">
        <div class="row">
            <!-- login main descriptions -->
            <div class="col-md-6 col-sm-12 col-12 login-main-left">
                <img src="img/banner-login.png">
            </div>
            <!-- login main form -->
            <div class="col-md-6 col-sm-12 col-12 login-main-right">
                @if($mode=='login')
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-main-header">
                        <h3>Đăng Nhập</h3>
                    </div>
                    <div class="input-div one mt-4">
                        <div class="div lg-lable">
                            <h5>Username</h5>
                            <input name="email" type="text" class="input form-control-lgin">
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="div lg-lable">
                            <h5>Password</h5>
                            <input name="password" type="password" class="input form-control-lgin">
                        </div>
                    </div>
                    <div class="form-group d-block frm-text">
                        <a href="#" class="fg-login d-inline-block">Quên mật khẩu</a>
                        <a wire:click="changeMode('register')" class="fg-login float-right d-inline-block">Bạn chưa có tài khoản? Đăng ký</a>
                    </div>
                    <button type="submit" class="btn btn-primary float-right btn-login d-block w-100">Đăng Nhập</button>
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
                <form class="login-form">
                    <div class="login-main-header">
                        <h3>Đăng Ký</h3>
                    </div>
                    <div class="input-div one">
                        <div class="div lg-lable">
                            <h5>Họ Và Tên<span class="req">*</span></h5>
                            <input type="text" class="input form-control-lgin">
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="div lg-lable">
                            <h5>Họ Và Tên</h5>
                            <input type="text" class="input form-control-lgin">
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="div lg-lable">
                            <h5>Số điện thoại</h5>
                            <input type="text" class="input form-control-lgin">
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="div lg-lable">
                            <h5>Mật khẩu<span class="req">*</span></h5>
                            <input type="password" class="input form-control-lgin">
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="div lg-lable">
                            <h5>Nhập Lại Mật khẩu<span class="req">*</span></h5>
                            <input type="password" class="input form-control-lgin">
                        </div>
                    </div>
                    <div class="form-group d-block frm-text">
                        <a href="#" class="fg-login d-inline-block"></a>
                        <a href="#" class="fg-login float-right d-inline-block">Bạn đã có tài khoản? Đăng Nhập</a>
                    </div>
                    <button type="submit" class="btn btn-primary float-right btn-login d-block w-100">Đăng Ký</button>

                </form>
                @endif

            </div>
        </div>
    </div>
</div>