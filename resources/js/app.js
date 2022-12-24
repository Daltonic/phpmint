import './bootstrap'
import { connectWallet, isWallectConnected, truncate } from './blockchain'

const button = document.querySelector('button#connect')
const mint_wrapper = document.querySelector('div#mint_wrapper')

window.addEventListener('load', async () => {
  await isWallectConnected()
    .then((account) => {
      console.log('Blockchain loaded')
      button.innerHTML = truncate(account, 4, 4, 11)

      mint_wrapper.innerHTML = `
        <button class="bg-[#14ec5d] py-2 px-4 text-xs font-medium rounded-sm">
            Mint NFT
        </button>
      `
    })
    .catch((error) => {
      console.log(error)

      button.addEventListener('click', async () => {
        await connectWallet()
      })
    })
})
