<!DOCTYPE html>
<html>
<head>
  <title>HTML5 File Upload</title>
  <style>.progresslayer{

    width:200px;

    height:15px;

    border:1px solid #C14A38;

    display:none;

    margin-top: 10px;

}

 .progressbar{

    width:0px;

    height:15px;

    border:none;

    background: #DC6552;

   

}
.status{
  width:200px;

  font-size:14px;

    font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;

    text-align:center;

     color:#DC6552;

    font-weight:bold;
}
</style>
</head>
<body>
<form action="uploadfile.php" id="form" >
<input type="file" id="file" />
<input type="submit" value="Upload" />
<form>

<!-- Progress Bar -->
<div class="progresslayer" >
   <div class="progressbar" > </div>
</div><p id="status" class="status"></p>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>

$(function(){
var progressBar = $(".progressbar");
var status = $("#status");
var progressBarWidth = 200;

/* This is the width of Progress Bar. You can change it as your requirements and also change it in

css.*/

$("#form").submit(function(){ 

if($("#file").val().length!=0){

$(".progresslayer").show();

status.text("");

var uploadUrl = $(this).attr("action");

uploadFile(uploadUrl );

}

return false;

});

function uploadFile(uploadUrl){

 var file = document.getElementById("file").files[0]; 

  var formdata = new FormData();

  formdata.append("file", file);

  var ajax = new XMLHttpRequest();

  ajax.upload.addEventListener("progress", progressHandler, false);

  ajax.addEventListener("load", completeHandler, false);

  ajax.addEventListener("error", errorHandler, false);

  ajax.addEventListener("abort", abortHandler, false);

  ajax.open("POST", uploadUrl );

  ajax.send(formdata);

}



//This function executes during file upload.

function progressHandler(event)

{

  var percent = Math.round((event.loaded / event.total) * 100);

   status.text(percent+" %");
   
   var p = Math.round((progressBarWidth/100)*percent);

   progressBar.css("width",p+"px");

}



//This function executes when file upload completed.

function completeHandler(event){

  var response = event.target.responseText;

  if(response =="Success")  {

    
    status.text("Successfully Uploaded");

  }

}



//This function executes when there is any error during file upload .

function errorHandler(event){}



//This function executes when file upload aborted.

function abortHandler(event){}

});

</script>
</body>
</html>

