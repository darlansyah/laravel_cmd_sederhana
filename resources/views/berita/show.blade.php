<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href=" {{ asset('assets/images/favicon.ico') }} ">

        <!-- App title -->
        <title>{{$b->title}}</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">

        <!-- Switchery css -->
        <link href="{{ asset('plugins/switchery/switchery.min.css') }}" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>

    </head>

    <body>


      <!-- Navigation Bar-->
      <header id="topnav">
        <div class="topbar-main">
          <div class="container">

            <!-- LOGO -->
            <div class="topbar-left">
              <a href="index.html" class="logo">
                <i class="zmdi zmdi-group-work icon-c-logo"></i>
                <span>Uplon</span>
              </a>
            </div>
            <!-- End Logo container-->
            <div class="menu-extras navbar-topbar">

                <ul class="list-inline float-right mb-0">

                    <li class="list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow"><small>{{auth()->user()->name}}</small> </h5>
                            </div>
                            <!-- item-->
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-power"></i> <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>

                </ul>

            </div> <!-- end menu-extras -->


            <div class="clearfix"></div>

          </div>
          <!-- end container -->
        </div>
        <!-- end topbar-main -->


        <div class="navbar-custom">
          <div class="container">
            <div id="navigation">
              <!-- Navigation Menu-->
              <ul class="navigation-menu">
                <li>
                  <a href="index.html"><i class="zmdi zmdi-view-dashboard"></i>
                    <span> Dashboard </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('berita') }}"><i class="zmdi zmdi-view-dashboard"></i>
                    <span> Berita </span>
                  </a>
                </li>
              </ul>
              <!-- End navigation menu  -->
            </div>
          </div>
        </div>
      </header>
      <!-- End Navigation Bar-->




      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="wrapper">
          <div class="container m-t-20">

            <div class="row">
              <div class=" col-lg-1">
              </div>
              <div class=" col-lg-10">

                                      <div class="card ">
                                          <div class="card-body">
                                            @if($b->status == 'Public')
                                              <span class="badge badge-success"> {{$b->status}} </span>
                                            @elseif($b->status == 'Draf')
                                              <span class="badge badge-secondary"> {{$b->status}} </span>
                                            @endif
                                            <a href="{{ route('berita.edit',['id' => $b->id]) }}"> <span class="badge badge-warning"> Edit </span> </a>
                                            <a href="{{ route('berita.delete',['id' => $b->id]) }}"   onclick="return confirm('Apakah Data Ingin Dihapus?')"><span class="badge badge-danger"> Delete </span> </a>
                                              <h5 class="card-title">{{$b->title}}</h5>
                                              <h6 class="card-subtitle text-muted"><em>"{{ $b->excerpt }}"</em></h6>
                                          </div>
                                          <img class="d-block img-fluid" src="/image/{{$b->thumbnail}}" alt="Card image cap">
                                          <div class="card-body">
                                              <p class="card-text">
                                                {{ $b->author }}, {{ $b->created_at }}
                                                {!! $b->content !!}
                                                </p>


                                          </div>
                                      </div>

                                  </div>

                </div>

          <!-- main -->




          <!-- end main -->


            </div> <!-- container -->


            <!-- Footer -->
            <footer class="footer">
                2016 - 2019 © Uplon.
            </footer>
            <!-- End Footer -->


            </div> <!-- End wrapper -->


            <!-- jQuery  -->
            <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
            <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('assets/js/waves.js') }}"></script>
            <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
            <script src="{{ asset('plugins/switchery/switchery.min.js') }}"></script>

            <!--Morris Chart-->
            <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
            <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>

            <!-- Counter Up  -->
            <script src="{{ asset('plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
            <script src="{{ asset('plugins/counterup/jquery.counterup.js') }}"></script>

            <!-- Page specific js -->
            <script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>

            <!-- App js -->
            <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
            <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

            </body>
            </html>
