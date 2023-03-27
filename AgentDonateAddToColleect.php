<?php
	include('DbConnection/dbconnect.php');
	$uid = $_REQUEST['id'];
	$qry = "update donations set donate_status='donated' where did='$uid'";
	if ($conn->query($qry) == TRUE ){
		echo "<script>alert('Successfull');window.location='AgentHome.php'</script>";
	}else{
		echo "<script>alert('Action Failed');window.location='AgentHome.php'</script>";
	}
?>