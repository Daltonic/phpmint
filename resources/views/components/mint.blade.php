<div id="mint_box"
    class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-black bg-opacity-50 transform
    transition-transform duration-300 scale-0 z-50">
    <div class="bg-[#151c25] shadow-xl shadow-white rounded-xl w-11/12 md:w-2/5 h-7/12 p-6">
        <form action="/process" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            <div class="flex flex-row justify-between items-center">
                <p class="font-semibold text-gray-400 italic">Mint NFT</p>
                <button id="close_mint" type="button" class="border-0 bg-transparent focus:outline-none">
                    <i class="fa fa-times text-gray-400"></i>
                </button>
            </div>

            <div class="flex flex-row justify-center items-center rounded-xl mt-5">
                <div class="shrink-0 rounded-xl overflow-hidden h-20 w-20">
                    <img id="preview" alt="NFT" class="h-full w-full object-cover cursor-pointer"
                        src="https://avatars.githubusercontent.com/u/107491357?v=4" />
                </div>
            </div>

            <div class="flex flex-row justify-between items-center bg-gray-800 rounded-xl mt-5">
                <label class="block">
                    <span class="sr-only">Choose profile photo</span>
                    <input type="file" accept="image/png, image/gif, image/jpeg, image/webp" name="image"
                        class="block w-full text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-[#19212c] file:text-gray-300
                        hover:file:bg-[#1d2631]
                        cursor-pointer focus:ring-0 focus:outline-none"
                        id="imageUrl" required />
                </label>
            </div>

            <div class="flex flex-row justify-between items-center bg-gray-800 rounded-xl mt-5">
                <input
                    class="block w-full text-sm
                    text-slate-500 bg-transparent border-0
                    focus:outline-none focus:ring-0 px-4 py-2"
                    type="text" name="name" placeholder="Name" required />
            </div>

            <div class="flex flex-row justify-between items-center bg-gray-800 rounded-xl mt-5">
                <input
                    class="block w-full text-sm
                    text-slate-500 bg-transparent border-0
                    focus:outline-none focus:ring-0 px-4 py-2"
                    type="number" name="price" step="0.01" min="0.01" placeholder="Price (Eth)" required />
            </div>

            <div class="flex flex-row justify-between items-center bg-gray-800 rounded-xl mt-5">
                <textarea
                    class="block w-full text-sm resize-none
                    text-slate-500 bg-transparent border-0
                    focus:outline-none focus:ring-0 h-18 py-2 px-4"
                    type="text" name="description" placeholder="Description" required></textarea>
            </div>

            <button type="submit"
                class="flex flex-row justify-center items-center
                w-full text-black text-md bg-white
                py-2 px-5 rounded-full
                drop-shadow-xl border border-transparent
                hover:bg-transparent hover:text-white
                hover:border hover:border-white
                focus:outline-none focus:ring mt-5">
                Mint Now
            </button>
        </form>
    </div>
</div>
