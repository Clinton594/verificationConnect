<?php
// see(DateTimeZone::listIdentifiers(DateTimeZone::ALL));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Local Cron Runner | <?= $company->name ?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />

  <!-- Favicon-->
  <link rel="icon" href="<?= $company->favicon . $cache_control ?>" type="image/x-icon">
  <!-- Plugins Core Css -->
  <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
  <div class="container mt-5">
    <header>
      <h1>Local Cron Simulator</h1>
    </header>
    <form onsubmit="startSimulator(this)" action="javascript:;" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cron URL</label>
        <input value="<?= $uri->backend ?>cron-job" required type="url" name="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="http file path of the scrip">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Interval</label>
        <select name="interval" required class="form-control" id="exampleInputPassword1">
          <option value="" disabled selected>Every</option>
          <?php foreach (["5 Seconds" => 5000, "15 Seconds" => 15000, "30 Seconds" => 30000, "1 Minute" => 60000, "2 Minutes" => 120000, "5 Minutes" => 300000, "10 Minutes" => 600000] as $key => $value) { ?>
            <option value="<?= $value ?>"><?= $key ?></option>
          <?php } ?>
        </select>
      </div>
      <button type="submit" id="button" class="btn btn-primary">Start Simulator</button>
      <a href="#" id="stoppSimulater" class="btn btn-danger" style="display: none;">Stop Simulator</a>
    </form>
    <details open class="mt-5"></details>
  </div>
  <script src="<?= $uri->backend ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= $uri->backend ?>js/controllers.js"></script>
  <script>
    $(document).ready(function() {
      let data = $("body").data();
    })

    function startSimulator(form) {
      if ($(form)[0].checkValidity()) {
        $("#button").hide();
        var formdata = {};
        $(form).serializeArray().forEach((obj, key) => {
          formdata[obj.name] = obj.value
        });

        let cron = $(form).cron(formdata.url, formdata.interval);
        cron.start((response, start) => {
          $("details").append(
            $("<p>").append($("<small>").append($("<i>").html(response))).append($("<hr>"))
          );
          if (start) {
            $("#stoppSimulater").show().off("click").on("click", () => {
              cron.stop(
                (response) => {
                  $("details").append(
                    $("<p>").append($("<small>").append($("<i>").html(response))).append($("<hr>"))
                  )
                  $("#button").show();
                  $("#stoppSimulater").hide().stopLoader(true)
                }
              )
            }).startLoader(true);
          }
        });

      }
    }
  </script>
</body>

</html>