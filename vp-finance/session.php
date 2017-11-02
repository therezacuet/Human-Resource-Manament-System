<?php
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) 
{ 
?>
	<script>
	window.location = "login_vp_operation.php";
	</script>
<?php
}
$session_id=$_SESSION['id'];
//dri i-identify nia ang user kung nka nkalog in then mproceed cia sa user_log
$user_query = mysql_query("select * from members where id = '$session_id'")or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
$user_username = $user_row['username'];
?>