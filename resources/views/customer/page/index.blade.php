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
                
                        <a href="{{asset ('customer.figure.index')}}"><img class="movie-list-item-img" src="{{ url('public/image/'.$value->image)}}"></a>
                        <a><span class="movie-list-item-title">{{$value->name}}</span></a>
                        <p class="movie-list-item-decs">{{$value->description}}</p><br>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"> <a href="{{ route('add_to_cart', $value->figure_id) }}"
                            class="btn btn-primary btn-block text-center" role="button">Cart</a></i> </button>
                    </div>
                    @endforeach
                </div>
                <i class="fa-solid fa-chevron-right arrow"></i>
            </div>
        </div>
        <div class="movie-list-container">
            <h1 class="movie-list-title">Figure Anime</h1>
            <div class="movie-list-wrapper">
                <div class="movie-list">
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="img/png-transparent-roronoa-zoro-figurine-one-piece-model-figure-banpresto-one-piece-cartoon-one-piece-action-figure.png" alt="">
                        <span class="movie-list-item-title">Zoro</span>
                        <p class="movie-list-item-decs">100$</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                    </div>
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="img/51EjqPokgxL._AC_.jpg" alt="">
                        <span class="movie-list-item-title">One Piece</span>
                        <p class="movie-list-item-decs">Diagnosed with terminal lung cancer, a high school chemistry teacher resorts to cooking and selling methamphetamine to provide for his family.</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                    </div>
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="img/green.png" alt="">
                        <span class="movie-list-item-title">Green Lantern</span>
                        <p class="movie-list-item-decs">Diagnosed with terminal lung cancer, a high school chemistry teacher resorts to cooking and selling methamphetamine to provide for his family.</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                    </div>
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="img/brave.png" alt="">
                        <span class="movie-list-item-title">Brave</span>
                        <p class="movie-list-item-decs">Diagnosed with terminal lung cancer, a high school chemistry teacher resorts to cooking and selling methamphetamine to provide for his family.</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                    </div>
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="img/taylor.png" alt="">
                        <span class="movie-list-item-title"></span>
                        <p class="movie-list-item-decs">Diagnosed with terminal lung cancer, a high school chemistry teacher resorts to cooking and selling methamphetamine to provide for his family.</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-right arrow"></i>
            </div>
        </div>
        <div class="movie-list-container">
            <h1 class="movie-list-title">Adventure</h1>
            <div class="movie-list-wrapper">
                <div class="movie-list">
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="img/pale.png" alt="">
                        <span class="movie-list-item-title">Pale Rider</span>
                        <p class="movie-list-item-decs">Diagnosed with terminal lung cancer, a high school chemistry teacher resorts to cooking and selling methamphetamine to provide for his family.</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                    </div>
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="img/300.png" alt="">
                        <span class="movie-list-item-title">300: Rise Of An Empire</span>
                        <p class="movie-list-item-decs">Diagnosed with terminal lung cancer, a high school chemistry teacher resorts to cooking and selling methamphetamine to provide for his family.</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                    </div>
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="img/starwar.png" alt="">
                        <span class="movie-list-item-title">Star War</span>
                        <p class="movie-list-item-decs">Diagnosed with terminal lung cancer, a high school chemistry teacher resorts to cooking and selling methamphetamine to provide for his family.</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                    </div>
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="img/london.png" alt="">
                        <span class="movie-list-item-title">London Has Fallen</span>
                        <p class="movie-list-item-decs">Diagnosed with terminal lung cancer, a high school chemistry teacher resorts to cooking and selling methamphetamine to provide for his family.</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                    </div>
                    <div class="movie-list-item">
                        <img class="movie-list-item-img" src="img/taylor.png" alt="">
                        <span class="movie-list-item-title">Breaking Bad</span>
                        <p class="movie-list-item-decs">Diagnosed with terminal lung cancer, a high school chemistry teacher resorts to cooking and selling methamphetamine to provide for his family.</p>
                        <button class="movie-list-item-button"><i class="fa-solid fa-cart-shopping"></i> Buy</button>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-right arrow"></i>
            </div>
        </div>
    </div>
</div>
@endsection