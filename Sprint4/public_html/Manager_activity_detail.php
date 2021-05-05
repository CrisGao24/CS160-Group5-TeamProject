<?php

session_start();
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
delecte_activity();

echo <<<_End

<html>
    <script>
        function submitform(){
            document.getElementById("id07").submit();
        }
    </script>
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
                    
                     <label style="color:white">Welcome, Admin: 
_End;
                    echo $_SESSION['User_Email'];
echo <<<_Endd
                    </label>
         
                    
                     
                    <div>
                    <button onclick="document.getElementById('id07').style.display='block'" name="add_point_button" id="add_point_button" type="button" class="signupbtn">Delete Activity</button></div>
                    
                    <form method="POST" action="logout.php">
                    <button type="submit" name="user_logout" id="user_logout">Log out</button></form>
                    
                    
                    <form method="POST" action="manager_login.php">
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
        
        
        <div id="id07" class="modal">
                    <span onclick="document.getElementById('id07').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="Manager_activity_detail.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <h1>Delete Activity</h1>
                            <p>Please fill in this form to delete activity.</p>
                            <hr>
                            <label for="street"><b>Activity ID</b></label>
                            <input type="text" placeholder="Enter the ID of the activity you want to delete" name="delete_ID" required>
                          
                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id07').style.display='none';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!--<div id="id08" class="modal">
                    <span onclick="document.getElementById('id08').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="Manager_activity_detail.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <h1>Confirm the deletion</h1>

                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id08').style.display='none';" class="cancelbtn">No</button>
                            <button type="button" onclick="document.getElementById('id08').style.display='none';submitform();" name="signup">Yes</button>
                            </div>
                        </div>
                    </form>
                </div>-->
                
                

	</body>
</html>

_Endd;


get_activities();

function logout()
{
    session_destroy();
}

function delecte_activity()
{
    global $conn;
    if (isset($_POST['delete_ID']))
    {

        $delete_ID = get_post($conn, 'delete_ID');
        
        
        $query = "DELETE FROM Activity WHERE ActivityID= '$delete_ID'";
        $result = $conn->query($query);
        
        $query = "DELETE FROM ActivityAddress WHERE ActivityID= '$delete_ID'";
        $result = $conn->query($query);
    }
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
                            <h5 style='color:SlateBlue; display:inline;'>Activity ID: </h5>
                            <h5 style='color:Violet; display:inline;'>$activityID</h2><br>
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

?>
                    