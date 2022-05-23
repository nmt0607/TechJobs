<div>
    <div class="container-fluid job-detail-wrap">
        <div class="container job-detail">
            <div class="job-detail-header">
                <div class="row">
                    <div class="col-md-2 col-sm-12 col-12">
                        <div class="job-detail-header-logo">
                            <a href="#">
                                <img src="{{asset('img/fpt-logo.png')}}" class="job-logo-ima" alt="job-logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-12">
                        <div class="job-detail-header-desc">
                            <div class="job-detail-header-title">
                                <a href="#">{{$job->title}}</a>
                            </div>
                            <div class="job-detail-header-company">
                                <a href="#">Fpt Software</a>
                            </div>
                            <div class="job-detail-header-de">
                                <ul>
                                    <li><i class="fa fa-map-marker icn-jd"></i><span>Đà Nẵng</span></li>
                                    <li><i class="fa fa-usd icn-jd"></i><span>15 triệu - 20 triệu</span></li>
                                    <li><i class="fa fa-calendar icn-jd"></i><span>15/01/2019</span></li>
                                </ul>
                            </div>
                            <div class="job-detail-header-tag">
                                <ul>
                                    <li>
                                        <a href="#">Java</a>
                                    </li>
                                    <li>
                                        <a href="#">.NET</a>
                                    </li>
                                    <li>
                                        <a href="#">SQL</a>
                                    </li>
                                    <li>
                                        <a href="#">C#</a>
                                    </li>
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
                                <img src="{{asset('dist/img/user1-128x128.jpg')}}" class="job-logo-ima" alt="job-logo">
                            </a>
                        </div>
                        <h2 class="company-intro-name">{{$user->name??''}}</h2>
                        <ul class="job-add">

                            <li>
                                <i class="fa fa-money ja-icn"></i>
                                <span>Báo giá: 15 triệu</span>
                            </li>
                            @livewire('component.files',[
                            'model_name' => \App\Models\Job::class,
                            'model_id'=>$job->id,
                            'admin_id'=>$user->id??'',
                            'folder' => 'jobs',
                            'canUpload'=>false,
                            'displayUploadfile' => false,
                            'displayFile'=>true
                            ])
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
                    @if($data->count())
                    <div class="main-wrapper">
                        <h4 class="search-find">Có {{$data->count()}} ứng viên đang ứng tuyển vào công việc của bạn</h4>
                        <div class="job-board-wrap" style="padding: 0px; margin-bottom: 0px">
                            <div class="job-group">
                                @foreach($data as $row)
                                <div class="job pagi">
                                    <div class="job-content " id="profile-user" wire:click="selectUser({{$row->id}})" tabindex="0" style="padding: 0px;">
                                        <div class="job-logo">
                                            <a href="#">
                                                <img class="img-circle" style="height: 70px;" src="{{asset('dist/img/user1-128x128.jpg')}}" class="job-logo-ima" alt="job-logo">
                                            </a>
                                        </div>

                                        <div class="job-desc" style="padding-top: 10px;">
                                            <div class="job-title ">
                                                <a>{{$row->name}}</a>
                                            </div>
                                            <div class="job-company">
                                                <a>Fpt Software</a> | <a class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </a>
                                            </div>

                                            <div class="job-inf">
                                                <div class="job-main-skill">
                                                    <i class="fa fa-code" aria-hidden="true"></i> <a> Java</a>
                                                </div>
                                                <div class="job-salary">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                    <span class="salary-min">15<em class="salary-unit">triệu</em></span>
                                                    <span class="salary-max">35 <em class="salary-unit">triệu</em></span>
                                                </div>
                                                <div class="job-deadline">
                                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> Hạn nộp: <strong></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    @endif
                    @if($acceptedCandidate->count())
                    <div class="main-wrapper">
                        <h4 class="search-find">Các ứng viên đang thực hiện công việc</h4>
                        <div class="job-board-wrap" style="padding: 0px; margin-bottom: 0px">
                            <div class="job-group">
                                @foreach($acceptedCandidate as $row)
                                <div class="job pagi">
                                    <div class="job-content " id="profile-user" wire:click="selectUser({{$row->id}})" tabindex="0" style="padding: 0px;">
                                        <div class="job-logo">
                                            <a href="#">
                                                <img class="img-circle" style="height: 70px;" src="{{asset('dist/img/user1-128x128.jpg')}}" class="job-logo-ima" alt="job-logo">
                                            </a>
                                        </div>

                                        <div class="job-desc" style="padding-top: 10px;">
                                            <div class="job-title ">
                                                <a>{{$row->name}}</a>
                                            </div>
                                            <div class="job-company">
                                                <a>Fpt Software</a> | <a class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </a>
                                            </div>

                                            <div class="job-inf">
                                                <div class="job-main-skill">
                                                    <i class="fa fa-code" aria-hidden="true"></i> <a> Java</a>
                                                </div>
                                                <div class="job-salary">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                    <span class="salary-min">15<em class="salary-unit">triệu</em></span>
                                                    <span class="salary-max">35 <em class="salary-unit">triệu</em></span>
                                                </div>
                                                <div class="job-deadline">
                                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> Hạn nộp: <strong></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
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
    <div wire:ignore.self class="modal fade" id="modalFinish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 20vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Hoàn thành công việc</h2>
                </div>
                <div class="modal-body">
                    Xác nhận người dùng đã hoàn thành công việc
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="finish()">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- (end) Phần thân -->