@extends('client.layout.master')
@section('content')


<div class="container">
    <div class="content-container">
        <div class="movie-list-container">
            @if ($message=Session::get('login'))
            <div class="alert alert-success">
                <h3>{{ $message }}</h3>
                <br>
            </div>
            @endif
            <h1 class="movie-list-title">Search Results</h1>
            <div class="movie-list-wrapper">
                <div class="movie-list">
                    	@foreach ($figures as $figure)
                    <div class="movie-list-item">
                        <p style="color: rgb(15, 221, 221)">{{ $figure->name }}</p>
                        <p class="movie-list-item-desc">{{$figure->description}}</p>
                        <p>Price: {{ $figure->price }}</p>
                        <p>Quantity: {{ $figure->quantity }}</p>
                        <a href="{{ route('figures.show', ['figure_id' => $figure->figure_id]) }}"><img class="movie-list-item-img" src="{{ url('public/image/'.$figure->image)}}"></a>
                         <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"> <a href="{{ route('add_to_cart', $figure->figure_id) }}"
                            class="btn btn-primary btn-block text-center" role="button">Buy</a></i> </button>
                    </div>
               		@endforeach
                </div>
               
            </div>
            
        </div>
     
        
    </div>
    
</div>
@endsection