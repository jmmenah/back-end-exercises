<?php
// https://www.php.net/manual/en/function.password-hash.php#example-1002
/**
 * We just want to hash our password using the current DEFAULT algorithm.
 * This is presently BCRYPT, and will produce a 60 character result.
 *
 * Beware that DEFAULT may change over time, so you would want to prepare
 * By allowing your storage to expand past 60 characters (255 would be good)
 */

// password_hash() creates a new password hash using a strong one-way hashing algorithm

echo password_hash("pass", PASSWORD_DEFAULT);

// $2y$10$Ua1wSCj.M2uWcafoPDw6b.RFu4RAKP1Hanj5qZVAgNyYF4NCIBcd. 
// $2y$10$70d.I316ZdZ92NW9/3AnyOmLUMsdxmOOhhsr7L0coPVtD1bUHPhzK 
// $2y$10$jxJbX7K55Vz.YBZGn5ZbCuLFkxzSLN7c2Des.CtSEISuCLdr5rLwa
// ...
?>

