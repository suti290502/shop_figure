<!DOCTYPE html>

<html>

<head>

    <title>Manage figure</title>

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
            background-image: url('https://img.wattpad.com/b4dfa06ab5029083830d27f37f64e4a2e17b41c8/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f596931627538676a5857724b74513d3d2d3236302e313465646239323631353866356633633330303334363638333038302e6a7067?s=fit&w=720&h=720');
            background-size:100%;
        }
        
        table {
            background-color:white;
        }

        strong{
            color: aliceblue;
        }
        h2{
            color: aliceblue;
        }
    </style>
</head>

<body>

    <div class="container">

        @yield('content')

    </div>

</body>

</html>
