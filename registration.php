<?php
	$name = $email =userName = $gender = $password = $confirmPassword = $dob ="";
	
	$nameErr = $emailErr = $userNameErr = $genderErr = $passErr = $confirmErr = $dobErr = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
		
{	$name = $_POST['name']; 
	$email = $_POST['email'];
	$userName = $_POST['userName'];
	$password =  $_POST['password'];
	$confirmPassword =  $_POST['confirmPassword'];
	$gender =  $_POST['gender'];
	$dob = $_POST['dob'];
	
	$servername ="localhost";
	$username 	="root";
	$password 	="";
	$dbname 	="php";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if(!$conn){
		die("Connection Error!".mysqli_connect_error());
	}else{
		$sql = "insert into registration values ('".$name."','".$email."','".$userName."','".$password."','".$confirmPassword."','".$gender."','".$dob."')";
	}
	
	mysqli_query($conn,$sql);
	mysqli_close($conn);	

	if(empty ($_POST["name"])){
		$nameErr = "Field required";
}	else
	{
		$name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
		{
			$nameErr = "Only letters and white space allowed"; 
		}
	}
	
	if(empty ($_POST["email"])){
		$emailErr = "Field required";
	}
	else
	{
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$emailErr = "Invalid email format"; 
		}
	}
	if(empty ($_POST["userName"])){
		$userNameErr = "Field required";
}	else
	{
		$userName = test_input($_POST["userName"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$userName)) 
		{
			$userNameErr = "Only letters and white space allowed"; 
		}
	}
	if(empty ($_POST["password"])){
		$passErr = "Field required";
	}
	else
	{
		$password = test_input($_POST["password"]);
	}
	if(empty ($_POST["confirmPassword"])){
		$confirmPasswordErr = "Field required";
	}
	else
	{
		$confirmPassword = test_input($_POST["confirmPassword"]);
	if($_POST["confirmPassword"] != $_POST ["password"]) 
	{
		$confirmPasswordErr = "pass doesn't match";
	}
	}
	
	if(empty ($_POST["gender"])){
		$genderErr = "Field required";
	}
	else
	{
		$gender = test_input($_POST["gender"]);
	}
	
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
	
?>

<!DOCTYPE HTML>

<html>
<title>Registration</title>
<head>
<h1 align="center">Registration Form</h1>


</head>
<body>
<div>




<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   <!$_SERVER["PHP_SELF"]Returns the filename of the currently executing script> 

	Name: <br>
	<input type="text" name="name" value="" placeholder="Full Name"/>
	<span class="error">* <?php echo $nameErr;?></span>								<! display errors on html page>
	
	<br>
	<br>
	
	Email: <br>
		
		<input type="text" name="email" value="" placeholder="********@****.com" />
		<span class="error">* <?php echo $emailErr;?></span>	
		<br>
		<br>
		
	userName: <br>
	<input type="text" name="userName" value="" placeholder="Full Name"/>
	<span class="error">* <?php echo $userNameErr;?></span>								<! display errors on html page>
	
	<br>
	<br>
	
	Password:<br>

		<input type="password" name="password" value="" placeholder="*********"/>
		<span class="error">* <?php echo $passErr;?></span>	
		<br>
		<br>
	
	Confirm Password:<br>
		<input type="password" name="confirmPassword" value="" placeholder="*********"/>
		<span class="error">* <?php echo $confirmPasswordErr;?></span>	
		<br>
		<br>
	
	
	Gender: <br>
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="other">Other
		<span class="error">* <?php echo $genderErr;?></span>	
		<br><br>
		
		
		<input type="submit" name="submit" value="submit"/>

	Date Of Birth: <br>
		<input type="text" name="dob" size="2" />/
		<input type="text" name="dob" size="2" />/
		<input type="text" name="dob" size="4" />
	<?php
		echo "<h2>Your Information:</h2>";
		echo $name;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $userName;
		echo "<br>";
		echo $password;
		echo "<br>";
		echo $confirmPassword;
		echo "<br>";
		echo $gender;
		echo "<br>";
		echo $dob;
		echo "<br>";
?>

</form>

</div>
</body>

</html>