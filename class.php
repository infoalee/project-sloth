<?php
date_default_timezone_set('Asia/Bangkok'); 

//$MyConn = mysql_connect("localhost","cd_admin","p@ssw0rd") or die ("Not Connect Database !!");
//@Mysql_db_query('cd_db','SET NAMES UTF8');
//mysql_select_db('cd_db') or die ("Not Connect Database : cd_db");

?>

<?php
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
		return "$strDay $strMonthThai $strYear";
	}

	//$strDate = "2008-08-14 13:42:44";
	//echo "ThaiCreate.Com Time now : ".DateThai($strDate);

function cv_msr_prd($msr_prd,$mth){
//$msr_prd =201510;
$msr_prd_cal= substr($msr_prd,0,4)."-".substr($msr_prd,4,2)."-01";
$return_val;
		if($mth==1){
			$return_val= date("M",strtotime($msr_prd_cal)). " ".date("y", strtotime($msr_prd_cal));
		}else if($mth==2){
			$return_val= date("M", strtotime("-1 months",strtotime($msr_prd_cal))) . " ".date("y", strtotime("-1 months",strtotime($msr_prd_cal)));
		}else if($mth==3){
			$return_val= date("M", strtotime("-2 months",strtotime($msr_prd_cal))). " ".date("y", strtotime("-2 months",strtotime($msr_prd_cal)));
		}else if($mth==4){
			$return_val=  date("M", strtotime("-3 months",strtotime($msr_prd_cal))). " ".date("y", strtotime("-3 months",strtotime($msr_prd_cal)));
		}else if($mth==5){
			$return_val= date("M", strtotime("-4 months",strtotime($msr_prd_cal))). " ".date("y", strtotime("-4 months",strtotime($msr_prd_cal)));
		}else if($mth==6){
			$return_val= date("M", strtotime("-5 months",strtotime($msr_prd_cal))). " ".date("y", strtotime("-5 months",strtotime($msr_prd_cal)));
		}else{
			$return_val= date("M",strtotime($msr_prd_cal)). " ".date("y", strtotime($msr_prd_cal));
		}
	return $return_val;	
}

	
function get_time($time_val){
	$_h;
	$_m;

	if(strlen($time_val)>3){
        $_h=substr($time_val, 0,2);
        $_m=substr($time_val, 2,4);
    }else{
		$_h=substr($time_val, 0,1);
        $_m=substr($time_val, 1,3);
    }
return date("H:i", mktime($_h, $_m, 0, 0, 0, 0));

}

function format_id_card($id_card){

return substr($id_card, 0, 1)."-".substr($id_card, 1, 4)."-".substr($id_card, 5,5)."-".substr($id_card, 10,2)."-".substr($id_card, 12);

}

function format_mobile($mobile_no){

return substr($mobile_no, 0, 3)."-".substr($mobile_no, 3, 3)."-".substr($mobile_no, 6,5);

}

function format_credit_card($cc_card){

if(strlen($cc_card)>4){
	return substr($cc_card, 0, 4)."-".substr($cc_card, 4, 4)."-".substr($cc_card, 8,4)."-".substr($cc_card, 12);
}else{
	return "xxxx - xxxx - xxxx - ".$cc_card;
}

}

function format_credit_card_mask($cc_card){
if(strlen($cc_card)>4){
	return "xxxx - xxxx - xxxx - ".substr($cc_card, 12);
}else{
	return "xxxx - xxxx - xxxx - ".$cc_card;
}


}

?>



<?php 

class ODBC
{ 
 var $handle; 
  
    // bool connect(string $dsn, string $user, stirng $pass) 
    function connect($dsn, $user, $pass) 
    { 
    $this->handle = odbc_connect($dsn, $user, $pass); 
        if (!$this->handle) 
            return false; 
        return true; 
    } 
    
    // resourceid query(string $sql) 
    function query($sql) 
    { 
        $rs = @odbc_exec($this->handle, $sql); 
            if ($rs) 
                { 
                return $rs; 
            } 
            else 
            { 
            $sErr = "<b>Error:</b> " . $this->getErrorMsgs() . "<br>\n"; 
            $sErr .= "<b>SQL:</b> " . $sql; 
            die($sErr); 
        } 
    } 

    // string getErrorMsgs() 
    function getErrorMsgs() 
    { 
            return odbc_errormsg($this->handle); 
    } 

        // void disconnect() 
    function disconnect() 
    { 
        if ($this->handle) 
        odbc_close($this->handle); 
    } 

