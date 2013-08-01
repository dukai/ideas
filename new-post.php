<?
if(empty($_SERVER['HTTP_AJAXTYPE'])){
?>
<?include "header.php"?>
<div id="mainbody">
	<div id="maincontent">
<?}?>

	<div class="form_box">
		<form method="post" action="post.php">
		<div class="fields_box">
			<div class="cline">
				<label>标题</label>
				<input type="text" name="subject" />
			</div>
			
			<div class="cline">
				<label>内容</label>
				<textarea name="content"></textarea>
			</div>
		</div>
		<div class="cline">
			<button class="btn">确定</button>
			<button class="btn_gray">取消</button>
		</div>
		</form>
	</div>

<?
if(empty($_SERVER['HTTP_AJAXTYPE'])){
?>
	</div>
	<?include "aside.php"?>
</div>
<?include "footer.php"?>
<?}?>