<?php  
session_start();//session starts here  
?>  
  
<html>
<head>
	<img src="eudojos.png" alt="HAF" style="width:100px;height:100px;" align="left">
	<style type="text/css">
		body{ font-family:verdana; font-size:15px; }
		div#back_glob{ background-color:white; border:1px solid #25b2d5; width:450px; height:300px; margin: auto; box_shadom:1px 0px 15px 25b2d5;}
		input{ display:block; margin:10px; }
		div#back_header{ background-color:25b2d5; text-align:center; font-size:22px; font-weight:bold; color:white; padding:10px; }
		input[type-text],input[type-password]{font-size:15px; padding:15px; border-radius:3px; border:1px solid #ddd; }
		input[type-submit]{background-color:25b2d5; padding:5px 10px 5px 10px; border-radius:3px; border:1px solid #319db8; color:white;
		font-weight:bold; }
			div#back_form{ display:flex; justify-content:center; }
			
	</style>
</head>
<body>
	<div id="back_glob">
		<div id="back_header">
			LOGIN
		</div>
		
		<div id="back_form">
			<form method="POST">
			<br>
			<select name="id"  >
				<option value="" disabled selected>Select your University</option>
				<option value="IONIAN UNIVERSITY">IONIAN UNIVERSITY</option>
				<option value="AEGEAN UNIVERSITY">AEGEAN UNIVERSITY</option>
				<option value="UNIVERSITY OF CRETE">UNIVERSITY OF CRETE</option>
				<option value="UNIVERSITY OF IOANNINA">UNIVERSITY OF IOANNINA</option>
				<option value="UNIVERSITY OF MACEDONIA">UNIVERSITY OF MACEDONIA</option>
				<option value="UNIVERSITY OF THESSALIA">UNIVERSITY OF THESSALIA</option>
				<option value="UNIVERSITY OF PELOPONNISOS">UNIVERSITY OF PELOPONNISOS</option>
				<option value="UNIVERSITY OF PATRA">UNIVERSITY OF PATRA</option>
				<option value="UNIVERSITY OF MACEDONIA">UNIVERSITY OF MACEDONIA</option>
			</select>
			
			
			 <input type="text" name="name" placeholder="Username" autofocus/>
			 <input type="password" name="pass" placeholder="Password" value=""  />
			 <input type="submit" name="login" placeholder="Login" value="Login"/>
			 </form>
		</div>
	</div>
</body>
</html>
  
  

  
<?php  
$serverName = "localhost"; 
$userName = "root";
$password = "";
$dbName = "users";

$con=mysql_connect($serverName,$userName,$password) or die('could not connect : ' . mysql_error()) ; 
$sql = "CREATE DATABASE $dbName";

mysql_query($sql,$con);

mysql_select_db($dbName,$con) or die('could not select database :' . mysql_error()) ;

$table1 = "users";
$sql = "CREATE TABLE $table1(id VARCHAR(20) NOT NULL,user_name VARCHAR(20) NOT NULL,user_pass VARCHAR(20) NOT NULL,
	user_email VARCHAR(20) NOT NULL,firstname VARCHAR(50) NOT NULL,lastname VARCHAR(20) NOT NULL,
	semester VARCHAR(20) NOT NULL,AM VARCHAR(20) NOT NULL,PRIMARY KEY(user_name))";
mysql_query($sql,$con);

$table2 = "forms";
$sql = "CREATE TABLE $table2(user_name VARCHAR(20) NOT NULL,AM VARCHAR(10) NOT NULL,
subject1 VARCHAR(60),subject2 VARCHAR(60),subject3 VARCHAR(60),subject4 VARCHAR(60),
subject5 VARCHAR(60),subject6 VARCHAR(60),PRIMARY KEY(user_name))";
mysql_query($sql,$con);

	
$sql="INSERT INTO $table1 VALUES ('IONIAN UNIVERSITY','p12ioan','1234','panioan_13a@yahoo.gr','Pantelis','Ioannou','1','P2012029')"; 
mysql_query($sql,$con);

$sql="INSERT INTO $table1 VALUES ('AEGEAN UNIVERSITY','p12apos','8765','p12ioan@ionio.gr','Kostas','Vradis','2','P2020028')"; 
mysql_query($sql,$con);

$sql="INSERT INTO $table1 VALUES ('UNIVERSITY OF CRETE','p12afra','4321','p12afra@ionio.gr','Dimitra','Afrati','4','P2030027')"; 
mysql_query($sql,$con);


mysql_close($con);
 
$dbcon=mysqli_connect("localhost","root","");
mysqli_select_db($dbcon,"users");

if(isset($_POST['login']))  
{   
	$user_name=$_POST['name'];
    $id=$_POST['id']; 
    $user_pass=$_POST['pass']; 
	
    $check_user="select * from users WHERE   user_name='$user_name' AND id='$id'  AND user_pass='$user_pass' ";  
  
    $run=mysqli_query($dbcon,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
        echo "<script>window.open('welcome.php','_self')</script>";  
		
       //here session is used and value of $user_email store in $_SESSION.
	
		$_SESSION['id']=$id;
		$_SESSION['user_name']=$user_name;	
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";  
    }  
}  
?> 
