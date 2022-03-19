<div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                 <h3 class="card-title my-3">{{__('master/masterManager.menu_name.master_title')}}</h3>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group search-expertise">
                            <div class="search-expertise inline-block">
                                <input type="text" placeholder="{{__('common.button.search')}}" name="search" class="form-control" wire:model.debounce.1000ms="searchTerm"  id='input_vn_name' autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div wire:ignore class="col-md-2">
                        <select wire:model.debounce.1000ms="typeFilter" class="form-control select2-box">
                            <option value=''>
                                {{__('master/masterManager.menu_name.type')}}
                            </option>
                            @foreach($dataType as $key => $item)
                                <option value='{{$key}}'>
                                    {{$item}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-7">
                        <button id = 'button-create' type="button" class="float-right btn-sm btn-primary" style="border:none;" data-toggle="modal" data-target="#createModal" wire:click="resetform()" >
                                <i class="fa fa-plus"></i> TẠO MỚI
                    </div>
                        </button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-md-12" style="overflow-x: scroll;">
                                    <table  id="" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.ID')}}</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.vkey')}}</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">URL</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.type')}}</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.vvalue')}}</th>
                                                {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.vvalueen')}}</th> --}}
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.content')}}</th>
                                                {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.content_en')}}</th> --}}
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.note')}}</th>
                                                {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.note_en')}}</th> --}}
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.ordernumber')}}</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Number Value</th>
                                                <th>{{__('master/masterManager.menu_name.master_title_table.image')}}</th>
                                                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">{{__('master/masterManager.menu_name.master_title_table.action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody  wire:sortable="updateOrder" >
                                             @if($category)
                                                @foreach($category as $row)
                                                    <tr  @if($typeFilter )wire:sortable.item="{{$row->order_number}}" wire:sortable.handle @endif  class="odd" wire:key="master-{{$row->id}}">
                                                        <td class="dtr-control sorting_1">{{$row->id}}</td>
                                                        <td>{!! boldTextSearch($row->v_key, $searchTerm) !!}</td>
                                                        <td>{!! boldTextSearch($row->url, $searchTerm) !!}</td>
                                                        <td>{{\App\Enums\EMasterData::valueToName($row->type)}}</td>
                                                        <td>{!! boldTextSearch($row->v_value, $searchTerm) !!}</td>
                                                        <td>{!! boldTextSearch($row->v_content, $searchTerm) !!}</td>
                                                        <td>{!! boldTextSearch($row->note, $searchTerm) !!}</td>
                                                        <td>{{$row->order_number}}</td>
                                                        <td>{{$row->number_value}}</td>
                                                        <td>
                                                            @if(!empty($row->image))
                                                             <img src="{{url('storage/'.$row->image)}}" alt="" width="70px" height="70px">
                                                             @else
                                                             No image
                                                             @endif
                                                        </td>
                                                        <td wire:sortable.stop>
                                                            <button type="button" data-toggle="modal" data-target="#editModal"  class="btn par6" title="update" wire:click="edit({{$row->id}})">
                                                                 <img src="/images/pent2.svg" alt="pent">
                                                                </button>
                                                            @include('livewire.common.buttons._delete')

                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                           {{$category->links()}}
                                           @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('livewire.admin.config.master._modalCreate')
            @include('livewire.admin.config.master._modalEdit')
            @include('livewire.admin.config.master._modalDeleteSelected')
            @include('livewire.common.modal._modalDelete')
        </div>
    </div>
</section>
</div>
<script>
    $("document").ready(() => {
        $('#content').summernote('code', '');
        $('#content_en').summernote('code', '');
        $('#note').summernote('code', '');
        $('#note_en').summernote('code', '');
        window.livewire.on('close-modal-create', () => {
            $('#close-modal-create').click();
        });
        window.livewire.on('close-modal-edit', () => {
            $('#close-modal-edit').click();
        });
        window.livewire.on('setEditorCreate', () => {
            $('#note').summernote('code', '');
            $('#note_en').summernote('code', '');
        });
        window.livewire.on('setEditor', (note, note_en) => {
            $('#note_edit').summernote('code', note);
            $('#note_en_edit').summernote('code', note_en);
        });
        $('#btn-save').click(function() {
            window.livewire.emit('set-note-create', $('#note').summernote('code'), $('#note_en').summernote('code'));
        })
        $('#btn-update').click(function() {
            window.livewire.emit('set-note-update', $('#note_edit').summernote('code'), $('#note_en_edit').summernote('code'));
        })

        $(".select2-box").on('change',function(){
            var data=$(".select2-box").select2("val");
            console.log(data);
            @this.set('typeFilter',data);
        });

        $('#button-create').on('click',function(){
            document.getElementById('image_create').value = ''
            // $('#image_create').value('')
        })

    });
</script>
