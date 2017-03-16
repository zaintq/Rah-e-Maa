<?php
/**************************************************************************************
Copyright (c) 2014 Carnegie Mellon University.
All Rights Reserved.
Developed by: Agha Ali Raza and Ronald Rosenfeld

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are
met:

1. Redistributions of source code must retain the above copyright notice,
this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright
notice, this list of conditions and the following disclaimer in the
documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS
IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR
CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
**************************************************************************************/
///////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Raah-e-Maa Hook ////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

function ReMMenu(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $ReM_prompts;
	global $ReM_scripts;

	sayInt($ReM_prompts."Salam.wav ");

	$loop = true;

	$options = array( 
	  array('type' => 'funny', 'name' => "funny-baatain.wav "),
	  array('type' => 'fact' , 'name' => "factual-baatain.wav "),
	  //array('type' => 'drama', 'name' => "drama.wav ", )
	);

	shuffle($options);

	$loop = true;
	while ($loop) {

		$prompt =   $ReM_prompts.$options[0]['name'].$ReM_prompts."1.wav ".
					$ReM_prompts.$options[1]['name'].$ReM_prompts."2.wav ".
					$ReM_prompts."raaye.wav ".$ReM_prompts."3.wav ".
					$ReM_prompts."wapis.wav ".$ReM_prompts."4.wav ";

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " prompt: ".$prompt);
		
		$result = gatherInput($prompt, array(
						"choices" => "[1 DIGITS]", 
						"mode" => 'dtmf',
						"bargein" => false,
						"repeat" => 2,
						"timeout"=> 10,
						"onBadChoice" => "keysbadChoiceFCN",
						"onTimeout" => "keystimeOutFCN",
						"onHangup" => create_function("$event", "Prehangup()")
					)
				);
		
		if ($result->value == "1") {
			ReMDBLog("Option:".$options[0]["type"], "0");
			ReMPlay($options[0]["type"]);
			$loop = true;
		} else if ($result->value == "2"){
			ReMDBLog("Option:".$options[1]["type"], "0");
			ReMPlay($options[1]["type"]);
			$loop = true;
		}else if ($result->value == "3"){
			ReMDBLog("Raaye", "0");
			ReMRaaye();
			$loop = true;
		}else if ($result->value == "4"){
			$loop = false;
			ReMDBLog("Back-To-Polly", "0");
		}else{
			$loop = true;
		}
	}
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}


function ReMCreateRaayeEntry(){
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid, $callid;
	global $ReM_scripts;

	$result = doCurl($ReM_scripts."create_fb_entry.php?uid=".$userid."&callid=".$callid);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		return false;
	}else{
		return $result["id"];
	}
}

function ReMRaaye(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $callid;
	global $userid;
	global $ReM_prompts, $ReM_fb_dir;
	global $ReM_scripts;

	$record_id = ReMCreateRaayeEntry();
	$rerecord  = true;

	while ($rerecord && $record_id) {

	    recordAudio($ReM_prompts."record-fb.wav", array(
	       "beep"=>true,
	       "timeout"=>300,
	       "bargein" => false,
	       "silenceTimeout"=>4,
	       "maxTime"=>30,
	       "terminator" => "#",
	      // "recordFormat" => "audio/wav",
	       "format" => "audio/wav",
	       "recordURI" => $ReM_scripts."rem_feedback.php?record_id=".$record_id,
	        )
	    );

	    sayInt($ReM_prompts."aap_nay_ye_record_karwaya_hai.wav");

	   	$filefolder = $record_id-($record_id%1000);
	   	$path       = $ReM_fb_dir.$filefolder."/".$record_id.".wav";
		$path       = str_replace("\\", "/", $path); 

		sayInt($path); 

	    $result = gatherInput(
			$ReM_prompts."agar_ye_theek_hai.wav ", 
			array(
				"choices" => "[1 DIGITS]", 
				"mode" => 'dtmf',
				"bargein" => true,
				"repeat" => 2,
				"timeout"=> 10,
				"onBadChoice" => "keysbadChoiceFCN",
				"onTimeout" => "keystimeOutFCN",
				"onHangup" => create_function("$event", "Prehangup()")
			)
		);

    	if ($result->value == "1") {
    		$rerecord = false;
    	}else if ($result->value == "2") {
    		$rerecord = true;
    	}else {
    		$rerecord = false;
    	}
	}


    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}

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
}

