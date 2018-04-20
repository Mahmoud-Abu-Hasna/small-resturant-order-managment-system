<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="home">الرئيسة</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#"><?=$title?></a>
                    <i class="fa fa-circle"></i>
                </li>

            </ul>
        </div>
        <!-- END PAGE BAR -->
       
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"><?=$title?></span>
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
                                        <a class="view-order btn btn-sm blue-madison"  data-url="<?= base_url('Bills/getBill/'.($row->id == null? 1: $row->id)) ?>" data-toggle="tooltip" title="عرض"><i class="fa fa-expand "  style="font-size: 1.5em;" aria-hidden="true"></i></a>
<?php if($row->status != 2){?>
                                        <a class="btn btn-sm <?= $row->status == 0 ? 'green-dark':'red' ?>" data-toggle="tooltip" title="<?= $row->status == 0 ? 'بدء العمل':'انهاء' ?>"  id="change_status" href="Orders/changeStatus?op=<?= $row->status == 0 ? 'start':'finish' ?>&id=<?= $row->id?>" ><i class="fa <?= $row->status == 0 ? 'fa-fire':'fa-times' ?>" style="font-size: 1.5em;" aria-hidden="true"></i></a>

<?php }?>

                                    </td>


                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->