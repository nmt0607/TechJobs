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
                                @if($statusApply == 1)
                                <a data-toggle="modal" data-target="#modalCancelApply" class="btn btn-warning btn-waiting" style="color: white">Chờ chấp nhận</a>
                                @elseif($statusApply == 2)
                                <a class="btn btn-success btn-waiting" style="color: white">Đang thực hiện</a>
                                @elseif($statusApply == 3)
                                <a class="btn btn-secondary btn-waiting" style="color: white">Đã bị từ chối</a>
                                @else
                                <a data-toggle="modal" data-target="#modalApplyJob" class="btn btn-primary btn-waiting" style="color: white">Nộp đơn</a>
                                @endif
                                <p class="jd-view">Lượt xem: <span>1.520</span></p>
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
                            (*). Validus Vietnam is looking for a Senior QA Engineer for Web and Mobile applications.<br>
                            As a Senior QA Engineer, you will be working alongside the Vietnam technology and product development teams to create and execute manual and automated tests to ensure product quality. This position works collaboratively with the regional technology team and is based in Ho Chi Minh City, Vietnam.<br>
                            <br>
                            (*). Responsibilities:<br>
                            - Obtain a detailed understanding of Validus’ web & mobile applications, the lending engine platform, issues and potential issues affecting the platform.<br>
                            - Work alongside internal and vendor product development teams across different locations (India and Singapore), communicate clearly and frequently with all team members, business stakeholders and product owners to ensure the quality of the Validus platform.<br>
                            - Work with teams to plan projects, assess risks and help meet product deadlines.<br>
                            - Review and analyze the effectiveness and efficiency of existing systems and develop testing strategies for improving or leveraging these systems.<br>
                            - Conduct tests before product launches to ensure software runs smoothly and meets client needs across our web & mobile applications, testing for different browsers, devices and versions for compatibility as needed.<br>
                            - Drive improvements in unit testing coverage, develop test suites, expand automation.<br>
                            - Automate test plans and test cases based on business requirements, user stories and technical specifications.<br>
                            - Create and execute test scripts, cases, and scenarios.<br>
                            - Conduct all types of application testing as needed, such as system, unit, regression, load, and acceptance testing methods.<br>
                            - Assist in reproducing, investigating and debugging technical issues with the product development team.<br>
                            - Responsible for signing off on release readiness and documentation for all testing efforts, results, activities, data, logging, and tracking, closing out bugs and software issues.<br>
                            - Communicate test progress, test results, and other relevant information to project stakeholders and management.<br>
                            - Cultivate and disseminate knowledge of application-testing best practices.<br>
                        </div>
                        <h2 class="widget-title">
                            <span>Yêu cầu công việc</span>
                        </h2>
                        <div class="jd-content">
                            - 5+ years directly testing and/or supporting web platform and mobile applications;<br>
                            - Experience with fintech and salesforce-based applications is a plus;<br>
                            - Experience testing compatibility across Mac and PC operating systems, various browsers and devices, with knowledge of tools and best practices for testing applications;<br>
                            - Go beyond essential QA testing to anticipate problems and alert them to developers and relevant stakeholders;<br>
                            - Experience using developer/debugging tools and defect tracking tools like Jira;<br>
                            - Proven experience developing test cases and test plans, that cover positive, negative and edge scenarios;<br>
                            - Strong documentation and communication skills;<br>
                            - Experienced working on web and mobile app technologies that use HTML, CSS, JavaScript, Android Studio, Native, Vue JS etc;<br>
                            - Experienced using Jira, Confluence and working in a scrum / agile development framework;<br>
                            - Experienced working in a fast-paced startup environment, with a can do attitude, capable of coping with urgent market needs and doing what is necessary to deliver exceptional product to market;<br>
                            - Experience using creative skills to effectively break code;<br>
                            - Team player;<br>
                            - Experienced working independently and with remote teams in other countries and time zones;<br>
                            - Good and effective English communication skills is a must;<br>
                            - Organized, thoughtful and enjoy creating order out of chaos;<br>
                            - Keen attention to detail and consistency;<br>
                            - Vietnam citizens or Permanent Residents (with fluency in Vietnamese) preferred.<br>
                            <br>
                            (**). Benefits:<br>
                            - All benefits according to the Vietnamese labour law, including 13rd-month salary;<br>
                            - Annual leave of 18 days;<br>
                            - Social insurance, health insurance & unemployment insurance according to Vietnam Labor Law;<br>
                            - Private health insurance;<br>
                            - Annual professional training and development $2K (ie. Courses, workshops, events, etc. must be approved by line manager).<br>
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
                                        <span class="ji-main">{{$job->address_id}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="job-info-list">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="ji-title">Cấp bậc:</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="ji-main">{{$job->level}}</span>
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
                                        <span class="ji-main">{{$job->type}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="job-info-list">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="ji-title">Kỹ năng:</span>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="ji-main">PR Activity</span>
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
                                <img src="img/fpt-logo.png" class="job-logo-ima" alt="job-logo">
                            </a>
                        </div>
                        <h2 class="company-intro-name">Fpt Software</h2>
                        <ul class="job-add">
                            <li>
                                <i class="fa fa-map-marker ja-icn"></i>
                                <span>Trụ sở: 212 Phan Đăng Lưu - Hòa Cường Bắc - Hải Châu - Đà Nẵng </span>
                            </li>
                            <li>
                                <i class="fa fa-bar-chart ja-icn"></i>
                                <span>Quy mô công ty: 50-100 người</span>
                            </li>
                        </ul>

                        <div class="wrap-comp-info mb-2">
                            <a href="#" class="btn btn-primary btn-company">Xem thêm</a>
                        </div>
                    </div>

                    <div class="side-bar mb-3">
                        <h2 class="widget-title">
                            <span>Việc làm tương tự</span>
                        </h2>

                        <div class="job-tt-contain">
                            <div class="job-tt-item">

                                <a href="#" class="thumb">
                                    <div style="background-image: url(img/alipay-logo.png);"></div>
                                </a>

                                <div class="info">
                                    <a href="#" class="jobname">
                                        Fullstack .NET Developer (Angular/React)
                                    </a>
                                    <a href="#" class="company">
                                        Alipay Software
                                    </a>
                                </div>
                            </div>

                            <div class="job-tt-item">

                                <a href="#" class="thumb">
                                    <div style="background-image: url(img/fpt-logo.png);"></div>
                                </a>

                                <div class="info">
                                    <a href="#" class="jobname">
                                        [HCM] 02 Solution Architects–Up to $2000
                                    </a>
                                    <a href="#" class="company">
                                        FPT Software
                                    </a>
                                </div>
                            </div>
                            <div class="job-tt-item">

                                <a href="#" class="thumb">
                                    <div style="background-image: url(img/alipay-logo.png);"></div>
                                </a>

                                <div class="info">
                                    <a href="#" class="jobname">
                                        Fullstack .NET Developer (Angular/React)
                                    </a>
                                    <a href="#" class="company">
                                        Alipay Software
                                    </a>
                                </div>
                            </div>
                            <div class="job-tt-item">
                                <a href="#" class="thumb">
                                    <div style="background-image: url(img/alipay-logo.png);"></div>
                                </a>
                                <div class="info">
                                    <a href="#" class="jobname">
                                        Fullstack .NET Developer (Angular/React)
                                    </a>
                                    <a href="#" class="company">
                                        Alipay Software
                                    </a>
                                </div>
                            </div>
                            <div class="job-tt-item">
                                <a href="#" class="thumb">
                                    <div style="background-image: url(img/alipay-logo.png);"></div>
                                </a>
                                <div class="info">
                                    <a href="#" class="jobname">
                                        Fullstack .NET Developer (Angular/React)
                                    </a>
                                    <a href="#" class="company">
                                        Alipay Software
                                    </a>
                                </div>
                            </div>
                            <div class="job-tt-item">

                                <a href="#" class="thumb">
                                    <div style="background-image: url(img/alipay-logo.png);"></div>
                                </a>

                                <div class="info">
                                    <a href="#" class="jobname">
                                        Fullstack .NET Developer (Angular/React)
                                    </a>
                                    <a href="#" class="company">
                                        Alipay Software
                                    </a>
                                </div>
                            </div>
                            <div class="job-tt-item">

                                <a href="#" class="thumb">
                                    <div style="background-image: url({{asset('img/alipay-logo.png')}});"></div>
                                </a>

                                <div class="info">
                                    <a href="#" class="jobname">
                                        Fullstack .NET Developer (Angular/React)
                                    </a>
                                    <a href="#" class="company">
                                        Alipay Software
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="side-bar mb-3">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="home-ads">
                                        <a href="#">
                                            <img src="{{asset('img/ads1.jpg')}}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- (end) Phần thân -->



    <!-- job support -->
    <div class="container-fluid job-support-wrapper">
        <div class="container-fluid job-support-wrap">
            <div class="container job-support">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <ul class="spp-list">
                            <li>
                                <span><i class="fa fa-question-circle pr-2 icsp"></i>Hỗ trợ nhà tuyển dụng:</span>
                            </li>
                            <li>
                                <span><i class="fa fa-phone pr-2 icsp"></i>0123.456.789</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="newsletter">
                            <span class="txt6">Đăng ký nhận bản tin việc làm</span>
                            <div class="input-group frm1">
                                <input type="text" placeholder="Nhập email của bạn" class="newsletter-email form-control">
                                <a href="#" class="input-group-addon"><i class="fa fa-lg fa-envelope-o colorb"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <input type="text" class="form-control" wire:model.defer="offer" placeholder="Nhập báo giá (nghìn đồng)">
                            @error("offer")
                            @include("layouts.partials.text._error")
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="col-sm-12">
                            @livewire('component.files',[
                            'model_name' => \App\Models\Job::class,
                            'model_id'=>$job->id,
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