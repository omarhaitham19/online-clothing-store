<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
include "header.php";
include "navbar.php";
$errors = [];
function validate_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if (isset($_POST['submit'])) {
    session_regenerate_id();
   
    $address = mysqli_real_escape_string($con , validate_input($_POST['address']));
    $city = mysqli_real_escape_string($con , validate_input($_POST['city']));
    $postalCode = mysqli_real_escape_string($con , validate_input($_POST['postalcode']));
    $paymentType = mysqli_real_escape_string($con , $_POST['payment_type']);
    $allowedPaymentTypes = ["Cash_on_Delivery", "visa"];

    if (empty($address)) {
        $errors['address'] = "Required Field";
    }elseif(strlen($address) < 5) {
        $errors['address'] = "Address is too short. Minimum length is 5 characters.";
    }

    if (empty($postalCode)) {
        $errors['code'] = "Required Field";
    }elseif (!is_numeric($postalCode)) {
        $errors['code'] = "Postal Code must be a number";
    }

    if (empty($city)) {
        $errors['city'] = "Required Field";
    }elseif(!preg_match("/^[a-zA-Z\s]+$/", $city)) {
        $errors['city'] = "Invalid City. Only letters and spaces are allowed.";
    }

    if (empty($paymentType)) {
        $errors['type'] = "Required Field";
    }elseif(!in_array($paymentType, $allowedPaymentTypes)) {
        $errors['type'] = "Invalid Payment Type";
         }

         if (empty($errors)) {

            $estDeliveryDate = date('Y-m-d', strtotime('+3 days'));
            $query = "INSERT INTO `order_details`(`status`, `amount`, `payment_method`, `address`, `city`, `postal_code`, `est_delivery_date`, `user_id`)
                      VALUES ('undelivered', '{$_SESSION['total']}', '$paymentType', '$address', '$city', '$postalCode', '$estDeliveryDate', '{$_SESSION['user_id']}')";
            $result = mysqli_query($con, $query);
    
            if ($result) {
                $orderDetailsId = mysqli_insert_id($con); 
    
                $cartQuery = "SELECT * FROM shopping_cart WHERE user_id = {$_SESSION['user_id']}";
                $cartResult = mysqli_query($con, $cartQuery);
    
                while ($cartRow = mysqli_fetch_assoc($cartResult)) {
                    $productId = $cartRow['product_id'];
                    $productQuantity = $cartRow['quantity'];
                    $productPrice = $cartRow['price'];
    
                    $productAmount = $productQuantity * $productPrice;
    
                    $orderProductQuery = "INSERT INTO `order_product`(`product_id`, `orderDetails_id`, `product_quantity`, `amount`)
                                          VALUES ('$productId', '$orderDetailsId', '$productQuantity', '$productAmount')";
                    mysqli_query($con, $orderProductQuery);

                    $update_quantity = "UPDATE `product` SET `quantity_available` = `quantity_available` - $productQuantity WHERE `id` = $productId";
                    mysqli_query($con , $update_quantity);
                }
    
                $clearCartQuery = "DELETE FROM shopping_cart WHERE user_id = {$_SESSION['user_id']}";
                mysqli_query($con, $clearCartQuery);
    
                echo '<script>alert("Products Purchased Successfully!");</script>';
                echo "<script>window.location.href='index.php';</script>";
            }
        }
}
?>

<section id="cart-add" class="section-p1">
        <?php
        if(isset($_POST['total'])) {
         $total = $_POST['total'];
         $_SESSION['total'] = $total;
        }
    ?>
        <div id="subTotal">
          <h3>Cart totals: <?php echo isset($_SESSION['total']) ? $_SESSION['total'] : null; ?></h3>
     <form class="col-4" method="POST">
         <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" >
            <span style="color: red;"> <?php echo isset($errors['address']) ? $errors['address'] : null ?> </span>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" >
            <span style="color: red;"> <?php echo isset($errors['city']) ? $errors['city'] : null ?> </span>
        </div>

        <div class="form-group">
            <label for="postalCode">Postal Code</label>
            <input type="text" id="postalCode" name="postalcode">
            <span style="color: red;"> <?php echo isset($errors['code']) ? $errors['code'] : null ?> </span>
        </div>

        <div class="form-group">
            <label for="paymentType">Payment Type</label>
            <select id="paymentType" name="payment_type">
                <option value="Cash_on_Delivery">Cash on Delivery</option>
                <option value="visa">Visa</option>
            </select>
            <span style="color: red;"> <?php echo isset($errors['type']) ? $errors['type'] : null ?> </span>
        </div>
        <button class="normal" name="submit" type="submit">Proceed to Checkout</button>
    </form>
</div>

    </section>


    <?php include "footer.php";
    }else {
        header("location:index.php");
        exit();
    } ?>