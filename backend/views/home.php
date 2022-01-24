<?php
if (empty($session->loggedin) || empty($session->user_id)) {
  header("Location: {$uri->backend}logout");
  die();
}
$user         =    $auth->user();
$user_role    = $auth->role();
$backend     = absolute_filepath($uri->backend);
//If it still doesn't find any user from the id suplied, log him out
if (empty($user)) header("Location: {$uri->backend}logout/?msg=user not found");
$_SESSION["accesslevel"] = $user->access_level;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Backend | <?= $company->name ?></title>
  <?php require_once("includes/styles.php") ?>
</head>

<body>

  <div class="packed">
    <div class="page-loader-wrapper">
      <div class="loader">
        <div class="m-t-30">
          <img class="loading-img-spin" src="<?= $company->favicon ?>" width="20" height="20" alt="admin">
        </div>
        <p>Please wait...</p>
      </div>
    </div>

    <div class="overlay"></div>

    <?php require_once("includes/header.php") ?>

    <?php require_once("includes/sidebar.php") ?>

    <section class="content position-relative">
      <loader>
        <div class="text-center ">
          <div class="spinner-grow" role="status">
          </div>
        </div>
      </loader>
      <main class="w-100" id="default_div"></main>
    </section>

    <?php require_once("includes/scripts.php") ?>
  </div>
</body>