<?php

// Create Your Own PHP Form Validation Library
// https://www.mywebcode.com/create-php-form-validation-library/

include "db.php";
include "validation.php";
$validation = new validation;
if (isset($_POST['btn'])) {
    $validation->validate('fullName', 'full name', 'required');
    $validation->validate('email', 'Email', 'uniqueEmail|users|required');
    $validation->validate('password', 'Password', 'required|min_len|6');
    if ($validation->run()) {
        echo "Form is sumitted";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form validations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <h3>Create new account</h3>
            <hr>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="fullName" class="form-control" placeholder="Enter fullname"
                           value="<?php if ($validation->input('fullName')): echo $validation->input('fullName'); endif; ?>">
                    <div class="error text-danger">
                        <?php if (!empty($validation->errors['fullName'])): echo $validation->errors['fullName']; endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter email"
                           value="<?php if ($validation->input('email')): echo $validation->input('email'); endif; ?>">
                    <div class="error text-danger">
                        <?php if (!empty($validation->errors['email'])): echo $validation->errors['email']; endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Create a new password"
                           value="<?php if ($validation->input('password')): echo $validation->input('password'); endif; ?>">
                    <div class="error text-danger">
                        <?php if (!empty($validation->errors['password'])): echo $validation->errors['password']; endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
