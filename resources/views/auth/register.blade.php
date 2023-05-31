<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="register-container">
        <h1>Register Account</h1>
        <form method="POST">
            @csrf
            <input type="text" name="username" placeholder="username"> 
            <input type="text" name="email" placeholder="email"> 
            <input type="text" name="role" placeholder="Role">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Register</button> 
            <button> <a href="{{asset('/user/login')}}" class="home-btn">Login</a></button>
         
    </div>
</body>
</html>