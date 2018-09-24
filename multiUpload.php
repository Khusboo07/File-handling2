<!DOCTYPE html>
<html>
<head>
	<title>UPLOADING MULTIPLE FILES </title>

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
if(isset($_POST['submit'])){
    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
          //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                //save the url and the file
                $filePath = "Uploads/" . date('d-m-Y-H-i-s').'-'.$_FILES['upload']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $shortname;
                    //insert into db 
                    //use $shortname for the filename
                    //use $filePath for the relative url to the file

                }
              }
        }
    }

    //show success message
    echo "<h1>Uploaded:</h1>";    
    if(is_array($files)){
        echo "<ul>";
        foreach($files as $file){
            echo "<li>$file</li>";
        }
        echo "</ul>";
    }
}
?>
<h1 class=h1> MULTIPLE FILE UPLOADING USING FILE HANDLING IN PHP</h1>
<form action="" enctype="multipart/form-data" method="post">

    <table class="table">
    	<tr>
    		<td><label for='upload'>Add Attachments:</label></label></td>
    		<td> <input id='upload' name="upload[]" type="file" multiple="multiple" /> </td>

    	</tr>
    	
    	<tr>
    		<td></td>

    	</tr>

    	<tr>
    		<td></td>
    		<td>  <input type="submit" name="submit" value="Submit"> </td>
    		
    	</tr>
    </table>

</form>
</body>
</html>