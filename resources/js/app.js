import './bootstrap'
import { connectWallet, isWallectConnected, truncate } from './blockchain'

const connectButton = document.querySelector('button#connect')
const mintWrapper = document.querySelector('div#mint_wrapper')

window.addEventListener('load', async () => {
  await isWallectConnected()
    .then((account) => {
      console.log('Blockchain loaded')
      connectButton.innerHTML = truncate(account, 4, 4, 11)

      mintWrapper.innerHTML = `
        <button id="open_mint" class="bg-[#14ec5d] py-2 px-4 text-xs font-medium rounded-sm">
            Mint NFT
        </button>
      `

      connectButton.addEventListener('click', async () => {
        await connectWallet()
      })

      const openMintBtn = document.querySelector('button#open_mint')
      const closeMintBtn = document.querySelector('button#close_mint')
      const mintBox = document.querySelector('div#mint_box')

      openMintBtn.addEventListener('click', async () => {
        mintBox.classList.remove('scale-0')
        mintBox.classList.add('scale-100')
      })

      closeMintBtn.addEventListener('click', async () => {
        mintBox.classList.remove('scale-100')
        mintBox.classList.add('scale-0')
      })
    })
    .catch((error) => {
      console.log(error)

      connectButton.addEventListener('click', async () => {
        await connectWallet()
      })
    })
})
