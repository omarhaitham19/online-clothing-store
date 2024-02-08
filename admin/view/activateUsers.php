<?php
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
include "../../connection.php";
?>



<?php
if (isset($_POST['active'])) {
  function validate_input($input)
  {
      $input = trim($input);
      $input = stripslashes($input);
      $input = htmlspecialchars($input);
      return $input;
  }

  $activEmail = mysqli_real_escape_string($con , validate_input($_POST['active_email']));
  if (empty($activEmail)) {
    $errors['active_email'] = "Email is required";
}

if (empty($errors)){
  
  $checkEmail = "SELECT * FROM user WHERE email = '$activEmail'";
  $result = mysqli_query($con, $checkEmail);
  
  if(mysqli_num_rows($result) == 1) {
    $activeuser = "UPDATE user SET status = 'active' WHERE email = '$activEmail'";
    $rst1 = mysqli_query($con, $activeuser);

    if ($rst1) {
       echo "<script>alert('Account activated successfully!')</script>";
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
                <h3 class="card-title text-left mb-3">Activate User </h3>
                <form method="POST" >
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="active_email" class="form-control p_input">
                    <span style="color: red;"> <?php echo isset($errors['active_email']) ? $errors['active_email'] : null ?> </span>
                  </div>
                 
                  <div class="text-center">
                    <button type="submit" name="active" class="btn btn-primary btn-block enter-btn">Activate</button>
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