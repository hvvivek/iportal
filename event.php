<?php
	session_start();
	require 'config.php';
	$hostel=$_GET['hostel'];
	$conn = mysql_connect($host,$username,$password);
	mysql_select_db("i-portal");
	$sql1="SELECT * FROM hostel_list WHERE hostel_id='{$hostel}'";
	$data1=mysql_query($sql1);
	$row=mysql_fetch_assoc($data1);
	$name=$row["hostel_name"];
	$lat=$row["lat"];
	$lng=$row["long"];
	require 'partials/footer.php';
	$a= $_SERVER['DOCUMENT_ROOT'];
	echo $a;
?>
<html>
 <head>
    <meta chaset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $name;?> hostel</title>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="hostel/css/hostel.css"/>
    <link rel="stylesheet" type="text/css" href="css/ferro.css"/>
    <link rel="stylesheet" type="text/css" href="css/wheelmenu.css"/>
    <link rel="stylesheet" type="text/css" href="css/dnb.css" /> 
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/jquery.wheelmenu.js"></script>
    <script src="js/dynamicpage.js" type="text/javascript"></script>
    <script type='text/javascript' src='js/jquery.ba-hashchange.min.js'></script>
    <script src="js/ferro.js" type="text/javascript"></script>
<style>
#comment_section{display: none;}
            #dnb_sec {
                -skrollr-animation-name:animation1;
            }
            @-skrollr-keyframes animation1 {
                0 {
                    margin-top:0px;
                    position:relative;
                    
                    <!--Site Color -->
                    background-color:rgba(26, 188, 156,1.0);
                    <!--Site Color-->
                }
                top {
                    margin-top:0px;
                    position:fixed;
                    background-color:rgba(255, 255, 255,0.99);
                }
            }

           .container
            {

            }
