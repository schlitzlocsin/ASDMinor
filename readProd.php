<?php

//require_once 'header-without-nav.php';
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once 'config.php';

    // Prepare a select statement
    $sql  = 'SELECT * FROM products WHERE ProductID = '.$_GET["id"];
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
			
			$ProductID = $row["ProductID"];
            $ProductCode = $row["ProductCode"];
            $ProductName = $row["ProductName"];
            $ProductDescription = $row["ProductDescription"];
            $CompanyName = $row["CompanyName"];
			
			$Price = $row["Price"];
        }else{
            header("location: error.php");
            exit();
        }
    }
  
	
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
			background:#f4f4f4;
			border-radius: 10px;
			padding: 40px;
			box-sizing: border-box;
        }
    </style>
</head>
<body>
<?php include 'design.php'; ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
					
					<div class="form-group">
                        <label>Product ID</label>
                        <p class="form-control-static"><?php echo $row["ProductID"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product Code</label>
                        <p class="form-control-static"><?php echo $row["ProductCode"]; ?></p>
                    </div>
					 <div class="form-group">
                        <label>Product Name</label>
                        <p class="form-control-static"><?php echo $row["ProductName"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <p class="form-control-static"><?php echo $row["ProductDescription"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Company Name</label>
                        <p class="form-control-static"><?php echo $row["CompanyName"]; ?></p>
                    </div>
					
					<div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $row["Price"]; ?></p>
                    </div>
                    <p><a href="products.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
