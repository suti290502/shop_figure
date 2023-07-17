<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container: {
           content: '\f106';
        }
    </style>
</head>
<body >
    


<div class="banner" style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/2.jpg'); padding: 20px; background-clip: padding-box;">
  <!-- Nội dung của banner -->
    <div class="content">
        <h1>Shop Figure</h1>
        
        @if (session('user'))
        <p>Hello , {{ session('user')->username }}</p>
    @endif
        <div class="buttons">
            <a href="{{asset ('home')}}"> Home</a>
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
            <h1 class="movie-list-title">Your Cart</h1>
            <div class="movie-list-wrapper">
                <div class="movie-list">
                    <table id="cart" class="table table-hover table-condensed">
        <thead style="border=1">
            <tr>
                <th style="width=30% ">Figure</th>
                
                <th >Price</th>
                <th >Quantity</th>
                <th class="text-center">Subtotal</th>
                <th ></th>
            </tr>
        </thead>
        <tbody>

            @php $total = 0 @endphp
            @if (session('cart'))
                @foreach (session('cart') as $figure_id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $figure_id }}">
                        <td data-th="figure">
                            <div class="row">

                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        
                        
                        <td data-th="price">${{ $details['price'] }}</td>
                        <td data-th="quantity">
                            <input type="number" value="{{ $details['quantity'] }}"
                                class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
       
    </table>


    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
                </div>
                <i class="fa-solid fa-chevron-right arrow"></i>
            </div>
        </div>
        
        
    </div>
</div>
</body>
</html>