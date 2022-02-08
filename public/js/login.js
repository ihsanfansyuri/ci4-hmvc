$(function() {
    $("#formlogin").submit(function(e) {
        e.preventDefault();

        // if (email == "" && pass == "") {
        //     window.location.href = base_url+('auth/login');
        // }

        $.ajax({
            url: base_url+('/auth/login/auth'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(result) {
                var obj = JSON.parse(result);
                $('[name="' + obj.token + '"]').val(obj.hash);

                if (obj.success == true) {
                    location.href = obj.msg;
                } else  {
                    // alert(obj.msg);
                        location.href = obj.msg;
                    // return obj.msg;
                }
            }
        })
    });
})