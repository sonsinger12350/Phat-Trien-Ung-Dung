<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM users 
WHERE user_id != '".$_SESSION['user_id']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-striped">
	<tr>
		<th width="70%">Tài Khoản</td>
		<th width="20%">Trạng Thái</td>
		<th width="10%">Hành động</td>
	</tr>
';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 5 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span><img src="../../images/online.png" width="30px" height="30px"></span>';
	}
	else
	{
		$status = '<span><img src="../../images/offline.png" width="30px" height="30px"></span>';
	}
	$output .= '
	<tr>
		<td>'.$row['ten'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.$status.'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['ten'].'">Trò Chuyện</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>