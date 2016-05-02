<?php 
	
	//Getting the requested id
	$sendmsgid = $_GET['sendmsgid'];
	$recvmsgid = $_GET['recvmsgid'];	
	
	//Importing database
	require_once('dbConnect.php');
	
	//Creating sql query with where clause to get an specific employee
	$sql = "SELECT *, IF(sender_id='$sendmsgid', 1, 0) AS `isMine` FROM messages WHERE (sender_id='$sendmsgid' AND reciver_id='$recvmsgid') OR (sender_id='$recvmsgid' AND reciver_id='$sendmsgid') ORDER BY message_id ASC";
	
	//getting result 
	$r = mysqli_query($con,$sql);
	
	//pushing result to an array 
	$message = array();
        while($row = mysqli_fetch_array($r)){
	
	array_push($message,array(
			"id"=>$row['message_id'],
			"sendmsgid"=>$row['sender_id'],
			"recvmsgid"=>$row['reciver_id'],
			"msg"=>$row['message_data'],
			"time"=>$row['created_at'],
                        "isMine"=>$row['isMine'],
		));
                  }

	//displaying in json format 
	echo json_encode(array('message'=>$message));
	
	mysqli_close($con);		