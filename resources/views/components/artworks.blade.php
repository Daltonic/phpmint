<div class="w-screen bg-[#212429] flex flex-col items-center py-20">
    <div class="flex justify-center flex-wrap px-10">
        @foreach ($artworks as $id => $artwork)
            @include('components.card')
        @endforeach
    </div>
</div>
