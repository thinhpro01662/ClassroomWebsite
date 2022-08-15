<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Class Room</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>
<?php
require('db.php');
session_start();
if (isset($_POST['username']))
{
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
    $query = "SELECT role FROM `users` WHERE Username='$username' and Password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	while($rs = mysqli_fetch_assoc($result))
	{
		$role = $rs['role'];
	}
	$rows = mysqli_num_rows($result);
        if($rows==1)
		{
			$_SESSION['username'] = $username;
			$_SESSION['role'] = $role;
			header("Location: homepage.php");
        }else
		{
			echo "<div class='form'>Username or password is incorrect.</font>
			<br/>Click here to <a href='login.php'>Login</a>!!</div>";
		}
}
else
{
?>
<center>
<div class="formlogin">
<form action="" method="post" name="login">
<center>
<div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" placeholder="Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                               <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">
                             <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
        						<input name="reset" type="reset" class="btn btn-info btn-md" value="Reset"/>
                            </div>
                            <div id="register-link" class="text-right">
                                <p>Not registered yet? <a href='registration.php'>Register Here</a></p><a href='test.php'>Forgot password!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
</form>
</div>
</center>
<?php } ?>
</body>
</html>