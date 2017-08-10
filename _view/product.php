<?
include("./classDB.php");
$products = new Products;
//**** New class database ****//
$strHost = "127.0.0.1";
$strDB = "ci_channel_mgt";
$strUser = "ci_ch_root";
$strPassword = "p@ssw0rd";
$clsMyDB = new MySQLDB($strHost,$strDB,$strUser,$strPassword);


//**** Call to function select record ****//
$clsMyDB->strTable = "products";
$conditions = " ID > 0  order by ID";

$clsMyDB->strCondition = $conditions;

$objSelect = $clsMyDB->fncReturnResult();

    while($row = @mysql_fetch_array($objSelect)){
        $products->productCode   = $row['PRODUCT_CD'];
        $products->productdesc   = $row['DESCRIPTION'];
        $elm = $products->createMenuItem();
        echo $elm;
    }     

    $clsMyDB-> __destruct();

Class Products {

    function createMenuItem(){
        $element =  "<option value='" . $this->productCode . "'>" . $this->productCode . " - " . $this->productdesc . "</option>";
        return $element;
    }
}
?>