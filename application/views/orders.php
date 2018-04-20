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
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title dir="rtl">قائمة الطلبات - <?=$set->rest_name?></title>
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
        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            .page-content{
                margin-right:0px !important;
            }

        </style>
        <script type="text/javascript">
            function addZero(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }

        </script>
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER    -->
        <div class="page-header navbar navbar-fixed-top text-center">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner">
                <!-- BEGIN LOGO -->
                <div  class="col-md-1 col-sm-1 col-xs-2" style="color:#fff; text-decoration:none; padding-top:5px;"><a id="toggler" style="color:#fff; text-decoration:none;"><i class=" btn-lg fa fa-bars"></i></a></div>
                <div >   
                    <a style="color:#fff; text-decoration:none; "  class="col-md-2 col-md-offset-4 col-sm-2 col-offset-4 col-xs-8">
                      <!-- <img src="assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> -->
                        <h4 >قائمة الوجبات</h4>
                    </a>
                    <!--<div class="menu-toggler sidebar-toggler"> </div> -->
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
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->


                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"><span class="fa fa-cutlery "></span> الطلبات 
                        <small>أضف طلبات الطاولة</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-lg-6 col-md-6  col-sm-6   col-xs-12 " id="pill_cont">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-purple-soft"></i>
                                        <span class="caption-subject font-purple-soft bold uppercase">قائمة الطلبات</span>
                                    </div>

                                </div>
                                <div class="portlet-body" id="ele1" dir="rtl" >
                                    <div class="col-md-12 col-sm-12 col-xs-12 no-print" style="padding-left:0px !important; padding-right:0px !important; ">
                                        <div class="col-md-5 col-sm-5 col-xs-12 text-center"><h4 class="text-center"><script>var d = new Date();
                                            document.write(addZero(d.getDate()) + "-" + addZero((d.getMonth() + 1)) + "-" + d.getFullYear());</script></h4></div>
                                        <div class="col-md-2 col-sm-2 hidden-xs " style="height:40px;"><div class="col-md-1 col-sm-1 col-xs-1" style="width:2px; height:100%; border-left:2px ridge;"></div></div>
                                        <hr class="hidden-lg hidden-md hidden-sm col-xs-12">
                                        <div class="col-md-5 col-sm-5 col-xs-12 text-center"><h4 class="text-center"><script>document.write(addZero(d.getHours() % 12) + "-" + addZero(d.getMinutes()) + "-" + addZero(d.getSeconds()));</script></h4></div>
                                    </div>
                                    <hr class="no-print col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1  col-xs-10 col-xs-offset-1 centered" style="padding-left:0px!important; padding-right:0px!important; ">
                                    <div class="col-md-12 col-sm-12 col-xs-12 " >
                                        <div class="col-md-5 col-sm-5 col-xs-12">

                                            <div class="form-group">

                                                <label class="control-label " for="pill">رقم الفاتورة</label>
                                                <input   id="pill_num" name="pill" type="number" value="<?= (isset($tables))?$tables[0]->order_id:$rs->order_id;?>" class="form-control" disabled=""i min="0" required/></div>

                                        </div>

                                        <div class="col-md-2 col-sm-2 hidden-xs " style="height:60px;"><div class="col-md-1 col-sm-1 col-xs-1" style="width:2px; height:100%; border-left:2px ridge;"></div></div>
                                        <hr class="hidden-lg hidden-md hidden-sm col-xs-12">
                                        <div class="col-md-5 col-sm-5 col-xs-12">


                                            <div class="form-group">

                                                <label class="control-label " for="pill">التاريخ</label>
                                                <input id="date" name="date" disabled="" type="text" value='<?= (isset($tables))?$tables[0]->order_date:$rs->order_date;?>'  class="form-control" required/> </div>

                                        </div>


                                    </div>

                                    <hr class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3" style="padding-left:0px !important; padding-right:0px !important; ">
                                    <div>
                                      
                                        <table class="table table-striped table-bordered table-hover dt-responsive " id="order_table">
                                            <thead>
                                            <th width="20%" >القسم</th>
                                            <th width="20%" >الوجبة</th>
                                            <th width="20%" >العدد</th>
                                            <th width="15%">ثمن</th>
                                            <th width="15%" >الاجمالي</th>
                                            <th width="10%" class="no-print">حذف</th>

                                            </thead>
                                            <tbody>
                                                <?php if(isset($items)){
     foreach ($items as $item) {

                                                    ?>
                                                        <tr >
                                                    <td width="20%"><?=$item->cat_name;?></td>
                                                    <td width="20%"><?=$item->item_name;?></td>
                                                    <td width="20%"><?=$item->item_number;?></td>
                                                    <td width="15%"><?=$item->total_cost/$item->item_number;?></td>
                                                    <td width="15%"><?=$item->total_cost;?></td>
                                                    <td width="10%" class="no-print"></td>


                                                </tr>
                                                        <?php
                                                    
                                                    }
                                                }?>
                                                <tr class="pill">
                                                    <td > طاولة رقم</td>
                                                    <td id='table_num'><?= (isset($tables))?$tables[0]->order_table:$rs->order_table;?></td>
                                                    <td ></td>
                                                    <td >الحساب</td>
                                                    <td  id="total"><?= (isset($tables))?$tables[0]->total_pill:0;?></td>
                                                    <td class="no-print"></td>


                                                </tr>
                                            </tbody>
                                        </table>
                                        <p id="currently" class="no-print" >  لا يوجد طلبات مضافة حاليا </p>
                                        <div >
                                            <input type='hidden' id='total_pill_v'/>
                                            <a class=' no-print btn btn-lg green col-lg-4  col-md-4  col-sm-4  col-xs-4 done_order'  id='done_order'> تم</a>
                                           <a href="Order/cancel?id=<?= (isset($tables))?$tables[0]->order_id:$rs->order_id;?>&table=<?= (isset($tables))?$tables[0]->order_table:$rs->order_table;?>" class=' no-print btn btn-lg red col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4 '> الغاء</a>


                                        </div>

                                    </div>
                                </div>

                                <div class="clearfix margin-bottom-20"> </div>
                            </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-purple-soft"></i>
                                        <span class="caption-subject font-purple-soft bold uppercase">الأصناف</span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <ul class="nav nav-tabs">
                                        <?php foreach ($cats as $row) : ?>

                                            <li style="margin: 3px; background-color: rgba(<?=rand(35, 50)?>,<?=rand(58, 105)?>,<?=rand(89, 112)?>,.<?=rand(3, 7)?>);">
                                                <a href="#<?= $row->cat_id ?>" data-toggle="tab" style="font-weight: bold; color:#fff;"><i class="fa fa-cutlery"></i> <?= $row->cat_name ?>

                                                </a>
                                            </li>
                                        <?php endforeach; ?> 

                                    </ul>
                                    <div class="tab-content">
                                        <?php foreach ($cats as $row) : ?>
                                            <div class="tab-pane fade <?php echo ($row->cat_id == $cats[0]->cat_id) ? "active" : ""; ?> in" id="<?= $row->cat_id ?>">

                                                <div class="mt-element-card mt-card-round mt-element-overlay">
                                                    <div class="row">
                                                        <?php foreach ($data["$row->cat_name"] as $row) : ?>
                                                            <div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-5 col-xs-offset-1 " style="padding-top:15px;">

                                                                <a class="mt-card-content btn btn-lg blue-madison add" id="add1">
                                                                    <img src="<?php echo base_url('Items/readImage/'.($row->item_image == null? 1: $row->item_image));?>" width="75" height="75" class="img img-circle">
                                                                    <span class="badge number" data-id="<?= $row->item_id ?>"></span>

                                                                    <p class="meal-name" style="text-wrap: normal;"><?= $row->item_name ?></p>
                                                                    <p class="mt-card-desc font-white price" data-type="<?= $row->cat_id ?>"> <?= $row->item_cost ?></p>


                                                                </a>

                                                            </div>
                                                        <?php endforeach; ?> 

                                                    </div>
                                                </div>

                                            </div>
                                        <?php endforeach; ?> 
                                    </div>
                                    <div class="clearfix margin-bottom-20"> </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> <h5 class="text-center"><span> <?=$set->rest_name?></span>&copy <script>document.write(new Date().getFullYear());</script></h5> 
            </div> 
            <!--   <div class="scroll-to-top"> -->
                 <!--  <i class="icon-arrow-up"></i> -->
            <!-- </div> -->
            <!-- </div> -->
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
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
            <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
            <script src="assets/global/plugins/datatables/datatables.js" type="text/javascript"></script>
            <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
            <script src="assets/js/jQuery.print.js" type="text/javascript"></script>
            <script src="assets/js/order_functions.js" type="text/javascript"></script>

            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->

            <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
            <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>


            <!-- END THEME LAYOUT SCRIPTS -->

    </body>

</html>