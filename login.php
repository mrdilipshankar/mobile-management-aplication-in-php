<?php
session_start();
$conn = mysqli_connect("localhost","root","","mobilereg");

if(isset($_POST['loginhere']))
{
	$user_email = $_POST['loginName'];
	$user_pass = $_POST['loginPassword'];
	$sqldata = "SELECT * FROM admin_login WHERE login_email ='$user_email' AND login_pass = '$user_pass'";

	$result = mysqli_query($conn,$sqldata);
	$rows = mysqli_fetch_assoc($result);
	if($rows == true)
	{
		$_SESSION["email"]=$rows['login_email'];
		header("Location:dashboard.php");


	}
	else
	{
		// echo '<script>alert(Creditional not Match)</script>';
		header("Location:index.php");
		
		
	}
}

?>

<section class="login-blk">
	<div class="container">
		<div class="row">

			<div class="col-lg-12">

					<div class="loginform">
						<h3>Login</h3>
						 

						<form action="" method="post" onsubmit="return validateForm()" name="myForm">
							<div class="form-group">
								<input type="email" name="loginName" value="" placeholder="Enter Your Email" class="form-control">
							</div>
							<div class="form-group">
								<input type="password" name="loginPassword" placeholder="Password" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="loginhere" value="Login" class="btn-silaris">
							</div>
						</form>
						<div class="form-forgot">
							<p onclick="myfun()" class="text-white" style="cursor: pointer;"> Forgot Password</p>
						</div>

					</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	function myfun()
	{
		alert('Please contact technical support');

	}
	function validateForm() {
  var x = document.forms["myForm"]["loginName"].value;
  var y = document.forms["myForm"]["loginPassword"].value;
  if (x == "" ) {
    alert("Email must be filled out");
    return false;
  }
  if(y == "")
  {
  	alert("Password must be filled out");
  	return false;
  }

}
</script>

