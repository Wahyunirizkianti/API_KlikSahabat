<?php

	require_once 'config.php';
	require_once 'DB_Connect.php';


	// koneksi ke database
        $db = new DB_Connect();
        $con = $db->connect();
 
	// json response array
	//$response = array("error" => FALSE);

	$sql = "SELECT * FROM `tbl_hakakses`";
	$result = $con->query($sql);

	$ray = array();


	if($result->num_rows > 0) {
	
		$response = ["status_code" => 200];
	
			while($row = $result->fetch_assoc() ) {
				$data['id_hakakses']	  = $row['id_hakakses'];
				$data['hakakses'] 		  = $row['hakakses'];
				$data['keterangan']		  = $row['keterangan'];
		
		
	
		array_push($ray, $data);
	}
	
		$response["data"] = $ray;
	} else {
	
		$response = [
			"status_code" => 200,
			"data" => []
		];
	}

	echo json_encode($response);
	//var_dump($ray);


exit;

?>

