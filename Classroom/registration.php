<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen"/>
</head>
<body>
<?php
require('db.php');
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "INSERT into `users` (Username, Password, Email)
VALUES ('$username', '".md5($password)."', '$email')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<font color='#8e1b0e' size='+2'>You are registered successfully.</font>
<br/>Click here to <a href='login.php'>Login</a>!!</div>";
        }
    }else{
?>
<body>
    <div id="login">
	</br></br></br></br>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Registration</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" placeholder="Username" class="form-control"required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                               <input type="password" name="password" placeholder="Password" class="form-control"required>
                            </div>
                             <div class="form-group">
                                <label for="Email" class="text-info">Email:</label><br>
                               <input type="text" name="email" placeholder="Email" class="form-control"required>
                            </div>
                            <div class="form-group">
                             <input name="submit" type="submit" class="btn btn-info btn-md" value="Register"/>
                             <input name="reset" type="reset" class="btn btn-info btn-md" value="Reset"/>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
    </div>
</body>
<?php } ?>
</body>
</html>