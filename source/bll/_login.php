
<?php
/*
Author: Ng1091
Date: 2013-10-31
Description: ��¼��֤������$user��$pass����֤��¼��Ϣ�Ƿ���ȷ�����ؽ����
*/

function login($user, $pass)
{
	include('_main.php');
	$err = '';


	/*���пա�*/
	if(is_none($user))
	{
		$err = '��¼������Ϊ��';
		return $err;
	}
	if(is_none($pass))
	{
		$err = '���벻��Ϊ��';
		return $err;
	}
	
	/* ���� */
	
	// �ж������仹��ѧ��
	
	$login_type = 'user_login';
	$login_type = 'user_stuid';
	
	
	
	
	/* �޳�*/
	if(len_limit($user, $users_len[$login_type])
	{
		$err = '��¼��������������';
		return $err;
	}

	/* ��֤��& ��¼ */
	// ȡ��passkey
	include('dal/__select.php'); // �ײ㺯��

	$passkey = select('user_passkey', 'ng_users', "$login_type='$user' limit 1");
	
	$row = mysql_fetch_array($passkey);
	$passkey = $row[0];
	
	if(is_none($pass_key)
	{
		$err = 'get pass_key error';
		return $err;
	}
	
	$pass =  get_pass_hash(MD5($pass), $random_key['user_passkey']. $passkey);
	
	
	

	if(select('uid', 'ng_users', "$login_type='$user' and user_pass='$pass' limit 1"))
	{
		// ��¼�ɹ�
		// ����Ự 
		
		return '��¼�ɹ�';
	}
	else
	{
		$err = '��¼ʧ��,�û������������';
		return $err;
	}
}


// ������� login & pass
$str = login($_POST['login'],$_POST['pass']);
echo $str;

?>
	