function ReMSetPreference($preference, $fileid){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $ReM_scripts;
	global $userid, $callid;

	$result = doCurl($ReM_scripts."set_preference.php?uid=".$userid."&pref=".$preference."&callid=".$callid."&fileid=".$fileid);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	return $result;
}

function ReMPlay($type){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered with type:".$type);

	global $ReM_prompts;
	global $ReM_recs;
	// global $ReM_recs_stack;

	$loop = true;
	$play = true;
	$newid= true;
	$pref_exists = false;

	$id = "";

	$ReM_recs_stack = ReMGetRecordings();

	while ($loop) {

		if ($pref_exists){
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Already assigned preference for ID:".json_encode($id));
			sayInt($ReM_prompts."pref_exists.wav ");
			$pref_exists = false;
		}else{

			if ($newid){
				$id = $ReM_recs_stack[$type][0];
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " New ID:".json_encode($id));
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Now Rotating!");
				/*$ReM_recs_stack[$type] .= $id;
				$ReM_recs_stack[$type] = substr($ReM_recs_stack[$type], 1);*/
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Current stack: ".json_encode($ReM_recs_stack[$type]));
				$ReM_recs_stack[$type] = ReMRotateStack($ReM_recs_stack[$type]);
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Rotated stack: ".json_encode($ReM_recs_stack[$type]));
				$newid = false;
			}

			if ($play){
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " ID:".json_encode($id));
				//sayInt($ReM_recs.$type."-".$id.".wav");
				sayInt($ReM_recs.$id[1].".wav ".$ReM_recs.$id[0].".wav ");
				ReMDBLog("listen", $id[2]);
				$play = false;
			}
		}

		$prompt = $ReM_prompts. 'Dobara_sunney_ke_liay.wav '.
				  //$ReM_prompts. 'pasand.wav '.
				  $ReM_prompts. 'more-'.$type.'.wav '.
				  //$ReM_prompts. 'Aur.wav '.
				  $ReM_prompts. 'Koi_aur.wav '.
				  $ReM_prompts. 'Tafseelaat.wav ';
		
		$result = gatherInput($prompt, array(
						"choices" => "[1 DIGITS]", 
						"mode" => 'dtmf',
						"bargein" => false,
						"repeat" => 2,
						"timeout"=> 10,
						"onBadChoice" => "keysbadChoiceFCN",
						"onTimeout" => "keystimeOutFCN",
						"onHangup" => create_function("$event", "Prehangup()")
					)
				);
		
		if ($result->value == "1") {
			$play = true;
			$loop = true;
			ReMDBLog("repeat", $id[2]);
		} else if ($result->value == "5"){
			$newid= true;
			$play = true;
			$loop = true;
			ReMDBLog('aur-'.$type, $id[2]);
		}else if ($result->value == "2"){
			ReMDBLog("like", $id[2]);
			$exists = ReMSetPreference("like", $id[2]);
			$pref_exists = $exists["exists"];
			$loop = true;
		}else if ($result->value == "3"){
			ReMDBLog("dislike", $id[2]);
			$exists = ReMSetPreference("dislike", $id[2]);
			$pref_exists = $exists["exists"];
			$loop = true;
		}else if ($result->value == "4"){
			ReMDBLog("report", $id[2]);
			$exists = ReMSetPreference("report", $id[2]);
			$pref_exists = $exists["exists"];
			$loop = true;
		}else if ($result->value == "6"){
			$loop = false;
			ReMDBLog('other-options', $id[2]);
		}else if ($result->value == "9"){
			ReMDBLog("youtube", $id[2]);
			sayInt($ReM_prompts."Youtube.wav ");
			$loop = true;
		}else{
			$loop = true;
		}
	}
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}

function ReMDBLog($action, $fileid){
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $ReM_scripts;
	global $userid, $callid;

	$result = doCurl($ReM_scripts."update_log.php?uid=".$userid."&action=".$action."&callid=".$callid."&fileid=".$fileid);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		return false;
	}else{
		return true;
	}
}

///////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Raah-e-Maa Hook Test 2 /////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

