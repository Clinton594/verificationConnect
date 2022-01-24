    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <!-- Favicon-->
    <link rel="icon" href="<?= $company->favicon . $cache_control ?>" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="<?= $uri->backend ?>css/app.min.css<?= $cache_control ?>" rel="stylesheet">
    <!-- Custom Css -->
    <link href="<?= $uri->backend ?>css/style.css<?= $cache_control ?>" rel="stylesheet" />
    <link href="<?= $uri->backend ?>css/backend.css<?= $cache_control ?>" rel="stylesheet" />
    <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= $uri->backend ?>css/styles/all-themes.css<?= $cache_control ?>" rel="stylesheet" />

    <link href="<?= $uri->backend ?>css/generic_widgets.css<?= $cache_control ?>" rel="stylesheet" type="text/css" />
    <link href="<?= $uri->backend ?>css/upload_dialog.css<?= $cache_control ?>" rel="stylesheet" type="text/css" />
    <link href="<?= $uri->backend ?>css/date_range_picker.css" rel="stylesheet" type="text/css" />
    <link href="<?= $uri->backend ?>css/simple_lightbox.css" rel="stylesheet" type="text/css" />
    <link href="<?= $uri->backend ?>css/combo_control.css<?= $cache_control ?>" rel="stylesheet" type="text/css" />
    <link href="<?= $uri->backend ?>css/richtext.css<?= $cache_control ?>" rel="stylesheet" type="text/css" />
    <link href="<?= $uri->backend ?>css/chart.css" rel="stylesheet" type="text/css" />
    <link href="<?= $uri->backend ?>css/responsive.css<?= $cache_control ?>" rel="stylesheet" type="text/css" />
    <?php require_once("backendProject/styles.php") ?>