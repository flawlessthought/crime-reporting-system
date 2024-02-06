<!DOCTYPE html>
<html>
<head>
    
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:inchargelogin.php");
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    // mysqli_select_db($conn,"crime_portal");
    
    
    $query="SELECT c_id,type_crime,d_o_c,location,pol_status FROM complaint ";
    $result=mysqli_query($conn,$query);  
    
    // Fetch available police officers
    $policeQuery = "SELECT p_id, p_name, spec, location FROM police WHERE location = '$location'";
    $policeResult = mysqli_query($conn, $policeQuery);
    ?>

	<title>Incharge Homepage</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
    <script>
     function f1()
        {
          var sta2=document.getElementById("ciid").value;
          var x2=sta2.indexOf(' ');
     if(sta2!="" && x2>=0)
     {
        document.getElementById("ciid").value="";
        alert("Blank Field not Allowed");
      }       
}

function f1() {
            var sta2 = document.getElementById("ciid").value;
            var x2 = sta2.indexOf(' ');
            if (sta2 !== "" && x2 >= 0) {
                document.getElementById("ciid").value = "";
                alert("Blank Field Found");
            }
        }

        function printTable() {
            window.print();
        }
</script>
    
</head>
<body style="background-color: #dfdfdf">
	<nav  class="navbar navbar-default navbar-fixed-top">
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
                <ul class="nav navbar-nav">
                    <li ><a href="official_login.php">Official Login</a></li>
                    <li ><a href="inchargelogin.php">Incharge Login</a></li>
                    <li class="active"><a href="Incharge_complain_page.php">Incharge Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" ><a href="Incharge_complain_page.php">View Complaints</a></li>
                    <li ><a href="incharge_view_police.php">Police Officers</a></li>
                    <li><a href="inc_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
       
 <div style="padding:50px;">
   <form method="post" action="">
       <label for="complaintId">Select Complaint Id:</label>
       <select name="complaintId">
           <?php
           while ($complaint = mysqli_fetch_assoc($result)) {
               echo "<option value='{$complaint['c_id']}'>{$complaint['c_id']}</option>";
           }
           ?>
       </select>

       <label for="selectedPolice">Assign to Police Officer:</label>
       <select name="selectedPolice">
           <?php
           while ($police = mysqli_fetch_assoc($policeResult)) {
               echo "<option value='{$police['p_id']}'>{$police['p_name']}</option>";
           }
           ?>
       </select>
       <input type="submit" name="assign" value="Assign">
   </form>

   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
        <th scope="col">Location</th>
        <th scope="col">Complaint Status</th>
          
      </tr>
    </thead>

    <?php
      mysqli_data_seek($result, 0); // Reset pointer to fetch from the beginning
      while($rows=mysqli_fetch_assoc($result)){
     ?> 

    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['c_id'];?></td>
        <td><?php echo $rows['type_crime'];?></td>     
        <td><?php echo $rows['d_o_c'];?></td>
        <td><?php echo $rows['location'];?></td>
        <td><?php echo $rows['pol_status']; ?></td>
          
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
 </div>
    
    <div style="position: fixed;
       left: 0;
       bottom: 0;
       width: 100%;
       height: 30px;
       background-color: rgba(0,0,0,0.8);
       color: white;
       text-align: center;">
    </div>

    <button style="margin-left: 33%;" class="btn btn-primary" onclick="printTable()">Print</button>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
