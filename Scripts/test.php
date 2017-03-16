<?php







$ReM_scripts = "http://localhost/wa/RaahEMaa/Scripts/";

$callid = "callid"; $fh = "fh";

function doCurl($url){
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " is called.");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
		$result = curl_exec($ch);
		curl_close($ch);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " called with url: $url, is returning: $result");
	return $result;	
}

function writeToLog($a, $b, $c){}

function ReMGetRecordings(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $ReM_scripts;

	$result = doCurl($ReM_scripts."get_recordings.php");

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=true.");
		return false;
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=false.");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " types: ".json_encode($result["types"]));
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " recs: ".json_encode($result["recs"]));
		return $result["recs"];
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, outside=true.");
}


function ReMRotateStack($arr){
	array_push($arr, array_shift($arr));
	return $arr;
	$keys = array_keys($arr);
	$val = $arr[$keys[0]];
	unset($arr[$keys[0]]);
	$arr[$keys[0]] = $val;
	return $arr;
}

$type = "funny";

$ReM_recs_stack = ReMGetRecordings();

//var_dump($ReM_recs_stack);
//die();

$id = $ReM_recs_stack[$type][0];
writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " New ID:".json_encode($id));
writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Now Rotating!");
/*$ReM_recs_stack[$type] .= $id;
$ReM_recs_stack[$type] = substr($ReM_recs_stack[$type], 1);*/
writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Current stack: ".json_encode($ReM_recs_stack[$type]));
print_r( $ReM_recs_stack[$type]);
echo "<br><br>";
$ReM_recs_stack[$type] = ReMRotateStack($ReM_recs_stack[$type]);
writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Rotated stack: ".json_encode($ReM_recs_stack[$type]));
print_r( $ReM_recs_stack[$type]);

?>