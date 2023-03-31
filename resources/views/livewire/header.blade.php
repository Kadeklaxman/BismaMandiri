<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">

        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('img/Logobisma.png') }}" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark2">
        <div class="container-fluid">
            <div class="collapse" id="search-nav">
                <div class="collapse" id="search-nav">
                    <span style="color:white">Bisma Mandiri Denpasar</span>
                </div>
            </div>
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                
                <!-- Realtime DateTime -->
                <li class="nav-item dropdown hidden-caret">
                    <a href="#" class="nav-link">
                        <i class="far fa-clock"></i>
                        <span id="datetime"></span>
                        {{-- <span id="time"></span>
                        <span id="date"></span>  --}}
                    </a>
                </li>
                
                <!-- END Realtime DateTime -->

                {{-- <livewire:notification> --}}

                <li class="nav-item dropdown hidden-caret">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="
                                avatar-img rounded-circle">
                        </div>
                    </a>
                    @else
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <div class="avatar-img rounded-circle">
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    @endif

                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="avatar-img rounded">
                                        @else
                                            <div class="avatar-img rounded">
                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name  }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p><a
                                            href="{{ route('profile.show') }}"
                                            class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <a class="dropdown-item" href="{{ route('api-tokens.index') }}">API Tokens</a>
                                @endif
                                <form action="{{ route('logout') }}" method="post" style="cursor: pointer;">
                                @csrf
                                    <a class="dropdown-item" style="color: red;" onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout</a>
                                </form>
                                <div class="dropdown-divider"></div>
                                <center>
                                   
                                </center>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>

@push('after-script')
<script>
    // $(document).ready(function() {
    //     var interval = setInterval(function() {
    //         var momentNow = moment();
    //         $('#date').html(momentNow.format('dddd').substring(0,3) + ', '
    //                         + momentNow.format('D MMM YYYY'));
    //         $('#time').html(momentNow.format('HH:mm:ss') + ' | ');
    //     }, 100);
    // });
    function displayDateTime() {
			var now = new Date();
			var date = now.toLocaleDateString();
			var time = now.toLocaleTimeString();
			document.getElementById("datetime").innerHTML = date + " " + time;
		}
		displayDateTime();
		setInterval(displayDateTime, 1000);
</script>
@endpush