<?php
session_start();
$id=$_GET['id'];
require 'config.php';
$conn = mysql_connect($host,$username,$password);
mysql_select_db("i-portal");
$sql1="SELECT * FROM hostel_list WHERE hostel_id='{$id}'";
$data1=mysql_query($sql1);
$row=mysql_fetch_assoc($data1);
$name=$row["hostel_name"];
$lat=$row["lat"];
$lng=$row["long"];
?>
<html>
 <head>
    <meta chaset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $name;?> hostel</title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'/>
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
      window.location= "../index.php";
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
  </head>
<?php 
if(!$_SERVER['QUERY_STRING'])
{
  echo "please proveide correct url";
}
else{
$post_u=$_SERVER['QUERY_STRING'];
function mres($value)
{
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}
$post_user=mres($post_u);
//echo $post_user;
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
?>
<body>
<?php
require 'includes/navbar.php';
function candelete($user)
{
  if($_SESSION['username']==$user)
  {
    return true;
  }
  else
    return false;
}
$sql="SELECT * FROM `posts` WHERE `posted_by`='$post_user' LIMIT 20 ";	
//echo $sql;
$query=mysqli_query($con,$sql);

echo "<div class='container-fluid' style='padding-top:120px'>";
require 'hostel/sidebar.php';
if(mysqli_num_rows($query)>0){
while($result=mysqli_fetch_assoc($query))
{?>
    <div class="post post<?php echo $result['id']?> col-lg-8 col-lg-offset-3 col-sm-offset-2 col-md-offset-2">
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
}
}

else
{

?>
<div class="col-md-6 col-md-offset-2">
<h1>No posts</h1>
  

</div>
  
<?php
 
}

}

?>
</br></div>
}?>
</br></div>
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
</body>
</html>