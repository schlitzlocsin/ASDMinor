<?php

//require_once 'header-without-nav.php';
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once 'config.php';

    // Prepare a select statement
    $sql  = 'SELECT * FROM suppliers WHERE SupplierID = '.$_GET["id"];
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
			
			$SupplierID = $row["SupplierID"];
            $CompanyName = $row["CompanyName"];
            $ContactName = $row["ContactName"];
            $ContactNumber = $row["ContactNumber"];
            $CompanyAddress = $row["CompanyAddress"];
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
    <style type="text/css" href="style.css">
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
                        <label>Supplier ID</label>
                        <p class="form-control-static"><?php echo $row["SupplierID"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Company Name</label>
                        <p class="form-control-static"><?php echo $row["CompanyName"]; ?></p>
                    </div>
					 <div class="form-group">
                        <label>Contact Name</label>
                        <p class="form-control-static"><?php echo $row["ContactName"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <p class="form-control-static"><?php echo $row["ContactNumber"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Contact Address</label>
                        <p class="form-control-static"><?php echo $row["CompanyAddress"]; ?></p>
                    </div>
                    <p><a href="suppliers.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>