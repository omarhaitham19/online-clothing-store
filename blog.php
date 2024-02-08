<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog </title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/index_style.css">
</head>

<body>

    <!-- Start header -->

    <section id="header">

        <a href="index.php">
            <img src="img/logo.png" alt="homeLogo">
        </a>
        <div>
            <ul id="navbar">
                <li class="link">
                    <a href="index.php">Home</a>
                </li>
                <!-- <li class="link">
                    <a href="shop.php">Shop</a>
                </li> -->
                <li class="link">
                    <a class="active " href="blog.php">Blog</a>
                </li>
                <li class="link">
                    <a href="about.php">About</a>
                </li>
                <li class="link">
                    <a href="contact.php">Contact</a>
                </li>
                <!-- <li class="link">
                    <a id="lg-cart" href="cart.php">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li> -->
                <a href="#" id="close"><i class="fas fa-times"></i></a>
            </ul>

        </div>
        <div id="mobile">
            <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a>
            <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
        </div>
    </section>

    <!-- End header -->
    <section id="page-header" class="blog-header">
        <h2>#ReadMore</h2>
        <p>Read all cases studies about our products!</p>
    </section>

    <section id="blog" class="section-p1">
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b1.jpg" alt="">
            </div>
            <div class="blog-content">
                <h4>The Cotton-jersey Zip-up Hoodie</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad dolorum unde ut consectetur at veniam consequatur libero. Cum, mollitia saepe!</p>
                <a href="#">Continue Reading....</a>
            </div>
            <h1>13/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b2.jpg" alt="">
            </div>
            <div class="blog-content">
                <h4>The Cotton-jersey Zip-up Hoodie</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad dolorum unde ut consectetur at veniam consequatur libero. Cum, mollitia saepe!</p>
                <a href="#">Continue Reading....</a>
            </div>
            <h1>13/04</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b3.jpg" alt="">
            </div>
            <div class="blog-content">
                <h4>The Cotton-jersey Zip-up Hoodie</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad dolorum unde ut consectetur at veniam consequatur libero. Cum, mollitia saepe!</p>
                <a href="#">Continue Reading....</a>
            </div>
            <h1>11/18</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b4.jpg" alt="">
            </div>
            <div class="blog-content">
                <h4>The Cotton-jersey Zip-up Hoodie</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad dolorum unde ut consectetur at veniam consequatur libero. Cum, mollitia saepe!</p>
                <a href="#">Continue Reading....</a>
            </div>
            <h1>13/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b5.jpg" alt="">
            </div>
            <div class="blog-content">
                <h4>The Cotton-jersey Zip-up Hoodie</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad dolorum unde ut consectetur at veniam consequatur libero. Cum, mollitia saepe!</p>
                <a href="#">Continue Reading....</a>
            </div>
            <h1>13/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="img/blog/b6.jpg" alt="">
            </div>
            <div class="blog-content">
                <h4>The Cotton-jersey Zip-up Hoodie</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad dolorum unde ut consectetur at veniam consequatur libero. Cum, mollitia saepe!</p>
                <a href="#">Continue Reading....</a>
            </div>
            <h1>13/01</h1>
        </div>
    </section>
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning">Special Offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Enter Your E-mail...">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <?php  include 'footer.php'?>
    <script src="js/main.js"></script>
</body>



</html>