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

        <!-- DataTables -->
        <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="{{ asset('plugins/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

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

              </div> <!-- end container -->
          </div>
          <!-- end topbar-main -->


          <div class="navbar-custom">
              <div class="container">
                  <div id="navigation">
                      <!-- Navigation Menu-->
                      <ul class="navigation-menu">
                          <li>
                              <a href="#"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                          </li>
                          <li>
                              <a href="{{ route('berita') }}"><i class="zmdi zmdi-view-dashboard"></i> <span> Berita </span> </a>
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

          <!-- main -->
          <div class="row">
            <div class="col-12">
              @if(session()->has('simpan'))
                <div class="alert alert-primary m-t-20" role="alert">
                       {{session('simpan')}} <a href="/berita/{{ session('id') }}" class="alert-link">Silakan Lihat Disini</a>.
                </div>
              @endif
              @if(session()->has('update'))
                <div class="alert alert-warning m-t-20" role="alert">
                       {{session('update')}} <a href="/berita/{{ session('id') }}" class="alert-link">Silakan Lihat Disini</a>.
                </div>
              @endif
              @if(session()->has('delete'))
                <div class="alert alert-danger m-t-20" role="alert">
                       {{session('delete')}}
                </div>
              @endif
              <div class="card-box m-t-30">
                <a href="{{ route('berita.create') }}" class="btn btn-primary waves-effect waves-light btn-sm m-b-10" > Tambah</a> <br/>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                          <th>Title</th>
                          <th>Status</th>
                          <th>Author</th>
                          <th>Created_at</th>
                          <th>Updated_at</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($berita as $b)
                      <tr>
                        <td>{{$b->title}}</td>
                        <td>
                          @if($b->status == 'Public')
                            <span class="badge badge-success"> {{$b->status}} </span>
                          @elseif($b->status == 'Draf')
                            <span class="badge badge-secondary"> {{$b->status}} </span>
                          @endif
                          </td>
                        <td>{{$b->author}}</td>
                        <td>{{$b->created_at}}</td>
                        <td>{{$b->updated_at}}</td>
                        <td> <a href="{{ route('berita.show',['id' => $b->id]) }}" class="btn btn-info waves-effect waves-light btn-sm"> Detail </a>
                             <a href="{{ route('berita.edit',['id' => $b->id]) }}" class="btn btn-warning waves-effect waves-light btn-sm"> Edit </a>
                             <a href="{{ route('berita.delete',['id' => $b->id]) }}" class="btn btn-danger waves-effect waves-light btn-sm"
                                  onclick="return confirm('Apakah Data Ingin Dihapus?')"
                                > Delete </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>

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


            <!-- Required datatable js -->
            <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
            <!-- Buttons examples -->
            <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables/jszip.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables/pdfmake.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables/vfs_fonts.js') }}"></script>
            <script src="{{ asset('plugins/datatables/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables/buttons.print.min.js') }}"></script>

            <!-- Key Tables -->
            <script src="{{ asset('plugins/datatables/dataTables.keyTable.min.js') }}"></script>

            <!-- Responsive examples -->
            <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

            <!-- Selection table -->
            <script src="{{ asset('plugins/datatables/dataTables.select.min.js') }}"></script>

            <!-- App js -->
            <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
            <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

            <script>
                $(document).ready(function() {

                        // Default Datatable
                        $('#datatable').DataTable();

                        //Buttons examples
                        var table = $('#datatable-buttons').DataTable({
                            lengthChange: false,
                            buttons: ['copy', 'excel', 'pdf']
                        });

                        // Key Tables

                        $('#key-table').DataTable({
                            keys: true
                        });

                        // Responsive Datatable
                        $('#responsive-datatable').DataTable();

                        // Multi Selection Datatable
                        $('#selection-datatable').DataTable({
                            select: {
                                style: 'multi'
                            }
                        });

                        table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
                    } );

                </script>


            </body>
            </html>
