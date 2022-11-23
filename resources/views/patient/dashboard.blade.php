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
                    Patient
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Are you feeling sick?</h4>
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
                    @if (Session::has('info'))
                        <div class="alert alert-info" role="alert">
                            {{Session::get('info')}}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{route('pt-apply')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select name="resp" class="form-control form-control-lg" id="exampleInputName1">
                                        <option selected disabled> Choose Answer </option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-gradient-primary me-2">New Consultation</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Appointments</h4>

                <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        @foreach ($appointments as $item)
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> {{$item->topic}} <strong>Date: </strong>{{$item->date}}  <strong>Time: </strong>{{$item->time}}<i class="input-helper"></i></label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                        @endforeach
                    </ul>
                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
