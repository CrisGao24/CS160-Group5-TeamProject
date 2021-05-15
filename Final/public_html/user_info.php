<?php
session_start();
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
$updated_points;
$user_address;

add_points();
set_address();

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
                        <li class="nav-item active"><a class="nav-link" href="index.php"></span>Home</a></li>
                       
                    </ul>
                    
                    <form method="POST" action="user_login.php">
                    <button type="submit" name="back" id="bacn">Back</button></form>
                

                </div>
            </div>
        </nav>
        <div  class="bodycontent">


            <div class="container">
            
                <div><label style="color:#8A2BE2;text-align:center;"><h1>User Information<br/></h1></label></div>
            
                <div><label for="address"><b>Your Address:<br></b></label></div>
                <div><label for="psw">
_End;
                get_user_address();
                echo $user_address;
                  echo<<<_e
                  </label></div>
                  
                <div><label for="address"><b>Your Points:
_e;
                echo " ".$_SESSION['Points']."</br>";
                
                $query5 = "SELECT * FROM ActivityAppointment WHERE UserID= '$_SESSION[UserID]'";
                
                $result = $conn->query($query5);
                if (!$result)
                {
                    echo "No Appointment";
                }
                else
                {
                    $rows = $result->num_rows;
  
                    for ($i = 0 ; $i < $rows ; ++$i)
                    {
                        $result->data_seek($i);
                        $row = $result->fetch_array(MYSQLI_NUM);
                        
                        $activityID = $row[0];
                        $date = $row[2];
                        $time = $row[3];
                        $nofp = $row[4];
                        
                        $query6 = "SELECT * FROM Activity WHERE ActivityID= '$activityID'";
                        $result2 = $conn->query($query6);
                        $rows2 = $result2->num_rows;
      
                        for ($j = 0 ; $j < $rows2 ; ++$j)
                        {
                            $result2->data_seek($j);
                            $row2 = $result2->fetch_array(MYSQLI_NUM);
                            
                            $activity_name = $row2[2];
                        }
                        
                        $t = $i + 1;
                        echo "<br><br>";
                        echo "Appointment".$t."<br>";
                        echo "Activity: ".$activity_name."<br>";
                        echo "Date: ".$date."<br>";
                        echo "Time: ".$time."<br>";
                        echo "Number of people: ".$nofp."<br>";
                        // echo "
                        // <div class='col-12 col-sm-6 order-sm-last col-md-6'>
                        //     <h5 style='color:SlateBlue; display:inline;'>Activity: </h5>
                        //     <h5 style='color:Violet; display:inline;'>$t</h5><br>
                        //     <h5 style='color:SlateBlue; display:inline;'>Activity: </h5>
                        //     <h5 style='color:Violet; display:inline;'>$activity_name</h5><br>
                        //     <h5 style='color:SlateBlue; display:inline;'>Date: </h5>
                        //     <h5 style='color:Violet; display:inline;'>$date</h5><br>
                        //     <h5 style='color:SlateBlue; display:inline;'>Time: </h5>
                        //     <h5 style='color:Violet; display:inline;'>$time</h5><br>
                        //     <h3 style='color:SlateBlue; display:inline;'>Number of people: </h5><br>
                        //     <h4 style='color:Orange; display:inline; font-family=cursive;'>$nofp</h4>
                        // </div>
                        // ";
                
                    }
                    

                    
                }
                
                
                echo<<<_e2
                  </b></label></div>
                  <div>
                  <button type="button" onclick="document.getElementById('id07').style.display='block'" class="signupbtn">Update Address</button></div>
                  <div>
                  <button onclick="document.getElementById('id06').style.display='block'" name="add_point_button" id="add_point_button" type="button" class="signupbtn">Add Points</button></div>


                  <link rel="stylesheet" href="login_style.css">
                  <link rel="stylesheet" type="text/css" href="login_style.css">
                </div>
                <div id="id06" class="modal">
                    <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="user_info.php" method="post">
                        <div class="container">
                            <h1>Add Prepaid-Points</h1>
                            <p>Please fill in this form to add prepaid-points.</p>
                            <hr>
                            <label for="firstnm"><b>How much points you want add.</b></label>
                            <input type="text" placeholder="Enter points" name="user_points" required>
                          
                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id06').style.display='none';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Pay</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div id="id07" class="modal">
                    <span onclick="document.getElementById('id07').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="user_info.php" method="post">
                        <div class="container">
                            <h1>Update Your Address</h1>
                            <p>Please fill in this form to set or update your address.</p>
                            <hr>
                            <label for="street"><b>Street</b></label>
                            <input type="text" placeholder="Enter street" name="user_street" required>
                            
                            <label for="city"><b>City</b></label>
                            <input type="text" placeholder="Enter city" name="user_city" required>
                            
                            <label for="state"><b>State</b></label>
                            <input type="text" placeholder="Enter state" name="user_state" required>
                            
                            <label for="country"><b>Country</b></label>
                            <input type="text" placeholder="Enter country" name="user_country" required>
                            
                            <label for="zipcode"><b>Zipcode</b></label>
                            <input type="text" placeholder="Enter zipcode" name="user_zipcode" required>
                          
                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id07').style.display='none';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
    </body>
