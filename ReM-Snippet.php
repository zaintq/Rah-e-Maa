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
$myfile = fopen("testfile.txt", "w");

set_time_limit(1800);
// Explicitly set time zone
$time_zone="Asia/Karachi";
if(function_exists('date_default_timezone_set'))date_default_timezone_set($time_zone);
///////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// GLOBAL VARIABLES ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
// deployment now defaults to wa (West Africa)
// Base directories

$apnay_banday = array("3566", "03239754007", "26573", "03018444884", "03314910288", "03350883787", "03467776602", "03465765641","03334204496", "1776", "03216818631", "142566", "142562", "03225537934", "147650", "03360434141");

//$apnay_banday = array("3566", "03239754007");

$MsgSurveyDone = false;

$survey_types = array(
	"edu" => "EDUCATION", 
	"prof" => "PROFESSION", 
	"lang" => "LANGUAGE", 
	"loc" => "LOCATION",
	"blind" => "DISABLED",
);

$survey_languages = array(
	"ur" => "URDU",
	"pu" => "PUSHTO",
	"pj" => "PUNJABI",
	"si" => "SINDHI",
	"sr" => "SIRAIKI",
	"bl" => "BALOCHI",
	"ot" => "OTHER"
);

$survey_languages_id = array(
	"1" => ["URDU",'urdu1.wav '],
	"2" => ["PUSHTO",'pushto1.wav '],
	"3" => ["PUNJABI",'punjabi1.wav '],
	"4" => ["SINDHI", 'sindhi1.wav '],
	"5" => ["SIRAIKI",'siraiki1.wav '],
	"6" => ["BALOCHI",'balochi1.wav ']
);

$survey_edu = array(
	"pr" => "PRIMARY",
	"ssc" => "SSC",
	"hfz" => "HAFIZ",
	"hssc" => "HSSC",
	"grad" => "GRAD",
	"noed" => "NOEDUCATION"
);

$FreeSwitch = "true";
// FreeSwitch Variables
//$logFiletest = "C:\\xampp\\htdocs\\wa\\logFilesFS\\log-bilal.txt";
//$logFiletest2 = "C:\\xampp\\htdocs\\wa\\logFilesFS\\log-ranking.txt";
$logFiletest3 = "D:\\xampp\\htdocs\\wa\\logFilesFS\\Incoming-calls.txt";

//$tester= fopen($logFiletest, 'a');
//$tester2= fopen($logFiletest2, 'a');
$testerpolly = fopen($logFiletest3, 'a');

//////fwrite($tester, "Log file sheet created .\n");


$password = "Conakry2014";
$port = "8021";
$host = "127.0.0.1";
$fp = "";	// Connection handle to FreeSwitch Server
$uuid = "";
$Pollyid = "";

$Drive = "D";
$base_dir = "http://127.0.0.1/wa/";
$pbase_dir = "D:/xampp/htdocs/wa/";

$jokeline_base = "http://127.0.0.1/JokeLine/";

$scripts_dir = $base_dir."Scripts/";
$praat_dir = "http://127.0.0.1/wa/Praat/";
$DB_dir = "http://127.0.0.1/wa/DBScripts/";
$logFilePath = $Drive.":\\xampp\\htdocs\\wa\\QLogs\\";
$Polly_prompts_dir = "";
$EHL_prompts_dir = "";

$baang_base=$Drive.":\\xampp\\htdocs\\Baang\\";
$polly_base=$Drive.":\\xampp\\htdocs\\wa\\Praat\\";
$joke_base=$Drive.":\\xampp\\htdocs\\JokeLine\\";

$info_msg_base = $Drive.":/xampp/htdocs/wa/InfoMessages/";

$jokesDir=$jokeline_base."Jokes/";
$jokeMsgsDir=$jokeline_base."Messages/";
$jokeScriptsDir=$jokeline_base."Scripts/";

$ReM_base  		            = "D:/xampp/htdocs/wa/RaahEMaa/";
$ReM_lbase  		        = $base_dir."RaahEMaa/";
$ReM_recs  		            = $ReM_base."Recs/";
$ReM_prompts  		        = $ReM_base."Prompts/";
$ReM_scripts  		        = $ReM_lbase."Scripts/";
$ReM_fb_dir  		        = $ReM_base."Feedback/";

$SA_base  		            = $pbase_dir."SunoAbbu/";
$SA_lbase  		        	= $base_dir."SunoAbbu/";
$SA_recs  		            = $SA_base."Recs/";
$SA_prompts  		        = $SA_base."Prompts/";
$SA_scripts  		        = $SA_lbase."Scripts/";
$SA_fb_dir  		        = $SA_base."Feedback/";
$SA_comments  		        = $SA_base."Comments/";
$SA_requests  		        = $SA_base."Requests/";

$FriendName_Dir = $polly_base . "FriendNames\\";
$SenderName_Dir = $polly_base . "UserNames\\";

$Feedback_Dir = $polly_base."Feedback\\";
$CallRecordings_Dir = $polly_base."Recordings\\";

$Feedback_Dir_Baang 		= $baang_base."feedbackofpost\\";
$CallRecordings_Dir_Baang 	= $baang_base."Recordings\\";
$UserIntro_Dir_Baang		= $baang_base."namesOfUser\\";

$survey_rec_base = $Drive.":\\xampp\\htdocs\\wa\\SurveyRecordings\\";
$language_demographic_dir = $Drive.':\\xampp\\htdocs\\wa\\SurveyRecordings\\Language\\';
$profession_demographic_dir= $Drive.':\\xampp\\htdocs\\wa\\SurveyRecordings\\Profession\\';
$location_demographic_dir = $Drive.':\\xampp\\htdocs\\wa\\SurveyRecordings\\Location\\';
$disabled_demographic_dir = $Drive.':\\xampp\\htdocs\\wa\\SurveyRecordings\\Disabled\\';

$Country="PK";
$SystemLanguage="Urdu";
$MessageLanguage="Urdu";
$healthMsgDir = $base_dir."EbolaMsgs/$MessageLanguage/";
$BabaJobs = "true";
$AtWhatAgeDoJobsKickIn = 0;	
$AtWhatAgeDoesFBKickIn = 0;
$AtWhatAgeDoesClearVoiceKickIn = 0;
$PhDirEnabled = "true";
$forwardedTo = array();    // Array of (EncPhNo-EffectNo, Number of times in this call)
$term = "#";
$ShutDown = "false";
$channel = "WateenE1";
// For Dialling out of E1
$IPaddress = "10.64.1.39";
$udpport = "5060";


$Baangpath="";
$Baangpromptsdir="";
$Baangrec_path="";
$Baanguserintro_path="";
$BaangFeedbackpath="";
$BaangUserIntroPath="";


if(isset($deployment)){
    if($deployment == 'jmv'){
        // Base directories
        $Drive = "c";
        $base_dir = "http://127.0.0.1/b/";
        $scripts_dir = $base_dir."Scripts/";
        $praat_dir = "http://127.0.0.1/b/Praat/";
        $DB_dir = "http://127.0.0.1/b/DBScripts/";
		$logFilePath = $Drive.":\\xampp\\htdocs\\b\\LogFiles\\";
		$Polly_prompts_dir = "";		
		$EHL_prompts_dir = "";
		$SystemLanguage="AmerEnglish";
		$MessageLanguage="AmerEnglish";
		$healthMsgDir = $base_dir."EbolaMsgs/$MessageLanguage/";
		$BabaJobs = "false";
		$AtWhatAgeDoJobsKickIn = 1000;
		$AtWhatAgeDoesFBKickIn = 5;
		$AtWhatAgeDoesClearVoiceKickIn = 0;
		$PhDirEnabled = "true";
		$forwardedTo = array();	// Array of (EncPhNo-EffectNo, Number of times in this call)
		$term = "*";
		$ShutDown = "true";
	}
	else{	// wa
		// Base directories
		$Drive = "D";
		$base_dir = "http://127.0.0.1/wa/";
		$scripts_dir = $base_dir."Scripts/";
		$praat_dir = "http://127.0.0.1/wa/Praat/";
		$DB_dir = "http://127.0.0.1/wa/DBScripts/";
		$logFilePath = $Drive.":\\xampp\\htdocs\\wa\\QLogs\\";
		$Polly_prompts_dir = "";
		$EHL_prompts_dir = "";
		$Country="PK";
		$SystemLanguage="Urdu";
        $MessageLanguage="Urdu";
        $healthMsgDir = $base_dir."EbolaMsgs/$MessageLanguage/";
		$BabaJobs = "true";
		$AtWhatAgeDoJobsKickIn = 0;
		$AtWhatAgeDoesFBKickIn = 0;
		$AtWhatAgeDoesClearVoiceKickIn = 0;		// option disabled for now
		$PhDirEnabled = "true";
		$forwardedTo = array();	// Array of (EncPhNo-EffectNo, Number of times in this call)
		$term = "#";
		$ShutDown = "false";
	}
}
$newCall = "TRUE";
$playAsYouListen = "TRUE";
$playInformedConsent = "TRUE";
$msgLangchanged = "FALSE";
$dlvIntroPlayed = "FALSE";
$countryCode = "";
$dlvRequestType = "";
$smsType = "";
$sendDLVSMS = "FALSE";
$hasTheUserRecordedAName = "FALSE";		// User is only prompted to enter his name once per call.

//$promptsBaseDir = "http://hosting.tropo.com/37743/www/audio/prompts/";	// cloud hosting
if($FreeSwitch == true)
{
	////fwrite($tester, "FreeSWITCH is set to True .\n");

	$baangpathf="D:/xampp/htdocs/Baang/";

	$promptsBaseDir = "D:/xampp/htdocs/wa/prompts/";					// absolute hosting
	$praat_dir = "D:/xampp/htdocs/wa/Praat/";	

	$Baangpath="http://127.0.0.1/Baang/";
	$Baangpromptsdir=$baangpathf."prompts/";
	$Baangrec_path=$baangpathf."Recordings/";
	$BaangFeedbackpath=$baangpathf."feedbackofpost/";
	$BaangUserIntroPath=$baangpathf."namesOfUser/";

	$PQCurlPath = "http://127.0.0.1/PQuiz/";
	$PQPath="D:/xampp/htdocs/PQuiz/";
	$PQPrompts = $PQPath."Prompts/";
	$PQRecs = $PQPath."Recordings/";
	$PQUser = $PQPath."User/";
	$PQScripts = $PQCurlPath."Scripts/";
	$PQEffects = $PQPath."Effects/";

}

else
{
	$promptsBaseDir = "http://127.0.0.1/wa/prompts/";						// local hosting
	$praat_dir = "http://127.0.0.1/wa/Praat/";

	$Baangpath="http://127.0.0.1/Baang/";
	$Baangpromptsdir="http://127.0.0.1/Baang/prompts/";
	$Baangrec_path="http://127.0.0.1/Baang/Recordings/Rec-";
	$Baanguserintro_path="http://localhost/Baang/namesOfUser/intro-";
	$BaangFeedbackpath="http://localhost/Baang/feedbackofpost/";
	$BaangUserIntroPath="http://localhost/Baang/namesOfUser/";

}

$AlreadygivenFeedback = "FALSE";
$AlreadyHeardJobs = "FALSE";
$thiscallStatus = "Answered";    // Temporary assignment
$checkForQuota = "false";
$callerPaidDel = "false";
$useridUnCond = "";    // added
$useridUnEnc = "";    // added
$currentStatus = "";
$GlobalVar = 0;
$fh = "";    // temprary variable to act as a place holder for file handle
$seqNo = 0;
$PGameCMBAge = 0;    // How many times has this user called us before in CMB and SysMsg?
$PBrowseCMBAge = 0;    // How many times has this user called us before in ECMB?
$logEntry = "";
$callid="";
// Mapping Between System Langs and Msg Langs //
$msgLangsForSysLangs = array(
	"AmerEnglish" => array("sousou", "pular", "malinke", "kissi", "kpele", "manon", "toma", "GuinFrench", "AmerEnglish"), // radio spots: array("AmerEnglish", "GuinFrench", "sousou", "fulani", "kissi", "kono", "krio", "limba", "loko", "mende", "themne", "wolof"),
	"Krio" => array("AmerEnglish", "GuinFrench", "sousou", "fulani", "kissi", "kono", "krio", "limba", "loko", "mende", "themne"),
	"LibEnglish" => array("AmerEnglish", "GuinFrench", "kissi", "mende"),
	"GuinFrench" => array("sousou", "pular", "malinke", "kissi", "kpele", "manon", "toma", "GuinFrench", "AmerEnglish")	// For radio spots: array("AmerEnglish", "GuinFrench", "sousou", "fulani", "kissi", "kono", "krio", "limba", "loko", "mende", "themne", "wolof")
);
$noOfMsgsHeardInThisCall = 0;
$explicitSysLangOption = "FALSE"; 	// Should there be a syslang option menu
$WaitWhileTheUserSearchesForPhNo = "FALSE";

// Generic Code, shared by all three types of requests
$CallTableCutoff = getCallTableCutoff(5);

$ReqTableCutoff = getReqTableCutoff(5);

//----- Global Voice Prompts---------
$Ask_for_forwarding2 = "";
$What_to_do3 = "";
///////////////////////////////////////////////////////////////////////////////////////
if($checkForQuota == "true"){
	$TreatmentGroup = 1000;	// Dummy value // the treatment group of this user
	$Dk = 1000;				// Dummy value // the Dk of this user

	$Q = getQ();			// Current Policy about Q assignment
	$k = getk();			// Current Policy about k assignment
}
$uuid="";
if($FreeSwitch == "true"){
	$fp = event_socket_create($host, $port, $password);

	if(isset($_REQUEST["uuid"])){
		$uuid = $_REQUEST["uuid"];	// Comment if Freeswitch is disabled
	}
}else{
	answer();
}

	//	$calltype=$_REQUEST["calltype"];
///////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// OUTGOING CALLS ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST["calltype"])){	// This is not incoming call as $calltype is set 
	$calltype=$_REQUEST["calltype"];
 	$testcall=$_REQUEST["testcall"]	   ;
    $channel = $_REQUEST["ch"];
	$userid = $_REQUEST["phno"];
 	$oreqid=$_REQUEST["oreqid"]	   ;
 	$recIDtoPlay=$_REQUEST["recIDtoPlay"]	   ;
 	$effectno=$_REQUEST["effectno"]	   ;
 	$ocallid=$_REQUEST["ocallid"]	   ;
 	$ouserid=$_REQUEST["ouserid"]	   ;
 	$app=$_REQUEST["app"]	   ;
 	$From=$_REQUEST["From"]	   ;

    $currentStatus = 'InProgress';

    //&&$$** ph decoding
	$useridUnEnc = KeyToPh($userid);	// added
	
	$countryCode = getCountryCode($useridUnEnc);
	$PGameCMBAge = searchPh($userid, "PollyGame");					// How many times has he called us before, CMB? 
	//$PJobsCMBAge = searchPh($userid, "PollyJobs");					// How many times has he called us before, CMB? 
    		
	$temp = getPreferredLangs($oreqid);
	$Langs = explode(",", $temp);
	$SystemLanguage=$Langs[0];
	$MessageLanguage=$Langs[1];
	$healthMsgDir = $base_dir."EbolaMsgs/$MessageLanguage/";
	
	//&&$$** Decode the Sender's phone number
	$ouserid = KeyToPh($ouserid);
	
	$callid = makeNewCall($oreqid, $userid, $currentStatus, $calltype, $channel);	// Create a row in the call table

	//$fh = createLogFile($callid);	// commented out for cloud deployment

 	if(isset($_REQUEST["error"])){
 		$error= $_REQUEST["error"];
 		switch ($error) {
 			case 'USER_BUSY':
 			case 'CALL_REJECTED':
 				busyFCN($callid);
 				break;
 			case 'ALLOTTED_TIMEOUT':
 			case 'NO_ANSWER':
 			case 'RECOVERY_ON_TIMER_EXPIRE':
 				timeOutFCN($callid);
 				break;
 			case 'NO_ROUTE_DESTINATION':
 			case 'INCOMPATIBLE_DESTINATION':
 			case 'UNALLOCATED_NUMBER':
 				callFailureFCN($callid);
 				break;
			
 			default:
 				errorFCN($callid);
 				break;
 		}
 		exit(1);
 	}

	//var_dump($fh);
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "App: ".$app.", Call Type: ".$calltype.", Phone Number: ".$userid.", Originating Request ID: ".$oreqid.", Call ID: ".$callid.", Country: ".$Country.", ouserid: ".$ouserid.", Age: ".$PGameCMBAge.", EHLAge: ".$PBrowseCMBAge . ", Country Code: " . $countryCode);
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Call Table cutoff found at:".$CallTableCutoff);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Req Table cutoff found at:".$ReqTableCutoff);

	$Polly_prompts_dir = $promptsBaseDir.$SystemLanguage."/Polly/";
	$EHL_prompts_dir = $promptsBaseDir.$SystemLanguage."/EHL/";

	sayInt($Polly_prompts_dir. "sil1500.wav ".$Polly_prompts_dir. "sil1500.wav ");
	// sayInt($Polly_prompts_dir."polly-relaunch.wav");

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "PGame prompts directory set to: ". $Polly_prompts_dir);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "PHealth prompts directory set to: ". $EHL_prompts_dir);
	
	selectDelPrompt();
	selectMainPrompt("FALSE", 1);
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Now attempting to call: ".$NumberToDial);
	if($channel == "WateenE1"){
		$dlvRequestType="Delivery";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Calling via $channel.");
	    $NumberToDial = str_replace('tel:+', '0', $NumberToDial);
		//$NumberToDial = "sip:".$NumberToDial."@".$IPaddress.":".$udpport;
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Dialling $NumberToDial.");
	    //fwrite($tester, $ouserid."-".$app."-".$calltype."\n");
	    if($FreeSwitch==true){
	    	if($calltype=="BNGCall-me-back" || $calltype=="BNGDelivery"){

	    		StartUpFn();
	    		//Baangfunction($callid,false);
	    		PollyGameAnswerCall($callid,"FALSE");
	    	}else if($calltype=="PQCall-me-back" ){
	    		StartUpFn();
	    		//PQuizFunction($callid, false);
	    		PollyGameAnswerCall($callid,"FALSE");
	    	}else if($calltype=="PQDelivery"){
	    		StartUpFn();
	    		//PQFriendReceivesCall($calltype,false);
	    	}else if($calltype=="Call-me-back"){
	    		StartUpFn();
	    		PollyGameAnswerCall($callid,"FALSE");
	    	}else if($calltype=="Delivery"){
	    		StartUpFn();
	    		PollyGameMsgDelivery($callid,"FALSE");
	    	}else{
		    	Prehangup();
		    }
	    }
		else{
			$callResult = callNumber(array($NumberToDial), array(   // 128.2.211.183
				"onAnswer" => create_function("$event", $functionToExecute),
				"callerID" => $callerid,
				"timeout" => 300,
				"onCallFailure" => create_function("$event", "callFailureFCN($callid);"),
				"onError" => create_function("$event", "errorFCN($callid);"),
				"onBusy" => create_function("$event", "busyFCN($callid);"),
				"onTimeout" => create_function("$event", "timeOutFCN($callid);")
				)
			);	
		}
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Calling via $channel.");
		$callResult = callNumber($NumberToDial,
			array(
			"onAnswer" => create_function("$event", $functionToExecute), //when callee answers - initiate prompts, $reply = 'FALSE'
			"callerID" => $callerid,
			"timeout" => 300,
			"onCallFailure" => create_function("$event", "callFailureFCN($callid);"),
			"onError" => create_function("$event", "errorFCN($callid);"),
			"onBusy" => create_function("$event", "busyFCN($callid);"),
			"onTimeout" => create_function("$event", "timeOutFCN($callid);")
			)
		);	
	}
}
///////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// INCOMING CALLS ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
else{	// Incoming call

	$oreqid = "0";
	$currentStatus = 'InProgress';

	$PollyGameCMB 		= "0428333112";
	$BaangCMB	 	= "0428333113";
	$PQuizCallIn 		= "0428333114";
	$PollyBaangCallIn 	= "0428333115";
	$JokeLine 			= "0428333116";
	$PHLBrowseCMB 	= "4132008508";
	$PHLSpreadCMB 	= "4125739955";
	$PollyTestBed 	= "4132008478";
	$PHLABrowseCMB 	= "4132008510";
    $PollyMessageCMB= "4122677976";
	$PHLUnSub 		= "4132008503";
    $PollyGameUnSub = "4123466014";
    $PollyForecariah= "4123466013";
    

    /*
	if($FreeSwitch==false){
		$Pollyid = calledID(); 	//which number was called in the current call?
		$userid = getCallerID();
	}else{
		$Pollyid = $_REQUEST["callerid"]; 	//which number was called in the current call?
		$userid = calledID();
	}
	*/
	$Pollyid = calledID(); 	//which number was called in the current call?
	$userid = getCallerID();
	
	$Pollyid= trim(preg_replace('/\s\s+/', ' ', $Pollyid));
	$userid= trim(preg_replace('/\s\s+/', ' ', $userid));
	$ouserid= $userid;

	$requestType = "";
	$calltype = 'Missed_Call';
	$app = 'PollyGame';
 
	// if($userid!="03314910288" && $userid!='03350883787' && $userid!="03239754007" && $userid!="03467776602" && $userid!="03465765641" && $userid!="03334204496")
	// {
	// 	Prehangup();
	// 	exit(0);
	// }

// 	if(strpos($Pollyid, $testing) !== FALSE){

	// 	if($userid!="03314910288" && $userid!="03239754007" && $userid!="03465765641" && $userid!="03334204496")
	// 	{
	// 		rejectCall();
	// 		exit(0);
	// 	}
 	
	// $testcall = "FALSE";
	// 		////fwrite($tester,"baangfunction was called  .\n");
	// 	$requestType = "BNGCall-me-back";
	// 	$calltype = 'BNGCall-me-back';
	// 	$app = 'Baang';
	// }
	/*if(strpos($Pollyid, $testing) !== FALSE){
 
	if($userid!="03314910288" && $userid!="03239754007" && $userid!="03465765641" && $userid!="03067286144")
	{
		Prehangup();
		exit(0);
	}
 
		$requestType = "Call-me-back";
		$testcall = "FALSE";
		$calltype = 'Missed_Call';
		$app = 'PollyGame';
	}*/

	if(strpos($Pollyid, $PollyGameCMB) !== FALSE){
		$testcall = "FALSE";
		$requestType = "Call-me-back";
		$calltype = 'Missed_Call';
		$app = 'PollyGame';
	}else if(strpos($Pollyid, $JokeLine) !== FALSE){
		$testcall = "FALSE";
		$requestType = "joke-Call-me-back";
		$calltype = 'joke-Missed_Call';
		$app = 'JokeLine';
		// $testcall = "FALSE";
		// $requestType = "BNGCall-me-back";
		// $calltype = 'BNGCall-me-back';
		// $app = 'Baang';
		Prehangup();
		exit(0);
	}
	else if(strpos($Pollyid, $BaangCMB) !== FALSE){
		$testcall = "FALSE";
		$requestType = "Call-me-back";
		$calltype = 'Missed_Call';
		$app = 'PollyGame';
		// $testcall = "FALSE";
		// $requestType = "BNGCall-me-back";
		// $calltype = 'BNGCall-me-back';
		// $app = 'Baang';
		Prehangup();
		exit(0);
	}
	else if(strpos($Pollyid, $PollyBaangCallIn) !== FALSE){
		$testcall = "FALSE";
		$requestType = "Call-me-back";
		$calltype = 'Missed_Call';
		$app = 'PollyGame';
		// $testcall = "FALSE";
		// $requestType = "BNGCall-me-back";
		// $calltype = 'BNGCall-me-back';
		// $app = 'Baang';
		Prehangup();
		exit(0);
	}
	else if(strpos($Pollyid, $PQuizCallIn) !== FALSE){
		$testcall = "FALSE";
		$requestType = "Call-me-back";
		$calltype = 'Missed_Call';
		$app = 'PollyGame';
		// $testcall = "FALSE";
		// $requestType = "PQCall-me-back";
		// $calltype = 'PQCall-me-back';
		// $app = 'PQuiz';
		Prehangup();
		exit(0);
	
	}
	else{
		$requestType = "";
		$testcall = "FALSE";
		$calltype = 'Missed_Call';
		$app = 'PollyGame';
		Prehangup();
		exit(0);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$useridUnCond = $userid;
	$useridUnEnc = conditionPhNo($userid, $calltype);
	$useridUnEnc= trim(preg_replace('/\s\s+/', ' ', $useridUnEnc));
	$userid = PhToKeyAndStore($useridUnEnc, 0);
	$countryCode = getCountryCode($useridUnEnc);

	$PGameCMBAge = searchPh($userid, "PollyGame");						// How many times has he called us before, CMB? 
	//$PJobsCMBAge = searchPh($userid, "PollyJobs");						// How many times has he called us before, CMB? 
	
	$PBrowseCMBAge = searchPh($userid, "PollyBrowse");					// How many times has he called us before BCMB?

	$callid = makeNewCall($oreqid, $userid, $currentStatus, $calltype, 'WateenE1');	// Create a row in the call table
    //$fh = createLogFile($callid);	// commented out for cloud deployment

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "PhToKeyAndStore returned :" . $userid);

	phoneNumBeforeAndAfterConditioning($useridUnCond, $useridUnEnc, $calltype, "");	

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "App: ".$app.", Call Type: ".$calltype.", Phone Number: ".$userid.", Originating Request ID: ".$oreqid.", Call ID: ".$callid.", Country: ".$Country.", ouserid: ".$ouserid.", Age: ".$PGameCMBAge.", EHLAge: ".$PBrowseCMBAge . ", Country Code: " . $countryCode);
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Call Table cutoff found at:".$CallTableCutoff);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Req Table cutoff found at:".$ReqTableCutoff);

	$Polly_prompts_dir = $promptsBaseDir.$SystemLanguage."/Polly/";
	$EHL_prompts_dir = $promptsBaseDir.$SystemLanguage."/EHL/";

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "PGame prompts directory set to: ". $Polly_prompts_dir);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "PHealth prompts directory set to: ". $EHL_prompts_dir);

	selectDelPrompt();
	selectMainPrompt("FALSE", 1);

	if($calltype == "Unsubsidized"){
		$dlvRequestType = "BDelivery";
		$healthMsgDir = $base_dir."EbolaMsgs/$MessageLanguage/";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Answering $calltype call.");
		answerCall();
		PHLBrowseAnswerCall('FlipChart');
		Prehangup();
    }
	else{

		if(searchCalls($userid)>1 || $userid < '1000'){	// If its a missed call then reject() will generate 2 retries from the Cisco equipment. This is to ignore those. OR If its a self loop call... ignore it. &&$$** Added < '1000' in place of == '04238333111'
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Ignoring Call as it passed: searchCalls($userid)>1 || $userid < '1000' check."); 	 //&&$$** Added < '1000' in place of == '04238333111'
			////fwrite($tester," In if befre reject .\n".searchCalls($userid));		
			
			rejectCall($app);
			exit(0);
		}

		if($checkForQuota == "true"){
			$AgeToday = getAgeToday($userid) + 1;		// number of CMB calls answered today. 0 means this is his first because this call is still not in the DB as a CMB. Adding a 1 to make it 1.
			//$AgeinDays = getAgeinDays($userid);		// unique number of days (excluding today) on which this guy has ever answered CMB calls. 0 means today is his first day.
			////fwrite($tester," In if after reject .\n");		
			
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "AgeToday = ".$AgeToday/*.", AgeinDays = ".$AgeinDays*/);
			// So now if $AgeToday == 1, it means this is his first call of the day
			// So now if $AgeinDays == 0, it means this is his first day of Polly
			
			if($AgeToday >= $Q+1){					// so e.g. if $Q == 3, he will be assigned to the quota group on his 4th call
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Inside $AgeToday == $Q+1");
				
				if(inTGx($userid, $Q) > 0){			// Is this guy already in treatment group $Q
					//$TreatmentGroup = $Q;			// This is his treatment group
					//$Dk = getTGxD($userid, $Q);		// This is his Dk
					
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Userid: ".$userid." is already in TG: ".$Q.".");
					
				}
				else{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Now adding userid: ".$userid." to TG = ".$Q.".");
					
					$TreatmentGroup = getTG($userid);	// Previous Treatment Group of this guy (if any) else the function would return 1000
					if($TreatmentGroup != 1000){		// meaning that he belongs to some tg previously
						$GlobalVar = 0;					// New policy starts for him from day 0
					}
					else{								// This is a guy new to tg concept
						$GlobalVar = readAndIncx($k);	// Read and increment the global variable mod k (0, 1, 2,..., $k-1), this will be the assigned Dk of this guy
					}
					addToTGx($Q, $GlobalVar);
					//$TreatmentGroup = $Q;
					//$Dk = $GlobalVar;

					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "TG = ".$TreatmentGroup.", Dk = ".$Dk.", Global = ".$GlobalVar.".");
					
				}
			}
		}

		if(searchCallsReq($userid) <= 0){							// Is there a pending request from this guy already which has never been retried?
			////fwrite($tester," In if 1 condidtion .\n");		

			if($checkForQuota == "true"){
				$TreatmentGroup = getTG($userid);						// Treatment Group of this guy (if any) otherwise we get 1000
				if(getLastPlayedOn($TreatmentGroup) != 'Today'){		// If we have not played the quota prompt to him today
					updateCallsReq($userid);							// Upgrade all retry type Pending requests from this guy, if any.
					
					$reqid = createMissedCall('0', '0', $callid, $requestType, $userid, "Pending", $SystemLanguage, $MessageLanguage, "WateenE1", $Pollyid);
					
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Assigned request ID: ".$reqid." because we played the quota prompt: ".getLastPlayedOn($TreatmentGroup)." and he has treatment group: ".$TreatmentGroup);
					
				}
				else{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Not making a CMB request because this phone number has already heard the quota prompt today.");
				}
			}
			else{
				updateCallsReq($userid);							// Upgrade all retry type Pending requests from this guy, if any.
				$reqid = createMissedCall('0', '0', $callid, $requestType, $userid, "Pending", $SystemLanguage, $MessageLanguage, "WateenE1", $Pollyid);
			}
		}
		else{
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Not making a request because there are already first try Call-me-back requests of status Pending from this phone number.");
		}
		$thiscallStatus = "Complete";
		$status = "Complete";
		updateCallStatus($callid, $status);
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Call Complete. Now exiting.");
		markCallEndTime($callid);
		rejectCall($app);
		exit(0);
	}
}
// Finalize and close (if execution ever reaches this far...)
Prehangup();
///////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Error Handlers /////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
function callFailureFCN($callid){
	global $fh;
	global $oreqid;
	global $callid;
	global $thiscallStatus;
	global$FreeSwitch;
	
	$thiscallStatus = "Failed";
	$status = "unfulfilled";
	updateRequestStatus($oreqid, $status);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Call Failed.");

	// if($FreeSwitch==false){
		Prehangup();
	// }
}
function errorFCN($callid){
	global $fh;
	global $oreqid;
	global $callid;
	global $thiscallStatus;
	global$FreeSwitch;
	
	$thiscallStatus = "Error";
	$status = "unfulfilled";
	updateRequestStatus($oreqid, $status);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Call Error.");
	
	// if($FreeSwitch==false){
		Prehangup();
	// }
}
function timeOutFCN($callid){
	global $fh;
	global $oreqid;
	global $callid;
	global $thiscallStatus;
	global$FreeSwitch;

	$thiscallStatus = "TimedOut";
	$status = "unfulfilled";
	updateRequestStatus($oreqid, $status);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Call Timed Out.");
	
	// if($FreeSwitch==false){
		Prehangup();
	// }
}
function busyFCN($callid){
	global $fh;
	global $oreqid;
	global $callid;
	global $thiscallStatus;
	global$FreeSwitch;

	$thiscallStatus = "Busy";
	$status = "unfulfilled";
	updateRequestStatus($oreqid, $status);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Destination number is busy.");
	// if($FreeSwitch==false){
		Prehangup();
	// }
}
function keystimeOutFCN($event){
	global $Polly_prompts_dir;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing the timed-out prompt.");
	sayInt($Polly_prompts_dir."Nobutton.wav");
}

function ReMkeystimeOutFCN($event){
	global $ReM_prompts;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing the timed-out prompt.");
	sayInt($ReM_prompts."Nobutton.wav");
}

function keysbadChoiceFCN($event){
	global $Polly_prompts_dir;

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing the invalid key prompt.");
	sayInt($Polly_prompts_dir."Wrongbutton.wav");
}
function keystimeOutFCNEHL($event){
	global $EHL_prompts_dir;

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing the timed-out prompt.");
	sayInt($EHL_prompts_dir."Nobutton.wav");
}
function keysbadChoiceFCNEHL($event){
	global $EHL_prompts_dir;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing the invalid key prompt.");
	sayInt($EHL_prompts_dir."Wrongbutton.wav");
}


///////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Tropo Library //////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
/*
function sayInt($toBeSaid){
	$repeat = "TRUE";
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " about to play: " . $toBeSaid);
	while($repeat == "TRUE"){
		$repeat = "FALSE";
		$result = ask($toBeSaid, 
			array(	"choices" => "[1 DIGITS], *, #", 
					"mode" => 'dtmf', 
					"repeat" => 0, 
					"bargein" => true, 
					"timeout" => 0.1, 
					"onHangup" => create_function("$event", "Prehangup()")
				)
			);
		if($result->name == 'choice'){
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " prompt " . $toBeSaid . " was barged-in with " . ($result->value));
		}
		if($result->value == "*"){	// pause the system
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was paused by pressing *");
			ask("", 
			array(	"choices" => "[1 DIGITS], *, #", 
					"mode" => 'dtmf', 
					"repeat" => 1, 
					"bargein" => true, 
					"timeout" => 300, 
					"onHangup" => create_function("$event", "Prehangup()")
				)
			);
			$repeat = "TRUE";
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " resumed.");
		}
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " complete. Now returning: value: " . ($result->value) . ", name: " . ($result->name) . ", attempt: " . ($result->attempt) . ", choice: " . ($result->choice));
	return $result;
}
*/

function playInfoMessage(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $info_msg_base;

	sayInt($info_msg_base."infomsg-intro.wav");

	$id = getInfoMessageToPlay();

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Info message returned: ".$id);

	sayInt($info_msg_base.$id.".wav");

	updateInfoMessageCount($id);

	sayInt($info_msg_base."infomsg-end.wav");

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}

function getInfoMessageToPlay(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid;
	global $callid;
	global $DB_dir;

	$result = doCurl($DB_dir."get_info_message.php?callid=".$callid."&uid=".$userid);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=true.");
		return false;
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=false.");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " MSG ID: ".$result["msg_id"]);
		return $result["msg_id"];
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, outside=true.");
}

