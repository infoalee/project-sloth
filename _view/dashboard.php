<?
//include("classDB.php");
$dashboard = new Dashboard;
//**** New class database ****//
$strHost = "127.0.0.1";
$strDB = "ci_channel_mgt";
$strUser = "ci_ch_root";
$strPassword = "p@ssw0rd";
$clsMyDB = new MySQLDB($strHost,$strDB,$strUser,$strPassword);


if(isset($_SESSION["ROLE"])){
    $_role = $_SESSION["ROLE"];
}else{
    $_role = 1;
}
//**** Call to function select record ****//
$clsMyDB->strTable = "MENU_DASHBOARD";
if($_role==1){
    $conditions = " ID > 0 And status = 1 order by ID";
}else{
    $conditions = " ID > 0 And status = 1 And role=" . $_role . " order by ID";
}

$clsMyDB->strCondition = $conditions;

$objSelect = $clsMyDB->fncReturnResult();

    while($row = @mysql_fetch_array($objSelect)){
        $dashboard->pnStyle   = $row['PN_STYLE'];
        $dashboard->icon      = $row['PN_ICON'];
        $dashboard->label     = $row['NAME'];
        $dashboard->detail    = $row['CLICK_NAME'];
        $dashboard->notification = rand(1,100);
        $dashboard->href      = $row['HREF'];
        $dashboard->contentID = $row['CONTENT_ID'];

        $elm = $dashboard->createMenuItem();
        echo $elm;
    }     

    $clsMyDB-> __destruct();

Class Dashboard {

    function createMenuItem(){
        $element =  "<div class='col-md-3 col-sm-6 col-xs-12'>
          <div class='info-box'>
            <span class='info-box-icon " . $this->pnStyle . "'><i class='" . $this->icon . "'></i></span>

            <div class='info-box-content'>
              <span class='info-box-text'>" . $this->label . "</span>
              <span class='info-box-number text-center'>". $this->notification ."</span>
                <span class='info-box-btn' style='position: absolute;
bottom: 15px;
right: 15px;left: 105px;'>
               <button type='button' class='btn btn-block btn-xs btn-info btn-flat'>". $this->detail ."</button>
               </span>
            </div>

            <div class='info-box-footer'>
               
            </div>

            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        ";
                return $element;
    }
}
?>