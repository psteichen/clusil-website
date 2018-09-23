<?php
$formApplicantName;
$formApplicantEmail;
$formThesisTitle;
$formStudies;
$formUniversity;
$formHostCompany;
$formDescription;
$formImpact;
$formInnovation;
$formApplicantDataProcessingConsent;
$captcha;

        if(isset($_POST['formApplicantName'])){
            $formApplicantName=$_POST['formApplicantName'];
        }
	if(isset($_POST['formApplicantEmail'])){
            $formApplicantEmail=$_POST['formApplicantEmail'];
        }
	if(isset($_POST['formThesisTitle'])){
            $formThesisTitle=$_POST['formThesisTitle'];
        }
	if(isset($_POST['formStudies'])){
            $formStudies=$_POST['formStudies'];
        }
        if(isset($_POST['formUniversity'])){
            $formUniversity=$_POST['formUniversity'];
        }
        if(isset($_POST['formHostCompany'])){
            $formHostCompany=$_POST['formHostCompany'];
        } else {
	    $formHostCompany="<No company>";
	}
        if(isset($_POST['formDescription'])){
            $formDescription=$_POST['formDescription'];
        }
        if(isset($_POST['formImpact'])){
            $formImpact=$_POST['formImpact'];
        }
        if(isset($_POST['formInnovation'])){
            $formInnovation=$_POST['formInnovation'];
        }
        if(isset($_POST['formApplicantDataProcessingConsent'])){
            $formApplicantDataProcessingConsent=$_POST['formApplicantDataProcessingConsent'];
        }

	if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
            echo 'Your reCAPTCHA challenge has not been sent to the Clusil server. Please send your application by email if the problem persists.';
            exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf14CkUAAAAABBMZ2t0Zoh3meHprC8UTy3RCLNV&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
            echo 'According to Google reCaptcha you are a robot!';
        }else
        {
            $to = "award2017@clusil.lu";
            $from = 'no-reply@clusil.lu';
            $headers = 'From: ' . $from . "\r\n";
	    $message = 
		"                       /Best thesis award_" . "\r\n" .
		"_________________________________________________________________________" . "\r\n" . "\r\n" .
		" Bringing recognition to students in Luxembourg and it's greater region." . "\r\n" . "\r\n" . "\r\n" . 
		"Applicant name: " . $formApplicantName . "\r\n" .
		"Application email: " . $formApplicantEmail . "\r\n" .
		"Thesis title: " . $formThesisTitle . "\r\n" .
		"University: " . $formUniversity . "\r\n" .
		"Host company: " . $formHostCompany . "\r\n" .
		"Data processing consent: " . $formApplicantDataProcessingConsent . "\r\n" . "\r\n" .
		"-------------------------------------------------------------------------" . "\r\n" . "\r\n" .
		"Description:" . "\r\n" .
		$formDescription . "\r\n" . "\r\n" .
		"-------------------------------------------------------------------------" . "\r\n" . "\r\n" .
		"Impact:" . "\r\n" .
		$formImpact . "\r\n" . "\r\n" .
		"-------------------------------------------------------------------------" . "\r\n" . "\r\n" .
		"Innovation:" . "\r\n" .
		$formInnovation; 
            mail ($to, '/Best thesis award_ application', $message, $headers);

        echo 'Your application has been sent to the award jury!';
        }
?>
