<?php

class Admin_backup extends Controller {
	
	var $mr;
	var $mlist;
	var $site;
	var $search;

	function Admin_backup()
	{
		parent::Controller();	
		
		$this->mr['title'] = 'Back up database';

	}
	
	
	function index()
	{	
		
		
		$sql = "SHOW TABLES FROM db281202340";
		$result = mysql_query($sql);	
		while ($row = mysql_fetch_row($result)) {
			$content .=$this->datadump($row[0]);
		}
		
		$file_name = "MySQL_Database_Backup.sql";
		Header("Content-type: application/octet-stream");
		Header("Content-Disposition: attachment; filename=$file_name");
		echo $content;
		//$this->mysmarty->assign('content',$content);
		//$this->mysmarty->view('admin/backup');
		
		
	}
	
	function datadump ($table) {

    $result = "# Dump of $table \n";
    $result .= "# Dump DATE : " . date("d-M-Y") ."\n\n";

    $query = $this->db->query("select * from $table");
    $row = $query->result_array();

    $num_fields = $query->num_fields();
    $numrow = $query->num_rows();

    for ($i =0; $i<$numrow; $i++) 
	{
  		$result .= "INSERT INTO ".$table." VALUES(";
  		
   		$row_i = $row[$i];
   		
   		foreach( $row_i as $key=>$value)
   		{
			$value = addslashes($value);
    		$value = ereg_replace("\n","\\n",$value);
    		if (isset($value)) $result .= "\"$value\"" ; else $result .= "\"\"";
    		$result .= ",";
		}
		$result = substr($result, 0, -1);      
		
      	$result .= ");\n";
     }
     return $result . "\n\n\n";
  }
  
  function backup()
  {
	$tableName  = 'mypet';
	$backupFile = 'backup/mypet.sql';
	$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
	$result = mysql_query($query);
  }
  
  function retore()
  {
		$tableName  = 'mypet';
		$backupFile = 'mypet.sql';
		$query      = "LOAD DATA INFILE 'backupFile' INTO TABLE $tableName";
		$result = mysql_query($query);

  }
  
	
}
?>