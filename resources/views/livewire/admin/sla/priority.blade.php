<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Quản lý mức độ ưu tiên
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Mức độ ưu tiên</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-2">
            <div wire:loading class="loader"></div>
            <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role='row'>
                        <th>STT</th>
                        <th>Độ ưu tiên</th>
                        <th>Thời gian xử lý</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                            <td>{{$priorityType[$row->type]}}</td>
                            <td>{{convertTimeJsonToText($row->process_time_json)}}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="resetValidate()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Độ ưu tiên</label>
                        <input type="text"  class="form-control" placeholder="Độ ưu tiên" wire:model.defer="type" disabled>
                        @error("type")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Thời gian xử lý</label>
                        <div class="form-group row">
                            <div class="col-3">
                                <input type="number" class='form-control' wire:model.defer='day' oninput="this.value = Math.abs(this.value)">
                            </div>
                            <label class='col-1'>Ngày</label>
                            <div class="col-3">
                                <select class="form-control" wire:model.defer='hour'>
                                    @for($i = 0; $i < 24; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <label class='col-1'>Giờ</label>
                            <div class="col-3">
                                <select class="form-control" wire:model.defer='minute'>
                                    @for($i = 0; $i < 60; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <label class='col-1'>Phút</label>
                        </div>
                        @error("errorProcessTime")
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