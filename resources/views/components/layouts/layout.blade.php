<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'Presto.it'}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&display=swap" rel="stylesheet">
    <!--vite-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- favicon --}}
    <link rel="shortcut icon" href="/icons/android-chrome-192x192.png" type="image/x-icon">
    <link rel="shortcut icon" href="/icons/android-chrome-512x512.png" type="image/x-icon">
    <link rel="shortcut icon" href="/icons/apple-touch-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/icons/favicon-16x16.png" type="image/x-icon">
    <link rel="shortcut icon" href="/icons/favicon-32x32.png" type="image/x-icon">

</head>
<body>
    <x-navbar/>
    {{$slot}}
    <x-footer/>
</body>
</html>
