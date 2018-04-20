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
					
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">

<img  src="./assets/img/<?=($result->logo_name == ""?"icon2.jpg":$result->logo_name); ?>" class=" col-md-offset-5 col-sm-offset-5 col-xs-offset-5" height="100" width="100">
                            <form id="edit_settings"  action="Setting/editLogo" method="post" enctype="multipart/form-data">

                                <hr class="col-md-10 col-md-offset-1 " style="margin-bottom:5px;">
                                <h3 class="col-md-12">تعديل صورة المطعم</h3>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">

                                    <label class="control-label col-md-1 col-sm-1 col-xs-12">صورة المطعم
                                    </label>
                                    <div class=" col-md-3  col-sm-3 col-xs-12">
                                        <input type="file" class="form-control"  name="logo" id="logo" required/>

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
                        <div class="col-md-12">


                            <form id="edit_settings"  action="Setting/editFilePath" method="post" >
                                <hr class="col-md-10 col-md-offset-1 " style="margin-bottom:5px;">
                                <h3 class="col-md-12">تعديل مكان حفظ الفواتير</h3>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label col-md-1 col-sm-1 col-xs-12">مكان حفظ الفواتير
                                    </label>
                                    <div class=" col-md-3  col-sm-3 col-xs-12">
                                        <input type="text" class="form-control" name="new_path" id="new_path" value="<?=$result->new_path; ?>" required/>

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
				   <div class="col-md-12">
				   
							
							<form id="edit_settings"  action="Setting/editSettings" method="post" >
							<hr class="col-md-10 col-md-offset-1 " style="margin-bottom:5px;">
                                         		   <h3 class="col-md-12">تعديل بيانات العرض</h3>
							
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                            <label class="control-label col-md-1 col-sm-1 col-xs-12">عنوان شاشة الدخول
                                                            </label>
                                                            <div class=" col-md-3  col-sm-3 col-xs-12">
                                                           <input type="text" class="form-control" name="enter_text" id="enter_text" value="<?=$result->enter_text; ?>" />
                                                            
                                                        </div>
							  <label class="control-label col-md-1 col-sm-1 col-xs-12">عنوان نموذج التسجيل
                                                               
                                                            </label>
                                                            <div class=" col-md-2  col-sm-2 col-xs-12">
                                                           <input type="text" class="form-control" name="login_form_title" id="login_form_title" value="<?=$result->login_form_title; ?>" />
                                                            
                                                        </div>
                                                            <label class="control-label col-md-1 col-sm-1 col-xs-12">اسم المطعم
                                                               
                                                            </label>
                                                            <div class=" col-md-2  col-sm-2 col-xs-12">
                                                           <input type="text" class="form-control" name="rest_name" id="rest_name"  value="<?=$result->rest_name; ?>"/>
                                                            
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
				   <div class="col-md-12">
				   
							
							<form id="edit_admin"  action="Setting/editAdmin" method="post" >
							<hr class="col-md-10 col-md-offset-1 " style="margin-bottom:5px;">
                                         		   <h3 class="col-md-12">تعديل بيانات مسؤول النظام</h3>
							
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                            <label class="control-label col-md-1 col-sm-1 col-xs-12">اسم المستخدم
                                                            </label>
                                                            <div class=" col-md-3  col-sm-3 col-xs-12">
                                                           <input type="text" class="form-control" name="user_name" id="user_name"  value="<?=$admin->user_name; ?>"/>
                                                            
                                                        </div>
							  <label class="control-label col-md-1 col-sm-1 col-xs-12">كلمة المرور
                                                               
                                                            </label>
                                                            <div class=" col-md-2  col-sm-2 col-xs-12">
                                                           <input type="text" class="form-control" name="user_pass" id="user_pass"/>
                                                            
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
                   
                   </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->