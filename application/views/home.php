<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> <?= (isset($title)) ? $title : "الرئيسة"; ?>
            <small>الاحصائيات و حركة المبيعات</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="fa fa-cutlery"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= (isset($item)) ? $item : 0; ?>">0</span>
                        </div>
                        <div class="desc"> وجبة مضافة </div>
                    </div>
                    <a class="more" href="Items"> عرض المزيد
                        <i class="m-icon-swapleft m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= (isset($order)) ? $order : 0; ?>">0</span>
                        </div>
                        <div class="desc"> الطلبات </div>
                    </div>
                    <a class="more" href="Home#item_table"> عرض المزيد
                        <i class="m-icon-swapleft m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= (isset($cats)) ? $cats : 0; ?>"></span> </div>
                        <div class="desc"> أصناف مضافة </div>
                    </div>
                    <a class="more" href="Categories"> عرض المزيد
                        <i class="m-icon-swapleft m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
       
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">الطلبات</span>
                        </div>

                    </div>
                    <div class="portlet-body">





                        <table class="table table-striped table-bordered table-hover order-column dt-responsive" id="item_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الطاولة</th>
                                    <th>آخذ الطلب</th>
                                    <th>التاريخ</th>
                                    <th>الساعة</th>
                                    <th>اجمالي الفاتورة</th>
                                    <th>خيارات</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) : ?>
                                    <tr>
                                        <td><?= $row->id ?></td>
                                        <td><?= $row->table ?></td>
                                        <td><?= $row->uname ?></td>
                                        <td><?= $row->date ?></td>
                                        <td><?= $row->hour ?></td>
                                        <td> <?= $row->pill ?></td>
                                        <td> 
                                       <a class="btn btn-xs blue-madison" data-toggle1="tooltip" title="طباعة"  id="change_status" href="Resturant_table/printBillId?id=<?= $row->id?>" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>

                                        
                                        </td>


                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->