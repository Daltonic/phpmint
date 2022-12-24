<div class="w-64 h-64 bg-[#26292e] shadow-white shadow-sm rounded-lg p-2 mr-5 text-center mb-4">
    <img src="{{ $artwork['image'] }}" class="h-40 w-full object-cover object-center" alt="" />
    <h1 class="text-lg text-white">Afro Mint</h1>
    <p class="text-white">item: {{ $artwork['id'] }}</p>
    <p class="text-white text-xs">
        ETH <span class="text-[#14ec5d]">{{ $artwork['price'] }}</span>
    </p>
</div>
