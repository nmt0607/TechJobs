@section('css')
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endsection
<div class="card py-2 px-3">
        <div class="form_title">
            <label>Tên người dùng (<span style='color:red;'>*</span>)</span> </label>
            <div class="row">
                <div class="col">
                    <div class="input-group form-group">
                        {!! Form::text('name',null, array('placeholder' => 'Nhập tên người dùng','class' => 'form_control col-md-3')) !!}
                        @error('name')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form_title">
            <label>Email (<span style='color:red;'>*</span>) </label>
            <div class="row">
                <div class="col">
                    <div class="input-group form-group">
                        {!! Form::text('email',null, array('placeholder' => 'Nhập email', 'class' => 'form-control col-md-3')) !!}
                        @error('email')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
            </div>
        </div> 

        <div class="form_title">
            @if(!isset($data))
            <label>Mật khẩu (<span style='color:red;'>*</span>) </label>
            <div class="row">
                <div class="col">
                    <div class="input-group form-group">
                        <input id="password" name="password" type="password" placeholder="Mật khẩu" class="form-control col-md-3" value="">
                        @error('password')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
            </div>
            @else
            <label>Mật khẩu mới(<span style='color:red;'>*</span>) </label>
            <div class="row">
                <div class="col">
                    <div class="input-group form-group">
                        {!! Form::text('password_new', null, array('placeholder' => 'Mật khẩu mới','class' => 'form-control col-md-3')) !!}
                        @error('password_new')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
            </div>
            @endif
            @if(!isset($data))
            <label>Xác nhận mật khẩu (<span style='color:red;'>*</span>) </label>
            <div class="row">
                <div class="col">
                    <div class="input-group form-group">
                        <input id="password_confirm" name="password_confirm" type="password" placeholder="Xác nhận mật khẩu" class="form-control col-md-3" value="">
                        @error('password_confirm')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="form_title">
            <label>Vai trò</label>
            <div class="row">
                <div class="col">
                    <div class="input-group form-group" id="select_box1"> 
                        {!! Form::select('roles[]', $roles,isset($rolesUser)? $rolesUser : [], array('placeholder'=>"chọn quyền",'class' => 'form_control select_box col-md-3','multiple')) !!}
                    </div>
                </div>
            </div> 
        </div>
        {{-- <div class="form-group row">
            <label for="roles" class="col-2 col-form-label ">Quyền</label>
            <div class="col-4">
                {!! Form::select('roles[]', $roles,[], array('class' => 'form_control select_box col-md-12','multiple')) !!}
            </div>
        </div> --}}
        
        <div class="w-100 clearfix my-2">
            <button name="submit" type="submit" id="save" class="float-right btn ml-1 btn-primary">Lưu lại</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary float-right mr-1">Hủy</a>          
        </div>
</div>
@section('js')
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(function () {
                $(".select_box").select2({
                    placeholder: "Chọn  quyền...",
                    allowClear: true
                });
            });
        });
    </script>
@endsection