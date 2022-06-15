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
    <?php $validation = \Config\Services::validation(); ?>

    <div class="px-5 py-5 p-lg-0 h-screen bg-surface-secondary d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="col-12 col-md-9 col-lg-6 min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-xl-7 mx-auto">
                        <div class="text-center mb-12">
                            <h3 class="display-5">👋</h3>
                            <h1 class="ls-tight font-bolder mt-6">Welcome back!</h1>
                            <p class="mt-2">Let's build something great</p>
                        </div>
                        <form method="POST" action="<?= site_url('/') ?>">
                            <div class="mb-5">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control <?= ($validation->getError('username') == true) ? 'is-invalid' : null ?>" type="text" id="username" name="username" value="<?= set_value('username'); ?>">
                                <?php if ($validation->getError('username')) { ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="mb-5">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control <?= ($validation->getError('password') == true) ? 'is-invalid' : null ?>" value="<?= set_value('password'); ?>">

                                <?php if ($validation->getError('password')) { ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div>
                                <button class="btn btn-primary  w-full" type="submit"> Log In </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url("public/js/main.js") ?>"></script>
</body>

</html>