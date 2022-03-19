<!-- Modal Create -->
<form wire:submit.prevent="submit" enctype="multipart/form-data">
        <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('master/masterManager.form_data.create')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true close-btn">×</span>
                </button>
              </div>
              <div class="modal-body">
              <form>
                    <div class="form-group">
                        <label >{{__('master/masterManager.menu_name.master_title_table.vkey')}}<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control" name="vkey" wire:model.lazy="vkey" placeholder="{{__('master/masterManager.menu_name.master_title_table.vkey')}}">
                        @error('vkey') @include('layouts.partials.text._error') @enderror
                    </div>
                    <div class="form-group">
                        <label >{{__('master/masterManager.menu_name.master_title_table.vvalue')}}<span class="text-danger"></span></label>
                        <input type="text" class="form-control" name="vvalue" wire:model.lazy="vvalue" placeholder="{{__('master/masterManager.menu_name.master_title_table.vvalue')}}">
                    </div>
                    <div class="form-group">
                        <label >{{__('master/masterManager.menu_name.master_title_table.vvalueen')}}<span class="text-danger"></span></label>
                        <input type="text" class="form-control" wire:model.lazy="vvalueen" placeholder="{{__('master/masterManager.menu_name.master_title_table.vvalueen')}}">

                    </div>
                    <div class="form-group">
                        <label >{{__('master/masterManager.menu_name.master_title_table.ordernumber')}}<span class="text-danger"></span></label>
                        <input type="number" class="form-control" wire:model.lazy="ordernumber" placeholder="{{__('master/masterManager.menu_name.master_title_table.ordernumber')}}">
                    </div>
                    <div class="form-group">
                        <label >{{__('master/masterManager.menu_name.master_title_table.type')}}<span class="text-danger">(*)</span></label>
                        <select name="type" id="" wire:model.lazy="type" class="form-control">
                          <option value="">---Chọn---</option>
                          @foreach($dataType as $key =>$item)
                          <option value="{{$key}}">{{$item}}</option>
                          @endforeach
                        </select>
                        @error('type') @include('layouts.partials.text._error') @enderror
                    </div>
                    <div class="form-group">
                        <label >URL <span class="text-danger"></span></label>
                        <input type="number" class="form-control" wire:model.lazy="url" placeholder="URL">

                    </div>
                    <div class="form-group" wire:ignore>
                        <label >{{__('master/masterManager.menu_name.master_title_table.content')}} <span class="text-danger"></span></label>
                        <textarea  wire:model.lazy="content" id="content" rows="5" cols="100"></textarea>

                    </div>
                    <div class="form-group" wire:ignore>
                        <label >{{__('master/masterManager.menu_name.master_title_table.content_en')}} <span class="text-danger"></span></label>
                        <textarea  wire:model.lazy="content_en" id="content_en" rows="5" cols="100"></textarea>
                    </div>
                    <div class="form-group" wire:ignore>
                        <label >{{__('master/masterManager.menu_name.master_title_table.note')}} <span class="text-danger"></span></label>
                        <textarea class="textarea"  id="note" rows="5" cols="100"></textarea>

                    </div>
                    <div class="form-group" wire:ignore>
                        <label >{{__('master/masterManager.menu_name.master_title_table.note_en')}} <span class="text-danger"></span></label>
                        <textarea class="textarea"  id="note_en" rows="5" cols="100"></textarea>
                    </div>
                    <div class="form-group" >
                      <label >Number Value</label>
                      <input type="number" class="form-control" wire:model.lazy="number_value">
                    </div>
                    <div class="form-group">
                      <label >{{__('master/masterManager.menu_name.master_title_table.image')}} <span class="text-danger"></span></label>
                      <input type="file" id="image_create" wire:model="image" name="image" rows="5" cols="100">
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" wire:click.prevent="resetform()" id="close-modal-create" class="btn btn-secondary close-btn" data-dismiss="modal" >{{__('common.button.close')}}</button>
                <button type="button" id="btn-save" class="btn btn-primary close-modal" wire:target="image" wire:loading.class="disabled">{{__('common.button.save')}}</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- End Modal Create -->
