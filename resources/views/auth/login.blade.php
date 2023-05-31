<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <body>
        <div class="login-container">
            <h1>Login</h1>
            <form role="form"action="" method="POST">
                @csrf
                <input type="text" name="username" placeholder="username">
                <input type="password" name="password" placeholder="password">
                <button type="submit" >Login</button>          
                <p > Don't have account</p><a href="{{asset('register')}}" class="home-btn" >Register</a>
            </form>
        </div>
    </body>
</body>
</html>