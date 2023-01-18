<head>
    <?php include('head.php'); ?>
    <?php include('condb.php'); ?>
  </head>
<?php 

$p_id = $_GET['p_id']; 
$act = $_GET['act'];



if($act=='add' && !empty($p_id))
{
    if(isset($_SESSION['cart'][$p_id]))
    {
        $_SESSION['cart'][$p_id]++;
    }
    else
    {
        $_SESSION['cart'][$p_id]=1;
    }
}

if($act=='remove' && !empty($p_id))  
{
    unset($_SESSION['cart'][$p_id]);
}

if($act=='update')
{
    $amount_array = $_POST['amount'];
    foreach($amount_array as $p_id=>$amount)
    {
        $_SESSION['cart'][$p_id]=$amount;
    }
}

?>
  <body>
      <!-- Navigation -->
      <?php include('menu.php');?>

            <!-- Cart Items -->
  <div class="container-md cart">
    <table>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        
      </tr>
<?php
$total=0;
if(!empty($_SESSION['cart'])){
	foreach($_SESSION['cart'] as $p_id=>$qty){
    $sql = "SELECT * FROM tbl_product WHERE p_id=$p_id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['p_price'] * $qty;
		$total += $sum; ?>

    <tr>
        <td>
          <div class="cart-info">
            <img src="upload/<?php echo $row['image']?>" alt="">
            <div>
              <p><?php echo $row['p_name']?></p>
              <span><?php echo"$ ". $row["p_price"];?></span>
              
              <br />
              <a href='cart.php?p_id=<?php echo $row['p_id']; ?>&act=remove'>remove</a>
            </div>
          </div>
        </td>
        <form action="">
        
        <td><input type="number" name='amount' value="<?php echo $qty;?>" min="1" size='2'disabled=""></td>
        <td><?php echo"$ ". $sum;?></td>
    <?php }?>
    </table>

    <div class="total-price">
      <table>
        <tr>
          <td>Total</td>
          <td><?php echo "$ ". $total;?></td>
        </tr>
      </table>
      <a href="p.php" class="checkout btn">Proceed To Checkout</a>
      <a href="product.php" class="checkout btn">Back to shop</a>
    </div>


<?php }?>
      
  </div>