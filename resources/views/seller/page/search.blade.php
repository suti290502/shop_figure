@extends('client.layout.master')
@section('content')

<div class="banner" style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515),  padding: 20px; background-clip: padding-box;">
  <!-- Nội dung của banner -->
    <div class="content">
     
      
        <h1>Search Results3</h1>

        @if ($figures->isEmpty())
            <p>No results found.</p>
        @else
            <ul>
                @foreach ($figures as $figure)
                    <li>
                        <h2 style="color: rgb(15, 221, 221)">{{ $figure->name }}</h2>
                        <p>Description: {{ $figure->description }}</p>
                        <p>Price: {{ $figure->price }}</p>
                        <p>Quantity: {{ $figure->quantity }}</p>
                       <img class="movie-list-item-img" src="{{ url('public/image/'.$figure->image)}}"  alt="{{ $figure->name }}">
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

@endsection 


