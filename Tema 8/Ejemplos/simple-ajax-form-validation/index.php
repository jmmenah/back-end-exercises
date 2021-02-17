<!DOCTYPE html>
<!--
  Simple PHP Ajax Form Validation Example from scratch
  https://www.itsolutionstuff.com/post/simple-php-ajax-form-validation-example-from-scratchexample.html
-->
<html lang="en">
<head>
    <title>Php Ajax Form Validation Example</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

<div class="container">
    <h1>Php Ajax Form Validation Example</h1>
    <form id="contactForm">
        <div class="alert alert-danger display-error">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="email form-control" id="email" placeholder="Email">

        </div>
        <div class="form-group">
            <label for="msg_subject">Subject:</label>

            <input type="text" id="msg_subject" class="form-control" placeholder="Subject">
        </div>
        <div class="form-group">
            <label for="message">Message:</label>

            <textarea id="message" rows="7" placeholder="Message" class="form-control"></textarea>
        </div>
        <button type="submit" id="submit" class="btn btn-success"><i class="fa fa-check"></i> Send Message</button>
    </form>
</div>
<script>
    $(document).ready(function () {
        $(".display-error").css("display", "none");

        $('#submit').click(function (e) {
            e.preventDefault();
            var name = $("#name").val();
            var email = $("#email").val();
            var msg_subject = $("#msg_subject").val();
            var message = $("#message").val();

            $.ajax({
                type: "POST",
                url: "/formProcess.php",
                dataType: "json",
                data: {name: name, email: email, msg_subject: msg_subject, message: message},
                success: function (data) {
                    if (data.code == "200") {
                        $(".display-error").css("display", "none");
                        alert("Success: " + data.msg);
                    } else {
                        $(".display-error").html("<ul>" + data.msg + "</ul>");
                        $(".display-error").css("display", "block");
                    }
                }
            });
        });
    });
</script>
</body>
</html>
