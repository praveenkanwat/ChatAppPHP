<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Getting values
		$name = $_POST['name'];
		$mob = $_POST['mob'];
		
		//Creating an sql query
		$sql = "INSERT INTO users (name,mobile) VALUES ('$name','$mob')";
		
		//Importing our db connection script
		require_once('dbConnect.php');
		
		//Executing query to database
		if(mysqli_query($con,$sql)){
			$response = [];
			$response['uid'] = mysqli_insert_id($con);
			echo json_encode((object) $response);
		}else{
			echo 'Could Not Add';
		}
		
		//Closing the database 
		mysqli_close($con);
	}
?>