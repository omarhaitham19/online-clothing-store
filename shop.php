<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<div id="search-bar">
    <form action="" method="POST">
    <input type="text" id="search-input" name="search" placeholder="Search for products...">
    <button type="submit" name="searchProduct" id="search-button">Search</button>
    </form>
</div>


<section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <!-- <p>Summer Collection New Modren Desgin</p> -->
        <div class="pro-container">

        <?php
        ob_start();

        if (isset($_POST['searchProduct'])) {
            $search = htmlspecialchars(trim(mysqli_real_escape_string($con, $_POST['search'])));
            $query = "SELECT * FROM `product` WHERE `is_deleted` = 'no' AND (`title` LIKE '%$search%' OR `description` LIKE '%$search%')";
        } else {
            $query = "SELECT * FROM `product` WHERE `is_deleted` = 'no'";
        }
        $result = mysqli_query($con , $query);
        if (mysqli_num_rows($result) > 0){
           while ($row = mysqli_fetch_assoc($result)) {
               if ($row['quantity_available'] > 0) {
                                   
?>
        <div class="pro">
            <img src="img/products/<?php echo $row['image'] ?>" alt="product">
            <div class="des">
                <span><?php echo $row['title']; ?> </span>
                <h5><?php echo $row['description']; ?></h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4><?php echo $row['price'] . " L.E"; ?></h4>

                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">                     
                        <button type="submit" name="submit" class="cart"><i class="fas fa-shopping-cart"></i></button>
                    </form>
                <?php } else {
                                ?>
                    <a href="login.php" class="cart"><i class="fas fa-shopping-cart"></i></a>
                <?php } ?>
            </div>
        </div>
<?php
    }
}
        } else{
            echo '<script>alert("No products found for the given search.");</script>';
            echo "<script>window.location.href='shop.php';</script>";
            exit();
        }

    if (isset($_POST['submit'])) {
        session_regenerate_id();
        $productID = $_POST['id'];
        $ID = "SELECT * FROM `product` WHERE `id` = $productID ";
        $rslt = mysqli_query($con , $ID);
        if ($row2 = mysqli_fetch_assoc($rslt)) {
            $name = $row2['title'];
            $price = $row2['price'];
            $description = $row2['description'];
            $image = $row2['image'];

            $insert = "INSERT INTO `shopping_cart`( `name`, `description`, `quantity`, `price`, `image`, `user_id`, `product_id`)
            VALUES ('$name', '$description', 1, '$price', '$image', '{$_SESSION["user_id"]}', '$productID')";

            $succes = mysqli_query($con , $insert);

            if ($succes) {
                echo "<script>alert('Product added to cart!')</script>";
            }else {
                echo "<script>alert('An error occurred while adding the product to the cart.')</script>";

            }
        }else {
            echo "<script>alert('Product not found!')</script>";
        }
    }
    
ob_end_flush();
?>
</section>
<?php

 include 'footer.php' ?>