@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <!-- ChartC3 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/c3-chart/c3.min.css') }}">
@endpush

@section('content')

    <!-- start row -->
    <div class="row">
        <div class="col-lg-8 col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-divide p-0 mb-0">
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item fw-medium active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                        <h5 class="fw-bold mb-0">Admin Dashboard</h5>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->

            <!-- start row - Summary Cards -->
            <div class="row">

                <div class="col-md-6 col-xl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="avatar avtar-lg bg-teal mb-2"><img src="{{ asset('assets/img/icons/dashboard-card-icon-01.svg') }}" class="w-auto h-auto" alt="Icon"></div>
                                    <h6 class="fs-14 fw-semibold mb-0">Employees</h6>
                                </div>
                                <div id="circle_chart_1"></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-md-6 col-xl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="avatar avtar-lg bg-warning mb-2"><img src="{{ asset('assets/img/icons/dashboard-card-icon-01.svg') }}" class="w-auto h-auto" alt="Icon"></div>
                                    <h6 class="fs-14 fw-semibold mb-0">Companies</h6>
                                </div>
                                <div id="circle_chart_2"></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-md-6 col-xl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="avatar avtar-lg bg-orange mb-2"><img src="{{ asset('assets/img/icons/dashboard-card-icon-01.svg') }}" class="w-auto h-auto" alt="Icon"></div>
                                    <h6 class="fs-14 fw-semibold mb-0">Leaves</h6>
                                </div>
                                <div id="circle_chart_3"></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-md-6 col-xl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="avatar avtar-lg bg-teal mb-2"><img src="{{ asset('assets/img/icons/dashboard-card-icon-01.svg') }}" class="w-auto h-auto" alt="Icon"></div>
                                    <h6 class="fs-14 fw-semibold mb-0">Salary</h6>
                                </div>
                                <div id="circle_chart_7"></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

            </div>
            <!-- end row -->

            <!-- start row - Stats Cards -->
            <div class="row">

                <div class="col-md-6 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="mb-1">
                                        <p class="mb-1 text-dark">Total Applications</p>
                                        <h6 class="fs-16 fw-semibold mb-1">5,358</h6>
                                    </div>
                                    <p class="fs-12 text-truncate text-dark mb-0"><span class="text-success me-1"><i class="ti ti-trending-up"></i></span>+1.4% from last week</p>
                                </div>
                                <div id="circle_chart_4"></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-md-6 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="mb-1">
                                        <p class="mb-1 text-dark">Total Shortlisted</p>
                                        <h6 class="fs-16 fw-semibold mb-1">4,280</h6>
                                    </div>
                                    <p class="fs-12 text-truncate text-dark mb-0"><span class="text-success me-1"><i class="ti ti-trending-up"></i></span>+1.4% from last week</p>
                                </div>
                                <div id="circle_chart_5"></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-md-6 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="mb-1">
                                        <p class="mb-1 text-dark">Total Rejected</p>
                                        <h6 class="fs-16 fw-semibold mb-1">1078</h6>
                                    </div>
                                    <p class="fs-12 text-truncate text-dark mb-0"><span class="text-success me-1"><i class="ti ti-trending-up"></i></span>+1.4% from last week</p>
                                </div>
                                <div id="circle_chart_6"></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div><!-- end col -->

        <div class="col-lg-4 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="index-profile text-center">
                        <img src="{{ asset('assets/img/users/user-05.jpg') }}" alt="img" class="avatar avatar-xxl rounded-circle shadow">
                        <div class="text-center mb-0">
                            <h5 class="fw-bold mb-1">Welcome Admin</h5>
                            <p class="mb-0">{{ now()->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="index-profile-links">
                        <a href="{{ route('dashboard') }}" class="dashboard-toggle active">Admin Dashboard</a>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

    </div>
    <!-- end row -->

    <!-- start row - Charts -->
    <div class="row">

        <div class="col-md-6 col-xl-4 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="fw-bold mb-0">Total Employees</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div id="polarchart"></div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fs-14 mb-3"><i class="ti ti-square-filled text-primary me-1"></i>Design</h6>
                            <h6 class="fs-14 mb-0"><i class="ti ti-square-filled text-warning me-1"></i>Development</h6>
                        </div>
                        <div class="col-6">
                            <h6 class="fs-14 mb-3"><i class="ti ti-square-filled text-success me-1"></i>Business</h6>
                            <h6 class="fs-14 mb-0"><i class="ti ti-square-filled text-orange me-1"></i>Testing</h6>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-md-6 col-xl-5 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="fw-bold mb-0">Total Applications</h5>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <div id="applications_chart"></div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="fs-14 mb-0"><i class="ti ti-square-filled text-primary me-1"></i>Total</h6>
                                <div class="d-flex">
                                    <span class="span-divider me-3">5358</span>
                                    <span>44%</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fs-14 mb-0"><i class="ti ti-square-filled text-warning me-1"></i>Shortlisted</h6>
                                <div class="d-flex">
                                    <span class="span-divider me-3">857</span>
                                    <span>16%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="fs-14 mb-0"><i class="ti ti-square-filled text-success me-1"></i>Selected</h6>
                                <div class="d-flex">
                                    <span class="span-divider me-3">1714</span>
                                    <span>32%</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fs-14 mb-0"><i class="ti ti-square-filled text-orange me-1"></i>Rejected</h6>
                                <div class="d-flex">
                                    <span class="span-divider me-3">428</span>
                                    <span>08%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-md-12 col-xl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="fw-bold mb-0">Employee Structure</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex d-xl-block align-items-center justify-content-center flex-wrap text-center">
                        <div>
                            <div id="chart_male"></div>
                            <p class="text-center fw-semibold text-dark mb-0">Male</p>
                        </div>
                        <div>
                            <div id="chart_female"></div>
                            <p class="text-center fw-semibold text-dark mb-0">Female</p>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div>
    <!-- end row -->

    <!-- start row - Activities & Tables -->
    <div class="row">

        <div class="col-lg-5 d-flex">
            <div class="card shadow flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0">Recent Activities</h6>
                    <a href="#" class="btn btn-sm btn-icon btn-outline-white border-0"><i class="ti ti-refresh"></i></a>
                </div>
                <div class="card-body">
                    @php
                        $activities = [
                            ['name' => 'John Carter', 'action' => 'Added New Project HRMS Dashboard', 'time' => '06:20 PM', 'img' => 'employee-01.jpg'],
                            ['name' => 'Sophia White', 'action' => 'Commented on Uploaded Document', 'time' => '04:00 PM', 'img' => 'employee-02.jpg'],
                            ['name' => 'Michael Johnson', 'action' => 'Approved Task Projects', 'time' => '02:30 PM', 'img' => 'employee-03.jpg'],
                            ['name' => 'Emily Clark', 'action' => 'Requesting Access to Module Tickets', 'time' => '12:10 PM', 'img' => 'employee-04.jpg'],
                            ['name' => 'David Anderson', 'action' => 'Downloaded App Reports', 'time' => '10:40 AM', 'img' => 'employee-05.jpg'],
                            ['name' => 'Olivia Haris', 'action' => 'Completed ticket module in HRMS', 'time' => '09:50 AM', 'img' => 'employee-06.jpg'],
                        ];
                    @endphp
                    @foreach($activities as $index => $activity)
                        <div class="d-flex align-items-center justify-content-between {{ !$loop->last ? 'mb-3' : '' }}">
                            <div class="d-flex align-items-center">
                                <a href="#" class="avatar avatar-sm avatar-rounded flex-shrink-0">
                                    <img src="{{ asset('assets/img/employees/' . $activity['img']) }}" alt="img">
                                </a>
                                <div class="ms-2">
                                    <h6 class="fs-14 mb-1"><a href="#">{{ $activity['name'] }}</a></h6>
                                    <p class="fs-13 mb-0 text-truncate">{{ $activity['action'] }}</p>
                                </div>
                            </div>
                            <span class="badge badge-soft-primary"><i class="ti ti-clock-hour-3 me-1"></i>{{ $activity['time'] }}</span>
                        </div>
                    @endforeach
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div><!-- end col -->

        <div class="col-lg-7 d-flex">
            <div class="card shadow flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0">Team Leads</h6>
                    <a href="#" class="btn btn-sm btn-outline-white">Manage Team</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-nowrap border">
                            <thead>
                                <tr>
                                    <th>Lead Name</th>
                                    <th>Team</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $teamLeads = [
                                        ['name' => 'Braun Kelton', 'team' => 'PHP', 'badge' => 'teal', 'email' => 'braun@example.com', 'img' => 'employees/employee-03.jpg'],
                                        ['name' => 'Sarah Michelle', 'team' => 'IOS', 'badge' => 'pink', 'email' => 'sarah@example.com', 'img' => 'employees/employee-06.jpg'],
                                        ['name' => 'Daniel Patrick', 'team' => 'HTML', 'badge' => 'orange', 'email' => 'daniel@example.com', 'img' => 'managers/manager-07.jpg'],
                                        ['name' => 'Emily Clark', 'team' => 'UI/UX', 'badge' => 'success', 'email' => 'emily@example.com', 'img' => 'employees/employee-08.jpg'],
                                        ['name' => 'Ryan Christopher', 'team' => 'React', 'badge' => 'info', 'email' => 'ryan@example.com', 'img' => 'managers/manager-05.jpg'],
                                    ];
                                @endphp
                                @foreach($teamLeads as $lead)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-sm avatar-rounded">
                                                    <img src="{{ asset('assets/img/' . $lead['img']) }}" alt="img">
                                                </a>
                                                <div class="ms-2">
                                                    <h6 class="fs-14 mb-0"><a href="#">{{ $lead['name'] }}</a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge badge-md badge-soft-{{ $lead['badge'] }}">{{ $lead['team'] }}</span></td>
                                        <td>{{ $lead['email'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div><!-- end col -->

        <div class="col-lg-7 d-flex">
            <div class="card shadow flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0">Upcoming Leaves</h6>
                    <a href="#" class="btn btn-sm btn-outline-white">Manage Leave</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-nowrap border">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $leaves = [
                                        ['name' => 'Daniel Martinz', 'date' => '17 Apr 2025', 'type' => 'Sick Leave', 'badge' => 'teal', 'img' => 'employees/employee-09.jpg'],
                                        ['name' => 'Emily Clark', 'date' => '20 Apr 2025', 'type' => 'Casual Leave', 'badge' => 'primary', 'img' => 'employees/employee-04.jpg'],
                                        ['name' => 'Daniel Patrick', 'date' => '22 Apr 2025', 'type' => 'Annual Leave', 'badge' => 'orange', 'img' => 'managers/manager-03.jpg'],
                                        ['name' => 'Sophia White', 'date' => '28 Apr 2025', 'type' => 'Sick Leave', 'badge' => 'teal', 'img' => 'employees/employee-02.jpg'],
                                        ['name' => 'Madison Andrew', 'date' => '30 Apr 2025', 'type' => 'Casual Leave', 'badge' => 'primary', 'img' => 'managers/manager-09.jpg'],
                                    ];
                                @endphp
                                @foreach($leaves as $leave)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-sm avatar-rounded">
                                                    <img src="{{ asset('assets/img/' . $leave['img']) }}" alt="img">
                                                </a>
                                                <div class="ms-2">
                                                    <h6 class="fs-14 mb-0"><a href="#">{{ $leave['name'] }}</a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $leave['date'] }}</td>
                                        <td><span class="badge badge-md badge-soft-{{ $leave['badge'] }}">{{ $leave['type'] }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div><!-- end col -->

        <div class="col-lg-5 d-flex">
            <div class="card shadow flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mb-0 fw-bold">Today</h6>
                    <a href="#" class="btn btn-sm btn-icon btn-outline-white border-0"><i class="ti ti-refresh"></i></a>
                </div>
                <div class="card-body">
                    @php
                        $todayEvents = [
                            ['text' => "Daniel Martinz's Birthday", 'icon' => 'ti-cake', 'type' => 'primary', 'img' => 'employees/employee-10.jpg'],
                            ['text' => "Amelia Curr's Birthday", 'icon' => 'ti-cake', 'type' => 'primary', 'img' => 'employees/employee-09.jpg'],
                            ['text' => "Emma Lewis's Birthday", 'icon' => 'ti-cake', 'type' => 'primary', 'img' => 'employees/employee-08.jpg'],
                            ['text' => 'Madison Andrew is off sick today', 'icon' => 'ti-calendar-star', 'type' => 'secondary', 'img' => 'managers/manager-09.jpg'],
                            ['text' => 'Victoria Celestie is off sick today', 'icon' => 'ti-calendar-star', 'type' => 'secondary', 'img' => 'managers/manager-10.jpg'],
                            ['text' => 'Daniel Patrick is off sick today', 'icon' => 'ti-calendar-star', 'type' => 'secondary', 'img' => 'managers/manager-03.jpg'],
                            ['text' => 'Jessica Renee is off sick today', 'icon' => 'ti-calendar-star', 'type' => 'secondary', 'img' => 'managers/manager-06.jpg'],
                        ];
                    @endphp
                    @foreach($todayEvents as $event)
                        <div class="d-flex align-items-center justify-content-between {{ !$loop->last ? 'mb-3' : '' }}">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm bg-soft-{{ $event['type'] }} rounded-circle text-{{ $event['type'] }} flex-shrink-0 me-2">
                                    <i class="ti {{ $event['icon'] }} fs-16"></i>
                                </span>
                                <p class="mb-0">{{ $event['text'] }}</p>
                            </div>
                            <span class="avatar avatar-sm avatar-rounded"><img src="{{ asset('assets/img/' . $event['img']) }}" alt=""></span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-5 d-flex">
            <div class="card shadow flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0">To Do List</h6>
                    <a href="#" class="btn btn-sm btn-outline-white">View All</a>
                </div>
                <div class="card-body">
                    @php
                        $todos = [
                            ['text' => 'New Employee Intro', 'priority' => 'High', 'badge' => 'danger', 'schedule' => 'Scheduled for 04:00 PM on 18 Apr 2025', 'checked' => true],
                            ['text' => 'New Employee Intro', 'priority' => 'Medium', 'badge' => 'info', 'schedule' => 'Scheduled for 04:00 PM on 18 Apr 2025', 'checked' => false],
                            ['text' => 'New Employee Intro', 'priority' => 'Low', 'badge' => 'success', 'schedule' => 'Scheduled for 04:00 PM on 18 Apr 2025', 'checked' => false],
                            ['text' => 'New Employee Intro', 'priority' => 'High', 'badge' => 'danger', 'schedule' => 'Scheduled for 04:00 PM on 18 Apr 2025', 'checked' => false],
                            ['text' => 'New Employee Intro', 'priority' => 'Medium', 'badge' => 'info', 'schedule' => 'Scheduled for 04:00 PM on 18 Apr 2025', 'checked' => false],
                        ];
                    @endphp
                    @foreach($todos as $index => $todo)
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 {{ !$loop->last ? 'mb-3' : '' }}">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="check_{{ $index + 1 }}" class="form-check-input me-2" {{ $todo['checked'] ? 'checked' : '' }}>
                                <label for="check_{{ $index + 1 }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <span class="fs-14 fw-semibold text-dark {{ $todo['checked'] ? 'text-decoration-line-through' : '' }} me-2">{{ $todo['text'] }}</span>
                                        <span class="badge badge-md badge-soft-{{ $todo['badge'] }}">{{ $todo['priority'] }}</span>
                                    </span>
                                    <span class="fs-13 mb-0">{{ $todo['schedule'] }}</span>
                                </label>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-outline-white" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                        </div>
                    @endforeach
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-7">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="fw-bold mb-0">Total Salary By Unit</h6>
                </div>
                <div class="card-body">
                    <div id="salary-chart"></div>
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div><!-- end col -->

    </div>
    <!-- end row -->

@endsection

@push('modals')
    <!-- Start Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <span class="avatar bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="mb-1">Delete Confirmation</h6>
                    <p class="mb-3">Are you sure want to delete todo?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white w-100 me-2" data-bs-dismiss="modal">Cancel</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal  -->
@endpush

@push('scripts')
    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/c3-chart/d3.v5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/c3-chart/c3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/c3-chart/chart-data.js') }}"></script>
@endpush