function ReMT2Consts(){
	// db replacement func, declare here because 'tis temp.
	$trivia = array(
		'pak' => array( 
			array('fname' => 'PakistanQ1.wav', 'opts' => 'PakistanQ1options.wav', 'correct' => '3', 'cfile'=>'PakistanQ1true.wav', 'fcorrect' => 'PakistanQ1-correct.wav'),
			array('fname' => 'PakistanQ2.wav', 'opts' => 'PakistanQ2options.wav', 'correct' => '2', 'cfile'=>'PakistanQ2true.wav', 'fcorrect' => 'PakistanQ2-correct.wav'),
			array('fname' => 'PakistanQ3.wav', 'opts' => 'PakistanQ3options.wav', 'correct' => '1', 'cfile'=>'PakistanQ3true.wav', 'fcorrect' => 'PakistanQ3-correct.wav'),
		), 
		'cig' => array( 
			array('fname' => 'CiggQ1.wav', 'opts' => 'CiggQ1options.wav', 'correct' => '3', 'cfile'=>'CiggQ1true.wav', 'fcorrect' => 'CiggQ1-correct.wav'),
			array('fname' => 'CiggQ2.wav', 'opts' => 'CiggQ2options.wav', 'correct' => '3', 'cfile'=>'CiggQ2true.wav', 'fcorrect' => 'CiggQ2-correct.wav'),
			array('fname' => 'CiggQ3.wav', 'opts' => 'CiggQ3options.wav', 'correct' => '4', 'cfile'=>'CiggQ3true.wav', 'fcorrect' => 'CiggQ3-correct.wav'),
		), 
		'auto' => array( 
			array('fname' => 'RickshawQ1.wav', 'opts' => 'RickshawQ1options.wav', 'correct' => '4', 'cfile'=>'RickshawQ1true.wav', 'fcorrect' => 'RickshawQ1-correct.wav'),
			array('fname' => 'RickshawQ2.wav', 'opts' => 'RickshawQ2options.wav', 'correct' => '1', 'cfile'=>'RickshawQ2true.wav', 'fcorrect' => 'RickshawQ2-correct.wav'),
			array('fname' => 'RickshawQ3.wav', 'opts' => 'RickshawQ3options.wav', 'correct' => '2', 'cfile'=>'RickshawQ3true.wav', 'fcorrect' => 'RickshawQ3-correct.wav'),
		), 
		'chai' => array( 
			array('fname' => 'ChaiQ1.wav', 'opts' => 'ChaiQ1options.wav', 'correct' => '1', 'cfile'=>'ChaiQ1true.wav', 'fcorrect' => 'ChaiQ1-correct.wav'),
			array('fname' => 'ChaiQ2.wav', 'opts' => 'ChaiQ2options.wav', 'correct' => '4', 'cfile'=>'ChaiQ2true.wav', 'fcorrect' => 'ChaiQ2-correct.wav'),
			array('fname' => 'ChaiQ3.wav', 'opts' => 'ChaiQ3options.wav', 'correct' => '3', 'cfile'=>'ChaiQ3true.wav', 'fcorrect' => 'ChaiQ3-correct.wav'),
		), 
		'health' => array( 
			array('fname' => 'SehatQ1.wav', 'opts' => 'SehatQ1options.wav', 'correct' => '2', 'cfile'=>'SehatQ1true.wav', 'fcorrect' => 'SehatQ1-correct.wav'),
			array('fname' => 'SehatQ2.wav', 'opts' => 'SehatQ2options.wav', 'correct' => '4', 'cfile'=>'SehatQ2true.wav', 'fcorrect' => 'SehatQ2-correct.wav'),
			array('fname' => 'SehatQ3.wav', 'opts' => 'SehatQ3options.wav', 'correct' => '1', 'cfile'=>'SehatQ3true.wav', 'fcorrect' => 'SehatQ2-correct.wav'),
		), 
	);

	$pquiz  = array(
		'indian' => array( 
			array('fname' => 'ActorQ1.wav', 'opts' => 'ActorQ1options.wav' ), 
			array('fname' => 'ActorQ2.wav', 'opts' => 'ActorQ2options.wav' ), 
			array('fname' => 'ActorQ3.wav', 'opts' => 'ActorQ3options.wav' ), 
			array('fname' => 'ActorQ4.wav', 'opts' => 'ActorQ4options.wav' ), 
			array('fname' => 'ActorQ5.wav', 'opts' => 'ActorQ5options.wav' ), 
		), 
		'prof' => array( 
			array('fname' => 'ProfessionQ1.wav', 'opts' => 'ProfessionQ1options.wav' ), 
			array('fname' => 'ProfessionQ2.wav', 'opts' => 'ProfessionQ2options.wav' ), 
			array('fname' => 'ProfessionQ3.wav', 'opts' => 'ProfessionQ3options.wav' ), 
			array('fname' => 'ProfessionQ4.wav', 'opts' => 'ProfessionQ4options.wav' ), 
			array('fname' => 'ProfessionQ5.wav', 'opts' => 'ProfessionQ5options.wav' ), 
		), 
		'food' => array( 
			array('fname' => 'FoodQ1.wav', 'opts' => 'FoodQ1options.wav' ), 
			array('fname' => 'FoodQ2.wav', 'opts' => 'FoodQ2options.wav' ), 
			array('fname' => 'FoodQ3.wav', 'opts' => 'FoodQ3options.wav' ), 
			array('fname' => 'FoodQ4.wav', 'opts' => 'FoodQ4options.wav' ), 
			array('fname' => 'FoodQ5.wav', 'opts' => 'FoodQ5options.wav' ), 
		),
		'nick' => array( 
			array('fname' => 'NicknameQ1.wav', 'opts' => 'NicknameQ1options.wav' ), 
			array('fname' => 'NicknameQ2.wav', 'opts' => 'NicknameQ2options.wav' ), 
			array('fname' => 'NicknameQ3.wav', 'opts' => 'NicknameQ3options.wav' ), 
			array('fname' => 'NicknameQ4.wav', 'opts' => 'NicknameQ4options.wav' ), 
			array('fname' => 'NicknameQ5.wav', 'opts' => 'NicknameQ5options.wav' ), 
		),
		'animal' => array( 
			array('fname' => 'AnimalQ1.wav', 'opts' => 'AnimalQ1options.wav' ), 
			array('fname' => 'AnimalQ2.wav', 'opts' => 'AnimalQ2options.wav' ), 
			array('fname' => 'AnimalQ3.wav', 'opts' => 'AnimalQ3options.wav' ), 
			array('fname' => 'AnimalQ4.wav', 'opts' => 'AnimalQ4options.wav' ), 
			array('fname' => 'AnimalQ5.wav', 'opts' => 'AnimalQ5options.wav' ), 
		),
	);

	$pquiz_ans  = array(
		'indian' => array( 
			1 => 'Amir.wav', 
			2 => 'Salman.wav', 
			3 => 'Amitabh.wav', 
			4 => 'Ranbir.wav',
		), 
		'prof' => array( 
			1 => 'Teaching.wav', 
			2 => 'Medical.wav', 
			3 => 'Police.wav', 
			4 => 'Business.wav',
		), 
		'food' => array( 
			1 => 'Biryani.wav', 
			2 => 'Nihaari.wav', 
			3 => 'Haleem.wav', 
			4 => 'Daal.wav',
		),
		'nick' => array( 
			1 => 'GulluButt.wav', 
			2 => 'Pola.wav', 
			3 => 'Pappu.wav', 
			4 => 'Baoji.wav',
		),
		'animal' => array( 
			1 => 'Bandar.wav', 
			2 => 'Shair.wav', 
			3 => 'Bull.wav', 
			4 => 'Haathi.wav',
		),
	);

	$consts = array('r' => $trivia, 'p' => $pquiz, 'ans' => $pquiz_ans);
	return $consts;
}

