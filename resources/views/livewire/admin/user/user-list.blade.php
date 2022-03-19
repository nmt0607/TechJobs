<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Danh sách người dùng
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Danh sách người dùng</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-2">
                <form>
                    <div class="form-group row">
                        <label for="Name" class="col-2 col-form-label">Họ tên</label>
                        <div class="col-4">
                            <input wire:model.debounce.1000ms="searchName" type="text" class="form-control" >
                        </div>
                        <label for="Email" class="col-2 col-form-label ">Email</label>
                        <div class="col-4">
                            <input wire:model.debounce.1000ms="searchEmail" type="text" class="form-control" >
                        </div>
                    </div>
                   <div class="form-group row justify-content-center">
                        @include('layouts.partials.button._reset')  
                    </div>
                </form>
                
                <a href="{{ route('user.create.index') }}" 
                    data-toggle="tooltip" data-original-title="Tải tệp lên" wire:click="">
                    <div class="btn btn-primary col-md-1">
                        <i class="fa fa-plus"></i> TẠO MỚI
                    </div>
                </a>
            
            <table class="table table-striped">
                <thead class="">
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $html = '';?>
                    @if(isset($data) && count($data) > 0)
                        @foreach($data as $key => $dt)
                            <tr>
                                <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->email}}</td>
                                <td>
                                    @if(!empty($dt->roles))
                                        @foreach($dt->roles as $role)
                                            <label class="badge badge-success">{{ $role->name }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('user.edit.index',['id'=>$dt->id])}}"
                                        style="border-radius: 11px; border:none;">
                                        <img src="/images/pent2.svg" alt="pent">
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#exampleDelete"
                                        wire:click="deleteId({{$dt->id}})"
                                        style="border-radius: 11px; border:none;">
                                        <img src="/images/trash.svg" alt="pent">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if(!isset($data) || !count($data))
                <div class="pb-2 pt-3 text-center">Không tìm thấy dữ liệu</div>
            @endif
        </div>
        {{$data->links()}}
    </div>
    @include('livewire.common._modalDelete')
</div>