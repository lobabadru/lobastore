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
    <title>Product Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css?v=<?php echo time(); ?>">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    
        
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title"></h2>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">New Product</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <div class="page-section" id="overview">
                            <!-- ============================================================== -->
                            <!-- overview  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h2>New Product</h2>
                                    <p class="lead"> </p>
                                    <ul class="list-unstyled arrow">
                                    </ul>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end overview  -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Add New Product</h3>
                                <div class="card">
                                    <h5 class="card-header">Product Form</h5>
                                    <div class="card-body">
                                        <form method="post" action="newproduct.php" enctype="multipart/form-data" >
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Product Name</label>
                                                <input id="inputText3" type="text" class="form-control" name="product_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Price</label>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">₦</span></div>
                                                <input id="inputText3" type="text" class="form-control" name="price">
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div><br>
                                            <div class="custom-file mb-3">
                                                <input type="hidden" name="max-file" value="1000000000">
                                                <input type="file" class="custom-file-input" id="customFile" name="product_image">
                                                <label class="custom-file-label" for="customFile">Product Image</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-select">Category</label>
                                                <select class="form-control" id="input-select" name="category">
                                                    <option></option>
                                                    <?php
                                                    $select = mysqli_query($connection, 'select * from category order by category_id asc');
                                                    while($row = mysqli_fetch_array($select)){
                                                        $category_name = $row['category_name'];

                                                        echo "<option>$category_name</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Quantity</label>
                                                <input id="inputText4" type="number" class="form-control" placeholder="Numbers" name="quantity">
                                            </div>
                                            <div class="form-group">
                                                <label for="input-select">Status</label>
                                                <select class="form-control" id="input-select" name="status">
                                                    <option></option>
                                                    <option>Available</option>
                                                    <option>Out of stock</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input id="inputText3" type="submit" class="form-control" value="Add Product">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>    
                            </div>
                        </div>      
                       
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
<?php
include('includes/script.php');
include('includes/footer.php');
?>