function ReMMenuT2(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $ReM_prompts;
	global $ReM_scripts;

	sayInt($ReM_prompts."Salam.wav ");

	$loop = true;
	while ($loop) {

		$prompt =   $ReM_prompts."Test2mainprompt.wav ".
					$ReM_prompts."raaye.wav ".$ReM_prompts."press3.wav ".
					$ReM_prompts."wapis.wav ".$ReM_prompts."press4.wav ";

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " prompt: ".$prompt);
		
		$result = gatherInput($prompt, array(
						"choices" => "[1 DIGITS]", 
						"mode" => 'dtmf',
						"bargein" => false,
						"repeat" => 2,
						"timeout"=> 10,
						"onBadChoice" => "keysbadChoiceFCN",
						"onTimeout" => "ReMkeystimeOutFCN",
						"onHangup" => create_function("$event", "Prehangup()")
					)
				);
		
		if ($result->value == "1") {
			ReMDBLog("Option:PersonalityQuiz", "0");
			ReMPQuizMenu();
			$loop = true;
		} else if ($result->value == "2"){
			ReMDBLog("Option:Trivia", "0");
			ReMTriviaMenu();
			$loop = true;
		}else if ($result->value == "3"){
			ReMDBLog("Raaye", "0");
			ReMRaaye();
			$loop = true;
		}else if ($result->value == "4"){
			$loop = false;
			ReMDBLog("Back-To-Polly", "0");
		}else{
			$loop = true;
		}
	}
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}

