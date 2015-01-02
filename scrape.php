<?php
if ($_FILES["file"]["error"] > 0){
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
}
else{
	if (is_uploaded_file($_FILES['file']['tmp_name'])){
		$filePointer = fopen($_FILES['file']['tmp_name'], "rb");

		if ($filePointer!=false){
		  while (!feof($filePointer)){
		    $fileData = fread($filePointer, 4096);
				//echo fgets($fileData). "<br />";
				echo $fileData. "<br />";
		    // Process the contents of the uploaded file here...
				//echo file_get_contents($_FILES['uploadedfile']['tmp_name']); 
		  }

		  fclose($filePointer);
		}
	}
}
?>
