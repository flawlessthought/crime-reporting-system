<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:headlogin.php");
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    // mysqli_select_db($conn,"crime_portal");
    
    $query="select id,name,crime from mostwanted";
    $result=mysqli_query($conn,$query); 


     if(isset($_POST['s2']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $pid=$_POST['pid'];
            
            $q1=mysqli_query($conn,"delete from mostwanted where id='$pid'");
            
        }
    }  
    ?>
    
	<title>Head View Police Station</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


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
        <li><a href="official_login.php">Official Login</a></li>
           
        <li><a href="headlogin.php">Head Login</a></li>
        <li class="active"><a href="head_view_police_station.php">HQ Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="headHome.php">View Complaints</a></li>
        <li class="active" ><a href="head_view_police_station.php">Police Station</a></li>
           <li class="active" ><a href="viewmissingperson.php">Missing Person</a></li>
            <li class="active" ><a href="viewmostwanted.php">Most Wanted Person</a></li>
        <li><a href="h_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
   
 
    <div  style="margin-left: 45%; margin-top: 10%;">
     
   <a href="mostwanted.php" class="btn btn-primary">Add Most Wanted Person</a>
 </div>
    
<div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Most Wanted Person Id</th>
        <th scope="col">Most Wanted person Name</th>
        <th scope="col">Crime</th>
      </tr>
    </thead>
<!-- 
<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?>  -->

    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['id']; ?></td>
        <td><?php echo $rows['name']; ?></td>       
        <td><?php echo $rows['crime']; ?></td>      
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
 </div>

<dialog open style="background-color: lightblue;">
<form  action="" method="post">
  
  Most Wanted Person Id
  <input class="form-control" type="text" name="pid" placeholder="Person Id"><br>
  <button style="position: auto; margin-left: 33%;" class="btn btn-danger" type="Submit"name="s2" id="ciid" onfocusout="f1()" required>Delete</button><br><br>
  
</form>
 </dialog>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <script>
     function f1()
        {
          
            var sta2=document.getElementById("ciid").value;
            var x2=sta2.indexOf(' ');
            if(sta2!="" && x2>=0){
            document.getElementById("ciid").value="";
            alert("Blank Field not Allowed");
        }
        
       }
    </script>
</body>
</html>