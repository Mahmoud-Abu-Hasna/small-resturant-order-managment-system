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
                    <h3 class="page-title col-md-3 col-sm-3 col-xs-8" style="margin-bottom:5px;"><?=$title?>
                       
                    </h3>
					<a class="btn btn-md green col-md-1 col-md-offset-8 col-sm-2  col-sm-offset-7 col-xs-4 " id="add" style="margin-top:20px; margin-bottom:5px;">اضافة جديد </a>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                   <div class="row">
				   <div class="col-md-12">
				   
							
							<form id="add_new"  action="Cashirs/add" method="post" class="hidden">
							<hr class="col-md-10 col-md-offset-1 " style="margin-bottom:5px;">
                                                         <input type="hidden" value='<?php echo $this->session->tempdata('validation');?>' id='validation'>
                                                          <input type="hidden" value='<?php echo $this->session->tempdata('msg');?>' id='msg'>
							<h3 class="col-md-12">اضافة مستخدم جديد</h3>
							<p>
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                            <label class="control-label">الاسم
                                                               
                                                            </label>
                                                            <div class="input-group">
                                                           <input type="text" class="form-control" name="user_name" id="user_name" placeholder="الاسم" />
                                                            
                                                        </div>
														
														
														
                                                        </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                           
														<label class="control-label">كلمة السر
                                                               
                                                            </label>
                                                            <div class="input-group">
                                                           <input type="text" class="form-control" name="user_pass" id="user_pass" placeholder="كلمة السر" />
                                                            
                                                        </div>
														
														
                                                        </div>
			                
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label">النوع

                                </label>
                                <div class="input-group">
                                    <select id="user_type_id" name="user_type_id" class="form-control select2 asset">
                                        <?php foreach ($user_types as $user_type) : ?>
                                        <?php if( $user_type->user_type_id !== '1' ){ ?>
                                            <option value='<?=$user_type->user_type_id?>'><?=$user_type->user_type_name_a?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>

                                    </select>


                                </div>
                            </div>
														
                                                          
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                 <label class="control-label">

                                </label>
                                             <div class="input-group">
                                                 
                                                             <input type="submit" class="btn btn-md btn-success" value="حفظ" />
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
                                        <span class="caption-subject bold uppercase"><?=$title?></span>
                                    </div>
                                   
                                </div>
                                <div class="col-md-12">
                              <form  action=""  >
                            <p>
                            <div class="form-group col-md-9 col-sm-9 col-xs-9">
                                <label class="control-label col-md-2  col-sm-2 col-xs-12">النوع

                                </label>
                                <div class=" col-md-7  col-sm-7 col-xs-12">
                                    <select id="user_type_id" name="user_type_id" class="form-control select2 asset">
                                        <?php foreach ($user_types as $user_type) : ?>
                           <?php if( $user_type->user_type_id !== '1' ){ ?>

                                            <option <?= isset($get) && $get == $user_type->user_type_id ?'selected' : '' ?> value='<?=$user_type->user_type_id?>'><?=$user_type->user_type_name_a?></option>
                                        <?php } ?>
                                        <?php endforeach; ?>
                                         

                                    </select>


                                </div>
                            </div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12 ">

                                <input type="submit" class="btn btn-md btn-success " value="عرض" />
                            </div>
                            </p>
                            <hr class="col-md-10 col-md-offset-1 ">
                        </form>


                    </div>
                                <div class="portlet-body">
								
								
								
								
								
                                    <table class="table table-striped table-bordered table-hover " id="cashir_table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم</th>
                                               
                                                <th>حذف</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php foreach ($result as $row) : ?>
                                            <tr>
                                                <td><?= $row->user_id ?></td>
                                                <td><?= $row->user_name ?></td>
                                                
                                                <td> <a class="btn btn-xs red cashir_delete" data-toggle1="tooltip" id='<?= $row->user_id ?>' title="حذف" ><i class="fa fa-close" aria-hidden="true"></i></a></td>
												
                                               
                                            </tr>
                                             <?php endforeach; ?> 
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
            <!-- END CONTENT -->