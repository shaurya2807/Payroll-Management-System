<?php 
include_once("includes/header.php"); 


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.container2 {
 
  background-color: #f3a3a3;
	 padding: 20px;
    border: 1px solid white;
}
</style>
</head>
<div class="crumb">
    </div>
    <div class="clear"></div>
  <div id="content_sec">
    <div class="col3">
<body onload="MyFunction()">

<h3>Feedbacks</h3>

<div class="container" id="border">
  
</div>

<script>
	
function MyFunction()
{var str = "";

		let list = document.getElementById("border"); 
                 

$.ajax({
			type : 'GET',
			url : 'http://localhost:8080/feedback',
		})
		.done(function(data) {
console.log(data);
       			
			var i=0;
                for (x in data) { 
			str+=`<div class="container2">
				<u><b><center>FeedBack ${i+1}</u></center></b>	<br><br>
				First Name:${data[x].fname}<br><br>
			        Last  Name:${data[x].lname}<br><br>
				Country :${data[x].country}<br><br>
				Feedback:${data[x].subject}				
				</div>`;
i=i+1;
                     	
                } 


                list.innerHTML = str;

		});

		event.preventDefault();
}

</script>

</body>
</html>