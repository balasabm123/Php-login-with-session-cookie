<?php
// Author : Balasab Muddebial , changes from local
session_start();
if(!isset($_SESSION['name'])){ 
header("location:login.php");
}else{ 
include('header.php')
// session_start(); 
?>
<br>
			<br>
			<br>
			<br>

	<div class="center">
<h1>My Dashboard</h1>
</div>
</body>
</html>
<?php } ?>
