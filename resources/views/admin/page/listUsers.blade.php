@extends('admin.layout.master')
@section('content')

    @if ($message=Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @endif

    <div class="row tm-content-row">
      <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
          <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table" style="size:">
              <thead>
                <tr>
                  <th scope="col">&nbsp;</th>
                  <th scope="col">NAME</th>
                 
                  <th scope='col'>EMAIL</th>
                  <th scope='col'>CREAT</th>
                  <th scope="col">OPTION</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>
              @foreach ($user as $key=>$value)
              <tbody>
                <tr>
                  <th scope="col">&nbsp;</th>
                  <td class="tm-product-name">{{ $value->username}}</td>
                 
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td>
                    <a href="{{ asset('users/edit/'. $value->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                    <a href="{{ asset('users/delete/'. $value->id) }}" onclick="return confirm('You sure to delete it?')" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection