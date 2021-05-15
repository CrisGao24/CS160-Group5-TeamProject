<?php
session_start();
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);

set_password();
set_points();
lockVender();
unlockVender();
deleteVender();
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
                    
                    <form method="POST" action="manager_login.php">
                    <button type="submit" name="back" id="back">Back</button></form>
                

                </div>
            </div>
        </nav>
        <div  class="bodycontent">


            <div class="container">
            
                <div><label style="color:#8A2BE2;text-align:center;"><h1>Vender Information<br/></h1></label></div>
_End;
                
                $query = "SELECT * FROM Vender";
                
                $result = $conn->query($query);
                if (!$result)
                {
                    echo "No vender";
                }
                else
                {
                    $rows = $result->num_rows;
  
                    for ($i = 0 ; $i < $rows ; ++$i)
                    {
                        $result->data_seek($i);
                        $row = $result->fetch_array(MYSQLI_NUM);
                        
                        $userID = $row[0];
                        $email= $row[1];
                        $pwd = $row[2];
                        $firstname = $row[3];
                        $lastname = $row[4];
                        $points = $row[5];
                        $lockStatus = "";
                        
                        if($row[9] == 0)
                            $lockStatus = "Unlocked";
                        else
                            $lockStatus = "Locked!";
                            
                        echo "<br><br>";
                        echo "VenderID: ".$userID."<br>";
                        echo "First Name: ".$firstname."<br>";
                        echo "Last Name: ".$lastname."<br>";
                        echo "Email: ".$email."<br>";
                        echo "Password: ".$pwd."<br>";
                        echo "Points: ".$points."<br>";
                        echo "Status: ".$lockStatus."<br>";
                
                    }
                    

                    
                }
                
                
                echo<<<_e2

                  <div>
                  <button type="button" onclick="document.getElementById('id07').style.display='block'" class="signupbtn">Set Points</button></div>
                  <div>
                  <button onclick="document.getElementById('id06').style.display='block'" name="set_pw_button" id="set_pw_button" type="button" class="signupbtn">Set Password</button></div>
                  <div>
                  <button type="button" onclick="document.getElementById('id08').style.display='block'" class="signupbtn">Lock Vender</button></div>
                  
                  <div>
                  <button type="button" onclick="document.getElementById('id09').style.display='block'" class="signupbtn">Unlock Vender</button></div>
                  
                  <button type="button" onclick="document.getElementById('id10').style.display='block'" class="signupbtn">Delete Vender</button></div>


                  <link rel="stylesheet" href="login_style.css">
                  <link rel="stylesheet" type="text/css" href="login_style.css">
                </div>
                <div id="id06" class="modal">
                    <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="vender_manage.php" method="post" name="setPassword">
                        <div class="container">
                            <h1>Set Password</h1>
                            <p>Please fill in this form to set vender's password<p>
                            <hr>
                            <label for="userID1"><b>The userID for the person you want to change</b></label>
                            <input type="text" placeholder="Enter venderID" name="userID1" required>
                            
                            <label for="password"><b>What password you want to set</b></label>
                            <input type="text" placeholder="Enter password" name="userPwd" required>
                            
                            <label for="RePassword"><b>Repeat the password</b></label>
                            <input type="text" placeholder="Repeat password" name="RePwd" required>
                            
                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id06').style.display='none';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div id="id07" class="modal">
                    <span onclick="document.getElementById('id07').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="vender_manage.php" method="post" name="setPoinst">
                        <div class="container">
                            <h1>Set Vender's Points</h1>
                            <p>Please fill in this form to set vender's points.</p>
                            <hr>
                            <label for="userID2"><b>The userID for the person you want to change</b></label>
                            <input type="text" placeholder="Enter venderID" name="userID2" required>
                            
                            <label for="point"><b>Points</b></label>
                            <input type="text" placeholder="Enter points" name="user_points" required>
                            
                            <label for="confirm"><b>Confirm the points you want to set</b></label>
                            <input type="text" placeholder="Enter points again" name="confirm_points" required>
                            
                          
                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id07').style.display='none';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div id="id08" class="modal">
                    <span onclick="document.getElementById('id08').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="vender_manage.php" method="post" name="setPassword">
                        <div class="container">
                            <h1>Lock Vender</h1>
                            <p>Please fill in this form to lock vender<p>
                            <hr>
                            <label for="userID3"><b>The userID for the person you want to lock</b></label>
                            <input type="text" placeholder="Enter venderID" name="userID3" required>
                            
                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id08').style.display='none';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div id="id09" class="modal">
                    <span onclick="document.getElementById('id09').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="vender_manage.php" method="post" name="unlocVender">
                        <div class="container">
                            <h1>Unlock Vender</h1>
                            <p>Please fill in this form to unlock vender<p>
                            <hr>
                            <label for="userID4"><b>The venderID for the person you want to unlock</b></label>
                            <input type="text" placeholder="Enter venderID" name="userID4" required>
                            
                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id09').style.display='none';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div id="id10" class="modal">
                    <span onclick="document.getElementById('id10').style.display='none'" class="close" title="Close Modal">X</span>
                    <form class="modal-content" action="vender_manage.php" method="post" name="deleteVender">
                        <div class="container">
                            <h1>Delete Vender</h1>
                            <p>Please fill in this form to delete vender<p>
                            <hr>
                            <label for="userID5"><b>The venderID for the person you want to delete</b></label>
                            <input type="text" placeholder="Enter venderID" name="userID5" required>
                            
                            <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id10').style.display='none';" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
        
    </body>
