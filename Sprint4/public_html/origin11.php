<?php

echo <<<_END

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
                    <span class="navbar-text">
                        <a id="loginButton">
                            Login
                        <img src="images/login.jpg" height="41" width="41"></a>
                    </span>
                </div>
            </div>
        </nav>
        
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
                <img src="images/basketball.jpg" height="200" width="180">
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
        
        <h2 style="color: midnightblue;">Choose What You WANT: </h2>
        <table>
            <colgroup>
                <col span="1" style="width: 50;">
                <col span="1" style="width: 100;">
                <col span="1" style="width: 200;">
                <col span="1" style="width: 200;">
                <col span="1" style="width: 200;">
                <col span="1" style="width: 200;">
                <col span="1" style="width: 200;">
            </colgroup>
            
            <tr>
                <td></td>
                <td>
                    <label for="age">Age</label>
                </td>
                <td>
                	<div class="form-check">	
                    	<input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                   		<label class="form-check-label" for="approve">
                    	<strong>Preschool</strong>
                   		</label>
                   	</div>
               	</td>
               	<td>
              	 	<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>10-12</strong>
                       	</label>
                	</div>
               	</td>
               	<td>
               		<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>13-18</strong>
                       	</label>
                  	</div>
               	</td>
               	<td>
               		<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>Adult</strong>
                       	</label>
                	</div>
               	</td>
               	<td>
               		<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>Senior</strong>
                       	</label>
                	</div>
               	</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <label for="type">Type</label>
                </td>
                <td>
                	<div class="form-check">	
                    	<input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                   		<label class="form-check-label" for="approve">
                    	<strong>Sports</strong>
                   		</label>
                   	</div>
               	</td>
               	<td>
              	 	<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>Arts</strong>
                       	</label>
                	</div>
               	</td>
               	<td>
               		<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>Entertainment</strong>
                       	</label>
                  	</div>
               	</td>
               	<td>
               		<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>Personal Learning</strong>
                       	</label>
                	</div>
               	</td>
            </tr>
            
            <tr>
                <td></td>
                <td>
                    <label for="distance">Distance</label>
                </td>
                <td>
                	<div class="form-check">	
                    	<input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                   		<label class="form-check-label" for="approve">
                    	<strong>< 5 mile</strong>
                   		</label>
                   	</div>
               	</td>
               	<td>
              	 	<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>5 - 12 mile</strong>
                       	</label>
                	</div>
               	</td>
               	<td>
               		<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>15 - 50 mile</strong>
                       	</label>
                  	</div>
               	</td>
               	<td>
               		<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>> 50 mile</strong>
                       	</label>
                	</div>
               	</td>
            </tr>
            
            <tr>
                <td></td>
                <td>
                    <label for="cost">Cost</label>
                </td>
                <td>
                	<div class="form-check">	
                    	<input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                   		<label class="form-check-label" for="approve">
                    	<strong>Free</strong>
                   		</label>
                   	</div>
               	</td>
               	<td>
              	 	<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>$0 - $10</strong>
                       	</label>
                	</div>
               	</td>
               	<td>
               		<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>$10 - $100</strong>
                       	</label>
                  	</div>
               	</td>
               	<td>
               		<div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                       	<label class="form-check-label" for="approve">
                        <strong>> $100</strong>
                       	</label>
                	</div>
               	</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <input type="button" name="search" id="search" value="search">
                </td>
            </tr>
            	
        </table>

	</body>
</html>



_END;

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error)
    die(error("Sorry, a error showed."));
    
function error($err)
{
    echo $err;
}
    
$query = "SELECT * FROM users";
$result = $conn->query($query);
if (!$result)
    die (error("Database access failed."));
    
$rows = $result->num_rows;

for ($i = 0 ; $i < $rows ; ++$i)
{
    $result->data_seek($i);
    $row = $result->fetch_array(MYSQLI_NUM);
    
    echo <<<_EEND
    <pre>
    Id $row[0]
    Last Name $row[1]
    First Name $row[2]
    Occupation $row[3]
    </pre>
_EEND;
}

?>