<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Getting values
		$sendmsgid = $_POST['sendmsgid'];
		$recvmsgid = $_POST['recvmsgid'];
		$msg = $_POST['msg'];		
		//Creating an sql query
		$sql = "INSERT INTO messages(sender_id,reciver_id,message_data) VALUES ('$sendmsgid','$recvmsgid','$msg')";
		
		//Importing our db connection script
		require_once('dbConnect.php');
		
		//Executing query to database
		if(mysqli_query($con,$sql)){
			echo 'Added Successfully';
		}else{
			//echo 'Could Not Add';
                        echo json_encode($_POST);
		}
		
		//Closing the database 
		mysqli_close($con);
	}	