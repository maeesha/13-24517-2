<?php
	$userName=$password;
	$userNameErr=$passwordErr;
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
		
{	
	$userName = $_POST['userName'];
	$password =  $_POST['password'];
	
	
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
	
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
?>

<fieldset>
	<legend><b>Login</b></legend>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   <!$_SERVER["PHP_SELF"]Returns the filename of the currently executing script> 

	
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
	
	<input> type="submit"
	
</form>

</div>
</body>

</html>