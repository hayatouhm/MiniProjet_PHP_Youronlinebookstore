<?php 
    session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Votre panier</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
 <style>
            body { overflow-x: hidden; 
                
  	background-image:url("bgbook.jpg");
  	  
            } 
</style>
</head>
    <body>
        

<?php 
    
         if(isset($_SESSION['surname']))  
         {
              if(isset($_SESSION['cart']))
            { 
                    $action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null ));
           if($action !== null)
            {
         $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
         $l = preg_replace('#\v#', '',$l);
         
              $tmp=array();
              $tmp['idp'] = array();
              $tmp['quantityp'] = array();
              $tmp['pricep'] = array();
              $tmp['articlep'] = array();
        for($i = 0; $i < count($_SESSION['cart']['idp']); $i++)
         {
               if ($_SESSION['cart']['idp'][$i] !== $l)
           {
            array_push( $tmp['idp'],$_SESSION['cart']['idp'][$i]);
            array_push( $tmp['quantityp'],$_SESSION['cart']['quantityp'][$i]);
            array_push( $tmp['pricep'],$_SESSION['cart']['pricep'][$i]);
            array_push( $tmp['articlep'],$_SESSION['cart']['articlep'][$i]);
           }
         }
          $_SESSION['cart']=$tmp;
          unset($tmp);
     }
                 if(count($_SESSION['cart']['idp'])>0)
      {
             echo"<h1 align=\"center\" style=\"font-style:oblique;\"> The summary of your order</h1>";
             
     echo "<table border=\"2\" width=\"50%\" style=\"position:relative;left:25%\" >";
   echo "<tr><td colspan=\"15\" style=\"background-color:#006598\" align=\"center\"><b>The summary of your order </b></td>";
   echo "<tr><th style=\"background-color:#428bca\" >&nbsp;Code&nbsp;</th><th style=\"background-color:#428bca\">&nbsp;Article&nbsp;</ th><th style=\"background-color:#428bca\">&nbsp; Number&nbsp;</th><th style=\"background-color:#428bca\">&nbsp; Price&nbsp;</th><th style=\"background-color:#428bca\">&nbsp; &nbsp; </th></tr>";
         
             
   
         $total=0;
      for($i=0;$i<count($_SESSION['cart']['idp']);$i++) 
       {      
         $total += $_SESSION['cart']['quantityp'][$i] * $_SESSION['cart']['pricep'][$i];
             
    echo"<tr><td>&nbsp;&nbsp;".htmlspecialchars($_SESSION['cart']['idp'][$i])."</td><td>&nbsp;&nbsp;".htmlspecialchars($_SESSION['cart']['articlep'][$i])."</td><td>&nbsp;&nbsp;".htmlspecialchars($_SESSION['cart']['quantityp'][$i])."</td><td>&nbsp;&nbsp;".htmlspecialchars($_SESSION['cart']['pricep'][$i])."</td><td><form action=\"\" method=\"post\" >&nbsp;&nbsp;<a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['cart']['idp'][$i]))."\"><i class='fa fa-trash' \"></i></a></form></td></tr>";
       $_SESSION['totalprice']=$total;
  
       }
        echo "<tr><td colspan=\"3\" align=\"center\"><b> TOTAL PRICE <b></td><td colspan=\"3\">&nbsp;&nbsp;".sprintf("%01.2f", $total)." </td></tr>"; 
       echo "</table>";
       echo"<form method=\"post\" action=\"payement.php\"><input type=\"submit\" name=\"buynow\" value=\"Buy Now\" style=\"width: 10%; background-color: #428bca; color: white;padding: 14px 20px; margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;position:relative;top:50px;left:45%;\"></form>";
      
      
       } else{
             echo"<br><br><br><h1 style=\"color:#383838;font-style:oblique;position:relative;left:20%;top:90%;\">Your shopping cart is empty.</h1><h1 style=\"color:#383838;font-style:oblique;position:relative;left:20%;top:90%;\"><a href=\"books.php\">Available books here. </a></h1><i class=\"fas fa-shopping-cart\"  style=\"font-size:200px;color:#383838;position:relative;left:55%;\">";
       }}
         if(!isset($_SESSION['cart']))
            {
                 echo"<br><br><br><h1 style=\"color:#383838;font-style:oblique;position:relative;left:20%;top:90%;\">Your shopping cart is empty.</h1><h1 style=\"color:#383838;font-style:oblique;position:relative;left:20%;top:90%;\"><a href=\"books.php\">Available books here. </a></h1><i class=\"fas fa-shopping-cart\"  style=\"font-size:200px;color:#383838;position:relative;left:55%;\">";
            }
         
        }else{
             echo"<h1 style=\"color:#383838;font-style:oblique;position:relative;left:35%;top:20%;\">Log in here and start your order</h1> <br><br><h1 style=\"color:#383838;font-style:oblique;position:relative;left:47%;top:20%;\"><a href=\"login.php\">Login</a></h1>";
         }
     
   
?>
    </body>
</html>
