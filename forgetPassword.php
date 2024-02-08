<?php
include "header.php";
include "navbar.php";
session_unset();
session_destroy();

?>

<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
    
            
              <div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">Reset Password</h3>
                <?php
                 function validate_input($input){
                  $input = trim($input);
                  $input = stripslashes($input);
                  $input = htmlspecialchars($input);
                  return $input;
                }
                 if (isset($_POST['submit'])) {
                  $email = mysqli_real_escape_string($con , validate_input($_POST['email']));
                  $password = mysqli_real_escape_string($con , validate_input($_POST['password']));
                  $confirm_password = mysqli_real_escape_string($con , validate_input($_POST['confirm_password']));

                  if (empty($email)) {
                    $errors['email'] = "Email is required";
                  }

                    if (empty($password)) {
                      $errors['password'] = "Password is required";
                    }elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{3,}$/', $password)) {
                      $errors['password'] = "Password must include at least one uppercase letter, one lowercase letter, one number, and one special character";
                  }

                  if (empty($confirm_password)) {
                    $errors['confirm_password'] = "Confirm Password is required";
                } elseif ($confirm_password !== $password) {
                    $errors['confirm_password'] = "Passwords do not match";
                }                

                    if (empty($errors)) {
                      $user_query = "SELECT * FROM `user` WHERE `email`='$email'";
                      $user_result = mysqli_query($con, $user_query);
                      if (mysqli_num_rows($user_result) == 1) {
                        $hashedPassword = password_hash($password , PASSWORD_DEFAULT);
                        $update = "UPDATE `user` SET `password` = '$hashedPassword' WHERE `email` = '$email'";
                        mysqli_query($con , $update);
                        echo "<script>alert('Password Changed Successfully!');</script>";
                        echo "<script>window.location.href='login.php';</script>";
                        exit();
                      }else{
                        echo "<script>alert('Invalid Credentials!');</script>";
                      }
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
                    <label> New Password *</label>
                    <input type="password" name="password"  class="form-control p_input" >
                    <span style="color: red;"> <?php echo isset($errors['password']) ? $errors['password'] : null ?> </span>
                  </div>
                  <div class="form-group">
                    <label>Confirm Password *</label>
                    <input type="password" name="confirm_password"  class="form-control p_input" >
                    <span style="color: red;"> <?php echo isset($errors['confirm_password']) ? $errors['confirm_password'] : null ?> </span>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                   
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn" >Confirm</button>
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

    <?php include "footer.php" ?>