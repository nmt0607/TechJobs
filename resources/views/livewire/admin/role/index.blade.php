<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Danh sách phân quyền
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Quản lý phân quyền</div>
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
                <label for="name" class="offset-1 col-1 col-form-label">Tên</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchName" placeholder="Tên phân quyền"type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-1 col-form-label">Mô tả</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchDescription" placeholder="Mô tả"type="text" class="form-control">
                </div>
            </div>


            <div class="filter d-flex align-items-center justify-content-between mb-2">
                <button type="button" class="btn btn-secondary" wire:click="resetSearch()"><i class="fa fa-undo"></i> Làm mới</button>
                <div>
                    @if (checkRoutePermission('create'))
                    <div style="float: left;text-align: center;">
                        <a href="{{ route('admin.role.create') }}">
                            <div class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tạo mới
                            </div>
                        </a>
                    </div>
                    @endif
                    {{-- <div style="margin-left:5px;float: left;text-align: center;">
                        <a href="#" data-toggle="modal" data-target="#modelExport" wire:click='create'>
                            <div class="btn btn-success">
                                <i class="fa fa-download"></i> Export
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>

            <div wire:loading class="loader"></div>
            <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role='row'>
                        <th>STT</th>
                        <th class="{{$key_name=="name"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('name')">Tên phân quyền</th>
                        <th class="{{$key_name=="description"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('description')">Mô tả</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                            <td>{!!boldTextSearchV2($row->name,$search)!!}</td>
                            <td>{!!boldTextSearchV2($row->description,$search)!!}</td>
                            <td>
                                @if (checkRoutePermission('edit'))
                                <a type="button" class="btn par6" title="update" href="{{ route('admin.role.edit', ['id' => $row->id]) }}">
                                    <img src="/images/pent2.svg" alt="pent">
                                </a>
                                @endif
                                @if (checkRoutePermission('delete'))
                                @include('livewire.common.buttons._delete')
                                @endif
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