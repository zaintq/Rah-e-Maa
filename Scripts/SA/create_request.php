<?php

require('get_db.php');
header('Content-type: application/json');

if(isset($_GET['uid']) && isset($_GET['call_id'])) {

	$uid     = $_GET['uid'];
	$call_id = $_GET['call_id'];

	$conn = DBConn();

	$sql = 'INSERT INTO suggestion (uid, Call_ID) VALUES("'.$uid.'","'.$call_id.'")';

	if ($result = $conn->query($sql)) {
		echo json_encode(array('result' =>  array('error' => false, 'id' => $conn->insert_id, 'message' => "Request Created")));
	}else{
		echo json_encode(array('result' =>  array('error' => true, 'message' => "DB Insert Error", 'sql' => $sql)));
	}
	$conn->close();
}else {
	echo json_encode(array('result' => array('error' => true, 'message' => "Params incomplete!")));
}

?>