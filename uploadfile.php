<?php

$path = "uploads/";

$file_name = $_FILES["file"]["name"];

$file_tmp =$_FILES["file"]["tmp_name"];

if(move_uploaded_file($file_tmp,$path.$file_name))

echo "Success";

else echo "Fail";

?>