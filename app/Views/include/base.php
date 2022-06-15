<!doctype html>
<html lang="en" data-theme="dark">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <link rel="shortcut icon" href="<?= site_url("public/favicon.ico") ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap-icons/font/bootstrap-icons.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url("public/css/main.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url("public/css/utilities.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('node_modules/toastr/build/toastr.css'); ?>">
    <script src="<?= base_url('node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('node_modules/sweetalert/dist/sweetalert.min.js') ?>"></script>
    <script src="<?= base_url('node_modules/toastr/build/toastr.min.js') ?>"></script>
    <title><?= $this->renderSection('title') ?></title>
</head>

<body>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "rtl": false,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        <?php if (!empty(session()->get('success'))) { ?>
            toastr.success("<?php echo session()->get('success'); ?>");
        <?php } else if (session()->get('error')) {  ?>
            toastr.error("<?php echo session()->get('error'); ?>");
        <?php } else if (session()->get('warning')) {  ?>
            toastr.warning("<?php echo session()->get('warning'); ?>");
        <?php } else if (session()->get('info')) {  ?>
            toastr.info("<?php echo session()->get('info'); ?>");
        <?php } ?>
    </script>

    <?php
    if (session()->get('success'))
        unset($_SESSION['success']);
    else if (session()->get('error'))
        unset($_SESSION['error']);
    else if (session()->get('warning'))
        unset($_SESSION['warning']);
    else if (session()->get('info'))
        unset($_SESSION['info']);
    ?>

    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <?= view("include/sidebar") ?>
        <div class="flex-lg-1 h-screen overflow-y-lg-auto">
            <?= view("include/navbar") ?>
            <div class="container-fluid my-4">
                <?= $this->renderSection("admin") ?>
            </div>
        </div>
    </div>

    <script src="<?= base_url("public/js/main.js") ?>"></script>
</body>

</html>