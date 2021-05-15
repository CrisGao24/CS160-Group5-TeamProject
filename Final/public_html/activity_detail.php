<?php

session_start();
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);

user_login();
vender_login();



if (!isset($_SESSION["User_Email"]))
{
    $user_page="activity_detail.php";
}
else
{
    if ($_SESSION["User_Email"] == "manager@gmail.com")
    {
        $user_page = "manager_login.php";
    }
    else
    {
        $user_page="Activity_user_detail.php";
    }
}

if (!isset($_SESSION['Vender_Email']))
{
    $vender_page = "activity_detail.php";
}
else
{
    $vender_page = 'Vender_activity_detail.php';
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
                    
                     
                    <link rel="stylesheet" href="login_style.css">
                    <link rel="stylesheet" type="text/css" href="login_style.css">
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
            <form class="modal-content" action="activity_detail.php" method="post">
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
            <form class="modal-content" action="activity_detail.php" method="post">
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

get_activities();

function logout()
{
    session_destroy();
}

function get_activities()
{
    global $conn;
    
    $query = "SELECT * FROM Activity WHERE ActivityID = '$_SESSION[ActivityID]'";
    
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
            $image = $row[7];
            $detail = $row[8];
            
            $activity = "Activity name: ".$name."<br>"."Activity type: ".$type."<br>"."Age: ".$minAge." - ".$maxAge."<br>"."Activity cost: ".$cost."<br>";
            
            
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
                    
                    $user_address = $user_street.", ".$user_city.", ".$user_state.", ".$user_country." ".$user_zipcode."<br><br>";
                }
            }
            
            echo "
                    <div class='row row-content align-items-center'>
                        <div class='col-4 col-sm-4 order-sm-last col-md-4'>
                            <img src= images/".$image." width=250 height=200> <br>
                        </div>
                        <div class='col-6 col-sm-6 order-sm-last col-md-6'>
                            <h2 style='background-color:Tomato;'>$name</h2>
                            <h5 style='color:SlateBlue; display:inline;'>Type: </h5>
                            <h5 style='color:Violet; display:inline;'>$type</h5><br>
                            <h5 style='color:SlateBlue; display:inline;'>Age: </h5>
                            <h5 style='color:Violet; display:inline;'>$minAge - $maxAge years old</h5><br>
                            <h5 style='color:SlateBlue; display:inline;'>Cost: </h5>
                            <h5 style='color:Violet; display:inline;'>$cost</h5><br>
                            <h5 style='color:SlateBlue; display:inline;'>Address: </h5>
                            <h5 style='color:Violet; display:inline;'>$user_address</h5><br>
                            <h3 style='color:SlateBlue; display:inline;'>Introduction: </h5><br>
                            <h4 style='color:Orange; display:inline; font-family=cursive;'>$detail</h4>
                        </div>
                    </div>
                    ";
        }
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
            
            


            header('Location: User_activity_detail.php');
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
            header('Location: Vender_activity_detail.php');
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


?>
                    