function ReMPQuizMenu(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $ReM_prompts;
	global $ReM_scripts;

	$loop = true;
	while ($loop) {

		$prompt =   $ReM_prompts."Personalityprompt.wav ".
					$ReM_prompts."wapis.wav ".$ReM_prompts."press6.wav ";

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " prompt: ".$prompt);
		
		$result = gatherInput($prompt, array(
				"choices" => "[1 DIGITS]", 
				"mode" => 'dtmf',
				"bargein" => false,
				"repeat" => 2,
				"timeout"=> 10,
				"onBadChoice" => "keysbadChoiceFCN",
				"onTimeout" => "ReMkeystimeOutFCN",
				"onHangup" => create_function("$event", "Prehangup()")
			)
		);
		if ($result->value == "1") {
			ReMDBLog("PersonalityQuiz:Animal", "0");
			ReMPQuiz("animal");
			$loop = false;
		} else if ($result->value == "2"){
			ReMDBLog("PersonalityQuiz:Nickname", "0");
			ReMPQuiz("nick");
			$loop = false;
		} else if ($result->value == "3"){
			ReMDBLog("PersonalityQuiz:IndianActor", "0");
			ReMPQuiz("indian");
			$loop = false;
		} else if ($result->value == "4"){
			ReMDBLog("PersonalityQuiz:Profession", "0");
			ReMPQuiz("prof");
			$loop = false;
		} else if ($result->value == "5"){
			ReMDBLog("PersonalityQuiz:Food", "0");
			ReMPQuiz("food");
			$loop = false;
		} else if ($result->value == "6"){
			ReMDBLog("PersonalityQuiz:Back", "0");
			$loop = false;
		} else{
			$loop = true;
		}
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}

function ReMTriviaMenu(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $ReM_prompts;
	global $ReM_scripts;

	$loop = true;
	while ($loop) {

		$prompt =   $ReM_prompts."Triviaprompt.wav ".
					$ReM_prompts."wapis.wav ".$ReM_prompts."press6.wav ";

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " prompt: ".$prompt);
		
		$result = gatherInput($prompt, array(
						"choices" => "[1 DIGITS]", 
						"mode" => 'dtmf',
						"bargein" => false,
						"repeat" => 2,
						"timeout"=> 10,
						"onBadChoice" => "keysbadChoiceFCN",
						"onTimeout" => "ReMkeystimeOutFCN",
						"onHangup" => create_function("$event", "Prehangup()")
					)
				);
		
		if ($result->value == "1") {
			ReMDBLog("Trivia:Pakistan", "0");
			ReMTrivia("pak");
			$loop = false;
		} else if ($result->value == "2"){
			ReMDBLog("Trivia:Cigarette", "0");
			ReMTrivia("cig");
			$loop = false;
		} else if ($result->value == "3"){
			ReMDBLog("Trivia:Rickshaws", "0");
			ReMTrivia("auto");
			$loop = false;
		} else if ($result->value == "4"){
			ReMDBLog("Trivia:Chai", "0");
			ReMTrivia("chai");
			$loop = false;
		} else if ($result->value == "5"){
			ReMDBLog("Trivia:Sehat", "0");
			ReMTrivia("health");
			$loop = false;
		} else if ($result->value == "6"){
			ReMDBLog("Trivia:Back", "0");
			$loop = false;
		} else{
			$loop = true;
		}
	}
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}

