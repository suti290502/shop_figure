<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Shop Figure</title>
</head>
<body>
    <header>
        <a href="" class="logo"><img src="img/logo.png"></a>
        <ul class="navigation">
            <li><a href="{{ route('client.page.index') }}">Home</a></li>
            <li><a href="{{ route('client.page.tvshows') }}">#</a></li>
            <li><a href="{{ route('client.page.figure') }}">#</a></li>
            <li><a href="{{ route('client.page.new') }}">New</a></li>
            <li><a href="{{ route('client.page.signin') }}" target="_blank">Sign In</a></li>
        </ul>
        <div class="search">
            <input type="text" id="keyword" placeholder="Search">
            <button onclick="searchProduct()"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        
        <script>
            function searchProduct() {
                var keyword = document.getElementById('keyword').value;
                var url = "{{ route('search') }}" + "?keyword=" + encodeURIComponent(keyword);
                window.location.href = url;
            }
        </script>
        <div id="time">
            <div class="circle" style="--clr:#ff2972;">
                <svg>
                    <circle cx="20" cy="20" r="20"></circle>
                    <circle cx="20" cy="20" r="20" id="hh"></circle>
                </svg>
                <div id="hours">00</div>
            </div>
            <div class="circle" style="--clr:#00fad0;">
                <svg>
                    <circle cx="20" cy="20" r="20"></circle>
                    <circle cx="20" cy="20" r="20" id="mm"></circle>
                </svg>
                <div id="minutes">00</div>
            </div>
            <div class="circle" style="--clr:#02fa23;">
                <svg>
                    <circle cx="20" cy="20" r="20"></circle>
                    <circle cx="20" cy="20" r="20" id="ss"></circle>
                </svg>
                <div id="seconds">00</div>
            </div>
            <div class="ap">
                <div id="ampm">AM</div>
            </div>
        </div>
        <script>
            setInterval(() =>{
                let hours = document.getElementById('hours');
                let minutes = document.getElementById('minutes');
                let seconds = document.getElementById('seconds');
                let ampm = document.getElementById('ampm');

                let hh = document.getElementById('hh');
                let mm = document.getElementById('mm');
                let ss = document.getElementById('ss');


                let h = new Date().getHours();
                let m = new Date().getMinutes();
                let s = new Date().getSeconds();
                let am = h >= 12 ? "PM" : "AM";

                //concert 24h clock to 12h clock
                if (h > 12){
                    h = h - 12;
                }
                //add zero before single digit number
                h = (h < 10) ? "0" + h : h;
                m = (m < 10) ? "0" + m : m;
                s = (s < 10) ? "0" + s : s;

                hours.innerHTML = h;
                minutes.innerHTML = m;
                seconds.innerHTML = s;
                ampm.innerHTML = am;

                hh.style.strokeDashoffset = 125 -(125 * h) / 12;
                mm.style.strokeDashoffset = 125 -(125 * m) / 60;
                ss.style.strokeDashoffset = 125 -(125 * s) / 60;
            })
        </script>
    </header>