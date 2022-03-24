<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Khảo sát: {{$survey->name}}
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Chi tiết đánh giá</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-2">
            <div class="form-group row">
                <label for="name" class="col-1 col-form-label">Tên khách hàng</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchCustomerName" placeholder="Tên khách hàng"type="text" class="form-control">
                </div>
                <label for="name" class="offset-1 col-1 col-form-label">Số điện thoại</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchPhone" placeholder="Số điện thoại"type="text" class="form-control">
                </div>
            </div>

            <div class="filter d-flex align-items-center justify-content-between mb-2">
                <button type="button" class="btn btn-secondary" wire:click="resetSearch()"><i class="fa fa-undo"></i> Làm mới</button>
            </div>

            <div wire:loading class="loader"></div>
            <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role='row'>
                        <th>STT</th>
                        <th class="{{$key_name=="customer_name"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('customer_name')">Tên khách hàng</th>
                        <th class="{{$key_name=="phone"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('phone')">Số điện thoại</th>
                        <th class="{{$key_name=="email"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('email')">Email</th>
                        <th class="{{$key_name=="rate"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('rate')">Đánh giá</th>
                        <!-- <th class="{{$key_name=="content"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('content')">Nội dung</th> -->
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                            <td>{!!boldTextSearchV2($row->customer_name,$searchCustomerName)!!}</td>
                            <td>{!!boldTextSearchV2($row->phone,$searchPhone)!!}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->rate}}</td>
                            <!-- <td>{{$row->content}}</td> -->
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modelCreateEdit"  class="btn par6" title="update" wire:click='edit({{$row}})'>
                                    <img src="/images/pent2.svg" alt="pent">
                                </button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết đánh giá</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="resetValidate()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Tên khách hàng</label>
                        <input type="text"  class="form-control" placeholder="Tên khách hàng" wire:model.defer="customer_name" disabled>
                        @error("customer_name")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Số điện thoại</label>
                        <input type="text"  class="form-control" placeholder="Số điện thoại" wire:model.defer="phone" disabled>
                        @error("phone")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text"  class="form-control" placeholder="Email" wire:model.defer="email" disabled>
                        @error("email")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Đánh giá</label>
                        <input type="text"  class="form-control" placeholder="Đánh giá" wire:model.defer="rate" disabled>
                        @error("rate")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" placeholder="Nội dung" wire:model.defer="content" rows=3 disabled></textarea>
                        @error("content")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ngày đánh giá</label>
                        <input type="text"  class="form-control" placeholder="Ngày đánh giá" value={{reFormatDate($created_at)}} disabled>
                        @error("customer_name")
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
    {{--end modal--}}

</div>

<script>
    $("document").ready(() => {
        window.livewire.on('closeModalCreateEdit', () => {
            $('#modelCreateEdit').modal('hide');
        });
    });
</script>