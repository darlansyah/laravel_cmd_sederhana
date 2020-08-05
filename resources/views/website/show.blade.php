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
        <title>Uplon - Bootstrap 4 Responsive Admin Dashboard Template</title>

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
      <div class="row ">
          <div class="col-lg-12">
              <div  class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner" role="listbox">
                      <div class="carousel-item active">
                          <img class="d-block img-fluid" src="assets/images/big/3.jpg" alt="First slide" />
                          <div class="carousel-caption d-none d-md-block">
                              <h3>First slide label</h3>
                              <input type="submit" value="simpan">
                              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
    </div>

      <!-- Navigation Bar-->
      <header id="topnav">
          <div class="topbar-main">
              <div class="container">

                  <!-- LOGO -->
                  <div class="topbar-left">
                      <a href="{{ route('website') }}" class="logo">
                          <i class="zmdi zmdi-group-work icon-c-logo"></i>
                          <span>Uplon</span>
                      </a>
                  </div>
                  <!-- End Logo container-->
                  <div class="clearfix"></div>
              </div> <!-- end container -->
          </div>
          <!-- end topbar-main -->
      </header>
      <!-- End Navigation Bar-->




      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="wrapper">
          <div class="container m-b-20">

            <div class="row">
              <div class=" col-lg-1">
              </div>
              <div class=" col-lg-10">

                                      <div class="card ">
                                          <div class="card-body">
                                              <h5 class="card-title">{{$b->title}}</h5>
                                              <h6 class="card-subtitle text-muted"><em>"{{$b->excerpt}}"</em></h6>
                                          </div>
                                          <img class="d-block img-fluid" src="/image/{{$b->thumbnail}}" width="100%" height="500px" alt="Card image cap">
                                          <div class="card-body">
                                              <p class="card-text">
                                                {{$b->author}}, {{$b->created_at}} {!! $b->content !!}
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
