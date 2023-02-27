window.addEventListener('load', function() {

    function validate(value){
        if (value==""){
            return false;
        }else{
            return true
        }
    }

    $(".loginBtn").click(function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        // alert($("#email").val());
        var email =$("#email").val();
        var password =$("#password").val()
        $.ajax({
            url: '/login',
            type: 'POST',
            data: {
                email: email,
                password: password
            },

            success: function(data) {
                document.location.reload();
            },
            error: function (xhr, status, errorThrown){
                var err = JSON.parse(xhr.responseText);
                $.each(err.errors,function(key,value){
                    text=value.toString().replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi,'');
                    alert(JSON.stringify(text));
                    return false;
                });
                //alert(JSON.stringify(err.errors[]));
            }
        });
    });


});

