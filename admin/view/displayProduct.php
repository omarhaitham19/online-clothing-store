<?php
include "../../connection.php";
?>
<!DOCTYPE html>

<head>

    <!-- Start Links -->
    <link rel="stylesheet" href="../../css/splide.min.css">
    <link rel="stylesheet" href="../../css/splide-core.min.css">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <!--Start Home Style -->
    <link rel="stylesheet" href="../../css/index_style.css">
    <!-- End Home Style -->

    <!-- Start Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@1,400&display=swap" rel="stylesheet">
    <title>Haga Helwa</title>

    <style>
        body {
            font-family: 'Alegreya Sans', sans-serif; 
            text-align: center;
        }

        a {
            display: inline-block;
            margin-top: 20px; 
            padding: 10px 20px;
            background-color: #4CAF50; 
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049; 
        }
        button {
            background-color: #4CAF50; /* Green color */
            color: white;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        .delete-button {
            background-color: #f44336; /* Red color */
        }

        .delete-button:hover {
            background-color: #d32f2f; /* Darker red on hover */
        }
    </style>

</head>


<body>
    <a href="addproduct.php">DashBoard</a>
<div id="search-bar">
    <form action="" method="POST">
    <input type="text" id="search-input" name="search" placeholder="Search for products...">
    <button type="submit" name="searchProduct" id="search-button">Search</button>
    </form>
</div>
    <section id="product1" class="section-p1">
        
        <div class="pro-container">

        <?php
        function validate_input($input){
            $input = htmlspecialchars($input);
            $input = trim($input);
            $input = stripslashes($input);
            return $input;
        }

        if (isset($_POST['updateProduct'])) {
            $productID = $_POST['product_id'];
            $new_quantity = mysqli_real_escape_string($con , validate_input($_POST['new_quantity']));
            $new_price = mysqli_real_escape_string($con , validate_input($_POST['new_price']));

            if (!preg_match('/^[0-9]+([.,][0-9]+)?$/', $new_quantity) || !preg_match('/^[0-9]+([.,][0-9]+)?$/', $new_price)) {
                echo '<script>alert("Invalid input. Please enter valid numbers.");</script>';
            }else{
                $update_query = "UPDATE `product` SET `price`='$new_price',`quantity_available`='$new_quantity' WHERE `id` = $productID";
                $update_result = mysqli_query($con , $update_query);
                if ($update_result) {
                    echo '<script>alert("Product Updated Successfully");</script>';
                }else{
                    echo '<script>alert("An error occured while updating");</script>';
                }
            }
        }

        if (isset($_POST['deleteProduct'])) {
            $productID = $_POST['product_id'];
            $delete_query = "UPDATE `product` SET `is_deleted`='yes' WHERE `id` = $productID";
            $delete_result = mysqli_query($con , $delete_query);
            if ($delete_result) {
                echo '<script>alert("Product Deleted Successfully");</script>';
            }else{
                echo '<script>alert("An error occured while deleting");</script>';
            }
        }



if (isset($_POST['searchProduct'])) {
    $search = htmlspecialchars(trim(mysqli_real_escape_string($con, $_POST['search'])));
    $query = "SELECT * FROM `product` WHERE `is_deleted` = 'no' AND (`title` LIKE '%$search%' OR `description` LIKE '%$search%')";
} else {
    $query = "SELECT * FROM `product` WHERE `is_deleted` = 'no'";
}

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <div class="pro">
            <img src="../../img/products/<?php echo $row['image'] ?>" alt="product">
            <div class="des">
                <span><?php echo $row['title']; ?> </span>
                <h5><?php echo $row['description']; ?></h5>
                <h4><?php echo $row['price'] . " L.E"; ?></h4>
                <span>Quantity: <?php echo $row['quantity_available']; ?> </span>

                <form action="" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <label for="new_quantity">New Quantity:</label>
                    <input type="number" id="new_quantity" name="new_quantity" value="<?php echo $row['quantity_available']; ?>">

                    <label for="new_price">New Price:</label>
                    <input type="number" id="new_price" name="new_price" value="<?php echo $row['price']; ?>">

                    <button type="submit" name="updateProduct">Update</button>
                </form>

                <form action="" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn btn-danger" name="deleteProduct">Delete</button>
                </form>
            </div>
        </div>
<?php
    }
} else {
    echo '<script>alert("No products found for the given search.");</script>';
    echo "<script>window.location.href='displayProduct.php';</script>";
    exit();
}
?>

</section>
</body>