</html>
_e2;

function set_points(){
    
    global $conn;
    
    if(isset($_POST['userID2']) && isset($_POST['user_points']) && isset($_POST['confirm_points'])){
        $userID = get_post($conn, 'userID2');
        $points = get_post($conn, 'user_points');
        $RePoints = get_post($conn, 'confirm_points');
        
        if($points != $RePoints)
            echo "Points don't match! Please enter again!";
        else{
           
            $query = "SELECT * FROM Vender WHERE VenderID= '$userID'";
            $result = $conn->query($query);
            echo $userID;
            if(!$result)
                echo "No such a user!";
            else{
                $query2 = "UPDATE Vender SET Points = '$points' WHERE VenderID = '$userID'";
                $result2 = $conn->query($query2);
            }
        }
    }
    
}

function set_password(){
    
    global $conn;
    
    if(isset($_POST['userID1']) && isset($_POST['userPwd']) && isset($_POST['RePwd'])){
        $userID = get_post($conn, 'userID1');
        $pwd = get_post($conn, 'userPwd');
        $rePwd = get_post($conn, 'RePwd');
        if($pwd != $rePwd)
            echo "Password don't match! Please enter again!";
        else{
            
            $query = "SELECT * FROM Vender WHERE VenderID= '$userID'";
            $result = $conn->query($query);
            
            if(!$result)
                echo "No such a user!";
            else{
                $query2 = "UPDATE Vender SET Password = '$pwd' WHERE VenderID= '$userID'";
                $result2 = $conn->query($query2);
            }
        }
    }
    
}


function lockVender(){
    
    global $conn;
    
    if(isset($_POST['userID3'])){
        
        $userID = get_post($conn, 'userID3');
        
        $query = "SELECT * FROM Vender WHERE VenderID= '$userID'";
        $result = $conn->query($query);
            
        if(!$result)
            echo "No such a user!";
        else{
            $query2 = "UPDATE Vender SET lockVender = 1 WHERE VenderID= '$userID'";
            $result2 = $conn->query($query2);
        }
    }
    
}

function unlockVender(){
    
    global $conn;
    
    if(isset($_POST['userID4'])){
        
        $userID = get_post($conn, 'userID4');
        
        $query = "SELECT * FROM Vender WHERE VenderID= '$userID'";
        $result = $conn->query($query);
            
        if(!$result)
            echo "No such a user!";
        else{
            $query2 = "UPDATE Vender SET lockVender = 0 WHERE VenderID= '$userID'";
            $result2 = $conn->query($query2);
        }
    }
    
}

function deleteVender(){
    
    global $conn;
    
    if(isset($_POST['userID5'])){
        
        $userID = get_post($conn, 'userID5');
        
        $query = "SELECT * FROM Vender WHERE VenderID= '$userID'";
        $result = $conn->query($query);
            
        if(!$result)
            echo "No such a user!";
        else{
            $query2 = "DELETE from Vender WHERE VenderID= '$userID'";
            $result2 = $conn->query($query2);
        }
    }
    
}

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}

?>