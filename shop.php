<?php
include('security.php');
include('include/header.php');
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>sungla</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout position_head">
      <!-- loader  -->

      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- Our shop section -->
      <div id="about" class="shop">
         <div class="container-fluid">
            <div class="row">
               
               <?php

               $username = $_SESSION['username'];

               $select1 = "select * from users where username = '$username' ";
               $query1 = mysqli_query($connection, $select1);

               $myrow = mysqli_fetch_array($query1);


               $id = $_GET['id'];

               $select = "select * from products where id = $id ";
               $query = mysqli_query($connection, $select);

               if ($query) {
                  while ($row = mysqli_fetch_array($query)) {
                     # code...
                     $id = $row['id'];
                     $product_name = $row['product_name'];
                     $price = $row['price'];
                     $description = $row['description'];
                     $image = $row['image'];
                     $quantity = $row['quantity'];

                     echo "

               <form method='POST' action='https://checkout.flutterwave.com/v3/hosted/pay'>
               <input type='hidden' name='public_key' value='FLWPUBK_TEST-457cf389e9cc2e7812a06355cb57a679-X' />
               <div class='move'>
               <div class='col-md-5'>
                  <div  class='shop_img'>
                     <figure><img src='./$image' alt='#'/></figure>
                  </div>
               </div>
               <div class='col-md-7 padding_right0'>
                  <div class='max_width'>
                     <div class='titlepage'>
                        <h2>$product_name</h2>
                        <p>$ $price<br> $description</p>

                     <input type='hidden' name='customer[email]' value='$myrow[email]' />
                     <input type='hidden' name='customer[name] value='$myrow[username]' />
                     <input type='hidden' name='tx_ref' value='bitethtx-019203' />
                     <input type='hidden' name='amount' value='$price' />
                     <input type='hidden' name='currency' value='NGN' />
                     <input type='hidden' name='meta[token]' value='54' />
                     <button type='submit' class='la' id='start-payment-button'>Pay Now</button>
                        


                        <a href='glasses.php' class='buynow' style='text-align: center;''>Back to Shop</a>
                     </div>
                  </div>
               </div>
               </div>

               </form>
               ";



            
                  }
               }
               else {
                  echo "ERROR'.mysqli_error($connection).'";
               }
               ?>


            </div>
         </div>
      </div>
      <!-- end Our shop section -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <ul class="location_icon">
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br> Location</li>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a><br> +01 1234567890</li>
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a><br> demo@gmail.com</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Badru oluwatobi</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
        <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
  <script src="js/script.js"></script>
   </body>
</html>