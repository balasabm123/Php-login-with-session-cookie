

<?php
session_start();
// tutorial link : https://youtu.be/n5dLk8ISKMo?list=PL9HXb2Hthn02tKpBeowEOAsbgl9gTse5u
 include("header.php");  
$email_err = $password_err = "";

$con = mysqli_connect("localhost","root","","login"); 
$sql = 'select * from users'; 
$result = mysqli_query($con,$sql); 
$users = mysqli_fetch_all($result);


 if  (isset($_POST['submit']))
 { 

 	$email = trim($_POST['email']);
 	$password = trim($_POST['password']);
 
 	$rem = $_POST['remember'];  
 	if(empty($email)){
 		$email_err = "Please enter Email";
 	}
 	elseif(empty($password)){
 		$password_err = "Please enter password";
 	}else{ 
 		$sql = "select * from users where email='$email'"; 
 		$result = mysqli_query($con,$sql); 
 		$res = mysqli_fetch_all($result);  
 		if(empty($res)){ 
 			$email_err ="Email not registered ....";
 		}
 		elseif($res[0][1]==$email){ 
 			if($res[0][3]==$password){ 
 				$_SESSION['name']= $res[0][2];
 				$_SESSION['start'] = time();
 				$_SESSION['expire'] = $_SESSION['start'] + (1 * 60);

 				if(isset($_POST['remember'])){
 						setcookie("cookie_email",$email,time()+60*60*24*30,'/');
 						setcookie("cookie_remember",$rem,time()+60*60*24*30,'/');
 				}else{
 						setcookie("cookie_email",$email,time()-60*60*24*30,'/');
 						setcookie("cookie_remember",$rem,time()-60*60*24*30,'/');
 				}

 				header("location:dashboard.php");
 			}else{
 			$password_err="password not matching"	;
 			}

 		}
 		  
 	}
 } 
 ?> 

 <?php

$display_email = !empty($email) ? $email : (isset($_COOKIE['cookie_email']) ? $_COOKIE['cookie_email'] : "");
$checked = !empty($email) ? "checked" : (isset($_COOKIE['cookie_remember']) ? "checked" : "");
  ?>
			<br>
			<br>
			<br>
			<br>
			<div class="center">
		<form action="" method="post">
  <div class="form-group" >
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"  autocomplete="off" autocorrect="off" value="<?=$display_email ?>" >
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

    <div class="text-danger"><?php echo $email_err; ?></div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  autocomplete="off" autocorrect="off" require>
     <div class="text-danger"><?php echo $password_err; ?></div>
  </div>
  <div class="form-group form-check">
  <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1" value="1" <?=$checked?>>
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<!-- </div> -->
</div>
	</body>
</html>