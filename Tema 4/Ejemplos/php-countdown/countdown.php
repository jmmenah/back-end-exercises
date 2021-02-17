<?php 
// Use PHP Mktime to Create a Countdown
// https://www.thoughtco.com/use-mktime-to-create-countdown-2693921

/*
https://stackoverflow.com/questions/4508488/how-to-make-a-countdown-using-php#4508521

If you need your counter to be displayed only on page refresh and be static once the page is loaded, then PHP will be fine.

If you need the countdown to get refreshed when the page is displayed, you'll need to use JavaScript.
*/

// https://www.php.net/manual/en/function.mktime.php
// https://www.php.net/manual/en/function.time.php
// https://www.php.net/manual/en/function.date.php

$target = mktime(0, 0, 0, 1, 8, 2020) ; 
echo "<p> \$target = $target seconds = ". date('l, M d, Y', $target) ."</p>";

$today = time();
echo "<p> \$today = $today seconds = ". date('l, M d, Y', $today) ."</p>";

$difference =($target-$today); 
echo "<p> \$difference = $difference seconds </p>";

// day = 24 * 60 * 60 = 86400 seconds
$days =(int) ($difference/86400); 
print "Our event will occur in $days days"; 
?> 