function firstCall(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid;
	global $DB_dir;
	global $calltype;

	$result = doCurl($DB_dir."first_call.php?uid=".$userid."&calltype=".$calltype);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=true.");
		return false;
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=false.");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " first_call: ".$result["first_call"]);
		return $result["first_call"];
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, outside=true.");
}

function getMsgSurveyFlag(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid;
	global $DB_dir;

	$result = doCurl($DB_dir."check_ms_flag.php?uid=".$userid);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=true.");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, errorMessage= ".$result["message"]);
		return false;
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=false.");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " flag: ".$result["flag"]);
		return $result["flag"];
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, outside=true.");
}

function updateInfoMessageCount($id){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid;
	global $callid;
	global $DB_dir;

	$result = doCurl($DB_dir."update_info_message.php?callid=".$callid."&uid=".$userid."&id=".$id);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	if ($result["error"]) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=true.");
		return false;
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=false.");
		return true;
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, outside=true.");

}

function userDemographicSurvey(){

	global $Polly_prompts_dir, $survey_types, $userid;

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	// Questions for survey:
	//  1- Education: DTMF 
	//  2- Profession: voice-based 
	//  3- Location (zilla, tehsil): voice-based
	//  4- Preffered language - DTMF + voice-based

	$types = checkAlreadyExistingSurveys();

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Total Surveys: ".sizeof($survey_types) );
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Answered Surveys: ".sizeof($types) );
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Types of Answered Surveys:".implode(", ",$types));

	// if (sizeof($types) == sizeof($survey_types)) {
	if ($userid != "3566" && in_array($survey_types["edu"], $types) && in_array($survey_types["prof"], $types) && in_array($survey_types["loc"], $types) && in_array($survey_types["lang"], $types) && in_array($survey_types["blind"], $types)) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " All survey questions have been completed by this user.");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Returning.");
		return;
	}

	//sayInt($Polly_prompts_dir."SurveyMaloomat.wav");
	sayInt($Polly_prompts_dir."survey-intro.wav");
	
	if (!in_array($survey_types["lang"], $types) || $userid == "3566") {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Survey Type:".$survey_types['lang']);
		getPrefferedLanguage();
	} else if (!in_array($survey_types["edu"], $types) || $userid == "3566") {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Survey Type:".$survey_types['edu']);
		getEducation();
	} else 	if (!in_array($survey_types["prof"], $types) || $userid == "3566") {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Survey Type:".$survey_types['prof']);
		getProfession();
	} else 	if (!in_array($survey_types["blind"], $types) || $userid == "3566") {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Survey Type:".$survey_types['blind']);
		getInfoBlindUsers();
	} else if (!in_array($survey_types["loc"], $types) || $userid == "3566") {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Survey Type:".$survey_types['loc']);
		getLocation();
	} 

	//sayInt($Polly_prompts_dir."SurveyAnswerSaved.wav");
	sayInt($Polly_prompts_dir."maloomat-shukriya.wav");
}

function updateLangSurvey($key, $choice, $perm){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid;
	global $callid;
	global $DB_dir;
	global $app;

	$result = doCurl($DB_dir."update_survey_lang.php?callid=".$callid."&uid=".$userid."&key=".$key."&opt=".$choice."&id=".$perm);

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

function updateSurvey($type, $choice){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid;
	global $callid;
	global $DB_dir;
	global $app;

	$result = doCurl($DB_dir."record_survey.php?callid=".$callid."&uid=".$userid."&type=".$type."&choice=".$choice."&app=".$app);

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

function checkAlreadyExistingSurveys($type){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid;
	global $DB_dir;

	$result = doCurl($DB_dir."check_already_existing_surveys.php?uid=".$userid."&type=".$type);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		return false;
	}else{
		return $result["types"];
	}
}

function getEducation(){

	// Primary, Matric ya O Level, Hifz-e-Quran, Barhveen tak, Barhveen say zyada, Rasmi Taleem Kay Baghair
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $Polly_prompts_dir;
	global $survey_types, $survey_edu;

	$loop = true;
	
	while ($loop) {

		// $prompt =   $Polly_prompts_dir. "SurveyTaleem.wav ".
		// 			$Polly_prompts_dir. 'SurveyOptPrimary.wav '. $Polly_prompts_dir."SendTo1.wav ".
		// 			$Polly_prompts_dir. 'SurveyOptMatric.wav '. $Polly_prompts_dir."SendTo2.wav ".
		// 			$Polly_prompts_dir. 'SurveyOpt12th.wav '. $Polly_prompts_dir."SendTo3.wav ".
		// 			$Polly_prompts_dir. 'SurveyOpt12thplus.wav '. $Polly_prompts_dir."SendTo4.wav ".
		// 			$Polly_prompts_dir. 'SurveyOptHafiz.wav '. $Polly_prompts_dir."SendTo5.wav ".
		// 			$Polly_prompts_dir. 'SurveyOptUneducated.wav '. $Polly_prompts_dir."SendTo6.wav ";

		$prompt =   $Polly_prompts_dir. 'parhay-likhay-nahi-hain.wav '.// $Polly_prompts_dir."SendTo1.wav ".
					$Polly_prompts_dir. 'madrassay-ki-taleem.wav '.// $Polly_prompts_dir."SendTo2.wav ".
					$Polly_prompts_dir. 'matric-pass.wav '.// $Polly_prompts_dir."SendTo3.wav ".
					$Polly_prompts_dir. 'paanchween-pass.wav '.// $Polly_prompts_dir."SendTo4.wav ".
					$Polly_prompts_dir. 'matric-zyada.wav ';// $Polly_prompts_dir."SendTo5.wav ";
					//$Polly_prompts_dir. 'hafiz-madrassay-ki-taleem.wav '. $Polly_prompts_dir."SendTo6.wav ";

		// writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " prompt: ".$prompt);
		
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
			updateSurvey($survey_types["edu"], $survey_edu["noed"]);
			$loop = false;
		} else if ($result->value == "2"){
			updateSurvey($survey_types["edu"], $survey_edu["hfz"]);
			$loop = false;
		}else if ($result->value == "3"){
			updateSurvey($survey_types["edu"], $survey_edu["ssc"]);
			$loop = false;
		}else if ($result->value == "4"){
			updateSurvey($survey_types["edu"], $survey_edu["pr"]);
			$loop = false;
		}else if ($result->value == "5"){
			updateSurvey($survey_types["edu"], $survey_edu["grad"]);
			$loop = false;
		}else{
			$loop = true;
		}
	}
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}

function getProfession(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $DB_dir;
	global $Polly_prompts_dir;
	global $callid;
	global $userid;
	global $survey_types;
	global $profession_demographic_dir;
	global $app;

	$rerecord = true;
	While ($rerecord) {

	    recordAudio($Polly_prompts_dir."mulazmat.wav", array(
	       "beep"=>true,
	       "timeout"=>30,
	       "bargein" => false,
	       "silenceTimeout"=>4,
	       "maxTime"=>4,
	       "terminator" => "#",
	      // "recordFormat" => "audio/wav",
	       "format" => "audio/wav",
	       "recordURI" => $DB_dir."record_survey.php?callid=".$callid."&uid=".$userid."&type=".$survey_types["prof"]."&choice=0"."&app=".$app,
	        )
	    );

	    sayInt($Polly_prompts_dir."aap_nay_ye_record_karwaya_hai.wav");
	   	$filefolder=$userid-($userid%1000);
	   	$path = $profession_demographic_dir.$filefolder."/".$userid.".wav";
		$path = str_replace("\\", "/", $path);  
		sayInt($path); 


		    $result2 = gatherInput( $Polly_prompts_dir."agar_ye_theek_hai.wav ",
									//$Polly_prompts_dir."SendTo1.wav ". 
									//$Polly_prompts_dir."agar_ye_theek_nai_hai.wav ". 
									//$Polly_prompts_dir."SendTo2.wav ", 
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

	    	if ($result2->value == "1") {
	    		$rerecord = false;
	    	}
		}


    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}

function getLocation(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $DB_dir;
	global $Polly_prompts_dir;
	global $callid;
	global $userid;
	global $survey_types;
	global $location_demographic_dir;
	global $app;

	$rerecord = true;

	while ($rerecord) {

	    recordAudio($Polly_prompts_dir."location.wav", array(
	       "beep"=>true,
	       "timeout"=>30,
	       "bargein" => false,
	       "silenceTimeout"=>4,
	       "maxTime"=>4,
	       "terminator" => "#",
	      // "recordFormat" => "audio/wav",
	       "format" => "audio/wav",
	       "recordURI" => $DB_dir."record_survey.php?callid=".$callid."&uid=".$userid."&type=".$survey_types["loc"]."&choice=0"."&app=".$app,
	        )
	    );

		sayInt($Polly_prompts_dir."aap_nay_ye_record_karwaya_hai.wav");
	   	$filefolder=$userid-($userid%1000);
	   	$path = $location_demographic_dir.$filefolder."/".$userid.".wav";
		$path = str_replace("\\", "/", $path);  
		sayInt($path); 


		$result2 = gatherInput( $Polly_prompts_dir."agar_ye_theek_hai.wav ", 
									//$Polly_prompts_dir."SendTo1.wav ". 
									//$Polly_prompts_dir."agar_ye_theek_nai_hai.wav ". 
									//$Polly_prompts_dir."SendTo2.wav ", 
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

    	if ($result2->value == "1") {
    		$rerecord = false;
    	}
	}

    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
} 

function getInfoBlindUsers(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $DB_dir;
	global $Polly_prompts_dir;
	global $callid;
	global $userid;
	global $survey_types;
	global $disabled_demographic_dir;
	global $app;

	$rerecord = true;

	while ($rerecord) {

	    recordAudio($Polly_prompts_dir."blind-info.wav", array(
	       "beep"=>true,
	       "timeout"=>30,
	       "bargein" => false,
	       "silenceTimeout"=>4,
	       "maxTime"=>4,
	       "terminator" => "#",
	      // "recordFormat" => "audio/wav",
	       "format" => "audio/wav",
	       "recordURI" => $DB_dir."record_survey.php?callid=".$callid."&uid=".$userid."&type=".$survey_types["blind"]."&choice=0"."&app=".$app,
	        )
	    );

		sayInt($Polly_prompts_dir."aap_nay_ye_record_karwaya_hai.wav");
	   	$filefolder=$userid-($userid%1000);
	   	$path = $disabled_demographic_dir.$filefolder."/".$userid.".wav";
		$path = str_replace("\\", "/", $path);  
		sayInt($path); 


		$result2 = gatherInput( $Polly_prompts_dir."agar_ye_theek_hai.wav ",
									//$Polly_prompts_dir."SendTo1.wav ". 
									//$Polly_prompts_dir."agar_ye_theek_nai_hai.wav ". 
									//$Polly_prompts_dir."SendTo2.wav ", 
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

    	if ($result2->value == "1") {
    		$rerecord = false;
    	}
	}

    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
} 

function getLangPermutation(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $DB_dir;

	$result = doCurl($DB_dir."get_permutation.php");

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=true.");
		return false;
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=false.");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " permutation: ".$result["permu"]);
		return $result;
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, outside=true.");
}

function getPrefferedLanguage(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	// Urdu, Punjabi, Pushto, Sindhi, Saraiki, Balochi, 

	global $Polly_prompts_dir, $survey_languages, $survey_types, $DB_dir, $userid, $callid, $language_demographic_dir, $app, $survey_languages_id;

	$loop = true;

	$pres = getLangPermutation();
	$perm = $pres["permu"];
	$pid  = $pres["id"];
	while ($loop) {

		$prompt = $Polly_prompts_dir. 'zubaan.wav ';
		$count = 1;
		foreach ($perm as $p) {
			$prompt .= $Polly_prompts_dir. $survey_languages_id[$p][1] . $Polly_prompts_dir."SendTo".$count.".wav ";
			$count += 1;
		}
		$prompt .= $Polly_prompts_dir. 'other-zubaan.wav ';		

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", " LANG PROMPT: ". $prompt);

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
			//updateSurvey($survey_types["lang"] , $survey_languages["pj"]);
			updateSurvey($survey_types["lang"] , $survey_languages_id[$perm[0]][0]);
			updateLangSurvey($result->value, $perm[0], $pid);
			$loop = false;
		} 
		else if ($result->value == "2"){
			//updateSurvey($survey_types["lang"] , $survey_languages["si"]);
			updateSurvey($survey_types["lang"] , $survey_languages_id[$perm[1]][0]);
			updateLangSurvey($result->value, $perm[1], $pid);
			$loop = false;
		} 
		else if ($result->value == "3"){
			//updateSurvey($survey_types["lang"] , $survey_languages["bl"]);
			updateSurvey($survey_types["lang"] , $survey_languages_id[$perm[2]][0]);
			updateLangSurvey($result->value, $perm[2], $pid);
			$loop = false;
		} 
		else if ($result->value == "4"){
			//updateSurvey($survey_types["lang"]  , $survey_languages["ur"]);
			updateSurvey($survey_types["lang"] , $survey_languages_id[$perm[3]][0]);
			updateLangSurvey($result->value, $perm[3], $pid);
			$loop = false;
		} 
		else if ($result->value == "5"){
			//updateSurvey($survey_types["lang"] , $survey_languages["sr"]);
			updateSurvey($survey_types["lang"] , $survey_languages_id[$perm[4]][0]);
			updateLangSurvey($result->value, $perm[4], $pid);
			$loop = false;
		} 
		else if ($result->value == "6"){
			//updateSurvey($survey_types["lang"] , $survey_languages["pu"]);
			updateSurvey($survey_types["lang"] , $survey_languages_id[$perm[5]][0]);
			updateLangSurvey($result->value, $perm[5], $pid);
			$loop = false;
		} 
		else if ($result->value == "7"){

			$rerecord = true;

			while ($rerecord) {

			    recordAudio($Polly_prompts_dir."ZubaanKaNaam.wav", array(
			       "beep"=>true,
			       "timeout"=>30,
			       "bargein" => false,
			       "silenceTimeout"=>4,
			       "maxTime"=>4,
			       "terminator" => "#",
			      // "recordFormat" => "audio/wav",
			       "format" => "audio/wav",
			       "recordURI" => $DB_dir."record_survey.php?callid=".$callid."&uid=".$userid."&type=".$survey_types["lang"]."&choice=0"."&app=".$app,
			        )
			    );

				sayInt($Polly_prompts_dir."aap_nay_ye_record_karwaya_hai.wav");
			   	$filefolder=$userid-($userid%1000);
			   	$path = $language_demographic_dir.$filefolder."/".$userid.".wav";
			   	$path = str_replace("\\", "/", $path);
			   	sayInt($path); 

		    	$result2 = gatherInput( $Polly_prompts_dir."agar_ye_theek_hai.wav ",
									//$Polly_prompts_dir."SendTo1.wav ". 
									//$Polly_prompts_dir."agar_ye_theek_nai_hai.wav ". 
									//$Polly_prompts_dir."SendTo2.wav ", 
									array(
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

		    	if ($result2->value == "1") {
		    		$rerecord = false;
		    	}
			}
		    
		    $loop = false;
		}
		else{
			$loop = true;
		}
	}
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
} 

function writeToLog($id, $handle, $tag, $str){
	global $seqNo;
	global $deployment;
	global $logEntry;
	global $tester;

	
	$writeToTropoLogs = "true";
	$spch1 = "%%";
	$spch2 = "$$";
	$del = "~";
	$colons = ":::";
	// From Apr 01, 2015: tag could be L0: System level, L1: Mixed interest, L2: User Experience
	if($tag!= 'L0' && $tag!= 'L1' && $tag!= 'L2'){
		$tag = 'L1';
	}
	if($id == "" || $id == 0){
		$id = 'UnAssigned';
	}	

	
	//$string = $spch1 . $spch2 . $del . $id . $del . $seqNo . $del . date('D_Y-m-d_H-i-s') . $del . $tag . $colons . $del . $str . $spch2 . $spch1;
    // replaced the above with the following to overcome the date bug in tropo cloud. Details in email. Dec 18, 2013
    $now = new DateTime;
	$actualLogLine = $deployment . $del . $id . $del . $seqNo . $del . $now->format('D_Y-m-d_H-i-s') . $del . $tag . $colons . $del . $str;
    $string = $spch1 . $spch2  . $del . $actualLogLine . $spch2 . $spch1;
	
	$logEntry = $logEntry . $actualLogLine . $spch1 . $spch2;
	/*
	$seqNo++;
	if($writeToTropoLogs == "true"){
			_log($string);
		////fwrite($tester, "in _log  .\n");
	}
	else{
		fwrite($handle, $string . "\n");
		fflush($handle);
	}
	*/

	// fwrite($handle, $string . "\n");
	// fflush($handle);
}

function StartUpFn(){
	global $smsType;
	global $sendDLVSMS;
	global $userid;
	global $oreqid;
	global $scripts_dir;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Starting Call Recording");
	//startRecordingCall($scripts_dir."process_callRec.php?callid=".$GLOBALS['callid']);	//process_callRec
	
	$status = "InProgress";
	updateCallStatus($GLOBALS['callid'], $status);
	$status = "fulfilled";
	updateRequestStatus($oreqid, $status);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Call Answered.");
	
	if($sendDLVSMS == "TRUE"){
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Sending delivery SMS to ".$userid." because the age of the user is within the qualifying limits.");
		//schedSMS($userid, $smsType);// Send a SMS to the receiver
	}
}

function Prehangup(){
	global $callid;
	global $fh;
	global $thiscallStatus;
	global $currentCall;
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was called.");
	/////////////////////
	updateWaitingDlvRequests($callid);
	updateCallStatus($callid, $thiscallStatus);
	
	$sessID = getSessID();
	$calledID = calledID();
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "calledID: $calledID , SessionID: $sessID");
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Hanging Up. Call ended for callid: ".$callid);
	/////////////////////
	markCallEndTime($callid);
	sendLogs();
	//stopRecordingCall();
	//fclose($fh);
	hangupFT();
	exit(0);
}
function callNumber($recipient, $params){
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " was called with prompt: " . $recipient . " and parameters: " . $params);
	$result = call($recipient, $params);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " complete.");
	return $result;
}
function callTransfer($recipient, $params){
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " was called with prompt: " . $recipient . " and parameters: " . $params);
	$result = transfer($recipient, $params);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " complete.");
	return $result;
}
function isThisCallActive(){
	global $FreeSwitch;
	global $uuid;
	global $fp;
	global $callid;
	global $thiscallStatus;
	global $fh;
	
	$retVal = "";
	if($FreeSwitch == "false"){
		$retVal = $currentCall->isActive;
	}
	else{
		$cmd = "api lua isActive.lua ".$uuid;
		$response = event_socket_request($fp, $cmd);
		$retVal =  trim($response);
	}
	writeToLog($callid, $fh, "isActive", "Is the current call active? ".$retVal.". Hanging up if the call is not active.");			
	if($retVal == "false"){
		//$thiscallStatus = "Normal Clearning";
		Prehangup();
	}
	return $retVal;
}

function calledID(){
	global $fp;
	global $FreeSwitch;
	if($FreeSwitch == "false")
	{
		global $currentCall;
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " was called and is returning: " . ($currentCall->calledID));
		return $currentCall->calledID;				
	}
	else
	{
		global $uuid;
		$cmd = "api lua getCalledID.lua ".$uuid;//first character is a null (0)
		$response = event_socket_request($fp, $cmd);
		return $response;
	}

	
}
function getSessID(){
global $FreeSwitch;

	if($FreeSwitch == "false")
	{
		global $currentCall;
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " was called and is returning: " . ($currentCall->sessionId));
		return $currentCall->sessionId;
	}
	else
	{
		global $uuid;
		return $uuid;
	}
	
}

function getCallerID()
{
	global $FreeSwitch;

	if($FreeSwitch == "false")
	{
		global $currentCall;
		//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " was called.");
		
		// Getting the User's Phone Number from the sip header
		$useridUnclean = $currentCall->getHeader("from");
		$Useless = array("<", ">", "@", ";", "_");
		$Clean = str_replace($Useless, "&", $useridUnclean);
		$colon = array(":");
		$equals = str_replace($colon, "=", $Clean);
		parse_str($equals);
		$userid = $sip;  // Phone number acquired
		//&&$$** ph encoding
		$useridBfTrim = $userid;
		$userid = trim($userid, " \t\n\r\0\x0B");
		$useridAfTrim = $userid;
		
		$userCallerID = $currentCall->callerID;
		
		if($userid == ""){
			$userid = $currentCall->callerID;
		}
		//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "SIP based caller ID before trim:". $useridBfTrim);
		//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "SIP based caller ID after trim:". $useridAfTrim);
		//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Tropos callerID function returned the caller ID to be: ". $userCallerID);

		//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " is returning callerid: $userid");
		return $userid;			
	}
	else
	{	
		global $uuid;
		global $fp;
		global $fh;
		
		$cmd = "api lua getCallerID.lua ".$uuid;//first character is a null (0)
		$response = event_socket_request($fp, $cmd);
		return $response;
	}
}
function startRecordingCall($params){
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " was called with params: " . $params);
	startCallRecording($params);
}

function stopRecordingCall(){
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " was called.");
	stopCallRecording();
}

function answerCall(){
	global $FreeSwitch;

	if($FreeSwitch == "false")
	{
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was called.");
	answer();
	}
	else
	{


		global $uuid;
		global $fp;
		global $fh;
		
		$cmd = "api lua answer.lua ".$uuid;//first character is a null (0)
		$response = event_socket_request($fp, $cmd);
		return $response;
	}
}

function sendSMS($msg, $params){
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was called with msg: $msg and params:" . $params);
	return message($msg, $params);
}

function rejectIfCallInactive(){
	if(isThisCallActive()=="true")
		return;
	Prehangup();
}

function rejectCall($app){
	


	global $FreeSwitch;

	if($FreeSwitch == "false")
	{
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was called.");
	reject();
	Prehangup();
	}
	else
	{
		global $uuid;
		global $fp;
		global $fh;

		if($app == "JokeLine")
		{
			global $userid;
		    global $callid;
		    global $jokeScriptsDir;
		    global $joke_base;
		    global $jokeMsgsDir;
		    global $jokesDir;
 			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Get prompts for JokeLine!");
		    $prompts_paths = json_decode(doCurl($jokeScriptsDir."get_prompts.php?callid=".$callid."&uid=".$userid));
		    $prompts_paths = $prompts_paths->result;
		    if ($prompts_paths->error) {
		    	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Error in Getting Prompts! Hanging Up!");
		    	Prehangup();
		    } else {
		    	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In Else!");
		    	$jokeid = $prompts_paths->jid;
		    	$msgid  = $prompts_paths->msgid;
		    	$info   = $prompts_paths->info;
		    	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Info:".$info);
		    	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Joke:".$jokeid);
		    	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Msg:".$msgid);
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In Else checking callactive!");
	    		rejectIfCallInactive();
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In Else call is active!");
	    		if ($info) {
	    			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In Info!");
	    			$infoPath = str_replace("\\", "/", $joke_base."info.wav");
	    			$cmd = "api lua playjoke.lua ".$uuid." ".$infoPath." 1";//first character is a null (0)
	    			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Path CMD:".$cmd);
					$response = event_socket_request($fp, $cmd);
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In Info checking callactive!");
					rejectIfCallInactive();
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In Info call is active!");
	    			doCurl($jokeScriptsDir."update_log.php?callid=".$callid."&uid=".$userid."&id=0&type=info");
	    		}

	    		if ($jokeid) {
	    			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In Joke!");
	    			$jokePath = str_replace("\\", "/", $joke_base."Jokes\\".$jokeid.".wav");
	    			$cmd = "api lua playjoke.lua ".$uuid." ".$jokePath." 2";//first character is a null (0)
	    			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Path CMD:".$cmd);
					$response = event_socket_request($fp, $cmd);
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In JOKE checking callactive!");
					rejectIfCallInactive();
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In JOKE call is active!");
	    			doCurl($jokeScriptsDir."update_log.php?callid=".$callid."&uid=".$userid."&id=".$jokeid."&type=joke");
	    		}

	    		if ($msgid) {
	    			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In Msg!");
	    			$msgPath = str_replace("\\", "/", $joke_base."Messages\\".$msgid.".wav");
	    			$cmd = "api lua playjoke.lua ".$uuid." ".$msgPath." 3";//first character is a null (0)
	    			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Path CMD:".$cmd);
					$response = event_socket_request($fp, $cmd);
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In MSG checking callactive!");
					rejectIfCallInactive();
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "In MSG call is active!");
	    			doCurl($jokeScriptsDir."update_log.php?callid=".$callid."&uid=".$userid."&id=".$msgid."&type=msg");

	    			
	    		}	

	    		$cmd = "api lua playjoke.lua ".$uuid." dummy 4";//first character is a null (0)
    			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Path CMD:".$cmd);
				$response = event_socket_request($fp, $cmd);	
				return $response;					
			}
		} else{			
		    $cmd = "api lua reject.lua ".$uuid;//first character is a null (0)
			$response = event_socket_request($fp, $cmd);
			//return $response;
		}
		
		Prehangup();
	}
}

///////////////////////////////////////////////////////////////////////////////////////
//*********************************** < Suno Abbu > *********************************//
///////////////////////////////////////////////////////////////////////////////////////

function SA_Menu(){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $SA_prompts, $SA_recs, $userid;

	sayInt($SA_prompts."Test3mainprompt1.wav");
	
	$loop=true;
	
	while($loop){

		$result = gatherInput($SA_prompts."Test3mainprompt2.wav ".$SA_prompts."wapis_janay_kay_liye.wav", array(
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
	
		if($result->value == "1"){
			SA_Play("Tip");
		}
		
		else if($result->value == "2"){
			SA_Play("Cost");
		}
		
		else if($result->value == "3"){
			SA_Play("Story");
		}
		
		else if($result->value == "4"){
			$record_id = SA_CreateFBEntry();
			if ($record_id) {
				SA_Record("fb", $record_id);
			}
		}
		else if($result->value == "5"){
			$loop = false;
		}
	}
}

function SA_Delivery($del_id){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $SA_prompts, $SA_recs;

	if ($params = SA_GetDeliveryParams($del_id)) {

		$id   = $params["file_id"];
		$fuid = $params["fuid"];
		$type = $params["type"];

		sayInt($SA_prompts."Messagereceived1.wav");
		sayInt($SA_recs."U".$fuid.".wav");
		sayInt($SA_prompts."Messagereceived2.wav");
		
		$loop=true;
		
		while($loop){

			sayInt($SA_recs.$type.$id.".wav");

			$result = gatherInput($SA_prompts."Messageoptions.wav ", array(
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
		
			if($result->value == "1"){
				continue;
			}
			
			else if($result->value == "2"){
				SA_Forward($id, $type);
			}
			
			else if($result->value == "3"){
				SA_Menu();
			}
		}
	}
}

function SA_Play($type){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $SA_prompts;
	global $SA_recs;
	global $SA_scripts;
	global $userid;

	$files = SA_GetFile($userid, $type);

	if (!$files) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " error in fetching $type files.");
		return;
	}

	sayInt($SA_prompts.$type."intro.wav ");

	if ($type == "Story") {
		sayInt($SA_prompts."Storydisclaimer1.wav");
	}

	$count = 0;
	
	foreach ($files as $file) {

		if ($count > 0 && $type == "Story") {
			sayInt($SA_prompts."Nextstory.wav");
		}
	
		$loop        = true;
		$break_outer = false;
		$captured    = false;

		while($loop) {
			
			if ($break_outer) break;

			sayInt($SA_recs.$file['name']);

			if (!$captured) {
				if ($type == "Tip") {
					SA_CaptureEvent($file['file_id'], 1);
				}else if($type == "Cost") {
					SA_CaptureEvent($file['file_id'], 2);
				}else if($type == "Story") {
					if ($file["cat"] == "admin") {
						SA_CaptureEvent($file['file_id'], 3);
					}else if ($file["cat"] == "user"){
						SA_CaptureEvent($file['file_id'], 17);
					}
				}
				$captured = true;
			}

			$result = gatherInput($SA_prompts.$type."options1.wav", array(
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
			
			if($result->value == "1"){

				continue; // Repeat
			}
		
			else if($result->value == "2"){

				if ($type == "Story") {
					$record_id = SA_CreateRaayeEntry($file['file_id']);
					SA_Record("comment", $record_id);
				}elseif ($type == "Cost") {
					SA_Forward($file['file_id'], $type);
				}elseif ($type == "Tip") {
					$inner_loop 	= true;
					$inner_captured = false;

					while ($inner_loop) {

						SA_CaptureEvent($file['file_id'], 6);

						sayInt($SA_recs.$file['info']);

						if (!$inner_captured) {
							if ($type == "Tip") {
								SA_CaptureEvent($file['info'], 6);
							}else if($type == "Cost") {
								SA_CaptureEvent($file['info'], 5);
							}
							$inner_captured = true;
						}

						$inner_result = gatherInput($SA_prompts.$type."options2.wav", array(
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
						
						if($inner_result->value == "1"){
							continue;
						}else if($inner_result->value == "2"){
							SA_Forward($file['file_id'], $type, true);
						}else if($inner_result->value == "3"){
							if ($type == "Tip") {
								$record_id = SA_CreateRequestEntry();
								if ($record_id) {
									SA_Record("request", $record_id);
								}
							}
						}else if($inner_result->value == "4"){
							$inner_loop  = false;
							$break_outer = true;
						}else if($inner_result->value == "5"){
							return;
						}
					}
				}

			}
		
			else if($result->value == "3"){

				if ($type == "Story") {
					$record_id = SA_CreateStoryEntry();
					SA_Record("story", $record_id);
				}elseif ($type == "Cost") {
					$loop = false;
				}elseif ($type == "Tip") {
					SA_Forward($file['file_id'], $type);
				}
			}
		
			else if($result->value == "4"){

				if ($type == "Story") {
					SA_ListenToComments($file['file_id']);
				}elseif ($type == "Cost") {
					return;
				}elseif ($type == "Tip") {
					$loop = false;
				}
			}
			else if($result->value == "5"){
				if ($type == "Tip") {
					return;
				}elseif ($type == "Story") {
					SA_Forward($file['file_id'], $type);
				}
			}else if($result->value == "6"){
				if ($type == "Story") {
					$loop = false;
				}
			}else if($result->value == "7"){
				if ($type == "Story") {
					return;
				}
			}
		}
		$count++;
	}
}

function SA_GetComments($story_id){
	
	global $userid;
	global $SA_prompts;
	global $SA_scripts;

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	$url    = $SA_scripts."get_comments.php?story_id=".$story_id;
	$result = doCurl($url);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=true.");
		return false;
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=false.");
		return $result;
	}
}

function SA_ListenToComments($story_id){

	global $callid;
	global $userid;
	global $SA_prompts;
	global $SA_scripts;
	global $SA_comments;

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	$result = SA_GetComments($story_id);

	if($result){

		$comments = $result["comments"];

		if($result["len"] <= 0){
			sayInt($SA_prompts."no-comments.wav");
		}else{
			
			sayInt($SA_prompts."Comments.wav");

			$next_comment = true;
			for($i = 0; $i < $result["len"]; $i++) {
				
				if (!$next_comment) break;

				$loop = true;
				while ($loop) {
					
					sayInt($SA_comments.$comments[$i].".wav");

					$prompt =   $SA_prompts."Commentoptions.wav";

					$choice = gatherInput($prompt, array(
				        "choices" => "[1 DIGITS], *, #",
						"mode" => 'dtmf',
						"bargein" => true,
						"repeat" => 3,
						"timeout"=> 5,
						"onBadChoice" => "keysbadChoiceFCN",
						"onTimeout" => "ReMkeystimeOutFCN",
						"onHangup" => create_function("$event", "Prehangup()")
				        )
				    );
				    
					if($choice->value=="1"){
						$loop = true;
					}else if($choice->value=="2"){
						$loop = false;
					}else if($choice->value=="4"){
						$loop = false;
						$next_comment = false;
					}else if($choice->value=="3"){
						$record_id = SA_CreateRaayeEntry($story_id);
						SA_Record("comment", $record_id);
						$loop = false;
						$next_comment = true;
					}
				}
			} 
		}
	}else{
		sayInt( $PQPrompts."error.wav ");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Error: Comments returned with error. Exiting.");
		//PQLog("error", "comments", "exiting");
	}

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}

function SA_CaptureEvent($f_id, $action_id){
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $SA_scripts;
	global $userid, $callid;

	$result = doCurl($SA_scripts."set_call.php?uid=".$userid."&f_id=".$f_id."&call_id=".$callid."&action_id=".$action_id);

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

function SA_Forward($file_id, $type, $info = false) {

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");
	
	global $SA_prompts;
	global $ReM_prompts;
	global $SA_scripts;
	global $userid;
	global $callid;

	$prompt = $SA_prompts."Forward1.wav";

	$loop = true;

	$number = "";

	while($loop){
		$NumberList = gatherInput($prompt, array(
				        "choices" => "[11 DIGITS]",
						"mode" => 'dtmf',
						"bargein" => true,
						"repeat" => 3,
						"timeout"=> 30,
						"interdigitTimeout"=> 20,
						"onBadChoice" => "keysbadChoiceFCN",
						"onTimeout" => "ReMkeystimeOutFCN",
						"terminator" => "#",
						"onHangup" => create_function("$event", "Prehangup()")
				    )
				);

		if($NumberList->name == 'choice'){

			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Friend's phone number entered: ".$NumberList->value.". Now playing it.");

			$num12 = str_split($NumberList->value);

			for($index1 = 0; $index1 < count($num12); $index1 += 1){
				if($index1 == 0){
					$fileName = $num12[$index1].'.wav';
					$numpath = $ReM_prompts.$fileName;
				}
				else{
					$fileName = $num12[$index1].'.wav';
					$numpath = $numpath . "\n" . $ReM_prompts.$fileName;
				}
			}

			sayInt($SA_prompts."Forward8.wav ");
			$presult = sayInt($numpath);
				
			if ($presult->name == 'choice'){
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$presult->value." to skip ".$numpath.".");
			}

			$choice = gatherInput(
					$SA_prompts."Forward2.wav ", array(
			        "choices" => "[1 DIGITS],*,#",
					"mode" => 'dtmf',
					"bargein" => true,
					"repeat" => 3,
					"timeout"=> 5,
					"onBadChoice" => "keysbadChoiceFCN",
					"onTimeout" => "ReMkeystimeOutFCN",
					"onHangup" => create_function("$event", "Prehangup()")
		        )
		    );
		    
			if($choice->value=="1"){
				$number = $NumberList->value;
				if ($dinfo = SA_GetDeliveryInfo()) {
					//if ($dinfo["count"] <= 0) 
						SA_Record("name", $userid);
					
				}
				$dreq = SA_CreateDeliveryRequest($file_id, $type,PhToKeyAndStore($number, $userid), $info);
				if ($dreq) {
					if ($userid == 3566) {
						if(makeNewReq($dreq["id"], 23704330, $callid, "Delivery", PhToKeyAndStore($number, $userid), "Pending", $SystemLanguage, $MessageLanguage, $channel)){
							SA_CaptureEvent($dreq["id"], 8);
							sayInt($SA_prompts."Forward6.wav ");
							$loop   = false;
						}else
							$loop   = true;
					}else{
						if(makeNewReq($dreq["id"], 23704330, $callid, "Delivery", PhToKeyAndStore($number, $userid), "Pending", $SystemLanguage, $MessageLanguage, $channel)){
						sayInt($SA_prompts."Forward6.wav ");
						$loop   = false;
					}else
						$loop   = true;
					}
				}else
					$loop   = true;
				$loop = false;
			}else if($choice->value=="2"){
				$loop = true;
			}
		}
		else{
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Timed out. No number entered. Now hanging up.");		
			$FriendsNumber = 'false';
			Prehangup();
		}
	}
}

function SA_CreateDeliveryRequest($file_id, $type, $fuid, $info = false){

	global $SA_scripts;
	global $userid;
	global $callid;

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	$url    = $SA_scripts.'new_delivery_request.php?uid='.$userid.'&file_id='.$file_id.'&call_id='.$callid.'&fuid='.$fuid.'&type='.$type.'&info='.intval($info);
	$result = doCurl($url);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=true.");
		return false;
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=false.");
		return $result;
	}
}

function SA_GetDeliveryInfo(){

	global $SA_scripts;
	global $userid;
	global $callid;

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	$url    = $SA_scripts.'get_delivery_info.php?uid='.$userid;
	$result = doCurl($url);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=true.");
		return false;
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=false.");
		return $result;
	}
}

function SA_GetDeliveryParams($id){

	global $SA_scripts;
	global $userid;
	global $callid;

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	$url    = $SA_scripts.'get_delivery_params.php?id='.$id;
	$result = doCurl($url);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=true.");
		return false;
	}else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning, error=false.");
		return $result;
	}
}

function SA_GetFile($uid, $type){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $SA_scripts;
	global $userid, $callid;

	$result = doCurl($SA_scripts."get_file_id.php?uid=".$uid."&type=".$type."&call_id=".$callid);

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " JSON received: ".$result);

	$result = json_decode($result, true);
	$result = $result["result"];

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");

	if ($result["error"]) {
		return false;
	}else{
		return $result["files"];
	}
}

