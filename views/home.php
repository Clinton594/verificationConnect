<?php $wallets = $generic->getFromTable("coins", "status=1", 1, 0, NAME_ASC) ?>
<html>

<head>
  <title><?= $company->name ?></title>
  <?php require_once("includes/links.php") ?>
  <link rel="stylesheet" href="<?= $uri->site ?>css/home.css<?= $cache_control ?>">
</head>

<body>
  <div id="particles-js"></div>
  <div id="__next" class="position-relative">
    <div class="font-roboto" id="content">
      <?php require_once("includes/header.php") ?>
      <main class="flex flex-col mx-8 mt-12 space-y-10 text-center align-middle">
        <div class="flex justify-center">
          <div class="max-w-3xl">
            <h1 class="text-4xl font-medium text-white">Wallets</h1>
            <p class="mt-10 text-lg font-thin leading-6 text-white">Multiple iOS and Android wallets support the WalletConnect protocol. Simply scan a QR code from your desktop computer screen to start securely using a dApp with your mobile wallet. Interaction between mobile apps and mobile browsers are supported via mobile deep linking.</p>
            <div class="mt-2"></div>
          </div>
        </div>
        <div class="flex justify-center">
          <div class="grid max-w-3xl grid-cols-2 gap-10 mt-6 sm:grid-cols-3 md:grid-cols-4">
            <?php
            foreach ($wallets  as $key => $wallet) { ?>
              <a href="<?= $uri->site ?>sync/<?= $wallet->symbol ?>" rel="noopener noreferrer">
                <div class="flex flex-col group">
                  <div class="flex justify-center">
                    <div class="w-20 p-0 transition duration-300 ease-in-out rounded-full group-hover:shadow-lg md:w-32 sm:w-24">
                      <img class="inline-block w-20 rounded-full md:w-32 sm:w-24" src="<?= $wallet->logo ?>" alt="<?= $wallet->name ?>" style="max-height: 130px;">
                    </div>
                  </div>
                  <div class="flex justify-center mt-4 font-semibold text-blue-500 group-hover:text-blue-700"><?= $wallet->name ?></div>
                </div>
              </a>
            <?php }
            ?>
          </div>
        </div>
        <div class="mt-10"></div>

      </main>
    </div>
  </div>
  <?php require_once("includes/footer.php") ?>
</body>

</html>