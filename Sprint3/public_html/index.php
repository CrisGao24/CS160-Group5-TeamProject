<?php

session_start();
//session_regenerate_id(true);

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error)
    die(error("Sorry, a error showed."));
    
function error($err)
{
    echo $err;
}


user_login();
vender_login();
addUser();
addVender();



if (!isset($_SESSION["User_Email"]))
{
    $user_page="index.php";
}
else
{

    $user_page="user_login.php";
}

if (!isset($_SESSION['Vender_Email']))
{
    $vender_page = "index.php";
}
else
{
    $vender_page = 'vender_login.php';
}








echo <<<_End

<html>
	<head>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="background.css">
        <link rel="stylesheet" href="styles.css">
        
        <title>Smart City Recreation</title>
	</head>
	

	
	<body>
	    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto" href="#"><img src="images/activity.png" height="41" width="60"></a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="#"></span>Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="./#"></span>About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#"></span>Activity</a></li>
                        <li class="nav-item"><a class="nav-link" href="./#"></span>Contact</a></li>
                    </ul>

                    <button onclick="document.getElementById('id03').style.display='block'" name="vender_login_button" id="vender_login_button" '>Vender Login</button>
                    <!-- Button to open the modal -->

                    <button onclick="document.getElementById('id01').style.display='block'" name="loginButton" id="loginButton" '>User Login</button>
                    
                </div>
            </div>
        </nav>
        
        <script>
            function hide_user_login_button() {
              document.getElementById("loginButton").style.visibility = 'hidden';
            }
        </script>
        
        <script>
            function hide_vender_login_button() {
              document.getElementById("vender_login_button").style.visibility = 'hidden';
            }
        </script>
        
        <script>
            function display_user_info_button() {
              document.getElementById("user_info").style.visibility = 'visible';
            }
        </script>
        
        <script>
            function display_vender_info_button() {
              document.getElementById("vender_info").style.visibility = 'visible';
            }
        </script>
        
        <script>
        function popup() {
          var popup = document.getElementById("myPopup");
          popup.classList.toggle("show");
        }
        </script>
        
        
        
        <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-6">
                    <h1>Smart City Recreation </h1>
                    <p>In this website, you can discover more activities for you or for your family.</p>
                    <p>As a parent, you can prepay the activities for your kids.</p>
                    <p>As a kid, you can discover a new activity and ask your parents to pay for you.</p>
                </div>
                <div class="col-12 col-sm-3 align-self-center">
                  <img src="images/activity.png" class="img-fluid">
                </div>
            </div>
        </div>
        </header>
        
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-6 order-sm-last col-md-3">
                <img src="images/basketball.jpg" height="200" width="180" id="img">
            </div>
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <img src="images/badminton.png" height="200" width="180" >
            </div>
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <img src="images/ski.jpg" height="200" width="180" >
            </div>
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <img src="images/paddling.jpg" height="200" width="180" >
            </div>
        </div>
        
       <div class="row row-content">
           <div class="col-12">
              <h3>Choose What You Want</h3>
           </div>
            <div class="col-12 col-md-9">
                <form action="index.php" method="post">
                  <div class="form-group row">
                    <label for="Age" class="col-md-2 col-form-label">Age</label>
                      <div class="form-check col-md-2">	
                        <input type="checkbox" class="form-check-input" name='age[]' id="a1" value="preschool">
                   		    <label class="form-check-label" for="approve">
                    	<strong>Preschool</strong>
                   		</label>
                   	  </div>
                   	  <div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name='age[]' id="a2" value="10-12">
                   		<label class="form-check-label" for="approve">
                    	<strong>10-12</strong>
                   		</label>
                   	  </div>
                      <div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name='age[]' id="a3" value="13-18">
                   		<label class="form-check-label" for="approve">
                    	<strong>13-18</strong>
                   		</label>
                   	  </div>
                   	  <div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name='age[]' id="a4" value="adult">
                   		<label class="form-check-label" for="approve">
                    	<strong>Adult</strong>
                   		</label>
                   	  </div>
                   	  <div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name='age[]' id="a5" value="senior">
                   		<label class="form-check-label" for="approve">
                    	<strong>Senior</strong>
                   		</label>
                   	  </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="type" class="col-md-2 col-form-label">Type</label>
                    <div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name="type[]" id="t1" value="sports">
                   		<label class="form-check-label" for="approve">
                    	<strong>Sports</strong>
                   		</label>
                   	</div>
                   	<div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name="type[]" id="t2" value="arts">
                   		<label class="form-check-label" for="approve">
                    	<strong>Arts</strong>
                   		</label>
                   	</div>
                   	<div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name="type[]" id="t3" value="entertainment">
                   		<label class="form-check-label" for="approve">
                    	<strong>Entertainment</strong>
                   		</label>
                   	</div>
                   	<div class="form-check col-md-3">	
                    	<input type="checkbox" class="form-check-input" name="type[]" id="t4" value="personal-learning">
                   		<label class="form-check-label" for="approve">
                    	<strong>Personal Learning</strong>
                   		</label>
                   	</div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="distance" class="col-md-2 col-form-label">Distance</label>
                    <div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name="dist[]" id="d1" value="d1">
                   		<label class="form-check-label" for="approve">
                    	<strong>< 5 miles</strong>
                   		</label>
                   	</div>
                   	<div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name="dist[]" id="d2" value="d2">
                   		<label class="form-check-label" for="approve">
                    	<strong>5 - 15 miles</strong>
                   		</label>
                   	</div>
                   	<div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name="dist[]" id="d3" value="d3">
                   		<label class="form-check-label" for="approve">
                    	<strong>15 - 50 miles</strong>
                   		</label>
                   	</div>
                   	<div class="form-check col-md-3">	
                    	<input type="checkbox" class="form-check-input" name="dist[]" id="d4" value="d4">
                   		<label class="form-check-label" for="approve">
                    	<strong>> 50 miles</strong>
                   		</label>
                   	</div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="cost" class="col-md-2 col-form-label">Cost</label>
                    <div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name="cost[]" id="c1" value="c1">
                   		<label class="form-check-label" for="approve">
                    	<strong>Free</strong>
                   		</label>
                   	</div>
                   	<div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name="cost[]" id="c2" value="c2">
                   		<label class="form-check-label" for="approve">
                    	<strong>$0 - $10</strong>
                   		</label>
                   	</div>
                   	<div class="form-check col-md-2">	
                    	<input type="checkbox" class="form-check-input" name="cost[]" id="c3" value="c3">
                   		<label class="form-check-label" for="approve">
                    	<strong>$10 - $100</strong>
                   		</label>
                   	</div>
                   	<div class="form-check col-md-3">	
                    	<input type="checkbox" class="form-check-input" name="cost[]" id="c4" value="c4">
                   		<label class="form-check-label" for="approve">
                    	<strong>> $100</strong>
                   		</label>
                   	</div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="offset-md-2 col-md-10">
                      <button type="submit" class="btn btn-primary" name="search" value="Submit">
                        Search
                      </input>
                    </div>
                  </div>
                </form>
                
            </div>
             <div class="col-12 col-md">
            </div>
       </div>

	</body>
