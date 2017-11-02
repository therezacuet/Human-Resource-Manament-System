<!--connection sa database-->
<?php include('../conn.php'); ?>
<!--end of connection-->
<?php
	include('session.php');
	mysql_query("UPDATE user_log SET logout_Date = NOW() WHERE id = '$session_id'")or die(mysql_error());

	session_start();
	session_destroy();
	header('location:../index.php');
?>
