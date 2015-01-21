
<!DOCTYPE HTML>
<html>
    <!-- To change the color of the secondary navbar make the changes at the following locations:
        1. Change the rgb values of the site color below (Line 32)
        2. Change the rgb values of the site color in 'dnb_bootstrap.css'
Note: A Sass implementation can make this easier. Please look into that if you can
-->
    <head>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/dnb.css">  
        <style>
            #dnb_sec {
                -skrollr-animation-name:animation1;
            }

            @-skrollr-keyframes animation1 {
                0 {
                    margin-top:0px;
                    position:relative;
                    
                    <!--Site Color -->
                    background-color:rgba(230, 126, 34,1);
                    <!--Site Color-->
                }

                top {
                    margin-top:0px;
                    position:fixed;
                    background-color:rgba(255, 255, 255,0.99);
                }
            }
            
       </style>
    </head>
    
    <body>
        <div id="skrollr-body">
            
            <div class='col-xs-12' id='dnb_primary' data-0="top:0px;" data-40="top:-140px;">
                <nav>
                    <ul>
                        <li class='col-xs-5 col-md-3 pull-left'>
                            <span class='col-xs-12' id='dnb_logo'>
                                <p><b>Students&nbsp;</b>Portal</p>
                            </span>
                        </li>
                        

                        
                        <li class='col-xs-5 col-md-6'>
                            <div class="input-group col-xs-12">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go</button>
                                </span>
                                
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </li>

                    </ul>
                </nav>
            </div>
            
            <div id = 'dnb_sec' class='dnb_secondary col-xs-12'>
                <nav>
                    <span class='col-xs-2'><div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">
                        Information<b>&nbsp;Portal</b>&nbsp;</div>
                    </span>
					<span class='col-xs-2 dropdown'><div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" data-toggle="dropdown">
                        <b>Hostels &nbsp; </b>&nbsp;<span class="caret"></span>
                    </div>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <?php
								$query= "SELECT * FROM hostel_list";
								$result= mysql_query($query);
								while($hostel= mysql_fetch_array($result))
									{
										$hostel_0= explode("_",$hostel['Hostel_Name']);
										$hostel_1= implode(" ",$hostel_0);
										$hostel_id= $hostel['Hostel_id'];
										echo "<li><a href='hostel.php?id=$hostel_id'>".$hostel_1."</a></li>";
									}
							?>
                        </ul></span>
					<span class='col-xs-2 dropdown'><div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" data-toggle="dropdown">
                        <b>Eateries &nbsp; </b>&nbsp;<span class="caret"></span>
                    </div>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <?php
								$query= "SELECT * FROM eateries";
								$result= mysql_query($query);
								while($eatery= mysql_fetch_array($result))
									{
										$eatery_0= explode("_",$eatery['Eatery']);
										$eatery_1= implode(" ",$eatery_0);
										$eatery_id= $eatery['ID'];
										echo "<li><a href='eateries.php?varname=$eatery_id'>".$eatery_1."</a></li>";
									}
							?>
                        </ul></span>
                    <div class="hidden-sm hidden-xs col-md-2 dropdown pull-right">
                        <a class="pull-right dropdown-toggle col-xs-12" data-toggle="dropdown" href="#">
                            <span class="col-xs-12 btn2 glyphicon glyphicon-user pull-right" data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" aria-hidden="true">
                                <?php $_SESSION['username']; ?>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Settings</a></li>
							<li><a href="../includes/signout.php">Sign Out</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        </div>
    
    <script type="text/javascript" src="js/skrollr.stylesheets.js"></script>
    <script type="text/javascript" src="js/skrollr.js"></script>
    <script type="text/javascript">skrollr.init();</script>
    </body>
</html>