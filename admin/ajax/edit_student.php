<script>
    $(document).ready(function() {
        $('#updateStudent-form').validate({
            rules: {
                admissionNo: {
                    required: true,
                },
                fname: {
                    required: true,
                },
                lname: {
                    required: true,
                },
            },
            messages: {
                admissionNo: {
                    required: 'Please enter the admission Number',

                },
                fname: {
                    required: 'Please enter the first Name',
                },
                lname: {
                    required: 'Please enter the last Name'
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "logic/edit_student.php",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#update-btn").attr('disabled', true).html("<i class='fa fa-spinner fa-spin'></i>please wait...");
                    },
                    success: function(data) {
                        var res = JSON.parse(data);
                        var status = res.status;
                        if (status == true) {

                            swal(res.message, "", "success");
                            var delay = 2000;
                            setTimeout(function() {
                                window.location.href = './view_student.php'
                            }, delay);
                        } else {
                            swal(res.message, "", "error");
                            if (res.error == "token") {
                                setTimeout(function() {
                                    window.location.href = 'signin'
                                }, 2000);
                            }
                            $("#update-btn").attr('disabled', false).html("Update");
                        }
                    }
                });
                return false;
            }
        });
    });
</script>