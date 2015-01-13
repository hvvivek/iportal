<nav class="navbar navbar-fixed-top navbar-collapse" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<li class="navbar-brand"><a href="index.php" class="holy" >INFORMATION PORTAL</a></li>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
        </form>
    <?php 

  if(canpost($con))
  {
    echo '<li><a href="post.php">Post Article</a></li>';
 }
 else
 {
  
 }
 
    ?>
<li><a href="view.php">View Posts</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
         
          <?php if($_SESSION)
          { ?>
          <li class="dropdown">
          <a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> </span> <?php echo $_SESSION['username'];   ?><b class="caret"></b></a>
          <ul class="dropdown-menu signin_div">
            <li class="shit"><a href="profile.php">My profile</a></li>
            <li class="shit"><a href="#">Settings</a></li>
            <li class="divider"></li>
            <li class="shit"><a href="includes/signout.php">Sign Out</a></li>
          </ul>
          </li>
          <?php  } else{ ?>
          <li><a href="<?php echo $oauth->signinURL; ?>">Signin</a></li>
          <?php  }?>
        </ul>
    </div>
</div>
  </nav>