<x-guest-layout>
    <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left p-5">
            <div class="brand-logo">
                <img src="{{asset('assets/images/logo.svg')}}">
            </div>
            <h4>Hello! let's get started</h4>
            <h6 class="font-weight-light">Login to continue.</h6>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="pt-3" method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username address">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                    Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
