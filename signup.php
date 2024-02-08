<?php
include "header.php";
include "navbar.php";
?>

<div class="card-body px-5 py-5" style="background-color:darkgray;">
    <h3 class="card-title text-left mb-3">Register</h3>

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

        $first_name = mysqli_real_escape_string($con ,validate_input($_POST['first_name']));
        $last_name = mysqli_real_escape_string($con ,validate_input($_POST['last_name']));
        $email = mysqli_real_escape_string($con ,validate_input($_POST['email']));
        $password =mysqli_real_escape_string($con , validate_input($_POST['password'])); 
        $confirm_password = mysqli_real_escape_string($con , validate_input($_POST['confirm_password'])); 
        $phone = mysqli_real_escape_string($con , validate_input($_POST['phone']));
        $address = mysqli_real_escape_string($con , validate_input($_POST['address']));

        if (empty($first_name)) {
            $errors['first_name'] = "First Name is required";
        } elseif (!ctype_alpha(str_replace(" ", "", $first_name))) {
            $errors['first_name'] = "Only letters and White space are allowed";
        }

        if (empty($last_name)) {
            $errors['last_name'] = "Last Name is required";
        } elseif (!ctype_alpha(str_replace(" ", "", $last_name))) {
            $errors['last_name'] = "Only letters and White space are allowed";
        }

        if (empty($email)) {
            $errors['email'] = "Email is required";
        } elseif (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = "Enter a valid Email";
        }

        if (empty($_POST['password'])) {   // we have to check the emptiness of the field by checking the field itself not the hashed 
            $errors['password'] = "Password is required";
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{3,}$/', $password)) {
            $errors['password'] = "Password must include at least one uppercase letter, one lowercase letter, one number, and one special character";
        }
        
        if (empty($_POST['confirm_password'])) {
            $errors['confirm_password'] = "Confirm Password is required";
        } elseif ($_POST['password'] !== $_POST['confirm_password']) {
            $errors['confirm_password'] = "Passwords do not match";
        }

        if (empty($phone)) {
            $errors['phone'] = "Phone is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
            $errors['phone'] = "Enter a valid 10-digit phone number";
        }

        if (empty($address)) {
            $errors['address'] = "Address is required";
        }

        if (empty($errors)) {

            $qy = "SELECT COUNT(*) AS count FROM user WHERE email = '$email'";
            $checkPhone = "SELECT COUNT(*) AS count FROM user WHERE phone_number = '$phone'";
            $rt = mysqli_query($con, $qy);
            $rt2 = mysqli_query($con , $checkPhone);
            $row = mysqli_fetch_assoc($rt);
            $row2 = mysqli_fetch_assoc($rt2);
            $emailCount = $row['count'];
            $phoneCount = $row2['count'];

            if ($emailCount > 0) {
            echo '<script language="javascript">';
            echo 'alert("This email already exists!")';
            echo '</script>';
          } elseif($phoneCount > 0){
            echo '<script language="javascript">';
            echo 'alert("This Phone Number already exists!")';
            echo '</script>';
          }  else {

            $hashed_password = password_hash($password , PASSWORD_DEFAULT);

            $query = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `password`, `status`, `phone_number`, `address`, `admin_id`)
             VALUES('$first_name' , '$last_name' ,'$email' , '$hashed_password' , 'active' , '$phone' , '$address' , 1)";

             if (mysqli_query($con , $query)) {
                header("location:login.php");
                exit();  
             } else {
                echo "<script> alert('An Error Occured!') </script>";
             }

        } 
    }
}
    
    ?>

    <form method="POST">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control p_input">
            <span style="color: red;"> <?php echo isset($errors['first_name']) ? $errors['first_name'] : null ?> </span>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control p_input">
            <span style="color: red;"> <?php echo isset($errors['last_name']) ? $errors['last_name'] : null ?> </span>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control p_input">
            <span style="color: red;"> <?php echo isset($errors['email']) ? $errors['email'] : null ?> </span>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control p_input">
            <span style="color: red;"> <?php echo isset($errors['password']) ? $errors['password'] : null ?> </span>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control p_input">
            <span style="color: red;"> <?php echo isset($errors['confirm_password']) ? $errors['confirm_password'] : null ?> </span>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control p_input">
            <span style="color: red;"> <?php echo isset($errors['phone']) ? $errors['phone'] : null ?> </span>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control p_input">
            <span style="color: red;"> <?php echo isset($errors['address']) ? $errors['address'] : null ?> </span>
        </div>

        <div class="form-group d-flex align-items-center justify-content-between">
            <div class="form-check">

                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">Signup</button>
                </div>
                
                <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                <p class="terms">By creating an account you are accepting our Terms & Conditions</p>
    </form>
</div>
</div>
</div>
<!-- content-wrapper ends -->
</div>
<!-- row ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<?php
include "footer.php";
?>