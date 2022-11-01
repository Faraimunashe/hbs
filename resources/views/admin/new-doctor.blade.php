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
                    Add New
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New Doctor</h4>
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
                    <form class="forms-sample" action="{{route('admin-add-doctor')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Firstname</label>
                                    <input type="text" name="fname" class="form-control" id="exampleInputName1" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Lastname</label>
                                    <input type="text" name="lname" class="form-control" id="exampleInputName1" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectGender">Gender</label>
                                    <select name="sex" class="form-control" id="exampleSelectGender">
                                        <option selected disabled>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Phone</label>
                                    <input type="tel" name="phone" class="form-control" id="exampleInputName1" placeholder="Phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Home Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputName1" placeholder="Address">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputName1" placeholder="Email address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputName1" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
