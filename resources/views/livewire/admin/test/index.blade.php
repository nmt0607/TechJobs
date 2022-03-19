<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Test
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Test</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-2">
            <div class="form-group row">
                <label for="Search" class="col-1 col-form-label">Search</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="search" placeholder="Search"type="text" class="form-control">
                </div>
                <label for="actor_name" class="offset-1 col-1 col-form-label">Actor Name</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchActorName" placeholder="Actor Name"type="text" class="form-control">
                </div>
            </div>
<div class="form-group row">
                <label for="director" class="col-1 col-form-label">Director</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchDirector" placeholder="Director"type="text" class="form-control">
                </div>
                <label for="status" class="offset-1 col-1 col-form-label">Status</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchStatus" placeholder="Status"type="text" class="form-control">
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
                        
                        <th class="{{$key_name=="name"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('name')">Name</th><th class="{{$key_name=="contract_number"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('contract_number')">Contract Number</th><th class="{{$key_name=="actor_name"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('actor_name')">Actor Name</th><th class="{{$key_name=="director"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('director')">Director</th><th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                            <td>{!!boldTextSearchV2($row->name,$search)!!}</td>
                            <td>{!!boldTextSearchV2($row->contract_number,$search)!!}</td>
                            <td>{!!boldTextSearchV2($row->actor_name,$searchActorName)!!}</td>
                            <td>{!!boldTextSearchV2($row->director,$searchDirector)!!}</td>
                            <td>{!!boldTextSearchV2($row->status,$searchStatus)!!}</td>
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
                        <label> Name(<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Name" wire:model.defer="name">
                        @error("name")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Contract Number(<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Contract Number" wire:model.defer="contract_number">
                        @error("contract_number")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Actor Name(<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Actor Name" wire:model.defer="actor_name">
                        @error("actor_name")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Director(<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Director" wire:model.defer="director">
                        @error("director")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Status(<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Status" wire:model.defer="status">
                        @error("status")
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

<script>
    $("document").ready(() => {
        window.livewire.on('closeModalCreateEdit', () => {
            $('#modelCreateEdit').modal('hide');
        });
    });
</script>