function SA_Record($type, $record_id){

	global $callid;
	global $userid;
	global $SA_prompts;
	global $SA_recs;
	global $SA_scripts;
	global $calltype;
	global $SA_comments;
	global $SA_requests;
	global $SA_fb_dir;

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	if($type == 'request'){
		$maxtime = 60;
		$prompt  = $SA_prompts."Inforequest.wav ".$SA_prompts."Beepcomment.wav ";
	}else if($type == 'name'){
		$maxtime = 10;
		$prompt  = $SA_prompts."Forward3.wav ";
	}else if($type == 'story'){
		$maxtime = 120;
		$prompt  = $SA_prompts."Apnistory.wav ".$SA_prompts."Storydisclaimer2.wav ".$SA_prompts."Beepstory.wav ";
	}else if($type == 'comment'){
		$maxtime = 60;
		$prompt  = $SA_prompts."Storycomment.wav ".$SA_prompts."Commentdisclaimer.wav ".$SA_prompts."Beepcomment.wav ";
	}else if($type == 'fb'){
		$maxtime = 60;
		$prompt  = $SA_prompts."Mainfeedback.wav ";
	}

	$uri = $SA_scripts."save_recording.php?type=".$type."&uid=".$userid."&record_id=".$record_id."&call_id=".$callid."&suno_abbu=true";
	
    $loop=true;

    while ($loop) {			

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Prompting user to record something of type: $type");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "URI: $uri");

		$record_return = recordAudio($prompt , array(
		       "beep"=>true,
		       "timeout"=>30,
		       "bargein" => false,
		       "silenceTimeout"=>5,
		       "maxTime"=>$maxtime,
		       "terminator" => "#",
		       "format" => "audio/wav",
		       "recordURI" => $uri
		        )
		    );
		
		sayInt($SA_prompts."Replay.wav");

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Return value of record: ".$record_return->value);		
		
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Replaying the recording of type: $type");

		if($type == "request"){
	   		sayInt($SA_requests.$record_id.".wav");
	   		SA_CaptureEvent($record_id, 13);
		}
	   	else if($type == "name")		{							
	   		sayInt($SA_recs."U".$record_id.".wav");
	   		SA_CaptureEvent($record_id, 15);
	   	}
	   	else if($type == "story"){									
	   		sayInt($SA_recs.$record_id.".wav");
	   		SA_CaptureEvent($record_id, 12);
	   	}
	   	else if($type == "comment"){	
	   		sayInt($SA_comments."C-".$record_id.".wav");
	   		SA_CaptureEvent($record_id, 11);
	   	}else if($type == 'fb'){
	   		$filefolder = $record_id-($record_id%1000);
		   	$path       = $SA_fb_dir.$filefolder."/".$record_id.".wav";
			$path       = str_replace("\\", "/", $path); 
			sayInt($path);
			SA_CaptureEvent($record_id, 16);
		}
	
		$choice = gatherInput(
				$SA_prompts."Genconfirmation.wav ", array(
			        "choices" => "[1 DIGITS],*,#",
					"mode" => 'dtmf',
					"bargein" => true,
					"repeat" => 3,
					"timeout"=> 5,
					"onBadChoice" => "keysbadChoiceFCN",
					"onTimeout" => "ReMkeystimeOutFCN",
					"onHangup" => create_function("$event", "Prehangup()")
		        )
	    );
	    
		if($choice->value=="1"){
			$loop = false;
			if($type == "request")
	   			sayInt($SA_prompts."Shukriya3.wav");
		   	// else if($type == "name")									
		   	// 	sayInt($SA_prompts."Shukriya1.wav");
		   	else if($type == "story")									
		   		sayInt($SA_prompts."Shukriya2.wav");
		   	else if($type == "comment"){	
		   		sayInt($SA_prompts."Shukriya1.wav");
		   	}else if($type == 'fb'){
				sayInt($SA_prompts."Shukriya1.wav");
			}
		}else if($choice->value=="2") {
			$loop = true;	
			if($type == "comment")
				$prompt  = $SA_prompts."Beepcomment.wav ";
			elseif($type == "story")
				$prompt  = $SA_prompts."Beepstory.wav ";
		}
	}

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " returning.");
}

function SA_CreateFBEntry(){
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid, $callid;
	global $SA_scripts;

	$result = doCurl($SA_scripts."create_fb_entry.php?uid=".$userid."&call_id=".$callid);

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

function SA_CreateRaayeEntry($story_id){
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid, $callid;
	global $SA_scripts;

	$result = doCurl($SA_scripts."create_comment.php?uid=".$userid."&call_id=".$callid."&story_id=".$story_id);

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

function SA_CreateStoryEntry(){
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid, $callid;
	global $SA_scripts;

	$result = doCurl($SA_scripts."create_story.php?uid=".$userid."&call_id=".$callid);

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

function SA_CreateRequestEntry(){
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");

	global $userid, $callid;
	global $SA_scripts;

	$result = doCurl($SA_scripts."create_request.php?uid=".$userid."&call_id=".$callid);

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



///////////////////////////////////////////////////////////////////////////////////////
//*********************************** < Suno Abbu /> ********************************//
///////////////////////////////////////////////////////////////////////////////////////

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

	$options = array( 
	  array('type' => 'p', 'name' => "personality.wav "),
	  array('type' => 't' , 'name' => "trivia.wav "),
	);

	shuffle($options);

	$loop = true;
	while ($loop) {

		// $prompt =   $ReM_prompts."Test2mainprompt.wav ".
		// 			$ReM_prompts."raaye.wav ".$ReM_prompts."press3.wav ".
		// 			$ReM_prompts."wapis.wav ".$ReM_prompts."press4.wav ";

		$prompt =   $ReM_prompts.$options[0]["name"].$ReM_prompts."press1.wav ".
					$ReM_prompts.$options[1]["name"].$ReM_prompts."press2.wav ".
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
			if ($options[0]["type"] == "p") {
				ReMDBLog("Option:PersonalityQuiz", "0");
				ReMPQuizMenu();
			}else{
				ReMDBLog("Option:Trivia", "0");
				ReMTriviaMenu();
			}
			
			$loop = true;
		} else if ($result->value == "2"){
			if ($options[1]["type"] == "p") {
				ReMDBLog("Option:PersonalityQuiz", "0");
				ReMPQuizMenu();
			}else{
				ReMDBLog("Option:Trivia", "0");
				ReMTriviaMenu();
			}
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
		}else if ($result->value == "5"){
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
////////////////////////////////// Polly Game /////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
function PollyGameMsgDelivery(){
	// PHP requires all globals to be called like this from within all functions. Not using this was creating access problems.
	global $DB_dir;
	global $base_dir;
	global $scripts_dir;
	global $praat_dir;
	global $Country;
	global $SystemLanguage;
	global $MessageLanguage;
	global $Polly_prompts_dir;
	global $term;
	global $What_to_do3;
	global $logFilePath;
	global $fh;
	global $calltype;
	global $callid;
	global $oreqid;
	global $userid;	
	global $useridUnEnc;
	global $ouserid;
	global $recIDtoPlay;
	global $effectno;
	global $ocallid;
	global $BabaJobs;
	global $PGameCMBAge;
	global $AtWhatAgeDoJobsKickIn;
	global $AtWhatAgeDoesClearVoiceKickIn;
	global $ShutDown;
	global $channel;
	global $explicitSysLangOption;
	global $dlvRequestType;
	global $PBrowseCMBAge;
	
	pauseHere("TRUE");
	
	if($calltype == 'DelAlert'){
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Call Answered.");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing message for delivery alert.");
		
		$Name = $praat_dir."UserNames/".getFilePath($ocallid.".wav", "TRUE")."UserName-".$ocallid.".wav";
		
		sayInt($Polly_prompts_dir."Salaam.wav");
		sayInt($Name);
		sayInt($Polly_prompts_dir."delAlertMsg.wav");
		
		$status = "InProgress";
		updateCallStatus($callid, $status);
		$status = "fulfilled";
		updateRequestStatus($oreqid, $status);
		$status = "YD";
		updateFollowupStatus($oreqid, $status);
		Prehangup();
	}
	
	StartUpFn();

	if ($effectno == "23704330") {
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "SunoAbbu delivery.");
		SA_Delivery($recIDtoPlay);
		return;
	}
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing greetings for message delivery.");
		
	$Name = $praat_dir."UserNames/".getFilePath($ocallid.".wav", "TRUE")."UserName-".$ocallid.".wav";
	//$Name = $praat_dir."UserNames/UserName-".$ocallid.".wav";

	$promptType = "PGame Delivery Greetings";	
	$breakLoop = "FALSE";
	while($breakLoop == "FALSE"){
		$breakLoop = "TRUE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "About to listen to $promptType.");		
		$result = sayInt($Polly_prompts_dir."Greetings2.wav"."\n".$Name."\n".$Polly_prompts_dir."Hereitis.wav"."\n");
		$breakLoop = bargeInToChangeLang($result, $breakLoop);
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Finished listening to $promptType.");
	}
	
	//Say out the message: 
	$Path = $praat_dir."/ModifiedRecordings/".getFilePath($recIDtoPlay.".wav", "TRUE").$effectno."-s-".$recIDtoPlay.".wav";
	$repeat = "TRUE";
	$iter = 0;
	$playMsg = "TRUE";

	while($repeat == "TRUE"){
		if($playMsg == "TRUE"){
			if(!file_exists($Path)){
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "File cannot be found. Playing the prompt to wait.");
				sayInt($Polly_prompts_dir."Processingplzwait.wav");//"Processing. Please wait!";
				
				$reps = 0;
				while(!file_exists($Path) && $reps<20){
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing the clock as the user waits.");
						
					sayInt($Polly_prompts_dir."Processingplzwait.wav");//"Processing. Please wait!";
					sayInt($praat_dir."clock_fast.wav");
					$reps = $reps+1;
				}
			}
			else{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now playing the clock sound.");
				sayInt($praat_dir."clock_fast.wav");
			}

			$iter = $iter+1;
			
			$presult = sayInt($Path . "\n" . $Polly_prompts_dir. "sil500.wav");
			if ($presult->name == 'choice')
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$presult->value." to skip ".$Path.".");
			}
			
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Played the message.");
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now playing message related options.");
				
			$repeat = "FALSE";	// If no action taken then loop will break
		}
		$result = gatherInput($What_to_do3,
		array(
				"choices" => "[1 DIGITS], *",//Using the [1 DIGITS] to allow tracking wrong keys"rpt(1,rpt), fwd(2, fwd), cont(3,cont), feedback(8, feedback), quit(9, quit)", 
				"mode" => 'dtmf',
				"bargein" => true,
				"repeat" => 2,
				"timeout"=> 10,
				"onBadChoice" => "keysbadChoiceFCN",
				"onTimeout" => "keystimeOutFCN",
				"onHangup" => create_function("$event", "Prehangup()")
			)
		);
		// ***** These first two if's seem like a good idea. If they work as expected, add them to the rest of the places too
		if ($result->name == 'timeout' || $result->name == 'hangup') //User did not respond or call received by machine
		{
			// ***** do something here
		}
		else if ($result->name == 'badChoice')
		{
			// ***** do something here
		}
		else if ($result->name == 'choice')
		{
			if ($result->value == 9)//'Sender's Phone Number'
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Sender's Phone number).");
				
				sayInt($Polly_prompts_dir."senderPh.wav");	// The sender's phone number is:
				$occ = getCountryCode($ouserid);			// Sender's country code
				$oPhnoWoCC = substr($ouserid, strlen($occ));	// Sender's number wo country code
				
				$num12 = str_split($ouserid);//str_split($oPhnoWoCC);
				for($index1 = 0; $index1 < count($num12); $index1+=1)
				{
					$fileName = $num12[$index1].'.wav';
					$numpath = $Polly_prompts_dir.$fileName;
					sayInt($numpath);
				}
				$repeat = "TRUE";
				$playMsg = "FALSE";
				//sayInt($Polly_prompts_dir."Back-to-msg.wav");
			}
			else if ($result->value == 1)//'rpt'
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Repeat).");
				$repeat = "TRUE";
				$playMsg = "TRUE";
			}
			else if ($result->value==2)//'fwd'
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Forward).");
					
				$repeat = "TRUE";
				PollyGameScheduleMsgDelivery($callid, $recIDtoPlay, $userid, $effectno, $Path);
				//sayInt($Polly_prompts_dir."Forward_confirmation2.wav");
				$playMsg = "TRUE";
				//sayInt($Polly_prompts_dir."Back-to-msg.wav");
			}
			else if($result->value==3)//'reply'
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Reply).");
					
				$repeat = "TRUE";
				$reply = "TRUE";				
				PollyGameAnswerCall($callid, $reply);
				$playMsg = "TRUE";
				//sayInt($Polly_prompts_dir."Back-to-msg.wav");
			}
			else if($result->value==4)//'new'
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (New Recording).");
				
				$repeat = "TRUE";
				$reply = "FALSE";				
				PollyGameAnswerCall($callid, $reply);
				$playMsg = "TRUE";
				//sayInt($Polly_prompts_dir."Back-to-msg.wav");
			}
			else if($result->value==5 && ($PGameCMBAge >= $AtWhatAgeDoJobsKickIn))//'Jobs')
			{
				/*
				if($BabaJobs == 'true'){
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Polly Job Browser).");
					$explicitSysLangOption = "FALSE";
					$dlvRequestType = 'JDelivery';
					sayInt($Polly_prompts_dir."holdmusic.wav");
					/*if($PJobsCMBAge < 2){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Sending SMS to ".$userid." because the age of the user is ".$PBrowseCMBAge);
						schedSMS($userid, 'JDel');// Send a SMS to the receiver
					}*
					appendXferred('J');
					PollyJobsAnswerCall($callid, 'FALSE', 'FALSE');
					//PHLBrowseAnswerCall('FlipChart');
					//PHLVersionOneEntryPoint($callid, 'FALSE', 'FALSE');
						
					/*sayInt($Polly_prompts_dir."Processingplzwait.wav");
					if($Country == 'US'){
						callTransfer(array("sip:9990051311@sbc-external.orl.voxeo.net"), array(
						   "playvalue" => "http://www.phono.com/audio/holdmusic.mp3",
						   "terminator" => "*",
						   "onTimeout" => "timeoutFCNTr",
						   "onSuccess" => "successFCNTr",
							'headers' => array('pollycallid' => $callid)
						   )
						);
					}
					else if($Country == 'IN'){
						callTransfer(array("sip:9990067118@sbc-external.orl.voxeo.net"), array(
						   "playvalue" => "http://www.phono.com/audio/holdmusic.mp3",
						   "terminator" => "*",
						   "onTimeout" => "timeoutFCNTr",
						   "onSuccess" => "successFCNTr",
							'headers' => array('pollycallid' => $callid)
						   )
						);
					}
					else if($Country == 'IN-Hindi' || $Country == 'IN-Urdu'){
						callTransfer(array("sip:9991436553@sbc-external.orl.voxeo.net"), array(
						   "playvalue" => "http://www.phono.com/audio/holdmusic.mp3",
						   "terminator" => "*",
						   "onTimeout" => "timeoutFCNTr",
						   "onSuccess" => "successFCNTr",
							'headers' => array('pollycallid' => $callid)
						   )
						);
					}
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User returned from BabaJobs IVR.");
					*
				    }
				else{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (JMV).");
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Sending call back info to JMV.");
					$postVars = array(	'format' => 'json',
										'schedule_id'=>'137',
										'number'=>substr($useridUnEnc, 1, (strlen($useridUnEnc)-1)),
										'delay'=>'30',
										'username'=>'polly',
										'api_key'=>'ae0fb787aab937939414121afae2533c19cfa87c');
					$PostResult = doCurlPost("http://voice.gramvaani.org/vapp/api/v1/schedule/run/", http_build_query($postVars));					
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Information sent to JMV. JMV returned: ".$PostResult);
					$RequestID = makeNewReq('0', '0', $callid, "CMBJMV", $userid, "Sent", $SystemLanguage, $MessageLanguage, $channel);	// Create a request

					sayInt($Polly_prompts_dir."thanksdc.wav");//"Thanks for calling. Polly will disconnect now. You will get a call back from jmv shortly. You can call Polly again by calling xxxxx"
					Prehangup();
				}
				*/
				//sayInt($Polly_prompts_dir."Back-to-msg.wav");
				
				$playMsg = "TRUE";
				$repeat = "TRUE";
				if($count == 4){
					$count = -1;
				}
				continue;
			}
			else{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (wrong key).");
				$repeat = "TRUE";
				sayInt($Polly_prompts_dir."Wrongbutton.wav");
				$playMsg = "FALSE";
			}
		}
		else{
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");
			sayInt($Polly_prompts_dir."Nobutton.wav");
			$repeat = "FALSE";
			$playMsg = "FALSE";
		}
	}// end of main while loop while($repeat == "TRUE")
	sayInt($Polly_prompts_dir."ContactDetails.wav");
	sayInt($Polly_prompts_dir."Bye.wav");//"Thanks for calling. Good Bye."
	Prehangup();
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Hanging up.");
}// end PollyGameMsgDelivery()


function superMenu(){
	global $NumTransPG2Baang;
	global $Polly_prompts_dir;
	global $callid;
	global $scripts_dir;
	global $term;
	global $helloRozgarCallBackAPI;
	global $useridUnEnc;
	global $userid;

	 global $SystemLanguage;
	 global $MessageLanguage;
	 global  $Pollyid;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Offering Mehfil Super Menu.");
	
	sayInt($Polly_prompts_dir."SalaamMehfil.wav");
	
	$mehfilMenu = $Polly_prompts_dir."SM-01.wav"."\n".$Polly_prompts_dir."SM-02.wav";//."\n".$Polly_prompts_dir."SM-03.wav"."\n".$Polly_prompts_dir."SM-04.wav"."\n".$Polly_prompts_dir."SM-07.wav"."\n".$Polly_prompts_dir."SM-08.wav";		 
	
	$repeat = "TRUE";
	while($repeat == "TRUE"){
		$repeat = "FALSE";
		$result = gatherInput($mehfilMenu,
				array(
						"choices" => "[1 DIGITS], *",
						"mode" => 'dtmf',
						"bargein" => true,
						"repeat" => 1,
						"timeout"=> 10,
						"onBadChoice" => "keysbadChoiceFCN",
						"onTimeout" => "keystimeOutFCN",
						"onHangup" => create_function("$event", "Prehangup()")
					)
				);
		if ($result->name == 'choice'){
			if ($result->value == 1){		//'Mian Mithoo')
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Mian Mithoo).");				
				$explicitSysLangOption = "FALSE";
				$dlvRequestType = 'Delivery';
				//appendXferred('SG');
				//makeNewTransferLog($callid, $userid, 'transfer', 'PG', 'PG', 'PG-CMB-SM');				
				return;
			}
			else if ($result->value==2){		//'Baang')
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Number of transfers from PG to Baang today: " . $NumTransPG2Baang);
				//if($NumTransPG2Baang <=2){
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Baang).");				
					$explicitSysLangOption = "FALSE";
					$dlvRequestType = 'Delivery';
					$requestType="BNGCall-me-back";
					$reqid = createMissedCall('0', '0', $callid, $requestType, $userid, "Pending", $SystemLanguage, $MessageLanguage, "WateenE1", $Pollyid);
					sayInt("D:\xampp\htdocs\wa\prompts\call-kerny-ka-shukriya.wav");
					Prehangup();
					exit(0);
				//	appendXferred('SBN');
				//	makeNewTransferLog($callid, $userid, 'transfer', 'PG', 'BAANG', 'PG-CMB-SM');
				//	$reply = "FALSE";
				//	Baangfunction($callid, $reply);
				//}
				//else{
				//	sayInt($Polly_prompts_dir."AlreadyCalledBaangXTimesToday.wav");			
				//	$repeat = "TRUE";
				//}
			}/*
			else if ($result->value==3){		//'JAB')
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (JAB).");				
				$explicitSysLangOption = "FALSE";
				$dlvRequestType = 'JDelivery';
				sayInt($Polly_prompts_dir."holdmusic.wav");
				appendXferred('J');
				makeNewTransferLog($callid, $userid, 'transfer', 'PG', 'JAB', 'PG-CMB-SM');
				PollyJobsAnswerCall($callid, 'FALSE', 'FALSE');					
			}
			else if ($result->value==4){		//'Hello Rozgar')
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (HR).");				
				$explicitSysLangOption = "FALSE";
				$dlvRequestType = 'Delivery';
				sayInt($Polly_prompts_dir."holdmusic.wav");
				doCurl($helloRozgarCallBackAPI.$useridUnEnc);
				appendXferred('HR');
				makeNewTransferLog($callid, $userid, 'transfer', 'PG', 'HR', 'PG-CMB-SM');
				sayInt($Polly_prompts_dir."DCHRwillCallYou.wav");							 
				Prehangup();
			}
			else if ($result->value==7){		//'Report Problems')
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Report Problems).");				
				makeNewTransferLog($callid, $userid, 'transfer', 'PG', 'RP', 'PG-CMB-SM');
				
				$fbtype = "ProbRep";
				$fbid = makeNewFB($fbtype, $callid);
				$feedBack = recordAudio($Polly_prompts_dir."RecordyourProblem.wav",			
						array(
							"beep" => true, "timeout" => 600.0, "silenceTimeout" => 4.0, "maxTime" => 60, "bargein" => false, "terminator" => $term,
							"recordURI" => $scripts_dir."process_feedback.php?fbid=$fbid&fbtype=$fbtype",
							"format" => "audio/wav",
							"onHangup" => create_function("$event", "Prehangup()")
							)
						);
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Problem Report Recording Complete. Result: ".$feedBack);
				sayInt($Polly_prompts_dir."ThanksforReportingProblem.wav");					
				
				$repeat = "TRUE";
			}
			else if ($result->value==8){		//'Report News')
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Report News).");				
				makeNewTransferLog($callid, $userid, 'transfer', 'PG', 'RN', 'PG-CMB-SM');
				
				$fbtype = "NewsRep";
				$fbid = makeNewFB($fbtype, $callid);
				$feedBack = recordAudio($Polly_prompts_dir."RecordyourNews.wav",			
						array(
							"beep" => true, "timeout" => 600.0, "silenceTimeout" => 4.0, "maxTime" => 60, "bargein" => false, "terminator" => $term,
							"recordURI" => $scripts_dir."process_feedback.php?fbid=$fbid&fbtype=$fbtype",
							"format" => "audio/wav",
							"onHangup" => create_function("$event", "Prehangup()")
							)
						);
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "News Report Recording Complete. Result: ".$feedBack);
				sayInt($Polly_prompts_dir."ThanksforReportingNews.wav");					
			
				$repeat = "TRUE";
			}*/
			else{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (wrong key).");
				sayInt($Polly_prompts_dir."Wrongbutton.wav");
				$repeat = "TRUE";
			}
		}
		else{
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");
			//sayInt($Polly_prompts_dir."Nobutton.wav");
		}
	}	
}// superMenu


