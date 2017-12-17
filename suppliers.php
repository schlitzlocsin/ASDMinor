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
            width: 1000px;
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
<?php 
include 'design.php'; ?>
<body>
<br><br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-25">

                  <div class="page-header">
                      <h1>Hi, <b><?php echo $_SESSION['username']; ?></b> </h1>
                  </div>
                  

                    <div class="page-header clearfix">
                        <h2 class="pull-left">Suppliers</h2>
                        <a href="createSup.php" class="btn btn-success pull-right">Add New Supplier</a>
                    </div>



                    <?php
                    // Include config file
                    require_once 'config.php';

                    // Attempt select query execution
                    $sql = "SELECT * FROM suppliers";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
										
                                        echo "<th>Company Name</th>";
                                        echo "<th>Contact Name</th>";
                                        echo "<th>Contact Number</th>";
										echo "<th>Company Address</th>";
										echo "<th>Action</th>";
								
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                    
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
										
                                        
                                        echo "<td>" . $row['CompanyName'] . "</td>";
                                        echo "<td>" . $row['ContactName'] . "</td>";
                                        echo "<td>" . $row['ContactNumber'] . "</td>";
										echo "<td>" . $row['CompanyAddress'] . "</td>";
                                        echo "<td>";
									
                                            echo "<a href='readSup.php?id=". $row['SupplierID'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='updateSup.php?id=". $row['SupplierID'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='deleteSup.php?id=". $row['SupplierID'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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
