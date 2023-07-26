@extends('admin.layout.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Edit Figure</h1>
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
                    <form action="" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div>                              
                                <label>Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $figure->name }}"
                                        placeholder="Movie Name">
                                <br>
                
                               
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $figure->price }}"
                                placeholder="Price">
                                <br>
                                <label>Description:</label>
                                <textarea class="form-control" name="description" value="{{ $figure->description }}"
                                style="width: 140%" placeholder="Descrption"></textarea>
                                <br>
                                <label>Image:</label>
                                <input type="file" class="form-control" name="image">
                                <br>
                                <label>Category:</label>
                                <select name="category" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label>Quantity</label>
                                <input type="text" class="form-control" name="quantity" value="{{ $figure->quantity }}"
                                placeholder="Quantity">
                                <br>
                            </div>
                        </fieldset>
                        <button class="btn btn-primary btn-block text-uppercase mb-3" type="submit">
                            Confirm edit 
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div><!--/.main-->
@endsection