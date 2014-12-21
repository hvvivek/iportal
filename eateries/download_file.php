<script type="text/javascript"></script>
<?php
  require_once 'config.php';
		
		$conn = mysql_connect(dbhost , dbuser , dbpass);
		mysql_select_db("i-portal");
		$file=$_POST['varname'];
		echo $file;
		/*$query = "SELECT * FROM  data WHERE SNO =$king" ;
		$result = mysql_query($query) ;
		if (false === $result) 
			{
    				echo mysql_error();
			}
		while($address = mysql_fetch_array($result))
			{
				$file= $address['Location'];
			} */
  if(file_exists($file))
  {
	header('Content-Description:File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($file));
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length :'.filesize($file));
	readfile($file);
	exit;
  }
else
echo("file opening failed");
/*while ($row = mysql_fetch_object($db_list)) 
				{
     					echo $row->Database . "\n";
				}
			*/
/*$id=$_GET['delete'];
$query1 = "DELETE FROM  data WHERE SNO=$id " ;
		$result1 = mysql_query($query1) ;
		if (false === $result1) 
			{
    				echo mysql_error();
			}*/
?>
