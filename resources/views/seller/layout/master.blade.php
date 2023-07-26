<!DOCTYPE html>
<html lang="en">

<head>
    @include('seller.layout.header')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div>
                <!-- Begin Page Content -->
                    @yield('content')            
                <!-- /.container-fluid -->
                <!-- Footer -->
                    @include('seller.layout.footer')
                <!-- End of Footer -->
            </div>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
</body>
@include('seller.layout.js')
</html>