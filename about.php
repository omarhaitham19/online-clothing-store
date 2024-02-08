<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About US</title>
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
                    <a href="blog.php">Blog</a>
                </li>
                <li class="link">
                    <a class="active" href="about.php">About</a>
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
    <section id="page-header" class="about-header">
        <h2>#Know US</h2>
    </section>
    <section id="About-header" class="section-p1">
        <div class="content-container">

            <img src="img/about/a6.jpg" alt="about-img">
            <div class="about-content">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, placeat illo quod asperiores, nemo blanditiis quasi labore ullam tempora unde dicta excepturi repudiandae voluptates obcaecati laborum aperiam error, sint esse?</p>
                <abbr title="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam repellendus id asperiores ab enim eius.</abbr>
                <br><br>
                <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque blanditiis vitae quibusdam harum ipsum. Atque!</marquee>
            </div>
        </div>
    </section>

    <section id="about-video" class="section-p1">
        <h2>Download our <a href="#" style="color: blueviolet;">App</a></h2>
        <div class="video">
            <video src="img/about/1.mp4" muted autoplay loop></video>
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