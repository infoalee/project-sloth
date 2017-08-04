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