<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Sản phẩm dịch vụ
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Service Product</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-2">
            <div class="form-group row">
                <label for="name" class="col-1 col-form-label">Tên sản phẩm</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchName" placeholder="Tên sản phẩm"type="text" class="form-control">
                </div>
            </div>
            <div class="d-flex justify-content-between mb-2 from-group row">
                <div class="col-5 ml-auto">                    
                    <button type="button" class="btn btn-secondary" wire:click="resetSearch()"><i class="fa fa-undo"></i> Làm mới</button>
                </div>
                <div class='justify-content-end'>
                    <div style="margin-right:5px;float: left;text-align: center;">
                        <a href="#" data-toggle="modal" data-target="#modelCreateEdit" wire:click='create'>
                            <div class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tạo mới
                            </div>
                        </a>
                    </div>
                    <div style="margin-right:7px;float: left;text-align: center;">
                        <a href="#" data-toggle="modal" data-target="#modelExport">
                            <div class="btn btn-success">
                                <i class="fa fa-download"></i> Export
                            </div>
                        </a>
                    </div>
                    <div style="margin-right:7px;float: left;text-align: center;">
                        <button class ='btn btn-danger' data-toggle="modal" data-target="#modal-delete-all" {{(count($products))?'':'disabled'}}>
                            <!-- <div class="btn btn-danger"> -->
                                <i class="fa fa-trash"></i> Xóa tất cả
                            <!-- </div> -->
                        </button>
                    </div>
                </div>
            </div>
            <div wire:loading class="loader"></div>
            <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role='row'>
                        <th></th>
                        <th>STT</th>
                        <th class="{{$key_name=="name"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('name')">Tên sản phẩm</th>
                        <th class="{{$key_name=="rate"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('rate')">Đánh giá</th>
                        <th>Danh mục</th>
                        <th>Người quản lý</th>
                        <th class="{{$key_name=="created_at"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('created_at')">Thời gian tạo</th>
                        <th class="{{$key_name=="updated_at"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('updated_at')">Thời gian sửa đổi</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <td><input type="checkbox" wire:model="products" value="{{$row->id}}"></td>
                            <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                            <td><a href="javascript: return false;" data-toggle="modal" data-target="#modelCreateEdit" wire:click='show({{$row}})'>{!!boldTextSearchV2($row->name,$searchName)!!}</a></td>
                            <td>{{$row->rate?$row->rate:0}}</td>
                            <td>{{isset($category[$row->category_id])?$category[$row->category_id]:''}}</td>
                            <td>{{isset($manager[$row->user_id])?$manager[$row->user_id]:''}}</td>
                            <td>{{reFormatDate($row->created_at,'d/m/Y H:i:s')}}</td>
                            <td>{{reFormatDate($row->updated_at,'d/m/Y H:i:s')}}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{$mode=='create'?"Thêm mới":(($mode=='update')?"Chỉnh sửa":"Xem chi tiết")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="resetValidate()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Tên sản phẩm(<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Tên sản phẩm" wire:model.defer="name" {{$mode=="show"?"disabled":""}}>
                        @error("name")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Trạng thái(<span style="color:red">*</span>)</label>
                        <select class="form-control" wire:model.defer="status" {{$mode=="show"?"disabled":""}}>
                            <option value="">---Chọn trạng thái---</option>
                            <option value="1">Đang hoạt động</option>
                            <option value="2">Không hoạt động</option>
                        </select>
                        @error("status")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Danh mục sản phẩm</label>
                        <select class="form-control" wire:model.defer="category_id" {{$mode=="show"?"disabled":""}}>
                            <option value="">---Chọn danh mục sản phẩm---</option>
                            @foreach($category as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error("category_id")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Người quản lý</label>
                        <select class="form-control" wire:model.defer="user_id" {{$mode=="show"?"disabled":""}}>
                            <option value="">---Chọn người quản lý---</option>
                            @foreach($manager as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error("user_id")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Thang điểm</label>
                        <input type="text"  class="form-control" placeholder="Thang điểm" wire:model.defer="rate" {{$mode=="show"?"disabled":""}}>
                        @error("rate")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Mô tả</label>
                        <textarea type="text"  class="form-control" placeholder="Mô tả" wire:model.defer="description" cols="30" rows="3" {{$mode=="show"?"disabled":""}}></textarea>
                        @error("description")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="resetValidate()">Đóng</button>
                    @if($mode!='show')<button type="button" class="btn btn-primary" wire:click='saveData'>Lưu</button>@endif
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
    @include('livewire.common.modal._modalDeleteAll')

    <div class="modal fade" id="modal-form-delete-all-film" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Xác nhận xóa tất cả phim</h2>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn xóa tất cả phim được chọn không?
                    </div>
                    <div class="modal-footer" style="text-align: center;">
                        <div style="float: left;">
                            <p class="text-danger" id='modal-p-delete-all-film' style="display: inline-block;"></p>
                        </div>
                        <div style="float: right;">
                            <button type="button" class="btn" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click='deleteAll()'>Xóa bỏ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{--end modal--}}

</div>

<script>
    $("document").ready(() => {
        window.livewire.on('closeModalCreateEdit', () => {
            $('#modelCreateEdit').modal('hide');
        });
    });
</script>