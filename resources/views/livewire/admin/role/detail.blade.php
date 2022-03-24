<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                {{$mode=='create'?"Thêm mới phân quyền":"Chỉnh sửa phân quyền"}}
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
            <div class="form-group">
                <label> Tên phân quyền (<span style="color:red">*</span>)</label>
                <input type="text"  class="form-control" placeholder="Tên phân quyền" wire:model.defer="name">
                @error("name")
                    @include("layouts.partials.text._error")
                @enderror
            </div>
            <div class="form-group">
                <label> Mô tả </label>
                <textarea type="text"  class="form-control" placeholder="Tên phân quyền" wire:model.defer="description"></textarea>
    
            </div>
            <div class="form-group">
                <label> Danh sách module chức năng </label>
                <table class="table table-bordered table-hover dataTable dtr-inline">
                    <thead class="">
                        <tr class="border-radius">
                            <th rowspan="2" scope="col" class="border-radius-left">Chức năng</th>
                            <th scope="col" class="text-center"><img src="/images/eye.svg" alt="view"/></th>
                            <th scope="col" class="text-center"><img src="/images/add.svg" alt="add"></th>
                            <th scope="col" class="text-center"><img src="/images/pent2.svg" alt="edit"/> </th>
                            <th scope="col" class="text-center"><img src="/images/trash.svg" alt="delete"></th>
                            <th scope="col" class="text-center"><img src="/images/eye.svg" alt="show"/></th>
                            <th scope="col" class="text-center"><img src="/images/Import.svg" alt="import"/></th>
                            <th scope="col" class="text-center"><img src="/images/Export.svg" alt="export"/></th>
                        </tr>
                        <tr class="border-radius">
                            <th scope="col" class="text-center">Danh sách</th>
                            <th scope="col" class="text-center">Thêm</th>
                            <th scope="col" class="text-center">Sửa</th>
                            <th scope="col" class="text-center">Xóa</th>
                            <th scope="col" class="text-center">Chi tiết</th>
                            <th scope="col" class="text-center">Import</th>
                            <th scope="col" class="text-center">Export</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $routeName => $features)
                            @foreach ($features as $featureName => $grants)
                                <tr id="{{ $routeName }}">
                                    <td>
                                        {{ $routeName }}
                                        <div class="text-right">
                                            <button class="btn btn-light btn-sm mr-2" type="button" onclick="selectAllInModule('{{ $routeName }}')">Chọn tất cả</button>
                                            <button class="btn btn-light btn-sm" type="button" onclick="unselectAllInModule('{{ $routeName }}')">Bỏ chọn tất cả</button>
                                        </div>
                                    </td>
                                    @foreach ($grants as $grant)
                                    <td class="text-center" style="display: float-right">
                                        
                                            <div class="toggle">
                                                <input type="checkbox" class="toggle-checkbox grant" id="grant-{{ $grant['id'] ?? 0 }}" value="{{ $grant['id'] ?? 0 }}" @if (in_array($grant['id'] ?? 0, $selectedPermissions)) checked @endif>
                                            </div>
                                        
                                    </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modelUsers">Thêm người dùng</button>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modelUserCategories">Thêm nhóm người dùng</button>
            </div>
            <div class="text-center mt-4">
                <a class="btn btn-secondary" href="{{route('admin.role.index')}}">Quay lại</a>
                <button type="button" onclick="submit()" class="btn btn-primary">Lưu thông tin</button>
            </div>

        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modelUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Danh sách người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover dataTable dtr-inline">
                        <thead class="">
                            <tr>
                                <th></th>
                                <th>Họ và tên</th>
                                <th>Tài khoản</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Ngày sinh</th>
                                <th>Đơn vị</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $row)
                                <tr>
                                    <td><input type="checkbox" class="checkbox-user" value="{{ $row['id'] ?? 0 }}" @if (in_array($row['id'] ?? 0, $selectedUsers)) checked @endif></td>
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

    <div wire:ignore.self class="modal fade" id="modelUserCategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Danh sách nhóm người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover dataTable dtr-inline">
                        <thead class="">
                            <tr>
                                <th></th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usercategories as $row)
                                <tr>
                                    <td><input type="checkbox" class="checkbox-user-category" value="{{ $row['id'] ?? 0 }}" @if (in_array($row['id'] ?? 0, $selectedUserCategories)) checked @endif></td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->description }}</td>
                                </tr>
                            @empty
                                <td colspan='12' class='text-center'>Không tìm thấy dữ liệu</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click='saveListUserCategories'>Lưu</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function selectAllInModule(routeName) {
        $("#" + routeName).find('.toggle-checkbox').each(function() {
            this.checked = true;
        });
    }

    function unselectAllInModule(routeName) {
        $("#" + routeName).find('.toggle-checkbox').each(function() {
            this.checked = false;
        });
    }

    function submit() {
        let selectedPermissions = [];
        $('.grant:checked').each(function() {
            selectedPermissions.push(this.value);
        });
        @this.selectedPermissions = selectedPermissions;

        let selectedUsers = [];
        $('.checkbox-user:checked').each(function() {
            selectedUsers.push(this.value);
        });
        @this.selectedUsers = selectedUsers;

        let selectedUserCategories = [];
        $('.checkbox-user-category:checked').each(function() {
            selectedUserCategories.push(this.value);
        });
        @this.selectedUserCategories = selectedUserCategories;
        
        @this.save();
    }
</script>

<script>
    $("document").ready(() => {
        window.livewire.on('closeModalUsers', () => {
            $('#modelUsers').modal('hide');
        });
        window.livewire.on('closeModalUserCategories', () => {
            $('#modelUserCategories').modal('hide');
        });
    });
</script>