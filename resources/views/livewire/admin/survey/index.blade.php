<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Survey
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Survey</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-2">
            <div class="form-group row">
                <label for="name" class="col-1 col-form-label">Tên khảo sát</label>
                <div class="col-4">
                    <input wire:model.debounce.1000ms="searchName" placeholder="Tên khảo sát"type="text" class="form-control">
                </div>
                <label for="type" class="offset-1 col-1 col-form-label">Loại khảo sát</label>
                <div class="col-4">
                    <select class="form-control" wire:model="searchType">
                        <option value="">---Tất cả---</option>
                        <option value="1">Email</option>
                        <option value="2">Biểu mẫu</option>
                        <option value="3">Popup</option>
                    </select>
                    <!-- <input wire:model.debounce.1000ms="searchType" placeholder="Loại khảo sát"type="text" class="form-control"> -->
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
                    <!-- <div style="margin-left:5px;float: left;text-align: center;">
                        <a href="#" data-toggle="modal" data-target="#modelExport" wire:click='create'>
                            <div class="btn btn-success">
                                <i class="fa fa-download"></i> Export
                            </div>
                        </a>
                    </div> -->
                </div>
            </div>

            <div wire:loading class="loader"></div>
            <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role='row'>
                        <th>STT</th>
                        <th class="{{$key_name=="name"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('name')">Tên khảo sát</th>
                        <th>Nội dung khảo sát</th>
                        <th class="{{$key_name=="rate"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('rate')">Đánh giá</th>
                        <th class="{{$key_name=="type"?($sortingName=="desc"?"sorting_desc":"sorting_asc"):"sorting"}}" wire:click="sorting('type')">Loại khảo sát</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <td>{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
                            <td>{!!boldTextSearchV2($row->name,$searchName)!!}</td>
                            <td>{{$row->content}}</td>
                            <td><a href="{{route('admin.survey.edit',$row->id)}}">{{$row->rate?$row->rate:0}}</a></td>
                            <td>{{isset($surveyType[$row->type])?$surveyType[$row->type]:''}}</td>
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
                        <label> Tên khảo sát(<span style="color:red">*</span>)</label>
                        <input type="text"  class="form-control" placeholder="Tên khảo sát" wire:model.defer="name">
                        @error("name")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Nội dung khảo sát(<span style="color:red">*</span>)</label>
                        <textarea class="form-control" placeholder="Nội dung khảo sát" wire:model.defer="content" rows=3></textarea>
                        @error("content")
                            @include("layouts.partials.text._error")
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Loại khảo sát(<span style="color:red">*</span>)</label>
                        <select class="form-control" wire:model.defer="type">
                            <option value="">---Chọn loại khảo sát---</option>
                            <option value="1">Email</option>
                            <option value="2">Biểu mẫu</option>
                            <option value="3">Popup website</option>
                        </select>
                        @error("type")
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