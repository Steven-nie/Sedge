<?php

include('__conn.php'); // �������ݿ�

/* ����
	$tableΪ���� , $para Ϊset�Ĳ���, $whereΪwhere����
	(����set�����,����)
	����ִ�н��
*/
function update($table, $set, $where)
{
	$str = 'UPDATE ' . $table . ' SET ' . $set . ' WHERE ' . $where;
	echo $str;
	return write_db($str);
}


/*
// $sql = "update whuwork set wdscp='$wdscp' where wid='$wid'";

$wdscp = 'Stevie Hoang is a big cow!';
$wid = '2';

update('whuwork', "wdscp='$wdscp'", "wid='$wid'");
*/

?>
