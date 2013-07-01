<?php
if (isset($_GET['gzip']))
{
    define("GZIP", true);
} else
{
    define("GZIP", false);
}


if (GZIP == true)
{

//mendeteksi permintaan browser di kompress apa gaknya
    if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
    {
        //fungsi gzip
        ob_start("ob_gzhandler");
    } else
    {
        ob_start();
    }
}


session_start();
header("Cache-Control: no-cache, must-revalidate"); 
echo '<p><a href="?gzip">Dengan Gzip</a>, <a href="?">Tanpa gzip</a></p>';
$error = error_get_last();
echo $error['message'];

echo str_repeat("ExploreCrew ", 10000);
$_SESSION['test'] = "123";

?>