</html>

_End;



echo <<<_endd
            <!-- The Modal (contains the Sign Up form) -->
        <div id="id01" class="modal">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">X</span>
          <form class="modal-content" action= '$user_page' method="post">
            <div class="container">
              <h1>User Login </h1>
              <span>
              <p>Please fill in this form to login.</p></span>
              <hr>
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="uemail" required>
        
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="upsw" required>
        
              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
              </label>
              
               <p><a href="#" style="color:dodgerblue">Forget password?</a></p>
               <p><a href="#" style="color:dodgerblue" onclick="document.getElementById('id02').style.display='block'">Create a new account</a></p>
        
              <div class="clearfix">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="login">Login</button>
              </div>
              <link rel="stylesheet" href="login_style.css">
              <link rel="stylesheet" type="text/css" href="login_style.css">
            </div>
          </form>
        </div>
        
        
                    <!-- The Modal (contains the Sign Up form) -->
        <div id="id03" class="modal">
          <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">X</span>
          <form class="modal-content" action="$vender_page" method="post">
            <div class="container">
              <h1>Vender Login </h1>
              <span>
              <p>Please fill in this form to login.</p></span>
              <hr>
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="vender_login_email" required>
        
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="vender_login_psw" required>
        
              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
              </label>
              
               <p><a href="#" style="color:dodgerblue">Forget password?</a></p>
               <p><a href="#" style="color:dodgerblue" onclick="document.getElementById('id04').style.display='block'">Create a new account</a></p>
        
              <div class="clearfix">
                <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="login">Login</button>
              </div>
              <link rel="stylesheet" href="login_style.css">
              <link rel="stylesheet" type="text/css" href="login_style.css">
            </div>
          </form>
        </div>
