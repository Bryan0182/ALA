<?php
session_start();
require_once 'conn.php';
$id = $_SESSION['user'];

$sql = "SELECT * FROM user_chat_messages where username='$id' OR recipient='$id' ORDER BY message_time";
$qry = $conn->prepare($sql);
$qry->execute();
$fetch = $qry->fetchAll();
foreach ($fetch as $row):

	$time = date("Y-m-d",strtotime($row['message_time']));
	$now = date("Y-m-d");
	if (($row['username'] == $id) && ($time == $now)) {
		$user = '<strong style="color:#af69ee;">'.$row['username'].'</strong>'.'-->'.$row['recipient']; 
	}else{
		$user = '<strong style="color:#000;">'.$row['username'].'</strong>'; 			
	}	
	if ($time == $now) {
		$hourAndMinutes = date("h:i A", strtotime($row['message_time']));
	}else{
		$hourAndMinutes = date("Y-m-d", strtotime($row['message_time']));
	}
	echo '<p>'.$user.':<em>('.$hourAndMinutes.')</em>'.'<br/>'.' '. $row['message_content']. '</p>';

endforeach; 

?>