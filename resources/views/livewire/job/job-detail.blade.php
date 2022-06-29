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
                                <a href="#">{{$job->title}}</a>
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
                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="jd-header-wrap-right">
                            <div class="jd-center">
                                @if(Auth::user()->type == 2)
                                @if($statusApply == 1)
                                <a data-toggle="modal" data-target="#modalCancelApply" class="btn btn-warning btn-waiting" style="color: white">Chờ chấp nhận</a>
                                @elseif($statusApply == 2)
                                <a class="btn btn-success btn-waiting" style="color: white">Đang thực hiện</a>
                                @elseif($statusApply == 3)
                                <a class="btn btn-secondary btn-waiting" style="color: white">Đã bị từ chối</a>
                                @elseif($statusApply == 4)
                                <a class="btn btn-primary btn-waiting" style="color: white">Đã hoàn thành</a>
                                @else
                                <a data-toggle="modal" data-target="#modalApplyJob" class="btn btn-primary btn-waiting" style="color: white">Nộp đơn</a>
                                @endif
                                @endif
                                <p class="jd-view">Số người đang ứng tuyển: <span>{{$job->applyingUser()->count()}}</span></p>
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
                <div class="col-md-8 col-sm-12 col-12 clear-left">
                    <div class="main-wrapper">
                        <h2 class="widget-title">
                            <span>Phúc lợi</span>
                        </h2>
                        <!-- content -->
                        <div class="welfare-wrap">
                            <div class="row">
                                <div class="welfare-list">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-usd icn-welfare"></i>Have opponunity for growth.</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-user icn-welfare"></i>Working under energisitic, innovative, friendly environment.</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-circle icn-welfare"></i>Competitive salary and attractive benefits packages.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h2 class="widget-title">
                            <span>Mô tả công việc</span>
                        </h2>
                        <div class="jd-content">
                            {!! nl2br($job->description) !!}
                        </div>
                        <h2 class="widget-title">
                            <span>Yêu cầu công việc</span>
                        </h2>
                        <div class="jd-content">
                            {!! nl2br($job->requirement) !!}
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-4 col-sm-12 col-12 clear-right">
                    <div class="side-bar mb-3">
                        <h2 class="widget-title">
                            <span>Thông tin</span>
                        </h2>

                        <div class="job-info-wrap">
                            <div class="job-info-list">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="ji-title">Nơi làm việc:</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="ji-main">{{getAddress($job->address_id)}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="job-info-list">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="ji-title">Cấp bậc:</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="ji-main">{{getLevel($job->level)}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="job-info-list">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="ji-title">Lương:</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="ji-main">{{$job->salary}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="job-info-list">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="ji-title">Hạn nộp:</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="ji-main">{{reFormatDate($job->end_date)}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="job-info-list">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="ji-title">Ngành nghề:</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="ji-main">{{getJobType($job->type)}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="job-info-list">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="ji-title">Kỹ năng:</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="ji-main">{{$job->listTag()}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="job-info-list">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="ji-title">Kinh nghiệm:</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="ji-main">{{$job->experience}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="side-bar mb-3">
                        <h2 class="widget-title">
                            <span>Giới thiệu công ty</span>
                        </h2>
                        <div class="company-intro">
                            <a href="#">
                                <img src="{{asset($userCreateJob->image)}}" class="job-logo-ima" alt="job-logo">
                            </a>
                        </div>
                        <h2 class="company-intro-name">{{$userCreateJob->name}}</h2>
                        <ul class="job-add">
                            <li>
                                <i class="fa fa-map-marker ja-icn"></i>
                                <span>Trụ sở: {{$userCreateJob->address}}</span>
                            </li>
                            <li>
                                <i class="fa fa-bar-chart ja-icn"></i>
                                <span>Quy mô công ty: {{$userCreateJob->size}} người</span>
                            </li>
                        </ul>

                        <div class="wrap-comp-info mb-2">
                            <a data-toggle="modal" data-target="#modalCompanyInfo" class="btn btn-primary btn-company text-white">Xem thêm</a>
                        </div>
                    </div>

                    <div class="side-bar mb-3">
                        <h2 class="widget-title">
                            <span>Việc làm tương tự</span>
                        </h2>

                        <div class="job-tt-contain scroll" style="max-height: 678px;">
                            @foreach($similarJobs as $job)
                            <div class="job-tt-item mt-3">
                                <a href="{{route('job.detail', ['id' => $job->id])}}" class="thumb">
                                    <div style="background-image: url({{asset($job->user->image)}});"></div>
                                </a>
                                <div class="info">
                                    <a href="{{route('job.detail', ['id' => $job->id])}}" class="jobname">
                                        {{$job->title}}
                                    </a>
                                    <a href="{{route('job.detail', ['id' => $job->id])}}" class="company">
                                        {{$job->user->name}}
                                    </a>
                                    <a href="{{route('job.detail', ['id' => $job->id])}}" class="company">
                                        {{$job->listTag()}}
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- (end) Phần thân -->



    <!-- job support -->
    @livewire('component.support')
    <!-- (end) job support -->
    <div wire:ignore.self class="modal fade" id="modalApplyJob" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 20vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Nộp đơn ứng tuyển</h2>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right label">Báo giá(<span style="color:red">*</span>)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" wire:model.defer="offer" placeholder="Nhập báo giá (triệu VNĐ)">
                            @error("offer")
                            @include("layouts.partials.text._error")
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            @livewire('component.files',[
                            'model_name' => \App\Models\Job::class,
                            'model_id'=>$jobId,
                            'folder' => 'jobs',
                            'admin_id'=>auth()->id(),
                            'canUpload'=>true,
                            'displayUploadfile' => true,
                            'displayFile'=>true
                            ])
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close-modal-apply" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-success" wire:click="apply()">Ứng tuyển</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modalCancelApply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 20vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Bạn đang ứng tuyển công việc này</h2>
                </div>
                <div class="modal-body">
                    Bạn có muốn hủy ứng tuyển
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="cancelApply()">Hủy ứng tuyển</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modalCompanyInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 5vh; max-width:650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Thông tin nhà tuyển dụng</h2>
                </div>
                <div class="modal-body">
                    <center>
                    <div class="job-detail-header-logo">
                        <a href="#">
                            <img src="{{asset($userCreateJob->image)}}" class="job-logo-ima" alt="job-logo">
                        </a>
                    </div>
                    </center>
                    <h2 class="company-intro-name">{{$userCreateJob->name}}</h2>
                    <ul class="job-add">
                        <li>
                            <i class="fa fa-map-marker ja-icn"></i>
                            <span>Trụ sở: {{$userCreateJob->address}}</span>
                        </li>
                        <li>
                            <i class="fa fa-bar-chart ja-icn"></i>
                            <span>Quy mô công ty: {{$userCreateJob->size}} người</span>
                        </li>
                        <li>
                            <i class="fa fa-info ja-icn"></i>
                            <span>Giới thiệu: <br>{!! nl2br($userCreateJob->description) !!}</span>
                        </li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("document").ready(() => {
        $('#modalApplyJob').on('hidden.bs.modal', function() {
            @this.emit('resetData');
        })
        window.livewire.on('close-modal-apply', () => {
            $("#close-modal-apply").click();
        });
    })
</script>