function ReMPQuiz($quiz){

	global $ReM_prompts;
	global $ReM_scripts;
	
	$consts = ReMT2Consts();

	$ansStr = "";

	$index = 0;
	foreach ($consts["p"][$quiz] as $qname => $question) {

		if ($index != 0)
			sayInt($ReM_prompts."Aglasawaal.wav");

		$prompt =   $ReM_prompts.$question["fname"]." ".
					$ReM_prompts.$question["opts" ];

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " prompt: ".$prompt);

		$loop = true;
		while($loop){
			$result = gatherInput($prompt, array(
							"choices" => "[1 DIGITS]", 
							"mode" => 'dtmf',
							"bargein" => false,
							"repeat" => 2,
							"timeout"=> 10,
							"onBadChoice" => "keysbadChoiceFCN",
							"onTimeout" => "ReMkeystimeOutFCN",
							"onHangup" => create_function("$event", "Prehangup()")
						)
					);
			
			if (in_array($result->value, array('1','2','3','4'))) {
				$ansStr .= $result->value;
				ReMDBLog("PersonalityQuiz:".$quiz."-".$question["fname"], $result->value);
				ReMInsertAnswer("p", $quiz, $question["fname"], $result->value);
				$loop = false;
			} else{
				$loop = true;
			}
		}
		$index++;
	}

	$result = ReMGetPersonalityMatch($quiz, $ansStr);

	//sayInt($ReM_prompts."Tune2.wav ".$ReM_prompts.$result." ".$ReM_prompts."Jesi.wav");
	sayInt($ReM_prompts.$quiz."-result.wav ".$ReM_prompts.$result);
	sayInt($ReM_prompts."Disclaimer.wav ");

	$prompt =   $ReM_prompts."Aur2.wav ";

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " prompt: ".$prompt);

	$loop = true;
	while($loop){
		$result = gatherInput($prompt, array(
						"choices" => "[1 DIGITS]", 
						"mode" => 'dtmf',
						"bargein" => false,
						"repeat" => 2,
						"timeout"=> 10,
						"onBadChoice" => "keysbadChoiceFCN",
						"onTimeout" => "ReMkeystimeOutFCN",
						"onHangup" => create_function("$event", "Prehangup()")
					)
				);
		
		if ($result->value == "1") {
			ReMDBLog("Option:PersonalityQuiz-From-PersonalityQuiz", "0");
			ReMPQuizMenu();
			$loop = false;
		} else if ($result->value == "2"){
			ReMDBLog("Option:Trivia-From-PersonalityQuiz", "0");
			ReMTriviaMenu();
			$loop = false;
		}else if ($result->value == "3"){
			$loop = false;
			ReMDBLog("Back-To-Polly", "0");
		}else{
			$loop = true;
		}
	}
}

function ReMGetPersonalityMatch($quiz, $ansStr){

	$data = count_chars($ansStr, 1);
	arsort($data);
	$res = chr(current(array_keys($data)));

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Personality Alike String: * ".$ansStr." *");
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Personality Alike Index: * ".$res." *");

	$consts = ReMT2Consts();

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Personality Alike: * ".$consts['ans'][$quiz][intval($res)]." *");
	
	ReMDBLog("PQuizResult:".$quiz.":".$consts['ans'][$quiz][intval($res)], 0);
	
	ReMInsertAnswer("pa", $quiz, $ansStr, $consts['ans'][$quiz][intval($res)], 0);

	return $consts['ans'][$quiz][intval($res)];
	
}

