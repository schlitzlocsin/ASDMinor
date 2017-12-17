<?php
include 'config.php';
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
 header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suppliers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }


    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
<?php 
include_once 'design.php'; ?>
<br><br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-25">
					<div class="page-header clearfix">
                        <h2 class="pull-left">Products to reorder</h2>
                    </div>
					
					<?php
                    // Include config file
                    require_once 'config.php';

                    // Attempt select query execution
                    $sql ="select * from vw_summary where totalDiff<10";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered'>";
                                echo "</thead>";
                                    echo "<tr>";
                                        echo "<th>Company Name</th>";
                                        echo "<th>Product Code</th>";
                                        echo "<th>Product Name</th>";
                                        echo "<th>Total Inventory</th>";
										echo "<th>Total Product Out</th>";
										echo "<th>Total Difference</th>";
										
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
										
										echo "<td>" . $row['CompanyName'] . "</td>";
                                        echo "<td>" . $row['ProductCode'] . "</td>";
                                        echo "<td>" . $row['ProductName'] . "</td>";
                                        echo "<td>" . $row['totalInventory'] . "</td>";
										echo "<td>" . $row['totalOut'] . "</td>";
										echo "<td>" . $row['totalDiff'] . "</td>";
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
							
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No products were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    //mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
	<?php

// Define variables and initialize with empty values
$CompanyName = $ProductCode = $ProductName = $ContactNumber = $Quantity =  "";
$CompanyName_err = $ProductCode_err = $ProductName_err = $ContactNumber_err = $Quantity_err = "";

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
	
	// Validate ProductCode
    $input_ProductCode = trim($_POST["ProductCode"]);
    if(empty($input_ProductCode)){
        $ProductCode_err = "Please enter a Product Code.";
    } elseif(!filter_var(trim($_POST["ProductCode"]))){
        $ProductCode_err = 'Please enter a Product Code.';
    } else{
        $ProductCode = $input_ProductCode;
    }

	 // Validate ProductName
    $input_ProductName = trim($_POST["ProductName"]);
    if(empty($input_ProductName)){
        $ProductName_err = "Please enter a Product Name.";
    } elseif(!filter_var(trim($_POST["ProductName"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $ProductName_err = 'Please enter a valid name.';
    } else{
        $ProductName = $input_ProductName;
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
	
	// Validate Quantity
    $input_Quantity = trim($_POST["Quantity"]);
    if(empty($input_Quantity)){
        $Quantity_err = "Please enter Quantity.";
    } elseif(!ctype_digit($input_Quantity)){
        $Quantity_err = 'Please enter a valid Quantity';
    } else{
        $Quantity = $input_Quantity;
	}



    // Check input errors before inserting in database
    if(empty($CompanyName_err) && empty($ProductCode_err) && empty($ProductName_err) && empty($ContactNumber_err) && empty($Quantity_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO reorder (CompanyName, ProductCode, ProductName, ContactNumber, Quantity) VALUES (?, ?, ?, ?, ?)";
		//kung hindi naka auto laging zero ang ID.. WAIT SAMPLE AKO


        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_CompanyName, $param_ProductCode, $param_ProductName, $param_ContactNumber, $param_Quantity);

            // Set parameters

            $param_CompanyName = $CompanyName;
			$param_ProductCode = $ProductCode;
			$param_ProductName = $ProductName;
            $param_ContactNumber = $ContactNumber;
			$param_Quantity = $Quantity;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header('location: reorder.php');
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

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Reorder form</h2>
                    </div>
                    <p>Please fill this form and submit to Reorder.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="form-group <?php echo (!empty($CompanyName_err)) ? 'has-error' : ''; ?>">
                            <label>Company Name</label>
                            <input type="text" name="CompanyName" class="form-control" value="<?php echo $CompanyName; ?>">
                            <span class="help-block"><?php echo $CompanyName_err;?></span>
                        </div>
					  <div class="form-group <?php echo (!empty($ProductCode_err)) ? 'has-error' : ''; ?>">
                      
						<label>Product Code</label>
                            <textarea name="ProductCode" class="form-control"><?php echo $ProductCode; ?></textarea>
                            <span class="help-block"><?php echo $ProductCode_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($ProductName_err)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <input type="text" name="ProductName" class="form-control" value="<?php echo $ProductName; ?>">
                            <span class="help-block"><?php echo $ProductName_err;?></span>
                        </div>

						<div class="form-group <?php echo (!empty($ContactNumber_err)) ? 'has-error' : ''; ?>">
                            <label>Contact Number</label>
                            <input type="number" name="ContactNumber" class="form-control" value="<?php echo $ContactNumber; ?>">
                            <span class="help-block"><?php echo $ContactNumber_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Quantity</label>
                            <input type="number" textarea name="Quantity" class="form-control"><?php echo $Quantity; ?></textarea>
                            <span class="help-block"><?php echo $Quantity_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save">
                        <a href="reorder.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
	<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-25">
					<div class="page-header clearfix">
                        <h2 class="pull-left">Products saved</h2>
                    </div>
					
					<?php
                    // Include config file
                    require_once 'config.php';

                    // Attempt select query execution
                    $sql ="select * from reorder";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered'>";
                                echo "</thead>";
                                    echo "<tr>";
                                        echo "<th>Company Name</th>";
                                        echo "<th>Product Code</th>";
                                        echo "<th>Product Name</th>";
                                        echo "<th>Contact Name</th>";
										echo "<th>Quantity</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
										
										echo "<td>" . $row['CompanyName'] . "</td>";
                                        echo "<td>" . $row['ProductCode'] . "</td>";
                                        echo "<td>" . $row['ProductName'] . "</td>";
                                        echo "<td>" . $row['ContactNumber'] . "</td>";
										echo "<td>" . $row['Quantity'] . "</td>";
										   echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
							
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No products were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    //mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
	
	
	
	
</body>
</html>
