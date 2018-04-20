<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html  dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?= $set->rest_name ?></title>
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
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style type="text/css">
            .page-content{
                margin-right:0px !important;
            }

        </style></head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top text-center">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner">
                <!-- BEGIN LOGO -->
                <div  class="col-md-10 col-sm-10 col-xs-10">
                    <a style="color:#fff; text-decoration:none; " >
                        <!--<img src="assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" />-->
                        <h4 ><?=$this->session->userdata('username')?></h4>
                    </a>
                    
                    <!--  <div class="menu-toggler sidebar-toggler"> </div>-->
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2" style="margin-top: 5px;">
                    <a href='logout' style="color:#fff; text-decoration:none; " >
                        <!--<img src="assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" />-->
                        <h4 class="fa fa-sign-out fa-2x" ></h4>
                    </a>
                    
                    <!--  <div class="menu-toggler sidebar-toggler"> </div>-->
                </div>
                <!-- END LOGO -->

            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" >
                    <!-- BEGIN PAGE HEADER-->


                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"><span class="fa fa-cutlery "></span> طاولات المطعم
                        <small>اختر طاولة لاختيار الوجبات</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN : USER CARDS -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit bordered">

                                <div class="portlet-body">
                                    <div class="mt-element-card mt-card-round mt-element-overlay">
                                        <div class="row">
                                            
                                            <?php foreach ($table as $row) : ?>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <!--<a  style="text-decoration:none;" class="choose_table disabled" data-id="<?=$row->t_id?>" >-->
                                                    <div class="mt-card-item" >

                                                        <div class="mt-card-avatar mt-overlay-1">
                                                            <img src="assets/img/table.jpg" style="cursor:pointer;"/>

                                                        </div>
                                                        <div class="mt-card-content">
                                                            <h3 class="mt-card-name">طاولة رقم</h3>
                                                            <p class="mt-card-desc font-grey-mint"><?php echo $row->t_id;?></p>
                                                            <p class="mt-card-desc font-grey-mint"><?php echo $row->t_position;?></p>
                                                            <a class="btn btn-md green choose_table <?= ($row->t_state == "reserved")?'hidden':'';?>" data-id="<?=$row->t_id?>"  >حجز</a>
                                                            <a class="btn btn-md red cancel_table <?= ($row->t_state == "free")?'hidden':'';?>" data-id="<?=$row->t_id?>" href="Resturant_table/cancelReserve?table=<?= $row->t_id?>" >الغاء</a>
                                                            <a class="btn btn-md blue-madison cancel_table <?= ($row->t_state == "free")?'hidden':'';?>" data-id="<?=$row->t_id?>" href="Resturant_table/editReserve?table=<?= $row->t_id?>" >تعديل</a>
                                                            <a class="btn btn-md blue cancel_table <?= ($row->t_state == "free")?'hidden':'';?>" data-id="<?=$row->t_id?>" href="Resturant_table/printBill?table=<?= $row->t_id?>" target="_blank">طباعة</a>
                                                        </div>


                                                    </div>
                                                <!--</a>-->
                                            </div>
                                                <?php endforeach; ?> 
                                           




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END : USER CARDS -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer ">
            <div class="page-footer-inner "> <h5 class="text-center"><span> <?= $set->rest_name ?> </span>&copy <script>document.write(new Date().getFullYear());</script></h5>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/js/ajax_functions.js" type="text/javascript"></script>
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>