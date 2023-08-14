@extends('customer.layout.master')
@section('content')

<div class="banner" style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/2.jpg'); padding: 20px; background-clip: padding-box;">
  <!-- Nội dung của banner -->
    <div class="content">
        <h1>Shop Figure</h1>
        
        @if (session('user'))
        <p>Hello , {{ session('user')->username }}</p>
    @endif
        <div class="buttons">
            <a href=""><i class="fa-solid fa-cart-shopping"></i> Buy</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="content-container">
        <div class="movie-list-container">
            @if ($message=Session::get('login'))
            <div class="alert alert-success">
                <h3>{{ $message }}</h3>
                <br>
            </div>
            @endif
            <h1 class="movie-list-title">New Figure</h1>
            <div class="movie-list-wrapper">
                <div class="movie-list">
                    @foreach ($home as $key => $value)
                    <div class="movie-list-item">
                        <a href="{{ route('figures.show', ['figure_id' => $value->figure_id]) }}">View Figure <img class="movie-list-item-img" src="{{ url('public/image/'.$value->image)}}"></a>
                        <a><span class="movie-list-item-title">{{$value->name}}</span></a>
                        <p class="movie-list-item-desc">{{$value->description}}</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"> <a href="{{ route('add_to_cart', $value->figure_id) }}"
                            class="btn btn-primary btn-block text-center" role="button">Buy</a></i> </button>
                    </div>
                    @endforeach
                </div>
                <i class="fa-solid fa-chevron-right arrow" id="slideRight"></i>
            </div>
            
        </div>
        <div class="movie-list-container">
            <h1 class="movie-list-title">Figure Anime</h1>
            <div class="movie-list-wrapper">
                <div class="movie-list">
                    @foreach ($home as $key => $value)
                        @if ($value->category == '1')
                            <div class="movie-list-item">
                                <img class="movie-list-item-img"  src="{{ url('public/image/'.$value->image)}}">
                                <span class="movie-list-item-title">{{ $value->name }}</span>
                                <p class="movie-list-item-decs">{{ $value->description }}</p>
                                <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                            </div>
                        @endif
                    @endforeach
                </div>
                <i class="fa-solid fa-chevron-right arrow" id="slideRight"></i>
            </div>
        </div>
        
        <div class="movie-list-container">
            <h1 class="movie-list-title">Film Figure </h1>
            <div class="movie-list-wrapper">
                <div class="movie-list">
                    @foreach ($home as $key => $value)
                        @if ($value->category == '2')
                            <div class="movie-list-item">
                                <img class="movie-list-item-img"  src="{{ url('public/image/'.$value->image)}}">
                                <span class="movie-list-item-title">{{ $value->name }}</span>
                                <p class="movie-list-item-decs">{{ $value->description }}</p>
                                <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                            </div>
                        @endif
                    @endforeach
                </div>
                <i class="fa-solid fa-chevron-right arrow" id="slideRight"></i>
            </div>
        </div>
    </div>
</div>
@endsection