<?php
    include'C:\xampp\htdocs\phpqrcode.php'; 
	echo "in the function";
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
 	$url = "https://";   
	else  
 	$url = "http://";   
	// Append the host(domain name, ip) to the URL.   
	// $url.= gethostbyname(trim(`hostname`));  
    // $url.= getHostByName(php_uname('n'));
    $url.= "192.168.0.114";
	$url.= "/payslip.php?salary_id=";  
	$url.= $_REQUEST['id'];  
	// Append the requested resource location to the URL   
	// $url.= $_SERVER['REQUEST_URI'];  
$text = "$url"; 
echo "$url";
  
// $path variable store the location where to  
// store image and $file creates directory name 
// of the QR code file by using 'uniqid' 
// uniqid creates unique id based on microtime 
$path = 'images/'; 
$file = $path.uniqid().".png"; 
  
// $ecc stores error correction capability('L') 
$ecc = 'L'; 
$pixel_Size = 10; 

  
// Generates QR Code and Stores it in directory given 
QRcode::png($text, $file, $ecc, $pixel_Size); 
  
// Displaying the stored QR code from directory 
echo "<center><img src='".$file."'></center>"; 

?>