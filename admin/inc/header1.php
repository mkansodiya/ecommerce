<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
    <meta name="keywords" content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="pixelstrap" />
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon" />
    <title>Bigdeal - Premium Admin Template</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css" />

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css" />

    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/jsgrid.css" />

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/admin.css" />
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/js/editor/summernote/summernote.min.css">
    <script href="../assets/js/editor/summernote/summernote.min.js"></script> -->
</head>

<body>
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-left">
                <div class="logo-wrapper">
                    <a href="index.html"><img class="blur-up lazyloaded" src="../assets/images/layout-2/logo/logo.png" alt="" /></a>
                </div>
            </div>
            <div class="main-header-right">
                <div class="mobile-sidebar">
                    <div class="media-body text-end switch-sm">
                        <label class="switch">
                            <input id="sidebar-toggle" type="checkbox" checked="checked" /><span class="switch-state"></span>
                        </label>
                    </div>
                </div>
                <div class="nav-right col">
                    <ul class="nav-menus">
                        <li>
                            <form class="form-inline search-form">
                                <div class="form-group">
                                    <input class="form-control-plaintext" type="search" placeholder="Search.." /><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                </div>
                            </form>
                        </li>
                        <li class="onhover-dropdown">
                            <a class="txt-dark" href="javascript:void(0)">
                                <h6>EN</h6>
                            </a>
                            <ul class="language-dropdown onhover-show-div p-20">
                                <li>
                                    <a href="javascript:void(0)" data-lng="pt"><i class="flag-icon flag-icon-uy"></i> Portuguese</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-lng="es"><i class="flag-icon flag-icon-um"></i> Spanish</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-lng="en"><i class="flag-icon flag-icon-is"></i> English</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-lng="fr"><i class="flag-icon flag-icon-nz"></i> French</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a>
                        </li>
                        <li class="onhover-dropdown">
                            <i data-feather="bell"></i><span class="
                    badge badge-pill badge-primary
                    pull-right
                    notification-badge
                  ">3</span><span class="dot"></span>
                            <ul class="
                    notification-dropdown
                    custom-scrollbar
                    onhover-show-div
                    p-0
                  ">
                                <li>
                                    <div class="media">
                                        <div class="notification-icons bg-success me-3">
                                            <i data-feather="thumbs-up"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="font-success">Someone Likes Your Posts</h6>
                                            <p class="mb-0">2 Hours Ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="notification-icons bg-info me-3">
                                            <i data-feather="message-circle"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="font-info">3 New Comments</h6>
                                            <p class="mb-0">1 Hours Ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="notification-icons bg-secondary me-3">
                                            <i data-feather="download"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="font-secondary">Download Complete</h6>
                                            <p class="mb-0">3 Days Ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="notification-icons bg-success bg-warning me-3">
                                            <i data-feather="gift"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="font-secondary">New Order Recieved</h6>
                                            <p class="mb-0">4 Days Ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="notification-icons bg-success me-3">
                                            <i data-feather="airplay"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="font-secondary">
                                                Apps are ready for update
                                            </h6>
                                            <p class="mb-0">3 Minutes Ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="notification-icons bg-info me-3">
                                            <i data-feather="alert-circle"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="font-secondary">Server Warning</h6>
                                            <p class="mb-0">Just Now</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="bg-light txt-dark">
                                    <a href="javascript:void(0)" data-original-title="" title="">All
                                    </a>
                                    notification
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a>
                        </li>
                        <li class="onhover-dropdown">
                            <div class="media align-items-center">
                                <img class="
                      align-self-center
                      pull-right
                      img-50
                      rounded-circle
                      blur-up
                      lazyloaded
                    " src="../assets/images/dashboard/man.png" alt="header-user" />
                                <div class="dotted-animation">
                                    <span class="animate-circle"></span><span class="main-circle"></span>
                                </div>
                            </div>
                            <ul class="
                    profile-dropdown
                    onhover-show-div
                    p-20
                    profile-dropdown-hover
                  ">
                                <li>
                                    <a href="javascript:void(0)">Profile<span class="pull-right"><i data-feather="user"></i></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Inbox<span class="pull-right"><i data-feather="mail"></i></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Taskboard<span class="pull-right"><i data-feather="file-text"></i></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Settings<span class="pull-right"><i data-feather="settings"></i></span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-lg-none mobile-toggle pull-right">
                        <i data-feather="more-horizontal"></i>
                    </div>
                </div>
            </div>
        </div>