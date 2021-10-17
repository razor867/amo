<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="AMO (Asset Management Office) Control your asset with amo">
    <meta name="description" content="AMO is an easy-to-use web asset management application for your company">
    <meta name="robots" content="noindex,nofollow">
    <title>AMO - <?= $title ?></title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('dist_web/images/amo.png') ?>">
    <!-- Custom CSS -->
    <link href="<?= base_url('dist_web/dist/css/style.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('dist_web/dist/css/additional.css') ?>" rel="stylesheet">
    <link href="<?= base_url('dist_web/dist/css/login.css') ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card" style="margin-top: 100px;">
                <div class="card-body">
                    <h5 class="card-title">Sign in</h5>
                    <p class="card-text">Please login to access the application.</p>
                    <?php if ($message != '') : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif ?>
                    <form method="post" action="<?= base_url('auth/login') ?>">
                        <div class="form-group">
                            <label for="identity">Email</label>
                            <input type="text" name="identity" class="form-control" id="identity" placeholder="name@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="remember" value="1" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Go to the app</button>
                    </form>
                    <center>
                        <small>Call the number below if your account cannot be used.</small>
                        <br>
                        <small>087879555901</small>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('dist_web/libs/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('dist_web/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('dist_web/dist/js/app-style-switcher.js') ?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('dist_web/dist/js/waves.js') ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('dist_web/dist/js/custom.js') ?>"></script>
</body>

</html>