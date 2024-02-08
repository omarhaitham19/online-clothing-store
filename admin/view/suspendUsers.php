<?php
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
include "../../connection.php";
?>



<?php
if (isset($_POST['suspend'])) {
  function validate_input($input)
  {
      $input = trim($input);
      $input = stripslashes($input);
      $input = htmlspecialchars($input);
      return $input;
  }

  $suspendEmail = mysqli_real_escape_string($con , validate_input($_POST['suspend_email']));
  if (empty($suspendEmail)) {
    $errors['suspend_email'] = "Email is required";
}

if (empty($errors)){
  
  $checkEmail = "SELECT * FROM user WHERE email = '$suspendEmail'";
  $result = mysqli_query($con, $checkEmail);
  
  if(mysqli_num_rows($result) == 1) {
    $suspenduser = "UPDATE user SET status = 'suspended' WHERE email = '$suspendEmail'";
    $rst1 = mysqli_query($con, $suspenduser);

    if ($rst1) {
       echo "<script>alert('Account suspended successfully!')</script>";
    } else {
      echo "<script>alert('An error occured')</script>.";
    }
  } else {
    echo "<script>alert('Email does not exist.')</script>.";
  }
}
}

if (isset($_POST['add'])) {
  $suspendEmail = mysqli_real_escape_string($con, validate_input($_POST['suspend_email']));
  if (empty($suspendEmail)) {
      $errors['suspend_email'] = "Email is required";
  }

  if (empty($errors)) {
      // Check if the email exists in the database
      $checkEmail = "SELECT * FROM user WHERE email = '$suspendEmail'";
      $result = mysqli_query($con, $checkEmail);

      if (mysqli_num_rows($result) == 1) {
          // Suspend the user by updating the 'status' column to 'suspended'
          $suspendUser = "UPDATE user SET status = 'suspended' WHERE email = '$suspendEmail'";
          $rst2 = mysqli_query($con, $suspendUser);

          if ($rst2) {
              echo "<script>alert('User suspended successfully!')</script>";
          } else {
              echo "<script>alert('An error occurred while suspending the user.')</script>";
          }
      } else {
          echo "<script>alert('Email does not exist.')</script>";
      }
  }
}

?>


<div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Suspend User </h3>
                <form method="POST" >
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="suspend_email" class="form-control p_input">
                    <span style="color: red;"> <?php echo isset($errors['suspend_email']) ? $errors['suspend_email'] : null ?> </span>
                  </div>
                 
                  <div class="text-center">
                    <button type="submit" name="suspend" class="btn btn-primary btn-block enter-btn">Suspend</button>
                  </div>
                
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
include "../view/footer.php";
 ?>