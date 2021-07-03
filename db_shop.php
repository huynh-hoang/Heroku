<html>
	<head>
		<title>Data Shop</title>
		<link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
	</head>  
   <body>
		<div class="header">     
      <div class="container">
          <div class="navbar">
           <div class="logo">
               <a href="index.php"><image src="3.jpg" width="150px"></image></a>
           </div>
           <nav>
               <ul id="MenuItems">
			   <li><a href="updatedata.php">Update Data</a></li>
                   <li><a href="insert.php">Insert Data</a></li>
                   <li><a href="delete.php">Delete Data</a></li>
                   <li><a href="logout.php">Log Out</a></li>
               </ul>
           </nav>
              </div>
       <div class="row">
           <div class="col-2">
               <h1>ATN MUGEN Toy Shop !</h1> 
               <p>It's the best toys store ever.</p>
               <a href="" class="btn"> &#9758; Explore Now </a>
           </div>
           
       </div>
      </div>
    </div> 
	
		
		<?php 
			session_start();
			$shop = $_SESSION["shop"];
		?>
		<p> Data for <?php echo $shop; ?> </p>
			<?php
			include("local_config.php");
			include("db_display.php");
			$pg_heroku = pg_connect($conn_string);
			$table ="product";
			$result = pg_query($pg_heroku, "select * from ".$table." where shop_name ='$shop';");
			display_table($result);
			pg_close();
		?>
		<?php
		
	if($_SESSION["name"]) {
	?>
	Click here to <a href="logout.php" title="Logout">Logout.
	<?php
	}else echo "<h1>Please login first .</h1>";
	?>
	<!---------------footer--------->
       <div class="footer">
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
                       <h3>Our Purpose is to Sustainably Make the Pleasure and Benefits of Foods Accesible to the Many.</h3>
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
               <p class="copyright">Made by Boss Huy Hoàng </p>
           </div>
       </div> 
   </body>
</html>