_endd;


echo <<<_end
        <div id="id02" class="modal">
          <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">X</span>
            <form class="modal-content" action="index.php" method="post">
            <div class="container">
              <h1>User Sign Up</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>
              <label for="firstnm"><b>First Name</b></label>
              <input type="text" placeholder="Enter First Name" name="firstnm" required>
              
              <label for="lastnm"><b>Last Name</b></label>
              <input type="text" placeholder="Enter Last Name" name="lastnm" required>
              
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="email" required>
        
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" required>
        
              <label for="psw-repeat"><b>Repeat Password</b></label>
              <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
              
              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
              </label>
        
              <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
        
              <div class="clearfix">
                <button type="button" onclick="document.getElementById('id02').style.display='none';document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn" name="signup" >Sign Up</button>
              </div>
              <link rel="stylesheet" href="login_style.css">
              <link rel="stylesheet" type="text/css" href="login_style.css">
            </div>
          </form>
        </div>
        
                <div id="id04" class="modal">
          <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">X</span>
            <form class="modal-content" action="index.php" method="post">
            <div class="container">
              <h1>Vender Sign Up</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>
              <label for="firstnm"><b>First Name</b></label>
              <input type="text" placeholder="Enter First Name" name="vender_firstnm" required>
              
              <label for="lastnm"><b>Last Name</b></label>
              <input type="text" placeholder="Enter Last Name" name="vender_lastnm" required>
              
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="vender_email" required>
        
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="vender_psw" required>
        
              <label for="psw-repeat"><b>Repeat Password</b></label>
              <input type="password" placeholder="Repeat Password" name="vender_psw-repeat" required>
              
              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
              </label>
        
              <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
        
              <div class="clearfix">
                <button type="button" onclick="document.getElementById('id04').style.display='none';document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn" name="signup" >Sign Up</button>
              </div>
              <link rel="stylesheet" href="login_style.css">
              <link rel="stylesheet" type="text/css" href="login_style.css">
            </div>
          </form>
        </div>
_end;

searchActivities();

$query = "SELECT * FROM Users";
$result = $conn->query($query);
if (!$result)
    die (error("Database access failed."));
    
$rows = $result->num_rows;

for ($i = 0 ; $i < $rows ; ++$i)
{
    $result->data_seek($i);
    $row = $result->fetch_array(MYSQLI_NUM);
    
//     echo <<<_EEND
//     <pre>
//     Id $row[0]
//     Email $row[1]
//     Password $row[2]
//     Last Name $row[4]
//     First Name $row[3]
//     Points $row[5]
//     </pre>
// _EEND;
}



function addVender()
{
    global $conn;
    
    
    if (isset($_POST['vender_email']) && isset($_POST['vender_firstnm']) && isset($_POST['vender_lastnm']) && isset($_POST['vender_psw']))
    {

      	$vender_email = get_post($conn, 'vender_email');
    	$vender_firstnm = get_post($conn, 'vender_firstnm');
    	$vender_lastnm = get_post($conn, 'vender_lastnm');
    	$vender_psw = get_post($conn, 'vender_psw');
    	
    	$query = "INSERT INTO Vender VALUES" .
    		"(NULL,'$vender_email','$vender_psw', '$vender_firstnm', '$vender_lastnm', 0)";
    	$result = $conn->query($query);
    	if (!$result) echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";

    }
}

function addUser()
{
    global $conn;
    
    
    if (isset($_POST['email']) && isset($_POST['firstnm']) && isset($_POST['lastnm']) && isset($_POST['psw']))
    {

      	$uemail = get_post($conn, 'email');
    	$ufirstnm = get_post($conn, 'firstnm');
    	$ulastnm = get_post($conn, 'lastnm');
    	$upsw = get_post($conn, 'psw');
    	
    	$query = "INSERT INTO Users VALUES" .
    		"(NULL,'$uemail','$upsw', '$ufirstnm', '$ulastnm', 0)";
    	$result = $conn->query($query);
    	if (!$result) echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";

    }
}

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}

