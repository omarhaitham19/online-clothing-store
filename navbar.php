<?php
session_start();
?>
<section id="header">
<a href="index.php">
    <img src="img/logo.png" alt="homeLogo">
</a>

<div>
    <ul id="navbar">
        <li class="link">
            <a class="active " href="index.php"></a>
        </li>
        <li class="link">
            <a href="shop.php">Shop</a>
        </li>

    
        <li class="link">
            <a href="blog.php">Blog</a>
        </li>
        <li class="link">
            <a href="about.php">About</a>
        </li>
        <li class="link">
            <a href="contact.php">Contact</a>
        </li>
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            } else{
            ?>
        <li class="link">
            <a href="signup.php">Signup</a>
        </li>
        <?php } 

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            ?>
                <li class="link">
                    <a href="logout.php">Logout</a>
                </li>
            <?php } else { ?>
                <li class="link">
                    <a href="login.php">Login</a>
                </li>
            <?php } 

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            ?>

        <li class="link">
            <a id="lg-cart" href="cart.php">
                <i class="fas fa-shopping-cart"></i> 
            </a>
        </li>
        <?php }else {
            
        }?>
    </ul>

</div>

<div id="mobile">
        <a href="cart.php">
        <i class="fas fa-shopping-cart"></i>
    </a>
    <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
</div>
</section>


