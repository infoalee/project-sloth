<?
require_once("../classDB.php"); 
setlocale(LC_MONETARY, 'th_TH');

$db = new ODBC(); 
// print "connecting to Composite"; 
		if (!$db->connect("koc_db_prod","dmapp01" ,"dmapp01!")) 
		{ 
				 echo "1.Error!\n Database Not Connect !!"; 
				 exit(); 
		} 
        if(isset($_POST['key_search'])){//เมื่อมีการส่งข้อมูลมา
				$tKey_search= strtoupper(trim($_POST['key_search']));
		}else{//ถ้าไม่มีการส่งข้อมูลมา
					echo "Error: ขออภัย เกิดข้อผิดพลาดในขณะนี้. กรุณาลองใหม่อีกครั้ง!";
					exit();
		}

    $sql = "select count(*) as num from uac_sys.ua_campaign
     a where a.campaigncode='";
	$sql .= $tKey_search ."';";

    set_time_limit(1000);
		$rs=$db->query($sql); 
		$N=1;
		While (odbc_fetch_row($rs, $N))	//
			{
					$item_found1 = odbc_result($rs, "num");
                    
					$N++;
			}

        if($item_found1 > 0 ){
        $sql = "select CAMPAIGNID,NAME,DESCRIPTION,FOLDERID,CAMPAIGNCODE,INITIATIVE,OBJECTIVES,
		TO_CHAR(STARTDATE, 'DD-MM-YYYY') as STARTDATE,
		TO_CHAR(ENDDATE, 'DD-MM-YYYY') as ENDDATE
		from uac_sys.ua_campaign
        a where a.campaigncode='";
	    $sql .= $tKey_search ."';";  
        $rs=$db->query($sql); 
		$N=1;
		While (odbc_fetch_row($rs, $N))	//
			{
					
					$name = odbc_result($rs, "NAME");
					$objective = iconv( 'TIS-620',  'UTF-8', odbc_result($rs, "OBJECTIVES"));
					$product = substr(odbc_result($rs, "CAMPAIGNCODE"),1,2);
					$startDate = odbc_result($rs, "STARTDATE");
					$endDate = odbc_result($rs, "ENDDATE");
					$campType = substr(odbc_result($rs, "CAMPAIGNCODE"),1,1);
					$N++;
			}
        }
        


/* ใช้ Json ในการ return ค่า แต่ไม่ support apache on Windows
$output =  array('name'=>$name,
				'objective'=>$objective,
				'product'=>$product,
				'startDate'=>$startDate,
				'endDate'=>$endDate);
echo json_encode($output,JSON_FORCE_OBJECT);
*/
		//echo $item_found."<br/>";
		//echo $N."<br/>";
		//$numRows =$db->getRows($sql);
		//echo $numRows."<br/>";

		$db->disconnect() ;
        //echo $sql;
		if($item_found1 > 0 ){
			echo $name
			."|".$objective
            ."|".$product
            ."|".$startDate
            ."|".$endDate
			."|".$campType;
		}else{
			echo '';
		}

?>
