<?php
/*****************************
*���ݿ�����
*****************************/

function write_db($sql)
{
	$conn = mysql_connect("localhost","sedgeadmin","sedge123","sedgeadmin");
	if (!$conn)
	{
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("sedge", $conn);

	// echo '<br>' . $sql; // ��ʾsql���
	
	return mysql_query($sql,$conn);// д�����ݿ�
}

?>
