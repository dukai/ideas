<?
require_once "lib/common.php";
$db = getDb();
$threads = $db->fetchAll("select t.*, p.content as content from threads as t left join posts as p on p.tid = t.id order by t.id desc");

if(empty($_SERVER['HTTP_AJAXTYPE'])){
?>
<?include "header.php"?>
<div id="mainbody">
<?}?>


	<ul>
	<?foreach($threads as $t){?>
		<li><?= $t['subject']?></li>
	<?}?>
	</ul>

<?
if(empty($_SERVER['HTTP_AJAXTYPE'])){
?>
</div>
<?include "footer.php"?>
<?}?>