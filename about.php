<?
if(empty($_SERVER['HTTP_AJAXTYPE'])){
?>
<?include "header.php"?>
<div id="mainbody">
	<div id="maincontent">
<?}?>
	<h1>关于我们</h1>
	<p>这是关于我们的内容</p>

<?
if(empty($_SERVER['HTTP_AJAXTYPE'])){
?>
		</div>
	<?include "aside.php"?>
</div>
<?include "footer.php"?>
<?}?>