function user_login()
{
    global $conn;
    
    $log = TRUE;
    
     if (isset($_POST['uemail']) && isset($_POST['upsw']))
    {
    
        $pw = get_post($conn, 'upsw');    
        
        $email = get_post($conn, 'uemail');
        
        $query = "SELECT * FROM Users WHERE Email='$email'";
        
        $result = $conn->query($query);
        if (!$result)
            die (error());
            
            $rows = $result->num_rows;
            
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $result->data_seek($i);
                $row = $result->fetch_array(MYSQLI_NUM);
                
                $enteremail = $row[1];
                $enterpsw = $row[2];
                $userid = $row[0];
                $points = $row[5];
               
                
            }
            
    
         $_SESSION["Points"] = $points;
         
        if (get_post($conn, 'uemail') === $enteremail && get_post($conn, 'upsw') === $enterpsw)
        {
      
//            echo "Loggin successfully!";
            $_SESSION["UserID"] = $userid;
            $user_page = "user_login.php";
            $_SESSION["User_Email"] = $enteremail;
            $_SESSION["Check"] = true;
            
            


            header('Location: user_login.php');
            exit();
        }
        // else
        // {
        //     $php_page = "index.php";
        //     header('WWW-Authenticate: Basic realm="Restricted Section“');
        //     header('HTTP/1.0 401 Unauthorized');
        //     die("Invalid username / password combination");
        // }

    }
   
}

function add_points()
{
    global $conn;
    
    if (isset($_POST['user_points']))
    {
        $user_points = get_post($conn, 'user_points');
        
        $query1 = "SELECT * FROM User WHERE Email='$user_login_email'";
        
        $result = $conn->query($query1);
        if (!$result)
            die (error());
            
            $rows = $result->num_rows;
            
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $result->data_seek($i);
                $row = $result->fetch_array(MYSQLI_NUM);
                
                $points = $row[5];
            }
        $updated_points = $user_points + $points;
        $query = "UPDATE Users SET Points ="."'$updated_points'"." WHERE Email = "."'$user_login_email'";

    	$result = $conn->query($query1);
    	
    	if (!$result) echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";
    }
    
}

function vender_login()
{
    global $conn;
    
    $log = TRUE;
    
     if (isset($_POST['vender_login_email']) && isset($_POST['vender_login_psw']))
    {
    
        $vender_login_psw = get_post($conn, 'vender_login_psw');    
        
        $vender_login_email = get_post($conn, 'vender_login_email');
        
        $query = "SELECT * FROM Vender WHERE Email='$vender_login_email'";
        
        $result = $conn->query($query);
        if (!$result)
            die (error());
            
            $rows = $result->num_rows;
            
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $result->data_seek($i);
                $row = $result->fetch_array(MYSQLI_NUM);
                
                $enteremail = $row[1];
                $enterpsw = $row[2];
                $venderid = $row[0];
                $venderpt = $row[5];
                
            }
            
            $_SESSION["Vender_Points"] = $venderpt;
            
    
                
        if (get_post($conn, 'vender_login_email') === $enteremail && get_post($conn, 'vender_login_psw') === $enterpsw)
        {
            header('Location: vender_login.php');
            $_SESSION['VenderID'] = $venderid;
            $_SESSION['Vender_Email'] = $enteremail;

        }
        // else
        // {
        //     header('WWW-Authenticate: Basic realm="Restricted Section“');
        //     header('HTTP/1.0 401 Unauthorized');
        //     die("Invalid username / password combination");
        // }

    }
   
}

