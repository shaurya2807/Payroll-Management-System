goods="0123456789."; // onKeypress="goods='abcd'; return limitchar(event)"
function limitchar(e)
{
	var key, keychar;
	if (window.event)
		key=window.event.keyCode;
	else if (e)
		key=e.which;
	else
		return true;
	keychar = String.fromCharCode(key);
	keychar = keychar.toLowerCase();
	goods = goods.toLowerCase();
	if (goods.indexOf(keychar) != -1)
	{
		goods="0123456789.";
		return true;
	}
	if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
	{
		goods="0123456789.";
		return true;
	}
	return false;
}
/////Function for passengar_valid//////
function validateEmail(email) {
	// console.log(email)
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateName(name)
{
   var regEx = /^[a-zA-Z ]*$/;
   return regEx.test(name);
} 

function validateDOB(dob) {
    var pattern = /^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
    // return pattern.test(dob);
    // console.log(dob.value)		
    var x=pattern.test(dob) || pattern.test(dob.value);
    if(x)
    {
	    var datestr = dob.value;
	    // console.log(datestr)
	    // console.log(dob)
	    if (! datestr){
	    	datestr = dob;
	    // console.log(datestr)

	    }

	    var dateParts = datestr.split("/");
		var dateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]); 
		console.log(dateObject)
	    var date = new Date(dateObject);
	    var now = new Date();
	    // console.log(date)
	    // console.log(now)
	    // console.log(now.getFullYear() - date.getFullYear())
	    if((date < now ) && ((now.getFullYear() - date.getFullYear())>=18))
	    {
	    	alert(date + " is above 18")
	 	   x=1;
	    } 
	    else
	    {
	    	alert(date + " is below 18")
	    	x=0;
	    }
    }
    else{
    	console.log("pattern mismatch")
    }
    // alert(x)
    return x;
}
 