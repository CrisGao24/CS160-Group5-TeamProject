<?php

session_start();
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
//changeActivity();


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

if ($_SESSION['ActivityID'] == -1)
{
    $come_back = 'index.php';
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
                    
                     <label style="color:white">Welcome, 
_End;
                    echo $_SESSION['User_Email'];
echo <<<_Endd
                    </label>
         
                    <form method="POST" action="user_info.php">
                    <button name="user_info" id="vender_info">My info</button></form>
                     
                    
                    <form method="POST" action="logout.php">
                    <button type="submit" name="user_logout" id="user_logout">Log out</button></form>
                    
                    
                    <form method="POST" action="User_activity_detail.php">
                    <button type="submit" name="act_back" id="act_back">Back
                    </button></form>
            
                     
                    <link rel="stylesheet" href="login_style.css">
                    <link rel="stylesheet" type="text/css" href="login_style.css">
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

_Endd;

register_activity();


function register_activity()
{
    global $conn;
    
    if (isset($_POST['pay']))
    {
        	
        	$query = "INSERT INTO ActivityAppointment VALUES" .
        		"('$_SESSION[ActivityID]','$_SESSION[UserID]','$_SESSION[date]', '$_SESSION[time]', '$_SESSION[nofp]')";
        	$result = $conn->query($query);
        	if (!$result) echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";
        	
        	$query2 = "UPDATE Users SET Points = '$_SESSION[total_price]' WHERE UserID = '$_SESSION[UserID]'";
        	
        	$query3 = "SELECT * FROM Activity WHERE ActivityID = '$_SESSION[ActivityID]'";
        
            $result3 = $conn->query($query3);
            if (!$result3)
                die (error());
                
            $rows = $result3->num_rows;
            
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $result->data_seek($i);
                $row = $result->fetch_array(MYSQLI_NUM);
                
                $venderID = $row[1];
            }
        	
        	$query4 = "UPDATE Vender SET Points = '$_SESSION[total_price]' WHERE VenderID = '$venderID'";
        	
        echo <<<_End3
        <html>
            <body>
                <form method="post" action="payment.php">
                    <div class="container">
                        <h1>Thank you for your order!</h1>
                        
                        <div class="clearfix">
                         <button type="button" onclick = "window.location.href='User_activity_detail.php';" class="login">Back</button>
                        </div>
            
                        <link rel="stylesheet" href="login_style.css">
                        <link rel="stylesheet" type="text/css" href="login_style.css">
                    </div>
                </form>
            </body>
        </html>
_End3;

    }
    else if(isset($_POST['date']) && isset($_POST['time']) && isset($_POST['nofp']))
    {
        $_SESSION['date'] = get_post($conn, 'date');
        $_SESSION['time'] = get_post($conn, 'time');
        $_SESSION['nofp'] = get_post($conn, 'nofp');
        
        $query = "SELECT * FROM Activity WHERE ActivityID = '$_SESSION[ActivityID]'";
        
        $result = $conn->query($query);
        if (!$result)
            die (error());
            
        $rows = $result->num_rows;
        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $result->data_seek($i);
            $row = $result->fetch_array(MYSQLI_NUM);
            
            $cost = $row[6];
        }
        $nofp = get_post($conn, 'nofp');
        
        $query2 = "SELECT * FROM Users WHERE Email = '$_SESSION[User_Email]'";
        
        $result2 = $conn->query($query2);
        if (!$result2)
            die (error());
            
        $rows = $result2->num_rows;
        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $result->data_seek($i);
            $row = $result->fetch_array(MYSQLI_NUM);
            
            $points = $row[4];
        }
        
        echo <<<_End2
        <html>
            <body>
            <form method="post" action="payment.php">
            <div class="container"><h1>
_End2;
        $total_price = $cost * $nofp;
        $_SESSION['total_price'] = $total_price;
        echo "Total price: ".$total_price."<br>";
        echo "Your points: ".$points;
        
        if ($points < $total_price)
        {
            echo <<<_End5
                <br><br><br>Please prepaid points first.
                </h1>
                    
                    <div class="clearfix">
                        <button type="button" onclick = "window.location.href='User_activity_detail.php';" class="cancelbtn">Back</button>
                    </div>
                    
                    
                    <link rel="stylesheet" href="login_style.css">
                    <link rel="stylesheet" type="text/css" href="login_style.css">
                    </div>
                    </form>
                </body>
            </html>
_End5;
        }
        else
        {
            echo <<<_Endddd
                    </h1>
                    
                    <div class="clearfix">
                        <button type="button" onclick = "window.location.href='User_activity_detail.php';" class="cancelbtn">Cancel</button>
                        <button type="submit" class="login" name="pay">Confirm and Pay</button>
                    </div>
                    
                    
                    <link rel="stylesheet" href="login_style.css">
                    <link rel="stylesheet" type="text/css" href="login_style.css">
                    </div>
                    </form>
                </body>
            </html>
_Endddd;
        }
    }
    else
    {
        echo <<<_Enddd
            <html>
                </body>
                <form method="post" action="payment.php">
                        <div class="container">
                          <h1>Register Activity</h1>
                          <span>
                          <p>Please fill in this form to make an appointment of activity.</p></span>
                          <hr>
                          <label for="datee"><b>Date</b></label>
                          <input type="text" placeholder="Enter the date you want YYYY-MM-DD" name="date" required>
                          
                          <div>
                            <label for="timee"><b>Choose time: </b></label>
                            <select id="time" name="time">
                              <option value="10:00">10:00</option>
                              <option value="10:30">10:30</option>
                              <option value="11:00">11:00</option>
                              <option value="11:30">11:30</option>
                              <option value="12:00">12:00</option>
                              <option value="12:30">12:30</option>
                              <option value="13:00">13:00</option>
                              <option value="13:30">13:30</option>
                              <option value="14:00">14:00</option>
                              <option value="14:30">14:30</option>
                              <option value="15:00">15:00</option>
                              <option value="15:30">15:30</option>
                              <option value="16:00">16:00</option>
                              <option value="16:30">16:30</option>
                              <option value="17:00">17:00</option>
                              <option value="17:30">17:30</option>
                            </select></div>
                    
                          <label for="psw"><b>Number of People</b></label>
                          <input type="text" placeholder="Enter the number of people" name="nofp" required>
                    
                          <div class="clearfix">
                            <button type="button" onclick = "window.location.href='User_activity_detail.php';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="login" name="confirm">Confirm</button>
                          </div>
                          <link rel="stylesheet" href="login_style.css">
                          <link rel="stylesheet" type="text/css" href="login_style.css">
                    </div>
                    </form>
                </body>     
            
            </html>
            
            
_Enddd;
    }
}

function logout()
{
    session_destroy();
}


function changeActivity()
{
    if(isset($_POST["act_back"])){
        $_SESSION['ActivityID'] = -1;
    }
    
}

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}

?>
                    