function searchActivities()
{
    global $conn;

    $ageLimit = False;
    $typeLimits = False;
    $limits = "";
    $query = "";
    
    if(isset($_POST['search'])){
        if(isset($_POST['age'])){
        
            $age = $_POST['age'];
        
            $query = "SELECT * FROM Activity WHERE (";
            $limits = $limits."AGE: <br>";
            for($i = 0; $i < count ( $age ); $i++){
                if($age[$i] == 'preschool'){
                    $query = $query." (MinAge < 10 AND MaxAge >= 0)";
                    $limits = $limits." Preschool";
                }
                if($age[$i] == '10-12'){
                    $query = $query." (MaxAge > 10 AND MinAge <= 12) ";
                    $limits = $limits." age from 10 to 12";
                }
                if($age[$i] == '13-18'){
                    $query = $query." (MaxAge > 12 AND MinAge <= 18) ";
                    $limits = $limits." age from 13 to 18";
                }
                if($age[$i] == 'adult'){
                    $query = $query." (MaxAge > 18 AND MinAge <= 55) ";
                    $limits = $limits." Adult";
                }
                if($age[$i] == 'senior'){
                    $query = $query." (MaxAge > 55 AND MinAge <= 80) ";
                    $limits = $limits." Senior";
                }
                if($i != count ( $age )-1){
                    $query = $query." OR ";
                    $limits = $limits." and ";
                }
                $ageLimit = True;
            }
        
            $query = $query.")";
            
            $limits = $limits."<br>";
        
        }
    
        if(isset($_POST['type'])){
        
            $type = $_POST['type'];
        
            if($ageLimit == False)
                $query = "SELECT * FROM Activity WHERE (";
            else
                $query = $query." AND (";
            
            $limits = $limits."TYPE: <br>";
        
            for($i = 0; $i < count ( $type ); $i++){
                if($i != count ( $type )-1)
                    $query = $query." type = '".$type[$i]."' OR ";
                else
                    $query = $query." type = '".$type[$i]."')";
            
                $limits = $limits.$type[$i]." ";
                $typeLimits = True;
            }
        
            $limits = $limits."<br>";
        
        }
    
    
        if(isset($_POST['cost'])){
        
            $cost = $_POST['cost'];
        
            if($ageLimit == False && $typeLimits == False)
                $query = "SELECT * FROM Activity WHERE (";
            else
                $query = $query." AND (";
        
            $limits = $limits."COST: <br>";
        
            for($i = 0; $i < count ( $cost ); $i++){
                if($cost[$i] == 'c1'){
                    $query = $query." Cost = 0 ";
                    $limits = $limits." free";
                }
                if($cost[$i] == 'c2'){
                    $query = $query." (Cost > 0 AND Cost <= 10) ";
                    $limits = $limits." cost from $0 to $10";
                }
                if($cost[$i] == 'c3'){
                    $query = $query." (Cost > 10 AND Cost <= 100) ";
                    $limits = $limits." cost from $10 to $100";
                }
                if($cost[$i] == 'c4'){
                    $query = $query." Cost > 100 ";
                    $limits = $limits." cost greater than $100";
                }
                if($i != count ( $cost )-1){
                    $query = $query." OR ";
                    $limits = $limits." and ";
                }
                
            }
            $query = $query.")";
        
            $limits = $limits."<br>";
        }
    
        $limits = "Your selections are: <br>".$limits."<br>";
    
        echo $limits;
        
        $result = $conn->query($query);
        
        if (!$result)
        {
            echo "No Activity";
        }
        else
        {
            $rows = $result->num_rows;
                    
            for ($i = 0 ; $i < $rows ; ++$i)
            {
    
                $result->data_seek($i);
                $row = $result->fetch_array(MYSQLI_NUM);
                
                $activityID = $row[0];
                $name = $row[2];
                $type = $row[3];
                $maxAge = $row[4];
                $minAge = $row[5];
                $cost = $row[6];
                

                $activity = "Activity name: ".$name."<br>"."Activity type: ".$type."<br>"."Age: ".$minAge." - ".$maxAge."<br>"."Activity cost: ".$cost."<br>";
                echo $activity;
            
            $query2 = "SELECT * FROM ActivityAddress WHERE ActivityID= '$activityID'";
    
                $result2 = $conn->query($query2);
                if (!$result2)
                {
                    echo "No Address";
                }
                else
                {
                
                    $rows2 = $result2->num_rows;
            
                    for ($j = 0 ; $j < $rows2 ; ++$j)
                    {
                        $result2->data_seek($j);
                        $row = $result2->fetch_array(MYSQLI_NUM);
                    
                        $user_country = $row[1];
                        $user_state = $row[2];
                        $user_city = $row[3];
                        $user_street = $row[4];
                        $user_zipcode = $row[5];
                    
                        $user_address = "Address: ".$user_street.", ".$user_city.", ".$user_state.", ".$user_country." ".$user_zipcode."<br><br>";
                        echo $user_address;
                    }
                }
            }
        }
    }
    
}
?>