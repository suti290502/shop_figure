@extends('admin.layout.master')
@section('content')
    <div class="row tm-content-row">
      <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
          <div class="tm-product-table-container">

            @if ($message=Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif

            <a href="{{ route('admin.figure.add') }}" class="btn btn-primary btn-block text-uppercase">Add new figure</a>
            <table class="table table-hover tm-table-small tm-product-table">
              <thead>
                <tr>
                  <th scope="col">&nbsp;</th>
                  <th scope="col">IMAGE</th>
                  <th scope="col">NAME</th>
                  <th scope="col">Description</th>
                  <th scope="col">PRICE</th>
                  <th scope="col">Quantity</th>
                  <th scope='col'>OPTION</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>
              
              @foreach ($figure as $key=>$value)
              <tbody>
                <tr>
                  <th scope="col">&nbsp;</th>
                  <td>
                    <img src="{{ url('public/image/'.$value->image) }}" style="height: 200px; width: 150px">
                  </td>
                  <td class="tm-product-name">{{ $value->name }}</td>
                  <td class="description">{{ $value->description }}</td>

                  <td>{{ $value->price }}</td>
                  <td >{{ $value->quantity }}</td>
                  <td>
                    <a href="{{ asset('figure/edit/'. $value->figure_id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                    <a href="{{ asset('figure/delete/'. $value->figure_id) }}" onclick="return confirm('You sure to delete it?')" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
            <!-- table container -->
          </div>
        </div>
      </div>
    </div>
@endsection