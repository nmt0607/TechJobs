<div>
    <div wire:loading class="loader"></div>

    <div class="container-fluid job-detail-wrap">
        <div class="container job-detail">
            <div class="job-detail-header">
                <div class="row">
                    <div class="col-md-2 col-sm-12 col-12">
                        <div class="job-detail-header-logo">
                            <a href="#">
                                <img src="{{asset($userCreateJob->image)}}" class="job-logo-ima" alt="job-logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-12">
                        <div class="job-detail-header-desc">
                            <div class="job-detail-header-title">
                                <a href="{{route('job.detail', ['id' => $job->id])}}">{{$job->title}}</a>
                            </div>
                            <div class="job-detail-header-company">
                                <a href="#">{{$userCreateJob->name}}</a>
                            </div>
                            <div class="job-detail-header-de">
                                <ul>
                                    <li><i class="fa fa-map-marker icn-jd"></i><span>{{getAddress($job->address_id)}}</span></li>
                                    <li><i class="fa fa-usd icn-jd"></i><span>{{$job->salary}}</span></li>
                                    <li><i class="fa fa-calendar icn-jd"></i><span>{{reFormatDate($job->end_date)}}</span></li>
                                </ul>
                            </div>
                            <div class="job-detail-header-tag">
                                <ul>
                                    @foreach($job->tags as $tag)
                                    <li>
                                        <a>{{$tag->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- (end) job detail header -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <!-- Main wrapper -->
                <div class="col-md-4 col-sm-12 col-12 clear-left">
                    <div class="side-bar mb-3">
                        <h2 class="widget-title">
                            <span>Hồ sơ ứng tuyển</span>
                        </h2>
                        <div class="company-intro">
                            <a href="#">
                                <img src="{{asset($user->image??'dist/img/default-avatar.png')}}" class="job-logo-ima" alt="job-logo">
                            </a>
                        </div>
                        <h2 class="company-intro-name">{{$user->name??'Tên ứng viên'}}</h2>
                        @if($user)
                        <center>
                            <div style="display: inline-block; top: -2px" id="rateOfUser" rate='{{$user->rate()}}'></div>
                            <span>({{$user->rateCount()}} đánh giá)</span>
                        </center><br>
                        @endif
                        <ul class="job-add">

                            <li>
                                <i class="fa fa-money ja-icn"></i>
                                <span>Báo giá: {{$user?$user->offer.' triệu':''}} </span>
                            </li>
                            <li>
                                <i class="fa fa-code ja-icn"></i>
                                <span>Kỹ năng: {{$user?$user->listTag():''}}</span>
                            </li>
                            @if($user)
                            @livewire('component.files',[
                            'model_name' => \App\Models\Job::class,
                            'model_id'=>$job->id,
                            'admin_id'=>7,
                            'folder' => 'jobs',
                            'canUpload'=>false,
                            'displayUploadfile' => false,
                            'displayFile'=>true
                            ])
                            @endif
                        </ul>
                        <div class="wrap-comp-info mb-2">
                            @if($statusUser == 2)
                            <button data-toggle="modal" data-target="#modalFinish" class="btn btn-primary btn-sm mr-3">Hoàn thành</button>
                            @elseif($statusUser == 1)
                            <button data-toggle="modal" data-target="#modalAccept" class="btn btn-primary btn-sm mr-3">Chấp nhận</button>
                            <button data-toggle="modal" data-target="#modalReject" class="btn btn-warning btn-sm ml-3">Từ chối</button>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-12 clear-right">

                    <div class="main-wrapper">
                        <h4 class="search-find">Có {{$data->count()}} ứng viên đang ứng tuyển vào công việc của bạn</h4>
                        <div class="job-board-wrap" style="padding: 0px; margin-bottom: 0px">
                            <div class="job-group">
                                @forelse($data as $row)
                                <div class="job pagi">
                                    <div class="job-content " id="profile-user" wire:click="selectUser({{$row->id}})" tabindex="0" style="padding: 0px;">
                                        <div class="job-logo">
                                            <a href="#">
                                                <img class="img-circle" style="height: 70px;" src="{{asset($row->image)}}" class="job-logo-ima" alt="job-logo">
                                            </a>
                                        </div>
                                        <div class="job-desc" style="padding-top: 10px;">
                                            <div class="job-title ">
                                                <a>{{$row->name}} | </a>
                                                <div wire:ignore style="display: inline-block; top: -2px" id="{{'rateYo'.$row->id}}" rate='{{$row->rate()}}'></div>
                                                <span>({{$row->rateCount()}} đánh giá)</span>
                                            </div>
                                            <div class="job-company">
                                                <a class="job-address">
                                                    <i class="fa fa-code" aria-hidden="true"></i> {{$row->listTag()}}
                                                    | <i class="fa fa-map-marker" aria-hidden="true"></i> {{getAddress($row->province_id)}}
                                                </a>
                                            </div>
                                            <div class="job-inf">
                                                <div class="job-salary">
                                                    <i class="fa fa-money" aria-hidden="true"></i> Báo giá: {{$row->offer??''}} triệu
                                                </div>
                                                <div class="job-deadline">
                                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> Ngày ứng tuyển: {{$row->applyDate}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                Công việc hiện chưa có ứng viên ứng tuyển
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="main-wrapper">
                        <h4 class="search-find">Các ứng viên đang thực hiện công việc</h4>
                        <div class="job-board-wrap" style="padding: 0px; margin-bottom: 0px">
                            <div class="job-group">
                                @forelse($acceptedCandidate as $row)
                                <div class="job pagi">
                                    <div class="job-content" wire:click="selectUser({{$row->id}})" tabindex="0" style="padding: 0px;">
                                        <div class="job-logo">
                                            <a href="#">
                                                <img class="img-circle" style="height: 70px;" src="{{asset($row->image)}}" class="job-logo-ima" alt="job-logo">
                                            </a>
                                        </div>

                                        <div class="job-desc" style="padding-top: 10px;">
                                            <div class="job-title ">
                                                <a>{{$row->name}} | </a>
                                                <div wire:ignore style="display: inline-block; top: -2px" id="{{'rateYo'.$row->id}}" rate='{{$row->rate()}}'></div>
                                                <span>({{$row->rateCount()}} đánh giá)</span>
                                            </div>
                                            <div class="job-company">
                                                <a class="job-address">
                                                    <i class="fa fa-code" aria-hidden="true"></i> {{$row->listTag()}}
                                                    | <i class="fa fa-map-marker" aria-hidden="true"></i> {{getAddress($row->province_id)}}
                                                </a>
                                            </div>

                                            <div class="job-inf">

                                                <div class="job-salary">
                                                    <i class="fa fa-money" aria-hidden="true"></i> Báo giá: {{$row->offer??''}} triệu
                                                </div>
                                                <div class="job-deadline">
                                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> Ngày ứng tuyển: {{$row->applyDate}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                Hiện không có ứng viên nào đang thực hiện công việc
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modalAccept" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 20vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Chấp nhận đơn ứng tuyển</h2>
                </div>
                <div class="modal-body">
                    Bạn có muốn chấp nhận ứng viên này
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="accept()">Chấp nhận</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modalReject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 20vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Từ chối đơn ứng tuyển</h2>
                </div>
                <div class="modal-body">
                    Bạn có muốn từ chối ứng viên này
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" wire:click="reject()">Từ chối</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalFinish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 20vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Hoàn thành công việc</h2>
                </div>
                <div class="modal-body">
                    Trước khi xác nhận người dùng đã hoàn thành công việc vui lòng đánh giá người dùng này:
                    <center>
                        <div wire:ignore id="rateUser"></div>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id='finish'>Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- (end) Phần thân -->
<script>
    $(function() {
        var rating = 2.5;
        $("#rateUser").rateYo({
            rating: rating,
            halfStar: true,
        });
        var $rateYo = $("#rateUser").rateYo();
        $("#rateUser").click(function() {
            rating = $rateYo.rateYo("rating");
        });
        $("#finish").click(function() {
            @this.emit('finish', rating);
        });
        var listUserId = {{$listUserId}}
        $.each(listUserId, function(key, value) {
            $('#rateYo' + value).rateYo({
                starWidth: "15px",
                halfStar: true,
                rating: $('#rateYo' + value).attr('rate'),
                readOnly: true
            });
        });

        window.livewire.on('select-user', () => {
            $(function() {
                var $rateYo = $("#rateOfUser").rateYo();
                $rateYo.rateYo("destroy");
                $("#rateOfUser").rateYo({
                    starWidth: "15px",
                    rating: $('#rateOfUser').attr('rate'),
                    halfStar: true,
                    readOnly: true,
                });
            });
        });
    });
</script>