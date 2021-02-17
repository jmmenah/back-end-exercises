<?php
// https://www.php.net/manual/en/function.password-verify.php#example-1007
// See the password_hash() example to see where this came from.
$hash = '$2y$10$Ua1wSCj.M2uWcafoPDw6b.RFu4RAKP1Hanj5qZVAgNyYF4NCIBcd.';

// $hash = '$2y$10$70d.I316ZdZ92NW9/3AnyOmLUMsdxmOOhhsr7L0coPVtD1bUHPhzK';
// $hash = '$2y$10$jxJbX7K55Vz.YBZGn5ZbCuLFkxzSLN7c2Des.CtSEISuCLdr5rLwa';

if (password_verify('pass', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>

