<script>
    $(document).ready(function() {
        $('#updateCourse-form').validate({
            rules: {
                courseName: {
                    required: true,
                },
                courseCode: {
                    required: true,
                },
                courseUnit: {
                    required: true,
                }
            },
            messages: {
                courseName: {
                    required: 'Please enter the course Name',
                },
                courseCode: {
                    required: 'Please enter the course code',
                },
                courseUnit: {
                    required: 'Please enter the course unit'
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "logic/edit_course.php",
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
                                window.location.href = './view_course.php'
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