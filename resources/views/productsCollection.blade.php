<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-lg">
                <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h5 class="text-xl font-semibold">{{ $product['title'] }}</h5>
                    <p class="text-gray-700 mt-2">{{ $product['description'] }}</p>
                    <p class="text-gray-700 mt-2">Price: ${{ $product['price'] }}</p>
                    <!-- Add more details or features as needed -->
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>

