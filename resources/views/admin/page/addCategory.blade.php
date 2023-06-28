@extends('admin.layout.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Add Category</h1>
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
                    <form action="{{ route('admin.category.add') }}" method="POST" role="form">
                        @csrf
                        <fieldset>
                            <div>
                                
                                <label>Name:</label>
                                <input type="text" class="form-control" name="name"
                                        placeholder="Category Name">
                                <br>
                            </div>
                        </fieldset>
                        <button class="btn btn-primary btn-block text-uppercase mb-3" type="submit">
                            Add new Category
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div><!--/.main-->
@endsection