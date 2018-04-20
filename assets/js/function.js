$(document).ready(function () {
    var currentSrc = $('#Picture').attr('src');
    if (currentSrc == null || currentSrc == "") {
        $('#Picture').attr('src', 'http://via.placeholder.com/300x300');
    }


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#Picture').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }
    }

    $("#chooseimg").change(function () {
        readURL(this);
    });

    $("#Picture").click(function () {
        $("#chooseimg").click();
    });
    $('#item_submit').click(function (event) {
        //check whether browser fully supports all File API

        if (window.File && window.FileReader && window.FileList && window.Blob)
        {
            //get the file size and file type from file input field
            var fsize = $('#chooseimg')[0].files[0].size;
            var ftype = $('#chooseimg')[0].files[0].type;
            var fname = $('#chooseimg')[0].files[0].name;
            var width = $('#Picture').width();
            var height = $('#Picture').height();


            if (fsize > 1048576 * 5) //do something if file size more than 5 mb (1048576)
            {
                bootbox.alert({
                    message: "الرجاء تأكد من حجم الصورة المختارة",
                    buttons: {
                        ok: {
                            label: "تم",
                            className: "btn-primary",
                            callback: function () {
                                Example.show("Primary button");
                            }
                        }
                    }
                });
                // $('#msg').val("الرجاء تأكد من حجم الصورة المختارة");
//                    $(this).preventDefault();
                event.preventDefault()
            }
            if(parseInt(width,10) > 600 || parseInt(height,10) > 600){
                bootbox.alert({
                    message: "الرجاء تأكد من أبعاد الصورة المختارة",
                    buttons: {
                        ok: {
                            label: "تم",
                            className: "btn-primary",
                            callback: function () {
                                Example.show("Primary button");
                            }
                        }
                    }
                });
                // $('#msg').val("الرجاء تأكد من أبعاد الصورة المختارة");
//                    $(this).preventDefault();
                event.preventDefault();
            }

        }
    });
});
 $(document).ready(function () {
       
        $(".asset").select2();
        $('[data-toggle1="tooltip"]').tooltip();
       
        $("#add").click(function () {
            if ($("#add_new").hasClass("hidden")) {
                $("#add_new").removeClass("hidden");
            } else {
                $("#add_new").addClass("hidden");
            }

        });
 
        var msg = $('#msg').val();
        var validation = $('#validation').val();
        if ($('#msg').val()) {
            bootbox.alert({
                message: " "+msg,
                buttons: {
                    ok: {
                        label: "تم",
                        className: "btn-primary",
                        callback: function () {
                            Example.show("Primary button");
                        }
                    }
                }
            });
            $('#msg').val("");
        }
        if ($('#validation').val()) {
            bootbox.alert({
                message: " "+validation,
                buttons: {
                    ok: {
                        label: "تم",
                        className: "btn-primary",
                        callback: function () {
                            Example.show("Primary button");
                        }
                    }
                }
            });
            $('#msg').val("");
        }

        $('.show-image-full').click(function (event) {

            var url = $(this).find("img").data('src');
            bootbox.alert("<img class='center-block' src='" + url + "'>", function() {
                console.log("It was awesome!");
            });
           


        });


     $('.view-order').click(function (event) {

         var url =$(this).data('url');

         bootbox.alert($.ajax({
             type: "GET",
             url: url,
             async: false
         }).responseText, function() {
             console.log("It was awesome!");
         });

  });



    });
