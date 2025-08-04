<?php
include 'db_connect.php';

// Fetch only Best Sellers products
$sql = "SELECT * FROM products WHERE category='Best Sellers'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Best Sellers</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>
<body>
   <div class="banner_bg_main">
      <div class="container">
         <div class="header_section_top">
            <div class="row">
               <div class="col-sm-12">
                  <div class="custom_menu">
                     <ul>
                        <li><a href="products.php?category=Best Sellers">Best Sellers</a></li>
                        <li><a href="products.php?category=New Releases">New Releases</a></li>
                        <li><a href="#">Customer Service</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="header_section">
         <div class="container">
            <div class="containt_main">
               <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="index.php">Home</a>
                  <a href="new_releases.php">New Releases</a>
                  <a href="best_sellers.php">Best Sellers</a>
                  <a href="old_models.php">Old Models</a>
               </div>
               <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
            </div>
         </div>
      </div>

      <div class="fashion_section">
         <div class="container">
            <h1 class="fashion_taital">Best Sellers</h1>
            <div class="fashion_section_2">
               <div class="row">
                  <?php while($row = $result->fetch_assoc()): ?>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text"><?php echo $row['name']; ?></h4>
                           <p class="price_text">Start Price  
                              <span style="color: #262626;">₱<?php echo number_format($row['price']); ?></span>
                           </p>
                           <div class="electronic_img">
                              <img src="<?php echo $row['image']; ?>" style="width: 300px; height: 300px; object-fit: contain;">
                           </div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  <?php endwhile; ?>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
      }
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }
   </script>
</body>
</html>
