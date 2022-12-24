const { ethereum } = window

const isWallectConnected = async () => {
  return new Promise(async (resolve, reject) => {
    if (!ethereum) {
      alert('Please install Metamask')
      reject(new Error('Please install Metamask'))
    } else {
      const accounts = await ethereum.request({ method: 'eth_accounts' })

      window.ethereum.on('chainChanged', (chainId) => {
        window.location.reload()
      })

      window.ethereum.on('accountsChanged', async () => {
        window.location.reload()
      })

      if (accounts.length) {
        resolve(accounts[0]?.toLowerCase())
      } else {
        alert('Please connect wallet.')
        reject(new Error('No accounts found.'))
      }
    }
  })
}

const connectWallet = async () => {
  try {
    if (!ethereum) return alert('Please install Metamask')
    const accounts = await ethereum.request({ method: 'eth_requestAccounts' })
  } catch (error) {
    reportError(error)
  }
}

const reportError = (error) => {
  console.log(error.message)
  throw new Error('No ethereum object.')
}

const truncate = (text, startChars, endChars, maxLength) => {
  if (text.length > maxLength) {
    let start = text.substring(0, startChars)
    let end = text.substring(text.length - endChars, text.length)
    while (start.length + end.length < maxLength) {
      start = start + '.'
    }
    return start + end
  }
  return text
}

export { isWallectConnected, connectWallet, truncate }
