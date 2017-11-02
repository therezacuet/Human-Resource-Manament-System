<!--connection sa database-->
<?php include('../conn.php'); ?>
<!--end of connection-->
<?php
include('session.php');
mysql_query("update user_log set logout_Date = NOW() where id = '$session_id' ")or die(mysql_error());

session_start();
session_destroy();

header('location:login_finance.php');
?>
