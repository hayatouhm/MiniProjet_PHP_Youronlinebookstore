<?php
session_start();
   if(isset($_POST['buynow']))
    {
       try{
          $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
       $cnx=new PDO('mysql:host=localhost;dbname=id12823789_youronlinebookstore','id12823789_hayat','veLXQifM*st@w9E');
           $sql = "INSERT INTO Command (id_client, id_product, total_price,quantity) VALUES (?,?,?,?)";
         
       for($i=0;$i<count($_SESSION['cart']['idp']);$i++)
             {
                $code= $_SESSION['cart']['idp'][$i]; 
                $quantity= $_SESSION['cart']['quantityp'][$i]; 
                $price=$_SESSION['cart']['pricep'][$i]; 
                $idclient=$_SESSION['id']; 
                 $cnx->prepare($sql)->execute([$idclient, $code,  $price,$quantity]);  
            }
       } catch(PDOException $e) {    echo  $e->getMessage();}
      $cnx= null;
    }
    $t=$_SESSION['totalprice'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Confirm your order</title>
        <style>
            	input {
 /* width: 30%;*/
  padding: 12px 20px;
  margin:8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
 box-sizing: border-box;
  position: relative;left:100px;
}
 label {
  	   font-style: oblique;
  	   font-size: 200%;
  	   position: relative;left:40%;}
  	   input[type=submit] {
  width: 10%;
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  position: relative;top:60%;
  
}
 body{
  	background-image:url("bgbook.jpg");
  	   }
  	   
        </style>
         <script>
      function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('visa')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
 </script>
    </head>
    <body scroll="no" style="overflow: hidden">
        <form method="post" action="congrats.php" >
            <label ><h3 style="color:gray;">Your payment </h3></label>
             <label style="position: relative;left:41%;">Total Price : <?php  echo" $t";?></label><br><br>
             <table align="center">
               <tr><td><label style="font-size:100%;position: relative;left: 8px;">Visa :</label><i class="fa fa-cc-visa" style="font-size:20px;color:red;position: relative;left: 13px;"></i><input type="checkbox"  name="visa" value="visa" style="position: relative;left: 26px;" onclick="onlyOne(this)"></td><td><label style="font-size:100%;position: relative;left: 5px;">Master card :</label><i class="fa fa-cc-mastercard" style="font-size:20px;color:red;position: relative;left: 8px;"></i><input type="checkbox"  name="visa" value="master" style="position: relative;left: 15px;" onclick="onlyOne(this)"></td><td></td></tr>
                <tr><td><label  style="position: relative;left: 5px;">Card number :</label></td><td><input type="text" name="number" style="position: relative;left: 30px;" required></td></tr>
                <tr><td><label  style="position: relative;left: 5px;">Security code :</label></td><td><input type="password" name="code" style="position: relative;left: 30px;" required></td></tr>
             </table>
             <input type="submit" name="Confirm" value="Confirm"  style="position: relative;left:45%;">
        </form>
    </body>
    
</html>
