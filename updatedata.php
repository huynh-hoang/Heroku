
<?php
	include("local_config.php");
	#ob_start();
	session_start();
	$error = "";
?>

<?php
		# Create connection to Heroku Postgres
		
		// data sent from form 
		if (isset($_POST['submit'])) {
		$product_id = $_POST['product_id'];
		$product_name = $_POST['product_name'];
		$price = $_POST['price'];
		$amount = $_POST['amount'];	
		$pg_heroku = pg_connect($conn_string);
		# insert data from DB
		$update = pg_query($pg_heroku, "Update product set product_name = '$product_name', price = '$price', amount = '$amount' where product_id = '$product_id';");
		if($update == true)
		{
			echo "Update successfully.";
		} else {
        echo "Error updateing data. ";
		}
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update database</title>	
	</head>
	<body>
	<a href="db_shop.php" title="Back">Back to Shop</a>
		<form method="POST" action= "updatedata.php">
			<table>
				<tr>
					<td>Product  ID:</td>
					<td><input type ="text" name="product_id">
				</tr>
				<tr>
					<td>Product  Name:</td>
					<td><input type ="text" name="product_name">
				</tr>
				<tr>
					<td>Price:</td>
					<td><input type ="text" name="price">
				</tr>
				<tr>
					<td>Amount:</td>
					<td><input type ="text" name="amount">
				</tr>
				<tr>
					<td><input type ="submit" name="submit" value ="UPDATE"></td>
				</tr>
			</table>
		</form>
		<br></br>
		
	</body>
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
			align:center;
			padding: 20px;
			font-size: 1.5rem;
			font-family: 'Lato';
			font-weight: 100;
			background: yellowgreen;
			color: white;
			border: none;
		}
		table {
			margin: 0 auto;            
		}​
		p{
			color: #555;
			text-align: center;
			margin: 0 auto 20px;
			position: relative;
			line-height: 100px;
			color: #555;
		}
      </style>
</html>	