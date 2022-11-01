<x-app-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-seat-flat"></i>
            </span>
            Patients
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>
                    info
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Patients</h4>
                    <p class="card-description"> List of patients
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th> Gender </th>
                                <th> phone </th>
                                <th> Address </th>
                                <th> DOB </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($patients as $patient)
                                <tr>
                                    <td class="py-1">
                                        @php
                                            $count ++;
                                            echo $count;
                                        @endphp
                                    </td>
                                    <td> {{$patient->lname}} {{$patient->fname}} </td>
                                    <td>
                                        {{$patient->sex}}
                                    </td>
                                    <td>{{$patient->phone}}</td>
                                    <td>{{$patient->address}}</td>
                                    <td>
                                        {{$patient->dob}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$patients->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
