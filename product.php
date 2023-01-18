<head>
    <?php include('head.php'); ?>
    <?php include('condb.php'); ?>
  </head>
<?php 
$queryprd = "SELECT * FROM tbl_product ORDER BY p_id DESC" 
or die("Error:". mysqli_error());
$rsprd = mysqli_query($conn,$queryprd)
?>
  <body>
    <!-- Header -->
    <header id="home" class="header">
      <!-- Navigation -->
      <?php include('menu.php');?>

    <!-- All Products -->
    <section class="section all-products" id="products">
        <div class="top container">
            <h1>All Products</h1>
        </div>
        <div class="product-center container">

        <?php foreach ($rsprd as $rsprd){ ?>
            <div class="product">
            <a href="product-details.php?p_id=<?php echo $rsprd['p_id']; ?>">
                <div class="product-header">
                    <img src="upload/<?php echo $rsprd['image']?>" alt="">
                </div>
                </a>
                <div class="product-footer">
                    
                        <h3><?php echo $rsprd["p_name"];?></h3>
                    
                    <h4 class="price"><?php echo"$ ". $rsprd["p_price"];?></h4>
                </div>
            </div>
        <?php }?>
        
        </div>
    </section>
        </header>
    <!-- Footer -->
    <footer id="footer" class="section footer">
        <div class="container">
            
        </div>
    </footer>
</body>