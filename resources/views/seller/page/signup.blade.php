@extends('client.layout.mastersignup')
@section('content')
<body >
    <section>
        <div class="imgBx"><img src="https://sa.tinhte.vn/2015/09/3149778_deadpool.jpg" alt=""></div>
        <div class="contentBx">
            <div class="formBx"><br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2>Sign Up</h2>
                <form role="form" method="POST" action="">
                    @csrf
                    
                    <div class="inputBx form-group">
                        <span>Username</span>
                        <input type="text" name="username" > 
                    </div>
                    @if ($errors->has('name'))
                    {{ $errors->first('name') }}
                    @endif
                    <div class="inputBx form-group"> 
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                    @endif
                    <div class="inputBx form-group">
                        <span>Email</span>
                        <input type="text" name="email">
                    </div>
                    @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                    @endif
                    <div class="inputBx form-group"> 
                        <span>Address</span>
                        <input type="text" name="address"> 
                    </div>
                    @if ($errors->has('address'))
                    {{ $errors->first('address') }}
                    @endif
                    <div class="inputBx form-group">
                        <span>Number Phone</span>
                        <input type="text" name="phone_number">
                    </div>
                    <div class="inputBx form-group">
                        <span>Role</span>
                        <br> 
                        <select class="inputBx form-group" name="role">
                            <option class="hidden" selected disabled>Select your role</option>
                            <option value="1">Seller</option>
                            <option value="2">Customer</option>
                        </select>
                    </div>
                    <div class="remember">
                        <label><input type="checkbox"> &nbsp;&nbsp;&nbsp;I agree with <a href="">Terms & Privacy</a></label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Sign Up">
                    </div>
                    <div class="inputBx">
                        <p>Already have an account?<a href="{{ route('client.page.signin') }}"> Sign In</a></p>
                    </div>
                </form>
                <h3>Sign Up with Social Media</h3>
                <ul class="sci">
                    <li><img src="img/fbicon.png" alt=""></li>
                    <li><img src="img/ggicon.png" alt=""></li>
                    <li><img src="img/instaicon.png" alt=""></li>
                </ul>
            </div>
        </div>
    </section>
</body>
@endsection