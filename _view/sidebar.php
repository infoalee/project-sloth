<?
//include("classDB.php");
$sidebar = new Sidebar;
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
        $sidebar->pnStyle   = $row['PN_STYLE'];
        $sidebar->icon      = $row['PN_ICON'];
        $sidebar->label     = $row['NAME'];
        $sidebar->detail    = $row['CLICK_NAME'];
        $sidebar->notification = rand(1,100);
        $sidebar->href      = $row['HREF'];
        $sidebar->contentID = $row['CONTENT_ID'];

        $elm = $sidebar->createMenuItem();
        echo $elm;
    }     

    $clsMyDB-> __destruct();

Class Sidebar {

    function createMenuItem(){
        $element =  "<li><a href='#'><i class='" . $this->icon . "'></i> <span>" . $this->label . "</span></a></li>";
                return $element;
    }
}
?>