<?php
    include('DbConnection/dbconnect.php');
	$uid = $_REQUEST['id'];

	$qryLog = "DELETE from login  WHERE uid='$uid'";
	$qryReg = "DELETE from agent_registration  WHERE aid='$uid'";
	if ($conn->query($qryLog) == TRUE && $conn->query($qryReg) == TRUE){
		echo "<script>alert('Successfully Rejected');window.location='AdminHome.php'</script>";
	}else{
		echo "<script>alert('Action Failed');window.location='AdminHome.php'</script>";
	}
?>