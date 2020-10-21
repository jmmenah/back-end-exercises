<!DOCTYPE html>
<html lang="english">
<head><title>Juan Manuel Mena MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
    of a two-character lower case string and
    attempts to hash all four-number combinations
    to determine the original two characters.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];


    $nums = "0123456789";
    $show = 15;


    for($i=0; $i<strlen($nums); $i++ ) {
        $num1 = $nums[$i];

        for($j=0; $j<strlen($nums); $j++ ) {
            $num2 = $nums[$j];

            for($k=0; $k<strlen($nums); $k++ ){
                $num3 = $nums[$k];

                for($z=0; $z<strlen($nums); $z++ ){
                    $num4 = $nums[$z];

                    $try = $num1.$num2.$num3.$num4;

                    $check = hash('md5', $try);
                    if ( $check == $md5 ) {
                        $goodtext = $try;
                        break;
                    }

                    if ( $show > 0 ) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }

                }
            }
        }
    }
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form>
    <input type="text" name="md5" size="60" />
    <input type="submit" value="Crack MD5"/>
</form>
</body>
</html>


