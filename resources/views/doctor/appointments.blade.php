<x-app-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-pin"></i>
            </span>
            Appointments
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>
                    doctor
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Appointments</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Subject</th>
                                <th> Date </th>
                                <th> Time </th>
                                <th> Patient </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($appointments as $item)
                                <tr>
                                    <td class="py-1">
                                        @php
                                            $patient = get_patient($item->patient_id);
                                            $count ++;
                                            echo $count;
                                        @endphp
                                    </td>
                                    <td> {{$item->topic}}</td>
                                    <td>
                                        {{$item->time}}
                                    </td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$patient->fname}} {{$patient->lname}}</td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-danger btn-icon">
                                            <i class=" mdi mdi-delete"></i>
                                        </button>
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
