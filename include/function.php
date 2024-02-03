<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	function strip_zeros_from_date($marked_string="") {
		//first remove the marked zeros
		$no_zeros = str_replace('*0','',$marked_string);
		$cleaned_string = str_replace('*0','',$no_zeros);
		return $cleaned_string;
	}
	function redirect_to($location = NULL) {
		if($location != NULL){
			header("Location: {$location}");
			exit;
		}
	}
	function redirect($location=Null){
		if($location!=Null){
			echo "<script>
					window.location='{$location}'
				</script>";	
		}else{
			echo 'error location';
		}
		 
	}
	function output_message($message="") {
	
		if(!empty($message)){
		return "<p class=\"message\">{$message}</p>";
		}else{
			return "";
		}
	}
	function date_toText($datetime=""){
		$nicetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $nicetime);	
					
	}
	// function __autoload($class_name) {
	// 	$class_name = strtolower($class_name);
	// 	$path = LIB_PATH.DS."{$class_name}.php";
	// 	if(file_exists($path)){
	// 		require_once($path);
	// 	}else{
	// 		die("The file {$class_name}.php could not be found.");
	// 	}
					
	// }

	function __spl_autoload_register($class_name) {
		$class_name = strtolower($class_name);
		$path = LIB_PATH.DS."{$class_name}.php";
		if(file_exists($path)){
			require_once($path);
		}else{
			die("The file {$class_name}.php could not be found.");
		}
					
	}
	

	function currentpage_public(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[2];
	  
	}

	function currentpage_admin(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[4];
	  
	}
  // echo "string " .currentpage_admin()."<br/>";

	function curPageName() {
 return substr($_SERVER['REQUEST_URI'], 21, strrpos($_SERVER['REQUEST_URI'], '/')-24);
}

  // echo "The current page name is ".curPageName();
	 
	function msgBox($msg=""){
		?>
		<script type="text/javascript">
			 alert(<?php echo $msg; ?>)
		</script>
		<?php
	}
		

	

		function emailSentSMTP($text,$subject,$to){
			try {
				$mail = new PHPMailer(true);
				//Server settings
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = "fjclient2023@gmail.com";                     //SMTP username
				$mail->Password   = "okpzuwatksjfpsbd";                               //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
				$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			
				//Recipients
				$mail->setFrom("fjclient2023@gmail.com");
				$mail->addAddress($to);     //Add a recipient
			
				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = $subject;
				$mail->Body    = $text;
			
				$mail->send();
				// if(!$mail->Send())
				// {
				// 	echo $mail->ErrorInfo;
				// } else {
				// 	echo 'Message has been sent';
				// }
				echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent.";
			}
		}

		function getServerName(){

			$host = SERVER_NAME;  // Replace with your server's hostname or IP address
			$port = PORT;    

			$connection = @fsockopen($host, $port, $errno, $errstr, 1);
			if ($connection) {
				return $host.':'.$port;
					// fclose($connection);
			} else {
				return $host;
			}
		}
?>