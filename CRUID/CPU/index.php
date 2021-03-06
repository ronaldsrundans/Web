<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CPU Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">CPU Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New CPU</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM CPU";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Manufacturer</th>";
										echo "<th>Name</th>";
                                        echo "<th>Model</th>";
                                        echo "<th>Cache size</th>";
                                        echo "<th>Clock frequency</th>";
										echo "<th>Socket</th>";
										echo "<th>Cores</th>";
										echo "<th>Threads</th>";
										echo "<th>Year</th>";
										echo "<th>Last changes</th>";
										echo "<th>Options</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['cpuid'] . "</td>";
                                        echo "<td>" . $row['cpuman'] . "</td>";
                                        echo "<td>" . $row['cpuname'] . "</td>";
                                        echo "<td>" . $row['cpumodel'] . "</td>";
										echo "<td>" . $row['cpucache'] . "</td>";
										echo "<td>" . $row['cpufreq'] . "</td>";
										echo "<td>" . $row['cpusocket'] . "</td>";
										echo "<td>" . $row['cpucores'] . "</td>";
										echo "<td>" . $row['cputhreads'] . "</td>";
										echo "<td>" . $row['cpuyear'] . "</td>";
										echo "<td>" . $row['cpudate'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['cpuid'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['cpuid'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['cpuid'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
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
