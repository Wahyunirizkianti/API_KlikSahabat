<?php

	require_once 'config.php';
	require_once 'DB_Connect.php';

	// koneksi ke database
        $db = new DB_Connect();
        $con = $db->connect();
 
	// json response array
	//$response = array("error" => FALSE);

	$sql = "SELECT * FROM `tbl_useradmin`";
	$result = $con->query($sql);

	$ray = array();


if($result->num_rows > 0) {
	
	$response = ["status_code" => 200];
	
		while($row = $result->fetch_assoc() ) {
			$data['id_user'] = $row['id_user'];
			$data['username'] = $row['username'];
			$data['id_hakakses'] = $row['id_hakakses'];
			$data['nama']	  = $row['nama'];
			$data['alamat']	  = $row['alamat'];
			$data['telp']	  = $row['telp'];
			$data['email']	  = $row['email'];
			$data['pswd']	  = $row['pswd'];
		
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
