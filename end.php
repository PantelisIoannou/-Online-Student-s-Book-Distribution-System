<title>Eudoxos </title>
<head>  
	<a href='logout.php' style="display:inline; float:right;">Logout</a>
	<img src="eudojos.png" alt="Mountain View" style="width:100px;height:100px;" align="left"> 
	  
</head>
	<br></br>
	<br></br>
	<br></br>
	
<hr>
<h3>Your books:</h3>
<hr>
<p>

<?php
session_start();

$dbcon=mysqli_connect("localhost","root","");  
mysqli_select_db($dbcon,"users");  

$user_name = $_SESSION['user_name'];


$sql = "SELECT subject1,subject2,subject3,subject4,subject5 FROM forms WHERE user_name = '$user_name'";

$run = mysqli_query($dbcon , $sql); 

$subject1='subject1';
$subject2='subject2';
$subject3='subject3';
$subject4='subject4';
$subject5='subject5';


if (mysqli_num_rows($run) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($run)) {
        echo '<b><font color=blue>Book1:</font></b>' .$row[$subject1].'<br></br><b><font color=blue>Book2:</font></b>'
		.$row[$subject2] .'<br></br><b><font color=blue>Book3:</font></b>'.$row[$subject3]
		.'<br></br><b><font color=blue>Book4:</font></b>'.$row[$subject4].'<br></br><b><font color=blue>Book5:</font></b>'.$row[$subject5];
    }
} else {
    echo "0 results";
}


?>



<hr>
<h3>You can receive your books from this bookstore:</h3>
<hr>
<h4>1) PLOUS</h4>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1592507.4624236822!2d20.6685073388014!3d38.77824002186755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135b5ddca5e26a47%3A0x336534b7085854c!2zzqDOu86_z4XPgiDOks65zrLOu865zr_PgM-JzrvOtc65zr8tzrrOsc-GzrUgUGxvdXMgQm9va3MgJiBjb2ZmZWU!5e0!3m2!1sel!2sgr!4v1451492546085" width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
<hr>

<p>