<div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-ads">
                        <a href="#">
                            <img src="{{asset('img/hna2.jpg')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid search-fluid">
        <div class="container">
            <div class="search-wrapper">
                <ul class="nav nav-tabs search-nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item search-nav-item">
                        <a class="nav-link snav-link active" style="color: black" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Danh sách công việc đang đăng</a>
                    </li>
                </ul>
                <div class="tab-content search-tab-content" id="myTabContent">
                    <!-- content tab 1 -->
                    <div class="tab-pane stab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="bn-search-form">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group s-input-group">
                                                <input type="text" class="form-control sinput" placeholder="Nhập tên công việc">
                                                <span><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4" wire:ignore>
                                            <select id="computer-languages">
                                                <option value="" selected hidden>Tất cả kĩ năng</option>
                                                @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-code sfa" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-4" wire:ignore>
                                            <select id="s-provinces">
                                                <option value="" selected hidden>Tất cả địa điểm</option>
                                                <option value="3">Đà Nẵng</option>
                                                <option value="2">Hà Nội</option>
                                                <option value="1">Hồ Chí Minh</option>
                                            </select>
                                            <i class="fa fa-map-marker sfa" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- (end) content tab 1 -->
                    <!-- content tab 2 -->
                    <!-- (end) content tab 2 -->
                </div>

            </div>
        </div>
    </div>
    <!-- (end) search section -->



    <div class="container-fluid">
        <div class="container search-wrapper">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-12">
                    <h4 class="search-find">Có {{$data->count()}} việc làm đang tuyển dụng</h4>
                    <div class="job-board-wrap">
                        <div class="job-group">
                            @foreach($data as $row)
                            <div class="job pagi">
                                <div class="job-content">
                                    <div class="job-logo">
                                        <a href="#">
                                            <img src="{{asset($row->user->image)}}" class="job-logo-ima" alt="job-logo">
                                        </a>
                                    </div>

                                    <div class="job-desc">
                                        <div class="job-title">
                                            <a href="#">{{$row->title}}</a>
                                        </div>
                                        <div class="job-company">
                                            <a href="#">{{$row->user->name}}</a> | <a href="#" class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                {{getAddress($row->address_id)}}</a>
                                        </div>

                                        <div class="job-inf">
                                            <div class="job-main-skill">
                                                <i class="fa fa-code" aria-hidden="true"></i>
                                                @foreach($row->tags as $tag)
                                                @if($loop->last)
                                                <a>{{$tag->name}}</a>
                                                @else
                                                <a>{{$tag->name}}, </a>
                                                @endif
                                                @endforeach
                                            </div>
                                            <div class="job-salary">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                {{$row->salary}}
                                            </div>
                                            <br>
                                            <div class="job-deadline">
                                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> Hạn nộp: <strong>{{reFormatDate($row->end_date)}}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-btn-appl">
                                        <button style="border: 1px solid grey; border-radius: 4px; margin-right: 1px" wire:click="detail({{$row->id}})"><i class="fa fa-eye"></i></button>
                                        <button style="border: 1px solid grey; border-radius: 4px; margin-right: 1px" wire:click="applyList({{$row->id}})"><i class="fa fa-users"></i></button>
                                        <button style="border: 1px solid grey; border-radius: 4px; margin-right: 1px" wire:click="edit({{$row->id}})"><i class="fa fa-pencil"></i></button>
                                        <button data-toggle="modal" data-target="#modalDelete" style="border: 1px solid grey; border-radius: 4px; margin-right: 1px" wire:click="setJob({{$row->id}})"><i class="fa fa-trash"></i></button>
                                        <p class="jd-view mt-4">Ứng viên đang chờ: <span>{{$row->applyingUser()->count()}}</span></p>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        <br>
                        <center>{{ $data->links() }}</center>
                        <br><br>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12">
                    <h4 class="search-find"><br></h4>
                    <div class="recuiter-info">
                        <div class="recuiter-info-avt">
                            <img src="{{asset($user->image)}}">
                        </div>
                        <div class="clearfix list-rec">
                            <h4>{{$user->name}}</h4>
                            <ul class="job-add">
                                <li>
                                    <i class="fa fa-map-marker ja-icn"></i>
                                    <span>Trụ sở: {{$user->address}}</span>
                                </li>
                                <li>
                                    <i class="fa fa-bar-chart ja-icn"></i>
                                    <span>Quy mô công ty: {{$user->size}} người</span>
                                </li>
                            </ul>
                            <hr>
                            <ul>
                                <li><a href="#">Công việc đang đăng <strong>({{$user->jobsCreate->count()}})</strong></a></li>
                                <li><a href="#">Ứng viên đang ứng tuyển <strong>({{$user->countApplyingUser()}})</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="job-sidebar">
                        <div class="sb-banner">
                            <img src="{{asset('img/ads1.jpg')}}" class="advertisement">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- job support -->
    @livewire('component.support')
    <div wire:ignore.self class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 20vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h2>
                </div>
                <div class="modal-body">
                    Bạn chắc chắn muốn xóa công việc này
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="delete()">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("document").ready(() => {
        $('#computer-languages').on('change', function(e) {
            var data = $('#computer-languages').select2('val');
            @this.set('searchTag', data);
        })
        $('#s-provinces').on('change', function(e) {
            var data = $('#s-provinces').select2('val');
            @this.set('searchProvince', data);
        })
        $('#s-company').on('change', function(e) {
            var data = $('#s-company').select2('val');
            @this.set('searchCompany', data);
        })
    })
</script>