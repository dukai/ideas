<?
require_once "lib/common.php";
$db = getDb();
$threads = $db->fetchAll("select t.*, p.content as content from threads as t left join posts as p on p.tid = t.id order by t.id desc");
if(empty($_SERVER['HTTP_AJAXTYPE'])){
?>
<?include "header.php"?>
<div id="mainbody">
	<div id="maincontent">
<?}?>


	<ul>
	<?foreach($threads as $t){?>
		<li>
			<div class="title"><?= $t['subject']?></div>
			<div class="summary"><?= $t['content']?></div>
			<div class="cite">By <?=$t['author']?> at <?= $t['created_time']?></div>
		</li>
	<?}?>
	</ul>

<?
if(empty($_SERVER['HTTP_AJAXTYPE'])){
?>
	</div>
	<?include "aside.php"?>
</div>
<?include "footer.php"?>
<?}?>