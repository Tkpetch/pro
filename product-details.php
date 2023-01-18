<head>
    <?php include('head.php'); ?>
    <?php include('condb.php'); ?>
  </head>
<?php 
$p_id = $_GET['p_id'];
$queryprd = "SELECT * FROM tbl_product WHERE p_id = $p_id "; 
$rsprd = mysqli_query($conn,$queryprd);
?>
  <body>
    <!-- Header -->
    <header id="home" class="header">
      <!-- Navigation -->
      <?php include('menu.php');?>
  <!-- Product Details -->
  <section class="section product-detail">
  <?php foreach ($rsprd as $rsprd){ ?>
    <div class="details container-md">
      <div class="left">
        <div class="main">
        <img src="upload/<?php echo $rsprd['image']?>" alt="">
        </div>
        <div class="thumbnails">
        </div>
      </div>
      <div class="right">
        <h1><?php echo $rsprd["p_name"];?></h1>
        <div class="price"><?php echo"$ ". $rsprd["p_price"];?></div>
        <form class="form">
          <div>
          </div>

          <a href="cart.php?p_id=<?php echo $rsprd['p_id']; ?>&act=add"  class="addCart">Add To Cart</a>
        </form>
        <h3>Product Detail</h3>
        <p><?php echo $rsprd["p_detail"];?></p>
      </div>
    </div>
    <?php }?>
  </section>

  <!-- Related -->
  <section class="section featured">
    

    
  </section>

  <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container">
        
    </div>
    
</footer>
</body>