
@extends('figure.layout.master')
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
        <th>Category</th>
        <th>Price</th>
        <th>Image</th>
        <th>Quantity</th>
        
        <th>Action</th>



    </tr>

    @foreach ($figures as $key => $figure)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $figure->name }}</td>
        <td>{{ $figure->description }}</td>
        <td>{{ $figure->category }}</td>
        <td>{{ $figure->price }}</td>
        <td> <img src="{{ url('public/image/'.$figure->image) }}" style="height: 200px; width: 150px">
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

