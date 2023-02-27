window.addEventListener('load', function() {

    function isFieldsCorrect() {
        var name =$("#name").val();
        var author =$("#author").val();

        if (name && author) {
            return true;
        }
        return false;
    }

    $(".submitAsset").click(function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        if(!isFieldsCorrect()) {
            alert('Fields is not correct');
        } else {

            var form_data = new FormData();

            form_data.append('name', $("#name").val());
            form_data.append('author', $("#author").val());
            form_data.append('img', $('#formFile')[0].files[0]);

        $.ajax({
            url: '/upload',
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,

            success: function(data) {
               // document.location.reload();
              //  window.location.href = "panel";
            },
            error: function (xhr, status, errorThrown){
                var err = JSON.parse(xhr.responseText);
                $.each(err.errors,function(key,value){
                    text=value.toString();
                    alert(JSON.stringify(text));
                    return false;
                });
            }
        });

    }
    });
});
