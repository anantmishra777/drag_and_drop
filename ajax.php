<?php
	if ( !file_exists('uploaded_files') ) //create folder to store uploaded files
		mkdir('uploaded_files', 0777);

	move_uploaded_file($_FILES['file']['tmp_name'], 'uploaded_files/' . $_FILES['file']['name']);
	echo "File uploaded successfully.";
?>