<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
    <table width="100%">
        <tr>
            <th>
                Image
            </th>
            <th>
                Title
            </th>
        </tr>
        @foreach ($product['products'] as $products)
        <tr>
            <td><img src="{{ $products->image['src'] }}" alt="Product Image" width="64px" height="64px"></td>
            <td>{{ $products->title }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
