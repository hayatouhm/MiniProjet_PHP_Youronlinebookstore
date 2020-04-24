<?php 
session_start();
 if (isset($_POST['buy'])){

     if(isset($_SESSION['surname']))
          {
             $id=$_POST['val'];
              try{
           $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
          $cnx = new PDO('mysql:host=localhost;dbname=id12823789_youronlinebookstore', 'id12823789_hayat', 'veLXQifM*st@w9E', $pdo_options);
         $prod=$cnx->query("SELECT * FROM Product where id_product='$id'");
              
             while ($pr = $prod->fetch()){
              $code= $pr['id_product']; 
              $article= $pr['name'];
              $price= $pr['price'];
              $number=1;
             }
          $prod->closeCursor();
              }catch (Exception $e){
                  die('Erreur : ' . $e->getMessage());}
                  
                  if (!isset($_SESSION['cart'])){
                     
                                    $_SESSION['cart']=array();
                                    $_SESSION['cart']['idp'] = array();
                                    $_SESSION['cart']['quantityp'] = array();
                                    $_SESSION['cart']['pricep'] = array();
                                    $_SESSION['cart']['articlep'] = array();
                                 }
                                 $number=1;
                $p= array_search($code,  $_SESSION['cart']['idp']);
                if($p !== false)
                 {
                       $_SESSION['cart']['quantityp'][$p] += $number;
                 }
                 else
                 { 
                        array_push( $_SESSION['cart']['idp'],$code);
                        array_push($_SESSION['cart']['articlep'],$article);
                        array_push( $_SESSION['cart']['quantityp'],$number);
                        array_push( $_SESSION['cart']['pricep'],$price);
                        
                 }
     }
     else
         {
            header("location:login.php");
          }
}
          
             $cnx= null;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<title></title>
	<style>
	 body{
  	background-image:url("bgbook.jpg");
  	   }
	input[type=submit] {
  
  background-color: blue;
  color: white;
  border: none;
  padding: 10px 25px;
  border-radius: 4px;}
      p{font-style: oblique;
      font-size: 20px;}
  
	</style>
</head>
<body>
 <h1>French :</h1>
 
 <table border="0px" cellspacing="30">
		<tr>
			<td><img src="frb1.jpeg" alt="hihi" width="50%" onblur="f()" ><p><b>Les Dernières Heures</b></p><form action="" method="post"><input type="hidden" value="9" name="val"/><p><b>20DHS</b></p><input type="submit" name="buy" value="Buy Now" ></form></td>
			<td><img src="frb2.jpeg" alt="hihi" width="70%"><p><b>Jack et le Bureau Secret</b></p><form action="" method="post"><input type="hidden" value="10" name="val"/><p><b>20DHS</b></p><input type="submit" value="Buy Now"  name="buy"></form></td>
			<td><img src="frb3.jpeg" alt="hihi" width="80%"><p><b>Mon Cabinet de Culture</b></p><form action="" method="post"><input type="hidden" value="11" name="val"/><p><b>25DHS</b></p><input type="submit" value="Buy Now"  name="buy"></form></td>
			
			
		</tr>
 </table>
 
 
</body>
</html>