function PollyGameAnswerCall($callid, $reply)//PollyGameAnswerCall()
{
	// PHP requires all globals to be called like this from within all functions. Not using this was creating access problems.
	global $DB_dir;
	global $base_dir;
	global $scripts_dir;
	global $praat_dir;
	global $Country;
	global $SystemLanguage;
	global $MessageLanguage;
	global $Polly_prompts_dir;
	global $term;
	global $playInformedConsent;
	global $Ask_for_forwarding2;
	global $logFilePath;
	global $fh;
	global $calltype;
	global $callid;
	global $oreqid;
	global $userid;
	global $TreatmentGroup;
	global $Q;
	global $useridUnEnc;
	global $checkForQuota;
	global $BabaJobs;
	global $recID;
	global $PGameCMBAge;
	global $AtWhatAgeDoJobsKickIn;
	global $AtWhatAgeDoesFBKickIn;
	global $AtWhatAgeDoesClearVoiceKickIn;
	global $ShutDown;
	global $channel;
	global $explicitSysLangOption;
	global $dlvRequestType;
	global $PBrowseCMBAge;
	global $testerpolly;
	global $apnay_banday;
	
	//fwrite($testerpolly, "reply value:".$reply."\n");
	pauseHere("TRUE");
	
	$firstEnc = "False";
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Inside PollyGameAnswerCall(). Calltype: ".$calltype);
		StartUpFn();
	
	//if($calltype == 'Call-me-back' || $calltype == 'SystemMessage' || $calltype == 'UnsubsidizedG'){
		//StartUpFn();
		//if($PGameCMBAge > 1){						// && $userid == "1776"
			//superMenu();
		//}
	//}
	
	if($checkForQuota == "true"){
		$TreatmentGroup = getTG($userid);		// Treatment Group of this guy (if any), 1000 otherwise
		if($calltype == 'Call-me-back' && /*getLastPlayedOn($TreatmentGroup)!='Today' &&*/ $TreatmentGroup != 1000){
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "About to decide whether to play quota prompt or not.");
			$AgeToday = getAgeToday($userid)+1; // e.g. 1 means this is his first call as the record of this CMB is in the DB but as "InProgress" not as "Answered".
			//$AgeinDays = getAgeinDays($userid); // 0 means this is the first day as we exclude today from the calculation
			$IsQuotaApplicable = IsQuotaApplicable($userid, $TreatmentGroup);	// "yes" if it is, "no" if it is not
			//$Dk = getTGxD($userid, $TreatmentGroup);
			if(($AgeToday >= $TreatmentGroup+1) && ($IsQuotaApplicable == 'yes')){	// e.g. if $Q==3, we play this on his 4th call-me-back
				if(hasThisGuyEverHeardQuota($userid, $TreatmentGroup) == 'yes'){	// If this guy has ever heard the complete quota announcement
					setLastPlayedOn($TreatmentGroup);								// then mark him as heard for today even if he hangs up midway in this announcement
					sayInt($Polly_prompts_dir."Quota2.wav");//checking from here
					
					sendUnSubSMS($useridUnEnc);	// changed $userid to $useridUnEnc
					
					Prehangup();			
				}
				else{
					sayInt($Polly_prompts_dir."Quota2.wav");
					setLastPlayedOn($TreatmentGroup);
					
					sendUnSubSMS($useridUnEnc);	// changed $userid to $useridUnEnc
					
					Prehangup();
				}
			}
		}
	}
	
	if($calltype != 'Delivery' && $calltype != 'USDelivery'){		
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing Greetings");
		
		if($ShutDown == "true"){
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "System is in ShutDown Mode. Now playing Good Bye message and asking for last feedback.");
			$fbtype = "GBye";
			$fbid = makeNewFB($fbtype, $callid);
			$feedBack = recordAudio($Polly_prompts_dir."goodBye.wav",//""
					array(
						"beep" => true, "timeout" => 600.0, "silenceTimeout" => 4.0, "maxTime" => 60, "bargein" => false, "terminator" => $term,
						"recordURI" => $scripts_dir."process_feedback.php?fbid=$fbid&fbtype=$fbtype",
						"format" => "audio/wav",
						"onHangup" => create_function("$event", "Prehangup()")
						)
					);
			setHeardBye($userid);
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Good Bye prompt and feedback complete.  Result: " . $feedBack . "Now saying Good Bye.");
			Prehangup();
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Hanging up.");
		}
		

		if($calltype == 'SystemMessage'){
			$promptType = "PGame System Message Greetings";	
			$breakLoop = "FALSE";
			while($breakLoop == "FALSE"){
				$breakLoop = "TRUE";
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "About to listen to $promptType.");
				$result = sayInt($Polly_prompts_dir."Salaam.wav\n".$Polly_prompts_dir."Greetings.wav\n");
				$breakLoop = bargeInToChangeLang($result, $breakLoop);
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Finished listening to $promptType.");
			}
			
			$firstEnc = "True";
			schedSMS($userid, 'Del');// Send a SMS to the receiver
		}
		else{
			$promptType = "PGame Greetings";	
			$breakLoop = "FALSE";
			while($breakLoop == "FALSE"){
				$breakLoop = "TRUE";
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "About to listen to $promptType.");
				/*if($PGameCMBAge == 0){
					$result = sayInt($Polly_prompts_dir."Polly-intro.wav\n".$Polly_prompts_dir."sil500.wav\n".$Polly_prompts_dir."Branding-message-SMS.wav\n");
				}
				else{
					$result = sayInt($Polly_prompts_dir."Salaam.wav"."\n".$Polly_prompts_dir."sil1000.wav\n".$Polly_prompts_dir."Greetings.wav"."\n");
				}*/

				//if($userid == "03239754007" or $userid == "3566"){
				if(in_array($userid, $apnay_banday)){
					// if (getMsgSurveyFlag()) 
					// 	playInfoMessage();	
					// else 
					//userDemographicSurvey();
					//ReMMenuT2();
					SA_Menu();
				}

				//sayInt($Polly_prompts_dir."polly-relaunch.wav");

				$result = sayInt($Polly_prompts_dir."Salaam.wav"." ".$Polly_prompts_dir."sil1000.wav ".$Polly_prompts_dir."Greetings.wav");
				$breakLoop = bargeInToChangeLang($result, $breakLoop);
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Finished listening to $promptType.");
			}			
		}
	}
	
	selectMainPrompt($reply, 1);
	if($calltype != 'SystemMessage' && $playInformedConsent == "TRUE" /*&& $PGameCMBAge == 0*/){
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now playing Informed consent.");
		sayInt($Polly_prompts_dir."InformedConsent.wav");
		$playInformedConsent = "FALSE";							// Play informed consent only once in each call
	}
	

	$recid = makeNewRec($callid);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Assigned Recording ID ".$recid);

		// For doing a rerecording
	$rerecordAllowed = 1; // Rerecord allowed in this call

     	$rerecord = "TRUE";
	while($rerecord == "TRUE"){
		$rerecord = "FALSE";

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Prompting the user to speak");
		
		/*$tempPrompt_for_speaking = $Prompt_for_speaking;
		if($calltype == 'SystemMessage' && $firstEnc == "True"){
			$Prompt_for_speaking = "Silence.wav";
		}*/
		if($PGameCMBAge < 0){
			$promptTheUserToSpeak = $Polly_prompts_dir."Polly-intro-2.wav\n" . $Polly_prompts_dir."sil500.wav\n" . $Polly_prompts_dir."Ready-here-goes.wav\n";
		}
		else{
			$promptTheUserToSpeak = $Polly_prompts_dir."Promptforspeaking.wav";
		}

			global $tester;
     	////fwrite($tester,$recid." recid  .\n");
		$result = recordAudio($promptTheUserToSpeak,		//"Just say something after the beep and Press # when done."
					array(
						"beep" => true, "timeout" => 600, "silenceTimeout" => 3, "maxTime" => 30, "bargein" => false, "terminator" => $term,
						"recordURI" => $scripts_dir."process_recording.php?recid=$recid",
						"format" => "audio/wav",
						//"onTimeout" => create_function("$event", 'sayInt("timeout");'),
						//"onRecord" => create_function("$event", 'sayInt("Record");'),
						//"onEvent" => create_function("$event", 'sayInt("Event is $event->name");'),
						"onHangup" => create_function("$event", "Prehangup()")
						)
					);
		////fwrite($tester," recorded  .\n");
		/*if($calltype == 'SystemMessage' && $firstEnc == "True"){
			$firstEnc = "False";
			$Prompt_for_speaking = $tempPrompt_for_speaking;
		}*/
		
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Recording Complete. Result: ".$result);
				
		$filePath = $praat_dir;	
		$fileNames[0] = "99-s";
		$fileNames[1] = "0-s";
		$fileNames[2] = "1-s";
		$fileNames[3] = "2-s";
		$fileNames[4] = "3-s";
		$fileNames[5] = "4-s";
		$fileNames[6] = "5-s";
		$fileNames[7] = "6-s";
		$fileNames[8] = "7-s";
		$fileNames[9] = "HIs";
		$fileNames[10] = "LOs";
		$fileNames[11] = "RVSs";
		$fileNames[12] = "BKMUZWHs";
		
		$Path = "";
		$repeat = "TRUE";

		if (!firstCall() && !$MsgSurveyDone){
			if (getMsgSurveyFlag()) 
				playInfoMessage();	
			else 
				UserDemographicSurvey();
			$MsgSurveyDone = true;
		}

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Prompting the user to get ready for effects.");
		sayInt($Polly_prompts_dir."Readyforeffects.wav");//"Now get ready for the effects... Here it goes!!!"
		
		$NumOfEffects = 7;
		for($count = 0; $count <= $NumOfEffects && $repeat == "TRUE"; $count+=1)
		{
			$audioFileName = $fileNames[$count]."-".$recid.".wav";
			$Path = $filePath . "ModifiedRecordings/" . getFilePath($recid.".wav", "TRUE") . $audioFileName;
			
			$reps = 0;
			//while((doesFileExist($audioFileName)=="0") && ($reps < 2)){
			while((doesFileExist($audioFileName)=="0")){
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing the clock as the user waits.");
				//sayInt($Polly_prompts_dir."Processingplzwait.wav");//"Processing. Please wait!";
				sayInt($praat_dir."clock_fast.wav");
				$reps = $reps+1;
			}
			sayInt($praat_dir."clock_fast.wav");
		
			$presult = sayInt($Path . "\n" . $Polly_prompts_dir. "sil500.wav");
			if ($presult->name == 'choice')
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$presult->value." to skip ".$Path.".");
			}
		
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Played effect number: ".$count);
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now playing effect related options.");
			$repeat = "FALSE";	// If not action taken then loop will break
			////fwrite($tester," about to call gather  .\n");
			$result = gatherInput($Ask_for_forwarding2,//"To Repeat, press one. To send to a friend, press two. To try another effect, press three",
			array(
					"choices" => "[1 DIGITS], *",//Using the [1 DIGITS], * to allow tracking wrong keys"rpt(1,rpt), fwd(2, fwd), cont(3,cont), feedback(8, feedback), quit(9, quit)", 
					"mode" => 'dtmf',
					"bargein" => true,
					"repeat" => 2,
					"timeout"=> 10,
					"onBadChoice" => "keysbadChoiceFCN",
					"onTimeout" => "keystimeOutFCN",
					"onHangup" => create_function("$event", "Prehangup()")
				)
			);
			if ($result->name == 'choice'){
				if ($result->value == 1)//'rpt')
				{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Repeat).");
					$repeat = "TRUE";
					$count = $count - 1;
					////fwrite($tester,"User pressed ".$result->value." (Repeat). gather result press 1  .\n");
				}
				else if ($result->value==2)//'fwd')
				{
					//fwrite($testerpolly, "i pressed 2 with reply".$reply."\n");

					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Forward).");
					//////////////////////////
					$rerecordAllowed = 0;	// Can't rerecord in this call anymore
					selectMainPrompt($reply, 0);
					//////////////////////////
					if($reply == "FALSE"){
						$repeat = "TRUE";
						PollyGameScheduleMsgDelivery($callid,$recid, $userid, $count, $Path);
						//fwrite($testerpolly, "i pressed 2 in FALSE \n");
					//sayInt($Polly_prompts_dir."Forward_confirmation.wav");
					}
					else if($reply == "TRUE"){
						$repeat = "FALSE";
						PollyGameScheduleMsgReply($callid,$recid, $userid, $count, $Path);
						//fwrite($testerpolly, "i pressed 2 in TRUE \n");
						//sayInt($Polly_prompts_dir."Forward_confirmation2.wav");
					}
					////fwrite($tester,"User pressed ".$result->value." (Repeat). gather result press 2  .\n");
					//sayInt($Polly_prompts_dir."Back-to-msg.wav");
				}
				else if($result->value==3)//'cont')
				{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Next).");
					////fwrite($tester,"User pressed ".$result->value." (Next). gather result press 1  .\n");
					$repeat = "TRUE";
					if($count == $NumOfEffects){
						$count = -1;
					}
					continue;
				}
				else if ($result->value==4 && ($PGameCMBAge >= $AtWhatAgeDoesClearVoiceKickIn))//'fwd' clear voice)
				{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Forward using unmodified voice).");
					//////////////////////////
					$rerecordAllowed = 0;	// Can't rerecord in this call anymore
					selectMainPrompt($reply, 0);
					//////////////////////////
					if($reply == "FALSE"){
						$repeat = "TRUE";
						PollyGameScheduleMsgDelivery($callid,$recid, $userid, 99, $Path);	// number 4 is the unmodified voice
						//sayInt($Polly_prompts_dir."Forward_confirmation.wav");
					}
					else if($reply == "TRUE"){
						$repeat = "FALSE";
						PollyGameScheduleMsgReply($callid,$recid, $userid, 99, $Path);	// number 4 is the unmodified voice
						//sayInt($Polly_prompts_dir."Forward_confirmation2.wav");
					}
					//sayInt($Polly_prompts_dir."Back-to-msg.wav");
				}
				else if($result->value==5)//'ReM Hook')
				{	
					//if(in_array($userid, $apnay_banday))
					{
						//ReMDBLog("ReMT2-Entered-Via-Hook", $count);
						//ReMMenuT2();
						SA_Menu();
						$repeat = "TRUE";
					}
					
				}
				
				else if($result->value==5 && ($PGameCMBAge >= $AtWhatAgeDoJobsKickIn))//'Jobs')
				{		

					/*				
					if($BabaJobs == 'true'){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Polly Jobs Browser).");
						$explicitSysLangOption = "FALSE";
						$dlvRequestType = 'JDelivery';
						//sayInt($Polly_prompts_dir."holdmusic.wav");
						/*if($PJobsCMBAge < 2){
							writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Sending SMS to ".$userid." because the age of the user is ".$PBrowseCMBAge);
							schedSMS($userid, 'JDel');// Send a SMS to the receiver
						}	*		
						appendXferred('J');
						PollyJobsAnswerCall($callid, 'FALSE', 'FALSE');	//PHLBrowseAnswerCall('FlipChart');
						//PHLVersionOneEntryPoint($callid, 'FALSE', 'FALSE');
						/*sayInt($Polly_prompts_dir."Processingplzwait.wav");
						if($Country == 'US'){
							callTransfer(array("sip:9990051311@sbc-external.orl.voxeo.net"), array(
							   "playvalue" => "http://www.phono.com/audio/holdmusic.mp3",
							   "terminator" => "*",
							   "onTimeout" => "timeoutFCNTr",
							   "onSuccess" => "successFCNTr",
								'headers' => array('pollycallid' => $callid)
							   )
							);
						}
						else if($Country == 'IN'){
							callTransfer(array("sip:9990067118@sbc-external.orl.voxeo.net"), array(
							   "playvalue" => "http://www.phono.com/audio/holdmusic.mp3",
							   "terminator" => "*",
							   "onTimeout" => "timeoutFCNTr",
							   "onSuccess" => "successFCNTr",
								'headers' => array('pollycallid' => $callid)
							   )
							);
						} 
						else if($Country == 'IN-Hindi' || $Country == 'IN-Urdu'){
							callTransfer(array("sip:9991436553@sbc-external.orl.voxeo.net"), array(
							   "playvalue" => "http://www.phono.com/audio/holdmusic.mp3",
							   "terminator" => "*",
							   "onTimeout" => "timeoutFCNTr",
							   "onSuccess" => "successFCNTr",
								'headers' => array('pollycallid' => $callid)
							   )
							);
						}
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User returned from BabaJobs IVR.");
						*
					}
					else{
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (JMV).");
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Sending call back info to JMV.");
						$postVars = array(	'format' => 'json',
											'schedule_id'=>'137',
											'number'=>substr($useridUnEnc, 1, (strlen($useridUnEnc)-1)),
											'delay'=>'30',
											'username'=>'polly',
											'api_key'=>'ae0fb787aab937939414121afae2533c19cfa87c');
						$PostResult = doCurlPost("http://voice.gramvaani.org/vapp/api/v1/schedule/run/", http_build_query($postVars));					
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Information sent to JMV. JMV returned: ".$PostResult);
						$RequestID = makeNewReq('0', '0', $callid, "CMBJMV", $userid, "Sent", $SystemLanguage, $MessageLanguage, $channel);	// Create a request

						sayInt($Polly_prompts_dir."thanksdc.wav");//"Thanks for calling. Polly will disconnect now. You will get a call back from jmv shortly. You can call Polly again by calling xxxxx"
						Prehangup();
					}
					
					*/
					$repeat = "TRUE";
					if($count == $NumOfEffects){
						$count = -1;
					}
					continue;
				}
				else if($result->value==8)//'feedback')
				{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Feedback).");
					$fbtype = "UInit";
					$fbid = makeNewFB($fbtype, $callid);
					$repeat = "TRUE";
					$feedBack = recordAudio($Polly_prompts_dir."Recordyourfeedback.wav",//""
							array(
								"beep" => true, "timeout" => 600.0, "silenceTimeout" => 4.0, "maxTime" => 60, "bargein" => false, "terminator" => $term,
								"recordURI" => $scripts_dir."process_feedback.php?fbid=$fbid&fbtype=$fbtype",
								"format" => "audio/wav",
								"onHangup" => create_function("$event", "Prehangup()")
								)
							);
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Feedback Recording Complete. Result: ".$feedBack);
					sayInt($Polly_prompts_dir."ThanksforFeedback.wav");
					$count = $count - 1;
					//sayInt($Polly_prompts_dir."Back-to-msg.wav");
				}
				else if ($result->value==0 && $rerecordAllowed == 1)//'rerecord')
				{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Rerecord).");
					$repeat = "FALSE";
					$rerecord = "TRUE";
				}
				else
				{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (wrong key).");
					$repeat = "TRUE";
					sayInt($Polly_prompts_dir."Wrongbutton.wav");
					$count = $count - 1;// Dealing with bad choices as repeats.
					//sayInt($Polly_prompts_dir."Back-to-msg.wav");
				}
			}
			else
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");
				sayInt($Polly_prompts_dir."Nobutton.wav");
				$repeat = "FALSE";
			}
			if($count == $NumOfEffects)
			{
				$count = -1;
			}
		}//Continue in for loop: play next effect
	}// Only loop this loop if the user want to rerecord
	if($reply != "TRUE"){// If this function was being used to record a reply then don't hangup from here
		sayInt($Polly_prompts_dir."Bye.wav");//"Thanks for calling. Good Bye."
		Prehangup();
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Hanging up.");
	}
}// end PollyGameAnswerCall() function

function PollyGameScheduleMsgDelivery($callid, $recid, $telNumber, $count, $songpath){	
	// PHP requires all globals to be called like this from within all functions. Not using this was creating access problems.
	global $DB_dir;
	global $base_dir;
	global $scripts_dir;
	global $praat_dir;
	global $Country;
	global $countryCode;
	global $SystemLanguage;
	global $MessageLanguage;
	global $Polly_prompts_dir;
	global $term;
	global $dlvRequestType;
	global $AlreadygivenFeedback;
	global $fh;
	global $calltype;
	global $userid;
	global $AlreadyHeardJobs;
	global $callerPaidDel;
	global $useridUnEnc;
	global $PGameCMBAge;
	global $PhDirEnabled;
	global $channel;
	global $hasTheUserRecordedAName;
	global $oreqid;
	global $WaitWhileTheUserSearchesForPhNo;
	
	global $testerpolly;


	$numOfDigs = "[11-12 DIGITS]";
	if($countryCode == "224"){
		$numOfDigs = "[9 DIGITS]";
	}
	
	//$action = sayInt($Polly_prompts_dir."EHL-fwd-1.wav");//"We will now forward the message to a phone number of your choice."

	//Prompt for friends' numbers
	$FriendsNumber = 'true';
	$numNewRequests = 1;
	$retryNumEntry = "false";
	while($FriendsNumber != 'false')
	{
		//fwrite($testerpolly, "in while loop 1\n");
		$phoneNumChosen = "None";
		$phoneNumber = "";
		$NoOfEntriesInDir = 0;
		$NewNumberEntered = "true";
		if($PhDirEnabled == "true" && $retryNumEntry == "false"){	// Is Phone directory feature enabled? AND this is not a retry of number entry?
			//fwrite($testerpolly, "in if  1\n");
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Phone Directory feature is enabled.");
			$PhDir = getPhDir();
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Current Phone Directory: ".$PhDir);
			$entries = explode("-", $PhDir);
			$NoOfEntriesInDir = count($entries)-1;
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Number of directory entries: ".$NoOfEntriesInDir);
			if($NoOfEntriesInDir > 0){	// there are entries in the Phone Directory for this user
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now Giving option to select a directory entry.");
				//fwrite($testerpolly, "in if 1-1\n");

				// This is the Phone Number Directory
				// Create the prompt here
				$DirPrompt = "";
				for($j=1; $j < ($NoOfEntriesInDir+1); $j++){
					if($Country == 'US'){
						$DirPrompt = $DirPrompt . "\n" . $Polly_prompts_dir . "For.wav";
					}
					$DirPrompt = $DirPrompt . "\n" . $praat_dir . "FriendNames/".getFilePath($userid.".wav", "TRUE") . $userid . "-" . $entries[$j] . ".wav";
					if($Country == 'PK'){
						$DirPrompt = $DirPrompt . "\n" . $Polly_prompts_dir . "For.wav";
					}
					$DirPrompt = $DirPrompt . "\n" . $Polly_prompts_dir . "SendTo" . $j . ".wav";

				}

				$DirPrompt = $DirPrompt . "\n" . $Polly_prompts_dir."NewNumber.wav";
				//fwrite($testerpolly, $DirPrompt."\n");
				// Give the choice to enter a new number (0) or choose a number from the list
				$Choice = gatherInput($DirPrompt,
				array(
					"choices"=> "[1 DIGITS], *",
					"mode" => 'dtmf',
					"bargein" => true,
					"attempts" => 2,
					"onBadChoice" => "keysbadChoiceFCN",
					"onTimeout" => "keystimeOutFCN",
					"timeout"=> 7,
					"onHangup" => create_function("$event", "Prehangup()")
					)
				);
				if($Choice->name == 'choice'){	// otherwise the user will be asked to enter a number.
					if($Choice->value == 0){	// Enter new number
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$Choice->value." (Enter a number manually).");
						// do nothing, as $NewNumberEntered is already true, so the user will be asked to enter a number
					}
					else if($NoOfEntriesInDir >= $Choice->value){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$Choice->value." (".$entries[$Choice->value].").");
						$phoneNumber = $entries[$Choice->value];
						$NewNumberEntered = "false";
						$phoneNumChosen = "choice";
						updatePhDir($phoneNumber);
					}
					else{
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$Choice->value." (wrong key).");
						sayInt($Polly_prompts_dir."Wrongbutton.wav");
					}
				}
				else{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");					
				}
			}			
		}
		
		if($NoOfEntriesInDir == 0 || $NewNumberEntered == "true" || $retryNumEntry == "true"){
			//fwrite($testerpolly, "in if 2\n");
			$breakLoop = "TRUE";
			if($WaitWhileTheUserSearchesForPhNo == "TRUE"){
				$breakLoop = "FALSE";
			}
			$loopTries = 0;
			$op1 = "TRUE";
			$op2 = "FALSE";
			while($breakLoop == "FALSE" && $loopTries < 3){
				if($op1 == "TRUE"){	
					//fwrite($testerpolly, "in while loop 2\n");
					$action = gatherInput($Polly_prompts_dir."EHL-fwd-2.wav", array("choices" => "[1 DIGITS], *", "mode" => 'dtmf', "bargein" => true, "repeat" => 1, "timeout"=> 15, "onHangup" => create_function("$event", "Prehangup()")));//"Whenever you are ready to enter the phone number, press 1."
				}
				else if($op2 == "TRUE"){
					//fwrite($testerpolly, "in while loop 1\n");
					$action = gatherInput($Polly_prompts_dir."EHL-fwd-2.wav\n".$Polly_prompts_dir."EHL-fwd-4-nopress.wav\n".$Polly_prompts_dir."SendTo2.wav\n", array("choices" => "[1 DIGITS], *", "mode" => 'dtmf', "bargein" => true, "repeat" => 9, "timeout"=> 20, "onHangup" => create_function("$event", "Prehangup()")));//"Whenever you are ready to enter the phone number, press 1."
				}
				if($action->name != 'choice'){
					if($op1 == "TRUE"){	
						$op1 = "FALSE";
						$op2 = "TRUE";
					}
					else if($op2 == "TRUE"){
						$breakLoop = "TRUE";
						return ($numNewRequests-1);
					}
				}
				else if($action->value == 1){
					$breakLoop = "TRUE";
				}
				else if($action->value == 2){
					$breakLoop = "TRUE";
					return "FALSE";
				}
				else if($loopTries < 2){
					//sayInt("No problem!");
					//do nothing
				}
				else{
					return ($numNewRequests-1);
				}
				$loopTries++;
			}
			$retryNumEntry = "false";
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now getting friend's phone number for request number".$numNewRequests.".");
			//fwrite($testerpolly, "asking for number\n");
			$NumberList = gatherInput($Polly_prompts_dir."FriendnopromptWOHash.wav",//"Please enter the phone number of your friend followed by the pound key",
				array(
					"choices"=>$numOfDigs,
					"mode" => 'dtmf',
					"bargein" => true,
					"attempts" => 3,
					"timeout"=> 30,
					"interdigitTimeout"=> 20,
					"onBadChoice" => "keysbadChoiceFCN",
					"onTimeout" => "keystimeOutFCN",
					"terminator" => $term,
					"onHangup" => create_function("$event", "Prehangup()")
					)
				);
			if($NumberList->name == 'choice'){	
				sayInt($Polly_prompts_dir."Friendnorepeat.wav");				//here is the number you entered
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Friend's phone number entered: ".$NumberList->value.". Now playing it.");
				//fwrite($testerpolly, "now playing\n");

				$num12 = str_split($NumberList->value);
				for($index1 = 0; $index1 < count($num12); $index1+=1)
				{
					if($index1 == 0){
						$fileName = $num12[$index1].'.wav';
						$numpath = $Polly_prompts_dir.$fileName;
					}
					else{
						$fileName = $num12[$index1].'.wav';
						$numpath = $numpath . "\n" . $Polly_prompts_dir.$fileName;
					}
				}
				$presult = sayInt($numpath);
				if ($presult->name == 'choice')
				{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$presult->value." to skip ".$numpath.".");
				}
			}
			else{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Timed out. No number entered. Now hanging up.");		
					sayInt($Polly_prompts_dir."Bye.wav");//"Thanks for calling. Good Bye."
					$FriendsNumber = 'false';
					Prehangup();
			}
			
			if($FriendsNumber != 'false'){		
				// Number Confirmation
				$WrongButtonPressed = 'TRUE';
				while($WrongButtonPressed == 'TRUE'){
					$WrongButtonPressed = 'FALSE';
					$NumCorrect = gatherInput($Polly_prompts_dir."Numberconfirm.wav",//"If this is correct, press one, otherwise, press two",
						array(
							"choices"=> "[1 DIGITS], *",
							"mode" => 'dtmf',
							"bargein" => true,
							"attempts" => 2,
							"onBadChoice" => "keysbadChoiceFCN",
							"onTimeout" => "keystimeOutFCN",
							"timeout"=> 10,
							"onHangup" => create_function("$event", "Prehangup()")
							)
						);
					if($NumCorrect->name == 'choice' && $NumCorrect->value != 1 && $NumCorrect->value != 2){	// Wrong button
						$WrongButtonPressed = 'TRUE';
						sayInt($Polly_prompts_dir."Wrongbutton.wav");
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed a wrong key: ".$NumCorrect->value);
						// Repeat the phone number
						sayInt($Polly_prompts_dir."Friendnorepeat.wav");				//here is the number you entered
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Friend's phone number entered: ".$NumberList->value.". Now playing it again.");
							
						$num12 = str_split($NumberList->value);
						for($index1 = 0; $index1 < count($num12); $index1+=1)
						{
							if($index1 == 0){
								$fileName = $num12[$index1].'.wav';
								$numpath = $Polly_prompts_dir.$fileName;
							}
							else{
								$fileName = $num12[$index1].'.wav';
								$numpath = $numpath . "\n" . $Polly_prompts_dir.$fileName;
							}
						}
						$presult = sayInt($numpath);
						if ($presult->name == 'choice')
						{
							writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$presult->value." to skip ".$numpath.".");
						}
					}
				}
				
				if($NumCorrect->name == 'choice'){
					if($NumCorrect->value == 1){//correct
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User Confirmed the number by pressing:".$NumCorrect->value);
						$phoneNumChosen = $NumberList->name;
						$phoneNumber = $NumberList->value;
						$NewNumberEntered = "true";		
						//fwrite($testerpolly, "numberlistname: ".$NumberList->name."numberlistvalue:".$NumberList->value."\n");

					}
					else if($NumCorrect->value == 2){ //If number entered is not correct
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User wants to enter the number again by pressing: ".$NumCorrect->value);
						sayInt($Polly_prompts_dir."Tryagain.wav");//"Please try again"
						$retryNumEntry = "true";
					}
				}
				else{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Timed out. User did not press any key. Now hanging up.");
					$FriendsNumber = 'false';
					sayInt($Polly_prompts_dir."Bye.wav");//"Thanks for calling. Good Bye."
					Prehangup();		
				}
			}
		}// if($NoOfEntriesInDir == 0 || $NewNumberEntered == "true")
		if($phoneNumChosen == 'choice'){	
			fwrite($testerpolly, "before recording user name\n");

			if($hasTheUserRecordedAName == "FALSE"){	// Only record the name once per call
			fwrite($testerpolly, "recording user name\n");
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now recording user's name.");			
				// Prompt the user for his/her name
				$ownName = recordAudio($Polly_prompts_dir."Recordyourname.wav",//"Please record your name, so that your friend can send you a message back",
							array(
								"beep" => true, "timeout" => 600.0, "silenceTimeout" => 2.0, "maxTime" => 4, "bargein" => false, "terminator" => $term,
								"recordURI" => $scripts_dir."process_UserNamerecording.php?callid=$callid",
								"format" => "audio/wav",
								"onHangup" => create_function("$event", "Prehangup()")
								)
							);
			fwrite($testerpolly, "after recording user name\n");

				$hasTheUserRecordedAName = "TRUE";
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Recording of user's name complete.".$ownName);
			}
			// Create a new Request here
			
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now formatting the number (if required).");		// added
			$frndNoEnc = "";
			if($NewNumberEntered == "true"){
				$formattedPhNo = conditionPhNo($phoneNumber, "Delivery");
				/*if(substr($formattedPhNo, 0, 1) != '0'){	// if it does not start with a 0, append a 0 at the beginning...	// added
				//	$formattedPhNo = "0".$formattedPhNo;	// added
				}	// added*/
				$frndNoEnc = PhToKeyAndStore($formattedPhNo, $userid);	// added
			}
			else{
				$frndNoEnc = $phoneNumber;	// chosen from existing directory
			}
			
			//----->
			if(isForwardingAllowedToThisPhNo($frndNoEnc, $recid, 'msg', $count) == 'yes'){
				$reqChannel = whatWasTheChannelOfTheOriginalRequest($oreqid);
				if($callerPaidDel == "true"){//added, also add a global variable $callerPaidDel
					$reqid = makeNewReq($recid, $count, $callid, "CallerPaidDLV", $frndNoEnc, "SMSMPending", $SystemLanguage, $MessageLanguage, $reqChannel);	// changed $NumberList->value to $frndNoEnc
				}//added
				else{	// added
					$reqid = makeNewReq($recid, $count, $callid, $dlvRequestType, $frndNoEnc, "WPending", $SystemLanguage, $MessageLanguage, $reqChannel);
				}	//added
							
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Assigned request ID: ".$reqid);
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now recording user's friend's name");
				// Add to BJ Logs
				//addToBJLogs($callid, $fh, $useridUnEnc, $frndNoUnEnc, $recid, $count);
				
				if($NewNumberEntered == "true" && $PhDirEnabled == "true"){
							$FName = gatherInput($Polly_prompts_dir."SaveNumber.wav",
							array(
								"choices"=> "[1 DIGITS], *",
								"mode" => 'dtmf',
								"bargein" => true,
								"attempts" => 1,
								"onBadChoice" => "keysbadChoiceFCN",
								"onTimeout" => "keystimeOutFCN",
								"timeout"=> 7,
								"onHangup" => create_function("$event", "Prehangup()")
								)
							);
							if($FName->name == 'choice'){
								if($FName->value == 1){
									writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$FName->value." (Record Friend's name).");
									//fwrite($testerpolly, "before recording friend name\n");

									$friendsName = recordAudio($Polly_prompts_dir."NameOfNumber.wav",//"Okay! After the beep please record your friend's name",
										array(
											"beep" => true, "timeout" => 600.0, "silenceTimeout" => 2.0, "maxTime" => 4, "bargein" => false, "terminator" => $term,
											"recordURI" => $scripts_dir."process_FriendNamerecording.php?reqid=".$userid."-".$frndNoEnc,
											"format" => "audio/wav",
											"onError" => create_function("$event", 'sayInt("Wrong Input");'),
											"onTimeout" => create_function("$event", 'sayInt("No Input");'),
											"onHangup" => create_function("$event", "Prehangup()")
											)
										);
									writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User's friend's name recording complete.".$friendsName);
									updatePhDir($frndNoEnc);
							}
							else if($FName->value == 2){
								writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$FName->value." (Do not record Friend name).");					
							}
							else{
								writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$FName->value." (Wrong key).");										
							}
						}
						else{
							writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");
						}
					}
					sayInt($Polly_prompts_dir."Forward_confirmation2.wav");		// Thanks your message would be sent soon.
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User is thanked and informed that the message would be sent soon.");
				}
				//else{play a prompt to inform the user}
				//----->
				
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Asking the user if he wants to record another name.");						
				$WrongButtonPressed = 'TRUE';
				while($WrongButtonPressed == 'TRUE'){
					$WrongButtonPressed = 'FALSE';
					$MoreNumbers = gatherInput($Polly_prompts_dir."Anotherfriend-otherwise.wav",//"To add another number, press one, or if you are done, press two",
						array(
							"choices"=> "[1 DIGITS], *",
							"mode" => 'dtmf',
							"bargein" => true,
							"attempts" => 2,
							"onBadChoice" => "keysbadChoiceFCN",
							"onTimeout" => "keystimeOutFCN",
							"timeout"=> 10,
							"onHangup" => create_function("$event", "Prehangup()")
							)
						);
					if($MoreNumbers->name == 'choice' && $MoreNumbers->value != 1 && $MoreNumbers->value != 2){	// Wrong button
						$WrongButtonPressed = 'TRUE';
						sayInt($Polly_prompts_dir."Wrongbutton.wav");
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed a wrong key: ".$MoreNumbers->value);
					}
				}

				if($MoreNumbers->name == 'choice'){
					if($MoreNumbers->value == 2){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User presses ".$MoreNumbers->value." to say that he is done");
						$FriendsNumber = 'false';
					}
					else if($MoreNumbers->value == 1){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User presses ".$MoreNumbers->value." to say that he wants to record another number.");
						$numNewRequests++;
					}
				}
				else{	// No key was pressed so, assume that he does not want to add another number
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Timed out. User did not press any key. Now proceeding.");
					$FriendsNumber = 'false';
				}
			}
			else if($retryNumEntry == "true"){
				// continue
			}
			else{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Timed out. No number entered. Now hanging up.");
				sayInt($Polly_prompts_dir."Bye.wav");//"Thanks for calling. Good Bye."
				$FriendsNumber = 'false';
				Prehangup();
			}				
	}//End of while($Friendsnumber != false)
	
	// Requesting feedback
	$previousFeedBack = gaveFeedBack($telNumber);	// Did he ever give feedback before?
	if(((($PGameCMBAge > 5 && $previousFeedBack == 0) || $PGameCMBAge % 20 == 0) && $AlreadygivenFeedback == "FALSE") && $PGameCMBAge != 0){
		//fwrite($testerpolly, "in if 4\n");

		$AlreadygivenFeedback = "TRUE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Requesting System prompted feedback ".$PGameCMBAge." ".$previousFeedBack." ".$telNumber.".");
		$fbtype = $dlvRequestType . "-SPrompt";
		$fbid = makeNewFB($fbtype, $callid);
				
		$feedBack = recordAudio($Polly_prompts_dir."Recordyourfeedback.wav",//
				array(
					"beep" => true, "timeout" => 600.0, "silenceTimeout" => 4.0, "maxTime" => 30, "bargein" => false, "terminator" => $term,
					"recordURI" => $scripts_dir."process_feedback.php?fbid=$fbid&fbtype=$fbtype",
					"format" => "audio/wav",
					"onHangup" => create_function("$event", "Prehangup()")
					)
				);
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Feedback Recording Complete. Result: ".$feedBack);
		sayInt($Polly_prompts_dir."ThanksforFeedback.wav");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "System prompted feedback recording complete.");
	}
	//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Age is: ".$PGameCMBAge." for telephone number: ".$telNumber.". Alreadyheardjobs is: ".$AlreadyHeardJobs);

	// Introducing Jobs
	/*if((($PGameCMBAge % 6 ==0 || $PGameCMBAge % 9 == 0) && $AlreadyHeardJobs == "FALSE") && $PGameCMBAge != 0){
		$AlreadyHeardJobs = "TRUE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Introducing Jobs as the age is: ".$PGameCMBAge." for telephone number: ".$telNumber.".");			
		
		$result = gatherInput($Polly_prompts_dir."J_SPrompt.wav",//"Do you know that now you can listen to news paper job ads for free. Just press 1.", 
		array(
				"choices" => "swap(1,swap), *(*, *)", 
				"mode" => 'dtmf',
				"repeat" => 0,
				"bargein" => true,
				"timeout" => 7,
				"onHangup" => create_function("$event", "Prehangup()")
			)
		);
		if($result->value=='swap'){			
			PollyJobsAnswerCall($callid, 'FALSE', 'FALSE');
		}
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "System prompted Jobs intro complete. User decided to move on by not pressing any key.");	
	}*/
	return $numNewRequests;	
}// PollyGameScheduleMsgDelivery(

function PollyGameScheduleMsgReply($callid, $recid, $telNumber, $count, $songpath){	
	// PHP requires all globals to be called like this from within all functions. Not using this was creating access problems.
	global $DB_dir;
	global $base_dir;
	global $scripts_dir;
	global $praat_dir;
	global $Country;
	global $SystemLanguage;
	global $MessageLanguage;
	global $Polly_prompts_dir;
	global $term;
	global $dlvRequestType;
	global $AlreadygivenFeedback;
	global $fh;
	global $calltype;
	global $callerPaidDel;
	global $useridUnEnc;
	global $channel;
	global $hasTheUserRecordedAName;
	global $oreqid;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now recording user's name.");
	// Prompt the user for his/her name
	if($hasTheUserRecordedAName == "FALSE"){
		$ownName = recordAudio($Polly_prompts_dir."Recordyourname.wav",//"Please record your name, so that your friend can send you a message back",
					array(
						"beep" => true, "timeout" => 600.0, "silenceTimeout" => 2.0, "maxTime" => 4, "bargein" => false, "terminator" => $term,
						"recordURI" => $scripts_dir."process_UserNamerecording.php?callid=$callid",
						"format" => "audio/wav",
						"onHangup" => create_function("$event", "Prehangup()")
						)
					);
		$hasTheUserRecordedAName = "TRUE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Recording of user's name complete.".$ownName);
	}
	// Create a new Request here				
	$reqChannel = whatWasTheChannelOfTheOriginalRequest($oreqid);
	if($callerPaidDel == "true"){//added, also add a global variable $callerPaidDel
		$reqid = makeNewReq($recid, $count, $callid, "CallerPaidDLV", getPhNo(), "SMSPending", $SystemLanguage, $MessageLanguage, $reqChannel);
	}//added
	else{// added
		$reqid = makeNewReq($recid, $count, $callid, $dlvRequestType, getPhNo(), "WPending", $SystemLanguage, $MessageLanguage, $reqChannel);
	}	//added

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Assigned request ID: ".$reqid);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now recording user's friend's name");
	// Add to BJ Logs
	//addToBJLogs($callid, $fh, $useridUnEnc, KeyToPh(getPhNo()), $recid, $count);
							
	/*$friendsName = recordAudio($Polly_prompts_dir."Friendname.wav",//"Please record your friend's name, so that you may be able to reach them easily next time",
		array(
			"beep" => true, "timeout" => 600.0, "silenceTimeout" => 2.0, "maxTime" => 4, "bargein" => false, "terminator" => $term,
			"recordURI" => $scripts_dir."process_FriendNamerecording.php?reqid=".$userid."-".getPhNo(),
			"format" => "audio/wav",
			"onError" => create_function("$event", 'sayInt("Wrong Input");'),
			"onTimeout" => create_function("$event", 'sayInt("No Input");'),
			"onHangup" => create_function("$event", "Prehangup()")
			)
		);
	*/
	
	//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User's friend's name recording complete.".$friendsName);
	//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Asking the user if he wants to record another name.");
	sayInt($Polly_prompts_dir."Forward_confirmation2.wav");		// Thanks your message would be sent soon.
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User is thanked and informed that the message would be sent soon.");
}// end PollyGameScheduleMsgReply()

function selectMainPromptold($reply, $rerecordAllowed){
	global $PGameCMBAge;
	global $AtWhatAgeDoJobsKickIn;
	global $AtWhatAgeDoesFBKickIn;
	global $Ask_for_forwarding2;

	if(($PGameCMBAge < $AtWhatAgeDoJobsKickIn) && ($PGameCMBAge < $AtWhatAgeDoesFBKickIn)){
		if($rerecordAllowed == 1){
			if($reply == "TRUE"){
				$Ask_for_forwarding2 = "CorrAskforforwarding2-ReplywoBJ.wav";
			}
			else{
				$Ask_for_forwarding2 = "CorrAskforforwarding2woBJ.wav";
			}
		}
		else{
			if($reply == "TRUE"){
				$Ask_for_forwarding2 = "Askforforwarding2-ReplywoBJ.wav";
			}
			else{
				$Ask_for_forwarding2 = "Askforforwarding2woBJ.wav";
			}		
		}
	}
	else if(($PGameCMBAge >= $AtWhatAgeDoJobsKickIn) && ($PGameCMBAge < $AtWhatAgeDoesFBKickIn)){
		if($rerecordAllowed == 1){
			if($reply == "TRUE"){
				$Ask_for_forwarding2 = "CorrAskforforwarding2-Reply.wav";
			}
			else{
				$Ask_for_forwarding2 = "CorrAskforforwarding2.wav";
			}
		}
		else{
			if($reply == "TRUE"){
				$Ask_for_forwarding2 = "Askforforwarding2-Reply.wav";
			}
			else{
				$Ask_for_forwarding2 = "Askforforwarding2.wav";
			}		
		}
	}
	else if(($PGameCMBAge < $AtWhatAgeDoJobsKickIn) && ($PGameCMBAge >= $AtWhatAgeDoesFBKickIn)){
		if($rerecordAllowed == 1){
			if($reply == "TRUE"){
				$Ask_for_forwarding2 = "CorrAskforforwardingandFeedback-ReplywoBJ.wav";
			}
			else{
				$Ask_for_forwarding2 = "CorrAskforforwardingandFeedbackwoBJ.wav";
			}
		}
		else{
			if($reply == "TRUE"){
				$Ask_for_forwarding2 = "AskforforwardingandFeedback-ReplywoBJ.wav";
			}
			else{
				$Ask_for_forwarding2 = "AskforforwardingandFeedbackwoBJ.wav";
			}		
		}
	}
	else{
		if($rerecordAllowed == 1){
			if($reply == "TRUE"){
				$Ask_for_forwarding2 = "CorrAskforforwardingandFeedback-Reply.wav";
			}
			else{
				$Ask_for_forwarding2 = "CorrAskforforwardingandFeedback.wav";
			}
		}
		else{
			if($reply == "TRUE"){
				$Ask_for_forwarding2 = "AskforforwardingandFeedback-Reply.wav";
			}
			else{
				$Ask_for_forwarding2 = "AskforforwardingandFeedback.wav";
			}		
		}
	}
}// end selectMainPromptold()

