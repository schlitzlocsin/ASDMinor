<?php
// Include config file
require_once 'config.php';
require_once 'design.php';

// Define variables and initialize with empty values
$CompanyName = $ContactName = $ContactNumber = $CompanyAddress =  "";
$CompanyName_err = $ContactName_err = $ContactNumber_err = $CompanyAddress_err = "";



// Processing form data when form is submitted
if(isset($_POST["SupplierID"]) && !empty($_POST["SupplierID"])){
	
    // Get hidden input value
    $SupplierID = $_POST["SupplierID"];

    // Validate name
    $input_CompanyName = trim($_POST["CompanyName"]);
    if(empty($input_CompanyName)){
        $CompanyName_err = "Please enter a Company name.";
    } elseif(!filter_var(trim($_POST["CompanyName"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $CompanyName_err = 'Please enter a valid name.';
    } else{
        $CompanyName = $input_CompanyName;
    }

    // Validate address address
    $input_ContactName = trim($_POST["ContactName"]);
    if(empty($input_ContactName)){
        $ContactName_err = "Please enter a Contact name.";
    } elseif(!filter_var(trim($_POST["ContactName"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $ContactName_err = 'Please enter a valid name.';
    } else{
        $ContactName = $input_ContactName;
    }

    // Validate ContactNumber
    $input_ContactNumber = trim($_POST["ContactNumber"]);
    if(empty($input_ContactNumber)){
        $ContactNumber_err = "Please enter Contact Number.";
    } elseif(!ctype_digit($input_ContactNumber)){
        $ContactNumber_err = 'Please enter a valid Contact Number';
    } else{
        $ContactNumber = $input_ContactNumber;
	}
	// Validate CompanyAddress
    $input_CompanyAddress = trim($_POST["CompanyAddress"]);
    if(empty($input_CompanyAddress)){
        $CompanyAddress_err = 'Please enter an CompanyAddress.';
    } else{
        $CompanyAddress = $input_CompanyAddress;
    }


    // Check input errors before inserting in database
   if(empty($SupplierID_err) && empty($CompanyName_err) && empty($ContactName_err) && empty($ContactNumber_err) && empty($CompanyAddress_err)){
        // Prepare an insert statement
        $sql = "UPDATE suppliers SET CompanyName=?, ContactName=?, ContactNumber=?, CompanyAddress=? WHERE SupplierID=?";
	
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_CompanyName, $param_ContactName, $param_ContactNumber, $param_CompanyAddress, $param_SupplierID);

            // Set parameters
			
            $param_CompanyName = $CompanyName;
			$param_ContactName = $ContactName;
			$param_ContactNumber = $ContactNumber;
            $param_CompanyAddress = $CompanyAddress;
			$param_SupplierID = $SupplierID;
	
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                echo "<script> window.location.href =\"suppliers.php\" </script>";
                exit();
            } else{
				
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $SupplierID =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM suppliers WHERE SupplierID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_SupplierID);

            // Set parameters
            $param_SupplierID = $SupplierID;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $CompanyName = $row["CompanyName"];
                    $ContactName = $row["ContactName"];
                    $ContactNumber = $row["ContactNumber"];
					$CompanyAddress = $row["CompanyAddress"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
				
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                         <div class="form-group <?php echo (!empty($CompanyName_err)) ? 'has-error' : ''; ?>">
                            <label>Company Name</label>
                            <input type="text" name="CompanyName" class="form-control" value="<?php echo $CompanyName; ?>">
                            <span class="help-block"><?php echo $CompanyName_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($ContactName_err)) ? 'has-error' : ''; ?>">
                            <label>Contact Name</label>
                            <input type="text" name="ContactName" class="form-control" value="<?php echo $ContactName; ?>">
                            <span class="help-block"><?php echo $ContactName_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($ContactNumber_err)) ? 'has-error' : ''; ?>">
                            <label>Contact Number</label>
                            <input type="number" name="ContactNumber" class="form-control" value="<?php echo $ContactNumber; ?>">
                            <span class="help-block"><?php echo $ContactNumber_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CompanyAddress_err)) ? 'has-error' : ''; ?>">
                            <label>Company Address</label>
                            <input type="text" name="CompanyAddress" class="form-control" value="<?php echo $CompanyAddress; ?>">
                            <span class="help-block"><?php echo $CompanyAddress_err;?></span>
                        </div>
						
                        <input type="hidden" name="SupplierID" value="<?php echo $SupplierID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="suppliers.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
