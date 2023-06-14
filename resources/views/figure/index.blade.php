<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    </style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
</head>
<body>
    @extends('figure.layout')
    @section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Figure Management</h2>

        </div><br>
        <br>

        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('figure.create') }}"> Create New Figure</a>
        </div>


        <div class="pull-left">

            <a class="btn btn-success" href="{{ route('category.index') }}"> Management Category</a>

        </div>

    </div>

</div>

@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif

<table class="table table-bordered">

    <tr>

        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Seller</th>
        <th>Category</th>
        <th>Price</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Details</th>
        <th>Action</th>



    </tr>

    @foreach ($figures as $key => $figure)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $figure->name }}</td>
        <td>{{ $figure->description }}</td>
        <td>{{ $figure->seller->username }}</td>
        <td>{{ $figure->category->name }}</td>
        <td>{{ $figure->price }}</td>
        <td><img src="{{ asset('image/figure/' . $figure->image) }}" alt="" border=3 height=150 width=150>
        </td>
        <td>{{ $figure->quantity }}</td>

        <td>

            <form action="{{ route('figure.destroy', $figure->figure_id) }}" method="POST">
                <a style="background-color: black;" class="btn btn-primary"
                    href="{{ route('figure.show', $figure->figure_id) }}">Show</a>
                <a style="background-color: black;" class="btn btn-primary"
                    href="{{ route('figure.edit', $figure->figure_id) }}">Edit</a>
                <a style="background-color: black;" class="btn btn-primary"
                    href="{{ route('figure.destroy', $figure->figure_id) }}">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
</body>
</html>
