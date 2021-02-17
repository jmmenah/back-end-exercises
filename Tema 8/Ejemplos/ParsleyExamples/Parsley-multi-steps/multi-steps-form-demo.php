<!doctype html>
<html lang="en">
<head>
    <!--
    http://parsleyjs.org/doc/examples/multisteps.html
    -->
    <meta charset="UTF-8">
    <title>Multi steps form demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

    <link href="multi-steps.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>

</head>
<body>
<div class="container">
    <h1><a href="http://parsleyjs.org/doc/examples/multisteps.html">Multi steps form demo</a></h1>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9">
        <form class="demo-form ">
            <div class="form-section">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" name="firstname" id="firstname" required="">

                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" name="lastname" id="lastname" required="">
            </div>

            <div class="form-section">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required="">
            </div>

            <div class="form-section">
                <label for="color">Favorite color:</label>
                <input type="text" class="form-control" name="color" id="color" required="">
            </div>

            <div class="form-navigation">
                <button type="button" class="previous btn btn-info pull-left">&lt; Previous</button>
                <button type="button" class="next btn btn-info pull-right">Next &gt;</button>
                <input type="submit" class="btn btn-default pull-right">
                <span class="clearfix"></span>
            </div>


        </form>
    </div>
</div>
<script>
    $(function () {
        var $sections = $('.form-section');

        function navigateTo(index) {
            // Mark the current section with the class 'current'
            $sections
                .removeClass('current')
                .eq(index)
                .addClass('current');
            // Show only the navigation buttons that make sense for the current section:
            $('.form-navigation .previous').toggle(index > 0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type=submit]').toggle(atTheEnd);
        }

        function curIndex() {
            // Return the current index by looking at which section has the class 'current'
            return $sections.index($sections.filter('.current'));
        }

        // Previous button is easy, just go back
        $('.form-navigation .previous').click(function () {
            navigateTo(curIndex() - 1);
        });

        // Next button goes forward iff current block validates
        $('.form-navigation .next').click(function () {
            $('.demo-form').parsley().whenValidate({
                group: 'block-' + curIndex()
            }).done(function () {
                navigateTo(curIndex() + 1);
            });
        });

        // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
        $sections.each(function (index, section) {
            $(section).find(':input').attr('data-parsley-group', 'block-' + index);
        });
        navigateTo(0); // Start at the beginning
    });
</script>

</body>
</html>