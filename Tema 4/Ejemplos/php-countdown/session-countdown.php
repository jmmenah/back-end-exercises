<?php
// PHP Timer Countdown
// https://thisinterestsme.com/php-timer-countdown/

//You must call the function session_start() before
//you attempt to work with sessions in PHP!
session_start();

header("refresh: 1");

//Check to see if our countdown session
//variable has been initialized.
if(!isset($_SESSION['countdown'])){
    //Set the countdown to x seconds.
    $_SESSION['countdown'] = 10;
    //Store the timestamp of when the countdown began.
    $_SESSION['time_started'] = time();
}

//Get the current timestamp.
$now = time();

//Calculate how many seconds have passed since
//the countdown began.
$timeSince = $now - $_SESSION['time_started'];

//How many seconds are remaining?
$remainingSeconds = abs($_SESSION['countdown'] - $timeSince);

//Print out the countdown.
echo "There are $remainingSeconds seconds remaining.";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

//Check if the countdown has finished.
if($remainingSeconds < 1){
   //Finished! Do something.
   $_SESSION = [];  // unset all session variables
   
   // Delete session cookie
   if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time()-86400, '/');
   }
   session_destroy();  // close the session

   header("Refresh:0; url=finished.php");
}
