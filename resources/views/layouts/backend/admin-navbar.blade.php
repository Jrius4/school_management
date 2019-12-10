  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/home')}}" class="nav-link">Dashboard</a>
          </li>
        </ul>
    
        <!-- SEARCH FORM -->
        {{-- <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> --}}
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <!-- Notifications Dropdown Menu -->
         


    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <?php $currentUser = Auth::user() ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ $currentUser->gravatar() }}" class="user-image" alt="{{ $currentUser->name }}">
              <span class="hidden-xs">{{ $currentUser->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ $currentUser->gravatar() }}" class="img-circle" alt="User Image">
  
                <p>
                  {{ $currentUser->name }} - {{ $currentUser->roles->first()->display_name }}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="row d-flex justify-content-between">
                  <div class="mr-auto">
                    <a href="{{ url('/edit-account') }}" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="ml-auto">
                    <a  href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                
                </div>
                <div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
  
      

          
        </ul>
      </nav>
      <!-- /.navbar -->
    
    