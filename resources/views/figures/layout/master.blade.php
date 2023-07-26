<!DOCTYPE html>
<html lang="en">

<head>
    @include('figures.layout.header')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
           
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
                <!-- Topbar -->
                   
                <!-- End of Topbar -->
            <div>
                <!-- Begin Page Content -->
                    @yield('content')            
                <!-- /.container-fluid -->
            </div>
            
            <div>
                <!-- Footer -->
                @include('figures.layout.footer')
                <!-- End of Footer -->
            </div>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
        @include('figures.layout.logout')
</body>
@include('figures.layout.js')
</html>