</html>
_e2;



function set_address()
{
    global $conn;
    
    $query2 = "SELECT * FROM UserAddress WHERE UserID= '$_SESSION[UserID]'";
    
    $result2 = $conn->query($query2);
    
    if (!mysqli_num_rows($result2))
    {

        if (isset($_POST['user_street']) && isset($_POST['user_city']) && isset($_POST['user_state']) &&isset($_POST['user_country']) && isset($_POST['user_zipcode']))
        {
            $user_street = get_post($conn, 'user_street');
            $user_city = get_post($conn, 'user_city');
            $user_state = get_post($conn, 'user_state');
            $user_country = get_post($conn, 'user_country');
            $user_zipcode = get_post($conn, 'user_zipcode');
            
            $query = "INSERT INTO UserAddress VALUES" .
    		"('$_SESSION[UserID]','$user_country','$user_state', '$user_city', '$user_street', '$user_zipcode')";
    	    $result = $conn->query($query);
    	   // if(!$result)
    	   // {
    	   //     echo "insert failed";
    	   // }
            
        }
    }
    else
    {
        if (isset($_POST['user_street']) && isset($_POST['user_city']) && isset($_POST['user_state']) &&isset($_POST['user_country']) && isset($_POST['user_zipcode']))
        {
            $user_street = get_post($conn, 'user_street');
            $user_city = get_post($conn, 'user_city');
            $user_state = get_post($conn, 'user_state');
            $user_country = get_post($conn, 'user_country');
            $user_zipcode = get_post($conn, 'user_zipcode');
            
            $query = "UPDATE UserAddress SET Country = '$user_country', State = '$user_state', City = '$user_city', Street ='$user_street', Zipcode = '$user_zipcode' WHERE UserID = '$_SESSION[UserID]'";

            $result = $conn->query($query);
            $user_address = $user_street.", ".$user_city.", ".$user_state.", ".$user_country." ".$user_zipcode."<br>";
        }
    }
}

function get_user_address()
{
    global $conn;
    global $user_address;
    $query2 = "SELECT * FROM UserAddress WHERE UserID= '$_SESSION[UserID]'";
    
    $result = $conn->query($query2);
    if (!mysqli_num_rows($result))
    {
        echo "No Address";
    }
    else
    {
        
        $rows = $result->num_rows;
        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $result->data_seek($i);
            $row = $result->fetch_array(MYSQLI_NUM);
            
            $user_country = $row[1];
            $user_state = $row[2];
            $user_city = $row[3];
            $user_street = $row[4];
            $user_zipcode = $row[5];
            
            $user_address = $user_street.", ".$user_city.", ".$user_state.", ".$user_country." ".$user_zipcode."<br>";
        }
    }

}


function add_points()
{
    global $conn;
    $points = 0;
    global $updated_points; 
    $updated_points = $_SESSION['Points'];
    if (isset($_POST['user_points']))
    {
        $user_points = get_post($conn, 'user_points');

        $query1 = "SELECT * FROM Users WHERE UserID='$_SESSION[UserID]'";

        $result = $conn->query($query1);

        $rows = $result->num_rows;

        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $result->data_seek($i);
            $row = $result->fetch_array(MYSQLI_NUM);

            $points = $row[5];

        }
       

        $updated_points = $user_points + $points;
        $_SESSION['Points'] = $updated_points;
        $query = "UPDATE Users SET Points = '$updated_points' WHERE UserID = '$_SESSION[UserID]'";

        $result = $conn->query($query);

    }
    
}


function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}

?>