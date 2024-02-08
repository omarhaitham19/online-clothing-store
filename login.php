<?php
include "header.php";
include "navbar.php";
include "tse.php";
?>

              <div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">Login</h3>
                <?php

function validate_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if (isset($_POST['submit'])) {
  
  $email = mysqli_real_escape_string($con, validate_input($_POST['email']));
  $password = mysqli_real_escape_string($con, validate_input($_POST['password']));

  if (empty($email)) {
      $errors['email'] = "Email is required";
  }

  if (empty($password)) {
      $errors['password'] = "Password is required";
  }

  if (empty($errors)) {
    $user_query = "SELECT * FROM `user` WHERE `email`='$email'";
    $user_result = mysqli_query($con, $user_query);

    if (mysqli_num_rows($user_result) == 1) {
        $user_data = mysqli_fetch_assoc($user_result);

        // Check the password first
        if ($user_data && password_verify($password, $user_data['password'])) {
            // Check if the account is suspended
            if ($user_data['status'] == 'suspended') {
                echo '<script language="javascript">';
                echo 'alert("Your account is suspended. Please contact support for assistance.")';
                echo '</script>';
            } else {
                // Set up the session and redirect
                $_SESSION['email'] = $email;
                $t = "SELECT `id` FROM `user` WHERE `email` = '{$_SESSION['email']}'";
                $h = mysqli_query($con, $t);

                if ($row = mysqli_fetch_assoc($h)) {
                    $user_id = $row['id'];
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['loggedin'] = true;
                    session_regenerate_id();
                    header("location:index.php");
                    exit();
                } else {
                    echo "<script>alert('An Error occurred!');</script>";
                }
            }
        } else {
            echo "<script>alert('Invalid Credentials!');</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials!');</script>";
    }
}

if ($email == "admin@gmail.com" && $password == 'admin') {
  header("location:admin/view/addProduct.php");
  exit();
}

}

                ?>

                <form method="POST" >
                  <div class="form-group">
                    <label>email *</label>
                    <input type="email" name="email"  class="form-control p_input" >
                    <span style="color: red;"> <?php echo isset($errors['email']) ? $errors['email'] : null ?> </span>
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password"  class="form-control p_input" >
                    <span style="color: red;"> <?php echo isset($errors['password']) ? $errors['password'] : null ?> </span>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    
                    <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="signup.php"> Sign Up</a></p>
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

    <?php include "footer.php" 
    //table user, product, cart ,, review comment , rating  = session
    ?>