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
    <?php if ($page == 'home') : ?>
        <link href="<?= base_url('dist_web/libs/chartist/dist/chartist.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('dist_web/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') ?>" rel="stylesheet">
    <?php else : ?>
        <link rel="stylesheet" href="<?= base_url('dist_web/libs/datatable/css/jquery.dataTables.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('dist_web/libs/datatable/css/dataTables.bootstrap5.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('dist_web/dist/css/datatable_style.css') ?>">
    <?php endif ?>
    <!-- Custom CSS -->
    <link href="<?= base_url('dist_web/dist/css/style.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('dist_web/dist/css/additional.css') ?>" rel="stylesheet">
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?= base_url() ?>">
                        <!-- Logo icon -->
                        <img style="width: 100%;" src="<?= base_url('dist_web/images/logo-edmi.png') ?>" alt="homepage" class="dark-logo" />
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="<?= base_url('dist_web/images/logo-icon.png') ?>" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo icon -->
                            <!-- <img src="<?= base_url('dist_web/images/logo-light-icon.png') ?>" alt="homepage" class="light-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <!-- <img src="<?= base_url('dist_web/images/logo-text.png') ?>" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo text -->
                            <!-- <img src="<?= base_url('dist_web/images/logo-light-text.png') ?>" class="light-logo" alt="homepage" /> -->
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5"> -->
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <div class="navbar-nav float-start me-auto" style="display: block;margin-top:10px;z-index:1">
                    <span>
                        <h4 style="margin-left: 30px;margin-right:30px;">PT EDMI MANUFACTURING INDONESIA</h4>
                        <small style="margin-left: 30px;margin-right:30px;">EDMI Limited is one of the leading Smart Energy Solutions providers in the world</small>
                    </span>
                </div>
                <br>
                <br>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->

                <!-- </div> -->
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item <?= $page == 'home' ? 'selected' : '' ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $page == 'home' ? 'active' : '' ?>" href="<?= base_url() ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item <?= $page == 'assets' ? 'selected' : '' ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $page == 'assets' ? 'active' : '' ?>" href="<?= base_url('assets') ?>" aria-expanded="false"><i class="mdi mdi-archive"></i><span class="hide-menu">Assets</span></a></li>
                        <li class="sidebar-item <?= $page == 'employee' ? 'selected' : '' ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $page == 'employee' ? 'active' : '' ?>" href="<?= base_url('employee') ?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Employee</span></a></li>
                        <li class="sidebar-item <?= $page == 'position' ? 'selected' : '' ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $page == 'position' ? 'active' : '' ?>" href="<?= base_url('position') ?>" aria-expanded="false"><i class="mdi mdi-church"></i><span class="hide-menu">Position</span></a></li>
                        <li class="sidebar-item <?= $page == 'suppliers' ? 'selected' : '' ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $page == 'suppliers' ? 'active' : '' ?>" href="<?= base_url('suppliers') ?>" aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">Suppliers</span></a></li>
                        <li class="sidebar-item <?= $page == 'department' ? 'selected' : '' ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $page == 'department' ? 'active' : '' ?>" href="<?= base_url('department') ?>" aria-expanded="false"><i class="mdi mdi-division-box"></i><span class="hide-menu">Department</span></a></li>
                        <li class="sidebar-item <?= $page == 'location' ? 'selected' : '' ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $page == 'location' ? 'active' : '' ?>" href="<?= base_url('location') ?>" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="hide-menu">Location</span></a></li>
                        <li class="sidebar-item <?= $page == 'report' ? 'selected' : '' ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $page == 'report' ? 'active' : '' ?>" href="<?= base_url('report') ?>" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Report</span></a></li>
                        <li class="sidebar-item <?= $page == 'user_management' ? 'selected' : '' ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $page == 'user_management' ? 'active' : '' ?>" href="<?= base_url('user_management') ?>" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">User Management</span></a></li>
                        <li class="sidebar-item <?= $page == 'profile' ? 'selected' : '' ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $page == 'profile' ? 'active' : '' ?>" href="<?= base_url('profile') ?>" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a></li>
                        <a href="<?= base_url('auth/logout') ?>" class="mt-4 btn d-block w-100 btn-danger text-white">Logout</a>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-9">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                <?php if ($sub) : ?>
                                    <li class="breadcrumb-item" aria-current="page"><a href="<?= $url_sub ?>" class="link"><?= $sub_breadcrumb ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                                <?php else : ?>
                                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                                <?php endif ?>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold mt-4"><?= $title ?></h1>
                    </div>
                    <div class="col-3">
                        <!-- <ul class="navbar-nav float-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?= base_url('dist_web/images/users/profile.png') ?>" alt="user" class="rounded-circle" width="40">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                        My Profile</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                        My Balance</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                        Inbox</a>
                                </ul>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">