<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="<?php echo _WEB_ROOT . '/assets/img/favicon.ico' ?>" />
  <title>Admin</title>
  <!-- reset css cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <!-- font roboto cdn -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <!-- bootstrap Popper library
  <link rel="stylesheet" href="https://unpkg.com/@popperjs/core@2"> -->
  <!-- css -->
  <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/base.css">
  <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/main.css">
  <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/admin.css">
  <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/responsive.css">
</head>

<body>
  <?php if (empty(Session::data('admin'))): ?>
    <?php $this->render($component, $content) ?>
  <?php else: ?>
    <main class="admin container-fluid p-0">
      <div class="row g-0">
        <?php $this->render('admin/nav'); ?>

        <div class="col-3 col-lg-2"></div>

        <div class="col-9 col-lg-10 content p-3">
          <?php $this->render($component, $content); ?>
        </div>
      </div>
    </main>
  <?php endif; ?>

  <!-- jquery -> ajax -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap popper -->
  <script src="https://unpkg.com/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <!-- JS -->
  <script src="<?php echo _WEB_ROOT; ?>/assets/js/admin.js"></script>

</body>

</html>