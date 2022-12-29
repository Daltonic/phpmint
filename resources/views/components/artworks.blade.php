<div class="bg-[#212429] py-5" >
    <div class="w-full flex justify-center sm:justify-start">
        <h1
            class="text-white text-2xl font-medium border-b-2 border-[#14ec5d] mb-5 sm:ml-20 w-fit"
            id="collection"
        >
            Collections
        </h1>
    </div>   
    <div class="flex justify-center flex-wrap px-10">  
        @foreach ($artworks as $id => $artwork)
        @include('components.card')
        @endforeach
    </div>
</div>