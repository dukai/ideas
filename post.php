<?
require_once "lib/common.php";
$dateTime = date("Y-m-d H:i:s");
$db = getDb();
$threadData = array(
	'subject' => $_POST['subject'],
	'created_time' => $dateTime,
	'author' => 'dukai',
	'authorid' => '1'
);

$tid = $db->insertData('threads', $threadData);

$postData = array(
	'tid' => $tid,
	'content' => $_POST['content'],
	'created_time' => $dateTime,
	'author' => 'dukai',
	'authorid' => 1,
	'first' => true
);

$db->insertData('posts', $postData);
header("Location: /");   

?>