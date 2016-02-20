  <title>Eudoxos </title>
<head>  
	<a href='logout.php' style="display:inline; float:right;">Logout</a>
	<img src="eudojos.png" alt="HAF" style="width:100px;height:100px;" align="left"> 
	<script type="text/javascript">
function validate(){
var radio1=document.getElementById('1').checked;
var radio2=document.getElementById('2').checked;
var radio3=document.getElementById('3').checked;
var radio4=document.getElementById('4').checked;
var radio5=document.getElementById('5').checked;
var radio6=document.getElementById('6').checked;
var radio7=document.getElementById('7').checked;
var radio8=document.getElementById('8').checked;
var radio9=document.getElementById('9').checked;
var radio10=document.getElementById('10').checked


if (((radio1=="")&&(radio2==""))||((radio3=="")&&(radio4==""))||((radio5=="")&&(radio6==""))||((radio7=="")&&(radio8==""))||((radio9=="")&&(radio10=="")))
{
alert("select a book for each course");
return false;
}
return true;
}
</script>
	
</head>
	<br></br>
<p>
<form method="POST" >
<form method="POST" >
<br>
 </br>

<p>
<hr>
<h3>Student Information:</h3>
<hr>
<p>

<?php

session_start();  
	if(!$_SESSION['user_name'])  {  
    header("Location: login.php");
	
//redirect to login page to secure the welcome page without login access. 
} 

$dbcon=mysqli_connect("localhost","root","");  
mysqli_select_db($dbcon,"users");  

$user_name = $_SESSION['user_name'];


$sql = "SELECT firstname,lastname,semester,user_email,AM FROM users WHERE user_name = '$user_name'";

$run = mysqli_query($dbcon , $sql); 


$firstname='firstname';
$lastname='lastname';
$semester='semester';
$user_email='user_email';
$AM='AM';

if (mysqli_num_rows($run) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($run)) {
        echo '<b><font color=blue>FirstName:</font></b>' .$row[$firstname].'<br></br><b><font color=blue>LastName:</font></b>'
		.$row[$lastname] .'<br></br><b><font color=blue>Semester:</font></b>'.$row[$semester]
		.'<br></br><b><font color=blue>E-mail:</font></b>'.$row[$user_email].'<br></br><b><font color=blue>Registration Number:</font></b>'.$row[$AM];
    }
} else {
    echo "0 results";
}
?>

<br></br>
<b><font color="blue">University</font></b>: 
<?php
echo $_SESSION['id'];
?>

<hr>
<h3><b> Selection of Books</b> </h3>
<hr>
<form name="subjectsForm"  action="store.php" method="POST">
			 <section>
			         <p><font color=blue><b>Introduction to Programming:</b></font></p>
					 
					 <div id="choices">
					 
					 <input type="radio" id="1" name="subject1Choice" value="C: How to Program (6th Edition) by Deitel" /> C: How to Program (6th Edition) by Deitel
					 <br>
			         <input type="radio" id="2" name="subject1Choice" value="The C Programming Language by Brian" /> The C Programming Language by Brian
			         
					 </div>				 
					 
			 </section>

			 <hr/>
             <section>
			         <p><b><font color=blue>Database 1:</b></font></p>
					 
					 <div id="choices">
					 <input type="radio" id="3" name="subject2Choice" value="Beginning Database Design: From Novice to Professional" /> Beginning Database Design: From Novice to Professional
					 <br>
			         <input type="radio" id="4" name="subject2Choice" value="Database Systems: Design, Implementation, & Management" /> Database Systems: Design, Implementation, & Management 
					 </div>				 
			 
			 </section>

		     <hr/>
			 
			 <section>
			         <h4><font color=blue>Network 1:</font></h4>
					 <div id="choices">
					 
					 <input type="radio" id="5" name="subject3Choice" value="Unix Network Programming" /> Unix Network Programming
					 <br>
			         <input type="radio" id="6" name="subject3Choice" value="Computer Networks (5th Edition)" /> Computer Networks (5th Edition)
			         
					 </div>				 
			 
			 </section>

		     <hr/>
			 
			 <section>
			         <h4><font color=blue>Computer Architecture:</font></h4>
					 <div id="choices">
					 <input type="radio" id="7" name="subject4Choice" value="The Essentials of Computer Organization and Architecture" /> The Essentials of Computer Organization and Architecture
					 <br>
			         <input type="radio" id="8" name="subject4Choice" value="Computer Organization and Design, Fourth Edition" /> Computer Organization and Design, Fourth Edition
			         
					 </div>				 
			 
			 </section>
		     <hr/>
			 <section>
			         <h4><font color=blue>Computer Security:</font></h4>
					 
					 <div id="choices">
					 <input type="radio" id="9" name="subject5Choice" value="Computer and Information Security Handbook, Second Edition" /> Computer and Information Security Handbook, Second Edition
					 <br>
			         <input type="radio" id="10" name="subject5Choice" value="Computer Security: Principles and Practice" /> Computer Security: Principles and Practice
					 </div>				 
			 
			 </section>
		     
		     <hr/>
			 <br/>
			 <input type="submit" name="submit" value="Submit" id="submitButton" onclick = "return validate()"  /> 
		</form>

<hr>

<?php

if(isset($_POST['submit']))  
{           
         $serverName = "localhost"; 
	     $userName = "root";
	     $password = "";
		 $dbName = "users";
		 $table1 = "users";
		 $table2 = "forms"; 
		 
		 $choice1 = $_POST["subject1Choice"];
		 $choice2 = $_POST["subject2Choice"];
		 $choice3 = $_POST["subject3Choice"];
		 $choice4 = $_POST["subject4Choice"];
		 $choice5 = $_POST["subject5Choice"];
		 
		 
		 $con = mysql_connect($serverName,$userName,$password);
		
         mysql_select_db($dbName,$con) or die('could not select database :' . mysql_error());
         
         $user_name = $_SESSION['user_name'];
         
         $sql = "SELECT AM FROM $table1 WHERE user_name LIKE '$user_name'";
		 $results = mysql_query($sql);
		 $data = mysql_fetch_assoc($results); 
		 $AM = $data["AM"];
		 
		 
		 $sql = "SELECT COUNT(AM) AS sum FROM $table2 WHERE AM LIKE '$AM'";
		 $results = mysql_query($sql);
		 $data2 = mysql_fetch_assoc($results);
		 $hasForm = $data2["sum"];	
		 
		 if($hasForm == 1){
			 
			 $sql = "DELETE FROM $table2 WHERE AM LIKE '$AM'";
			 mysql_query($sql,$con);
			 
			 $sql = "INSERT INTO $table2 (user_name,AM,subject1,subject2,subject3,subject4,subject5) VALUES ('$user_name','$AM','$choice1','$choice2','$choice3','$choice4','$choice5')";
		     mysql_query($sql,$con); 
			 
		   echo "<html> <body> <h1>You have successfully modified your form</h1> </body> </html>";
		 }
		 
		 
		 $sql = "INSERT INTO $table2 (user_name,AM,subject1,subject2,subject3,subject4,subject5) VALUES ('$user_name','$AM','$choice1','$choice2','$choice3','$choice4','$choice5')";
		 mysql_query($sql,$con); 
		 
		 mysql_close($con);
		 
		 echo "<html> <body> <h1> DATA HAS BEEN STORED</h1> </body> </html>";
	echo "<script>window.open('end.php','_self')</script>";  
		
       //here session is used and value of $user_email store in $_SESSION.
}
?>
</form>