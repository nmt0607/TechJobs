<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Ticket
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Ticket</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-2">
            <div class="form-group row">
                <label for="title" class="col-1 col-form-label">Tiêu đề</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchTitle" placeholder="Tiêu đề"type="text" class="form-control">
                </div>
                <label for="require_code" class="offset-1 col-1 col-form-label">Mã yêu cầu</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchRequireCode" placeholder="Mã yêu cầu"type="text" class="form-control">
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

            <div wire:loading class="loader"></div>
            <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role='row'>
                        <th>STT</th>
                        <th class="{{$key_name=="require_code"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('require_code')">Mã yêu cầu</th>
                        <th class="{{$key_name=="title"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('title')">Tiêu đề</th>
                        <th class="{{$key_name=="require_id"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('require_id')">Require Id</th>
                        <th class="{{$key_name=="customer_id"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('customer_id')">Customer Id</th>
                        <th class="{{$key_name=="product_id"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('product_id')">Product Id</th>
                        <th class="{{$key_name=="status_type"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('status_type')">Trạng thái</th>
                        <th class="{{$key_name=="priority_type"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('priority_type')">Độ ưu tiên</th>
                        <th class="{{$key_name=="sla_id"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('sla_id')">Sla Id</th>
                        <th class="{{$key_name=="delegate_id"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('delegate_id')">Delegate Id</th>
                        <th class="{{$key_name=="type"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('type')">Type</th>
                        <th class="{{$key_name=="user_category_id"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('user_category_id')">User Category Id</th>
                        <th class="{{$key_name=="user_id"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('user_id')">User Id</th>
                        <th class="{{$key_name=="solution"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('solution')">Giải pháp</th>
                        <th class="{{$key_name=="rate"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('rate')">Đánh giá</th>
                        <th class="{{$key_name=="feedback"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('feedback')">Phản hồi</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                            <td>{!!boldTextSearchV2($row->require_code,$searchRequireCode)!!}</td>
                            <td>{!!boldTextSearchV2($row->title,$searchTitle)!!}</td>
                            <td>{{$row->require_id}}</td>
                            <td>{{$row->customer_id}}</td>
                            <td>{{$row->product_id}}</td>
                            <td>{{$row->status_type}}</td>
                            <td>{{$row->priority_type}}</td>
                            <td>{{$row->sla_id}}</td>
                            <td>{{$row->delegate_id}}</td>
                            <td>{{$row->type}}</td>
                            <td>{{$row->user_category_id}}</td>
                            <td>{{$row->user_id}}</td>
                            <td>{{$row->solution}}</td>
                            <td>{{$row->rate}}</td>
                            <td>{{$row->feedback}}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modelCreateEdit"  class="btn par6" title="update" wire:click='edit({{$row}})'>
                                    <img src="/images/pent2.svg" alt="pent">
                                </button>
                                <button type="button" data-toggle="modal" data-target="#modelCreateEdit"  class="btn par6" title="detail" wire:click='detail({{$row}})'>
                                    <img src="/images/eye.svg" alt="pent">
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
                    <h5 class="modal-title" id="exampleModalLabel">{{$this->mode=='create'?"Thêm mới":($this->mode =='detail'?"Chi tiết":"Chỉnh sửa")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="resetValidate()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Mã yêu cầu(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled @endif type="text"  class="form-control" placeholder="Mã yêu cầu" wire:model.defer="require_code">
                        @error("require_code")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Tiêu đề(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Tiêu đề" wire:model.defer="title">
                        @error("title")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Require Id(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Require Id" wire:model.defer="require_id">
                        @error("require_id")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Customer Id(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Customer Id" wire:model.defer="customer_id">
                        @error("customer_id")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Product Id(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Product Id" wire:model.defer="product_id">
                        @error("product_id")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Trạng thái(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Trạng thái" wire:model.defer="status_type">
                        @error("status_type")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Độ ưu tiên(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Độ ưu tiên" wire:model.defer="priority_type">
                        @error("priority_type")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Sla Id (<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="" wire:model.defer="sla_id">
                        @error("sla_id")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Delegate Id(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Delegate Id" wire:model.defer="delegate_id">
                        @error("delegate_id")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Type(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Type" wire:model.defer="type">
                        @error("type")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> User Category Id(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="User Category Id" wire:model.defer="user_category_id">
                        @error("user_category_id")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> User Id(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="User Id" wire:model.defer="user_id">
                        @error("user_id")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Giải pháp(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Giải pháp" wire:model.defer="solution">
                        @error("solution")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Đánh giá(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Đánh giá" wire:model.defer="rate">
                        @error("rate")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Phản hồi(<span style="color:red">*</span>)</label>
                        <input @if($mode == 'detail') disabled  @endif type="text"  class="form-control" placeholder="Phản hồi" wire:model.defer="feedback">
                        @error("feedback")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="resetValidate()">Đóng</button>
                    <button type="button" @if($mode == 'detail') disabled  @endif  class="btn btn-primary" wire:click='saveData'>Lưu</button>
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

<script>
    $("document").ready(() => {
        window.livewire.on('closeModalCreateEdit', () => {
            $('#modelCreateEdit').modal('hide');
        });
    });
</script>