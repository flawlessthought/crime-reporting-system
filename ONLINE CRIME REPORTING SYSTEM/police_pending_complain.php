<!DOCTYPE html>
<html>
<head>
	<title>Police pending complain</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">p;
	 <script>
        function set() {
            alert("The Status Updated Successfully.");
            return true;
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
     <?php
    
    session_start();
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
$result=mysqli_query($conn,"SELECT c_id,type_crime,d_o_c,location,pol_status FROM complaint ");
  if(isset($_POST['submit']))
        {
        
            if(mysqli_query($conn,"UPDATE complaint SET pol_status='$_POST[status]' WHERE c_id='$_POST[complainid]' ;" ))
            {
                header("location:police_pending_complain.php");
            }
            }
    ?>
 <script>
     function f1()
        {
        var sta2=document.getElementById("ciid").value;
        var x2=sta2.indexOf(' ');
      if(sta2!="" && x2>=0){
          document.getElementById("ciid").value="";
          alert("Blank Field Found");
        }
}
</script>
</head>
<body>
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
        <li ><a href="policelogin.php">Police Login</a></li>
        <li class="active"><a href="police_pending_complain.php">Police Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active" ><a href="police_pending_complain.php">Complaints With Status</a></li>
       
        <li><a href="p_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
  
 <div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
        <th scope="col">Location of Crime</th>
        <th scope="col">Status</th>
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['c_id']; ?></td>
        <td><?php echo $rows['type_crime']; ?></td>     
        <td><?php echo $rows['d_o_c']; ?></td>          
        <td><?php echo $rows['location']; ?></td>
        <td><?php echo $rows['pol_status']; ?></td>          
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
 </div>
 <dialog open style="background-color: lightblue;">
<form  action="" method="post">
	
  Complain_Id
  <input class="form-control" type="text" name="complainid" placeholder="Complain-Id"><br>
  Set Status
 
  <select name="status" class="form-control">
    <option>Select Status</option>
    <option>Incomplete</option>
    <option>Pending</option>
    <option>Complete</option>
  </select><br>
  <button style="position: auto; margin-left: 33%;" class="btn btn-primary" type="Submit"name="submit" onclick="set();">Submit</button>
</form>
 </dialog>
   
   <button style="margin-left: 33%;" class="btn btn-primary" onclick="printTable()">Print</button>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>