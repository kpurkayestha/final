$(document).ready(function(){
	$("#message").submit(function(e){
		var content = tinymce.get("texteditor").getContent();

		$("#data-container").html(content);

		return false;
	});
});