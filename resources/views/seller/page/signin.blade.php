@extends('client.layout.mastersignin')
@section('content')
<body>
    <section>
        <div class="imgBx"><img src="https://images.goodsmile.info/cgm/images/product/20141215/4778/31763/large/28d0e989e7e5c9bd71666a18480649ae.jpg" alt=""></div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Sign In</h2>

                @if ($message=Session::get('success'))
                <div>
                  <h6>{{ $message }}</h6>
                  <br>
                </div>
                @endif
                
                @if ($message=Session::get('fail'))
                <div>
                  <h6 style="color: #de0611">{{ $message }}</h6>
                  <br>
                </div>
                @endif     

                <form role="form" method="POST" action="">
                    @csrf
                    <div class="inputBx form-group">
                        <span>Username</span>
                        <input type="text" name="username">
                    </div>
                    @if ($errors->has('username'))
                    <p>{{ $errors->first('username') }}</p>
                    @endif
                    <div class="inputBx form-group">
                        <span>Email</span>
                        <input type="text" name="email">
                    </div>
                    @if ($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                    @endif
                    <div class="inputBx form-group">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    @if ($errors->has('password'))
                    <p>{{ $errors->first('password') }}</p>
                    @endif
                    <div class="remember form-group">
                        <label><input type="checkbox" name="remember"> &nbsp;&nbsp;&nbsp;Remember Me</label>
                    </div>
                    <div class="inputBx form-group">
                        <input type="submit" value="Sign In">
                    </div>
                    <div class="inputBx">
                        <p>Don't have an account yet?       .<strong><a href="{{ route('client.page.signup') }}">Sign Up</a></strong></p>
                    </div>
                    
                </form>
                <h3>Sign In with Social Media</h3>
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