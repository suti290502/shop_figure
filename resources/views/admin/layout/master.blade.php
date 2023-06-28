<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.header')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
            @include('admin.layout.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
                <!-- Topbar -->
                    @include('admin.layout.topbar')
                <!-- End of Topbar -->
            <div>
                <!-- Begin Page Content -->
                    @yield('content')            
                <!-- /.container-fluid -->
            </div>
            
            <div>
                <!-- Footer -->
                @include('admin.layout.footer')
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
        @include('admin.layout.logout')
</body>
@include('admin.layout.js')
</html>