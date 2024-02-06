<!DOCTYPE html>
<html>
<head>
    <title>Assign Police</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Incharge_complain_page.php">View Complaints</a></li>
                    <li class="active"><a href="incharge_complain_details.php">Complaints Details</a></li>
                    <li><a href="inc_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="padding:50px; margin-top:10px;">
        <form method="post">
            <table class="table table-bordered">
                <thead class="thead-dark" style="background-color: black; color: white;">
                    <tr>
                        <th scope="col">Complaint Id</th>
                        <th scope="col">Type of Crime</th>
                        <th scope="col">Date of Crime</th>
                        <th scope="col">Description</th>
                        <th scope="col">Assign Police</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assuming you have a connection to the database already

                    // Fetch complaints from the database
                    $result = mysqli_query($conn, "SELECT c_id, type_crime, d_o_c, description FROM complaints WHERE inc_status='Unassigned'");

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['c_id']}</td>";
                        echo "<td>{$row['type_crime']}</td>";
                        echo "<td>{$row['d_o_c']}</td>";
                        echo "<td>{$row['description']}</td>";
                        echo "<td>
                                <select class='form-control' name='police_name'>
                                    <option>Select Police</option>";
                                    
                        $p_name_result = mysqli_query($conn, "SELECT p_name FROM police WHERE location='$location'");
                        
                        while ($p_name_row = mysqli_fetch_assoc($p_name_result)) {
                            echo "<option>{$p_name_row['p_name']}</option>";
                        }

                        echo "</select>
                                <input type='hidden' name='complainid' value='{$row['c_id']}'>
                                <input type='submit' name='assign' value='Assign Case' class='btn btn-primary'>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <div style="position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 30px;
        background-color: rgba(0,0,0,0.8);
        color: white;
        text-align: center;">
        <h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
