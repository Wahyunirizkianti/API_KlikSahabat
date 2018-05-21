<?php

	require_once 'config.php';
	require_once 'DB_Connect.php';

	// koneksi ke database
        $db = new DB_Connect();
        $con = $db->connect();
 
	// json response array
	//$response = array("error" => FALSE);

	$sql = "SELECT * FROM `tbl_konten`";
	$result = $con->query($sql);

	$ray = array();


if($result->num_rows > 0) {
	
	$response = ["status_code" => 200];
	
		while($row = $result->fetch_assoc() ) {
			$data['id_konten'] = $row['id_konten'];
			$data['id_menu'] = $row['id_menu'];
			$data['judul'] = $row['judul'];
			$data['jenis']	  = $row['jenis'];
			$data['url_webview']	  = $row['url_webview'];
			$data['konten']	  = $row['konten'];
			$data['tgl_buat']	  = $row['tgl_buat'];
			$data['tgl_update']	  = $row['tgl_update'];
			$data['id_creator']	  = $row['id_creato'];
			$data['id_updater']	  = $row['id_updater'];
		
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
