

<div class="banner" style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/2.jpg'); padding: 20px; background-clip: padding-box;">
  <!-- Nội dung của banner -->
    <div class="content">
        <h1><a href="{{ route('client.page.index') }}">Home</a></h1>
      
        <h1>Search Results</h1>

        @if ($figures->isEmpty())
            <p>No results found.</p>
        @else
            <ul>
                @foreach ($figures as $figure)
                    <li>
                        <h2>{{ $figure->name }}</h2>
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


