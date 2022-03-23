<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Quản lý người đại diện
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Danh sách người đại diện</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-2">
            {{--            <div class="form-group row">--}}
            {{--                <label for="Search" class="col-1 col-form-label">Search</label>--}}
            {{--                <div class="col-4">--}}
            {{--                    <input wire:model.debounce.1000ms="search" placeholder="Search"type="text" class="form-control">--}}
            {{--                </div>--}}
            {{--                --}}
            {{--            </div>--}}
            <div class="form-group row">
                <label for="name" class="col-1 col-form-label">Tên người đại diện</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchName" placeholder="Nhập tên người đại diện" type="text"
                           class="form-control">
                </div>
                <label for="phone" class="offset-1 col-1 col-form-label">Số điện thoại</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchPhone" placeholder="Số điện thoại" type="text"
                           class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-1 col-form-label">Email</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchEmail" placeholder="Nhập Email" type="text"
                           class="form-control">
                </div>
{{--                <label for="position" class="offset-1 col-1 col-form-label">Chức danh</label>--}}
{{--                <div class="col-4">--}}
{{--                    <input wire:model.debounce.1000ms="searchPosition" placeholder="Nhập chức danh" type="text"--}}
{{--                           class="form-control">--}}
{{--                </div>--}}
            </div>
{{--            <div class="form-group row">--}}
{{--                <label for="customer_id" class="col-1 col-form-label">Khách hàng</label>--}}
{{--                <div class="col-4">--}}
{{--                    <input wire:model.debounce.1000ms="searchCustomerId" placeholder="Customer" type="text"--}}
{{--                           class="form-control">--}}
{{--                </div>--}}
{{--            </div>--}}


            <div class="filter d-flex align-items-center justify-content-between mb-2">
                <button type="button" class="btn btn-secondary" wire:click="resetSearch()"><i class="fa fa-undo"></i>
                    Làm mới
                </button>
                <div>
                    <div style="float: left;text-align: center;">
                        <a href="#" data-toggle="modal" data-target="#modelCreateEdit" wire:click='create'>
                            <div class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tạo mới
                            </div>
                        </a>
                    </div>
                    <div style="margin-left:5px;float: left;text-align: center;">
                        <a href="#" data-toggle="modal" data-target="#modelExport" wire:click='create'>
                            <div class="btn btn-success">
                                <i class="fa fa-download"></i> Export
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div wire:loading class="loader"></div>
            <table class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                   aria-describedby="example2_info">
                <thead>
                <tr role='row'>
                    <th>STT</th>

                    <th class="{{$key_name=="name"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}"
                        wire:click="sorting('name')">Tên người đại diện
                    </th>
                    <th class="{{$key_name=="phone"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}"
                        wire:click="sorting('phone')">Số điện thoại
                    </th>
                    <th class="{{$key_name=="email"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}"
                        wire:click="sorting('email')">Email
                    </th>
                    <th class="{{$key_name=="position"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}"
                        wire:click="sorting('position')">Chức danh
                    </th>
                    <th class="{{$key_name=="customer_id"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}"
                        wire:click="sorting('customer_id')">Khách hàng
                    </th>

                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $row)
                    <tr>
                        <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                        <td>{!!boldTextSearchV2($row->name,$searchName)!!}</td>
                        <td>{!!boldTextSearchV2($row->phone,$searchPhone)!!}</td>
                        <td>{!!boldTextSearchV2($row->email,$searchEmail)!!}</td>
                        <td>{!!boldTextSearchV2($row->position,$searchPosition)!!}</td>
                        <td><span data-toggle="tooltip" data-placement="top" title="{{$row->getCustomerName()}}">{{$row->getCustomerName()}}</span></td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#modelCreateEdit" class="btn par6"
                                    title="update" wire:click='edit({{$row}})'>
                                <img src="/images/pent2.svg" alt="pent">
                            </button>
                            @include('livewire.common.buttons._delete')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(!isset($data) || !count($data))
                <div class="pb-2 pt-3 text-center">Không tìm thấy dữ liệu</div>
            @endif
        </div>
        {{$data->links()}}
    </div>
    {{--Start modal--}}
    <div wire:ignore.self class="modal fade" id="modelCreateEdit" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$this->mode=='create'?"Thêm mới":"Chỉnh sửa"}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            wire:click="resetValidate()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Tên người đại diện(<span style="color:red">*</span>)</label>
                        <input type="text" class="form-control" placeholder="Tên người đại diện"
                               wire:model.defer="name">
                        @error("name")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                {{--                <div class="modal-body">--}}
                {{--                    <div class="form-group">--}}
                {{--                        <label> Code(<span style="color:red">*</span>)</label>--}}
                {{--                        <input type="text"  class="form-control" placeholder="Code" wire:model.defer="code">--}}
                {{--                        @error("code")--}}
                {{--                            @include("layouts.partials.text._error")--}}
                {{--                        @enderror--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="modal-body">
                    <div class="form-group">
                        <label> Số điện thoại(<span style="color:red">*</span>)</label>
                        <input type="text" class="form-control" placeholder="Phone" wire:model.defer="phone">
                        @error("phone")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Email(<span style="color:red">*</span>)</label>
                        <input type="text" class="form-control" placeholder="Email" wire:model.defer="email">
                        @error("email")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Chức danh(<span style="color:red">*</span>)</label>
                        <input type="text" class="form-control" placeholder="Nhập chức danh"
                               wire:model.defer="position">
                        @error("position")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Khách hàng(<span style="color:red">*</span>)</label>
                        <select type="text" class="form-control select2-box" place
                               wire:model.defer="customer_id" multiple="multiple">
                            <option value="" hidden>Chọn khách hàng</option>
                            @if(!$customer->count())
                                <option value="" disabled>Không có bản ghi hiển thị</option>
                            @endif
                            @foreach($customer as $key => $cust)
                                <option value="{{$key}}">{{$cust}}</option>
                            @endforeach
                        </select>
                        @error("customer_id")
                        @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Ghi chú</label>
                        <input type="text" class="form-control" placeholder="Ghi chú" wire:model.defer="note">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="resetValidate()">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-primary" wire:click='saveData'>Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modelExport" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Tải file excel xuống</h2>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xuất file không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
                    <button type="button" wire:click="export" class="btn btn-primary" data-dismiss="modal"
                            id='btn-upload-film'>Đồng ý
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.common._modalDelete')
    {{--end modal--}}

</div>

<script>
    $("document").ready(() => {
        window.livewire.on('closeModalCreateEdit', () => {
            $('#modelCreateEdit').modal('hide');
        });
        $('.select2-box').on('change', function (e) {
            var data = $('.select2-box').select2("val");
            @this.set('customer_id', data);
        });
    });
</script>
