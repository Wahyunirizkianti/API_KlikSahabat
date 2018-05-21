<?php

	require_once 'config.php';
	require_once 'DB_Connect.php';

	// koneksi ke database
        $db = new DB_Connect();
        $con = $db->connect();
 
	// json response array
	//$response = array("error" => FALSE);

	$sql = "SELECT * FROM `tbl_menu`";
	$result = $con->query($sql);

	$ray = array();


if($result->num_rows > 0) {
	
	$response = ["status_code" => 200];
	
		while($row = $result->fetch_assoc() ) {
			$data['id_menu'] = $row['id_user'];
			$data['id_parent'] = $row['id_parent'];
			$data['status_halaman'] = $row['status_halaman'];
			$data['nama_menu']	  = $row['nama_menu'];
			$data['keterangan']	  = $row['keterangan'];
			
		
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
