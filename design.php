<!DOCTYPE html>
<html>
<head>
	<title>Inventory System</title>

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/minorStyle.css">
	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato|Montserrat" rel="stylesheet">
	<!-- Scripts -->
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="js/menu_toggle.js"></script>
	<!--favicon-->
       <link rel="icon" href="favicon.ico" type="image/x-icon"
	
</head>
<script language="javascript" type="text/javascript">
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
//time
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	
<body>

	<header>
       <div class="container">
          <div id="branding">
            <div class="logo">
               <img src="jongskie1.png" style="width:21%; height:21%;">
            </div>
            <h1>Inventory System</h1>
            <h2>JONGSKIE ENTERPRISE</h2>
            </div>
        </div>
  </header>

	<i class="fa fa-bars toggle_menu"></i>

	<div class="sidebar_menu">
		<i class="fa fa-times"></i>
		

		<ul class="navigation_section">
			<a href="home.php"><li class="navigation_item" >
				HOME
			</li>
			<a href="products.php"><li class="navigation_item" >
				PRODUCTS
			</li>
			<a href="suppliers.php"><li class="navigation_item">
				SUPPLIER
			</li>
			
		</ul>
		
		<center>
			<a href="logout.php"><h1 class="boxed_item boxed_item_smaller signout">
			<i class="fa fa-sign-out" aria-hidden="true"></i>
				LOG OUT
			</h1></a>
			
			<br>
<br>
<br>

<div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="text" class="trans" name="face" value="" disabled>
			</form>
			  </div>
		</center>
	</div><!-- End of sidebar -->

	<script src="js/close_menu.js"></script>

</body>
</html>