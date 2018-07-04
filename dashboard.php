<?php
    require_once("appLoginCheck.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UDUS Hostel Portal Dashboard</title>
<link href="library/w3.css" type="text/css" rel="stylesheet"/>
<link href="library/fa/css/font-awesome.min.css" rel="stylesheet"/>
<link href="dashboard.css" type="text/css" rel="stylesheet"/>
<script src="library/jQuery/jquery.js" type="text/javascript"></script>
</head>

<body>
	<section class="wrapper" id="wrapper">
    		<div class="w3-sidebar w3-animate-left w3-bar-block w3-mobile">
            	<a href="dashboard.php" class="w3-bar-item w3-mobile w3-text-white w3-center">
                	<b class="fa fa-3x fa-dashboard"></b> 
                    <p class="w3-center">Dashboard</p>
                </a>
                <a href="#" onclick="$('#main').load('booking.php');"  class="w3-bar-item w3-mobile w3-text-white w3-center">
                	<b class="fa fa-3x fa-pencil"></b> 
                    <p class="w3-center">Apply now</p>
                </a>
                <a href="" class="w3-bar-item w3-mobile w3-text-white w3-center">
                	<b class="fa fa-3x fa-money"></b> 
                    <p class="w3-center">My Payment</p>
                </a>
                <a href="" class="w3-bar-item w3-mobile w3-text-white w3-center">
                	<b class="fa fa-3x fa-home"></b> 
                    <p class="w3-center">Allocation</p>
                </a>
            </div>
            
            
            <div class="w3-mobile container w3-bar-block w3-animate-right w3-white w3-right">
            		<div class="w3-card w3-bar w3-padding-24 w3-light-green">
                    	<div class="w3-threequarter w3-mobile">
                    		<a href="#" class="toggler"><i class="fa fa-2x fa-bars w3-text-white w3-light-green"></i> </a>
                        </div>
                        <div class="w3-quarter w3-mobile w3-right-align">
                        		
                                <div class="w3-dropdown-hover w3-right w3-light-green">
                                    <a href="#"><i class="fa fa-2x fa-user w3-text-white"></i> <i class="fa fa-caret-down w3-text-white"></i></a>
                                    <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom">
                                                <a href="#" class="w3-bar-item"><i class="fa fa-user"></i> My profile</a>
                                                <a href="logout.php" class="w3-bar-item"><i class="fa fa-sign-out"></i> Log out</a>
                                    </div>
                                </div>
                	    </div>  
                    </div>
                   	
                     <div class="w3-container w3-status-card">
                        
                            <a href="#">
                                <div class="w3-quarter w3-card-2 w3-hover-shadow w3-mobile"> 
                                    <h3 class="w3-center">Application</h3>
                                    <div class="w3-center"><i class="fa fa-2x fa-times w3-text-red"></i></div>
                                    <h4 class="w3-center">
                                        Pending!
                                    </h4>
                                    <br/>
                                </div>
                            </a>
                            <a href="#">
                                <div class="w3-quarter w3-card-2 w3-hover-shadow w3-mobile"> 
                                    <h3 class="w3-center">Hostel Approved</h3>
                                    <div class="w3-center"><i class="fa fa-2x fa-home w3-text-green"></i></div>
                                    <h4 class="w3-center">
                                        AC20
                                    </h4>
                                    <br/>
                                </div>
                            </a>
                            
                            <a href="#">
                                <div class="w3-quarter w3-card-2 w3-hover-shadow w3-mobile"> 
                                    <h3 class="w3-center">Hostel Booked</h3>
                                    <div class="w3-center"><i class="fa fa-2x fa-home w3-text-red"></i></div>
                                    <h4 class="w3-center">
                                        AC23
                                    </h4>
                                    <br/>
                                </div>
                            </a>
                            <a href="#">
                                <div class="w3-quarter w3-card-2 w3-hover-shadow w3-mobile"> 
                                    <h3 class="w3-center">Payment</h3>
                                    <div class="w3-center"><i class="fa fa-2x fa-times w3-text-red"></i></div>
                                    <h4 class="w3-center">
                                        Pending!
                                    </h4>
                                    <br/>
                                </div>
                            </a>
                    </div>
                    <div class="w3-container w3-enrollments">
                            <div class="w3-card-2 w3-mobile">
                             <div id="main">
                                
                            </div>
                            </div>
                    </div>
            </div>
            
    </section>
    
    <script src="library/appjs/app.js"></script>
</body>
</html>