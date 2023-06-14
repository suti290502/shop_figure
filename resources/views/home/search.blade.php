<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Kết quả tìm kiếm</h2>

@if ($figures->count() > 0)
    @foreach ($figures as $figure)
        <figure>
            <img src="{{ $figure->image }}" alt="{{ $figure->name }}">
            <figcaption>{{ $figure->name }}</figcaption>
        </figure>
    @endforeach
@else
    <p>Không tìm thấy kết quả phù hợp.</p>
@endif

</body>
</html>