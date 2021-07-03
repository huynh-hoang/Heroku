<!DOCTYPE html>
<html>
	<head>
		<title>Insert data to database</title>
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
	</head>
	<body>
	<a href="db_shop.php" title="Back">Back to Shop</a>
		<form action ="add.php" method="POST">
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
					<td><input type ="submit" name="submit" value ="ADD"></td>
				</tr>
			</table>
		</form>
		<br></br>
		
	</body>
</html>