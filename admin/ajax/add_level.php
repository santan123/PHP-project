<script>
    $(document).ready(function() {
        $('#addLevel-form').validate({
            rules: {
                level: {
                    required: true,
                },
            },
            messages: {
                level: {
                    required: 'Please enter the level',
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "logic/add_level.php",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#save-btn").attr('disabled', true).html("<i class='fa fa-spinner fa-spin'></i>please wait...");
                    },
                    success: function(data) {
                        var res = JSON.parse(data);
                        var status = res.status;
                        if (status == true) {
                            swal(res.message, "", "success");
                            var delay = 2000;
                            setTimeout(function() {
                                window.location.href = './view_level'
                            }, delay);
                        } else {
                            swal(res.message, "", "error");
                            if (res.error == "token") {
                                setTimeout(function() {
                                    window.location.href = 'signin'
                                }, 2000);
                            }
                            $("#save-btn").attr('disabled', false).html("Save");
                        }
                    }
                });
                return false;
            }
        });
    });
</script>