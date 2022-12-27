<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Afrro Mint</title>
</head>

<body>
    <div class="min-h-screen w-screen">
        @include('components.hero')
        @include('components.artworks')
        @include('components.about')
        @include('components.mint')
        @include('components.footer')
    </div>
</body>

</html>
