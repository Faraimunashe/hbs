<x-app-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-stethoscope"></i>
            </span>
            New Consultation
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>
                    Assign New
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Assign Doctor</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{route('admin-assign-consultation')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$patient->id}}" name="patient_id" required>
                        <input type="hidden" value="{{$app_id}}" name="app_id" required>
                        <div class="form-group">
                            <label for="exampleSelectGender">Choose Doctor</label>
                            <select name="doctor_id" class="form-control" id="exampleSelectGender">
                                <option selected disabled>Select Doctor</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->lname}} {{$doctor->fname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Assign</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