    // int Rows()
    function getRows($sql){
    $num=odbc_num_rows($this->query($sql));
        if ($num) 
                { 
        return $num; 
            } 
                else 
            { 
            $sErr = "<b>Error:</b> " . $this->getErrorMsgs() . "<br>\n"; 
            $sErr .= "<b>SQL:</b> " . $sql; 
            die($sErr); 
        } 

    }


} 

	/**** Class Database ****/
	Class MySQLDB
	{
		/**** function connect to database ****/
		function MySQLDB($strHost,$strDB,$strUser,$strPassword)
		{
				$this->objConnect = mysql_connect($strHost,$strUser,$strPassword);
				$this->DB = mysql_select_db($strDB);
		}

		/**** function insert record ****/
		function fncInsertRecord()
		{
				$strSQL = "INSERT INTO $this->strTable ($this->strField) VALUES ($this->strValue) ";
				return mysql_query($strSQL);
		}

        
        function fncReturnResult()
		{
				$strSQL = "SELECT * FROM $this->strTable WHERE $this->strCondition ";
				$objQuery = @mysql_query($strSQL);
				return $objQuery;
		}

		/**** function select record ****/
		function fncSelectRecord()
		{
				$strSQL = "SELECT * FROM $this->strTable WHERE $this->strCondition ";
				$objQuery = @mysql_query($strSQL);
				return @mysql_fetch_array($objQuery);
		}
        
		/**** function update record (argument) ****/
		function fncUpdateRecord($strTable,$strCommand,$strCondition)
		{
				$strSQL = "UPDATE $strTable SET  $strCommand WHERE $strCondition ";
				return @mysql_query($strSQL);
		}

		/**** function delete record ****/
		function fncDeleteRecord()
		{
				$strSQL = "DELETE FROM $this->strTable WHERE $this->strCondition ";
				return @mysql_query($strSQL);
		}

		/*** end class auto disconnect ***/
		function __destruct() {
				return @mysql_close($this->objConnect);
	    }
	}			



?>
<?php 
/* 
That it is an implementation of the function money_format for the 
platforms that do not it bear.  

The function accepts to same string of format accepts for the 
original function of the PHP.  

(Sorry. my writing in English is very bad)  

The function is tested using PHP 5.1.4 in Windows XP 
and Apache WebServer. 
*/ 
function money_formats($format, $number) 
{ 
    $regex  = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?'. 
              '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/'; 
    if (setlocale(LC_MONETARY, 0) == 'C') { 
        setlocale(LC_MONETARY, ''); 
    } 
    $locale = localeconv(); 
    preg_match_all($regex, $format, $matches, PREG_SET_ORDER); 
    foreach ($matches as $fmatch) { 
        $value = floatval($number); 
        $flags = array( 
            'fillchar'  => preg_match('/\=(.)/', $fmatch[1], $match) ? 
                           $match[1] : ' ', 
            'nogroup'   => preg_match('/\^/', $fmatch[1]) > 0, 
            'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ? 
                           $match[0] : '+', 
            'nosimbol'  => preg_match('/\!/', $fmatch[1]) > 0, 
            'isleft'    => preg_match('/\-/', $fmatch[1]) > 0 
        ); 
        $width      = trim($fmatch[2]) ? (int)$fmatch[2] : 0; 
        $left       = trim($fmatch[3]) ? (int)$fmatch[3] : 0; 
        $right      = trim($fmatch[4]) ? (int)$fmatch[4] : $locale['int_frac_digits']; 
        $conversion = $fmatch[5]; 

        $positive = true; 
        if ($value < 0) { 
            $positive = false; 
            $value  *= -1; 
        } 
        $letter = $positive ? 'p' : 'n'; 

        $prefix = $suffix = $cprefix = $csuffix = $signal = ''; 

        $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign']; 
        switch (true) { 
            case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+': 
                $prefix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+': 
                $suffix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+': 
                $cprefix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+': 
                $csuffix = $signal; 
                break; 
            case $flags['usesignal'] == '(': 
            case $locale["{$letter}_sign_posn"] == 0: 
                $prefix = '('; 
                $suffix = ')'; 
                break; 
        } 
        if (!$flags['nosimbol']) { 
            $currency ='' ; /*$cprefix . 
                        ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']) . 
                        $csuffix; */
        } else { 
            $currency = ''; 
        } 
        $space  = $locale["{$letter}_sep_by_space"] ? ' ' : ''; 

        $value = number_format($value, $right, $locale['mon_decimal_point'], 
                 $flags['nogroup'] ? '' : $locale['mon_thousands_sep']); 
        $value = @explode($locale['mon_decimal_point'], $value); 

        $n = strlen($prefix) + strlen($currency) + strlen($value[0]); 
        if ($left > 0 && $left > $n) { 
            $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0]; 
        } 
        $value = implode($locale['mon_decimal_point'], $value); 
        if ($locale["{$letter}_cs_precedes"]) { 
            $value = $prefix . $currency . $space . $value . $suffix; 
        } else { 
            $value = $prefix . $value . $space . $currency . $suffix; 
        } 
        if ($width > 0) { 
            $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ? 
                     STR_PAD_RIGHT : STR_PAD_LEFT); 
        } 

        $format = str_replace($fmatch[0], $value, $format); 
    } 
    return $format; 
}

?>


<?php
function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 

// now try it
//$ua=getBrowser();
//$yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
//print_r($yourbrowser);
?>