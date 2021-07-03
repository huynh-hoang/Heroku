
<?php
	include("local_config.php");
	include("delete.php");
	#ob_start();
	session_start();
	$error = "";
?>

<?php
		# Create connection to Heroku Postgres
		$pg_heroku = pg_connect($conn_string);
		// data sent from form 
		$product_id = $_POST['product_id'];
		$shop = $_SESSION["shop"];
		# insert data from DB
		$delete = pg_query($pg_heroku, "DELETE FROM product WHERE product_id = '$product_id';");
		if($delete == true)
		{
			echo "Message: Delete successfully.";
		} else {
        echo "Error delete data. ";
		}
?>	<br></br>
	<p> Data for <?php echo $shop; ?> </p>
		<?php
		include("db_display.php");
			//$pg_heroku = pg_connect($conn_string);
			$table ="product";
			$result = pg_query($pg_heroku, "select * from ".$table." where shop_name ='$shop';");
			display_table($result);
		pg_close();
	
?>