function selectMainPrompt($reply, $rerecordAllowed){
	global $PGameCMBAge;
	global $AtWhatAgeDoJobsKickIn;
	global $AtWhatAgeDoesFBKickIn;
	global $AtWhatAgeDoesClearVoiceKickIn;
	global $Ask_for_forwarding2;
	global $Polly_prompts_dir;
	global $ReM_prompts, $SA_prompts;
	
	$Ask_for_forwarding2 = "";
	if($rerecordAllowed == 1){
		$Ask_for_forwarding2 = $Ask_for_forwarding2 . "\n" . $Polly_prompts_dir."12.wav"  . "\n" . $Polly_prompts_dir."sil250.wav";		// to rerecord, press 0
	}
	
	$Ask_for_forwarding2 = $Ask_for_forwarding2 . "\n" . $Polly_prompts_dir."Hear-your-recording-nopress.wav" . "\n" . $Polly_prompts_dir."SendTo1.wav";		// to relisten, press 1
	
	if($reply == "TRUE"){
		$Ask_for_forwarding2 = $Ask_for_forwarding2 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."15.wav";		// to reply using this voice, press 2
	}
	else{
		$Ask_for_forwarding2 = $Ask_for_forwarding2 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."14.wav";		// to send to friends, press 2
	}
	
	$Ask_for_forwarding2 = $Ask_for_forwarding2 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."16.wav";		// to go to the next effect, press 3
	
	if($PGameCMBAge >= $AtWhatAgeDoesClearVoiceKickIn){
		$Ask_for_forwarding2 = $Ask_for_forwarding2 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."26.wav" . "\n" . $Polly_prompts_dir."SendTo4.wav";		// to send message in your unmodified voice, press 4
	}
	
	// if($PGameCMBAge >= $AtWhatAgeDoJobsKickIn){
	// 	$Ask_for_forwarding2 = $Ask_for_forwarding2 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."17.wav";		// for utility, press 5
	// }
	//$Ask_for_forwarding2 = $Ask_for_forwarding2." ". $ReM_prompts."Test2hook.wav ";
	$Ask_for_forwarding2 = $Ask_for_forwarding2." ". $SA_prompts."SAHook.wav ";

	if($PGameCMBAge >= $AtWhatAgeDoesFBKickIn){
		$Ask_for_forwarding2 = $Ask_for_forwarding2 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."19.wav";		// for feedback, press 8
	}
}// selectMainPrompt()

function selectDelPrompt(){
	global $PGameCMBAge;
	global $AtWhatAgeDoJobsKickIn;
	global $AtWhatAgeDoesFBKickIn;
	global $What_to_do3;
	global $Polly_prompts_dir;
	
	/*if($PGameCMBAge < $AtWhatAgeDoJobsKickIn){
		$What_to_do3 = "Whattodo3woBJ.wav";
	}
	else{
		$What_to_do3 = "Whattodo3.wav";
	}*/
	$What_to_do3 = "";
	$What_to_do3 = $What_to_do3 . "\n" . $Polly_prompts_dir."21.wav";												// to relisten, press 1
	$What_to_do3 = $What_to_do3 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."22.wav";		// to send to friends, press 2
	$What_to_do3 = $What_to_do3 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."23.wav";		// to reply, press 3
	$What_to_do3 = $What_to_do3 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."24.wav";		// to record a new message, press 4
	// if($PGameCMBAge >= $AtWhatAgeDoJobsKickIn){
	// 	$What_to_do3 = $What_to_do3 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."17.wav";		// for utility, press 5
	// }
	$What_to_do3 = $What_to_do3 . "\n" . $Polly_prompts_dir."sil250.wav" . "\n" . $Polly_prompts_dir."20.wav";			// to listen to the phone number of the sender, press 0
}// end selectDelPrompt

///////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Polly Message /////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
function PollyMessageDelivery(){
	// PHP requires all globals to be called like this from within all functions. Not using this was creating access problems.
	global $DB_dir;
	global $base_dir;
	global $scripts_dir;
	global $praat_dir;
	global $Country;
	global $SystemLanguage;
	global $MessageLanguage;
	global $Polly_prompts_dir;
    global $EHL_prompts_dir;
	global $term;
	global $What_to_do3;
	global $logFilePath;
	global $fh;
	global $calltype;
	global $callid;
	global $oreqid;
	global $userid;	
	global $useridUnEnc;
	global $ouserid;
	global $recIDtoPlay;
	global $effectno;
	global $ocallid;
	global $BabaJobs;
	global $PGameCMBAge;
	global $AtWhatAgeDoJobsKickIn;
	global $AtWhatAgeDoesClearVoiceKickIn;
	global $ShutDown;
	global $channel;
	global $explicitSysLangOption;
	global $dlvRequestType;
	global $PBrowseCMBAge;

    //sayInt("Polly Message Delivery Update 1");
    
	pauseHere("TRUE");
        
	StartUpFn();
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing greetings for message delivery.");
		
	//$Name = $praat_dir."UserNames/".getFilePath($ocallid.".wav", "TRUE")."UserName-".$ocallid.".wav";

    $SIL500 = $Polly_prompts_dir."sil500.wav\n";
	$promptType = "PGame Delivery Greetings";	
	$breakLoop = "FALSE";
	while($breakLoop == "FALSE"){
		$breakLoop = "TRUE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "About to listen to $promptType.");		
		//$result = sayInt($Polly_prompts_dir."Greetings2.wav"."\n".$Name."\n".$Polly_prompts_dir."Hereitis.wav"."\n");

        $DELIVERY_INTRO = $Polly_prompts_dir."PollyDeliveryIntro.wav\n";
        $result = sayInt($Polly_prompts_dir."Salaam.wav\n".$SIL500.$DELIVERY_INTRO.$SIL500);
		$breakLoop = bargeInToChangeLang($result, $breakLoop);
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Finished listening to $promptType.");
	}

	
	//Say out the message: 
	$Path = $praat_dir."/Recordings/".getFilePath($recIDtoPlay.".wav", "TRUE")."s-".$recIDtoPlay.".wav";
	$repeat = "TRUE";
	$iter = 0;
	$playMsg = "TRUE";

	while($repeat == "TRUE"){
		if($playMsg == "TRUE"){
			$iter = $iter+1;
			
			$presult = sayInt($SIL500.$Path."\n".$SIL500);
			if ($presult->name == 'choice')
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$presult->value." to skip ".$Path.".");
			}
			
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Played the message.");
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now playing message related options.");
				
			$repeat = "FALSE";	// If no action taken then loop will break
		}


        $SIL250 = $Polly_prompts_dir."sil250.wav"."\n";
        $REPEAT = $SIL250 . $Polly_prompts_dir."To-repeat-nopress.wav\n" . $Polly_prompts_dir."SendTo1.wav" . "\n";
        $REPLY = $SIL250 . $Polly_prompts_dir."PollyMessageReply.wav\n" . $Polly_prompts_dir."SendTo2.wav\n";
        $NEW = $SIL250 . $Polly_prompts_dir."PollyMessageNew.wav\n" . $Polly_prompts_dir."SendTo3.wav\n";
        $GAME = $SIL250 . $Polly_prompts_dir."Play-fun-game.wav\n" . $Polly_prompts_dir."SendTo5.wav\n";
        $HEALTHLINE = $SIL250 . $Polly_prompts_dir."17-nopress.wav\n" . $Polly_prompts_dir."SendTo6.wav\n";
        $FEEDBACK = $SIL250 . $Polly_prompts_dir."msg-menu-feedback-nopress.wav\n" . $Polly_prompts_dir."SendTo8.wav\n";
        $SENDERSNUMBER = $SIL250 . $Polly_prompts_dir . "Senders-number-nopress.wav\n" . $Polly_prompts_dir."SendTo9.wav";
        $MENU = $REPEAT . $REPLY . $NEW . $GAME . $HEALTHLINE . $FEEDBACK . $SENDERSNUMBER;

        
		$result = gatherInput($MENU,//$What_to_do3,
		array(
				"choices" => "[1 DIGITS], *",//Using the [1 DIGITS] to allow tracking wrong keys"rpt(1,rpt), fwd(2, fwd), cont(3,cont), feedback(8, feedback), quit(9, quit)", 
				"mode" => 'dtmf',
				"bargein" => true,
				"repeat" => 0,
				"timeout"=> 10,
				"onBadChoice" => "keysbadChoiceFCN",
				"onTimeout" => "keystimeOutFCN",
				"onHangup" => create_function("$event", "Prehangup()")
			)
		);
		// ***** These first two if's seem like a good idea. If they work as expected, add them to the rest of the places too
		if ($result->name == 'timeout' || $result->name == 'hangup') //User did not respond or call received by machine
		{
			// ***** do something here
		}
		else if ($result->name == 'badChoice')
		{
			// ***** do something here
		}
		else if ($result->name == 'choice')
		{
			if ($result->value == 9)//'Sender's Phone Number'
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Sender's Phone number).");
				
				sayInt($Polly_prompts_dir."senderPh.wav");	// The sender's phone number is:
				$occ = getCountryCode($ouserid);			// Sender's country code
				$oPhnoWoCC = substr($ouserid, strlen($occ));	// Sender's number wo country code
				
				$num12 = str_split($oPhnoWoCC);
				for($index1 = 0; $index1 < count($num12); $index1+=1)
				{
					$fileName = $num12[$index1].'.wav';
					$numpath = $Polly_prompts_dir.$fileName;
					sayInt($numpath);
				}
				$repeat = "TRUE";
				$playMsg = "FALSE";
				//sayInt($Polly_prompts_dir."Back-to-msg.wav");
			}
			else if ($result->value == 1)//'rpt'
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Repeat).");
				$repeat = "TRUE";
				$playMsg = "TRUE";
			}

			else if($result->value==2)//'reply'
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Reply).");
					
				$repeat = "TRUE";
				$reply = "TRUE";				
				PollyMessageAnswerCall($callid, $reply);
				$playMsg = "TRUE";
				//sayInt($Polly_prompts_dir."Back-to-msg.wav");
			}

            /*
			else if ($result->value==3)//'fwd'
			{
 o				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Forward).");
					
				$repeat = "TRUE";
				PollyMessageScheduleMsgDelivery($callid, $recIDtoPlay, $userid, $effectno, $Path);
				//sayInt($Polly_prompts_dir."Forward_confirmation2.wav");
				$playMsg = "TRUE";
				sayInt($Polly_prompts_dir."Back-to-msg.wav");
			}
            */
            

			else if($result->value==3)//'new'
			{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (New Recording).");
				
				$repeat = "TRUE";
				$reply = "FALSE";				
				PollyMessageAnswerCall($callid, $reply);
				$playMsg = "TRUE";
				//sayInt($Polly_prompts_dir."Back-to-msg.wav");
			}

            else if($result->value == 5){
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (PollyGame).");
					$dlvRequestType = 'Delivery';
					sayInt($Polly_prompts_dir."holdmusic.wav\n");
					if($PGameCMBAge < 2){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Sending SMS to ".$userid." because the age of the user is ".$PGameCMBAge);
						schedSMS($userid, 'Del');// Send a SMS to the receiver
					}
					appendXferred('G');
					PollyGameAnswerCall($callid, 'FALSE');
					//sayInt($Polly_prompts_dir."Back-to-msg.wav");
				}

			else if($result->value==6) // Polly Health
			{
				if($BabaJobs == 'true'){
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Polly Health).");
					$explicitSysLangOption = "FALSE";
					//$dlvRequestType = 'FCDelivery';
                    $dlvRequestType = 'ADelivery';
                    
					sayInt($Polly_prompts_dir."holdmusic.wav");
					if($PBrowseCMBAge < 2){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Sending SMS to ".$userid." because the age of the user is ".$PBrowseCMBAge);
						//schedSMS($userid, 'ForecariahDel');// Send a SMS to the receiver
                        schedSMS($userid, 'ADel');// Send a SMS to the receiver
					}
					//appendXferred('F');
                    appendXferred('A');
					//PHLBrowseAnswerCall('Forecariah');
                    //PHLBrowseAnswerCall('Forecariah');
                    PHLABrowseAnswerCall('Forecariah');
				}
				else{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (JMV).");
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Sending call back info to JMV.");
					$postVars = array(	'format' => 'json',
										'schedule_id'=>'137',
										'number'=>substr($useridUnEnc, 1, (strlen($useridUnEnc)-1)),
										'delay'=>'30',
										'username'=>'polly',
										'api_key'=>'ae0fb787aab937939414121afae2533c19cfa87c');
					$PostResult = doCurlPost("http://voice.gramvaani.org/vapp/api/v1/schedule/run/", http_build_query($postVars));					
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Information sent to JMV. JMV returned: ".$PostResult);
					$RequestID = makeNewReq('0', '0', $callid, "CMBJMV", $userid, "Sent", $SystemLanguage, $MessageLanguage, $channel);	// Create a request

					sayInt($Polly_prompts_dir."thanksdc.wav");//"Thanks for calling. Polly will disconnect now. You will get a call back from jmv shortly. You can call Polly again by calling xxxxx"
					Prehangup();
				}
				//sayInt($Polly_prompts_dir."Back-to-msg.wav");
				
				$playMsg = "TRUE";
				$repeat = "TRUE";
				if($count == 4){
					$count = -1;
				}
				continue;
			}

            else if($result->value==8){ //feedback
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Feedback).");
                $fbtype = "PollyMessage";
                $fbid = makeNewFB($fbtype, $callid);
                $feedBack = recordAudio($EHL_prompts_dir."EHL-commentquestion-1.wav",//"Please record your suggestion or question after the beep, in any language. Press the pound key when done."
                array(
                    "beep" => true, "timeout" => 600.0, "silenceTimeout" => 4.0, "maxTime" => 60, "bargein" => false, "terminator" => $term,
                    "recordURI" => $scripts_dir."process_feedback.php?fbid=$fbid&fbtype=$fbtype",
                    "format" => "audio/wav",
                    "onHangup" => create_function("$event", "Prehangup()")
                )
                );
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Feedback Recording Complete. Result: ".$feedBack);
                $result = gatherInput($EHL_prompts_dir."EHL-commentquestion-2.wav",//"Thank you. We will listen to your comments as soon as possible. Would you like to be notified when your comment or question is addressed? To be notified, press 1. Otherwise, press 2."
                array(
                    "choices" => "notify(1,notify), donotnotify(2,donotnotify), *(*, *)", 
                    "mode" => 'dtmf',
                    "repeat" => 0,
                    "bargein" => true,
                    "timeout" => 7,
                    "onHangup" => create_function("$event", "Prehangup()")
                )
                );
                if($result->value=='notify'){			
                    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed 1 (Do notify)");
                    // Add that to db Update_FB_Notify.php?fbid=&notify=
                    updateFeedbackNotifyStatus($fbid, "Yes");
                }
                else if($result->value=='donotnotify'){			
                    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed 2 (Do not notify)");
                    updateFeedbackNotifyStatus($fbid, "No");
                }
                sayInt($EHL_prompts_dir."EHL-thanks.wav");//"Thanks!"
            }
            else{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (wrong key).");
				$repeat = "TRUE";
				sayInt($Polly_prompts_dir."Wrongbutton.wav");
				$playMsg = "FALSE";
			}
		}

		else{
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");
			sayInt($Polly_prompts_dir."Nobutton.wav");
			$repeat = "FALSE";
			$playMsg = "FALSE";
		}
	}// end of main while loop while($repeat == "TRUE")


    
    //sayInt($Polly_prompts_dir."Bye.wav");//"Thanks for calling. Good Bye."

    
    $THANKS = $Polly_prompts_dir . "Thanks.wav\n";
    $OUTRO = $Polly_prompts_dir . "PollyMessageOutro.wav\n";
    $OUTRO_GOODBYE = $Polly_prompts_dir . "Goodbye.wav\n";
    $TOSAY = $Polly_prompts_dir."sil500.wav\n" . $THANKS . $OUTRO . $OUTRO_GOODBYE;

    sayInt($TOSAY);
	Prehangup();
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Hanging up.");
}// end PollyMessageDelivery()

function PollyMessageAnswerCall($callid, $reply)//PollyGameAnswerCall()
{
	// PHP requires all globals to be called like this from within all functions. Not using this was creating access problems.
	global $DB_dir;
	global $base_dir;
	global $scripts_dir;
	global $praat_dir;
	global $Country;
    global $countryCode;
	global $SystemLanguage;
	global $MessageLanguage;
	global $Polly_prompts_dir;
    global $EHL_prompts_dir;
	global $term;
	global $playInformedConsent;
	global $Ask_for_forwarding2;
	global $logFilePath;
	global $fh;
	global $calltype;
	global $callid;
	global $oreqid;
	global $userid;
	global $TreatmentGroup;
	global $Q;
	global $useridUnEnc;
	global $checkForQuota;
	global $BabaJobs;
	global $recID;
	global $PGameCMBAge;
	global $AtWhatAgeDoJobsKickIn;
	global $AtWhatAgeDoesFBKickIn;
	global $AtWhatAgeDoesClearVoiceKickIn;
	global $ShutDown;
	global $channel;
	global $explicitSysLangOption;
	global $dlvRequestType;
	global $PBrowseCMBAge;

	//sayInt("Polly Message Update 2");
	
	pauseHere("TRUE");

    $numOfDigs = "[9-14 DIGITS]";
    if($countryCode == "224"){
        $numOfDigs = "[9 DIGITS]";
    }
	$firstEnc = "False";
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Inside PollyMessageAnswerCall(). Calltype: ".$calltype);
	
	if($calltype == 'MCall-me-back' || $calltype == 'SystemMessage'){
		StartUpFn();
	}
	
	if($checkForQuota == "true"){
		$TreatmentGroup = getTG($userid);		// Treatment Group of this guy (if any), 1000 otherwise
		if($calltype == 'MCall-me-back' && /*getLastPlayedOn($TreatmentGroup)!='Today' &&*/ $TreatmentGroup != 1000){
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "About to decide whether to play quota prompt or not.");
			$AgeToday = getAgeToday($userid)+1; // e.g. 1 means this is his first call as the record of this CMB is in the DB but as "InProgress" not as "Answered".
			//$AgeinDays = getAgeinDays($userid); // 0 means this is the first day as we exclude today from the calculation
			$IsQuotaApplicable = IsQuotaApplicable($userid, $TreatmentGroup);	// "yes" if it is, "no" if it is not
			//$Dk = getTGxD($userid, $TreatmentGroup);
			if(($AgeToday >= $TreatmentGroup+1) && ($IsQuotaApplicable == 'yes')){	// e.g. if $Q==3, we play this on his 4th call-me-back
				if(hasThisGuyEverHeardQuota($userid, $TreatmentGroup) == 'yes'){	// If this guy has ever heard the complete quota announcement
					setLastPlayedOn($TreatmentGroup);								// then mark him as heard for today even if he hangs up midway in this announcement
					sayInt($Polly_prompts_dir."Quota2.wav");
					
					sendUnSubSMS($useridUnEnc);	// changed $userid to $useridUnEnc
					
					Prehangup();			
				}
				else{
					sayInt($Polly_prompts_dir."Quota2.wav");
					setLastPlayedOn($TreatmentGroup);
					
					sendUnSubSMS($useridUnEnc);	// changed $userid to $useridUnEnc
					
					Prehangup();
				}
			}
		}
	}

	if($calltype != 'MDelivery'){
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing Greetings");
		
		if($ShutDown == "true"){
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "System is in ShutDown Mode. Now playing Good Bye message and asking for last feedback.");
			$fbtype = "GBye";
			$fbid = makeNewFB($fbtype, $callid);
			$feedBack = recordAudio($Polly_prompts_dir."goodBye.wav",//""
					array(
						"beep" => true, "timeout" => 600.0, "silenceTimeout" => 4.0, "maxTime" => 60, "bargein" => false, "terminator" => $term,
						"recordURI" => $scripts_dir."process_feedback.php?fbid=$fbid&fbtype=$fbtype",
						"format" => "audio/wav",
						"onHangup" => create_function("$event", "Prehangup()")
						)
					);
			setHeardBye($userid);
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Good Bye prompt and feedback complete.  Result: " . $feedBack . "Now saying Good Bye.");
			Prehangup();
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Hanging up.");
		}
		
		if($calltype == 'SystemMessage'){
			$promptType = "PGame System Message Greetings";	
			$breakLoop = "FALSE";
			while($breakLoop == "FALSE"){
				$breakLoop = "TRUE";
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "About to listen to $promptType.");
				$result = sayInt($Polly_prompts_dir."Salaam.wav\n".$Polly_prompts_dir."Greetings.wav\n");
				$breakLoop = bargeInToChangeLang($result, $breakLoop);
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Finished listening to $promptType.");
			}
			
			$firstEnc = "True";
			schedSMS($userid, 'Del');// Send a SMS to the receiver
		}
		else{
			$promptType = "PGame Greetings";	
			$breakLoop = "FALSE";
			while($breakLoop == "FALSE"){
				$breakLoop = "TRUE";
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "About to listen to $promptType.");

                $POLLYMESSAGEINTRO = $Polly_prompts_dir . "PollyMessageIntro.wav\n";
                //$result = sayInt($Polly_prompts_dir."Salaam.wav"."\n".$Polly_prompts_dir. "sil500.wav\n" . $POLLYMESSAGEINTRO);
                   $result = sayInt($Polly_prompts_dir."Salaam.wav"."\n");
	
				$breakLoop = bargeInToChangeLang($result, $breakLoop);
					
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Finished listening to $promptType.");
			}			
		}
	}
 //////////////////////////////////////////////////////// here ///////////////// 
    if($reply != "TRUE"){

        // Address book goes here.
        //Prompt for friends' numbers
        $FriendsNumber = 'true';
        $numNewRequests = 1;
        $retryNumEntry = "false";
        $PhDirEnabled = "true";
        while($FriendsNumber != 'false') {
            $phoneNumChosen = "None";
            $phoneNumber = "";
            $NoOfEntriesInDir = 0;
            $NewNumberEntered = "true";
            if($PhDirEnabled == "true" && $retryNumEntry == "false"){	// Is Phone directory feature enabled? AND this is not a retry of number entry?
                
                //sayInt("Entering phone directory\n");
                
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Phone Directory feature is enabled.");
                $PhDir = getPhDir();
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Current Phone Directory: ".$PhDir);
                $entries = explode("-", $PhDir);
                $NoOfEntriesInDir = count($entries)-1;
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Number of directory entries: ".$NoOfEntriesInDir);
                if($NoOfEntriesInDir > 0){	// there are entries in the Phone Directory for this user
                    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now Giving option to select a directory entry.");
                    // This is the Phone Number Directory
                    // Create the prompt here
                    $DirPrompt = "";
                    for($j=1; $j < ($NoOfEntriesInDir+1); $j++){
                        if($Country == 'US'){
                            //$DirPrompt = $DirPrompt . "\n" . $Polly_prompts_dir . "For.wav";
                            
                            $TOSENDMESSAGETO = $Polly_prompts_dir . "ToSendMessageTo.wav\n";
                            $DirPrompt = $DirPrompt . "\n" . $TOSENDMESSAGETO;
                            
                        }
                        $DirPrompt = $DirPrompt . "\n" . $praat_dir . "FriendNames/" . getFilePath($userid.".wav", "TRUE") . $userid . "-" . $entries[$j] . ".wav\n" . $Polly_prompts_dir . "SendTo" . $j . ".wav";
                    }
                    
                    $DirPrompt = $DirPrompt . "\n";// . $Polly_prompts_dir."NewNumber.wav";
                    $DirPrompt = $DirPrompt . $Polly_prompts_dir . "SendToNewNumber.wav\n" . $Polly_prompts_dir . "SendTo0.wav\n";
                    //"To send a message to a new number, press 0";
                    
                    // Give the choice to enter a new number (0) or choose a number from the list
                    $Choice = gatherInput($DirPrompt,
                    array(
                        "choices"=> "[1 DIGITS], *",
                        "mode" => 'dtmf',
                        "bargein" => true,
                        "attempts" => 2,
                        "onBadChoice" => "keysbadChoiceFCN",
                        "onTimeout" => "keystimeOutFCN",
                        "timeout"=> 7,
                        "onHangup" => create_function("$event", "Prehangup()")
                    )
                    );
                    if($Choice->name == 'choice'){	// otherwise the user will be asked to enter a number.
                        if($Choice->value == 0){	// Enter new number
                            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$Choice->value." (Enter a number manually).");
                            // do nothing, as $NewNumberEntered is already true, so the user will be asked to enter a number
                        }
                        else if($NoOfEntriesInDir >= $Choice->value){
                            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$Choice->value." (".$entries[$Choice->value].").");
                            $phoneNumber = $entries[$Choice->value];
                            $NewNumberEntered = "false";
                            $phoneNumChosen = "choice";
                            updatePhDir($phoneNumber);
                        }
                        else{
                            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$Choice->value." (wrong key).");
                            sayInt($Polly_prompts_dir."Wrongbutton.wav");
                        }
                    }
                    else{
                        writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");					
                    }
                }			
            }
            
            if($NoOfEntriesInDir == 0 || $NewNumberEntered == "true" || $retryNumEntry == "true"){
                $breakLoop = "TRUE";
                if($WaitWhileTheUserSearchesForPhNo == "TRUE"){
                    $breakLoop = "FALSE";
                }
                $loopTries = 0;
                $op1 = "TRUE";
                $op2 = "FALSE";
                while($breakLoop == "FALSE" && $loopTries < 3){
                    if($op1 == "TRUE"){	
                        $action = gatherInput($Polly_prompts_dir."EHL-fwd-2.wav", array("choices" => "[1 DIGITS], *", "mode" => 'dtmf', "bargein" => true, "repeat" => 1, "timeout"=> 15, "onHangup" => create_function("$event", "Prehangup()")));//"Whenever you are ready to enter the phone number, press 1."
                    }
                    else if($op2 == "TRUE"){
                        $action = gatherInput($Polly_prompts_dir."EHL-fwd-2.wav\n".$Polly_prompts_dir."EHL-fwd-4-nopress.wav\n".$Polly_prompts_dir."SendTo2.wav\n", array("choices" => "[1 DIGITS], *", "mode" => 'dtmf', "bargein" => true, "repeat" => 9, "timeout"=> 20, "onHangup" => create_function("$event", "Prehangup()")));//"Whenever you are ready to enter the phone number, press 1."
                    }
                    if($action->name != 'choice'){
                        if($op1 == "TRUE"){	
                            $op1 = "FALSE";
                            $op2 = "TRUE";
                        }
                        else if($op2 == "TRUE"){
                            $breakLoop = "TRUE";
                            return ($numNewRequests-1);
                        }
                    }
                    else if($action->value == 1){
                        $breakLoop = "TRUE";
                    }
                    else if($action->value == 2){
                        $breakLoop = "TRUE";
                        return "FALSE";
                    }
                    else if($loopTries < 2){
                        //sayInt("No problem!");
                        //do nothing
                    }
                    else{
                        return ($numNewRequests-1);
                    }
                    $loopTries++;
                }
                $retryNumEntry = "false";
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now getting friend's phone number for request number".$numNewRequests.".");
                
                //$enterPhoneNumber = $Polly_prompts_dir."Friendnoprompt.wav";//"Please enter the phone number of your friend followed by the pound key",
                $enterPhoneNumber = $Polly_prompts_dir."EnterNumberForMessage.wav\n";//"Please enter a phone number to send a message to\n";
                $enterPhoneNumber = $enterPhoneNumber . $Polly_prompts_dir."FollowedByPound.wav\n";//"followed by the pound key.\n";
                
                $NumberList = gatherInput($enterPhoneNumber,
                array(
                    "choices"=>$numOfDigs,
                    "mode" => 'dtmf',
                    "bargein" => true,
                    "attempts" => 3,
                    "timeout"=> 30,
                    "interdigitTimeout"=> 20,
                    "onBadChoice" => "keysbadChoiceFCN",
                    "onTimeout" => "keystimeOutFCN",
                    "terminator" => $term,
                    "onHangup" => create_function("$event", "Prehangup()")
                )
                );

                if($NumberList->name != 'choice'){
                    sayInt($Polly_prompts_dir."Bye.wav");
                    Prehangup();
                    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Hanging up.");
                }
                
                $phoneNumChosen = $NumberList->name;
                $phoneNumber = $NumberList->value;
                $NewNumberEntered = "true";		
                
                
            }// if($NoOfEntriesInDir == 0 || $NewNumberEntered == "true")
            if($phoneNumChosen == 'choice'){
                // Create a new Request here
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now formatting the number (if required).");		// added
                $frndNoEnc = "";
                if($NewNumberEntered == "true"){
                    $formattedPhNo = conditionPhNo($phoneNumber, "Delivery");
                    $frndNoEnc = PhToKeyAndStore($formattedPhNo, $userid);	// added
                }
                else{
                    $frndNoEnc = $phoneNumber;	// chosen from existing directory
                }
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now recording user's friend's name");
                $FriendsNumber = 'false';
            }
            
        }//End of while($Friendsnumber != false)
    }
    
	//selectMainPrompt($reply, 1);
	$recid = makeNewRec($callid);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Assigned Recording ID ".$recid);

	$rerecord = "TRUE";// For doing a rerecording
	$rerecordAllowed = 1; // Rerecord allowed in this call
	while($rerecord == "TRUE"){
		$rerecord = "FALSE";

		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Prompting the user to speak");
        //$promptTheUserToSpeak = $Polly_prompts_dir."Promptforspeaking.wav";
        $promptTheUserToSpeak = $Polly_prompts_dir."PleaseRecordMessage.wav\n";//"Please record your message after the beep\n";

        $POUNDWHENDONE = $Polly_prompts_dir . "PoundWhenDone.wav\n"; //"and press the pound key when done.\n"
        $promptTheUserToSpeak = $promptTheUserToSpeak . $POUNDWHENDONE . $Polly_prompts_dir."sil500.wav\n";


        
        $result = recordAudio($promptTheUserToSpeak,		//"Just say something after the beep and Press # when done."
					array(
						"beep" => true, "timeout" => 600, "silenceTimeout" => 3, "maxTime" => 30, "bargein" => false, "terminator" => $term,
						"recordURI" => $scripts_dir."process_recording.php?recid=$recid",
						"format" => "audio/wav",
						"onHangup" => create_function("$event", "Prehangup()")
						)
					);
		
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Recording Complete. Result: ".$result);
				
		$filePath = $praat_dir;	
		$Path = "";
		$repeat = "TRUE";
		

        $audioFileName = "s-".$recid.".wav";
        $Path = $filePath . "Recordings/" . getFilePath($recid.".wav", "TRUE") . $audioFileName;

        /*
        writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Playing the clock as the user waits.");
        sayInt($praat_dir."clock_fast.wav");
		
        $presult = sayInt($Path . "\n" . $Polly_prompts_dir. "sil500.wav");
        if ($presult->name == 'choice') {
            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$presult->value." to skip ".$Path.".");
        }
        */

        
        if($reply == "FALSE"){
            //PollyMessageScheduleMsgDelivery($callid, $recid, $userid, $count, $Path);


            // Setting the delivery request.
            //----->
            if(isForwardingAllowedToThisPhNo($frndNoEnc, $recid, 'msg', $count) == 'yes'){
                $reqChannel = whatWasTheChannelOfTheOriginalRequest($oreqid);
                if($callerPaidDel == "true"){//added, also add a global variable $callerPaidDel
                    $reqid = makeNewReq($recid, $count, $callid, "CallerPaidDLV", $frndNoEnc, "SMSPending", $SystemLanguage, $MessageLanguage, $reqChannel);	// changed $NumberList->value to $frndNoEnc
                }//added
                else{	// added
                    $reqid = makeNewReq($recid, $count, $callid, $dlvRequestType, $frndNoEnc, "WPending", $SystemLanguage, $MessageLanguage, $reqChannel);
                }	//added
                
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Assigned request ID: ".$reqid);
                sayInt($Polly_prompts_dir."Forward_confirmation2.wav");		// Thanks your message would be sent soon.
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User is thanked and informed that the message would be sent soon.");
            }
            //----->



            if($NewNumberEntered == "true" && $PhDirEnabled == "true"){
                $FName = gatherInput($Polly_prompts_dir."SaveNumber.wav",
                array(
                    "choices"=> "[1 DIGITS], *",
                    "mode" => 'dtmf',
                    "bargein" => true,
                    "attempts" => 1,
                    "onBadChoice" => "keysbadChoiceFCN",
                    "onTimeout" => "keystimeOutFCN",
                    "timeout"=> 7,
                    "onHangup" => create_function("$event", "Prehangup()")
                )
                );
                if($FName->name == 'choice'){
                    if($FName->value == 1){
                        writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$FName->value." (Record Friend's name).");
                        $friendsName = recordAudio($Polly_prompts_dir."NameOfNumber.wav",//"Okay! After the beep please record your friend's name",
                        array(
                            "beep" => true, "timeout" => 600.0, "silenceTimeout" => 2.0, "maxTime" => 4, "bargein" => false, "terminator" => $term,
                            "recordURI" => $scripts_dir."process_FriendNamerecording.php?reqid=".$userid."-".$frndNoEnc,
                            "format" => "audio/wav",
                            "onError" => create_function("$event", 'sayInt("Wrong Input");'),
                            "onTimeout" => create_function("$event", 'sayInt("No Input");'),
                            "onHangup" => create_function("$event", "Prehangup()")
                        )
                        );
                        writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User's friend's name recording complete.".$friendsName);
                        updatePhDir($frndNoEnc);
                    }
                    else if($FName->value == 2){
                        writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$FName->value." (Do not record Friend name).");					
                    }
                    else{
                        writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$FName->value." (Wrong key).");										
                    }
                }
                else{
                    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");
                }
            }
            
            
        }
        else if($reply == "TRUE"){
            PollyMessageScheduleMsgReply($callid, $recid, $userid, $count, $Path);
        }
        

        break;
	}// Only loop this loop if the user want to rerecord

    
    //sayInt($Polly_prompts_dir."Bye.wav");//"Thanks for calling. Good Bye."


    $SIL250 = $Polly_prompts_dir."sil250.wav"."\n";
    $GAME = $SIL250 . $Polly_prompts_dir."Play-fun-game.wav\n" . $Polly_prompts_dir."SendTo5.wav\n";
    $HEALTHLINE = $SIL250 . $Polly_prompts_dir."17-nopress.wav\n" . $Polly_prompts_dir."SendTo6.wav\n";
    $FEEDBACK = $SIL250 . $Polly_prompts_dir."msg-menu-feedback-nopress.wav\n" . $Polly_prompts_dir."SendTo8.wav\n";
    $MENU = $GAME . $HEALTHLINE . $FEEDBACK;

    $result = gatherInput($MENU,//$What_to_do3,
    array(
        "choices" => "[1 DIGITS], *",//Using the [1 DIGITS] to allow tracking wrong keys"rpt(1,rpt), fwd(2, fwd), cont(3,cont), feedback(8, feedback), quit(9, quit)", 
        "mode" => 'dtmf',
        "bargein" => true,
        "repeat" => 2,
        "timeout"=> 10,
        "onBadChoice" => "keysbadChoiceFCN",
        "onTimeout" => "keystimeOutFCN",
        "onHangup" => create_function("$event", "Prehangup()")
    )
    );
    // ***** These first two if's seem like a good idea. If they work as expected, add them to the rest of the places too
    if ($result->name == 'timeout' || $result->name == 'hangup') //User did not respond or call received by machine
		{
			// ***** do something here
		}
    else if ($result->name == 'badChoice')
		{
			// ***** do something here
		}
    else if ($result->name == 'choice') {
        if($result->value == 5){
            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (PollyGame).");
            $dlvRequestType = 'Delivery';
            sayInt($Polly_prompts_dir."holdmusic.wav\n");
            if($PGameCMBAge < 2){
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Sending SMS to ".$userid." because the age of the user is ".$PGameCMBAge);
                schedSMS($userid, 'Del');// Send a SMS to the receiver
            }
            appendXferred('G');
            PollyGameAnswerCall($callid, 'FALSE');
            sayInt($Polly_prompts_dir."Back-to-msg.wav");
        }
        
        else if($result->value==6) // Polly Health
			{
				if($BabaJobs == 'true'){
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Polly Health).");
					$explicitSysLangOption = "FALSE";
					//$dlvRequestType = 'FCDelivery';
                    $dlvRequestType = 'ADelivery';

                    
					sayInt($Polly_prompts_dir."holdmusic.wav");
					if($PBrowseCMBAge < 2){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Sending SMS to ".$userid." because the age of the user is ".$PBrowseCMBAge);
						//schedSMS($userid, 'ForecariahDel');// Send a SMS to the receiver
                        schedSMS($userid, 'ADel');// Send a SMS to the receiver
					}
					//appendXferred('F');
					//PHLBrowseAnswerCall('Forecariah');

                    appendXferred('A');
                    PHLABrowseAnswerCall('Forecariah');
				}
				else{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (JMV).");
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Sending call back info to JMV.");
					$postVars = array(	'format' => 'json',
                    'schedule_id'=>'137',
                    'number'=>substr($useridUnEnc, 1, (strlen($useridUnEnc)-1)),
                    'delay'=>'30',
                    'username'=>'polly',
                    'api_key'=>'ae0fb787aab937939414121afae2533c19cfa87c');
					$PostResult = doCurlPost("http://voice.gramvaani.org/vapp/api/v1/schedule/run/", http_build_query($postVars));					
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Information sent to JMV. JMV returned: ".$PostResult);
					$RequestID = makeNewReq('0', '0', $callid, "CMBJMV", $userid, "Sent", $SystemLanguage, $MessageLanguage, $channel);	// Create a request
                    
					sayInt($Polly_prompts_dir."thanksdc.wav");//"Thanks for calling. Polly will disconnect now. You will get a call back from jmv shortly. You can call Polly again by calling xxxxx"
					Prehangup();
				}
				sayInt($Polly_prompts_dir."Back-to-msg.wav");
				//continue;
			}

        else if($result->value==8){ //feedback
            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (Feedback).");
            $fbtype = "PollyMessage";
            $fbid = makeNewFB($fbtype, $callid);
            $feedBack = recordAudio($EHL_prompts_dir."EHL-commentquestion-1.wav",//"Please record your suggestion or question after the beep, in any language. Press the pound key when done."
            array(
                "beep" => true, "timeout" => 600.0, "silenceTimeout" => 4.0, "maxTime" => 60, "bargein" => false, "terminator" => $term,
                "recordURI" => $scripts_dir."process_feedback.php?fbid=$fbid&fbtype=$fbtype",
                "format" => "audio/wav",
                "onHangup" => create_function("$event", "Prehangup()")
            )
            );
            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Feedback Recording Complete. Result: ".$feedBack);
            $result = gatherInput($EHL_prompts_dir."EHL-commentquestion-2.wav",//"Thank you. We will listen to your comments as soon as possible. Would you like to be notified when your comment or question is addressed? To be notified, press 1. Otherwise, press 2."
            array(
                "choices" => "notify(1,notify), donotnotify(2,donotnotify), *(*, *)", 
                "mode" => 'dtmf',
                "repeat" => 0,
                "bargein" => true,
                "timeout" => 7,
                "onHangup" => create_function("$event", "Prehangup()")
            )
            );
            if($result->value=='notify'){			
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed 1 (Do notify)");
                // Add that to db Update_FB_Notify.php?fbid=&notify=
                updateFeedbackNotifyStatus($fbid, "Yes");
            }
            else if($result->value=='donotnotify'){			
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed 2 (Do not notify)");
                updateFeedbackNotifyStatus($fbid, "No");
            }
            sayInt($EHL_prompts_dir."EHL-thanks.wav");//"Thanks!"
        }
        else{
            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$result->value." (wrong key).");
            $repeat = "TRUE";
            sayInt($Polly_prompts_dir."Wrongbutton.wav");
            $playMsg = "FALSE";
        }
    }
    
    else{
        writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");
        sayInt($Polly_prompts_dir."Nobutton.wav");
        $repeat = "FALSE";
        $playMsg = "FALSE";
    }
    
    
    
    
        
    $THANKS = $Polly_prompts_dir . "Thanks.wav\n";
    $OUTRO = $Polly_prompts_dir . "PollyMessageOutro.wav\n";
    $OUTRO_GOODBYE = $Polly_prompts_dir . "Goodbye.wav\n";
    $TOSAY = $Polly_prompts_dir."sil500.wav\n" . $THANKS . $OUTRO . $OUTRO_GOODBYE;

    sayInt($TOSAY);
    Prehangup();
    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Hanging up.");
    
}// end PollyMessageAnswerCall() function

