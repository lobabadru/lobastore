<?php
include('security.php');
include('includes/header.php');
include('includes/sidenav.php');
?>
<!doctype html>
<html lang="en">
 
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add New Product </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css?v=<?php echo time(); ?>">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>

        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <?php
                                //insert into DB
                                $product_name = $_POST['product_name'];
                                $description = $_POST['description'];
                                $price = $_POST['price'];
                                $category = $_POST['category'];
                                $status = $_POST['status'];
                                $quantity = $_POST['quantity'];

                                $image_file = "images2/".$_FILES['product_image']['name'];

                                is_uploaded_file($_FILES['product_image']['tmp_name']);

                                if (!move_uploaded_file($_FILES['product_image']['tmp_name'], $image_file)) {
                                    // code...
                                    echo "File Not Uploaded";
                                }
                                



                                $insert_query = "insert into products(product_name,description,price,product_image,category,status,Quantity) values ('".$product_name."','".$description."','".$price."','".$image_file."','".$category."','".$status."','".$quantity."')";

                                $query = mysqli_query($connection,$insert_query);

                                if ($query) {
                                    // code...
                                    echo "<div class='card-header p-4'><h2 class='text-center'>New Product Added Succesfully!!!</h2></div>
                                    <div class='card-body'><h1 class='text-center'>Product Added Succesfully</h1></div>
                                    <div class='card-footer bg-white'><h3 class='text-center'><button type='button' class='btn btn-success'><a href='data-tables.php'>View Table</a></button></h3></div>
                                    ";
                                    echo "</div>";
                                }
                                

                                else{
                                    echo "ERROR: ".mysqli_error($connection)."";
                                }


                                ?>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<?php
include('includes/script.php');
include('includes/footer.php');
?>
