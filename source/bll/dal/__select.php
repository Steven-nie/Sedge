<?php

include('__conn.php'); // �������ݿ�

/* ��ѯ
	$selΪselect������$fromΪfrom������ $whereΪwhere����������
	���ز�ѯ���array
*/
function select($sel, $from, $where)
{
	$str = 'SELECT ' . $sel . ' FROM ' . $from . ' WHERE ' . $where;
	// echo $str;
	return write_db($str);
}


/*
$username = 'weitao201';
$password = 'assssssss';
$res = select('uid','whuuser',"username='$username' and password = '$password' limit 1");

while($row = mysql_fetch_array($res))
{
	echo '<br>';
	print_r($row);
}

// echo $res;
*/


?>