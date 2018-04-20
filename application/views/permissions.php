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
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title col-md-3 col-sm-3 col-xs-8" style="margin-bottom:5px;"> <?=$title?>

        </h3>
        <a class="btn btn-md green col-md-1 col-md-offset-8 col-sm-2  col-sm-offset-7 col-xs-4 " id="add" style="margin-top:20px; margin-bottom:5px;">اضافة جديد </a>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">


                <form id="add_new" action="Permissions/add" method="post" class="hidden">
                    <hr class="col-md-10 col-md-offset-1 " style="margin-bottom:5px;">

                    <input type="hidden" value='<?php echo $this->session->tempdata('validation');?>' id='validation'>
                    <input type="hidden" value='<?php echo $this->session->tempdata('msg');?>' id='msg'>
                    <h3 class="col-md-12"> اضافة صلاحية جديدة :</h3>
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                            <label class="control-label">الصلاحية

                            </label>
                            <div class=" input-group">
                                <input type="text" class="form-control" name="user_permission_a" id="user_permission_a"  />

                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                            <label class="control-label">الصلاحية(english)

                            </label>
                            <div class=" input-group">
                                <input type="text" min=0 class="form-control" name="user_permission_e" id="user_permission_e" />

                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                            <label class="control-label">مسار الصلاحية

                            </label>
                            <div class="input-group">
                                <input type="text" min=0 class="form-control" name="user_permission_path" id="user_permission_path" />

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                            <label class="control-label">تابعة للصلاحية

                            </label>
                            <div class="input-group">
                                <select id="parent_id" name="parent_id" class="form-control select2 asset">
                                    <option value='0'>لا أحد</option>

                                    <?php foreach ($result as $row) : ?>
                                        <option value='<?=$row->user_permission_id?>'><?=$row->user_permission_a?></option>
                                    <?php endforeach; ?>

                                </select>


                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                            <label class="control-label">ظهور في القائمة

                            </label>
                            <div class="input-group">
                                <select id="is_menu" name="is_menu" class="form-control select2 asset">

                                    <option value='1'>نعم</option>
                                    <option value='0'>لا</option>


                                </select>


                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                            <label class="control-label">رمز الصلاحية

                            </label>
                            <div class="input-group">
                                <input type="text"  class="form-control" name="css_class" id="css_class" />

                            </div>
                        </div>
                    </div>



                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12 ">

                            <input type="submit" class="btn btn-md btn-success " value="حفظ" />
                        </div>













                    <hr class="col-md-10 col-md-offset-1 ">
                </form>


            </div>
        </div>
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
                                <th>الصلاحية</th>
                                <th>الصلاحية(english)</th>
                                <th>مسار الصلاحية</th>
                                <th>تابعة للصلاحية</th>
                                <th>حذف</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as $row) : ?>
                                <tr>
                                    <td><?= $row->user_permission_id ?></td>
                                    <td><?= $row->user_permission_a ?></td>
                                    <td><?= $row->user_permission_e ?></td>
                                    <td><?= $row->user_permission_path ?></td>
                                    <td><?= $row->parent_name_a ?></td>

                                    <td> <a class="btn btn-xs red permission_delete" data-toggle1="tooltip" id='<?= $row->user_permission_id ?>' title="حذف" ><i class="fa fa-close" aria-hidden="true"></i></a></td>


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