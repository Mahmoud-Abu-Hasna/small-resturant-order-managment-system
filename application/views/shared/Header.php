<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?=$set->rest_name?></title>
        <base href="<?php echo base_url(); ?>" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/pages/css/login-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />

    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="Home" style="text-decoration: none; color: #fff;">
                        <h4 class="logo-default"><?=$set->rest_name?></h4></a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                         <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="logout" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                    
                        <li class="nav-item  ">
                            <a href="Home" class="nav-link">
                                <i class="icon-diamond"></i>
                                <span class="title">الرئيسة</span>
                               
                            </a>
                         
                        </li>
                       
                        <li class="nav-item  ">
                            <a href="Cashirs" class="nav-link">
                                <i class="fa fa-users"></i>
                                <span class="title">ادارة المستخدمين
</span>
                               
                            </a>
                         
                        </li>
                         <li class="nav-item  ">
                            <a href="Categories" class="nav-link ">
                                <i class="fa fa-tags"></i>
                                <span class="title">الأصناف</span>
                               
                            </a>
                         
                        </li>
                        <li class="nav-item  ">
                            <a href="Items" class="nav-link">
                                <i class="fa fa-cutlery"></i>
                                <span class="title">الوجبات</span>

                            </a>

                        </li>
                        <li class="nav-item ">
                            <a href="Orders" class="nav-link">
                                <i class="fa fa-cutlery"></i>
                                <span class="title">الطلبات</span>

                            </a>

                        </li>
                        <li class="nav-item ">
                            <a href="Bills" class="nav-link">
                                <i class="fa fa-cutlery"></i>
                                <span class="title">الفواتير</span>

                            </a>

                        </li>
                         <li class="nav-item  ">
                            <a href="resturant_table" class="nav-link">
                                <i class="fa fa-table"></i>
                                <span class="title">طاولات</span>
                               
                            </a>
                         
                        </li>
                        <li class="nav-item  ">
                            <a href="Setting" class="nav-link">
                                <i class="icon-settings"></i>
                                <span class="title">اعدادات</span>
                               
                            </a>
                         
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">الصلاحيات</span>
                                <span class="arrow"></span>

                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item ">
                                    <a href="Permissions" class="nav-link nav-toggle ">
                                        <i class="icon-paper-clip"></i>
                                        <span class="title">عرض الصلاحيات</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="User_types" class="nav-link nav-toggle ">
                                        <i class="icon-paper-clip"></i>
                                        <span class="title"> أنواع المستخدمين</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="User_Permissions" class="nav-link nav-toggle ">
                                        <i class="icon-paper-clip"></i>
                                        <span class="title">عرض صلاحيات المستخدمين</span>
                                    </a>
                                </li>
                            </ul>

                        </li>
                      
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->

