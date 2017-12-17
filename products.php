<?php
include 'config.php';
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header('index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
 <meta charset="UTF-8">
    <title>AppSysDev</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1200px;
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
	<body>
	
	<?php include 'design.php';?>
	<br><br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-20">

                  <div class="page-header">
                      <h1>Hi, <b><?php echo $_SESSION['username']; ?></b> </h1>
                  </div>
                  

                    <div class="page-header clearfix">
                        <h2 class="pull-left">Products</h2>
                       
                    </div>



                    <?php
                    // Include config file
                    require_once 'config.php';

                    // Attempt select query execution
                    $sql = "SELECT * FROM products";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Product Code</th>";
                                        echo "<th>Product Name</th>";
                                        echo "<th>Product Description</th>";
										echo "<th>Company Name</th>";
										
										echo "<th>Price</th>";
										 echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
										echo "<td>" . $row['ProductID'] . "</td>";
                                        echo "<td>" . $row['ProductCode'] . "</td>";
                                        echo "<td>" . $row['ProductName'] . "</td>";
                                        echo "<td>" . $row['ProductDescription'] . "</td>";
										echo "<td>" . $row['CompanyName'] . "</td>";
										
										echo "<td>" . $row['Price'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='readProd.php?id=". $row['ProductID'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "</td>";
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
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
