
$(document).ready(function(){

    jQuery('#frm').submit(function(e){
        e.preventDefault();
        const url = $(this).attr('action');
        jQuery.ajax({
            url: url,
            data:jQuery('#frm').serialize(),
            type:'post',
            success:function(result){
                alert(url);
                alert('Success');
                // toastr.success("User added");
            }

        });

    });

    });
