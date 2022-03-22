<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Unit
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Unit</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-2">
            <div class="form-group row">
                <label for="name" class="col-1 col-form-label">Tên đơn vị</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchName" placeholder="Nhập tên đơn vị..." type="text" class="form-control">
                </div>
                <label for="address" class="offset-1 col-1 col-form-label">Địa chỉ</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchAddress" placeholder="Nhập địa chỉ..." type="text" class="form-control">
                </div>
            </div>


            <div class="filter d-flex align-items-center justify-content-between mb-2">
                <button type="button" class="btn btn-secondary" wire:click="resetSearch()"><i class="fa fa-undo"></i> Làm mới</button>
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

            {{-- <div wire:loading class="loader"></div> --}}
            <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role='row'>
                        <th>STT</th>
                        
                        <th class="{{$key_name=="name"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('name')">Tên đơn vị</th>
                        <th class="{{$key_name=="address"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('address')">Địa chỉ</th>
                        <th class="{{$key_name=="province"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('province')">Tỉnh</th>
                        <th class="{{$key_name=="district"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('district')">Huyện</th>
                        <th class="{{$key_name=="parent_id"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('parent_id')">Đơn vị cấp trên</th>
                        <th class="{{$key_name=="number_of_staffs"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('number_of_staffs')">Số nhân sự</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                            <td>{!!boldTextSearchV2($row->name,$searchName)!!}</td>
                            <td>{!!boldTextSearchV2($row->address,$searchAddress)!!}</td>
                            <td>{{$row->province_name}}</td>
                            <td>{{$row->district_name}}</td>
                            <td>{{isset($parentUnit[$row->parent_id])?$parentUnit[$row->parent_id]:''}}</td>
                            <td>{{$row->number_of_staffs}}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modelCreateEdit"  class="btn par6" title="update" wire:click='edit({{$row}})'>
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
    <div wire:ignore.self class="modal fade" id="modelCreateEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$this->mode=='create'?"Thêm mới":"Chỉnh sửa"}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="resetValidate()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Tên đơn vị(<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Tên đơn vị" wire:model.defer="name">
                        @error("name")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Địa chỉ(<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Địa chỉ" wire:model.defer="address">
                        @error("address")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Tỉnh(<span style="color:red">*</span>)</label>
                        <select name="" id="" wire:model="province" class="form-control select2-box" {{ $mode == 'show' ? 'disabled' : ''}} >
                            <option value="">--Chọn tỉnh--</option>
                            @foreach ($provinces as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @error("province")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Huyện(<span style="color:red">*</span>)</label>
                        <select name="" id="" wire:model="district" class="form-control select2-box" {{ $mode == 'show' ? 'disabled' : ''}} >
                            <option value="">--Chọn huyện--</option>
                            @foreach ($districts as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @error("district")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Đơn vị cấp trên(<span style="color:red">*</span>)</label>
                        <select class="form-control" wire:model.defer="parent_id" {{$mode=="show"?"disabled":""}}>
                            <option value="">---Chọn đơn vị cấp trên---</option>
                            @foreach($parentUnitEdit as $key => $value)
                                @if($mode=='create')
                                    <option value="{{$key}}">{{$value}}</option>
                                @elseif($key !== $editId )
                                    <option value="{{$key}}">{{$value}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error("parent_id")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Số nhân sự(<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Số nhân sự" wire:model.defer="number_of_staffs">
                        @error("number_of_staffs")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="resetValidate()">Đóng</button>
                    <button type="button" class="btn btn-primary" wire:click='saveData'>Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modelExport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" wire:click="export" class="btn btn-primary" data-dismiss="modal" id='btn-upload-film'>Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.common._modalDelete')
    {{--end modal--}}

</div>

{{-- <script>
    $("document").ready(() => {
        window.livewire.on('closeModalCreateEdit', () => {
            $('#modelCreateEdit').modal('hide');
        });
    });
</script> --}}