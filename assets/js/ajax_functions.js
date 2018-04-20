/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 var base="http://localhost/cashir/";
$(document).ready(function () {
    
    $("body").on('click', '.cate_delete', function () {
         event.preventDefault();
            var id=$(this).attr('id');
           var col = $(this).parents("td").parent("tr");
		  $.ajax({
                method: "POST",
                url: base+"Categories/delete",
                dataType: 'json',
                data: {cat_id:id},
                success: function (data) {

                    if (data.status) {
                        // element.children(':nth-child(6)').html(':nth-child(6)').html(data.place_status);
                        bootbox.alert(data.msg);
                      

                    } else {
                        bootbox.alert(data.msg);
      
        }
                },
                error: function (textStatus) {
                    alert(textStatus);
                }
            });   
		
           col.remove();
			
        });
     $("body").on('click', '.cashir_delete', function () {
         event.preventDefault();
            var id=$(this).attr('id');
           var col = $(this).parents("td").parent("tr");
		  $.ajax({
                method: "POST",
                url: base+"Cashirs/delete",
                dataType: 'json',
                data: {user_id:id},
                success: function (data) {

                    if (data.status) {
                        // element.children(':nth-child(6)').html(':nth-child(6)').html(data.place_status);
                        bootbox.alert(data.msg);
                      

                    } else {
                        bootbox.alert(data.msg);
      
        }
                },
                error: function (textStatus) {
                    alert(textStatus);
                }
            });   
		
           col.remove();
			
        });
    
     $("body").on('click', '.item_delete', function () {
         event.preventDefault();
            var id=$(this).attr('id');
           var col = $(this).parents("td").parent("tr");
		  $.ajax({
                method: "POST",
                url: base+"Items/delete",
                dataType: 'json',
                data: {item_id:id},
                success: function (data) {

                    if (data.status) {
                        // element.children(':nth-child(6)').html(':nth-child(6)').html(data.place_status);
                        bootbox.alert(data.msg);
                      

                    } else {
                        bootbox.alert(data.msg);
      
        }
                },
                error: function (textStatus) {
                    alert(textStatus);
                }
            });   
		
           col.remove();
			
        });
    $("body").on('click', '.user_type_delete', function () {
        event.preventDefault();
        var id=$(this).attr('id');
        var col = $(this).parents("td").parent("tr");
        bootbox.confirm({
            message: "الرجاء تأكيد حذف نوع المستخدم؟",
            buttons: {
                confirm: {
                    label: 'تأكيد',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'الغاء',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result){
                    $.ajax({
                        method: "POST",
                        url: base+"User_types/delete",
                        dataType: 'json',
                        data: {user_type_id:id},
                        success: function (data) {

                            if (data.status) {
                                // element.children(':nth-child(6)').html(':nth-child(6)').html(data.place_status);
                                bootbox.alert(data.msg);


                            } else {
                                bootbox.alert(data.msg);

                            }
                        },
                        error: function (textStatus) {
                            alert(textStatus);
                        }
                    });

                    col.remove();
                }

            }
        });



     


    });
    $("body").on('click', '.permission_delete', function () {
        event.preventDefault();
        var id=$(this).attr('id');
        var col = $(this).parents("td").parent("tr");
        bootbox.confirm({
            message: "الرجاء تأكيد حذف هذه الصلاحية و ازالتها من المستخدمين الذين يملكونها؟",
            buttons: {
                confirm: {
                    label: 'تأكيد',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'الغاء',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result){
                    $.ajax({
                        method: "POST",
                        url: base+"Permissions/delete",
                        dataType: 'json',
                        data: {user_permission_id:id},
                        success: function (data) {

                            if (data.status) {
                                // element.children(':nth-child(6)').html(':nth-child(6)').html(data.place_status);
                                bootbox.alert(data.msg);


                            } else {
                                bootbox.alert(data.msg);

                            }
                        },
                        error: function (textStatus) {
                            alert(textStatus);
                        }
                    });

                    col.remove();
                }

            }
        });



    });
    $("body").on('click', '.user_permission_delete', function () {
        event.preventDefault();
        var id=$(this).attr('id');
      
        var col = $(this).parents("td").parent("tr");
        bootbox.confirm({
            message: "الرجاء تأكيد حذف هذه الصلاحية من هذا المستخدم؟",
            buttons: {
                confirm: {
                    label: 'تأكيد',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'الغاء',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result){
                    $.ajax({
                        method: "POST",
                        url: base+"User_Permissions/delete",
                        dataType: 'json',
                        data: {user_type_perm_id:id},
                        success: function (data) {

                            if (data.status) {
                                // element.children(':nth-child(6)').html(':nth-child(6)').html(data.place_status);
                                bootbox.alert(data.msg);


                            } else {
                                bootbox.alert(data.msg);

                            }
                        },
                        error: function (textStatus) {
                            alert(textStatus);
                        }
                    });

                    col.remove();
                }

            }
        });



    });
       $("body").on('click', '.choose_table', function (event) {
         event.preventDefault();
            var id=$(this).data('id');
          
		  $.ajax({
                method: "POST",
                url: base+"Order/getTable",
                dataType: 'json',
                data: {table:id},
                success: function (data) {

                    if (data.status) {
                        // element.children(':nth-child(6)').html(':nth-child(6)').html(data.place_status);
                       
                       window.location ='/cashir/Order';

                    } 
                },
                error: function (textStatus) {
                    alert(textStatus);
                }
            });   
		
         
        });   
  
  $("body").on('click', '.table_edit', function (e) {
        e.preventDefault();
            var id=$(this).parent().siblings('.t_id').html();
             var position=$(this).parents().siblings('.t_position').html();
            
         $("#e_t_id").val(id);
	   $("#e_t_position").val(position);	
         
        });
$("body").on('click', '#edit_position', function (event) {
         event.preventDefault();
            var id=$('#e_t_id').val();
            var position=$('#e_t_position').val();
           
		  $.ajax({
                method: "POST",
                url: base+"Resturant_table/edit",
                dataType: 'json',
                data: {t_id:id , t_position:position},
                success: function (data) {
                             
                    if (data.status) {
                        // element.children(':nth-child(6)').html(':nth-child(6)').html(data.place_status);
                       
                       window.location ='/cashir/Resturant_table';

                    } 
                },
                error: function (textStatus) {
                    alert(textStatus);
                }
            });   
		
         
        });           
        
  
  
    
});
