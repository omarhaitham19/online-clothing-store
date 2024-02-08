<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<section id="hero">

        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more woth coupons & up to 70% off!</p>
        <button><a style="text-decoration-line: none;" href="shop.php">Shop Now!</a></button>

    </section>

    <!-- End Hero -->

    <!-- start Feature-->
    <section id="feature" class="section-p1">
        <div class="fe-1">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f4.png" alt="">
            <h6>Promitions</h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f6.png" alt="">
            <h6>F7/24 Support</h6>
        </div>
    </section>
    <!-- End Feature-->

    <!-- Start New Arrival or productCard Features -->
    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>
        <div class="pro-container">

        <?php

        $query = "SELECT * FROM `product` WHERE quantity_available > 0 AND `is_deleted` = 'no' LIMIT 4";
        $result = mysqli_query($con , $query);
        while ($row = mysqli_fetch_assoc($result)) {
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
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <?php
            }
            ?>
            
        </div>
    </section>
    <!-- End New Arrival -->
    <!-- Start bannar -->
    <section id="bannar" class="section-m1">
        <h4>Repair Service</h4>
        <h2>Up to <span>70% Off</span> - All t-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>
    <!-- End bannar -->
    <section id="product1" class="section-p1">
        <h2>New Arrival</h2>
        <p>Summer Collection New Modren Desgin</p>
        <div class="pro-container">

        <?php
        $query = "SELECT * FROM `product` WHERE quantity_available > 0 LIMIT 4 OFFSET 4";
        $result = mysqli_query($con , $query);
        while ($row = mysqli_fetch_assoc($result)) {
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
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>

            <?php } ?>

            
        </div>
    </section>
    <section id="sm-bannar" class="section-p1">
        <div class="bannar-box">
            <h4>Crazy Deals</h4>
            <h2>buy 1 get 1 Free</h2>
            <span>The best classic dress is on sale from cara</span>
            <button class="white">Learn More</button>
        </div>
        <div class="bannar-box bannar-box2">
            <h4>Spring/Summer</h4>
            <h2>buy 1 get 1 Free</h2>
            <span>The best classic dress is on sale from cara</span>
            <button class="white">Learn More</button>
        </div>

    </section>

    <section id="bannar3" class="section-p1">
        <div class="bannar-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection - 50% off</h3>
        </div>
        <div class="bannar-box bannar-box2">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection - 50% off</h3>
        </div>
        <div class="bannar-box bannar-box3">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection - 50% off</h3>
        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning">Special Offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Enter Your E-mail...">
            <button  class="normal"> Sign Up</button>
        </div>
    </section>

<?php include 'footer.php' ?>