<?php

include('conn.php'); // �������ݿ�

/* 
    ����һ����¼
	$paraΪkey-value���飬key��������valueΪֵ
	$talbe Ϊ����
	����ִ�н��
*/
function insert($para, $table)
{
	
	$str = 'INSERT INTO ' . $table . '(';
	$val = '';
	$flag = false;
	
	foreach($para as $key=>$value){
		if($flag)  {
			$str .= ',';
			$val .= ',';
		}
		$flag = true;
		
		$str .= $key;
		$val .= "'$value'";
	}
	$str .= ')';
	$val .= ')';
	
	$str .= 'VALUES(' . $val; // ���յ�sql���
	// echo $str; 
	return write_db($str);
}

/*
// Test Case:
$array = array(
	"username" => "weitao201",
	"password" => "assssssss",
	"email" => "weitao201@163.com",
	"regdate" => 123123,
	"name" => "ng1091",
);


if(insert($array, 'whuuser'))
{
	echo 'insert ok!';
}
else
{
	echo 'insert failed';
}
*/


?>

