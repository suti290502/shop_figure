
@extends('figures.layout.master')

    @section('content')
    

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Figure Management</h2>

        </div><br>
        <br>

        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('figures.create') }}"> Create New Figure</a>
        </div>


        

    </div>
  
    
             
              
              @if (session('user'))
              <h1>Hello , {{ session('user')->username }}</h1>
          @endif
          <br><div class="buttons">
                  <a  href="{{ route('seller.page.index') }}">Home </a>
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
        <td>{{ $figures->name }}</td>
        <td>{{ $figures->description }}</td>
        <td>{{ $figures->category }}</td>
        <td>{{ $figures->price }}</td>
        <td> <img src="{{ url('public/image/'.$figures->image) }}" style="height: 200px; width: 150px">
        </td>
        <td>{{ $figure->quantity }}</td>

        <td>

            <form action="{{ route('figures.destroy', $figure->figure_id) }}" method="POST">
                <a style="background-color: black;" class="btn btn-primary"
                    href="{{ route('figures.show', $figure->figure_id) }}">Show</a>
                <a style="background-color: black;" class="btn btn-primary"
                    href="{{ route('figures.edit', $figure->figure_id) }}">Edit</a>
                <a style="background-color: black;" class="btn btn-primary"
                    href="{{ route('figures.destroy', $figure->figure_id) }}">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection

