<?php
include 'db_connect.php';

// Fetch 3 products per category
$categories = ['New Releases', 'Best Sellers', 'Old Models'];
$products = [];

foreach ($categories as $category) {
    $sql = "SELECT * FROM products WHERE category='$category' LIMIT 3";
    $result = $conn->query($sql);
    $products[$category] = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>iTech Cart - Home</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
   <div class="banner_bg_main">
      <div class="header_section">
         <div class="container">
            <div class="containt_main">
               <div id="mySidenav" class="sidenav">
                  <a href="index.php">Home</a>
                  <a href="new_releases.php">New Releases</a>
                  <a href="best_sellers.php">Best Sellers</a>
                  <a href="old_models.php">Old Models</a>
               </div>
               <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
            </div>
         </div>
      </div>

      <!-- Loop through each category -->
      <?php foreach ($products as $category => $items): ?>
      <div class="fashion_section">
         <div class="container">
            <h1 class="fashion_taital"><?php echo $category; ?></h1>
            <div class="fashion_section_2">
               <div class="row">
                  <?php foreach ($items as $row): ?>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text"><?php echo $row['name']; ?></h4>
                           <p class="price_text">Price 
                              <span style="color: #262626;">₱<?php echo number_format($row['price']); ?></span>
                           </p>
                           <div class="tshirt_img">
                              <img src="<?php echo $row['image']; ?>" style="width:300px; height:300px; object-fit:contain;">
                           </div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt">
                                 <a href="<?php echo strtolower(str_replace(' ', '_', $category)); ?>.php">See More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>
      <?php endforeach; ?>
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
