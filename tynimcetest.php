<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="js/ckeditor/contents.css">

	<script src="js/jquery.js"></script>
	<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>

	<script src="js/ckeditor/ckeditor.js" ></script>

</head>
<body>

	<script>
		tinymce.init({
			selector: '#my_editor',
			plugins: ["image"],
			file_browser_callback: function(field_name, url, type, win) {
				if(type=='image') $('#my_form input').click();
			}
		});

	</script>
	

	<textarea id="my_editor"></textarea>
	<iframe id="form_target" name="form_target" style="display:none"></iframe>
	<form method="POST" id="my_form" action="uploadtest.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
		<input name="image" type="file" onchange="$('#my_form').submit();this.value='';">
	</form>
	<br><br><br>
	<h1>test2</h1>



		<textarea name="editor1" id="editor1" cols="30" rows="10"></textarea>
		<input type="submit">
		<script>
			CKEDITOR.replace( 'editor1');
		</script>





</body>
</html>