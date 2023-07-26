    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- Nếu bạn chưa có thư viện jQuery, hãy thêm đoạn mã này trước phần tử </body> trong trang web của bạn -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        const itemWidth = $('.movie-list-item').outerWidth(true); /* Lấy kích thước của mỗi phần tử */
        const wrapperWidth = $('.movie-list-wrapper').width(); /* Lấy kích thước của khung chứa */
        const totalItems = $('.movie-list-item').length; /* Đếm tổng số phần tử */
        let currentPosition = 0; /* Vị trí hiện tại của slide */

        $('#slideRight').on('click', function() {
            if (currentPosition < totalItems - (wrapperWidth / itemWidth)) {
                currentPosition += 1; /* Di chuyển sang phải */
                $('.movie-list').css('transform', `translateX(-${currentPosition * itemWidth}px)`);
            }
        });
    });
</script>
