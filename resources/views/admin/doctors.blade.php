<x-app-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-stethoscope"></i>
            </span>
            Doctors
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
                    <h4 class="card-title">Doctors</h4>
                    <p class="card-description"> List of doctors
                        <a href="{{route('admin-new-doctor')}}" class="btn btn-success" style="float: right;">
                            Add New
                        </a>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th> Gender </th>
                                <th> phone </th>
                                <th> Address </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td class="py-1">
                                        @php
                                            $count ++;
                                            echo $count;
                                        @endphp
                                    </td>
                                    <td> {{$doctor->lname}} {{$doctor->fname}} </td>
                                    <td>
                                        {{$doctor->sex}}
                                    </td>
                                    <td>{{$doctor->phone}}</td>
                                    <td>{{$doctor->address}}</td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-dark btn-icon">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-inverse-danger btn-icon">
                                            <i class=" mdi mdi-delete"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$doctors->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
