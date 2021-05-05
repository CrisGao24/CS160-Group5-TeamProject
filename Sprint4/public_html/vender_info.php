<?php
session_start();
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
$updated_points;
$user_address;

add_points();
//set_address();
add_activity();
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
                        <li class="nav-item active"><a class="nav-link" href="index.php"></span>Home</a></li>
                        
                    </ul>
                    
                    <form method="POST" action="vender_login.php" enctype="multipart/form-data">
                    <button type="submit" name="back" id="bacn">Back</button></form>
                

                </div>
            </div>
        </nav>
        <div  class="bodycontent">


            <div class="container">
            
                <div><label style="color:#8A2BE2;text-align:center;"><h1>Vender Information<br/></h1></label></div>
            
                <div><label for="address"><b>Your Activities:<br></b></label></div>
                <div><label for="psw">
_End;
                get_vender_activities();

                // echo $user_address;
                  echo<<<_e
                  </label></div>
                  
                <div><label for="address"><b>Your Points:
_e;
                echo " ".$updated_points."</br>";
                echo<<<_e2
                  </b></label></div>
                  <div>
                  <button type="button" onclick="document.getElementById('id06').style.display='block'" class="signupbtn">Add Activity</button></div>
                  <div>
                  <button onclick="document.getElementById('id07').style.display='block'" name="add_point_button" id="add_point_button" type="button" class="signupbtn">Delete Activity</button></div>


                  <link rel="stylesheet" href="login_style.css">
                  <link rel="stylesheet" type="text/css" href="login_style.css">
                </div>
                <div id="id06" class="modal">
                    <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="vender_info.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <h1>Add New Activity</h1>
                            <p>Please fill in this form to add a new activity.</p>
                            <hr>
                            <label for="name"><b>Activity Name</b></label>
                            <input type="text" placeholder="Enter activity name" name="new_name" required>
                            
                            <label for="image"><b>Activity Image</b></label>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="file" name="uploadfile" value="" required />
                            </form>
                            
                            
                            <div>
                            <label for="typee"><b>Activity Tpye: </b></label>
                            <select id="type" name="new_type">
                              <option value="sports">Sports</option>
                              <option value="arts">Arts</option>
                              <option value="entertainment">Entertainment</option>
                              <option value="personal learning">Personal Learning</option>
                            </select></div>
                            
                            <label for="maxAge"><b>Activity Max Age</b></label>
                            <input type="text" placeholder="Enter activity max age" name="new_maxAge">
                            
                            <label for="minAge"><b>Activity Min Age</b></label>
                            <input type="text" placeholder="Enter activity min age" name="new_minAge">
                            
                            <label for="cost"><b>Activity Cost</b></label>
                            <input type="text" placeholder="Enter activity cost" name="new_cost" required>
                            
                            <label for="street"><b>Street</b></label>
                            <input type="text" placeholder="Enter street" name="new_street" required>
                            
                            <label for="city"><b>City</b></label>
                            <input type="text" placeholder="Enter city" name="new_city" required>
                            
                            <label for="state"><b>State</b></label>
                            <input type="text" placeholder="Enter state" name="new_state" required>
                            
                            <label for="country"><b>Country</b></label>
                            <input type="text" placeholder="Enter country" name="new_country" required>
                            
                            <label for="zipcode"><b>Zipcode</b></label>
                            <input type="text" placeholder="Enter zipcode" name="new_zipcode" required>
                          
                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id06').style.display='none';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div id="id07" class="modal">
                    <span onclick="document.getElementById('id07').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="vender_info.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <h1>Delete Your Activity</h1>
                            <p>Please fill in this form to delete your activity.</p>
                            <hr>
                            <label for="street"><b>Activity Name</b></label>
                            <input type="text" placeholder="Enter the name of the activity you want to delete" name="delete_name" required>
                          
                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id07').style.display='none';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!--<div id="id08" class="modal">
                    <span onclick="document.getElementById('id08').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="vender_info.php" method="post" enctype="multipart/form-data">
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
_e2;

function delecte_activity()
{
    global $conn;
    if (isset($_POST['delete_name']))
    {

        $delete_name = get_post($conn, 'delete_name');
        
        $query1 = "SELECT * FROM Activity WHERE Name='$delete_name'";
    	$result2 = $conn->query($query1);
        $rows = $result2->num_rows;

        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $result2->data_seek($i);
            $row = $result2->fetch_array(MYSQLI_NUM);

            $delete_activityID = $row[0];

        }
        
        $query = "DELETE FROM Activity WHERE Name= '$delete_name'";
        $result = $conn->query($query);
        
        $query = "DELETE FROM ActivityAddress WHERE ActivityID= '$delete_activityID'";
        $result = $conn->query($query);
    }
}


