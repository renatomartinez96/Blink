<script src="assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/js/bloques.js"></script>
<script>
var editor = ace.edit("editor");
	editor.setTheme("ace/theme/monokai");
	editor.getSession().setMode("ace/mode/html");
	editor.getSession().on('change', function(){
	$('.yourSite').html(editor.getSession().getValue());
	});
</script> 
<script>
var editor = ace.edit("editor2");
	editor.setTheme("ace/theme/monokai");
	editor.getSession().setMode("ace/mode/css");
	editor.getSession().on('change', function(){
	$('.yourSite').html(editor.getSession().getValue());
	});
</script> 
<script>
	  $(function() {
		$( "#accordion" ).accordion({
		  heightStyle: "content"
		});
	  });
 </script>