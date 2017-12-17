<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$CompanyName = $ContactName = $ContactNumber = $CompanyAddress =  "";
$CompanyName_err = $ContactName_err = $ContactNumber_err = $CompanyAddress_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
    // Validate CompanyName
    $input_CompanyName = trim($_POST["CompanyName"]);
    if(empty($input_CompanyName)){
        $CompanyName_err = "Please enter a Company name.";
    } elseif(!filter_var(trim($_POST["CompanyName"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $CompanyName_err = 'Please enter a valid name.';
    } else{
        $CompanyName = $input_CompanyName;
    }
	
	 // Validate ContactName
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
        $CompanyAddress_err = 'Please enter CompanyAddress.';
    } else{
        $CompanyAddress = $input_CompanyAddress;
    }

    

    // Check input errors before inserting in database
    if(empty($SupplierID_err) && empty($CompanyName_err) && empty($ContactName_err) && empty($ContactNumber_err) && empty($CompanyAddress_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO suppliers (CompanyName, ContactName, ContactNumber, CompanyAddress) VALUES (?, ?, ?, ?)";
		//kung hindi naka auto laging zero ang ID.. WAIT SAMPLE AKO
		
		
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_CompanyName, $param_ContactName, $param_ContactNumber, $param_CompanyAddress);

            // Set parameters
			
            $param_CompanyName = $CompanyName;
			$param_ContactName = $ContactName;
			$param_ContactNumber = $ContactNumber;
            $param_CompanyAddress = $CompanyAddress;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: suppliers.php");
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Supplier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php 
	include 'design.php';
?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Supplier</h2>
                    </div>
                    <p>Please fill this form and submit to add new record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						
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
                            <label>CompanyAddress</label>
                            <textarea name="CompanyAddress" class="form-control"><?php echo $CompanyAddress; ?></textarea>
                            <span class="help-block"><?php echo $CompanyAddress_err;?></span>
                        </div>
                       
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="suppliers.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>