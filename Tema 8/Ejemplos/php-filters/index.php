<!DOCTYPE html>
<!--
Using Simple Sidebar
A toggleable, simple sidebar template for Bootstrap 4 featuring a responsive sidebar navigation menu
https://startbootstrap.com/templates/simple-sidebar/
-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Validating and Sanitizing Data with Filters</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for the sidebar -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <style>
        #example-code {
            font-size: 1.6em;
        }

        #example-output {
            font-size: 2em;
        }
    </style>
</head>

<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading menu-toggle">Examples</div>
        <div id="list-group" class="list-group list-group-flush">
          <?php
            // scandir — List files and directories inside the specified path
            // https://www.php.net/manual/en/function.scandir
            $filenames = scandir("examples");

            array_shift($filenames);  // remove .
            array_shift($filenames);  // remove ..

            foreach($filenames as $file) {
              echo "<a href='#' class='list-group-item list-group-item-action bg-light'>$file</a>\n";
            } 
          ?>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">


        <button class="btn btn-primary menu-toggle">Examples Menu</button>

        <div class="size border bg-dark text-white text-center" id="example-output">Example Output</div>


        <div id="example-code" class="container-fluid">
        </div>

    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    // toggle side menu
    $(".menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    // load example (highlighted php source code)
    $("a").click(function (e) {
        e.preventDefault();
        $(this).addClass("list-group-item-success");

        phpfile = "examples/" + $(this).text();
        // https://api.jquery.com/load/#loading-page-fragments
        $("#example-output").load(phpfile + " #output");
        $.post("ajax/highlight.php",
            {
                file: "../" + phpfile
            },
            function (data) {
                $("#example-code").html(data);
            });
    });
    // move with arrow keys
    $("#list-group").keydown(function(e) {
        switch(e.key) {  // https://stackoverflow.com/a/6011119
            case 'ArrowLeft':
            case 'ArrowUp':
                $(".list-group-item:focus").prev().focus().trigger('click');
                break;

            case 'ArrowRight':
            case 'ArrowDown':
                $(".list-group-item:focus").next().focus().trigger('click');
                break;

            default: return; // exit this handler for other keys
        }
        e.preventDefault(); // prevent the default action (scroll / move caret)
    });

    //
    $(".list-group-item").focusout(function(){
        $(this).removeClass("list-group-item-success");
    });
</script>

</body>

</html>
	
