<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Afrro Mint</title>
</head>

<body>
    <div class="h-screen box-border">
        @include('components.hero')
        @include('components.artworks')
        @include('components.footer')
    </div>
</body>

</html>
