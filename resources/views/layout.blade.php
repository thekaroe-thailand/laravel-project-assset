<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- font awesome -->   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    @include('components.header')

    <div class="pr-4">
        <div class="flex">
            <div class="w-[250px]">
                @include('components.sidebar')
            </div>
            <div class="w-full">
                <div class="border-1 h-full border-pink-200 p-10 mt-5 rounded-lg">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>