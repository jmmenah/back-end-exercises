<html>
<head>
    <title>PHP Cookies Example</title>
</head>
<body>
<h1>Visit counter using a cookie</h1>
<FORM method="POST" action="">

    <br/>
    <input type="submit" name="Submit1" value="Create Cookie">
    <input type="submit" name="Submit2" value="Retrive Cookie">
    <input type="submit" name="Submit3" value="Delete Cookie">
    <input type="submit" name="Submit4" value="Increment 1">
</FORM>

<?php
if (isset($_POST['Submit1'])){
    if(isset($_COOKIE["visitCount"]))
    {
        echo  "<p>Cookie visitCount Exists with value = <b>" . htmlspecialchars($_COOKIE["visitCount"]) .  "</b></p>";
    }
    else
    {
        setcookie('visitCount', 1, time() + 3600 * 24);
        echo "<p>Cookie Created: visitCount = 1</p>";
    }
}

if (isset($_POST['Submit2']))
{
    if(!isset($_COOKIE["visitCount"]))
    {
        echo "<p>Cookie visitCount does Not exists</p>";

    }
    else
    {
        echo "<p>Retrieving cookie visitCount = <b>". htmlspecialchars($_COOKIE["visitCount"])."</b></p>";

    }
}

if (isset($_POST['Submit3']))
{
    if(!isset($_COOKIE["visitCount"]))
    {
        echo "<p>Cookie visitCount does Not exists</p>";

    }
    else
    {
        echo "<p>Cookies visitCount deleted !!</p>";
        setcookie('visitCount', '', time() - 3600);

    }
}

if (isset($_POST['Submit4']))
{
    if(isset($_COOKIE["visitCount"]))
    {
        echo "<pre>";
        print_r($_COOKIE);
        echo "</pre>";
        $count = ++$_COOKIE['visitCount'];
        setcookie('visitCount', $count, time() + 3600 * 24);
        echo "<p>New value cookie visitCount = <b>". htmlspecialchars($_COOKIE["visitCount"])."</b></p>";
    }
    else
    {
        echo "<p>Cookie visitCount does Not exists</p>";
    }
}

?>

</body>
</html>