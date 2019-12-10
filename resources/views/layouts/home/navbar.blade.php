    {{-- <!-- Top Bar --> --}}






          {{-- <!-- Navbar --> --}}



          <nav class="navbar navbar-expand-lg px-lg-0 main-navbar-normal {{$new_page%2==0?'navbar-light bg-light main-navbar-light':'navbar-dark bg-primary main-navbar-blue'}}   sticky-top">
            <div class="container position-relative">
              {{-- <!-- Navbar Brand--> --}}
              <a href="{{url('/')}}" class="navbar-brand">
                @if ($new_page%2==0)
                <img class="logo-navbar" src="{{asset('/img/logos/Group 2.png')}}" alt="logo">
                @else
                <img class="logo-navbar" src="{{asset('/img/logos/Group 2.png')}}" alt="logo">
                @endif

            </a>
              {{-- <!-- Toggle Button--> --}}
              <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">Menu <i class="fa fa-bars"></i></button>
              {{-- <!-- Navbar Menu--> --}}
              <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <div class="navbar-nav ml-auto align-items-lg-center">

                  <div class="nav-item {{$new_page_active=='home'?'active':''}}"><a href="{{url('/')}}" class="nav-link">Home</a></div>
                  <div class="nav-item {{$new_page_active=='processes'?'active':''}}"><a href="{{url('/processes')}}" class="nav-link">Processes</a></div>

                <div class="nav-item {{$new_page_active=='projects'?'active':''}}"><a href="{{route('projects.index')}}" class="nav-link">Projects</a></div>
                <div class="nav-item {{$new_page_active=='blog'?'active':''}}"><a href="{{url('/blog')}}" class="nav-link">Blog</a></div>
                <div class="nav-item {{$new_page_active=='careers'?'active':''}}"><a href="{{url('/careers')}}" class="nav-link">Careers</a></div>
                  <div class="nav-item {{$new_page_active=='about-us'?'active':''}}"><a href="{{url('/about-us')}}" class="nav-link">About Us</a></div>
                  <div class="nav-item {{$new_page_active=='contact-us'?'active':''}}"><a href="{{url('/contact-us')}}" class="nav-link">Contact Us</a></div>
                  <div class="nav-item">
                    <ul class="list-inline">
                    <li class="list-inline-item">
                            {{-- <button type="button" class="btn btn-white btn-quote" >GEt A QUOTE</button> --}}
                            <button id="navbarCategory" class="nav-link text-center  btn btn-sm {{$new_page%2==0?'btn-unique btn-quote':'btn-unique btn-quote-white'}}"
                            data-toggle="modal" data-target="#myModal">GET QUOTE</button>
                    </li>

                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>

