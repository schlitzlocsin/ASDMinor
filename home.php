<?php 
require_once 'config.php';
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
 echo "<script> window.location.href =\"index.php\" </script>";
}
?>
<?php 
include 'design.php';
?>

 
<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
<style type="text/css">
        .wrapper{
            width: 900px;
            margin: 0 auto;
			background:#f4f4f4;
			border-radius: 10px;
			padding: 40px;
			box-sizing: border-box;
        }
    </style>
 </head>
 <?php

 ?>
 
<?php
?>
<body>
<br /><br /><br /><br />
<h3 align="center">Summary of Inventory for each Product Code</h3> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapperInv{
            width: 800px;
            margin: 0 auto;
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
<div class="wrapperInv">

<?php
	// table for the query stated below
  $sql = "Select * from vw_summary";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
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
										if($row['totalDiff']<=10){
											echo "<tr class='bg-danger' style='background-color:Pink;'>";
											}
										else{
											echo "<tr scope='row'>";
											}
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
					?>
					<p>**Highlighted rows need re-order</p>
					<a href="reorder.php" class="btn btn-success pull-left">Products to order</a>
					</div>
 </body>
</html>
 
