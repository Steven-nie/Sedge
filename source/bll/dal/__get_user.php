<?php
/*
Author: ng1091
Date: 2013-11-09
Description: ȡ��һ���û���¼
*/

include('__select.php');


/*
	�����û�ID����user�����ظ��û���¼
	$id Ϊ�û�ID
	�����û���¼�����飬��false��ʾδ�ҵ�
*/
function get_user_by_id($id)
{
	$res = select('*','ng_user',"ID='$id' limit 1");
	return mysql_fetch_array($res);
}


/*
	�����û��������user�����ظ��û���¼
	$login Ϊ�û�����
	�����û���¼�����飬��false��ʾδ�ҵ�
*/
function get_user_by_login($login)
{
	$res = select('*','ng_user',"user_login='$login' limit 1");
	return mysql_fetch_array($res);	
}


/*
	�����û�ѧ�Ų���user�����ظ��û���¼
	$stuid Ϊ�û�ѧ��
	�����û���¼�����飬��false��ʾδ�ҵ�
	* ע��ѧ����varchar�ͣ���������˼�����
*/
function get_user_by_stuid($stuid)
{
	$res = select('*','ng_user',"user_stuid='$stuid' limit 1");
	return mysql_fetch_array($res);	
}


/* test case
echo '<br>get_user_by_id';
$arr = get_user_by_id(2);
var_dump($arr);

$arr = get_user_by_id(12);
if($arr == false) echo '<br>not found';
else var_dump($arr);

echo '<br>get_user_by_login';
var_dump(get_user_by_login("weitao201@163.com"));

echo '<br>get_user_by_stuid';
var_dump(get_user_by_stuid('2011301500699'));
*/

?>

