<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-3">
          
        </div>
        <div class="col-sm-8 col-md-8">
          <div class="header_info">
            <div class="header_widgets">
              
			<?php   if(!isset($_SESSION['username'])==1)
  { 
			?>
			
			<?php }
			else{ 
				
			} ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"  bgcolor="blue"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
$username=$_SESSION['username'];
$sql ="SELECT username FROM user WHERE username='$username'";
$query = mysqli_query($koneksidb,$sql);
if(mysqli_num_rows($query)>0)
{
while($results = mysqli_fetch_array($query))
	{
	 echo htmlentities($results['username']); }}?>
	 <i class="fa fa-angle-down" aria-hidden="true"></i></a>
          <ul class="dropdown-menu">
           <?php if($_SESSION['username']){?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="updatepass.php">Update Password</a></li>
            <li><a href="riwayatsewa.php">Riwayat Sewa</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Riwayat Sewa</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
      </div>
	  	  
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
         <li><a href="halaman.php">Beranda</a></li> 
      <li><a href="skuter.php">Master Skuter</a></li>
          <li><a href="faqs.php">FAQs</a></li>
          <li><a href="contact-us.php">Contact Me</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>