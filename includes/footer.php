<footer>
  <center class="text-gray-700">
    All Rights Reserved <?= $company->name ?> @2022
  </center>
  <particles style="display: none;"><?= _readFile("js/particlesjs-config.json") ?></particles>
  <script src="<?= $uri->backend ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= $uri->backend ?>js/controllers.js"></script>
  <script src="<?= $uri->site ?>js/particlesjs-master/particles.min.js"></script>
  <script>
    $(document).ready(function() {
      let particles = $("particles").text();
      $("particles").remove();

      particlesJS("particles-js", isJson(particles));
    })
  </script>
</footer>