<?
session_start();
//include 'class.php';

if(isset($_POST['tUsername'])){
$tUsername=$_POST['tUsername'];
	if(isset($_POST['tPassword'])){
		$tPassword=$_POST['tPassword'];
		}else{
			echo "error1";
	}
}else{
echo "error2";
}

/* Test login */
/*$_SESSION["LOGIN_ID"] = $tUsername;
$_SESSION["ROLE"] = $tPassword;
echo iconv('TIS-620', 'UTF-8','Y'); 
exit();*/
/* Test login */

$check_err="";//ตรวจสอบการ Error

		if($tUsername!="" && $tPassword!="") {  // check username  And password not null 1

			$username = $tUsername;//$_POST["username"];
			$pass = $tPassword;//$_POST["password"];

				if($username !=null and $pass !=null){// check username  And password not null 2
							$server = "kasikornbank.com"; //dc1-nu
							$user = $username."@kasikornbank.com";
							// connect to active directory
							$ad = ldap_connect($server);
									if(!$ad) {
											die("Connect not connect to ".$server);
											// include("chk_login_db.php");
											echo "ไม่สามารถติดต่อ server เพื่อตรวจสอบรหัสผ่านได้";
											exit();
									} else { 
											$b = @ldap_bind($ad,$user,$pass);

											if(!$b) {
													echo iconv('TIS-620', 'UTF-8','1');
													exit();
											} else { 

												//login ผ่านแล้วมาทำไรก็ว่าไป
														if(strtolower($tUsername) == strtolower($cUsername) ){ //Check Username who can signin with this computer //

																			$_SESSION["LOGIN_OK"] = true;
																			$_SESSION["LOGIN_ID"] = $username;
																			$_SESSION["ROLE"] = 1;
																			$_SESSION['loggedin_time'] = time(); 
																			$tostrUpper = ucwords(strtoupper($username));  
																			$tostrFUpper = ucwords(strtolower($tostrUpper)); 
																			$_SESSION["LOGIN_NAME"]  = $tostrFUpper;
																			//$_SESSION["home"]  = 'index2.php?bp=1';

																			//extract($_SESSION);
																		echo iconv('TIS-620', 'UTF-8','Y');
																		exit();
																			//header("location:index.php");
																	//*** Session ***//
														}else{//Check Username who can signin with this computer //
																$_SESSION["LOGIN_ID"] = $username;
																echo iconv('TIS-620', 'UTF-8','Y'); 
																exit();

														}//Check Username who can signin with this computer //
											}//if(!$b) 


											//$_SESSION["Username"] =$pw["user_id"];
									}//if(!$ad)
				}// check username  And password not null 2
						
		} else { // check username  And password not null 1
				echo iconv('TIS-620', 'UTF-8','2');
		exit();

		}// check username  And password not null 1


?>