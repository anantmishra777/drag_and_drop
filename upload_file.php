<!DOCTYPE html>
<html>
	<head>
		<title>UPLOAD</title>
		<style>
			#drop_file_zone 
			{
			    background-color: #EEE; 
			    border: #999 5px dashed;
			    width: 290px; 
			    height: 200px;
			    padding: 8px;
			    font-size: 18px;
			}
			#drag_upload_file 
			{
				width:50%;
				margin:0 auto;
			}
			#drag_upload_file p 
			{
				text-align: center;
			}
			#drag_upload_file #selectfile 
			{
				display: none;
			}
		</style>
	</head>
	<body>
		<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
			<div id="drag_upload_file">
				<p>Drop file here</p>
				<p>or</p>
				<p><input type="button" value="Select File" onclick="file_explorer();"></p>
				<input type="file" id="selectfile">
			</div>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	</body>	
	<script type="text/javascript">
		var fileobj;
		function upload_file(e) 
		{
			e.preventDefault();
			fileobj = e.dataTransfer.files[0];
			ajax_file_upload(fileobj);
		}

		function file_explorer() 
		{
			document.getElementById('selectfile').click();
			document.getElementById('selectfile').onchange = function() 
			{
			    fileobj = document.getElementById('selectfile').files[0];
				ajax_file_upload(fileobj);
			};
		}

		function ajax_file_upload(file_obj) 
		{
			if(file_obj != undefined) 
			{
			    var form_data = new FormData();                  
			    form_data.append('file', file_obj);
				$.ajax(
				{
					type: 'POST',
					url: 'ajax.php',
					contentType: false,
					processData: false,
					data: form_data,
					success:function(response) 
					{
						alert(response);
						$('#selectfile').val('');
					}
				});
			}
		}
</script>
</html>