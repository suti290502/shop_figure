@extends('figures.layout.master')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Figure</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customer.page.index') }}">Back</a> 
             <a class="btn btn-primary" href="{{ route('add_to_cart', $figure->figure_id) }}"
                class="btn btn-primary btn-block text-center" role="button">Add to Cart</a></i>
        </div>
    </div>
</div>

<!-- Center the table using a container -->
<div class="d-flex justify-content-center">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{ $figure->name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $figure->description }}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <img src="{{ url('public/image/'.$figure->image)}}" >
            </td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $figure->category }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $figure->price }}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{ $figure->quantity }}</td>
        </tr>
    </table>
</div>

@endsection

<style>
    div {
        color: rgb(8, 1, 1);
        font-size: 50px;
    }
    img {
        width: 10%;
        height: 10%;
    }
</style>

