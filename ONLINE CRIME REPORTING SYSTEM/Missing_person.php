<!DOCTYPE html>
<html>
<head>
	<title>missing person log </title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
	
  <?php
  $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
     mysqli_select_db($con, "crime_portal");
  if(isset($_POST['s'])){
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $p_name=$_POST['incharge_name'];
        $p_id=$_POST['incharge_id'];
        $spec=$_POST['date'];
        $location=$_POST['location'];
        $p_pass=$_POST['password'];

    $reg="INSERT INTO `missing_person`(`id`, `name`, `location`, `date`, `password`) VALUES ('$p_id','$p_name','$location','$spec','$p_pass')";
    
        $res=mysqli_query($con,$reg);
        if(!$res)
         {
          $message = "User already Exists.";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else
        {
          $message = "Missing Person Added Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}
  ?>
<script>
     function f1()
        {
         var sta=document.getElementById("station").value;
         var sta1=document.getElementById("iname").value;
         var sta2=document.getElementById("iid").value;
         var sta3=document.getElementById("pas").value;
         var x=sta.trim();
         var x2=sta2.indexOf(' ');
         var x1=sta1.trim();
         var x3=sta3.indexOf(' ');
 if(sta!="" && x==""){
    document.getElementById("station").value="";
    document.getElementById("station").focus();
      alert("Space Not Allowed");
        }
        
         else if(sta1!="" && x1==""){
    document.getElementById("iname").value="";
    document.getElementById("iname").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("iid").value="";
    document.getElementById("iid").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("pas").focus();
      alert("Space Not Allowed");
        }
      }
</script>
</head>

<body style="background-size: cover;
    background-image: url(home_bg1.jpeg);
    background-position: center;">
	<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Home</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="official_login.php">HQ Login</a></li>
        <li><a href="headHome.php">HQ Home</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="police_station_add.php">Log Missing Person</a></li>
      <li> <a href="h_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">
			<br><br>
			<div class="login-form"><p>
                <h2>Log Missing Person</h2><br>
      <form  method="post" style="color: gray">Last Location of Missing person
          <input type="text"  name="location" placeholder="Missing Person Location" required="" id="station" onfocusout="f1()"/>
    Missing Person Name
					<input type="text"  name="incharge_name" placeholder="Missing Person Name" required="" id="iname" onfocusout="f1()"/>
					Missing Person Id<input type="text"  name="incharge_id" placeholder="Missing Person Id" required="" id="iid" onfocusout="f1()"/>
					<br>
          Date Of Crime:  
            <input style="background-color: #313131;color: white" type="date" name="date" required/>
          <br>
          Password<input type="text"  name="password" placeholder="Password" required="" id="pas" onfocusout="f1()"/>
					<input type="submit" value="Submit" name="s">
          <br>
          <a href="viewmissingperson.php" class="btn btn-primary">View Added Missing Person</a>
				</form>	
			</div>	
		</div>
	</div>	
</div>	
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>