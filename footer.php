<script src="resource/js/jquery-1.9.1.min.js"></script>
<script>

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
	
	$.ajax({
		headers : {
			ajaxType: 'pjax'
		},
		url: state.href, 
		success: function(r){
			$(state['data-pjax']).html(r);
		}
	});
	
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