function PollyMessageScheduleMsgDelivery($callid, $recid, $telNumber, $count, $songpath){	
	// PHP requires all globals to be called like this from within all functions. Not using this was creating access problems.
	global $DB_dir;
	global $base_dir;
	global $scripts_dir;
	global $praat_dir;
	global $Country;
	global $countryCode;
	global $SystemLanguage;
	global $MessageLanguage;
	global $Polly_prompts_dir;
	global $term;
	global $dlvRequestType;
	global $AlreadygivenFeedback;
	global $fh;
	global $calltype;
	global $userid;
	global $AlreadyHeardJobs;
	global $callerPaidDel;
	global $useridUnEnc;
	global $PGameCMBAge;
	global $PhDirEnabled;
	global $channel;
	global $hasTheUserRecordedAName;
	global $oreqid;
	global $WaitWhileTheUserSearchesForPhNo;

    //sayInt("Polly Message Schedule Delivery Update 2");
    
	$numOfDigs = "[9-14 DIGITS]";
	if($countryCode == "224"){
		$numOfDigs = "[9 DIGITS]";
	}
	
	//$action = sayInt($Polly_prompts_dir."EHL-fwd-1.wav");//"We will now forward the message to a phone number of your choice."

	//Prompt for friends' numbers
	$FriendsNumber = 'true';
	$numNewRequests = 1;
	$retryNumEntry = "false";
	while($FriendsNumber != 'false')
	{
		$phoneNumChosen = "None";
		$phoneNumber = "";
		$NoOfEntriesInDir = 0;
		$NewNumberEntered = "true";
		if($PhDirEnabled == "true" && $retryNumEntry == "false"){	// Is Phone directory feature enabled? AND this is not a retry of number entry?
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Phone Directory feature is enabled.");
			$PhDir = getPhDir();
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Current Phone Directory: ".$PhDir);
			$entries = explode("-", $PhDir);
			$NoOfEntriesInDir = count($entries)-1;
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Number of directory entries: ".$NoOfEntriesInDir);
			if($NoOfEntriesInDir > 0){	// there are entries in the Phone Directory for this user
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now Giving option to select a directory entry.");
				// This is the Phone Number Directory
				// Create the prompt here
				$DirPrompt = "";
				for($j=1; $j < ($NoOfEntriesInDir+1); $j++){
					if($Country == 'US'){
						//$DirPrompt = $DirPrompt . "\n" . $Polly_prompts_dir . "For.wav";
                        $DirPrompt = $DirPrompt . "\n" . "To send a message to\n";
                        
					}
					$DirPrompt = $DirPrompt . "\n" . $praat_dir . "FriendNames/" . getFilePath($userid.".wav", "TRUE") . $userid . "-" . $entries[$j] . ".wav\n" . $Polly_prompts_dir . "SendTo" . $j . ".wav";
				}
				$DirPrompt = $DirPrompt . "\n" . $Polly_prompts_dir."NewNumber.wav";
				// Give the choice to enter a new number (0) or choose a number from the list
				$Choice = gatherInput($DirPrompt,
				array(
					"choices"=> "[1 DIGITS], *",
					"mode" => 'dtmf',
					"bargein" => true,
					"attempts" => 2,
					"onBadChoice" => "keysbadChoiceFCN",
					"onTimeout" => "keystimeOutFCN",
					"timeout"=> 7,
					"onHangup" => create_function("$event", "Prehangup()")
					)
				);
				if($Choice->name == 'choice'){	// otherwise the user will be asked to enter a number.
					if($Choice->value == 0){	// Enter new number
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$Choice->value." (Enter a number manually).");
						// do nothing, as $NewNumberEntered is already true, so the user will be asked to enter a number
					}
					else if($NoOfEntriesInDir >= $Choice->value){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$Choice->value." (".$entries[$Choice->value].").");
						$phoneNumber = $entries[$Choice->value];
						$NewNumberEntered = "false";
						$phoneNumChosen = "choice";
						updatePhDir($phoneNumber);
					}
					else{
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$Choice->value." (wrong key).");
						sayInt($Polly_prompts_dir."Wrongbutton.wav");
					}
				}
				else{
					writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");					
				}
			}			
		}
		
		if($NoOfEntriesInDir == 0 || $NewNumberEntered == "true" || $retryNumEntry == "true"){
			$breakLoop = "TRUE";
			if($WaitWhileTheUserSearchesForPhNo == "TRUE"){
				$breakLoop = "FALSE";
			}
			$loopTries = 0;
			$op1 = "TRUE";
			$op2 = "FALSE";
			while($breakLoop == "FALSE" && $loopTries < 3){
				if($op1 == "TRUE"){	
					$action = gatherInput($Polly_prompts_dir."EHL-fwd-2.wav", array("choices" => "[1 DIGITS], *", "mode" => 'dtmf', "bargein" => true, "repeat" => 1, "timeout"=> 15, "onHangup" => create_function("$event", "Prehangup()")));//"Whenever you are ready to enter the phone number, press 1."
				}
				else if($op2 == "TRUE"){
					$action = gatherInput($Polly_prompts_dir."EHL-fwd-2.wav\n".$Polly_prompts_dir."EHL-fwd-4-nopress.wav\n".$Polly_prompts_dir."SendTo2.wav\n", array("choices" => "[1 DIGITS], *", "mode" => 'dtmf', "bargein" => true, "repeat" => 9, "timeout"=> 20, "onHangup" => create_function("$event", "Prehangup()")));//"Whenever you are ready to enter the phone number, press 1."
				}
				if($action->name != 'choice'){
					if($op1 == "TRUE"){	
						$op1 = "FALSE";
						$op2 = "TRUE";
					}
					else if($op2 == "TRUE"){
						$breakLoop = "TRUE";
						return ($numNewRequests-1);
					}
				}
				else if($action->value == 1){
					$breakLoop = "TRUE";
				}
				else if($action->value == 2){
					$breakLoop = "TRUE";
					return "FALSE";
				}
				else if($loopTries < 2){
					//sayInt("No problem!");
					//do nothing
				}
				else{
					return ($numNewRequests-1);
				}
				$loopTries++;
			}
			$retryNumEntry = "false";
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now getting friend's phone number for request number".$numNewRequests.".");

            //$enterPhoneNumber = $Polly_prompts_dir."Friendnoprompt.wav";//"Please enter the phone number of your friend followed by the pound key",
            $enterPhoneNumber = "Please enter a phone number to send a message to\n";
            $enterPhoneNumber = $enterPhoneNumber . "followed by the pound key.\n";
            
            $NumberList = gatherInput($enterPhoneNumber,
				array(
					"choices"=>$numOfDigs,
					"mode" => 'dtmf',
					"bargein" => true,
					"attempts" => 3,
					"timeout"=> 30,
					"interdigitTimeout"=> 20,
					"onBadChoice" => "keysbadChoiceFCN",
					"onTimeout" => "keystimeOutFCN",
					"terminator" => $term,
					"onHangup" => create_function("$event", "Prehangup()")
					)
				);
			if($NumberList->name == 'choice'){	

			}
            $phoneNumChosen = $NumberList->name;
            $phoneNumber = $NumberList->value;
            $NewNumberEntered = "true";		

		}// if($NoOfEntriesInDir == 0 || $NewNumberEntered == "true")
		if($phoneNumChosen == 'choice'){	
            
			// Create a new Request here
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now formatting the number (if required).");		// added
			$frndNoEnc = "";
			if($NewNumberEntered == "true"){
				$formattedPhNo = conditionPhNo($phoneNumber, "Delivery");
				/*if(substr($formattedPhNo, 0, 1) != '0'){	// if it does not start with a 0, append a 0 at the beginning...	// added
				//	$formattedPhNo = "0".$formattedPhNo;	// added
				}	// added*/
				$frndNoEnc = PhToKeyAndStore($formattedPhNo, $userid);	// added
			}
			else{
				$frndNoEnc = $phoneNumber;	// chosen from existing directory
			}
			
			//----->
			if(isForwardingAllowedToThisPhNo($frndNoEnc, $recid, 'msg', $count) == 'yes'){
				$reqChannel = whatWasTheChannelOfTheOriginalRequest($oreqid);
				if($callerPaidDel == "true"){//added, also add a global variable $callerPaidDel
					$reqid = makeNewReq($recid, $count, $callid, "CallerPaidDLV", $frndNoEnc, "SMSPending", $SystemLanguage, $MessageLanguage, $reqChannel);	// changed $NumberList->value to $frndNoEnc
				}//added
				else{	// added
					$reqid = makeNewReq($recid, $count, $callid, $dlvRequestType, $frndNoEnc, "WPending", $SystemLanguage, $MessageLanguage, $reqChannel);
				}	//added
                
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Assigned request ID: ".$reqid);
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now recording user's friend's name");
				// Add to BJ Logs
				//addToBJLogs($callid, $fh, $useridUnEnc, $frndNoUnEnc, $recid, $count);
                
				if($NewNumberEntered == "true" && $PhDirEnabled == "true"){
                    $FName = gatherInput($Polly_prompts_dir."SaveNumber.wav",
                    array(
                        "choices"=> "[1 DIGITS], *",
                        "mode" => 'dtmf',
                        "bargein" => true,
                        "attempts" => 1,
                        "onBadChoice" => "keysbadChoiceFCN",
                        "onTimeout" => "keystimeOutFCN",
                        "timeout"=> 7,
                        "onHangup" => create_function("$event", "Prehangup()")
                    )
                    );
                    if($FName->name == 'choice'){
                        if($FName->value == 1){
                            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$FName->value." (Record Friend's name).");
                            $friendsName = recordAudio($Polly_prompts_dir."NameOfNumber.wav",//"Okay! After the beep please record your friend's name",
                            array(
                                "beep" => true, "timeout" => 600.0, "silenceTimeout" => 2.0, "maxTime" => 4, "bargein" => false, "terminator" => $term,
                                "recordURI" => $scripts_dir."process_FriendNamerecording.php?reqid=".$userid."-".$frndNoEnc,
                                "format" => "audio/wav",
                                "onError" => create_function("$event", 'sayInt("Wrong Input");'),
                                "onTimeout" => create_function("$event", 'sayInt("No Input");'),
                                "onHangup" => create_function("$event", "Prehangup()")
                            )
                            );
                            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User's friend's name recording complete.".$friendsName);
                            updatePhDir($frndNoEnc);
                        }
                        else if($FName->value == 2){
                            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$FName->value." (Do not record Friend name).");					
                        }
                        else{
                            writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User pressed ".$FName->value." (Wrong key).");										
                        }
                    }
                    else{
                        writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User did not press any key.");
                    }
                }
                sayInt($Polly_prompts_dir."Forward_confirmation2.wav");		// Thanks your message would be sent soon.
                writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User is thanked and informed that the message would be sent soon.");
            }
            //else{play a prompt to inform the user}
            //----->

            $FriendsNumber = 'false';
        }
            
	}//End of while($Friendsnumber != false)
	
	// Requesting feedback
	$previousFeedBack = gaveFeedBack($telNumber);	// Did he ever give feedback before?
	if(((($PGameCMBAge > 5 && $previousFeedBack == 0) || $PGameCMBAge % 20 == 0) && $AlreadygivenFeedback == "FALSE") && $PGameCMBAge != 0){
		$AlreadygivenFeedback = "TRUE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Requesting System prompted feedback ".$PGameCMBAge." ".$previousFeedBack." ".$telNumber.".");
		$fbtype = "SPrompt";
		$fbid = makeNewFB($fbtype, $callid);
				
		$feedBack = recordAudio($Polly_prompts_dir."Recordyourfeedback.wav",//
				array(
					"beep" => true, "timeout" => 600.0, "silenceTimeout" => 4.0, "maxTime" => 30, "bargein" => false, "terminator" => $term,
					"recordURI" => $scripts_dir."process_feedback.php?fbid=$fbid&fbtype=$fbtype",
					"format" => "audio/wav",
					"onHangup" => create_function("$event", "Prehangup()")
					)
				);
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Feedback Recording Complete. Result: ".$feedBack);
		sayInt($Polly_prompts_dir."ThanksforFeedback.wav");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "System prompted feedback recording complete.");
	}
	//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Age is: ".$PGameCMBAge." for telephone number: ".$telNumber.". Alreadyheardjobs is: ".$AlreadyHeardJobs);

	// Introducing Jobs
	/*if((($PGameCMBAge % 6 ==0 || $PGameCMBAge % 9 == 0) && $AlreadyHeardJobs == "FALSE") && $PGameCMBAge != 0){
		$AlreadyHeardJobs = "TRUE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Introducing Jobs as the age is: ".$PGameCMBAge." for telephone number: ".$telNumber.".");			
		
		$result = gatherInput($Polly_prompts_dir."J_SPrompt.wav",//"Do you know that now you can listen to news paper job ads for free. Just press 1.", 
		array(
				"choices" => "swap(1,swap), *(*, *)", 
				"mode" => 'dtmf',
				"repeat" => 0,
				"bargein" => true,
				"timeout" => 7,
				"onHangup" => create_function("$event", "Prehangup()")
			)
		);
		if($result->value=='swap'){			
			PollyJobsAnswerCall($callid, 'FALSE', 'FALSE');
		}
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "System prompted Jobs intro complete. User decided to move on by not pressing any key.");	
	}*/



    /*
    writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Timed out. No number entered. Now hanging up.");
    sayInt($Polly_prompts_dir."Bye.wav");//"Thanks for calling. Good Bye."
    $FriendsNumber = 'false';
    Prehangup();
    */

    
	return $numNewRequests;	
}// PollyMessageScheduleMsgDelivery(

function PollyMessageScheduleMsgReply($callid, $recid, $telNumber, $count, $songpath){	
	// PHP requires all globals to be called like this from within all functions. Not using this was creating access problems.
	global $DB_dir;
	global $base_dir;
	global $scripts_dir;
	global $praat_dir;
	global $Country;
	global $SystemLanguage;
	global $MessageLanguage;
	global $Polly_prompts_dir;
	global $term;
	global $dlvRequestType;
	global $AlreadygivenFeedback;
	global $fh;
	global $calltype;
	global $callerPaidDel;
	global $useridUnEnc;
	global $channel;
	global $hasTheUserRecordedAName;
	global $oreqid;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now recording user's name.");

    /*
	// Prompt the user for his/her name
	if($hasTheUserRecordedAName == "FALSE"){
		$ownName = recordAudio($Polly_prompts_dir."Recordyourname.wav",//"Please record your name, so that your friend can send you a message back",
					array(
						"beep" => true, "timeout" => 600.0, "silenceTimeout" => 2.0, "maxTime" => 4, "bargein" => false, "terminator" => $term,
						"recordURI" => $scripts_dir."process_UserNamerecording.php?callid=$callid",
						"format" => "audio/wav",
						"onHangup" => create_function("$event", "Prehangup()")
						)
					);
		$hasTheUserRecordedAName = "TRUE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Recording of user's name complete.".$ownName);
	}
    */
    
	// Create a new Request here				
	$reqChannel = whatWasTheChannelOfTheOriginalRequest($oreqid);
	if($callerPaidDel == "true"){//added, also add a global variable $callerPaidDel
		$reqid = makeNewReq($recid, $count, $callid, "CallerPaidDLV", getPhNo(), "SMSPending", $SystemLanguage, $MessageLanguage, $reqChannel);
	}//added
	else{// added
		$reqid = makeNewReq($recid, $count, $callid, $dlvRequestType, getPhNo(), "WPending", $SystemLanguage, $MessageLanguage, $reqChannel);
	}	//added

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Assigned request ID: ".$reqid);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Now recording user's friend's name");
	// Add to BJ Logs
	//addToBJLogs($callid, $fh, $useridUnEnc, KeyToPh(getPhNo()), $recid, $count);
							
	/*$friendsName = recordAudio($Polly_prompts_dir."Friendname.wav",//"Please record your friend's name, so that you may be able to reach them easily next time",
		array(
			"beep" => true, "timeout" => 600.0, "silenceTimeout" => 2.0, "maxTime" => 4, "bargein" => false, "terminator" => $term,
			"recordURI" => $scripts_dir."process_FriendNamerecording.php?reqid=".$userid."-".getPhNo(),
			"format" => "audio/wav",
			"onError" => create_function("$event", 'sayInt("Wrong Input");'),
			"onTimeout" => create_function("$event", 'sayInt("No Input");'),
			"onHangup" => create_function("$event", "Prehangup()")
			)
		);
	*/
	
	//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User's friend's name recording complete.".$friendsName);
	//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "Asking the user if he wants to record another name.");
	sayInt($Polly_prompts_dir."Forward_confirmation2.wav");		// Thanks your message would be sent soon.
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User is thanked and informed that the message would be sent soon.");
}// end PollyMessageScheduleMsgReply()

//////////////////////////////////////////////////////////////////////////////////////
///////////////////////////// System and Message Language Function ///////////////////
//////////////////////////////////////////////////////////////////////////////////////
function selectSystemLanguage(){
	global $SystemLanguage;
	global $EHL_prompts_dir;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " called.");

	$mainList = $EHL_prompts_dir."syslang-AmerEnglish.wav\n"./*$EHL_prompts_dir."syslang-sousou.wav\n".*/$EHL_prompts_dir."syslang-GuinFrench.wav\n"/*.$EHL_prompts_dir."syslang-LibEnglish.wav\n"*/;
	$subList = "";
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Main list of Languages: " . $mainList);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Sub list of Languages: " . $subList);

	$returnVal = $SystemLanguage;
	$repeat = "TRUE";
	while($repeat == "TRUE"){
		$repeat = "FALSE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User is about to hear list of languages.");
		$result = gatherInput($mainList,//"For English, press 1. For French, press 2. For sousou, press 3. For Fulani, press 4. For Kissi, press 5. For Kono, press 6. For Krio, press 7. For Limba, press 8. For more language choices, press 9."
		array(
				"choices" => "AmerEnglish(1, AmerEnglish), sousou(2, sousou), GuinFrench(3, GuinFrench), LibEnglish(4, LibEnglish), *(*, *)",
				"mode" => 'dtmf',
				"repeat" => 1,
				"bargein" => true,
				"timeout" => 5,
				"onBadChoice" => "keysbadChoiceFCNEHL",
				"onTimeout" => "keystimeOutFCNEHL",
				"onHangup" => create_function("$event", "Prehangup()")
			)
		);
		if($result->name == 'choice'){
			if($result->value == "More"){
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($result->value)." to hear more options.");
				$resultsub = gatherInput($subList,//"For Loko, press 1. For Mandinka, press 2. For Mende, press 3. For Themne, press 4. For Wolof, press 5. To go back to the previous language choices, press 6."
				array(
						"choices" => "Loko(1,Loko), Mandinka(2, Mandinka), Mende(3, Mende), Themne(4, Themne), Wolof(5, Wolof),  Previous(6, Previous), *(*, *)",
						"mode" => 'dtmf',
						"repeat" => 1,
						"bargein" => true,
						"timeout" => 5,
						"onBadChoice" => "keysbadChoiceFCNEHL",
						"onTimeout" => "keystimeOutFCNEHL",
						"onHangup" => create_function("$event", "Prehangup()")
					)
				);
				if ($resultsub->name == 'choice'){
					if($resultsub->value == "Previous"){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($resultsub->value)." to go back to the previous menu.");
						$repeat = "TRUE";
					}
					else if($resultsub->value == "Loko" || $resultsub->value == "Mandinka" || $resultsub->value == "Mende" || $resultsub->value == "Themne" || $resultsub->value == "Wolof"){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($resultsub->value).".");
						$returnVal = $resultsub->value;
					}
				}						
			}
			else if($result->value == "AmerEnglish" /*|| $result->value == "LibEnglish"*/ || $result->value == "GuinFrench" /*|| $result->value == "sousou"*/){
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($result->value).".");
				$returnVal = $result->value;
			}
			else if($result->value == "*"){
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($resultsub->value)." to pause the system.");
				sayInt("System Paused!");
			}
		}
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " calls switchSystemLanguage() with $returnVal and 'choice'.");
	switchSystemLanguage($returnVal, 'choice');
}

function selectMessageLanguage($currMsgPath){
	global $MessageLanguage;
	global $EHL_prompts_dir;
	global $msgLangsForSysLangs;
	global $SystemLanguage;
	global $callid;
	global $fh;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " called.");
	
	$supportedMsglangs = $msgLangsForSysLangs[$SystemLanguage];
	$supportedMsglangs = availableMsgFiles($supportedMsglangs, $currMsgPath);
	
	$mainList = "";
	$mainOptions = "";
	$subList = "";
	$subOptions = "";
	
	$len = count($supportedMsglangs);
	for($i=0; $i < ($len+1); $i++){
		if($i == 0){
			$mainList = $mainList.$EHL_prompts_dir."To-hear-this-nopress.wav\n".$EHL_prompts_dir."In-".$supportedMsglangs[$i]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i+1).".wav\n";
			$mainOptions = $mainOptions . $supportedMsglangs[$i]."(".($i+1).",".$supportedMsglangs[$i]."),";
		}
		else if($i == 1){
			$mainList = $mainList.$EHL_prompts_dir."To-hear-it-nopress.wav\n".$EHL_prompts_dir."In-".$supportedMsglangs[$i]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i+1).".wav\n";
			$mainOptions = $mainOptions . $supportedMsglangs[$i]."(".($i+1).",".$supportedMsglangs[$i]."),";
		}
		else{
			if($i < 8){
				if($i < $len){
					$mainList = $mainList.$EHL_prompts_dir."In-".$supportedMsglangs[$i]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i+1).".wav\n";
					$mainOptions = $mainOptions . $supportedMsglangs[$i]."(".($i+1).",".$supportedMsglangs[$i]."),";
				}
				else{
					break;
				}
			}
			else if($i == 8){
				if(($i+1) < $len){
					$mainList = $mainList.$EHL_prompts_dir."msglangmenu-more.wav\n".$EHL_prompts_dir."SendTo".($i+1).".wav\n";
				    $mainOptions = $mainOptions ."More(".($i+1).",More),";
				}
				else{
				    $mainList = $mainList.$EHL_prompts_dir."In-".$supportedMsglangs[$i]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i+1).".wav\n";
					$mainOptions = $mainOptions . $supportedMsglangs[$i]."(".($i+1).",".$supportedMsglangs[$i]."),";
					break;
				}
			}
			else{
				if($i == 9){
					$subList = $subList.$EHL_prompts_dir."To-hear-this-nopress.wav\n".$EHL_prompts_dir."In-".$supportedMsglangs[$i-1]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i - 8).".wav\n";
					$subOptions = $subOptions . $supportedMsglangs[$i-1]."(".($i - 8).",".$supportedMsglangs[$i-1]."),";
				}
				else if($i == 10){
					$subList = $subList.$EHL_prompts_dir."To-hear-it-nopress.wav\n".$EHL_prompts_dir."In-".$supportedMsglangs[$i-1]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i - 8).".wav\n";				
					$subOptions = $subOptions . $supportedMsglangs[$i-1]."(".($i - 8).",".$supportedMsglangs[$i-1]."),";
				}
				else if($i < $len){
					$subList = $subList.$EHL_prompts_dir."In-".$supportedMsglangs[$i-1]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i - 8).".wav\n";				
					$subOptions = $subOptions . $supportedMsglangs[$i-1]."(".($i - 8).",".$supportedMsglangs[$i-1]."),";
				}
			}
		}
	}
	if($subOptions != ""){
	    $subList = $subList.$EHL_prompts_dir."msglangmenu-prev.wav\n".$EHL_prompts_dir."SendTo".($i - 8).".wav\n";
		$subOptions = $subOptions . "Previous(".($i - 8).",Previous),";
	}
	$mainOptions = trim($mainOptions, ",");
	$subOptions = trim($subOptions, ",");
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Main list of Languages: " . $mainList . ", Main list of Options: " . $mainOptions);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Sub list of Languages: " . $subList . ", Sub list of Options: " . $subOptions);

	$returnVal = $MessageLanguage;
	$repeat = "TRUE";
	while($repeat == "TRUE"){
		$repeat = "FALSE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User is about to hear list of languages.");
		$result = gatherInput($mainList, //"For English, press 1. For French, press 2. For sousou, press 3. For Fulani, press 4. For Kissi, press 5. For Kono, press 6. For Krio, press 7. For Limba, press 8. For more language choices, press 9.",
		array(
				"choices" => $mainOptions . ", *(*, *)", //"AmerEnglish(1,AmerEnglish), GuinFrench(2, GuinFrench), sousou(3, sousou), fulani(4, fulani), kissi(5, kissi),  kono(6, kono),  krio(7, krio), limba(8, limba), More(9, More)",
				"mode" => 'dtmf',
				"repeat" => 1,
				"bargein" => true,
				"timeout" => 5,
				"onBadChoice" => "keysbadChoiceFCNEHL",
				"onTimeout" => "keystimeOutFCNEHL",
				"onHangup" => create_function("$event", "Prehangup()")
			)
		);

		if ($result->name == 'choice'){
			if($result->value == "More"){
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($result->value)." to hear more options.");
				$resultsub = gatherInput($subList, //"For Loko, press 1. For Mandinka, press 2. For Mende, press 3. For Themne, press 4. For Wolof, press 5. To go back to the previous language choices, press 6.",
				array(
						"choices" => $subOptions . ", *(*, *)", //"loko(1,loko), mandinka(2, mandinka), mende(3, mende), themne(4, themne), wolof(5, wolof),  Previous(6, Previous)",
						"mode" => 'dtmf',
						"repeat" => 1,
						"bargein" => true,
						"timeout" => 5,
						"onBadChoice" => "keysbadChoiceFCNEHL",
						"onTimeout" => "keystimeOutFCNEHL",
						"onHangup" => create_function("$event", "Prehangup()")
					)
				);
				if ($resultsub->name == 'choice'){
					if($resultsub->value == "Previous"){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($resultsub->value)." to go back to the previous menu.");
						$repeat = "TRUE";
					}
					else{
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($resultsub->value).".");
						$returnVal = $resultsub->value;
					}
				}						
			}
			else{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($result->value).".");
				$returnVal = $result->value;
			}
		}
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " returns $returnVal.");
	switchMessageLanguage($returnVal, 'choice', "TRUE");
}