</style>
    <div style="display:none">
      <table class="table table-striped table-bordered" style="margin-top:50px" id="myTable">
        <tr>
          <th>lat</th>
          <th>lng</th>
          <th>name</th>
        </tr>
        <?php
          echo "<tr>";
          echo "<th>". $lat ."</th>";
          echo "<th>". $lng ."</th>";
          echo "<th>". $name ."</th>";
          echo "</tr>";
          echo "</table>";
        ?>
    </div>
    <script type= "text/javascript">
      var lat = parseFloat(document.getElementById('myTable').rows[1].cells[0].innerHTML);
      var lng = parseFloat(document.getElementById('myTable').rows[1].cells[1].innerHTML);
      var name = document.getElementById('myTable').rows[1].cells[2].innerHTML;
      var myCenter=new google.maps.LatLng(lat,lng);
      var map;
      function initialize()
      {
        var mapProp = {
      center:myCenter,
      zoom:15,
      mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      map=new google.maps.Map(document.getElementById("googleMap1"),mapProp);
      var marker=new google.maps.Marker({
        position:myCenter,
      });   
      google.maps.event.addListenerOnce(map, 'idle', function() {
        google.maps.event.trigger(map, 'resize');
        map.setCenter(myCenter);
      });
      marker.setMap(map);
      var infowindow = new google.maps.InfoWindow({
      content: name
      });
      infowindow.open(map,marker);
      }
      function access()
      {
        $('#Modal0').modal('show');
        initialize();
        /*setTimeout(function(){
          
          google.maps.event.trigger(map, "resize");
          map.setCenter(myCenter);
          },3000);*/
      }   
      //google.maps.event.addDomListener(window, 'load', initialize);
      function ajax_3(param){
      var id= param;
      alert(id);
      $.ajax({
        url: "download_file.php",
        type: "post",
        data: {uploadid: param},
        success: function(){
          window.location= 'download_file.php';
        }
      });
      }
      function wec(){
      window.location= "index.php";
      }
    </script>
    <script>
      $(document).ready(function(){
      $(".wheel-button").wheelmenu({
      trigger: "hover",
      animation: "fly",
      animationSpeed: "fast"
          });
      });
    
    </script>
    <style>
.comment_view
  {
  border-radius: 0px !important;
   background: #2ecc71 !important; 
  }
.well
{
  border-radius: 0px !important;
 margin-bottom: 10px;
}
</style>
<style>
	.edit_points
	{
		display: none;
	}
	.points_info>p
	{
		margin: 0 0 10px;
border-bottom: 1px solid gray;
padding-top: 20px;
padding-bottom: 20px;
text-align: center;
}

.points_div
{
	position: absolute !important;
left: 80%;
top: 20%;
border: 1px solid green;
}

</style>
  </head>


<?php 
function mres($value)
{
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}
//$post_user=mres($post_u);
//require 'partials/view_sidebar.php';


  ?>
<body>
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
									echo "<li><a href='hostel/hostel.php?varname=$hostel_id'>".$hostel_1."</a></li>";
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
										echo "<li><a href='messes/messes.php?varname=$mess_id'>".$mess_7."</a></li>";
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
									echo "<li><a href='eateries/eateries.php?varname=$eatery_id'>".$eatery_1."</a></li>";
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
								<li><a href='others/others.php?varname=1'>Travel</a></li>
								<li><a href='others/others.php?varname=2'>Xerox</a></li>
								<li><a href='others/others.php?varname=3'>Giftshop</a></li>
								<li><a href='others/others.php?varname=4'>Haircare</a></li>
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

<?php



function candelete($user)
{
  if($_SESSION['username']==$user)
  {
    return true;
  }
  else
    return false;
}

$hostel=$_GET['hostel'];
echo "<div class='container-fluid contain1'>";
require 'hostel/sidebar.php';
$sqlhostel="SELECT * FROM hostel_list WHERE hostel_id='$hostel'";
//echo $sqlhostel;
$datahostel=mysqli_query($con,$sqlhostel);
$rowhostel=mysqli_fetch_assoc($datahostel);
$hostel_name=$rowhostel["hostel_name"];
//echo $hostel_name;
$ev=$_GET['sec'];
if($_GET['sec']=="tecsoc")
{
	$sec_post="techsec";
}
if($_GET['sec']=="litsoc")
{
	$sec_post="litsec";
}

if($_GET['sec']=="sports")
{
	$sec_post="sportsec";
}
if($_GET['sec']=="alumni")
{
	$sec_post="Alumnisec";
}

$sqlpost="SELECT * FROM `contacts` WHERE `hostel_id`='$hostel' AND `post`='$sec_post' ";
//echo $sqlpost; 
$datapost=mysqli_query($con,$sqlpost);
$resultpost=mysqli_fetch_assoc($datapost);
$postuser=$resultpost['username'];;
//echo $postuser;

$sql="SELECT * FROM `posts` WHERE `posted_by`='$postuser' LIMIT 20 ";	
//echo $sql;
$query=mysqli_query($con,$sql);
echo "<div class='container '>";
while($result=mysqli_fetch_assoc($query))
{?>
    <div class="post post<?php echo $result['id']?> col-lg-7 col-lg-offset-2 col-sm-offset-2 col-md-offset-2">
    <div class="panel panel-default">
  <?php  if(candelete($result['posted_by']))
{
 echo "<span postid=".$result['id']." class='delete_post glyphicon glyphicon-trash pull-right'></span>";
}?>
  		<div class="panel-body">
  	<?php	
	echo $result['title'].'</br>';
	echo $result['content'].'</br>';
	echo $result['posted_by'].'</br>';
  echo '<a href="uploads/'.$result['upload'].'" target="blank">'.$result['upload'].'</a></br>';
  echo '<div class="btn btn-primary comment_view pull-right" name="'.$result['id'].'">viewcomments</div>';
	echo '</br></br>';
	?>
		 </div>
	</div>
  <div  class="col-lg-12 comment_section<?php echo$result['id']?>" id="comment_section">
  <div class="comment_block<?php echo$result['id']?>">
<?php  require 'partials/comments.php';?>
  </div>
  <?php  if(isset($_SESSION['username']))
  {
?>
  <div class="comment ">
    <form role="form" method="post"  action="comment.php" id="ajaxcomment" class="ajaxcomment" name="<?php echo$result['id']?>">
      <input value='<?php echo $result["id"] ?>' name="post_id" style="display:none"/>
  <div class="form-group col-lg-8 pull-right">
    <label for="comment">comment</label>
    <textarea type="text" class="form-control col-lg-12 pull-right" id="comment<?php echo $result["id"] ?>" name="comment" placeholder="Comment"></textarea>
   <button type="submit" id="submit" class="btn btn-primary pull-right">comment</button>
  </div>
  </form>


  </div>
</div>
  <?php }  ?>
</div>
	<?php


}?>
</br></div>


<?php 

require 'includes/points.php';

?>
    <div class="modal fade" aria-hidden="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" behaviourId='Modal0' id='Modal0'>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class='modal-header'>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 id='location0'>Location</h4>
          </div>
          <div class="modal-body">
            <div id='googleMap1' style="width:100%;height:50%">
            </div>
          </div>
        </div>
      </div>
    </div>
	<script type="text/javascript" src="js/skrollr.stylesheets.js"></script>
	<script type="text/javascript" src="js/skrollr.js"></script>
	<script type="text/javascript">skrollr.init();</script>
</body>
</html>
