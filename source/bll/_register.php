<?php

function register()
{
	include('_main.php');
	
	$err = '';
	/* Ĭ��ֵ */
	$para['user_status'] = 0;
	$para['user_school'] = 'whu';
	$para['user_nickname']= '';
	$para['user_name']= '';
	
	/*���пա�*/
	if(strlen($_POST['user_login']) == 0 && strlen($_POST['user_stuid']) == 0)
	{
		$err = '�����ѧ�Ų���ͬʱΪ��';
		return $err;
	}
	if(strlen($_POST['user_pass']) == 0)
	{
		$err = '���벻��Ϊ��';
		return $err;
	}
	
	/* �п� & ��� */
	if(strlen($_POST['user_login']) == 0)
	{
		$para['user_login'] = 'none';
	}
	if(strlen($_POST['user_stuid']) == 0)
	{
		$para['user_stuid'] = '';
	}
	if(strlen($_POST['user_status']) != 0)
	{
		$para['user_status'] = $_POST['user_status'];
	}
	if(strlen($_POST['user_school']) != 0)
	{
		$para['user_school'] = $_POST['user_school'];
	}
	if(strlen($_POST['user_nickname']) != 0)
	{
		$para['user_nickname'] = $_POST['user_nickname'];
	}
	if(strlen($_POST['user_name']) != 0)
	{
		$para['user_name'] = $_POST['user_name'];
	}
	
	/* �޳�*/
	if(strlen($_POST['user_login']) > $users_len['user_login'])
	{
		$err = '���䳤�ȳ�������';
		return $err;
	}
	if(strlen($_POST['user_pass']) > $users_len['user_pass'])
	{
		$err = '���볤�ȳ�������';
		return $err;
	}
	if(strlen($_POST['user_status']) > $users_len['user_status'])
	{
		$err = 'status error';
		return $err;
	}
	if(strlen($_POST['user_school']) > $users_len['user_school'])
	{
		$err = 'ѧУ���ȳ�������';
		return $err;
	}
	if(strlen($_POST['user_stuid']) > $users_len['user_stuid'])
	{
		$err = 'ѧ�ų��ȳ�������';
		return $err;
	}
	if(strlen($_POST['user_nickname']) > $users_len['user_nickname'])
	{
		$err = '�ǳƳ��ȳ�������';
		return $err;
	}
	if(strlen($_POST['user_name']) > $users_len['user_name'])
	{
		$err = '�������ȳ�������';
		return $err;
	}
	
	
	/* ���� */
	if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $_POST['user_login']))
	{
		$err = '���䲻��ȷ';
		return $err;
	}
	// password
	
	
	/* ���� */
	$para['user_registered'] = time();
	
	$temp = MD5(time());
	$temp = $temp . $random_key['user_passkey'];
	$temp = MD5($temp);
	$para['user_passkey'] = $temp;
	
	// echo 'pass:' , $_POST['user_pass'] , '<br>';
	$para['user_pass'] = get_pass_hash(MD5($_POST['user_pass']), $random_key['user_passkey']. $para['user_passkey']);	
	
	
	/* ��װ д��db */
	foreach($users_field as $value)
	{
		if(!isset($para[$value])) {
			$para[$value] = $_POST[$value];
		}
	}

	print_r($para); // debug
	
	include('dal/__insert.php'); // �ײ㺯��
	if(insert($para,'ng_users'))
	{
		// ע��ɹ�
		// return 1;
		return 'ע��ɹ�';
	}
	else
	{
		$err = 'ע��ʧ��';
		return $err;
	}

}


$str = register();
echo $str;


/*

//ע����Ϣ�ж�
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
	exit('�����û��������Ϲ涨��<a href="javascript:history.back(-1);">����</a>');
}
if(strlen($password) < 6){
	exit('�������볤�Ȳ����Ϲ涨��<a href="javascript:history.back(-1);">����</a>');
}
if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $email)){
			     ��������//ƥ��email��ַ 
	exit('���󣺵��������ʽ����<a href="javascript:history.back(-1);">����</a>');
}
if(strlen($name) > 10) {
	exit('�����������Ȳ����Ϲ涨.<a href="javascript:history.back(-1);">����</a>');
}
*/



?>