import "./bootstrap";
import {
    connectWallet,
    isWallectConnected,
    truncate,
    toBase64,
} from "./blockchain";

var header = document.querySelector(".header");
window.addEventListener("scroll", function () {
    if (window.scrollY > header.offsetHeight) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
});

const connectButton = document.querySelector("button#connect");
const mintWrapper = document.querySelector("div#mint_wrapper");

window.addEventListener("load", async () => {
    await isWallectConnected()
        .then((account) => {
            console.log("Blockchain loaded");
            connectButton.innerHTML = truncate(account, 4, 4, 11);

            mintWrapper.innerHTML = `
        <button id="open_mint" class="bg-[#14ec5d] py-2 px-4 text-xs font-medium rounded-sm">
            Mint NFT
        </button>
      `;

            const preview = document.querySelector("img#preview");
            const mintBox = document.querySelector("div#mint_box");
            const imageUrlInput = document.querySelector("input#imageUrl");
            const openMintBtn = document.querySelector("button#open_mint");
            const closeMintBtn = document.querySelector("button#close_mint");
            const recipientAddress = document.querySelector(
                "input#recipientAddress"
            );

            connectButton.addEventListener("click", async () => {
                await connectWallet();
            });

            openMintBtn.addEventListener("click", async () => {
                mintBox.classList.remove("scale-0");
                mintBox.classList.add("scale-100");
            });

            closeMintBtn.addEventListener("click", async () => {
                mintBox.classList.remove("scale-100");
                mintBox.classList.add("scale-0");
            });

            imageUrlInput.addEventListener("change", async (e) => {
                const base64 = await toBase64(e.target.files[0]);
                preview.src = base64;
            });

            recipientAddress.value = account;
        })
        .catch((error) => {
            console.log(error);

            connectButton.addEventListener("click", async () => {
                await connectWallet();
            });
        });
});