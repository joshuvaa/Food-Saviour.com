<?php
	include('DbConnection/dbconnect.php');
    $uid = $_REQUEST['id'];
    $action = $_REQUEST['action'];
    if ($action == "open") {
        $qry = "update orphanage set need_status='needed' where oid='$uid'";
    }
    else{
        $qry = "update orphanage set need_status='not needed' where oid='$uid'";
    }
    // echo $qry;
	if ($conn->query($qry) == TRUE ){
		echo "<script>window.location='AgentViewOrphanage.php'</script>";
	}else{
		echo "<script>window.location='AgentViewOrphanage.php'</script>";
	}
