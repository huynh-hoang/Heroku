<?php
	include("local_config.php");
	#ob_start();
	session_start();
	
	$error = "";
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		// username and password sent from form 
		$login_user = $_POST['username'];
		$login_pwd = $_POST['password']; 
		# Create connection to Heroku Postgres
		$pg_heroku = pg_connect($conn_string);
		# Get data by query
		$sql = "SELECT * FROM account WHERE username = '$login_user' and password = '$login_pwd'";
		$result = pg_query($pg_heroku,$sql);
		
		$num_rows = pg_num_rows($result);

		// If result matched $login_user and $login_pwd, table row must be 1 row
		if($num_rows == 1) 
		{
			$row = pg_fetch_array($result, 0);
			$_SESSION["name"] = $row['username'];
			$_SESSION["shop"] = $row['shop_name'];
			$shop = $row['shop_name'];
			
			if ($shop == "DIRECTOR")
			{
				header("location: director_page.php");
			}
			else
			{
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = 'db_shop.php';
				header("Location: http://$host$uri/$extra?shop=$shop");
				#header("location: db_shop.php/?shop=$shop");
			}
		}
		else 
		{
			$error = "Your Login Name or Password is invalid";
		}
		pg_close();
    }
?>

<html> 

   <head>
	
      <title>ATN STORES LOGIN PAGE</title>
      
      <style type = "text/css">
        * {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		body {
			margin: 50px auto;
			text-align: center;
			width: 600px;
			background-image: url("1.jpg");
			background-repeat: no-repeat;
			overflow:hiden;
			background-size: cover;
		}
		h1 {
			font-family: 'Passion One';
			font-size: 2rem;
			text-transform: uppercase;
		}
		label {
			width: 150px;
			display: inline-block;
			text-align: left;
			font-size: 1.5rem;
			font-family: 'Lato';
		}
		input {
			border: 2px solid #ccc;
			font-size: 1.5rem;
			font-weight: 100;
			font-family: 'Lato';
			padding: 10px;
		}	
		form {
			margin: 25px auto;
			padding: 20px;
			border: 5px solid #ccc;
			width: 500px;
			background: #eee;
		}
		div.form-element {
			margin: 20px 0;
		}
		button {
			padding: 20px;
			font-size: 1.5rem;
			font-family: 'Lato';
			font-weight: 100;
			background: yellowgreen;
			color: white;
			border: none;
		}
		p.success,
		p.error {
			color: white;
			font-family: lato;
			background: yellowgreen;
			display: inline-block;
			padding: 2px 10px;
		}
		p.error {
			background: orangered;
		}
      </style>
      
   </head>
   <h1> WELCOME TO ATN STORES <h1/><br></br>
   
   <body>

        <form method="post" action="" name="signin-form">
			<div class="form-element">
				<label>Username</label>
				<input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
			</div>
			<div class="form-element">
				<label>Password</label>
				<input type="password" name="password" required />
			</div>
			<button type="submit" name="login" value="login">Log In</button>
		</form>
			<div style = "font-size:23px; color:red; margin-top:20px"><?php echo $error; ?></div>
   </body>
</html>
