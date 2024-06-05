<?php
	include '../../sqlCommands/connectDb.php';
	session_start();
	$message=0;
	$output='';
	if(isset($_SESSION['id'])) 
	{
		$user_name=$_SESSION['email'];
		//$sql="SELECT `friend_id`,`message`,`sent_time`,`profile_image`,user_details.id FROM `$user_name`,`message`,`user_details` WHERE status=1 AND friend_id=user_id AND user_name=friend_id ORDER BY message.sent_time ASC,message.id DESC LIMIT 5";
		//$sql="SELECT * FROM (SELECT * FROM message ORDER BY id desc limit 20) tmp ORDER BY tmp.id ASC";
		$r="SELECT * FROM (SELECT `friend_id`,`message`,general_user.id FROM `$user_name`,`message`,`general_user` WHERE status=1 AND friend_id=user_id AND user_name=friend_id ORDER BY message.id DESC limit 20) tmp ";
		$result=mysqli_query($sql,$r);
		$count=mysqli_num_rows($result);
		if($count > 0)
		{
			$message=1;
			$output=array();
			while ($row=mysqli_fetch_array($result)) 
			{
				$type='friend';
				if($user_name==$row['friend_id'])
				{
					$type='user';
				}
				$output[] = array(
								'id'			=>	$row['id'],
								'type'			=>	$type,
								'friend_id'		=>	$row['friend_id'],
								'message'		=>	$row['message'],
							);
			}
		}
	}
	echo json_encode($output);
?>