function add_activity()
{
    global $conn;
    if (isset($_POST['new_name']) && isset($_FILES['uploadfile']) && isset($_POST['new_type']) && isset($_POST['new_cost']) && isset($_POST['new_street']) && isset($_POST['new_city']) && isset($_POST['new_state']) &&isset($_POST['new_country']) && isset($_POST['new_zipcode']))
    {
        if(isset($_POST['new_maxAge']))
        {
            $new_maxAge = get_post($conn, 'new_maxAge');
        }
        else
        {
            $new_maxAge = NULL;
        }
        
        if(isset($_POST['new_minAge']))
        {
            $new_minAge = get_post($conn, 'new_minAge');
        }
        else
        {
            $new_minAge = NULL;
        }
        
        $new_name = get_post($conn, 'new_name');
        $new_type = get_post($conn, 'new_type');
        $new_cost = get_post($conn, 'new_cost');
        $new_street = get_post($conn, 'new_street');
        $new_city = get_post($conn, 'new_city');
        $new_state = get_post($conn, 'new_state');
        $new_country = get_post($conn, 'new_country');
        $new_zipcode = get_post($conn, 'new_zipcode');
        
        $filename = $_FILES['uploadfile']['name'];
        $tempname = $_FILES['uploadfile']['tmp_name']; 
        $folder = "images/".$filename;
        
        $query = "INSERT INTO Activity VALUES" .
        "(NULL, '$_SESSION[VenderID]','$new_name','$new_type', '$new_maxAge', '$new_minAge', '$new_cost', '$filename')";
    	$result = $conn->query($query);
    	
    	if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    	
    	$query1 = "SELECT * FROM Activity WHERE VenderID='$_SESSION[VenderID]'";
    	$result2 = $conn->query($query1);
        $rows = $result2->num_rows;

        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $result2->data_seek($i);
            $row = $result2->fetch_array(MYSQLI_NUM);

            $new_activityID = $row[0];

        }
       
    	
    	$query = "INSERT INTO ActivityAddress VALUES" .
    		"('$new_activityID','$new_country','$new_state', '$new_city', '$new_street', '$new_zipcode')";
    	    $result = $conn->query($query);
    	
    }
    
}

function get_vender_activities()
{
    global $conn;
    
    $query = "SELECT * FROM Activity WHERE VenderID = '$_SESSION[VenderID]'";
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
            
            
            echo "Activity ".$i."<br>";
            
            echo "<img src= images/".$image." width=200 height=250> <br>";
            
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



function set_address()
{
    global $conn;
    
    $query2 = "SELECT * FROM UserAddress WHERE UserID= '$_SESSION[VenderID]'";
    
    $result2 = $conn->query($query2);
    
    if (!$result2)
    {

        if (isset($_POST['user_street']) && isset($_POST['user_city']) && isset($_POST['user_state']) &&isset($_POST['user_country']) && isset($_POST['user_zipcode']))
        {
            $user_street = get_post($conn, 'user_street');
            $user_city = get_post($conn, 'user_city');
            $user_state = get_post($conn, 'user_state');
            $user_country = get_post($conn, 'user_country');
            $user_zipcode = get_post($conn, 'user_zipcode');
            
            $query = "INSERT INTO UserAddress VALUES" .
    		"('$_SESSION[VenderID]','$user_country','$user_state', '$user_city', '$user_street', '$user_zipcode')";
    	    $result = $conn->query($query);
            
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
    $query2 = "SELECT * FROM VenderAddress WHERE VenderID= '$_SESSION[VenderID]'";
    
    $result = $conn->query($query2);
    if (!$result)
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
    $updated_points = $_SESSION['Vender_Points'];
    if (isset($_POST['user_points']))
    {
        $user_points = get_post($conn, 'user_points');

        $query1 = "SELECT * FROM Vender WHERE VenderID='$_SESSION[VenderID]'";

        $result = $conn->query($query1);

        $rows = $result->num_rows;

        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $result->data_seek($i);
            $row = $result->fetch_array(MYSQLI_NUM);

            $points = $row[5];

        }
       

        $updated_points = $user_points + $points;
        $query = "UPDATE Vender SET Points = '$updated_points' WHERE UserID = '$_SESSION[VenderID]'";

        $result = $conn->query($query);

    }
    
}


function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}


?>

