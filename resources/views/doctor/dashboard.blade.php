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
                    Doctor
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">My Patients</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th> Gender </th>
                                <th> DOB </th>
                                <th> Phone </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($consultations as $item)
                                <tr>
                                    <td class="py-1">
                                        @php
                                            $patient = $item->fname.' '.$item->lname;
                                            $count ++;
                                            echo $count;
                                        @endphp
                                    </td>
                                    <td> {{$item->fname}} {{$item->lname}}</td>
                                    <td>
                                        {{$item->sex}}
                                    </td>
                                    <td>{{$item->dob}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-primary btn-sm">
                                            <i class="mdi mdi-comment-text-outline"></i>
                                        </button>
                                        <button type="button" class="btn btn-inverse-success btn-sm">
                                            <i class="mdi mdi-pill"></i>
                                        </button>
                                        <a href="{{route('dr-new-appointment', [$item->id, $patient])}}" class="btn btn-inverse-info btn-sm">
                                            <i class="mdi mdi-pin"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
