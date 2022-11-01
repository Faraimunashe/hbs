<x-app-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-pin"></i>
            </span>
            Create Appointment
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
                  <h4 class="card-title">Make Appointment</h4>
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
                    <form class="forms-sample" action="{{route('dr-create-appointment')}}" method="POST">
                        @csrf
                        <input type="hidden" name="consultation_id" value="{{$cons_id}}" required>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Time</label>
                                    <input type="time" name="time" class="form-control" id="exampleInputName1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Date</label>
                                    <input type="date" name="date" class="form-control" id="exampleInputName1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Topic</label>
                                    <input type="text" name="topic" class="form-control" id="exampleInputName1" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Location</label>
                                    <input type="text" name="location" class="form-control" id="exampleInputName1" placeholder="Location">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
