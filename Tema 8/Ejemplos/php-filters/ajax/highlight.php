<?php
/* 
 * highlight_file — Syntax highlighting of a file
 * Prints out or returns a syntax highlighted version of the code contained in filename
 * using the colors defined in the built-in syntax highlighter for PHP.
 * https://www.php.net/manual/en/function.highlight-file.php 
 *
 */

$code = highlight_file($_POST['file'], true);

$start = strpos($code, '&lt;?php') + 8;
$end = strpos($code, '?&gt;');
$len = $end - $start;

echo substr($code, $start, $len);
?>