function selectMessageSendingLanguage($currMsgPath){
	global $MessageLanguage;
	global $EHL_prompts_dir;
	global $msgLangsForSysLangs;
	global $SystemLanguage;
	global $fh;
	global $callid;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " called.");
	
	$supportedMsglangs = $msgLangsForSysLangs[$SystemLanguage];
    $supportedMsglangs = availableMsgFiles($supportedMsglangs, $currMsgPath);
    
	$mainList = "";
	$mainOptions = "";
	$subList = "";
	$subOptions = "";
	
	$len = count($supportedMsglangs);
	for($i=0; $i < ($len+1); $i++){
		if($i == 0){
			$mainList = $mainList.$EHL_prompts_dir."To-forward-this-nopress.wav\n".$EHL_prompts_dir."In-".$supportedMsglangs[$i]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i+1).".wav\n";
			$mainOptions = $mainOptions . $supportedMsglangs[$i]."(".($i+1).",".$supportedMsglangs[$i]."),";
		}
		else if($i == 1){
			$mainList = $mainList.$EHL_prompts_dir."To-forward-it-nopress.wav\n".$EHL_prompts_dir."In-".$supportedMsglangs[$i]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i+1).".wav\n";
			$mainOptions = $mainOptions . $supportedMsglangs[$i]."(".($i+1).",".$supportedMsglangs[$i]."),";
		}
		else{
			if($i < 8){
				if($i < $len){
					$mainList = $mainList.$EHL_prompts_dir."In-".$supportedMsglangs[$i]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i+1).".wav\n";
					$mainOptions = $mainOptions . $supportedMsglangs[$i]."(".($i+1).",".$supportedMsglangs[$i]."),";
				}
				else{
					break;
				}
			}
			else if($i == 8){
				if(($i+1) < $len){
					$mainList = $mainList.$EHL_prompts_dir."msglangmenu-more.wav\n".$EHL_prompts_dir."SendTo".($i+1).".wav\n";
				    $mainOptions = $mainOptions ."More(".($i+1).",More),";
				}
				else{
				    $mainList = $mainList.$EHL_prompts_dir."In-".$supportedMsglangs[$i]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i+1).".wav\n";
					$mainOptions = $mainOptions . $supportedMsglangs[$i]."(".($i+1).",".$supportedMsglangs[$i]."),";
					break;
				}
			}
			else{
				if($i == 9){
					$subList = $subList.$EHL_prompts_dir."To-forward-this-nopress.wav\n".$EHL_prompts_dir."In-".$supportedMsglangs[$i-1]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i - 8).".wav\n";
					$subOptions = $subOptions . $supportedMsglangs[$i-1]."(".($i - 8).",".$supportedMsglangs[$i-1]."),";
				}
				else if($i == 10){
					$subList = $subList.$EHL_prompts_dir."To-forward-it-nopress.wav\n".$EHL_prompts_dir."In-".$supportedMsglangs[$i-1]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i - 8).".wav\n";				
					$subOptions = $subOptions . $supportedMsglangs[$i-1]."(".($i - 8).",".$supportedMsglangs[$i-1]."),";
				}
				else if($i < $len){
					$subList = $subList.$EHL_prompts_dir."In-".$supportedMsglangs[$i-1]."-nopress.wav\n".$EHL_prompts_dir."SendTo".($i - 8).".wav\n";				
					$subOptions = $subOptions . $supportedMsglangs[$i-1]."(".($i - 8).",".$supportedMsglangs[$i-1]."),";
				}
			}
		}
	}
    if($subOptions != ""){
		$subList = $subList.$EHL_prompts_dir."msglangmenu-prev.wav\n".$EHL_prompts_dir."SendTo".($i - 8).".wav\n";
		$subOptions = $subOptions . "Previous(".($i - 8).",Previous),";
    }
	$mainOptions = trim($mainOptions, ",");
	$subOptions = trim($subOptions, ",");
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Main list of Languages: " . $mainList . ", Main list of Options: " . $mainOptions);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Sub list of Languages: " . $subList . ", Sub list of Options: " . $subOptions);

	$returnVal = $MessageLanguage;
	$repeat = "TRUE";
	while($repeat == "TRUE"){
		$repeat = "FALSE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User is about to hear list of languages.");
		$result = gatherInput($mainList, //"To forward this message in English, press 1. For French, press 2. For sousou, press 3. For Fulani, press 4. For Kissi, press 5. For Kono, press 6. For Krio, press 7. For Limba, press 8. For more language choices, press 9.",
		array(
				"choices" => $mainOptions . ", *(*, *)",
				"mode" => 'dtmf',
				"repeat" => 1,
				"bargein" => true,
				"timeout" => 5,
				"onBadChoice" => "keysbadChoiceFCNEHL",
				"onTimeout" => "keystimeOutFCNEHL",
				"onHangup" => create_function("$event", "Prehangup()")
			)
		);

		if ($result->name == 'choice'){
			if($result->value == "More"){
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($result->value)." to hear more options.");
				$resultsub = gatherInput($subList, //"To forward this message in Loko, press 1. For Mandinka, press 2. For Mende, press 3. For Themne, press 4. For Wolof, press 5. To go back to the previous language choices, press 6.",
				array(
						"choices" => $subOptions . ", *(*, *)",
						"mode" => 'dtmf',
						"repeat" => 1,
						"bargein" => true,
						"timeout" => 5,
						"onBadChoice" => "keysbadChoiceFCNEHL",
						"onTimeout" => "keystimeOutFCNEHL",
						"onHangup" => create_function("$event", "Prehangup()")
					)
				);
				if ($resultsub->name == 'choice'){
					if($resultsub->value == "Previous"){
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($resultsub->value)." to go back to the previous menu.");
						$repeat = "TRUE";
					}
					else{
						writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($resultsub->value).".");
						$returnVal = $resultsub->value;
					}
				}						
			}
			else{
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "User selected ".($result->value).".");
				$returnVal = $result->value;
			}
		}
		if(!($returnVal == "AmerEnglish" || $returnVal == "GuinFrench" || $returnVal == "fulani" || $returnVal == "kissi" || $returnVal == "kono" || $returnVal == "sousou" || $returnVal == "krio" || $returnVal == "limba" || $returnVal == "sousou" || $returnVal == "loko" || $returnVal == "mende" || $returnVal == "sousou" || $returnVal == "themne" || $returnVal == "wolof" || $returnVal == "malinke" || $returnVal ==  "pular" || $returnVal == "kpele" || $returnVal == "toma" || $returnVal == "manon")){
			sayInt($EHL_prompts_dir."tobedone.wav");//"That message language option will be implemented soon."
			$repeat = "TRUE";
		}
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " returns $returnVal.");
	return $returnVal;
}

function switchSystemLanguage($lang, $pressed){
	global $Country;
	global $SystemLanguage;
	global $MessageLanguage;
	global $Polly_prompts_dir;
	global $EHL_prompts_dir;
	global $callid;
	global $fh;
	global $promptsBaseDir;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " called with params: $lang, $pressed");
	if($pressed == 'choice'){
		if($lang == "AmerEnglish" || $lang == "LibEnglish" || $lang == "GuinFrench" || $lang == "sousou"){// || $lang == "GuinFrench"
			$SystemLanguage = $lang;
			$Polly_prompts_dir = $promptsBaseDir.$SystemLanguage."/Polly/";
			$EHL_prompts_dir = $promptsBaseDir.$SystemLanguage."/EHL/";
			//sayInt($EHL_prompts_dir."switchingto.wav\n".$EHL_prompts_dir."$SystemLanguage.wav\n");//"Switching to ".
			
			$swMsgLangTo = $lang;
			if($lang == "LibEnglish"){
				$swMsgLangTo = "AmerEnglish";
			}
			switchMessageLanguage($swMsgLangTo, $pressed, "FALSE");
		}
		else{
			sayInt($EHL_prompts_dir."tobedone.wav");//"That language option will be implemented soon."
		}
	}
}

function switchMessageLanguage($lang, $pressed, $announce){
	global $Country;
	global $SystemLanguage;
	global $base_dir;
	global $MessageLanguage;
	global $healthMsgDir;
	global $Polly_prompts_dir;
	global $EHL_prompts_dir;
	global $callid;
	global $fh;
	global $msgLangchanged;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " called with params: $lang, $pressed, $announce");
	if($pressed == 'choice'){
		if($lang == "AmerEnglish" || $lang == "GuinFrench" || $lang == "fulani" || $lang == "kissi" || $lang == "kono" || $lang == "sousou" || $lang == "krio" || $lang == "limba" || $lang == "sousou" || $lang == "loko" || $lang == "mende" || $lang == "sousou" || $lang == "themne" || $lang == "wolof" || $lang == "malinke" || $lang == "pular" || $lang == "kpele" || $lang == "toma" || $lang == "manon"){
			$MessageLanguage = $lang;
			$healthMsgDir = $base_dir."EbolaMsgs/$MessageLanguage/";
			if($announce == "TRUE"){
				sayInt($EHL_prompts_dir."msglangchange.wav\n".$EHL_prompts_dir.$MessageLanguage.".wav\n");//"Messages will now be played in "
			}
			$msgLangchanged = "TRUE";
		}
		else{
			sayInt($EHL_prompts_dir."tobedone.wav");//"That message language option will be implemented soon."
			$msgLangchanged = "TRUE";
		}
	}
}

function bargeInToChangeLang($result, $breakLoop){
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " called with params: $breakLoop");
	if ($result->name == 'choice'){
		if($result->value == 0){
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Barged-in by pressing ".($result->value)." to change system language.");
			selectSystemLanguage();
			$breakLoop = "FALSE";
		}
		/*else if($result->value == 2){
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Barged-in by pressing ".($result->value)." to change system language to Sousou.");
			switchSystemLanguage('sousou', 'choice');
			$breakLoop = "FALSE";
		}*/
		else if($result->value == 3){
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Barged-in by pressing ".($result->value)." to change system language to GuinFrench.");
			switchSystemLanguage('GuinFrench', 'choice');
			$breakLoop = "FALSE";
		}
		else{
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Barged-in by pressed an invalid key (non-zero).");
		}
	}
	return $breakLoop;
}
//////////////////////////////////////////////////////////////////////////////////////
///////////////////////////// DB Access Functions ////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
function makeNewRec($callid){
	global $DB_dir;
	$url = $DB_dir."New_Rec.php?callid=$callid";
	$result = doCurl($url);
	return $result;
}

function callRecURI($url){
	global $tester;
	//////fwrite($tester, "in callRecURI  .\n");
	//////fwrite($tester,$url. " = callRecURI  .\n");
	$result = doCurl($url);
	return $result;
}

function makeNewCall($reqid, $phno, $status, $calltype, $chan){
	global $DB_dir;
	$url = $DB_dir."New_Call.php?reqid=$reqid&phno=$phno&calltype=$calltype&status=$status&ch=$chan";
	$result = doCurl($url);
	return $result;
}

function makeNewSess($reqid, $type, $ph){
	global $DB_dir;
	global $calltype;
	//$url = $DB_dir."New_Sess.php?reqid=$reqid&calltype=$type";
	//$url = "http://localhost/wa/DBScripts/New_Sess.php?calltype=$type&reqid=$reqid&ph=$ph";
	$url = $DB_dir."New_Sess.php?calltype=$type&reqid=$reqid&ph=$ph";
	$result = doCurl($url);
	return $result;
}

function makeNewReq($recid, $effect, $callid, $reqtype, $phno, $status, $syslang, $msglang, $ch){
	global $DB_dir;
	global $userid;
	global $testcall;
	$url = $DB_dir."New_Req.php?recid=$recid&effect=$effect&callid=$callid&reqtype=$reqtype&from=$userid&phno=$phno&status=$status&syslang=$syslang&msglang=$msglang&testcall=$testcall&ch=$ch";
	$result = doCurl($url);
	return $result;
}

function createMissedCall($recid, $effect, $callid, $reqtype, $phno, $status, $syslang, $msglang, $ch, $pollyid){
	global $DB_dir;
	global $userid;
	global $testcall;
	global $tester;
	$url = $DB_dir."New_Req.php?recid=$recid&effect=$effect&callid=$callid&reqtype=$reqtype&from=$pollyid&phno=$phno&status=$status&syslang=$syslang&msglang=$msglang&testcall=$testcall&ch=$ch";
				////fwrite($tester,"$url.\n");		
	$result = doCurl($url);
	return $result;
}

function makeNewTransferLog($callid, $phno, $event, $from, $to, $menuid){
	global $DB_dir;
	$url = $DB_dir."New_Transfer.php?callid=$callid&event=$event&from=$from&to=$to&menuid=$menuid&phno=$phno";
	$result = doCurl($url);
	return $result;
}


function appendXferred($app){
	global $DB_dir;
	global $callid;
	$url = $DB_dir."updateXferredTo.php?app=$app&callid=$callid";
	$result = doCurl($url);
	return $result;
}

function makeNewFB($fbtype, $callid){
	global $DB_dir;
	$url = $DB_dir."New_FB.php?fbtype=$fbtype&callid=$callid";
	$result = doCurl($url);
	return $result;
}

function makeNewEBQ($callid, $ph){
	global $DB_dir;
	$url = $DB_dir."New_EBQ.php?ph=$ph&callid=$callid";
	$result = doCurl($url);
	return $result;
}

function markCallEndTime($callid){
	global $DB_dir;
	$url = $DB_dir."Update_Call_Endtime.php?callid=$callid";
	$result = doCurl($url);
	return $result;
}

function updateCallStatus($callid, $status){
	global $DB_dir;
	$url = $DB_dir."Update_Call_Status.php?callid=$callid&status=$status";
	$result = doCurl($url);
	return $result;
}

function updateRequestStatus($reqid, $status){
	global $DB_dir;
	global $channel;
	$url = $DB_dir."Update_Request_Status.php?reqid=$reqid&status=$status&ch=$channel";
	$result = doCurl($url);
	return $result;
}

function updateFollowupStatus($reqid, $status){
	global $DB_dir;
	$url = $DB_dir."Update_Request_Followup.php?reqid=$reqid&fwstatus=$status";
	$result = doCurl($url);
	return $result;
}

function updateWaitingDlvRequests($id){
	global $DB_dir;
	$url = $DB_dir."Update_Waiting_DLV_Reqs.php?rcallid=$id";
	$result = doCurl($url);
	return $result;
}

function gaveFeedBack($ph){
	global $DB_dir;
	global $CallTableCutoff;
	$url = $DB_dir."gave_feedback.php?ph=$ph&cutoff=$CallTableCutoff";
	$result = doCurl($url);
	return $result;
}

function updateFeedbackNotifyStatus($fbid, $notify){
	global $DB_dir;
	$url = $DB_dir."Update_FB_Notify.php?fbid=$fbid&notify=$notify";
	$result = doCurl($url);
	return $result;
}

function getPhNo(){
	global $DB_dir;
	global $ocallid;
	$url = $DB_dir."GetPhNo.php?callID=$ocallid";
	$result = doCurl($url);
	return $result;
}

function getPreferredLangs($id){
	global $DB_dir;
	$url = $DB_dir."GetPreferredLangs.php?id=$id";
	$result = doCurl($url);
	return $result;
}

// Function to send Information to BJ
function addToBJLogs($callid, $fh, $sender, $friend, $recid, $count){
	global $praat_dir;	
	
	$URL = $praat_dir."ModifiedRecordings/". getFilePath($recid.".wav", "TRUE") . $count."-s-".$recid.".wav";
	$URLEnc = urlencode($URL);
	$curlString = "http://test.babajob.com/services/service.asmx/PollyInvitation?inviteeMobile=$friend&invitorMobile=$sender&invitorVoiceNameUrl=$URLEnc&serviceName=polly&servicePassword=pollytalks";
	$response = doCurl($curlString);
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "Response: ".$response.", URL invoked: ".$curlString);
}

function isThisAMissedCall(){
	global $userid;
	global $TreatmentGroup;
	
	/*if($userid == '03334204496'){
		return 0;
	}*/
	
	
	if(inAnyTG($userid) > 0){
		$TreatmentGroup = getTG($userid);
	}
	
	$AgeToday = getAgeToday($userid);
	if($AgeToday <= ($TreatmentGroup)){
		return 1;
	}
	else{
		return 0;
	}
}

function getQ(){
	global $DB_dir;
	$url = $DB_dir."GetQ.php";
	$result = doCurl($url);
	return $result;
}

function getk(){
	global $DB_dir;
	$url = $DB_dir."Getk.php";
	$result = doCurl($url);
	return $result;
}

function inTGx($ph, $tg){
	global $DB_dir;
	$url = $DB_dir."search_TGx.php?ph=$ph&tg=$tg";
	$result = doCurl($url);
	return $result;
}

function getTGxD($ph, $tg){
	global $DB_dir;
	$url = $DB_dir."get_TGxD.php?ph=$ph&tg=$tg";
	$result = doCurl($url);
	return $result;
}

function hasThisGuyEverHeardQuota($ph, $tg){
	global $DB_dir;
	$url = $DB_dir."has_Ever_Heard_Quota.php?ph=$ph&tg=$tg";
	$result = doCurl($url);
	return $result;
}

function IsQuotaApplicable($ph, $tg){
	global $DB_dir;
	$url = $DB_dir."IsQuotaAppliedToday.php?ph=$ph&tg=$tg";
	$result = doCurl($url);
	return $result;
}

function setHeardBye($phno){
	global $callid;
	global $DB_dir;
	$url = $DB_dir."setHeardBye.php?phno=$phno&callid=$callid";
	$result = doCurl($url);
	return $result;
}

function getCountryCode($ph){
	global $DB_dir;
	$url = $DB_dir."CountryCode.php?ph=$ph";
	$result = doCurl($url);
	if($result != "Not found."){
		return explode(" - ", $result)[0];
	}
	return "";
}

function phoneNumBeforeAndAfterConditioning($before, $after, $type, $sender){
	global $callid;
	global $DB_dir;
	$url = $DB_dir."Update_Conditioned_PhNo.php?callid=$callid&uncond=$before&cond=$after&type=$type&sender=$sender";
	$result = doCurl($url);
	return $result;
}

function doesFileExist($fname){
	global $scripts_dir;
	$url = $scripts_dir."doesFileExist.php?fname=$fname";
	$result = doCurl($url);
	return $result;
}

function whatWasTheChannelOfTheOriginalRequest($OrigReqID){
	global $DB_dir;
	$url = $DB_dir."getReqChannel.php?id=$OrigReqID";
	$result = doCurl($url);
	return $result;
}

/////////////////// Cutoff based functions start ///////////////////////////
function getAgeToday($ph){
	global $DB_dir;
	global $calltype;
	global $CallTableCutoff;
	$url = $DB_dir."AgeToday.php?phno=$ph&type=$calltype&cutoff=$CallTableCutoff";
	$result = doCurl($url);
	return $result;
}

function getAgeinDays($ph){
	global $DB_dir;
	global $calltype;
	global $CallTableCutoff;
	$url = $DB_dir."AgeinDays.php?phno=$ph&type=$calltype&cutoff=$CallTableCutoff";
	$result = doCurl($url);
	return $result;
}

function searchCalls($ph){
	global $DB_dir;
	global $calltype;
	global $CallTableCutoff;
	$url = $DB_dir."search_calls.php?ph=$ph&type=$calltype&cutoff=$CallTableCutoff";
	$result = doCurl($url);
	return $result;
}

function searchPh($ph, $application){
	global $DB_dir;
	global $CallTableCutoff;
	$url = $DB_dir."search_phno.php?ph=$ph&app=$application&cutoff=$CallTableCutoff";
	$result = doCurl($url);
	return $result;
}

function searchCallsReq($ph){
	global $DB_dir;
	global $calltype;
	global $ReqTableCutoff;
	$url = $DB_dir."search_calls_hist.php?ph=$ph&type=$calltype&cutoff=$ReqTableCutoff";
	$result = doCurl($url);
	return $result;
}

function updateCallsReq($ph){
	global $DB_dir;
	global $ReqTableCutoff;
	$url = $DB_dir."update_calls_hist.php?ph=$ph&cutoff=$ReqTableCutoff";
	$result = doCurl($url);
	return $result;
}

/////////////////// Cutoff based functions end ///////////////////////////
function readAndInc(){
	global $DB_dir;
	$url = $DB_dir."ReadInc.php";
	$result = doCurl($url);
	return $result;
}

function readAndIncx($k){
	global $DB_dir;
	$url = $DB_dir."ReadIncx.php?k=$k";
	$result = doCurl($url);
	return $result;
}

function inAnyTG($ph){
	global $DB_dir;
	$url = $DB_dir."search_TG.php?ph=$ph";
	$result = doCurl($url);
	return $result;
}

function getTG($ph){
	global $DB_dir;
	$url = $DB_dir."get_TG.php?ph=$ph";
	$result = doCurl($url);
	return $result;
}

function addToTG($tg){
	global $DB_dir;
	global $userid;
	$url = $DB_dir."add_to_TG.php?ph=$userid&tg=$tg";
	$result = doCurl($url);
	return $result;
}

function addToTGx($Q, $k){
	global $DB_dir;
	global $userid;
	$url = $DB_dir."add_to_TGx.php?ph=$userid&Q=$Q&k=$k";
	$result = doCurl($url);
	return $result;
}

function setLastPlayedOn($tg){
	global $DB_dir;
	global $userid;
	$url = $DB_dir."set_last_played_on.php?ph=$userid&tg=$tg";
	$result = doCurl($url);
	return $result;
}

function getLastPlayedOn($tg){
	global $DB_dir;
	global $userid;
	$url = $DB_dir."get_last_played_on.php?ph=$userid&tg=$tg";
	$result = doCurl($url);
	return $result;
}

function getCallTableCutoff($days){
	global $DB_dir;
	$url = $DB_dir."getCallTableCutoff.php?days=$days";
	$result = doCurl($url);
	return $result;
}

function getReqTableCutoff($days){
	global $DB_dir;
	global $userid;
	$url = $DB_dir."getReqTableCutoff.php?days=$days";
	$result = doCurl($url);
	return $result;
}

//-------------------------------
function doesFileExistHTTP($path){
	global $DB_dir;
	$url = $DB_dir."doesFileExistHTTP.php?path=".urlencode($path);
	$result = doCurl($url);
	return $result;
}

function availableMsgFiles($supportedMsglangs, $currMsgPath){
	global $base_dir;

	$availableLangs = array();
	$len = count($supportedMsglangs);
	$count = 0;
	for($i=0; $i<$len; $i++){
		$path = $base_dir."EbolaMsgs/".$supportedMsglangs[$i]."/".$currMsgPath;
		if(doesFileExistHTTP($path) == "TRUE"){
			$availableLangs[$count] = $supportedMsglangs[$i];
			$count++;
		}
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", "av Langs: ".print_r($availableLangs, true));
	return $availableLangs;
}

function getEbolaMsgList($category){
	global $DB_dir;
	$url = $DB_dir."GetEbolaMsgList.php?cat=$category";
	$result = doCurl($url);
	return $result;
}

function GetEbolaMsgListbyUser($category, $ph, $dlvid){
	global $DB_dir;
	$url = $DB_dir."GetEbolaMsgListbyUser.php?cat=$category&ph=$ph&dlvid=$dlvid";
	$result = doCurl($url);
	return $result;
}

function incPlayedAppendUser($ph, $msgid){
	global $DB_dir;
	global $MessageLanguage;
	global $callid;
	$url = $DB_dir."markEbolaMsgPlayed.php?msgid=$msgid&ph=$ph&lang=$MessageLanguage&callid=$callid";
	$result = doCurl($url);
	return $result;
}

function hasUserHeardThisMsg($ph, $msgid){
	global $DB_dir;
	$url = $DB_dir."hasUserHeardMsg.php?msgid=$msgid&ph=$ph";
	$result = doCurl($url);
	return $result;
}

function PathToMsgID($dir, $file){
	global $DB_dir;
	$url = $DB_dir."GetEbolaMsgID.php?dir=$dir&file=$file";
	$result = doCurl($url);
	return $result;
}

function MsgIDToPath($id){
	global $DB_dir;
	$url = $DB_dir."GetEbolaIDToPath.php?dlvid=$id";
	$result = doCurl($url);
	return $result;
}

function getMaxEbID_LessThanID($id, $category){
	global $DB_dir;
	$url = $DB_dir."Max_EbID_LessThanID.php?ID=$id&cat=$category";
	$result = doCurl($url);
	return $result;
}
function getMinEbID_GreaterThanID($id, $category){
	global $DB_dir;
	$url = $DB_dir."Min_EbID_GreaterThanID.php?ID=$id&cat=$category";
	$result = doCurl($url);
	return $result;
}
function incNoOfTimesPlayedEb($id){
	global $DB_dir;
	$url = $DB_dir."Inc_NoOfTimesPlayedEb.php?ID=$id";
	$result = doCurl($url);
	return $result;
}
function playNextEbMsg(){
	global $DB_dir;
	//http://127.0.0.1/wa/DBScripts/Get_EbMsgNameAndDir.php?id=1
	// General\1.wav
}
//-------------------------------
//-------------------------------
function getMaxAdID(){
	global $DB_dir;
	$url = $DB_dir."Max_AdID.php";
	$result = doCurl($url);
	return $result;
}
function getMaxAdID_LessThanID($id){
	global $DB_dir;
	$url = $DB_dir."Max_AdID_LessThanID.php?ID=$id";
	$result = doCurl($url);
	return $result;
}
function getMinAdID_GreaterThanID($id){
	global $DB_dir;
	$url = $DB_dir."Min_AdID_GreaterThanID.php?ID=$id";
	$result = doCurl($url);
	return $result;
}
function incNoOfTimesPlayed($id){
	global $DB_dir;
	$url = $DB_dir."Inc_NoOfTimesPlayed.php?ID=$id";
	$result = doCurl($url);
	return $result;
}
function newAdsPlayedbyPhNo($adid, $phno){
	global $DB_dir;
	$url = $DB_dir."New_Ads_played_by_phno.php?adid=$adid&phno=$phno";
	$result = doCurl($url);
	return $result;
}
function newAdsPlayedbyCallID($adid, $cid){
	global $DB_dir;
	$url = $DB_dir."New_Ads_played_by_CallID.php?adid=$adid&cid=$cid";
	$result = doCurl($url);
	return $result;
}
//-------------------------------
//&&$$** Added Functions
// functions to encode, decode, store phone numbers
function PhToKeyAndStore($phno, $sender){
	global $DB_dir;
	global $tester;
	////fwrite($tester,"hello". $phno." in PhToKeyAndStore ..asd\n");
	$url = $DB_dir."insertNewPhByMatchingFromOldTable.php?sender=$sender&ph=".$phno;
	$result = doCurl($url);
	////fwrite($tester, $url."\n");
	////fwrite($tester, "result".$result."\n");
	return $result;
}

function PhToKey($ph){
	global $DB_dir;
	$url = $DB_dir."phToKey.php?ph=$ph";
	$result = doCurl($url);
	return $result;
}

function KeyToPh($key){
	global $DB_dir;
	$url = $DB_dir."keyToPh.php?key=$key";
	$result = doCurl($url);
	return $result;
}

// Phone Directory Functions
function getPhDir(){
	global $userid;
	global $DB_dir;
	$url = $DB_dir."getPhDir.php?user=$userid";
	$result = doCurl($url);
	return $result;
}

function updatePhDir($phoneNumber){
	global $userid;
	global $DB_dir;
	$url = $DB_dir."updatePhDir.php?user=$userid&friend=$phoneNumber";
	$result = doCurl($url);
	return $result;
}

//////////////////////////////////////////////////////////////////////////////////////
///////////////////////////// Misc. Functions ////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
function sendUnSubSMS($ph){
	global $fh;
	global $callid;
	$To_Whom = $ph;
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Sending an SMS to: ".$To_Whom." to inform him about the unsub number.");
	//$message = doCurl("http://65.98.91.179/lumspolly/?username=lums&password=lUmSPoLLy&message=Abhi%2004238333112%20per%20call%20ker%20kay%20baghair%20kisi%20intizar%20kay%20Mian%20Mithoo%20say%20baat%20kerain%20(Iss%20call%20ki%20qemat%20aap%20ko%20ada%20kerni%20ho%20gi).&number=$To_Whom");
	$message = doCurl("http://api.tropo.com/1.0/sessions?action=create&token=1950c84caa3aa1489428e3946049fdfa96c92736612b6abb738b004d0c8f12c253ae0bdec48ab3828dd1d89d&msg=Abhi%2004238333112%20per%20call%20ker%20kay%20baghair%20kisi%20intizar%20kay%20Mian%20Mithoo%20say%20baat%20kerain%20(Iss%20call%20ki%20qemat%20aap%20ko%20ada%20kerni%20ho%20gi).&ph=$To_Whom");
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "System returned: ".$message);
	
}

function sendLogs(){
	global $DB_dir;
	global $callid;
	global $logEntry;
	global $tester;//change testing
		
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " called.");
	
	$LogScript = $DB_dir."createLogs.php";
	
	$arr = explode('^', chunk_split($logEntry, 1000, '^'));		// Send logs in chunks of 1000 characters
	$i=0;
	$len = count($arr);
	while($i < $len){
		$datatopost = array (
			"callid" => $callid,
			"data" => $arr[$i]
		);

		$ch = curl_init ($LogScript);
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $datatopost);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		$returndata = curl_exec ($ch);
				
		$i++;
	}
}

function isForwardingAllowedToThisPhNo($phno, $recID, $recType, $effectNo){	//returns yes or no. $recType is 'ad' or 'msg'
	global $forwardedTo;	// Array of (EncPhNo-EffectNo, Number of times in this call)
	global $fh;
	global $callid;
	$NoOfTimes = 0;			// how many deliveries have been tried to schedule to this phone number, with this same effect in this call before now?
	$isThisFeatureEnabled = "true";		// false means always return a yes
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "Now checking if this message has been scheduled for this same phone number in this same call with the same effect before: " . $phno . "-" .  $recType . "-" . $recID . "-" . $effectNo . ".");
	if(isset($forwardedTo[$phno . "-" .  $recType . "-" . $recID . "-" . $effectNo])){
		$NoOfTimes = $forwardedTo[$phno . "-" .  $recType . "-" . $recID . "-" . $effectNo];
		$forwardedTo[$phno . "-" .  $recType . "-" . $recID . "-" . $effectNo]++;
	}
	else{
		// $NoOfTimes is already set to 0
		$forwardedTo[$phno . "-" .  $recType . "-" . $recID . "-" . $effectNo] = 1;
	}
	
	if($isThisFeatureEnabled == "true"){
		if($NoOfTimes == 0){	// $NoOfTimes == 0 only allows one delivery per effect, per call, per recipient
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "This message has been scheduled for this same phone number in this same call with the same effect " . $NoOfTimes . " times before. Now allowing a new request.");
			return "yes";
		}
		else{
			writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "This message has been scheduled for this same phone number in this same call with the same effect " . $NoOfTimes . " times before. Now preventing a new request.");
			return "no";
		}
	}
	else{
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "This message has been scheduled for this same phone number in this same call with the same effect " . $NoOfTimes . " times before. Now allowing a new request.");
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", "User is allowed to send multiple messages to the same phone num with the same effect in this call as the check is disabled.");
		return "yes";
	}
}

function pauseHere($BegOnly){
	global $newCall;
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " is called with param: $BegOnly");
	if($BegOnly == "FALSE"){
		sleep(0.7);
	}
	else if($newCall == "TRUE"){
		$newCall = "FALSE";
		sleep(1);
	}
}

function checkIfPhNoValid($phno){

	$phno = rtrim($phno, "*");
	$phno = ltrim($phno, "*");
	$phno = rtrim($phno, "#");

	if(sizeof($phno) < 11 || sizeof($phNo) > 15)
		return false;
	
	$phno = str_replace("+", "00", $phno);

	if(is_numeric($phno)){
		if ($phno[0] == 0 || $phno[0] == "0") {
			return true;
		}
		return true;
	}
	return false;
}

function conditionPhNo($phno, $type){
	global $useridUnEnc;
	global $countryCode;
	$returnNumber = $phno;
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " is called with ph: $phno and type: $type");
	
	if($type == "Missed_Call" || $type == "EMissed_Call" || $type == "AMissed_Call" || $type == "MMissed_Call" || $type == "BMissed_Call" || $type == "Unsubsidized" || $type == "FCMissed_Call"){
		if(substr($returnNumber, 0, 1) == '1'){										// 1 got prepended by mistake
			$returnNumber = substr($returnNumber, 1, strlen($returnNumber)-1);		// remove it
		}
		else if(strlen($phno) <= 10){						//local US	e.g. 4122677909
			$returnNumber = "1".$phno;						// 1 is to say that missed call is coming in from US
		}
		else{												// International
			$returnNumber = $phno;
		}
	}
	else if($type == "Delivery" || $type == "EDelivery" || $type == "BDelivery" || $type == "ADelivery" || $type == "MDelivery" || $type == "FCDelivery"){
		$returnNumber = $phno;
		if(substr($returnNumber, 0, 2) == '00'){			// A non-US sender entered an Intl. number with country code
			$returnNumber = ltrim($returnNumber, 0);
		}
		else if(substr($returnNumber, 0, 3) == '011'){		// A US sender entered an Intl. number with country code
			$returnNumber = substr($returnNumber, 3, strlen($returnNumber)-3);
		}
		else if(substr($returnNumber, 0, 1) == '0'){					// A non-US sender entered a local number
			$returnNumber = $returnNumber;	//$countryCode . ltrim($returnNumber, 0);		// Prepend the country code of the sender
		}
		else if((strlen($returnNumber)==9) && $countryCode == '224'){	// A Guinean sender entered a local number without a 0 prefix
			$returnNumber = $countryCode . ltrim($returnNumber, 0);		// Prepend the country code of Guinea
		}
		else if((strlen($useridUnEnc) == 11) && (substr($useridUnEnc, 0, 1) == 1) && (strlen($returnNumber)==10)){	// A US sender entered a 10-dig number without country code -> Assmue it is a US number
			$returnNumber = $returnNumber; //"1".$returnNumber;
		}
		phoneNumBeforeAndAfterConditioning($phno, $returnNumber, $type, $useridUnEnc);
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " is returning: $returnNumber");
	return $returnNumber;
}

function createLogFile($id){
	global $logFilePath;
	//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " is called with id: $id");
	
	if(!file_exists($logFilePath."\\".date('Y'))){ 
		mkdir($logFilePath."\\".date('Y'));
	} 
	if(!file_exists($logFilePath."\\".date('Y')."\\".date('m'))){ 
		mkdir($logFilePath."\\".date('Y')."\\".date('m'));
	} 
	if(!file_exists($logFilePath."\\".date('Y')."\\".date('m')."\\".date('d'))){ 
		mkdir($logFilePath."\\".date('Y')."\\".date('m')."\\".date('d'));
	}
	
	$now = new DateTime;
	$timestamp = $now->format('Y-m-d_H-i-s');
	$logFile = $logFilePath."\\".$now->format('Y')."\\".$now->format('m')."\\".$now->format('d')."\\log_".$timestamp."_".$id.".txt"; // Give a caller ID based name

	$handle = fopen($logFile, 'a');
	/*echo "HAH!:";
	var_dump($handle);*/
	return $handle;
}

