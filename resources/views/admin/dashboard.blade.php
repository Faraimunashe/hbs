<x-app-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span>
            Dashboard
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>
                    Overview
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                        Total Doctors
                        <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                        Total Patients
                        <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                        Pending Appointments
                        <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">0</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Applications</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Patient</th>
                                <th> Gender </th>
                                <th> DOB </th>
                                <th> Payment </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($applications as $item)
                                <tr>
                                    <td class="py-1">
                                        @php
                                            $patient = patient($item->user_id);
                                            $count ++;
                                            echo $count;
                                        @endphp
                                    </td>
                                    <td> {{$patient->lname}} {{$patient->fname}} </td>
                                    <td>
                                        {{$patient->sex}}
                                    </td>
                                    <td>{{$patient->dob}}</td>
                                    <td>{{$item->paid}}</td>
                                    <td>
                                        <a href="#" class="btn btn-inverse-success btn-icon">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$applications->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
