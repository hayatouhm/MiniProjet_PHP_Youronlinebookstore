<?php 
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
  	<meta charset=UTF-8>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	 <style>
  	body{
  	background-image:url("bgf1.jpg");
  	   }
  	.menu
  	{text-align: center;}
  	.menu a{
  		padding: 10%;
  		font-size: 150%;
  	    text-decoration: none;
  	    color:black;
  	    font-style: oblique;
        position: relative;top: 30px;left:-5px;
  	}
  	
  	.log a{
  	    padding: 3px;
  	    font-size: 150%;
  	    text-decoration: none;
  	    color:black;
  	    font-style: oblique;
  	    position: relative;left: 1100px;
          position: relative;top: 9%;}
    .panier a{ position: relative;left: 95%;bottom: 30px;}
  	a:hover { color:white; }
  	h2{color: black;
  		font-style: oblique;
  		font-size: 250%;
  	   }

  </style>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>
 
  <body>
  	
  	<h2 align="center"> Your Online Book Store</h2>
  <a href="Rapport_site_web_OUHMOUD_Hayat.pdf" download="Rapport_site_web_OUHMOUD_Hayat" style=" position: relative;top: -50px;left:20px;"> <button ><i class="fa fa-download" >  Rapport du site</i></button> </a>
       <div class="menu">
       <a href="home.php" target="frame2">Home</a>
       <a href="books.php" target="frame2">Books</a>
       <a href="suggestions.php" target="frame2">Suggestions</a>
       </div>
       <div class="log">
             
       <a href="register.php" target="frame2">Register</a>
      <a href="login.php" target="frame2">Log-In</a>
           
      
       
      
       </div>
       <div class="panier">
       <a href="panier.php" target="frame2"><i class='fas fa-cart-plus' style='font-size:36px;color:black;'></i></a>
       </div>
        <a href="logout.php"  target="frame2" style="position: relative;left: 10px;bottom: 50px; font-size: 150%;text-decoration: none;color:black;font-style: oblique;">Logout</a>
     
  </body>
</html>
