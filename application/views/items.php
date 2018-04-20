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
                    <a href="#"><?= $title ?></a>
                    <i class="fa fa-circle"></i>
                </li>

            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title col-md-3 col-sm-3 col-xs-8" style="margin-bottom:5px;"> <?= $title ?>

        </h3>
        <a class="btn btn-md green col-md-1 col-md-offset-8 col-sm-2  col-sm-offset-7 col-xs-4 " id="add"
           style="margin-top:20px; margin-bottom:5px;">اضافة جديد </a>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">


                <form id="add_new" action="Items/add" method="post" class="hidden" enctype="multipart/form-data">
                    <hr class="col-md-10 col-md-offset-1 " style="margin-bottom:5px;">
                    <input type="hidden" value='<?php echo $this->session->tempdata('validation'); ?>' id='validation'>
                    <input type="hidden" value='<?php echo $this->session->tempdata('msg'); ?>' id='msg'>
                    <h3 class="col-md-12"> اضافة وجبة جديدة </h3>
                    <p>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">الاسم

                        </label>
                        <div class=" col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="item_name" id="item_name"
                                   placeholder="اسم الوجبة"/>

                        </div>


                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">تكلفة الوجبة

                        </label>
                        <div class=" col-md-9  col-sm-9 col-xs-12">
                            <input type="number" min=0 class="form-control" name="item_cost" id="item_cost"
                                   placeholder="تكلفة الوجبة"/>

                        </div>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">الصنف

                        </label>
                        <div class=" col-md-9  col-sm-9 col-xs-12">
                            <select id="item_cat" name="item_cat" class="form-control select2 asset"
                                    style="width: 100%!important;">

                                <?php foreach ($cat as $row) : ?>
                                    <option value='<?= $row->cat_id ?>'><?= $row->cat_name ?></option>
                                <?php endforeach; ?>

                            </select>


                        </div>
                        <!--                                <label class="control-label col-md-1 col-sm-1 col-xs-12"> صورة الوجبة-->
                        <!---->
                        <!--                                </label>-->
                        <!--                                <div class=" col-md-5  col-sm-5 col-xs-12">-->
                        <!--                                    <input type="file"  class="form-control" name="item_img" id="item_img" />-->
                        <!---->
                        <!--                                </div>-->

                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="chooseimg" class="control-label col-md-3 col-sm-3 col-xs-12"> صورة الوجبة</label>
                        <div>
                            <img  id="Picture" data-src="#" class="img-thumbnail center-block col-md-9  col-sm-9 col-xs-12"/> <br/>
                            <input type="file" id="chooseimg" name="item_img" accept="image/*" class="hidden"/>
                        </div>
                        <p class="help-block"><span style="font-weight: bold;">MB 5 </span>الحجم الأقصى</p>
                        <p class="help-block"><span style="font-weight: bold;">300x300 </span>الأبعاد المثالية</p>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div
                            class="col-lg-6 col-lg-offset-6 col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 col-xs-12 ">

                            <button id="item_submit" type="submit" class="btn btn-md btn-success "  style="width: 40%!important;">حفظ</button>
                            <button type="reset" class="btn btn-md btn-warning "  style="width: 40%!important;">تفريغ الحقول</button>
                        </div>
                    </div>


                    </p>
                    <hr class="col-md-10 col-md-offset-1 ">
                </form>


            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"><?= $title ?></span>
                        </div>

                    </div>
                    <div class="portlet-body">


                        <table class="table table-striped table-bordered table-hover order-column dt-responsive"
                               id="item_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الوجبة</th>
                                <th>التكلفة</th>
                                <th>الصنف</th>
                                <th>صورة</th>
                                <th>حذف</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as $row) : ?>
                                <tr>
                                    <td><?= $row->item_id ?></td>
                                    <td><?= $row->item_name ?></td>
                                    <td><?= $row->item_cost ?></td>
                                    <td><?= $row->cat_name ?></td>
                                    <td><a class='show-image-full'><img src="<?php echo base_url('Items/readImage/'.($row->item_image == null? 1: $row->item_image));?>" data-src="<?php echo base_url('Items/readImage/'.($row->item_image == null? 1: $row->item_image));?>" width="50" height="50" class="item-image"></a></td>

                                    <td><a class="btn btn-xs red item_delete" data-toggle1="tooltip"
                                           id='<?= $row->item_id ?>' title="حذف"><i class="fa fa-close"
                                                                                    aria-hidden="true"></i></a></td>


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