<div id="loading"></div>
<script src="resource/js/jquery-1.9.1.min.js"></script>
<script>
//TODO: 从空白页前进或后退时出现的bug待解决

var getContent = function(url, contentId){
	$('#loading').show();
	$.ajax({
		headers : {
			ajaxType: 'pjax'
		},
		url: url, 
		success: function(r){
			$(contentId).html(r);
			$('#loading').hide();
		}
	});
};
var historyStack = {};
var historyCurrentPointer = 0;
window.addEventListener("popstate", function(e) {
	if(historyStack[location.href]){
		$(historyStack[location.href].id).html(historyStack[location.href].html);
		return;
	}
	var state = e.state;
	
	if(!state){
		return;
	}
	getContent(state.href, state['data-pjax']);
	
});
$('a.pjax').click(function(e){
	e.preventDefault();
	var contentId = this.getAttribute('data-pjax');
	historyCurrentPointer ++;
	historyStack[location.href] = {
		html: $(contentId).html(),
		id: contentId
	};
	history.pushState({href: this.href, 'data-pjax': contentId}, 'Another', this.href);
	
	getContent(this.href, contentId);
});



</script>
</body>
</html>