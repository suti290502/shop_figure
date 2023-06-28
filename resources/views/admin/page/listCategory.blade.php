@extends('admin.layout.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Category List</h1>
    </div>
  </div><!--/.row-->

  @if ($message=Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif

  <div class="row">
    <div class="col-xs-12 col-md-5 col-lg-5">
        <div class="panel panel-primary">
          <div class="panel-body">
            <div class="form-group">
              <label>Category:</label>
                <input type="text" name="name" class="form-control" placeholder="Search">
                <br>
                <a href="{{ route('admin.category.add') }}" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span>Add New Category</a>
            </div>
          </div>
        </div>
    </div>
    
    <div class="col-xs-12 col-md-7 col-lg-7">
      <div class="panel panel-primary">
        <div class="panel-heading">List:</div>
          <div class="panel-body">
            <div class="bootstrap-table">
              <table class="table table-bordered">
                <thead>
                  <tr class="bg-primary" style="font-family: serif; color: white">
                    <th>Name:</th>
                    <th style="width:30%">Option</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($category as $key=>$value)
                    <td style="font-size: 18px">
                      {{ $value->name }}
                      <br>
                    
                    </td>
                    <td>
                      <a href="{{ asset('category/edit/'. $value->category_id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                      <a href="{{ asset('category/delete/' . $value->category_id) }}" onclick="return confirm('You sure to delete it?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div><!--/.main-->
@endsection