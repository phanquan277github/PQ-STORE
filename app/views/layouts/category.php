<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="<?php echo _WEB_ROOT; ?>/assets/img/favicon.ico" />
  <title>PQ Store</title>
  <!-- reset css cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <!-- font roboto cdn -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <!-- css -->
  <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/base.css">
  <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/main.css">
  <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/category.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/responsive.css">
  <!-- JS -->
  <!-- <script src="../js/main.js"></script> -->
  <!-- <script src="../js/index.js"></script> -->

</head>

<body>
  <?php
  $header['headerCategories'] = SharedModel::getCategories();
  $this->render('shared/header', $header);
  ?>

  <?php $this->render($component, $content); ?>

  <?php $this->render('shared/footer'); ?>
</body>

</html>