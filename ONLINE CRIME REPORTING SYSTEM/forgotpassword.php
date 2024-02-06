<html>  
<head> 
<link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">
        function Validate() {
            var password = document.getElementById("pass").value;
            var confirmPassword = document.getElementById("repass").value;
            if (password != confirmPassword) {
                document.getElementById("lblpass").innerText="Passwords do not match.";
                return false;
            }
            return true;
        }
    </script>
<title>    
</title>  
</head>  
<body style="color: black;background-image: url(OIP.jpg);background-size: 100%;background-repeat: no-repeat;back">
    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
     
      <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="official_login.php">Official Login</a></li>
        <li class="active"><a href="headlogin.php">HQ Login</a></li>
      </ul>
    
    </div>
  </div>
 </nav>
    <header>
    <div class="content-width">
        

    </div>
</header>
<dialog open style="margin-top: 150px">

    <h2><u>"Recover Password"</u></h2>  
<br>  
<br>  
<form action="" method="post">
Email id <input type="email" name="email" class="form-control" id="email" placeholder="Email" required="">
<br>
<br> 
	New Password:  
<input type="Password" id="pass" name="pass" value=""> <br>   
<br> <br>  
Re-type New password:  
<input type="Password" id="repass" name="repass" value="">
 <br> <br> 
 <label id="lblpass" style="color:red"></label><br>
 <br>
<input type="Submit" name="submit" value="Change" onclick="return Validate()"/>  

</form>
<?php
$db=mysqli_connect("localhost","root","","crime_portal");
        if(isset($_POST['submit']))
        {
            if(mysqli_query($db,"UPDATE head SET h_pass='$_POST[pass]' WHERE h_id='$_POST[email]' ;"))
            {
                ?>
                    <script type="text/javascript">
                alert("The Password Updated Successfully.");
              </script> 

                <?php
            }
            
        }
    ?> 
<button class="btn btn-light" type="submit" name="submit"style="color: white; font-weight: bolder; "><a href="headlogin.php">Continue</a>
    <button class="btn btn-light" type="submit" name="submit"style="color: white; font-weight: bolder;margin-left: 190px; "><a href="headlogin.php">Back</a>
    </dialog>
</body>
</html>