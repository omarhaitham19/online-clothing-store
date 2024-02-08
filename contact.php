<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/index_style.css">
</head>

<body>

<?php
    $errors = [];
 function validate_input($input)
 {
     $input = trim($input);
     $input = htmlspecialchars($input);
     $input = stripslashes($input);
     return $input;
 }

if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($con ,validate_input($_POST['name']));
        $email = mysqli_real_escape_string($con ,validate_input($_POST['email']));
        $subject = mysqli_real_escape_string($con ,validate_input($_POST['subject']));
        $message = mysqli_real_escape_string($con ,validate_input($_POST['message']));

        if (empty($name)) {
            $errors['name'] = "Name is required";
        } elseif (!ctype_alpha(str_replace(" ", "", $name))) {
            $errors['name'] = "Only letters and White space are allowed";
        }

        if (empty($email)) {
            $errors['email'] = "Email is required";
        } elseif (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = "Enter a valid Email";
        }

        if (empty($subject)) {
            $errors['subject'] = "Subject is required";
        }elseif(!ctype_alpha($subject)){
            $errors['subject'] = "Only Letters are allowed";
        }

        if (empty($message)) {
            $errors['message'] = "Message is required";
        } elseif (!preg_match('/^.*$/u', $message)) {
            $errors['message'] = "Invalid characters in the message";
        }

        if (empty($errors)) {
            $insert_query = "INSERT INTO `comment`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
            $result = mysqli_query($con , $insert_query);
            if ($result) {
                echo "<script>alert('Your message has been successfully delivered. We will get back to you shortly.')</script>";
           }else{
                echo "<script>alert('An error occured.')</script>";
            }
        }
}



?>
    <section id="header">

        <a href="index.php">
            <img src="img/logo.png" alt="homeLogo">
        </a>
        <div>
            <ul id="navbar">
                <li class="link">
                    <a href="index.php">Home</a>
                </li>
                
                <li class="link">
                    <a href="blog.php">Blog</a>
                </li>
                <li class="link">
                    <a href="about.php">About</a>
                </li>
                <li class="link">
                    <a class="active" href="contact.php">Contact</a>
                </li>
               
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
    <section id="page-header" class="about-header contact-header">
        <h2>#Lets-talk</h2>
    </section>
    <section id="contact-header" class="section-p1">
        <div class="content-container">

            <div class="contact-content">
                <p class="header">GET IN TOUCH</p>
                <h3>Visit one of our agency locations or contact us today</h3>

                <h6>Head office: </h6>
                <div class="address-data">
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Head office 123 Main St New York, NY 10001</span>

                    </p>
                </div>
                <div class="address-data">
                    <p>
                        <i class="fas fa-phone-alt"></i>
                        <span>Contact@Example.com</span>
                    </p>
                </div>
                <div class="address-data">
                    <p>
                        <i class="fas fa-envelope"></i>
                        <span>Contact@Example.com</span>
                    </p>
                </div>
                <div class="address-data">
                    <p>
                        <i class="fas fa-clock"></i>
                        <span>Sat-Thus:</span>
                        <span>9 00 Am to 22 Pm</span>
                    </p>
                </div>

            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3458.8279792170674!2d31.235712515099073!3d30.04441922023616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145838d16547757b%3A0x755eaa7fc8b82ff!2sCairo%2C%20Egypt!5e0!3m2!1sen!2seg!4v1655511400787!5m2!1sen!2seg"
                 width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </section>


    <section id="contact-form" class="section-m1 section-p1">
        <form action="" method="POST">
            <p class="header">Leave a Message</p>
            <h3>We love to hear from you</h3>
            <input type="text" name="name" placeholder="Your Name">
            <span style="color: red;"> <?php echo isset($errors['name']) ? $errors['name'] : null ?> </span>
            <input type="email" name="email" placeholder="E-mail">
            <span style="color: red;"> <?php echo isset($errors['email']) ? $errors['email'] : null ?> </span>
            <input type="text" name="subject" placeholder="Subject">
            <span style="color: red;"> <?php echo isset($errors['subject']) ? $errors['subject'] : null ?> </span>
            <textarea name="message" placeholder="Your Message"></textarea>
            <span style="color: red;"> <?php echo isset($errors['message']) ? $errors['message'] : null ?> </span>
            <button type="submit" name="submit" class="normal">send</button>
        </form>
        <div class="people">
            <div>
                <img src="img/people/1.png" alt="people">
                <h6>Jhon Doe</h6>
                <p>senior markting manger</p>
                <p>Phone : <span>+20461568748</span></p>
                <p>email : <span>subject@example.com</span></p>
            </div>
            <div>
                <img src="img/people/2.png" alt="people">
                <h6>Jhon Doe</h6>
                <p>senior markting manger</p>
                <p>Phone : <span>+20461568748</span></p>
                <p>email : <span>subject@example.com</span></p>
            </div>
            <div>
                <img src="img/people/3.png" alt="people">
                <h6>Jhon Doe</h6>
                <p>senior markting manger</p>
                <p>Phone : <span>+20461568748</span></p>
                <p>email : <span>subject@example.com</span></p>
            </div>
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