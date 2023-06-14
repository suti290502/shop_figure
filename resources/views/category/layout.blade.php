<!DOCTYPE html>

<html>

<head>

    <title>Manage Category</title>

    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css')}}" rel="stylesheet">
    <style>
        
        img {
            margin-top: 5%;
           
            align-items: center;
            border-radius: 100%;
            margin-bottom: 50px;
            animation: app-logo-spin infinite 20s linear
        }

        @keyframes app-logo-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
        
        body{
            background-color:black;
            color:black;
            background-image: url('https://img5.thuthuatphanmem.vn/uploads/2022/01/16/anh-nen-anime-phong-canh-hd-dep-nhat_033741854.jpg');
            background-size: cover;
        }
        
        table {
            background-color:white;
        }
    </style>
</head>

<body>

    <div class="container">

        @yield('content')

    </div>

</body>

</html>
