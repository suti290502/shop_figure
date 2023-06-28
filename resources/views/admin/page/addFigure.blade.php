@extends('admin.layout.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Add Figure</h1>
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
                    <form action="{{ route('admin.figure.add') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div>
                                @csrf                
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                                <br>
                                <label>Description:</label>
                                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
                                <br>
                                <label>Price:</label>
                                <input type="text" name="price" class="form-control" placeholder="Price">
                                <br>
                                <label>Image:</label>
                                <input type="file" class="form-control" name="image">
                                <br>
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                                <br>
                                <label>Category:</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                        </fieldset>
                        <button class="btn btn-primary btn-block text-uppercase mb-3" type="submit">
                            Add new Figure
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div><!--/.main-->
@endsection