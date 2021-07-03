
<?php
	include("local_config.php");
	include("insert.php");
	#ob_start();
	session_start();
	$error = "";
?>

<?php
		# Create connection to Heroku Postgres
		$pg_heroku = pg_connect($conn_string);
		// data sent from form 
		$product_id = $_POST['product_id'];
		$product_name = $_POST['product_name'];
		$price = $_POST['price'];
		$amount = $_POST['amount'];
		$shop = $_SESSION["shop"];
		# insert data from DB
		$run = pg_query($pg_heroku, "INSERT INTO product(shop_name, product_id, product_name, price, amount)"
        . " VALUES('$shop','$_POST[product_id]','$_POST[product_name]', '$_POST[price]', '$_POST[amount]')");
		if($run == true)
		{
			echo "Input successfully.";
		} else {
        echo "Error inputting data. ";
		}
?>
	<br></br>
	<p> Data for <?php echo $shop; ?> </p>
		<?php
		include("db_display.php");
			//$pg_heroku = pg_connect($conn_string);
			$table ="product";
			$result = pg_query($pg_heroku, "select * from ".$table." where shop_name ='$shop';");
			display_table($result);
		pg_close();
	
?>