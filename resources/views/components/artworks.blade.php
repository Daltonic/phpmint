<div class="w-screen bg-[#212429] flex flex-col items-center py-20">
    <div class="flex justify-center flex-wrap px-20">

        @foreach ($artworks as $id => $artwork)
            @include('components.card')
        @endforeach
    </div>
    <button class="bg-[#14ec5d] p-2 px-4 text-xs font-medium rounded-sm my-10">
        Load More
    </button>
</div>
