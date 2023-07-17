@extends('figure.layout.master')

@section('content')

<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2> Show Figure</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('figure.index') }}"> Back</a>

</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>

{{ $figure->name }}

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Description:</strong>
    {{ $figure->description }}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">

        <strong>Image:</strong>
        
        <img src="{{ asset('image/figure/'.$figure->image) }}" alt="" border=3 height=150 width=150>
        
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Category:</strong>
        {{ $figure->category->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Price:</strong>
        {{ $figure->price }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Quantity:</strong>
        {{ $figure->quantity }}
        </div>
    </div>
    </div>
    @endsection
    
    <style>
    div{
        color: white;
        font-size: 20px;
    }
    </style>        