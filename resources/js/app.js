import './bootstrap'
import { connectWallet, isWallectConnected, truncate } from './blockchain'

const button = document.querySelector('button#connect')
window.addEventListener('load', async () => {
  await isWallectConnected()
    .then((account) => {
      console.log('Blockchain loaded')
      button.innerHTML = truncate(account, 4, 4, 11)
    })
    .catch((error) => {
      console.log(error)

      button.addEventListener('click', async () => {
        await connectWallet()
      })
    })
})
