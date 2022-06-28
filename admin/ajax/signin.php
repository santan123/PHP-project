<script>
    $(document).ready(function() {
        $('#signin-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                }
            },
            messages: {

                email: {
                    required: 'Please enter your email',

                },
                password: {
                    required: 'Please enter Password.',
                    minlength: 'Please enter a minimum character of 8.',
                }
            },
            submitHandler: function(form) {
                let email = $("#email").val();
                let password = $("#password").val();
                $.ajax({
                    type: "POST",
                    url: "logic/signin.php",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#signin-btn").attr('disabled', true).html("<i class='fa fa-spinner fa-spin'></i>please wait...");
                    },
                    success: function(data) {
                        var res = JSON.parse(data);
                        var status = res.status;
                        if (status == 1) {

                            swal(res.msg, "", "success");
                            var delay = 2000;
                            setTimeout(function() {
                                window.location.href = './'
                            }, delay);
                        } else {
                            swal(res.msg, "", "error");
                            if (res.error == "token") {
                                setTimeout(function() {
                                    window.location.href = 'signin'
                                }, 2000);
                            }
                            $("#signin-btn").attr('disabled', false).html("Signin");
                        }
                    }
                });
                return false;
            }
        });
    });
</script>