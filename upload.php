<!DOCTYPE html>
<html>
<head>
   <title> FILE UPLOAD </title>

   <style type="text/css">
   	
   	.h1{
   		text-align: center;
   		font-weight: bold;
   	}

   	table.table{
   		margin-left:auto; 
    margin-right:auto;
   	}

   	.submit{
   		background-color: #4CAF50;
	
	color: white;
    }



   </style>
</head>
<body>

<?php
@$name = $_FILES['file']['name'];
@$size = $_FILES['file']['size'];
@$type = $_FILES['file']['type'];
@$tmp_name = $_FILES['file']['tmp_name'];
if (isset($name)) {
    if (!empty($name)) 
    {
    $location = 'Uploads/';
    if (move_uploaded_file($tmp_name, $location. $name));
    echo 'Uploaded Successfully';
    }
    else 
    {
        echo 'Please choose a file';
    }

}
?>


<form action="upload.php" method="POST" enctype="multipart/form-data">
<h1 class=h1> FILE UPLOADING USING FILE HANDLING IN PHP</h1>
<table class="table">
	<tr>
		<td><label for="file"><b>Select the file to upload :</b></label></td>
		<td><input type="file" name="file" class="input"></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="Submit" value="Upload" class="submit"></td>
	</tr>
</table>
</form>

<h4> UPLOADED FILE'S DETAILS :</h4>
FILE NAME : <?php echo @$name = $_FILES['file']['name']; ?> <br/>
FILE SIZE : <?php echo @$size = $_FILES['file']['size']; ?> <br/>
FILE TYPE : <?php echo @$type = $_FILES['file']['type']; ?> <br/>
FILE'S TEMP_NAME : <?php echo @$tmp_name = $_FILES['file']['tmp_name']; ?> <br/>
</body>
</html>

