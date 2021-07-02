<?php
$page = $_SERVER['PHP_SELF'];
$sec = "5";
?>
<html>
	<head>
	<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
	</head>
<title> PAGE FOR DIRECTOR BOARD </title>
<body>    
	<div class="header">     
      <div class="container">
          <div class="navbar">
           <div class="logo">              
           </div>
           <nav>
               <ul id="MenuItems">
                   <li><a href="logout.php">Log Out</a></li>
               </ul>
           </nav>
              </div>
       <div class="row">
           <div class="col-2">
               <h1>ATN STORES</h1>               
           </div>
       </div>
      </div>
    </div> 

	<form action="" method="post">
		<p> Select shop's database: <p/> 
         <select name = "db_selection">
            <option value = "SHOP_A" >Shop A</option>
            <option value = "SHOP_B">Shop B</option>
            <option value = "ALL" selected>All shops</option>
         </select>
		<input type="submit" name="submitButton" value="Submit"/>
    </form>    

	<?php
		session_start();
		function exceptions_error_handler($severity, $message, $filename, $lineno) 
		{
			throw new ErrorException($message, 0, $severity, $filename, $lineno);
		}

		set_error_handler('exceptions_error_handler');
		$input = "ALL";
		$table_name = "product";
		include("local_config.php");
		include("db_display.php");
		//check if form was submitted
		if(isset($_POST['submitButton'])) 
		{ 
			//get input text
			$input = $_POST['db_selection'];
		}
		# Try to display SQL table
		try 
		{
			echo "<p> DATABASE FROM ".$input."</p>"; 
			$pg_heroku = pg_connect($conn_string);
											
			if ($input == "ALL")
			{
				# Get data by query
				$result = pg_query($pg_heroku, "select * from ".$table_name);
			}
		
	else 
			{
				$result = pg_query($pg_heroku, "select * from ".$table_name." where shop_name='$input'");
			}
			display_table($result);
			pg_close();
		}
		catch (Exception $e) 
		{
			#echo 'Caught exception: ',  $e->getMessage(), "\n";
			echo "Caught exception: <br/>", $e->getMessage(), "\n";
		}
	?>	
       <br><br><br><br><div class="footer">
           <div class="container">
               <div class="row">
                   <div class="footer-col-4">
                       <h3>Contatct Us</h3>
                       <ul>
                           <li>Feedback</li>
                           <li>Introduce</li>
                           <li>Advertisement</li>
                       </ul>
                   </div>
                   <div class="footer-col-2">
                       
                   </div>
                   
                   <div class="footer-col-4">
                       <h3>Follow Us</h3>
                       <ul>
                           <li>Facebook</li>
                           <li>Instagram</li>
                           <li>Twitter</li>
                           <li>Youtube</li>
                       </ul>
                   </div>
               </div>
               <hr>               
           </div>
       </div></br></br></br></br> 
</body>
</html>
