<div id="skrollr-body">
    <div class='col-xs-12 col-md-12 col-sm-12 col-lg-12' id='dnb_primary' data-0="top:0px;" data-40="top:-140px;">
        <nav>
            <ul>
                <li class='col-sm-3 col-md-2 col-xs-3 pull-left'>
                    <span id='dnb_logo'>
                        <p><b>Students&nbsp;</b>Portal</p>
                    </span>
                </li>
                <li class='col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-2 col-md-6'>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn1 btn-default" type="button">Go</button>
                        </span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </li>

            </ul>
        </nav>
    </div>
    <div id = 'dnb_sec' class='dnb_secondary col-md-12 col-xs-12 col-sm-12 col-lg-12'>
        <nav>
            <span class='col-md-3 col-sm-3 col-xs-10'>
                <div class='btn2 col-xs-11 col-md-12 col-sm-12 cursor' onclick = "wec();" id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">
                    Information Portal
                </div>
            </span>
			<ul class='col-md-6 col-sm-7'>
                <li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
                    <div class="btn2 dropdown" >
                        <a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Hostels<span class="caret"></span>
                        </a> 
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <?php
        					$query= "SELECT * FROM hostel_list";
        					$result= mysql_query($query);
        					while($hostel= mysql_fetch_array($result))
    						{
    						  $hostel_0= explode("_",$hostel['hostel_name']);
        						$hostel_1= implode(" ",$hostel_0);
        						$hostel_id= $hostel['hostel_id'];
        						echo "<li><a href='../hostel/hostel.php?id=$hostel_id'>".$hostel_1."</a></li>";
        					}
        				    ?>
                        </ul>
                    </div>
                </li>
                <li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
                    <div class="btn2 dropdown" >
                        <a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Messes<span class="caret"></span>
                        </a> 
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <?php
    							$query= "SELECT * FROM messes";
    							$result= mysql_query($query);
    							while($mess= mysql_fetch_array($result))    								
                                {
									$mess_6= explode("_",$mess['Mess']);
    								$mess_7= implode(" ",$mess_6);
    								$mess_id= $mess['ID'];
    								echo "<li><a href='../messes/messes.php?varname=$mess_id'>".$mess_7."</a></li>";
    							}
    						?>
                        </ul>
                    </div>
                </li>
				<li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
                    <div class="btn2 dropdown" >
                        <a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Eateries<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <?php
    						$query= "SELECT * FROM eateries";
    						$result= mysql_query($query);
    						while($eatery= mysql_fetch_array($result))
    						{
    							$eatery_0= explode("_",$eatery['Eatery']);
    							$eatery_1= implode(" ",$eatery_0);
    							$eatery_id= $eatery['ID'];
    							echo "<li><a href='../eateries/eateries.php?varname=$eatery_id'>".$eatery_1."</a></li>";
							}
						    ?>
                        </ul>
                    </div>
                </li>
				<li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
                    <div class="btn2 dropdown" >
                        <a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Others<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
    						<li><a href='../others/others.php?varname=1'>Travel</a></li>
    						<li><a href='../others/others.php?varname=2'>Xerox</a></li>
                        	<li><a href='../others/others.php?varname=3'>Giftshop</a></li>
							<li><a href='../others/others.php?varname=4'>Haircare</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="col-md-2 col-sm-2 hidden-xs dropdown pull-right">
                <a class="pull-right dropdown-toggle cursor" data-toggle="dropdown" href="#">
                    <span class="btn2 glyphicon glyphicon-user pull-right" data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" aria-hidden="true">
						<?php echo $_SESSION['username']; ?>
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