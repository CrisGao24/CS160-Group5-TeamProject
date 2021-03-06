<?php

session_start();
//session_regenerate_id(true);

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error)
    die(error("Sorry, a error showed."));
    

setActivityID();


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
    if ($_SESSION["User_Email"] == "manager@gmail.com")
    {
        $user_page = "manager_login.php";
    }
    else
    {
        $user_page="user_login.php";
    }
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
                    </ul>

                    <button onclick="document.getElementById('id03').style.display='block'" name="vender_login_button" id="vender_login_button" '>Vender Login</button>
                    <!-- Button to open the modal -->

                    <button onclick="document.getElementById('id01').style.display='block'" name="loginButton" id="loginButton" '>User Login</button>
                    
                     <button type="button" onclick = "window.location.href='index.php';" name="act_back" id="act_back">Back</button>
        
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
        
        <script>
        function setAct1()
        {
            setActivityID1();
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
        
        <div class='row row-content align-items-center'>
            <div class='col-12 col-sm-12 order-sm-last col-md-12'>

                <h5 style='color:SlateBlue; display:inline; text-align:center;'>You are lock! Please connect to the administration!</h5><br>
                <h5 style='color:SlateBlue; display:inline;'>Administration phone: </h5>
                <h5 style='color:Brown; display:inline;'>925-699-0706</h5><br>
                <h5 style='color:SlateBlue; display:inline;'>Administration email: </h5>
                <h5 style='color:Brown; display:inline;'>manager@gmail.com</h5><br>
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

$number = searchActivities();


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
    	$salt1 = rand(0, 1000);
    	$salt2 = rand(0, 1000);
    	$vender_hash = hash('ripemd128', "$salt1$vender_psw$salt2");
    	
    	$query = "INSERT INTO Vender VALUES" .
    		"(NULL,'$vender_email','$vender_psw', '$vender_firstnm', '$vender_lastnm', 0, '$salt1', '$salt2', '$vender_hash')";
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
    	$salt1 = rand(0, 1000);
    	$salt2 = rand(0, 1000);
    	$user_hash = hash('ripemd128', "$salt1$upsw$salt2");
    	
    	$query = "INSERT INTO Users VALUES" .
    		"(NULL,'$uemail','$upsw', '$ufirstnm', '$ulastnm', 0, '$salt1', '$salt2', '$user_hash')";
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
		        $salt1 = $row[6];
		        $salt2 = $row[7];
		        $hash = $row[8];
                $hashs = hash('ripemd128', "$salt1$enterpsw$salt2");
                
            }
            
    
         $_SESSION["Points"] = $points;
         
        if (get_post($conn, 'uemail') === $enteremail && get_post($conn, 'upsw') === $enterpsw && $hash === $hashs)
        {
      
//            echo "Loggin successfully!";
            $_SESSION["UserID"] = $userid;
            
            // $user_page = "user_login.php";
            $_SESSION["User_Email"] = $enteremail;
            $_SESSION["Check"] = true;
            if($enteremail == "manager@gmail.com")
                header('Location:  manager_login.php');
            else
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
                $salt1 = $row[6];
		        $salt2 = $row[7];
		        $hash = $row[8];
                $hashs = hash('ripemd128', "$salt1$enterpsw$salt2");
                $lockStatus = $row[9];
                
            }
            
            $_SESSION["Vender_Points"] = $venderpt;
            
        if($lockStatus == 1)
            header('Location: lock.php');
        else{
            
            if (get_post($conn, 'vender_login_email') === $enteremail && get_post($conn, 'vender_login_psw') === $enterpsw && $hash === $hashs)
            {
                header('Location: vender_login.php');
                $_SESSION['VenderID'] = $venderid;
                $_SESSION['Vender_Email'] = $enteremail;

            }
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
    global $number;
    $ageLimit = False;
    $typeLimits = False;
    $costLimits = False;
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
                    $limits = $limits." 10 - 12";
                }
                if($age[$i] == '13-18'){
                    $query = $query." (MaxAge > 12 AND MinAge <= 18) ";
                    $limits = $limits." 13 - 18";
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
                    $limits = $limits.",";
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
                if($i != count ( $type )-1){
                    $limits = $limits.$type[$i].", ";
                    $query = $query." type = '".$type[$i]."' OR ";
                }
                else{
                    $query = $query." type = '".$type[$i]."')";
                    $limits = $limits.$type[$i]." ";
                }

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
                    $costLimits = True;
                }
                if($cost[$i] == 'c2'){
                    $query = $query." (Cost > 0 AND Cost <= 10) ";
                    $limits = $limits." $0 - $10";
                    $costLimits = True;
                }
                if($cost[$i] == 'c3'){
                    $query = $query." (Cost > 10 AND Cost <= 100) ";
                    $limits = $limits." $10 - $100";
                    $costLimits = True;
                }
                if($cost[$i] == 'c4'){
                    $query = $query." Cost > 100 ";
                    $limits = $limits." > $100";
                    $costLimits = True;
                }
                if($i != count ( $cost )-1){
                    $query = $query." OR ";
                    $limits = $limits." , ";
                }
                
            }
            $query = $query.")";
        
            $limits = $limits."<br>";
        }
    
        $limits = "Your selections are: <br>".$limits."<br>";
        
        echo "
            <div class='row row-content align-items-center'>
                <div class='col-12 col-sm-12 order-sm-last col-md-12'>
                    <strong>$limits</strong>
                </div>
            </div>
            ";
        
        if($ageLimit == False & $typeLimits == False & $costLimits == False)
            $query = "select * from Activity";
            
        $result = $conn->query($query);
        
        if (!$result)
        {
            echo "No Activity";
        }
        else
        {
            $rows = $result->num_rows;
        
            $count = 0;
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
                $image = $row[7];
                $number = $activityID;
                
                $activity = "Activity name: ".$name."<br>"."Activity type: ".$type."<br>"."Age: ".$minAge." - ".$maxAge."<br>"."Activity cost: ".$cost."<br>";
                
                
                $query2 = "SELECT * FROM ActivityAddress WHERE ActivityID= '$activityID'";
    
    
                $user_address ="";
                
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
                    }
                    
                    echo "
                        <div class='row row-content align-items-center'>
                            <div class='col-12 col-sm-12 order-sm-last col-md-12'>
                                <form class='col-3 col-sm-3 order-sm-last col-md-3' action='index.php' method='post' name='searchAct'>
                                    <button type='submit' class='btn btn-primary button-style' name='$activityID' value='Submit'>
                                        <img src=images/$image height='200' width='250'>
                                    </button>
                                </form>
                                    <div class='col-6 col-sm-6 order-sm-last col-md-6'>
                                        <strong>$activity</strong>
                                        <strong>$user_address</strong>
                                    </div>
                                
                            </div>
                        </div>  
                    ";
                    
                    
                }
                
            }
        }
    }
    
    return $number;
    
}

$_SESSION['number'] = $number;

function setActivityID()
{
    global $number;

    if(isset($_SESSION['number'])){
        for($i = 0; $i <= $_SESSION['number']; $i++){

            if(isset($_POST[$i])){
                $_SESSION['ActivityID'] = $i;
                header('location: activity_detail.php', true,  301 );  exit;
            }
            
        }
    }
    
        
    if(isset($_POST['act1'])){
        $_SESSION['ActivityID'] = 8;
        header('location: activity_detail.php', true,  301 );  exit;
    }
    if(isset($_POST['act2'])){
        $_SESSION['ActivityID'] = 15;
        header('location: activity_detail.php', true,  301 );  exit;
    }
    if(isset($_POST['act3'])){
        $_SESSION['ActivityID'] = 16;
        header('location: activity_detail.php', true,  301 );  exit;
    }
    if(isset($_POST['act4'])){
        $_SESSION['ActivityID'] = 37;
        header('location: activity_detail.php', true,  301 );  exit;
    }

        
    
    
    
}



?>