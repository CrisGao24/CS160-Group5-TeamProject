<?php

session_start();

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error)
    die(error("Sorry, a error showed."));
    
setActivityID();
// if(isset($_POST['user_logout'])) { 
//     logout();
// } 


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
                    
                    <label style="color:white">Welcome, 
_End;
                    echo $_SESSION['User_Email'];
echo <<<_Endd
                    </label>
                    
                    <form method="POST" action="user_info.php">
                    <button name="user_info" id="user_info">My info</button></form>
                     
                    
                    <form method="POST" action="logout.php">
                    <button type="submit" name="user_logout" id="user_logout">Log out</button></form>
                     
                                    
                    <link rel="stylesheet" href="login_style.css">
                    <link rel="stylesheet" type="text/css" href="login_style.css">
            </div>
        </nav>
        
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
        
        <div class="row row-content align-items-center">
            <form class="col-12 col-sm-12 order-sm-last col-md-12" action='user_login.php' method="post" name="act">
                <button type="submit" class="btn btn-primary button-style" name="act1" value="Submit">
                    <img src="images/basketball.jpg" height="200" width="250" name="basketball">
                </button>
                <button type="submit" class="btn btn-primary button-style" name="act2" value="Submit">
                    <img src="images/painting.jpeg" height="200" width="250" name="painting">
                </button>
                <button type="submit" class="btn btn-primary button-style" name="act3" value="Submit">
                    <img src="images/drama.jpeg" height="200" width="250" name="swimming">
                </button>
                <button type="submit" class="btn btn-primary button-style" name="act4" value="Submit">
                    <img src="images/Tennis.jpeg" height="200" width="250" name="Tennis">
                </button>
            </form>
            
        </div>
        
        <div class="row row-content">
           <div class="col-12">
              <h3>Choose What You Want</h3>
           </div>
            <div class="col-12 col-md-9">
                <form action="user_login.php" method="post">
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

_Endd;

$number = searchActivities();

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
        
        echo $query;
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
                                <form class='col-3 col-sm-3 order-sm-last col-md-3' action='user_login.php' method='post' name='searchAct'>
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
                header('location: User_activity_detail.php', true,  301 );  exit;
            }
            
        }
    }
    
        
    if(isset($_POST['act1'])){
        $_SESSION['ActivityID'] = 8;
        header('location: User_activity_detail.php', true,  301 );  exit;
    }
    if(isset($_POST['act2'])){
        $_SESSION['ActivityID'] = 15;
        header('location: User_activity_detail.php', true,  301 );  exit;
    }
    if(isset($_POST['act3'])){
        $_SESSION['ActivityID'] = 16;
        header('location: User_activity_detail.php', true,  301 );  exit;
    }
    if(isset($_POST['act4'])){
        $_SESSION['ActivityID'] = 37;
        header('location: User_activity_detail.php', true,  301 );  exit;
    }

        
    
    
    
}


?>
                    