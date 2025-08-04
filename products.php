<?php
include 'db_connect.php';

$category = isset($_GET['category']) ? $_GET['category'] : 'Best Sellers';
$sql = "SELECT * FROM products WHERE category='$category'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $category; ?> - iTech Cart</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5"><?php echo $category; ?></h1>
    <div class="row">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-lg-4 col-sm-4">
            <div class="box_main">
                <h4 class="shirt_text"><?php echo $row['name']; ?></h4>
                <p class="price_text">Price <span style="color: #262626;">₱<?php echo number_format($row['price']); ?></span></p>
                <div class="electronic_img"><img src="<?php echo $row['image']; ?>" style="width: 300px; height: 300px; object-fit: contain;"></div>
                <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>
