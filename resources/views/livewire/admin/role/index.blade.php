<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Danh sách nhóm người dùng
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Quản lý nhóm người dùng</div>
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
            </div>
            <div class="form-group row">
                <label for="name" class="col-1 col-form-label">Tên</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchName" placeholder="Tên nhóm người dùng"type="text" class="form-control">
                </div>
                <label for="description" class="offset-1 col-1 col-form-label">Mô tả</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchDescription" placeholder="Mô tả"type="text" class="form-control">
                </div>
            </div>


            <div class="filter d-flex align-items-center justify-content-between mb-2">
                <button type="button" class="btn btn-secondary" wire:click="resetSearch()"><i class="fa fa-undo"></i> Làm mới</button>
                <div>
                    <div style="float: left;text-align: center;">
                        <a href="#" data-toggle="modal" data-target="#modelCreateEdit" wire:click='create'>
                            <div class="btn btn-primary">
                                <i class="fa fa-plus"></i> Thêm mới
                            </div>
                        </a>
                    </div>
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
                        <th class="{{$key_name=="name"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('name')">Tên nhóm người dùng</th>
                        <th class="{{$key_name=="description"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('description')">Mô tả</th>
                        <th>Thành viên</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modelShow" wire:click='edit({{$row}})'>
                                    {!!boldTextSearch($row->name, $search)!!}
                                </a>
                            </td>
                            <td>{!!boldTextSearch($row->description, $search)!!}</td>
                            <td>
                                @foreach($row->users as $user)
                                    <span>{{ $user->name }}</span><br>
                                @endforeach
                            </td>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="resetValidate()" id="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Tên nhóm người dùng (<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Tên nhóm người dùng" wire:model.defer="name">
                        @error("name")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>

                    <div class="form-group">
                        <label> Mô tả</label>
                        <textarea type="text"  class="form-control" placeholder="Mô tả" wire:model.defer="description"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-secondary"
                            data-toggle="modal" data-target="#modelUsers"
                        >Thêm người dùng</button>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary"
                            data-toggle="modal" data-target="#modelPermissions"
                        >Thêm phân quyền</button>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click='saveData'>Lưu thông tin</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="resetValidate()">Hủy</button>
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
    <div wire:ignore.self class="modal fade" id="modelUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <table class="table table-bordered table-hover dataTable dtr-inline">
                        <thead class="">
                            <tr>
                                <th></th>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Tài khoản</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Ngày sinh</th>
                                <th>Đơn vị</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($userList as $key => $row)
                                <tr>
                                    <td><input type="checkbox" name="checkName" wire:model="listUsers.{{$row->id}}"></td>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->account }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->department }}</td>
                                </tr>
                            @empty
                                <td colspan='12' class='text-center'>Không tìm thấy dữ liệu</td>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click='saveListUser'>Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modelShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalShow" wire:click="resetValidate()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Tên nhóm người dùng</label>
                        <input type="text" disabled class="form-control" placeholder="Tên nhóm người dùng" wire:model.defer="name">
                    </div>

                    <div class="form-group">
                        <label> Mô tả</label>
                        <textarea type="text" disabled class="form-control" placeholder="Mô tả" wire:model.defer="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Danh sách người dùng</label>
                        <table class="table table-bordered table-hover dataTable dtr-inline">
                            <thead class="">
                                <tr>
                                    <th>STT</th>
                                    <th>Họ và tên</th>
                                    <th>Tài khoản</th>
                                    <th>SĐT</th>
                                    <th>Email</th>
                                    <th>Ngày sinh</th>
                                    <th>Đơn vị</th>
                                    <th>Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($userAssign as $key => $row)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row['name'] }}</td>
                                        <td>{{ $row['account'] }}</td>
                                        <td>{{ $row['phone'] }}</td>
                                        <td>{{ $row['email'] }}</td>
                                        <td>{{ $row['date'] }}</td>
                                        <td>{{ $row['department'] }}</td>
                                        <td>
                                            <button type="button" class="btn-sm border-0 bg-transparent"
                                                data-toggle="modal" 
                                                title="{{__('common.button.delete')}}" wire:click="unAssignUser({{$key}})">
                                                <img src="/images/trash.svg" alt="trash">
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan='12' class='text-center'>Không tìm thấy dữ liệu</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="resetValidate()">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modelPermissions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm phân quyền</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalShow" wire:click="resetValidate()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <table class="table table-bordered table-hover dataTable dtr-inline">
                            <thead class="">
                                <tr>
                                    <th></th>
                                    <th>STT</th>
                                    <th>Tên</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permissionList as $key => $row)
                                    <tr>
                                        <td><input type="checkbox" name="checkName" wire:model="listPermissions.{{$row->id}}"></td>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row['name'] }}</td>
                                    </tr>
                                @empty
                                    <td colspan='12' class='text-center'>Không tìm thấy dữ liệu</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="saveListPermission">Lưu</button>
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
        window.livewire.on('closeModalUsers', () => {
            $('#modelUsers').modal('hide');
        });
        window.livewire.on('closeModalPermissions', () => {
            $('#modelPermissions').modal('hide');
        });
        $('#modelCreateEdit').on('hidden.bs.modal', function(){
            $('#closeModal').click();
        })
        $('#modelShow').on('hidden.bs.modal', function(){
            $('#closeModalShow').click();
        })
    });
</script>