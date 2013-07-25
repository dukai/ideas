<?
if(!empty($_SERVER['HTTP_AJAXTYPE'])){
?>

<div>About content</div>

<?}else{?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ideas</title>
</head>
<body>
<h1>About</h1>
<div class="navbar">
<a href="index.html" data-pjax="#content" class="pjax">Home</a> | <a href="about.html" data-pjax="#content" class="pjax">About</a>
</div>
<div id="content">
	<div>About content</div>
</div>
<script src="resource/js/jquery-1.9.1.min.js"></script>
<script>
window.addEventListener("popstate", function(e) {
    console.log("AA");
});
$('a.pjax').click(function(e){
	e.preventDefault();
	history.pushState({href: this.href}, 'Another', this.href);
	var contentId = this.getAttribute('data-pjax');
	$.ajax({
		headers : {
			ajaxType: 'pjax'
		},
		url: this.href, 
		success: function(r){
			$(contentId).html(r);
		}
	});
});

</script>
</body>
</html>

<?}?>