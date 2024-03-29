@extends('admin.layout.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Edit User</h1>
        <br>
      </div>
    </div><!--/.row-->
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input!
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-md-5 col-lg-5">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form action="" method="POST">
                        @csrf
                        <fieldset>
                            
                            <label>Name: </label><span> {{ $user->username }}</span>
                            <br>
                            <input type="text" class="form-control" name="username">
                            <br>
                            <label>Password:</label>
                            <br>
                            <input type="password" class="form-control" name="password">
                            <br>

                            <label>Email: </label><span> {{ $user->email }}</span>
                            <br>
                            <input type="text" class="form-control" name="email">
                            <br>
                        
                            <label>Address: </label><span> {{ $user->address }}</span>
                            <br>
                            <input type="text" class="form-control" name="address">
                            <br>
                            <label>Phone Number: </label><span> {{ $user->phone_number }}</span>
                            <br>
                            <input type="text" class="form-control" name="phone_number">
                            <br>
                            
                        </fieldset>
                        <button class="btn btn-primary btn-block text-uppercase mb-3" type="submit">
                            Confirm Edit Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div><!--/.main-->
@endsection