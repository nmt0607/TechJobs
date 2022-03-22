<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Người dùng
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Người dùng</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-2">
            <div class="form-group row">
                <label for="Search" class="col-1 col-form-label">Họ tên</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="search" placeholder="Họ và tên" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="account" class="col-1 col-form-label">Tài khoản</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchAccount" placeholder="Tài khoản" type="text" class="form-control">
                </div>
                <label for="phone" class="offset-1 col-1 col-form-label">SĐT</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchPhone" placeholder="SĐT" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-1 col-form-label">Email</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchEmail" placeholder="Email" type="text" class="form-control">
                </div>
                <label for="sex" class="offset-1 col-1 col-form-label">Giới tính</label>
                <div class="col-4">
                    <select name="searchSex" id="" wire:model.debounce.1000ms="searchSex" class="form-control">
                        <option value="">Chọn giới tính</option>
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
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

                        <th class="{{ $key_name == 'name' ? ($sortingName == 'desc' ? 'sorting_desc' : 'sorting_asc') : 'sorting' }}" wire:click="sorting('name')">Họ và tên</th>
                        <th class="{{ $key_name == 'account' ? ($sortingName == 'desc' ? 'sorting_desc' : 'sorting_asc') : 'sorting' }}" wire:click="sorting('account')">Tài khoản</th>
                        <th class="{{ $key_name == 'phone' ? ($sortingName == 'desc' ? 'sorting_desc' : 'sorting_asc') : 'sorting' }}" wire:click="sorting('phone')">SĐT</th>
                        <th class="{{ $key_name == 'email' ? ($sortingName == 'desc' ? 'sorting_desc' : 'sorting_asc') : 'sorting' }}" wire:click="sorting('email')">Email</th>
                        <th class="{{ $key_name == 'date' ? ($sortingName == 'desc' ? 'sorting_desc' : 'sorting_asc') : 'sorting' }}" wire:click="sorting('date')">Ngày sinh</th>
                        <th class="{{ $key_name == 'sex' ? ($sortingName == 'desc' ? 'sorting_desc' : 'sorting_asc') : 'sorting' }}" wire:click="sorting('sex')">Giới tính</th>
                        <th class="{{ $key_name == 'department' ? ($sortingName == 'desc' ? 'sorting_desc' : 'sorting_asc') : 'sorting' }}" wire:click="sorting('department')">Đơn vị</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $row)
                        <tr>
                            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                            <td>{!! boldTextSearchV2($row->name, $searchName) !!}</td>
                            <td>{!! boldTextSearchV2($row->account, $searchAccount) !!}</td>
                            <td>{!! boldTextSearchV2($row->phone, $searchPhone) !!}</td>
                            <td>{!! boldTextSearchV2($row->email, $searchEmail) !!}</td>
                            <td>{{ $row->date }}</td>
                            <td>{!! boldTextSearchV2($row->sex == 0 ?'Nam':'Nữ', $searchSex) !!}</td>
                            <td>{{ $row->department }}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modelCreateEdit" class="btn par6" title="update" wire:click='edit({{ $row }})'>
                                    <img src="/images/pent2.svg" alt="pent">
                                </button>
                                @include('livewire.common.buttons._delete')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (!isset($data) || !count($data))
                <div class="pb-2 pt-3 text-center">Không tìm thấy dữ liệu</div>
            @endif
        </div>
        {{ $data->links() }}
    </div>
    {{-- Start modal --}}
    <div wire:ignore.self class="modal fade" id="modelCreateEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $this->mode == 'create' ? 'Thêm mới' : 'Chỉnh sửa' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="resetValidate()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Họ và tên(<span style="color:red">*</span>)</label>
                        <input type="text" class="form-control" placeholder="Họ và tên" wire:model.defer="name">
                        @error('name')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Tài khoản(<span style="color:red">*</span>)</label>
                        <input type="text" class="form-control" placeholder="Tài khoản" wire:model.defer="account">
                        @error('account')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> SĐT(<span style="color:red">*</span>)</label>
                        <input type="text" class="form-control" placeholder="SĐT" wire:model.defer="phone">
                        @error('phone')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Email(<span style="color:red">*</span>)</label>
                        <input type="text" class="form-control" placeholder="Email" wire:model.defer="email">
                        @error('email')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Ngày sinh(<span style="color:red">*</span>)</label>
                        <input type="date" class="form-control" placeholder="Ngày sinh" wire:model.defer="date">
                        @error('date')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div >
                        <label> Giới tính(<span style="color:red">*</span>)</label><br>
                        <select name="" id="" wire:model.defer="sex" class="form-control">
                            <option value="">Chọn giới tính</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                        @error('sex')
                            @include('layouts.partials.text._error')
                        @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Đơn vị(<span style="color:red">*</span>)</label>
                        <input type="text" class="form-control" placeholder="Đơn vị" wire:model.defer="department">
                        @error('department')
                            @include('layouts.partials.text._error')
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
    {{-- end modal --}}

</div>

<script>
    $("document").ready(() => {
        window.livewire.on('closeModalCreateEdit', () => {
            $('#modelCreateEdit').modal('hide');
        });
    });
</script>
