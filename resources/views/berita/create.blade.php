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

  <!-- form Uploads -->
  <link href="{{ asset('plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Switchery css -->
  <link href="{{ asset('plugins/switchery/switchery.min.css') }}" rel="stylesheet"
  />

  <!-- Bootstrap CSS -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
  />

  <!-- App CSS -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"
  />

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
          <a href="{{route('berita')}}" class="logo">
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
    <div class="container">


      <div class="row">
          <div class="col-xl-12">
              <div class="card-box  m-t-30">
        <!-- main -->
        <form class="" action="{{route('berita.store')}}" method="post" enctype="multipart/form-data">

          {{csrf_field ()}}

          <fieldset class="form-group">
            <label for="thumbnail">Thumbnail (2000 x 1333)</label>
            <input type="file" class="dropify" name="thumbnail" data-height="300" />
              @if($errors->has('thumbnail'))
                <small class="text-muted">
                  {{ $errors->first('thumbnail') }}
                </small>
                @endif
            </fieldset>

          <fieldset class="form-group">
              <label for="exampleTextarea">Title</label>
              <textarea class="form-control" id="exampleTextarea" name="title"
                        rows="3">{{ old('title')}}</textarea>
              @if($errors->has('title'))
                <small class="text-muted">{{ $errors->first('title') }}
                </small>
                @endif
              </fieldset>

          <fieldset class="form-group">
              <label for="exampleTextarea1">Excerpt</label>
              <textarea class="form-control" id="exampleTextarea1" name="excerpt"
                        rows="3">{{ old('excerpt')}}</textarea>
              @if($errors->has('excerpt'))
                <small class="text-muted">{{ $errors->first('excerpt') }}
                </small>
              </fieldset>
          @endif

          <fieldset class="form-group">
              <label for="exampleTextarea2">Content</label>
              <textarea class="form-control" id="exampleTextarea2" name="content"> {{ old('content')}}</textarea>
              @if($errors->has('content'))
                <small class="text-muted">{{ $errors->first('content') }}
                </small>
              @endif
              </fieldset>

          <fieldset class="form-group">
              <label for="exampleInput">Author</label>
              <input type="text" class="form-control" id="exampleInput" name="author" value="{{ old('author')}}"
                     placeholder="Enter Author">
              @if($errors->has('author'))
                <small class="text-muted">
                  {{ $errors->first('author') }}
                </small>
              @endif
          </fieldset>

          <fieldset>
              <label>Status</label>
                  <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="status" value="Public" class="custom-control-input"
                      <?php
                      if( old('status') =='Public'){
                        echo "checked";
                      }
                       ?>
                      >
                      <label class="custom-control-label" for="customRadio1">Public</label>
                  </div>
                  <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="status" value="Draf" class="custom-control-input"
                      <?php
                      if( old('status') =='Draf'){
                        echo "checked";
                      }
                       ?>
                      >
                      <label class="custom-control-label" for="customRadio2">Draf</label>
                  </div>
                  @if($errors->has('status'))
                    <small class="text-muted">
                      {{ $errors->first('status') }}
                    </small>
                  @endif
          </fieldset>


          <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm m-t-10">Save</button>
        </form>
</div>
</div>
</div>
      <!-- end main -->
    </div>
    <!-- container -->


    <!-- Footer -->
    <footer class="footer">
      2016 - 2019 © Uplon.
    </footer>
    <!-- End Footer -->


  </div>
  <!-- End wrapper -->


  <!-- jQuery  -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/waves.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
  <script src="{{ asset('plugins/switchery/switchery.min.js') }}"></script>

  <!-- file uploads js -->
  <script src="{{ asset('plugins/fileuploads/js/dropify.min.js') }}"></script>

  <!-- Counter Up  -->
  <script src="{{ asset('plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('plugins/counterup/jquery.counterup.js') }}"></script>

  <!-- Page specific js -->
  <script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>


  <!-- App js -->
  <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

  <script>
      $('.dropify').dropify({
          messages: {
              'default': 'Drag and drop a file here or click',
              'replace': 'Drag and drop or click to replace',
              'remove': 'Remove',
              'error': 'Ooops, something wrong appended.'
          },
          error: {
              'fileSize': 'The file size is too big (1M max).'
          }
      });
  </script>


  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>


</body>

</html>