function ReMTrivia($quiz){

	global $ReM_prompts;
	global $ReM_scripts;
	
	$consts = ReMT2Consts();
	$score = 0;
	$index = 0;

	foreach ($consts["r"][$quiz] as $qname => $question) {

		if ($index != 0)
			sayInt($ReM_prompts."Aglasawaal.wav");

		$prompt =   $ReM_prompts.$question["fname"]." ".
					$ReM_prompts.$question["opts" ];

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " prompt: ".$prompt);

		$loop = true;
		while($loop){
			$result = gatherInput($prompt, array(
							"choices" => "[1 DIGITS]", 
							"mode" => 'dtmf',
							"bargein" => false,
							"repeat" => 2,
							"timeout"=> 10,
							"onBadChoice" => "keysbadChoiceFCN",
							"onTimeout" => "ReMkeystimeOutFCN",
							"onHangup" => create_function("$event", "Prehangup()")
						)
					);
			
			if (in_array($result->value, array('1','2','3','4'))) {

				ReMDBLog("Trivia:".$quiz."-".$question["fname"], $result->value);

				if ($result->value == $question["correct"]){

					ReMDBLog("Trivia:".$quiz."-".$question["fname"]."-"."correct", $result->value);

					sayInt($ReM_prompts."applause_effect.wav ");

					sayInt($ReM_prompts.$question["cfile"]);
					
					if($rp = ReMTriviaUsersAnswers("t", $quiz, $question["fname"], $result->value)){
						if ($rp["right"] > 0)
							sayInt($ReM_prompts."Right1.wav ".$ReM_prompts.$rp["right"].".wav ".$ReM_prompts."Feesad.wav ".$ReM_prompts."Right2.wav ");
					}
					
					ReMInsertAnswer("t", $quiz, $question["fname"], $result->value, 1);
					$score += 1;
					$loop = false;
				} else{
					
					ReMDBLog("Trivia:".$quiz."-".$question["fname"]."-"."incorrect", $result->value);
					
					sayInt($ReM_prompts."wrong_effect.wav");
					sayInt($ReM_prompts."Sahi.wav ");
					//sayInt($ReM_prompts.$question["fcorrect"]);
					sayInt($ReM_prompts.$question["cfile"]);

					if($rp = ReMTriviaUsersAnswers("t", $quiz, $question["fname"], $result->value)){
						if ($rp["wrong"] > 0)
							sayInt($ReM_prompts."Wrong1.wav ".$ReM_prompts.$rp["wrong"].".wav ".$ReM_prompts."Feesad.wav ".$ReM_prompts."Wrong2.wav ");
							//sayInt($ReM_prompts.$rp["wrong"].".wav ".$ReM_prompts."Wrong.wav ");
					}
					
					ReMInsertAnswer("t", $quiz, $question["fname"], $result->value, 0);

					$loop = false;
				}
			} else{
				$loop = true;
			}
		}
		$index++;
	}

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " User score: * ".$score." *");

	if($rp = ReMTriviaUsersAnswers("t", $quiz, $question["fname"], $result->value)){

		
		if ($score >= 0 && $score <=3 ){
			sayInt($ReM_prompts."Mubarak1.wav ");
			sayInt($ReM_prompts.$score."outof3.wav ");
			sayInt($ReM_prompts."Mubarak2.wav ");
			sayInt($ReM_prompts.$rp["quiz"].".wav ".$ReM_prompts."Feesad.wav ".$ReM_prompts."Mubarak3.wav ");
		}	
	}

	$prompt =   $ReM_prompts."Aur1.wav ";

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " prompt: ".$prompt);

	$loop = true;
	while($loop){
		$result = gatherInput($prompt, array(
						"choices" => "[1 DIGITS]", 
						"mode" => 'dtmf',
						"bargein" => false,
						"repeat" => 2,
						"timeout"=> 10,
						"onBadChoice" => "keysbadChoiceFCN",
						"onTimeout" => "ReMkeystimeOutFCN",
						"onHangup" => create_function("$event", "Prehangup()")
					)
				);
		if ($result->value == "2") {
			ReMDBLog("Option:PersonalityQuiz-From-PersonalityQuiz", "0");
			ReMPQuizMenu();
			$loop = false;
		} else if ($result->value == "1"){
			ReMDBLog("Option:Trivia-From-PersonalityQuiz", "0");
			ReMTriviaMenu();
			$loop = false;
		}else if ($result->value == "3"){
			$loop = false;
			ReMDBLog("Back-To-Polly", "0");
		}else{
			$loop = true;
		}
	}
}

function ReMTriviaUsersAnswers($type, $qname, $question, $answer){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $ReM_scripts;
	global $userid, $callid;

	$result = doCurl($ReM_scripts."trivia_answers.php?uid=".$userid."&type=".$type."&callid=".$callid."&qname=".$qname."&question=".$question."&answer=".$answer);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		return false;
	}else{
		return $result;
	}
}

function ReMInsertAnswer($type, $qname, $question, $answer, $correct = false){
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $ReM_scripts;
	global $userid, $callid;

	$result = doCurl($ReM_scripts."insert_answer.php?uid=".$userid."&type=".$type."&callid=".$callid."&qname=".$qname."&question=".$question."&correct=".$correct."&answer=".$answer);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		return false;
	}else{
		return true;
	}
}

?>