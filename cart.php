<?php
  
include 'header.php'; 
include 'navbar.php';
ob_start();
?>

<!-- <section id="page-header" class="about-header"> 
    <h2>Cart</h2>
    <p>Let's see what you have.</p>
</section> -->

<?php
$query = "SELECT * from shopping_cart WHERE user_id = {$_SESSION['user_id']}";
$result = mysqli_query($con , $query);
if (mysqli_num_rows($result) > 0) {
    
?>
<section id="page-header" class="about-header"> 
    <h2>Cart</h2>
    <p>Let's see what you have.</p>
</section>

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Desc</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Subtotal</td>
                <td>Remove</td>
                <!-- <td>Edit</td> -->
            </tr>
        </thead>

        <tbody>
        <?php
        $total = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            
?>
        <form action="" method="post">
            <tr>
                <td><img src="img/products/<?php echo $row['image'] ?>" alt="product1"></td>
                <td><?php echo $row['name']; ?> </td>
                <td><?php echo $row['description']; ?></td>
                <td><input type="text" name="quantity" placeholder="1" disabled></td>
                <td><?php echo $row['price']; ?></td>
                <td id="total"><?php echo $row['price']; ?></td>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <td><button type="submit" name="remove" class="btn btn-danger">Remove</button></td>
                <?php $total += ($row['price'] * $row['quantity']); ?>
            </tr>
        </form> 
<?php
}

?>
<tr>
    <td colspan="5"> <span style="font-size: larger;"><b>Total:</b></span></td>
    <td><span style="font-size: larger;"><b><?php echo $total; ?></b></span></td>
</tr>

          
        </tbody>
        <form action="confirmOrder.php" method="post">
        <input type="hidden" name="total" value="<?php echo $total ?>">

    <tr>
        <td colspan="5"></td> 
        <td><button type="submit" name="confirm" class="btn btn-success">Confirm</button></td>
    </tr>
</form> 

   <?php

}  else{
    ?>
        <img style="display: block; margin: 0 auto;" height="300" width="300" src="img/empty_cart.png" alt="Empty Cart" srcset=""> 
        <p style="text-align: center;">Hey, your Cart is empty!</p> <br> <br> <br> <br> 
    <?php
}
?>
    </table>
</section> <br> <br>

<?php

if (isset($_POST['remove'])) {
    $productID = $_POST['id'];
    $remove = "DELETE FROM `shopping_cart` WHERE `id` = $productID";
    $done = mysqli_query($con, $remove);
    if ($done) {
        header("location:cart.php");
    }
}
?>

    <?php include "footer.php";

     ?>

    
    
   