<script>
    $(document).ready(function() {
        $('#delete-form').validate({
            rules: {
                uid: {
                    required: true,
                },

            },
            messages: {

            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "logic/delete_course.php",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        var res = JSON.parse(data);
                        var status = res.status;
                        if (status == true) {
                            swal(res.message, "", "success");
                            var delay = 2000;
                            setTimeout(function() {
                                window.location.href = './view_course'
                            }, delay);
                        } else {
                            swal(res.message, "", "error");
                            if (res.error == "token") {
                                setTimeout(function() {
                                    window.location.href = 'signin'
                                }, 2000);
                            }
                        }
                    }
                });
                return false;
            }
        });
    });
</script>