<x-app-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-text-to-speech"></i>
            </span>
            Consultations
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
                <h4 class="card-title">Consultation Table</h4>
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Doctor</th>
                      <th>Patient</th>
                      <th>Status</th>
                      <th>Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($consultations as $item)
                        <tr>
                            <th>
                                @php
                                    $doctor = get_doctor($item->doctor_id);
                                    $patient = get_patient($item->patient_id);
                                    $status = cons_status($item->status);
                                    $count ++;
                                    echo $count;
                                @endphp
                            </th>
                            <td>{{$doctor->lname}} {{$doctor->fname}}</td>
                            <td>{{$patient->lname}} {{$patient->fname}}</td>
                            <td>
                                <label class="badge badge-{{$status->badge}}">
                                    {{$status->label}}
                                </label>
                            </td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
