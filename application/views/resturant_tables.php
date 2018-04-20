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
        <h3 class="page-title col-md-3 col-sm-3 col-xs-8" style="margin-bottom:5px;"><?= $title ?>

        </h3>
        <a class="btn btn-md green col-md-1 col-md-offset-8 col-sm-2  col-sm-offset-7 col-xs-4 " id="add" style="margin-top:20px; margin-bottom:5px;">اضافة جديد </a>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">


                <form id="add_new"  action="Resturant_table/add" method="post" class="hidden">
                    <hr class="col-md-10 col-md-offset-1 " style="margin-bottom:5px;">
                    <input type="hidden" value='<?php echo $this->session->tempdata('validation'); ?>' id='validation'>
                    <input type="hidden" value='<?php echo $this->session->tempdata('msg'); ?>' id='msg'>
                    <h3 class="col-md-12">اضافة طاولة جديدة</h3>
                    <p>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12">مكان الطاولة

                        </label>
                        <div class=" col-md-3  col-sm-3 col-xs-12">
                            <input type="text" class="form-control" name="t_position" id="t_position" placeholder="مكان الطاولة" />

                        </div>
                        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12 ">

                            <input type="submit" class="btn btn-md btn-success " value="حفظ" />
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





                        <table class="table table-striped table-bordered table-hover" id="tables_table">
                            <thead>
                                <tr>
                                    <th>رقم الطاولة</th>
                                    <th>مكان الطاولة</th>
                                     <th>الحالة</th>
                                     <th>آخر استخدام</th>
                                    <th>تعديل المكان</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if($table==0){
     echo 'لا يوجد طاولات مضافة';
                                }else{foreach ($table as $row) : ?>
                                    <tr>
                                        <td class='t_id'><?= $row->t_id ?></td>
                                        <td class='t_position'><?= $row->t_position ?></td>
                                        <td><?= $row->t_state?></td>
                                        <td><?= $row->t_last_used?></td>
                                        <td class='edit_pb'> <a class=" table_edit btn btn-xs green " data-toggle1="tooltip" data-toggle="modal" data-target="#myModal"  title="تعديل" ><i class="fa fa-edit" aria-hidden="true"></i></a></td>


                                    </tr>
                                <?php endforeach;} ?> 
                                <tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">تعديل مكان الطاولة</h4>
      </div>
      <div class="modal-body">
          <form>
          <div class="form-group">
              <input type="hidden" class="form-control" name="e_t_id" id="e_t_id"  />
           </div>
          <div class="form-group">
            <label for="e_t_position" class="control-label">مكان الطاولة</label>
             <input type="text" class='form-control'  name="e_t_position" id="e_t_position" placeholder="مكان الطاولة" />
          </div>
        </form>
         
      </div>
      <div class="modal-footer">
        <button type="button" id='edit_position' class="btn btn-primary">حفظ التعديل</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
       
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT -->