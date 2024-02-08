<?php
ob_start();
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
include "../../connection.php";
?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>
                <?php
                $errors =[];

                if (isset($_POST['add'])) {
                  function validate_input($input){
                    $input = trim($input);
                    $input = stripslashes($input);
                    $input = htmlspecialchars($input);
                    return $input;
                  }

                  $title = mysqli_real_escape_string($con , ucfirst(validate_input($_POST['title'])));
                  $desc = mysqli_real_escape_string($con , validate_input($_POST['desc']));
                  $price = mysqli_real_escape_string($con , validate_input($_POST['price']));
                  $quantity = mysqli_real_escape_string($con , validate_input($_POST['quantity']));
                  $img = $_FILES['img'];
                  $img_name = mysqli_real_escape_string($con , $_FILES['img']['name']);
                  $img_tmp = $_FILES['img']['tmp_name'];
                  $img_size = $_FILES['img']['size'];
                  $ImgExten = pathinfo($img_name , PATHINFO_EXTENSION);
                  $extensions = ['jpg' , 'jpeg' , 'png'];
                  $dir = '../../img/products/';


                if (empty($title)) {
                  $errors['title'] = "title is required";
              } elseif (!ctype_alpha($title)) {
                  $errors['title'] = "Only letters and White space are allowed";
                } elseif(strlen($title) > 10) {
                  $errors['title'] = "Maximum letters are 10";
              }
              
              if (empty($desc)) {
                $errors['desc'] = "Description is required";
            } elseif (!preg_match('/^[a-zA-Z0-9\s\-]+$/', $desc)) {
              $errors['desc'] = "Only letters, white space, and hyphen are allowed";
            }elseif(strlen($desc) < 2 || strlen($desc) > 20){
              $errors['desc'] = "Description must be between 2 and 20 characters";
            }
          
            if (empty($price)) {
              $errors['price'] = "price is required";
          } elseif (!ctype_digit($price)) {
              $errors['price'] = "Only Numbers are allowed";
          } elseif($price < 0){
            $errors['price'] = "Price must be greater than 0";
          }

          if (empty($quantity)) {
            $errors['quantity'] = "quantity is required";
           } elseif (!ctype_digit($price)) {
             $errors['quantity'] = "Only Numbers are allowed";
           } elseif($quantity < 0){
            $errors['quantity'] = "Quantity must be greater than 0";
           }

           if (empty($img_name)) {
            $errors['img'] = "Image is required";
            }elseif(!in_array($ImgExten , $extensions)){
             $errors['img'] = "Upload an image with an extension of jpg , jpeg or png";
           }elseif(file_exists('../../img/products/' . $img_name)){
            $errors['img'] = "Image already exists";
            }elseif($img_size > 5000000){
              $errors['img'] = "Upload an image of maximum 5 megabyte";
            } 

        if (empty($errors)) {
          $imgNewName = uniqid() . "_" .  basename($img_name);
          move_uploaded_file($img_tmp , $dir . $imgNewName);
          $query = "INSERT INTO `product`( `title`, `price`, `description`, `quantity_available`, `image`, `admin_id`)
          VALUES ('$title','$price','$desc','$quantity','$imgNewName', 1)";
          mysqli_query($con , $query);

        echo "<script>alert('Product added successfully!')</script>";
                }
              }
           ob_end_flush();
                ?>
                <form method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input">
                    <span style="color: red;"> <?php echo isset($errors['title']) ? $errors['title'] : null ?> </span>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control p_input">
                    <span style="color: red;"> <?php echo isset($errors['desc']) ? $errors['desc'] : null ?> </span>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" min="1" name="price" class="form-control p_input">
                    <span style="color: red;"> <?php echo isset($errors['price']) ? $errors['price'] : null ?> </span>
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" min="1" name="quantity" class="form-control p_input">
                    <span style="color: red;"> <?php echo isset($errors['quantity']) ? $errors['quantity'] : null ?> </span>
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="img" class="form-control p_input">
                    <span style="color: red;"> <?php echo isset($errors['img']) ? $errors['img'] : null ?> </span>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="add" class="btn btn-primary btn-block enter-btn">Add</button>
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