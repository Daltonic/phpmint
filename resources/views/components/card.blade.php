<a href="https://testnets.opensea.io/collection/afromintv2" target="_blank"
    class="w-64 h-64 bg-[#26292e] shadow-white shadow-sm rounded-lg p-2 mr-5 text-center mb-4">
    <img src="{{ $artwork->image }}" class="h-40 w-full object-cover object-left-top hover:shadow-sm hover:shadow-slate-50" alt="" />
    <h1 class="text-lg text-white">{{ $artwork->name }}</h1>
    <p class="text-white">item: {{ $id + 1 }}</p>
    <p class="text-white text-xs">
        ETH <span class="text-[#14ec5d]">{{ $artwork->price }}</span>
    </p>
</a>
