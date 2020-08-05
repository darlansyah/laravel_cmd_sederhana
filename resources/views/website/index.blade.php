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
        <title>Berita</title>

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
              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                      <div class="carousel-item active">
                          <img class="d-block img-fluid" src="image/{{$limit[0]->thumbnail}}" height="300px" width="100%" alt="First slide" />
                          <div class="text-left carousel-caption d-none d-md-block">
                            <span class="badge badge-info"> Baru </span>
                              <h3>{{$limit[0]->title}}</h3>
                              <p><em>"{{$limit[0]->excerpt}}"</em></p>
                              <a href="{{ route('website.show',['slug' => $limit[0]->slug]) }}" class="btn btn-light btn-rounded ">Baca</a>
                          </div>
                      </div>
                      <?php
                      for ($i=1; $i < count($limit) ; $i++) {
                      ?>
                      <div class="carousel-item">
                          <img class="d-block img-fluid" src="image/<?= $limit[$i]->thumbnail ?>" alt="Second slide" />
                          <div class="text-left carousel-caption d-none d-md-block">
                              <span class="badge badge-info"> Baru </span>
                              <h3 class="text-left"><?= $limit[$i]->title ?></h3>
                              <p class="text-left"> <em>"<?= $limit[$i]->excerpt ?>"</em></p>
                              <a href="{{ route('website.show',['slug' => $limit[$i]->slug]) }}" class="btn btn-light btn-rounded waves-effect">Baca</a>
                          </div>
                      </div>
                      <?php
                      }
                       ?>

                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                  </a>
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
          <div class="container">

            <div class="row">
              <div class="card-group">
                @foreach($berita as $b)

                      <div class="col-lg-3">
                          <div class="card m-b-20">
                              <img class="card-img-top " src="/image/{{$b->thumbnail}}" height="180px" alt="Card image cap">
                              <div class="card-body">
                                <p class="card-text">
                                    <small class="text-muted">{{$b->created_at}}</small>
                                </p>
                                 <h5 class="card-title"> <a href="{{ route('website.show',['slug' => $b->slug]) }}">  {{potongstring($b->title)}} </a>  </h5>
                              </div>
                          </div>
                      </div>
                  @endforeach
                </div>
              </div>
              Halaman : {{$berita->currentPage()}} <br/>
              jumlah Data : {{$berita->total()}} <br/>
              Data Per Halaman : {{$berita->perPage()}} <br/>

            {{$berita->links()}}
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
