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
</style>
</head>
<div class="crumb">
    </div>
    <div class="clear"></div>
  <div id="content_sec">
    <div class="col3">
<h3 class="heading colr" >Feedback Form</h3>

<div class="container">
  <form >
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
      <option value="India">India</option>
    </select>

    <label for="subject">Subject/Complain</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit" onclick="MyFunction()">
    <input type="reset" value="Reset" class="resetbtn">
  </form>
<div class="col2">
<script>
  
function MyFunction()
{

var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var country = document.getElementById("country").value;
  var subject = document.getElementById("subject").value;

  if(fname===null || lname===null || subject===null || country===null || fname===undefined || lname===undefined || subject===undefined || country===undefined || fname==="" || lname==="" || subject==="" || country===""){
    alert("enter all details");
    return;
  }

$.ajax({
      data : JSON.stringify({
        fname:fname,lname:lname,subject:subject,country:country
      }),
      type : 'POST',
      url : 'http://localhost:8080/feedback',
      contentType: "application/json",
    })
    .done(function(data) {
            alert("feedback submitted");
  document.getElementById("lname").value="";
  document.getElementById("fname").value="";
  document.getElementById("country").value="Australia";
  document.getElementById("subject").value="";

    });

    event.preventDefault();
}

</script>
</body>
</html>
	
<?php include_once("includes/footer.php"); ?>