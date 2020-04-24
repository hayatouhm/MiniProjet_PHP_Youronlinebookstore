<?php
session_start();
   if(isset($_POST['Confirm']))
      {   $id=$_SESSION['id'];
           $price= $_SESSION['totalprice'];
          
          $number=$_POST['number'];
          $code=$_POST['code'];
          
       try{
          $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
       $cnx=new PDO('mysql:host=localhost;dbname=id12823789_youronlinebookstore','id12823789_hayat','veLXQifM*st@w9E');
           $sql = "INSERT INTO Payement (id_payement,id_client,number_card,security_code,final_price) VALUES (NULL,$id,$number,$code,$price)";
           $cnx->exec($sql);
      } catch(PDOException $e) {    echo  $e->getMessage();}
      $cnx= null;
          
      }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Congratulations</title>
      <style>
   body{
  	background-image:url("bgbook.jpg");
  	   }
  	   </style>
  	   </head>
  	   <body>
  	        <h2 align="center" style="position:relative;top:50%;font-style:oblique;">Congratulations your order is on it's way to you !</h2>
  	        <h3 align="center" style="position:relative;top:55%;font-style:oblique;color:#FA8072;">Thank you for trusting us !</h3>
  	        
  	   </body>
</html>