<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
            <div class="nav-profile-image">
                <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
                <span class="text-secondary text-small">{{ Auth::user()->roles->first()->display_name }}</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        @if (Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin-doctors')}}">
                    <span class="menu-title">Doctors</span>
                    <i class="mdi mdi-stethoscope menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin-patients')}}">
                    <span class="menu-title">Patients</span>
                    <i class="mdi mdi-seat-flat menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin-consultations')}}">
                    <span class="menu-title">Consultations</span>
                    <i class="mdi mdi-text-to-speech menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="menu-title">Appointments</span>
                    <i class="mdi mdi-pin menu-icon"></i>
                </a>
            </li>
        @elseif (Auth::user()->hasRole('doctor'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('dr-appointments')}}">
                    <span class="menu-title">Appointments</span>
                    <i class="mdi mdi-pin menu-icon"></i>
                </a>
            </li>
        @else

        @endif
    </ul>
</nav>