function schedSMS($phno, $type){
	global $callid;
	global $userid;
	global $SystemLanguage;
	global $MessageLanguage;
    global $channel;
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " is called with ph: $phno and type: $type");
	if($type=='Del'){
		//$url = "http://65.98.91.179/lumspolly/?username=lums&password=lUmSPoLLy&message=04238333111%20per%20muft%20call%20kerain.%20Bas%20missed%20call%20kerain%20aur%20Mian%20Mithoo%20khud%20aap%20ko%20call%20karay%20ga.&number=$phno";
		$smsreq = makeNewReq('0', '0', $callid, "SMSDelivery", $userid, "WPending", $SystemLanguage, $MessageLanguage, $channel);
	}
	else if($type=='JDel'){
		//$url = "http://65.98.91.179/lumspolly/?username=lums&password=lUmSPoLLy&message=04238333111%20per%20muft%20nokri%20kay%20ishtihar%20sunain.%20Bas%20missed%20call%20kerain%20aur%20Mian%20Mithoo%20khud%20aap%20ko%20call%20karay%20ga.&number=$phno";
		$smsreq = makeNewReq('0', '0', $callid, "SMSJDelivery", $userid, "WPending", $SystemLanguage, $MessageLanguage, $channel);
	}
	else if($type=='EDel'){
		//$url = "http://65.98.91.179/lumspolly/?username=lums&password=lUmSPoLLy&message=04238333111%20per%20muft%20nokri%20kay%20ishtihar%20sunain.%20Bas%20missed%20call%20kerain%20aur%20Mian%20Mithoo%20khud%20aap%20ko%20call%20karay%20ga.&number=$phno";
		$smsreq = makeNewReq('0', '0', $callid, "SMSEDelivery", $userid, "WPending", $SystemLanguage, $MessageLanguage, $channel);
	}
	else if($type=='BDel'){
		//$url = "http://65.98.91.179/lumspolly/?username=lums&password=lUmSPoLLy&message=04238333111%20per%20muft%20nokri%20kay%20ishtihar%20sunain.%20Bas%20missed%20call%20kerain%20aur%20Mian%20Mithoo%20khud%20aap%20ko%20call%20karay%20ga.&number=$phno";
		$smsreq = makeNewReq('0', '0', $callid, "SMSBDelivery", $userid, "WPending", $SystemLanguage, $MessageLanguage, $channel);
	}
	else if($type=='ADel'){
		//$url = "http://65.98.91.179/lumspolly/?username=lums&password=lUmSPoLLy&message=04238333111%20per%20muft%20nokri%20kay%20ishtihar%20sunain.%20Bas%20missed%20call%20kerain%20aur%20Mian%20Mithoo%20khud%20aap%20ko%20call%20karay%20ga.&number=$phno";
		$smsreq = makeNewReq('0', '0', $callid, "SMSADelivery", $userid, "WPending", $SystemLanguage, $MessageLanguage, $channel);
	}
    else if($type=='MDel'){
		//$url = "http://65.98.91.179/lumspolly/?username=lums&password=lUmSPoLLy&message=04238333111%20per%20muft%20nokri%20kay%20ishtihar%20sunain.%20Bas%20missed%20call%20kerain%20aur%20Mian%20Mithoo%20khud%20aap%20ko%20call%20karay%20ga.&number=$phno";
        $smsreq = makeNewReq('0', '0', $callid, "SMSMDelivery", $userid, "WPending", $SystemLanguage, $MessageLanguage, $channel);
    }
    else if($type=='ForecariahDel'){
        $smsreq = makeNewReq('0', '0', $callid, "SMSFCDelivery", $userid, "WPending", $SystemLanguage, $MessageLanguage, $channel);
    }
    
	//$result = doCurl($url);
	//return $result;
}

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

function doCurlPost($url, $postVars){
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " is called.");

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postVars);

	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
	// receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$result = curl_exec($ch);
	curl_close($ch);
	
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " called with url: $url, is returning: $result");
	
	return $result;	
}

function getFilePath($fileName, $pathOnly = "FALSE")
{
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " is called.");

	$fname = explode('.', $fileName);
	
	$FilePath = ($fname[0] - ($fname[0] % 1000));		// rounding down to the nearest 1000
	
	$File = $FilePath."/".$fileName;
	if($pathOnly == "TRUE"){
		$File = $FilePath . "/";
	}

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L0", __FUNCTION__ . " called with params: $fileName, $pathOnly, is returning: $File");

	return $File;
}

function createFilePath($filePath,$fileName, $pathOnly = "FALSE")
{
	global $tester;
	
	$fname = explode('.', $fileName);
	$FilePathNew = $filePath.($fname[0] - ($fname[0] % 1000));		// rounding down to the nearest 1000
	//////fwrite($tester,$fname[0]." path of file.\n");
	
	if( is_dir($FilePathNew) === false )
	{
	    mkdir($FilePathNew);
	}
	$File = $FilePathNew."\\".$fileName;
	if($pathOnly == "TRUE"){
		$File = $FilePathNew . "\\";
	}
	return $File;
}


////////////////////////////////////////////// Free Switch lib //////////////////////


function event_socket_create($host, $port, $password) {
	global $fp;

   $fp = fsockopen($host, $port, $errno, $errdesc) 
     or die("Connection to $host failed");
   socket_set_blocking($fp,false);
   
   
   if ($fp) {
       while (!feof($fp)) {
          $buffer = fgets($fp, 1024);
          usleep(50); //allow time for reponse
          if (trim($buffer) == "Content-Type: auth/request") {
             fputs($fp, "auth $password\n\n");
             break;
          }
       }
       return $fp;
    }
    else {
        return false;
    }           
}

function event_socket_request($fp, $cmd) {
 
    if ($fp) {   
       
        fputs($fp, $cmd."\n\n");    
        usleep(50); //allow time for reponse
        
        $response = "";
        $i = 0;
        $contentlength = 0;
        while (!feof($fp)) {
           $buffer = fgets($fp, 4096);
           if ($contentlength > 0) {
              $response .= $buffer;
           }
           
           if ($contentlength == 0) { //if contentlenght is already don't process again
               if (strlen(trim($buffer)) > 0) { //run only if buffer has content
                   $temparray = explode(":", trim($buffer));
                   if ($temparray[0] == "Content-Length") {
                      $contentlength = trim($temparray[1]);
                   }
               }
           }
           
           usleep(50); //allow time for reponse
           
           //optional because of script timeout //don't let while loop become endless
           if ($i > 100000) { break; } 
           
           if ($contentlength > 0) { //is contentlength set
               //stop reading if all content has been read.
               if (strlen($response) >= $contentlength) {  
                  break;
               }
           }
           $i++;
        }
        
        return $response;
    }
    else {
      echo "no handle";
    }
}

function hangupFT(){
	global $FreeSwitch;
	global $uuid;
	global $fp;
	
	if($FreeSwitch == "false"){
		hangup();
	}
	else{
		if(isset($_REQUEST["uuid"])){			# code...	
			$cmd = "api lua hangup.lua ".$uuid;
			$response = event_socket_request($fp, $cmd);
			fclose($fp);
		}
	}
}

function makechoices($choices){
	//types seen "[1 DIGITS], *" , "[1 DIGITS]" , "sometext(1,sometext)"
	$fchoices = "";
	if($choices[0] == '[')
	{
		//tokenizing all possible choices
		$pchoices = explode(",",$choices);
		$i = 1;
		
		while($pchoices[0][$i] != ' ' && $i < strlen($pchoices[0]))
		{
			$fchoices .= $pchoices[0][$i];
			 ++$i;
		}
		
		if(strlen($fchoices ) > 1)
		{
			$fchoices=str_replace("-","",$fchoices);
		}
		$j=1;

		while($j<count($pchoices))
		{
			$fchoices .= trim($pchoices[$j]);
			++$j;
		}

	}
	else
	{
		$i = 0;
		while($i< strlen($choices))
		{
			$j = $i;
			$cchoices = "";//choice in context
			
			
			while($choices[$j] != '(')
			{
				$j++;
			
			}
			$j++;
			
			while($choices[$j] != ')')
			{
				$cchoices .= $choices[$j];
				$j++;
			
			}
			$j++;
			$i=$j;
			$pchoices = explode(",",$cchoices);
			$fchoices .= $pchoices[0];
			
			
		}
			
	}

	return $fchoices;
}

//to make regex for valid input freeswitch like [1 digits], * => \\d+ or 1234* => [1234]
function makeValidINput($choices,$fchoices)
{
	if($choices[0] == '[')
	{
		return "d" ;
	}
	else
	{
		$valid = '[';
		$i = 0;
		while($i<strlen($fchoices))
		{
			if($fchoices[$i]!='*' && $fchoices[$i]!='#' )
			{
				$valid .= $fchoices[$i];
			}
			$i++;
		}
		$valid .= ']';
		return $valid;
	}
}
//fchoices choice for freeswitch
//making terms
function makeTerminators($fchoices,$terms)
{
	$termsin = "";
	$i = 0;
	$b = 0;
	while($i<strlen($fchoices))
	{
		if($fchoices[$i]=='*' || $fchoices[$i]=='#' )
		{
			$b = 1;
			$termsin .= $fchoices[$i];
		}
		$i++;
	}
	if($terms == "@" && $b == 1)
	{
		return $termsin;
	}
	else
	{
		$terms.=$termsin;
		return $terms;
	} 
}
//fchoice return by freeswitch map corrosponding class, 1 for notify 
function mapChoice($choices,$fchoice)
{
	if($choices[0] == '[')
	{
		return $fchoice;
	}
	else
	{
		$i = 0;
		while($i< strlen($choices))
		{
			$j = $i;
			$cchoices = "";//choice in context
			
			
			while($choices[$j] != '(')
			{
				$j++;
			
			}
			$j++;
			
			while($choices[$j] != ')')
			{
				$cchoices .= $choices[$j];
				$j++;
			
			}
			$j++;
			$i=$j;
			$pchoices = explode(",",$cchoices);
			if($fchoice == $pchoices[0])
			{
				return $pchoices[1];
			}
			
			
			
		}

		return $fchoice;
			
	}
}

function calculateMaxDigits($choices,$fchoice)
{
	if($choices[0]=="[")
	{
		$i= strpos($choices,'-');
		if( $i !== false ) 
		{
			$subchoice = "";//the part 9-14 in [9-14 digits]
			$i=1;
			
			while($choices[$i]=="-" || is_numeric($choices[$i]))
			{
				
				$subchoice .= $choices[$i];
				$i++;
				
			}
			$subchoice = explode("-",$subchoice);
			$max=(int)($subchoice[1]);
			
		}
		else
		{
			$subchoice = "";//the part 9 in [9 digits]
			$i=1;
			while( is_numeric($choices[$i]))
			{
				$subchoice .= $choices[$i];
				$i++;
			}
			$max=(int)($subchoice);
		}
		return $max;
	}
	else
	{
		
		return 1;//in these kind of choices like notify(1,notify),donotnotify(2,donotnotify),*(*,*) at a time input numbers require is 1 always
	}

}


function calculateMinDigits($choices,$fchoice)
{
	if($choices[0]=="[")
	{
		$i= strpos($choices,'-');
		if( $i !== false ) 
		{
			$subchoice = "";//the part 9-14 in [9-14 digits]
			$i=1;
			
			while($choices[$i]=="-" || is_numeric($choices[$i]))
			{
				
				$subchoice .= $choices[$i];
				$i++;
				
			}
			$subchoice = explode("-",$subchoice);
			$min=(int)($subchoice[0]);
			
		}
		else
		{
			$subchoice = "";//the part 9 in [9 digits]
			$i=1;
			while( is_numeric($choices[$i]))
			{
				$subchoice .= $choices[$i];
				$i++;
			}
			$min=(int)($subchoice);
		}
		return $min;
	}
	else
	{
		return 1;//in these kind of choices like notify(1,notify),donotnotify(2,donotnotify),*(*,*) at a time input numbers require is 1 always
	}
}
//to handle if invalid key is entered for freeswitch
//make sure to make proper changes before integrating it to poly
function invalid($onBadCoice)
{
	global $Polly_prompts_dir;
	global $EHL_prompts_dir;
	global $BadChoiceKeys;
	
	if ( $onBadCoice == "keysbadChoiceFCN" )
	{
		return $Polly_prompts_dir."Wrongbutton.wav";
	}
	else//for keysbadChoiceFCNEHL
	{
		return $EHL_prompts_dir."Wrongbutton.wav";
	}
}
//to handle if timeout occured for freeswitch
function onTimeOut($onTimeout)
{
	global $Polly_prompts_dir;
	global $ReM_prompts;
	global $EHL_prompts_dir;
	global $TimeOutKeys;
	if ( $onTimeout == "keystimeOutFCN" )
	{
		return $Polly_prompts_dir."Nobutton.wav";
	}else if ( $onTimeout == "ReMkeystimeOutFCN" )
	{
		return $ReM_prompts."Nobutton.wav";
	}
	else//for keystimeOutFCNEHL
	{
		return $EHL_prompts_dir."Nobutton.wav";
	}
}
function gatherInputTropo($toBeSaid, $params)
{
	$repeat = "TRUE";
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was called with prompt: " . $toBeSaid . " and parameters: " . implode(', ', $params));
	while($repeat == "TRUE"){
		$repeat = "FALSE";
		$result = ask($toBeSaid, $params);
	//	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "The ask() in " . __FUNCTION__ . " is now complete.");
		if($result->value == "*"){	// pause the system
			//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was paused by pressing *.");
			ask("", 
			array(	"choices" => "[1 DIGITS], *", 
					"mode" => 'dtmf', 
					"repeat" => 1, 
					"bargein" => true, 
					"timeout" => 300, 
					"onHangup" => create_function("$event", "Prehangup()")
				)
			);
			$repeat = "TRUE";
			//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " resumed.");
		}
	}
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " complete. Now returning: value: " . ($result->value) . ", name: " . ($result->name) . ", attempt: " . ($result->attempt) . ", choice: " . ($result->choice));
	return $result;
}
function gatherTnputFreeSwitch($toBeSaid,$invalidFS,$mindigitsFS,$maxdigitsFS,$maxattemptsFS,$timeoutFS,$bargein,$termFS,$validInput,$onTimeOutFS,$interdigitTimeout)
{

	global $uuid;
	global $fp;
	global $tester;//change testing
	//////fwrite($tester, "in gatherTnputFreeSwitch  .\n");

	/* uncomment to test what the params you are getting
	fwrite($fh, "invalidFS".""." ".$invalidFS."\n");
	fwrite($fh, "mindigitsFS".""." ".$mindigitsFS."\n");
	fwrite($fh, "maxdigitsFS".""." ".$maxdigitsFS."\n");
	fwrite($fh, "maxattemptsFS".""." ".$maxattemptsFS."\n");
	fwrite($fh, "timeoutFS".""." ".$timeoutFS."\n");
	fwrite($fh, "bargein".""." ".$bargein."\n");
	fwrite($fh, "termFS".""." ".$termFS."\n");
	fwrite($fh, "validInput".""." ".$validInput."\n");
	fwrite($fh, "onTimeOutFS".""." ".$onTimeOutFS."\n");
	fwrite($fh, "interdigitTimeout".""." ".$interdigitTimeout."\n");
	*/
	$output = (object) array('name' => 'choice', 'value' => '');
	$repeat = "TRUE";

	$kaho = "file_string://";
		$s=preg_split('/[ \n]/', $toBeSaid);
        for($i=0;$i<count($s);$i++)
        {
        	$j = 0;
        	if($s[0]=="")
        	{
        		$j = 1;
        	}
        	if($i>$j)
        	{
        		$kaho .= "!".$s[$i];
        	}
        	else
        	{
        		$kaho .= $s[$i];
        	}
        	
        }


	//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was called with prompt: " . $toBeSaid . " and parameters: " . implode(', ', $params));
	while($repeat == "TRUE"){
		$repeat = "FALSE";
		$cmd = "api lua askGather.lua ".$uuid." ".$kaho." ".$invalidFS." ".$mindigitsFS." ".$maxdigitsFS." ".$maxattemptsFS." ".$timeoutFS." ".$termFS." ".$validInput." ".$onTimeOutFS." ".$interdigitTimeout;
		//////fwrite($tester,$cmd." record command filepath .\n");
		$response = event_socket_request($fp, $cmd);
		////fwrite($tester,$response." reeesponse .\n");
		if(substr($response, 1)){
			$val = substr($response, 1);
			if($val[0]==' ' || $val[0]=='-'  )
			{
				$output->value= $val[1];
			}
			elseif($val[0]=='_')
			{
				$i = 1;
				while( $i < strlen($val))
				{
					$output->value .= $val[$i];
					$i++;
				}

			}
			else
			{
				$output->name = "not_Good_timeout_or_invalid";
				$output->value= "-";
			}
		}
		else{
			$output->name = "not_Good_timeout_or_invalid";
			$output->value= "-";
		}
	//	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", "The ask() in " . __FUNCTION__ . " is now complete.");
		if($output && $output->value == "*"){	// pause the system
			//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was paused by pressing *.");
			//pause system
			pauseFT();
			$repeat = "TRUE";
			//writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " resumed.");
		}
	}
	////fwrite($tester,$output->name." nam ".$output->value." val .\n");
	isThisCallActive();
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " complete. Now returning: value: " . ($output->value) . ", name: " . ($output->name) );
	return $output;
}

function gatherInput($toBeSaid, $params){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was called with prompt: " . $toBeSaid . " and parameters: " . implode(', ', $params));
	
	global $Polly_prompts_dir;
	global $Silence;
	global $FreeSwitch;


	if($FreeSwitch == "false"){

		return  gatherInputTropo($toBeSaid, $params);
			
	}
	else
	{
		if(isThisCallActive()=="true")
		{
		
		    //making parameters
		    //parameters that should always be in ask array no matter what..choices...bargein..timeout
		    $choices=$params['choices'];//choices given by user for tropo
			$fchoices=makechoices($choices);//fchoices for freeswitch in format 123 or 1234* or 1*#..//fchoices made out of choices given by user,for freeswitch
			$mindigitsFS=calculateMinDigits($choices,$fchoices);
			$maxdigitsFS=calculateMaxDigits($choices,$fchoices);
			$bargein=$params['bargein'];
			$timeoutFS=$params['timeout'] * 1000;//to convert to millisecs as freeswitch timeout is in millisecs
			$validInput=makeValidINput($choices,$fchoices);

			//parameters that should may be in ask array..repeat || attempt...terminator..onBadChoice..onTimeout
			$termFS = "@";//default value menas no terminator
			if(checkifexists('terminator',$params)==true )
				$termFS = $params['terminator'];//intialized with passed parameter terminator
			$termFS= makeTerminators($fchoices,$termFS);//making it for freeswitch like if * is not in term but in choice it will put it in terminator
			$maxattemptsFS=0;//default value
			if(checkifexists('repeat',$params)==true )
				$maxattemptsFS=$params['repeat'] + 1;//intialized with passed parameter repeat
			if(checkifexists('attempts',$params)==true )
				$maxattemptsFS=$params['attempts'];//intialized with passed parameter attempts
			$invalidFS=$Polly_prompts_dir.$Silence;//default value that is silence 
			if(checkifexists('onBadChoice',$params)==true )
				$invalidFS=invalid($params['onBadChoice']);//intialized with prompt corrosponding to the onBadChoice value
			$onTimeOutFS="-";//default value that is silence 
			if(checkifexists('onTimeout',$params)==true )
				$onTimeOutFS=onTimeOut($params['onTimeout']);//intialized with prompt corrosponding to the onTimeout value
			$interdigitTimeout=$timeoutFS;//default value is equal to timeout in freeswitch 
			if(checkifexists('interdigitTimeout',$params)==true )
				$interdigitTimeout=$params['interdigitTimeout']*1000;//intialized with passed parameter interdigitTimeout
			return gatherTnputFreeSwitch($toBeSaid,$invalidFS,$mindigitsFS,$maxdigitsFS,$maxattemptsFS,$timeoutFS,$bargein,$termFS,$validInput,$onTimeOutFS,$interdigitTimeout);
		}
	}
}
//checking if  parameter exists in array
function checkifexists($parameter,$array){

	if(array_key_exists($parameter, $array)) {
		return true;
	}
	//else return false if parameter doesnt exist in array
	return false;

}
function recordAudio($toBeSaid, $params){

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " entered.");
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " Record Params: ".$params);

    global $FreeSwitch;
    global $uuid;
    global $fp;
    global $Feedback_Dir;
    global $CallRecordings_Dir;
    global $tester;
    global $scripts_dir;
    global $CallRecordings_Dir_Baang;
    global $UserIntro_Dir_Baang;
    global $Feedback_Dir_Baang;
    global $PQRecs;
    global $PQPrompts;
    global $PQScripts;

	////fwrite($tester, "Inside recordAudio with prompt = ".$toBeSaid." \n  & params = ".$params."\n");

    $recid = "";
    $result = "";
    $filepathFS= "";
	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was called with prompt: " . $toBeSaid . " and parameters: " . implode(', ', $params));
    if($FreeSwitch == "false")
    {
        $result = record($toBeSaid,$params);

    }
	else
	{
   	 	if(isThisCallActive()=="true")
		{
	   	 	if(checkifexists('silenceTimeout',$params)==true){
	            $silTimeout= $params['silenceTimeout'];
	            
	        }
	        else{
	        	//setting default silence timeout
	        	$silTimeout=5;
	        }
	        if(checkifexists('maxTime',$params)==true){
	            $maxTime= $params['maxTime'];
	          
	        }
	        else{
	        	//setting default maximum time
	        	$maxTime=30;
	        }
	        $rec_feed = 0;
	        $recordURI = $params['recordURI'];
	        ////fwrite($tester,$recordURI." record--------------9248 .\n");
	       	if( strpos($recordURI, 'process_feedback') !== false ) 
	       		{
	       			$parameterarray=explode("&", explode("?", $recordURI)[1]);

	       			$fbid=explode("=", $parameterarray[0])[1];

	       			if(strpos($recordURI, 'baang') !== false){
	       				$filepathFS=$Feedback_Dir_Baang;
				        $userid=explode("=", $parameterarray[2])[1];
				        $rec_id=explode("=", $parameterarray[1])[1];
				        $filepathFS = createFilePath($filepathFS,$fbid.".wav",TRUE);
				        $filepathFS .= "Feedback-".$fbid."-u-".$userid."-r-".$rec_id ;
	       			}else{
		       			$filepathFS=$Feedback_Dir;
				        $filepathFS = createFilePath($filepathFS,$fbid.".wav",TRUE);
				        $filepathFS .= "Feedback-".$fbid."-";
		       			$i = strpos($recordURI, '=');
				        $i = $i +1;
				        $fbid = "";
				        ////fwrite($tester,$i." feedback  fbid i .\n");
				        ////fwrite($tester,$filepathFS." feedback filepath  .\n");
				        
					    while( $recordURI[$i] != '&')
				        {
				        	////fwrite($tester," times .\n");
				        	$fbid .= $recordURI[$i];
				        	$i = $i +1;
				        }
				        while( $recordURI[$i] != '=')
				        {
				        	////fwrite($tester," finding second = pos i .\n");
				        
				        	$i = $i +1;
				        }
				        $i = $i +1;
				        ////fwrite($tester,$i." feedback  fbtype i .\n");
				        ////fwrite($tester,$filepathFS." feedback filepath  .\n");
				        while(  $i < strlen($recordURI))
				        {
				        	////fwrite($tester," times .\n");
				        	$filepathFS .= $recordURI[$i];
				        	$i = $i +1;
				        }
	       			}

			        $filepathFS .= ".wav";
			        $rec_feed = 1;

	       		}
	        else if( strpos($recordURI, 'process_recording') !== false ) 
	        	{
	        		$rec_feed = 0;
	       			$parameterarray=explode("&", explode("?", $recordURI)[1]);
	       			$recid=explode("=", $parameterarray[0])[1];

	       			if(strpos($recordURI, 'name') !== false){
	       				$filepathFS=$UserIntro_Dir_Baang;
				        $filepathFS .= "intro-".$recid.".wav";
		        		$rec_feed = 6;
	       			}else if(strpos($recordURI, 'baang') !== false){
	       				$rec_feed=2;
	       				$filepathFS=$CallRecordings_Dir_Baang;
				        $filepathFS = createFilePath($filepathFS,$recid.".wav",TRUE);
				        $filepathFS .= "Rec-".$recid.".wav";
	       			}else{
		        		$filepathFS=$CallRecordings_Dir;
				        $filepathFS = createFilePath($filepathFS,$recid.".wav",TRUE);
				        $filepathFS .= "s-".$recid.".wav";
		        		$rec_feed = 0;
	       			}

	       			/*
	        		$i = strpos($recordURI, '=');
			        $i = $i +1;
			        ////fwrite($tester,$i." record filepath i .\n");
			        ////fwrite($tester,$filepathFS." record filepath  .\n");
			        
				    while( $i < strlen($recordURI) & $recordURI[$i] !=& )
			        {
			        	////fwrite($tester," idididi .\n");
			        	$recid .= $recordURI[$i];
			        	$i = $i +1;
			        }
			        */

			       // $rec_feed = 0;
	        	}
	        else if( strpos($recordURI, 'save_recording') !== false ) 
	        	{
	        		// "save_recording.php?type=".$type."&uid=".$userid."&record_id=".$record_id."&call_id=".$callid."&suno_abbu=true";
	        		
	        		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " handling save_recording");

	       			$parameterarray = explode("&", explode("?", $recordURI)[1]);
	       			$type           = explode("=", $parameterarray[0])[1];
	       			$uid            = explode("=", $parameterarray[1])[1];
	       			$record_id      = explode("=", $parameterarray[2])[1];

       				$rec_feed   = 6;

       				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " type = $type , record_id = $record_id");

			        if($type == "request"){ // QU-5972-3.wav
			        	
			        	global $SA_requests;

			        	$filepathFS = $SA_requests. $record_id.".wav";

					}else if($type == "name"){ // U1.wav

						global $SA_recs, $userid;

						$filepathFS = $SA_recs."U".$userid.".wav";

					}else if($type == "story"){ //QU-5972-3-1.wav

						global $SA_recs;

						$filepathFS = $SA_recs.$record_id.".wav";


					}else if($type == "comment"){

						global $SA_comments;	

						$filepathFS = $SA_comments."C-".$record_id.".wav";

				   	}else if($type == "fb") {

				   		global $SA_fb_dir;
	
				        $filepathFS = createFilePath($SA_fb_dir, $record_id.".wav", TRUE);
		   				$rec_feed   = 6;
						$filepathFS .= $record_id . ".wav";				
	        		}

	        		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L1", __FUNCTION__ . " filepathFS = $filepathFS");
	        	}
	        else if( strpos($recordURI, 'process_FriendNamerecording') !== false )
	        	{

	       			$parameterarray=explode("&", explode("?", $recordURI)[1]);
	       			$reqid=explode("=", $parameterarray[0])[1];
	       			$userid=explode("-", $reqid)[0];
						global $FriendName_Dir;
						global $testerpolly;
						$filepathFS= $FriendName_Dir;//"C:/xampp/htdocs/wa/Praat/FriendNames/"; 
				        $filepathFS = createFilePath($filepathFS,$userid.".wav",TRUE);
	       				$rec_feed=6;
						$filepathFS .= $reqid.".wav";					
						//fwrite($testerpolly, "friend name record uri: ".$filepathFS."\n");
        		}
			else if( strpos($recordURI, 'process_UserNamerecording') !== false ) 
        		{
	   			$parameterarray=explode("&", explode("?", $recordURI)[1]);
	   			$callid=explode("=", $parameterarray[0])[1];
					global $SenderName_Dir;
					global $testerpolly;
					$filepathFS= $SenderName_Dir ;//"C:/xampp/htdocs/wa/Praat/UserNames/";
			        $filepathFS = createFilePath($filepathFS,$callid.".wav",TRUE);
	   				$rec_feed=6;
					$filepathFS .= "UserName-" . $callid . ".wav";					
					//fwrite($testerpolly, "user naem path :".$filepathFS."\n");
        		}
        	else if( strpos($recordURI, 'record_survey') !== false ) 
        		{
					global $userid;
					global $language_demographic_dir;
					global $profession_demographic_dir;
					global $location_demographic_dir;
					global $disabled_demographic_dir;

					if (strpos($recordURI, "type=LANGUAGE") !== false) {
						$filepathFS = $language_demographic_dir;
					} else if (strpos($recordURI, "type=PROFESSION") !== false) {
						$filepathFS = $profession_demographic_dir;
					} else if (strpos($recordURI, "type=LOCATION") !== false) {
						$filepathFS = $location_demographic_dir;
					}else if (strpos($recordURI, "type=DISABLED") !== false) {
						$filepathFS = $disabled_demographic_dir;
					}
			        $filepathFS = createFilePath($filepathFS,$userid.".wav",TRUE);
	   				$rec_feed = 6;
					$filepathFS .= $userid . ".wav";					
        		}
        	else if( strpos($recordURI, 'rem_feedback') !== false ) 
        		{
        			global $ReM_fb_dir;

					$parameterarray = explode("&", explode("?", $recordURI)[1]);
	       			$record_id      = explode("=", $parameterarray[0])[1];

			        $filepathFS = createFilePath($ReM_fb_dir, $record_id.".wav", TRUE);
	   				$rec_feed   = 6;
					$filepathFS .= $record_id . ".wav";					
        		}


	        $kaho = "file_string://";
			$s=preg_split('/[ \n]/', $toBeSaid);
	        for($i=0;$i<count($s);$i++)
	        {
	        	$j = 0;
	        	if($s[0]=="")
	        	{
	        		$j = 1;
	        	}
	        	if($i>$j)
	        	{
	        		$kaho .= "!".$s[$i];
	        	}
	        	else
	        	{
	        		$kaho .= $s[$i];
	        	}
	        	
	        }
	        ////fwrite($tester,$filepathFS." record --filepath-- .\n");
	        $filepathFS=str_replace("\\", "_", $filepathFS);
	        $kaho=rtrim($kaho,"!");
	       	$cmd = "api lua record.lua ".$uuid." ".$kaho." ".$filepathFS." ".$maxTime." ".$silTimeout; // some suggest using 500 as the threshold of silence
	    	$result = event_socket_request($fp, $cmd);
	    	isThisCallActive();
    		$filepathFS=str_replace("_", "\\", $filepathFS);
    		correctWavFT($filepathFS);

	    	if($rec_feed === 0)
	    	{
	    		////fwrite($tester,$rec_feed." processAudFile is on.\n");
	    		//$filepathFS=str_replace("_", "\\", $filepathFS);
	    		///correctWavFT($filepathFS);
	    		$res = doCurl($scripts_dir."processAudFile.php?path=s-$recid".".wav");
	    		////fwrite($tester,$scripts_dir."processAudFile.php?path=s-$recid".".wav"." curl request .\n");
	    		////fwrite($tester,$resutl." curl request .\n");
	    	}else if($rec_feed === 2 || $rec_feed === 5 || $rec_feed === 6){
	    	//	correctWavFT($filepathFS);
	    		////fwrite($tester,$resutl." 2-. $recordURI.\n");
	    		$res = doCurl($recordURI);	    			
	    	}else if($rec_feed === 1){
	    	///	$filepathFS=str_replace("_", "\\", $filepathFS);
	    	//	correctWavFT($filepathFS);
	    	}
	    	
	    	////fwrite($tester,$result." record command result .\n");
    	}
    }

	writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " complete. Now returning.");
    return $result;
}

function correctWavFT($filepath){
	global $FreeSwitch;
	
	
	if($FreeSwitch == "false"){
		// NOP
	}
	else{
		$rep = file_get_contents($filepath);
		$rep[20] = "\x01";
		$rep[21] = "\x00";
		file_put_contents($filepath, $rep);
	}
}

function askFT($toBeSaid, $choices, $mode, $repeat, $bargein, $timeout,$hanguppr, $mindigitsFS, $maxdigitsFS, $maxattemptsFS, $timeoutFS, $termFS, $invalidFS){
	global $FreeSwitch;
	global $uuid;
	global $fp;
	
	global $tester;//change testing
	////fwrite($tester, "in askft  .\n");
	
	$output = (object) array('name' => 'choice', 'value' => '');
	if($FreeSwitch == "false"){
		$result = ask($toBeSaid,
		array(
				"choices" => $choices, 
				"mode" => $mode,
				"repeat" => $repeat,
				"bargein" => $bargein,
				"timeout" => $timeout,
				"terminator" => $termFS,
				"onHangup" => $hanguppr
			)
		);
		$output = $result;
	}
	else{
		$kaho = "file_string://";
		$s=preg_split('/[ \n]/', $toBeSaid);
        for($i=0;$i<count($s);$i++)
        {
        	$j = 0;
        	if($s[0]=="")
        	{
        		$j = 1;
        	}
        	if($i>$j)
        	{
        		$kaho .= "!".$s[$i];
        	}
        	else
        	{
        		$kaho .= $s[$i];
        	}
        	
        }
        $kaho=rtrim($kaho,"!");

		$cmd = "api lua ask.lua ".$uuid." ".$kaho." ".$invalidFS." ".$mindigitsFS." ".$maxdigitsFS." ".$maxattemptsFS." ".$timeoutFS." ".$termFS;
		$response = event_socket_request($fp, $cmd);//here
		isThisCallActive();
		if(substr($response, 1)){
			$val = substr($response, 1);
			if($val[0]=='_'||$val[0]=='+'||$val[0]==' ')
			{
				$output->value= $val[1];
			}
			else
			{
				$output->name = "not_Good_timeout_or_invalid";
				$output->value= "-";
			}
			
		}
		else{

			$output->name = "not_Good_timeout_or_invalid";
			$output->value= "-";
		}
		
	}
	return $output;
}
function pauseFT(){
	global $tester;//change testing
	////fwrite($tester, "in pauseft  .\n");
	$choices = "[1 DIGITS], *, #" ; 
	$mode = 'dtmf';
	$repeat = 1;
	$bargein = true;
	$timeout = 300;
    $hanguppr = "Prehangup";
    $mindigitsFS = 0;
    $maxdigitsFS = 1;
    $maxattemptsFS = 2;
    $timeoutFS = 300000;
    $termFS = "*#";
    $invalidFS="nothing";
    $result = askFT(
				$invalidFS, 
				$choices, 
				$mode, 
				$repeat, 
				$bargein, 
				$timeout, 
				$hanguppr, 
				$mindigitsFS, 
				$maxdigitsFS,
				$maxattemptsFS, 
				$timeoutFS, 
				$termFS, 
				$invalidFS
				);

}
function sayInt($toBeSaid){
	global $tester;//change testing
	////fwrite($tester, "in sayint  .\n");
	if(isThisCallActive()=="true")
	{
		$choices = "[1 DIGITS], *, #" ; 
		$mode = 'dtmf';
		$repeatMode = 0;
		$bargein = true;
		$timeout = 0.1;
	    $hanguppr = "Prehangup";
	    $mindigitsFS = 1;
	    $maxdigitsFS = 1;
	    $maxattemptsFS = 1;
	    $timeoutFS = 100;
	    $termFS = "*#";
	    $invalidFS="nothing";

	   
		$repeat = "TRUE";
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " about to play: " . $toBeSaid);
		while($repeat == "TRUE"){
			$repeat = "FALSE";
				$result = askFT(
					$toBeSaid, 
					$choices, 
					$mode, 
					$repeatMode, 
					$bargein, 
					$timeout,
					$hanguppr, 
					$mindigitsFS, 
					$maxdigitsFS,
					$maxattemptsFS, 
					$timeoutFS, 
					$termFS, 
					$invalidFS
					);
			
			if($result->name == 'choice'){
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " prompt " . $toBeSaid . " was barged-in with " . ($result->value));
			}
			if($result->value == "*"){	// pause the system
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " was paused by pressing *");
				pauseFT();
				$repeat = "TRUE";
				writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " resumed.");
			}
		}
		writeToLog($GLOBALS['callid'], $GLOBALS['fh'], "L2", __FUNCTION__ . " complete. Now returning: value: " . ($result->value) . ", name: " . ($result->name) . ", attempt: " . ($result->attempt) . ", choice: " . ($result->choice));
		return $result;
	}
}
//////////////////////////////////////////////////////////////////////////////////////
///////////////////////////// End of Code ////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
?>
